@extends('admin.layout')

@section('header')

    <h1>
        Permisos
        <small> Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-tachometer-alt"></i> Inicio</a></li>
        <li class="active">Permisos</li>
    </ol>

@stop

@section('content')

    <!-- /.box -->

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Listados Permisos</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="permissions-table" class="table table-striped table-bordered dt-responsive nowrap">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name  }}</td>

                        <td>
                            @can('update', $permission)
                            <a href="{{ route('admin.permissions.edit', $permission)}}" class="btn btn-xs btn-info"><i class="far fa-pencil"></i></a>
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
            $('#permissions-table').DataTable({
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
