@extends('admin.layout')

@section('header')

    <h1>
        Post
        <small> Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-tachometer-alt"></i> Inicio</a></li>
        <li class="active">Posts</li>
    </ol>

@stop

@section('content')

    <!-- /.box -->

    <div class="box box-danger content" >
        <div class="box-header">
            <h3 class="box-title">Listados publicaciones</h3>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                <i class="far fa-plus"></i> Crear publicación
            </button>
       </div>
        <!-- /.box-header -->
        <div class="box-body content">
            <table id="posts-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Extracto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>

                            <td>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-default" target="_blank"> <i class="far fa-eye"></i></a>

                                <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-xs btn-info"><i class="far fa-pencil"></i></a>
                                <form action="{{  route('admin.posts.destroy', $post)  }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-xs btn-danger" onclick="return confirm('Estás seguro de querer eliminar esta Publicación?')"><i class="far fa-times"></i></button>
                                </form>
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
            $('#posts-table').DataTable({
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
