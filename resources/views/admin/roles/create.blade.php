@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Role</h3>
                </div>
                <div class="box-body">

                    @include('admin.partials.error-messages')

                    <form method="POST" action="{{ route('admin.roles.store')}}">
                        @include('admin.partials.error-messages')

                        <div class="form-group">

                            @include('admin.roles.form')
                            <button class="btn btn-danger btn-block">Crear Role</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
