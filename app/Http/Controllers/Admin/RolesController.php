<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', new Role);
        return view('admin.roles.index',[
            'roles' => Role::all()
        ]);
    }


    public function create()
    {
        $this->authorize('create', new Role);
        return view('admin.roles.create',[
            'role' => new Role,
            'permissions' => Permission::pluck('name','id')
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Role);
        $data = $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required|unique:roles,display_name'
        ], [
            'name.required' => 'El campo identificador es obligatorio',
            'name.unique' => 'Ya hay un identificador con este nombre',
            'display_name.required' => 'El campo nombre es obligatorio',
            'display_name.unique' => 'Ya hay un role con este nombre'
        ]);
        $role = Role::create($data);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.index')->withflash('El role fue creado correctamente');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        return  view('admin.roles.edit',[
            'role' => $role,
            'permissions' => Permission::pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return void
     * @throws AuthorizationException
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);
        $data = $request->validate([
            'display_name' => 'required'
        ], [
            'display_name.required' => 'El campo nombre es obligatorio'

        ]);

        $role->update($data);
        $role->permissions()->detach();

        if ($request->has('permissions')) {

            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.edit', $role)->withflash('El role fue actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return void
     * @throws Exception
     */
    public function destroy(Role $role)
    {

        $this->authorize('delete',$role);
        $role->delete();
        return redirect()->route('admin.roles.index')->withflash('El role fue Eliminado correctamente');

    }
}
