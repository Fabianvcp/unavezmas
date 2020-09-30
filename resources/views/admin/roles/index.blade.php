@extends('admin.layout')

@section('header')

    <h1>
        Roles
        <small> Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-tachometer-alt"></i> Inicio</a></li>
        <li class="active">Roles</li>
    </ol>

@stop

@section('content')

    <!-- /.box -->

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listados usuarios</h3>
            @can('create', $roles->first())
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
                    <i class="far fa-plus"></i> Crear role
                </a>

            @endcan
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="roles-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name  }}</td>
                        <td>{{ $role->permissions->pluck('name')->implode(', ')  }}</td>

                        <td>
                            @can('update', $role)
                                <a href="{{ route('admin.roles.edit', $role)}}" class="btn btn-xs btn-info"><i class="far fa-pencil"></i></a>
                            @endcan
                            @can('delete', $role)
                                @if($role->id !== 1)
                                <form action="{{  route('admin.roles.destroy', $role)  }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-xs btn-danger" onclick="return confirm('Estás seguro de querer eliminar este role?')"><i class="far fa-times"></i></button>
                                </form>
                                @endif
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
            $('#roles-table').DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "language": {
                    "url": '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                }
            });
        });
    </script>


@endpush
