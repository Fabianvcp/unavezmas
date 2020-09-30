@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Actualizar Permisos</h3>
                </div>
                <div class="box-body">

                    @include('admin.partials.error-messages')

                    <form method="POST" action="{{ route('admin.permissions.update',$permission)}}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="name">Identificador:</label>

                            <input  value="{{ $permission->name}}" type="text" class="form-control" disabled>

                        </div>

                        <div class="form-group">
                            <label for="display_name">Nombre:</label>
                            <input name="display_name" value="{{ old('display_name',$permission->display_name) }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block">Actualizar Permisos</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
