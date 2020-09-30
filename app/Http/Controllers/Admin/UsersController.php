<?php

namespace App\Http\Controllers\admin;

use App\Events\UserWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::allowed()->get();
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {

        $user = new User;

        $this->authorize('create', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');

        return view('admin.users.create', compact('user', 'roles','permissions'));

    }


    public function store(Request $request)
    {

        $this->authorize('create', new User);
        //Validar el formulario
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        //Generar una contraseña
        $data['password'] = Str::random(8);
        //Creamos el usuario
         $user = User::create($data);
        //Asignamos los roles
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        //Asignamos los permisos
        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);
        }
        //Enviamos el email
        //Evento => UsuarioCreado
        //Listener => EnviarCorreoConCredenciales
        UserWasCreated::dispatch($user, $data['password']);
        //Regresamos al usuario
        return redirect()->route('admin.users.index')->withFlash('Usuario ha sido creado');

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');

        return view('admin.users.edit', compact('user', 'roles','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->file('imagen')) {
            $userPath = $request->file('imagen');
            $userImage = $userPath->getClientOriginalName();

            $path = $request->file('imagen')->storeAs('/public/image', $userImage, 'public');
            $user->imagen = $userImage;
            $user->path = '/storage/'.$path;

            $files = $request->file('imagen');
            $files->move('/storage/public/image',  $user->imagen);



            $user->update();
            }
        $this->authorize('update', $user);

        $user->update(
            $request->validated()
        );
       return redirect()->route('admin.users.edit',$user)->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();


        return redirect()->route('admin.users.index')->with('flash', ' El usuario ha sido eliminida');

    }
}
