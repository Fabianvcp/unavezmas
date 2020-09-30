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

                    <form method="POST" action="{{ route('admin.users.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Roles </label>
                            @include('admin.roles.checkboxes')
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Permisos </label>
                            @include('admin.permissions.checkboxes', ['model' => $user])
                        </div>
                        <div class="form-group">
                            <span class="help-block">La contraseña sera generada y enviada al usuario via email</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block">Crear usuario</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
