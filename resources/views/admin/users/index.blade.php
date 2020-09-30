@extends('admin.layout')

@section('header')

    <h1>
        Usuarios
        <small> Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-tachometer-alt"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>

@stop

@section('content')

    <!-- /.box -->

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listados usuarios</h3>
            @can('create', $users->first())
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">

                    <i class="far fa-plus"></i> Crear Usuario
                </a>
             @endcan
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="users-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(", ") }}</td>

                        <td>

                            @can('view', $user)
                                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-default"> <i class="far fa-eye"></i></a>
                            @endcan
                            @can('update', $user)
                                <a href="{{ route('admin.users.edit', $user)}}" class="btn btn-xs btn-info"><i class="far fa-pencil"></i></a>
                            @endcan
                            @can('delete', $user)
                                <form action="{{  route('admin.users.destroy', $user)  }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-xs btn-danger" onclick="return confirm('Estás seguro de querer eliminar este usuario?')"><i class="far fa-times"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{--                <tfoot>--}}
                {{--                    <tr>--}}
                {{--                        <th>Rendering engine</th>--}}
                {{--                        <th>Browser</th>--}}
                {{--                    </tr>--}}
                {{--                </tfoot>--}}
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

<!-- bootstrap datepicker -->
@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
@endpush

@push('script')

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#users-table').DataTable({
                "responsive": true,
                "paging": true,
                "searching": true,
                "lengthChange": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "language": {
                    "url": '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                }
            });
        });
    </script>


@endpush
