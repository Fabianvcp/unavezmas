@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos personales</h3>
                </div>
                <div class="box-body">


                    @include('admin.partials.error-messages')

                    <form method="POST" action="{{ route('admin.users.update', $user)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" value="{{ old('email', $user->email) }}" type="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input name="password"  type="password" class="form-control" placeholder="Contraseña">
                            <span class="help-block">Dejar en blanco para no cambiar la contraseña</span>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Repite la contraseña:</label>
                            <input name="password_confirmation"  type="password" class="form-control" placeholder="Repite la contraseña">
                            <span class="help-block">Dejar en blanco para no cambiar la contraseña</span>
                        </div>

                        <div class="form-group">
                            <label for="photo">Foto de perfil:</label>
                            <input name="imagen" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block">Actualizar usuario</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>
                <div class="box-body">
                    @role('Admin')
                    <form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.roles.checkboxes')

                        <button class="btn btn-danger btn-block">Actualizar Roles</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @foreach($user->roles as $role)
                                <li class="list-group-item">
                                    {{ $role->name}}
                                </li>
                            @endforeach
                        </ul>
                    @endrole
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos</h3>
                </div>
                <div class="box-body">
                    @role('Admin')
                    <form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.permissions.checkboxes' , ['model' => $user])

                        <button class="btn btn-danger btn-block">Actualizar Premisos</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @forelse( $user->permissions as $permission)
                                <li class="list-group-item">
                                    {{ $permission->name}}
                                </li>
                             @empty
                                <li class="list-group-item">
                                    No tiene permisos
                                </li>

                            @endforelse
                        </ul>
                        @endrole

                </div>
            </div>
        </div>
    </div>

@endsection
