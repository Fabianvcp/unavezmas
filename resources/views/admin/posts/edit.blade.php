@extends('admin.layout')
@section('header')

    <h1>
        Post
        <small> Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="far fa-tachometer-alt"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index')}}"><i class="far fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
    </ol>

@stop
@section('content')
    <div class="row">
        @if($post->photos->count())
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="box box-danger">
                <div class="box-body">

                    @foreach($post->photos as $photo)
                        <form method="POST" action="{{  route('admin.photos.destroy', $photo->id)  }}">
                            @csrf
                            @method('DELETE')
                            <div class="col-md-2 col-lg-2 col-xs-6 col-sm-6">
                                <button class="btn btn-danger btn-xs" style="position: absolute"><i class="far fa-remove"></i></button>
                                <img class="img-responsive" src="/storage/{{  $photo->url }}" alt="">
                            </div>
                        </form>

                    @endforeach

                </div>
            </div>
        </div>
        @endif
        <form action="{{ route('admin.posts.update', $post)}}" method="post">
            @csrf
            @method( 'PUT')
            <div class="col-12  col-md-8 col-lg-8">

                <div class="box box-danger">
                    <div class="box-body">

                        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                            <label for="title" >Título de la publicación</label>
                            <input name="title" value="{{ old('title', $post->title) }}" id="title" type="text" class="form-control" placeholder="Ingrese aquí el titulo de la publicación">
                            {!!  $errors->first('title', '<span class="help-block">:message</span>') !!}

                        </div>

                        <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                            <label for="body" >Contenido de la publicación</label>
                            <textarea rows="10" name="body" id="editor1"  class="form-control" placeholder="Ingresa contenido completo de la publicación">{{ old('body',$post->body ? $post->body : null) }}</textarea>
                            {!!  $errors->first('body', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('iframe') ? 'has-error' : ''}}">
                            <label for="iframe" >Iframe / contenido embebido <small class="text-info">remondación: modificar en el width="100%" en height="480"</small></label>
                            <textarea rows="2" name="iframe" id="editor"  class="form-control" placeholder="Ingresa contenido Embebido (iframe) de audio o video">{{ old('iframe',$post->iframe ? $post->iframe : null) }}</textarea>
                            {!!  $errors->first('body', '<span class="help-block">:message</span>') !!}
                        </div>

                    </div>

                    <div class="box-footer">

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">

                <div class="box box-danger">

                    <div class="box-body">

                        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="excerpt" >Extracto de la publicación</label>
                            <textarea name="excerpt" id="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación" data-sample-short>{{ old('excerpt',$post->excerpt ? $post->excerpt : null) }}</textarea>
                            {!!  $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                            <label for="category_id">Categorias</label>
                            <select name="category_id" id="category_id" class="form-control select2" >
                                @if (!empty($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{  $category->id }}" {{ old('$category_id') == $category->id ? 'selectd' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @else
                                    <option value=""> No hay categorias cargadas</option>
                                @endif

                            </select>
                            {!!  $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
                            <label>Etiquetas</label>
                            <select name="tags[]" class="form-control select2"
                                    multiple="multiple"
                                    data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    {{--                                        usando collect nos preguntamos si old('tags) tiene los tags que seleccionamos --}}
                                    {{--                                        anteriormente--}}
                                    <option {{ collect(old('tags', $post->tags->pluck('id') ? $post->tags->pluck('id') : null ))->contains($tag->id) ? 'selected' : '' }} value="{{$tag->id }}" >{{$tag->name}}</option>
                                @endforeach
                            </select>
                            {!!  $errors->first('tags', '<span class="help-block">:message</span>') !!}
                        </div>
                        <!-- /.form-group -->
                        <!-- Date -->
                        <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
                            <label>Fecha de Publicación:</label>

                            <div class="input-group date" id="sandbox-container">
                                <div class="input-group-addon">
                                    <i class="far fa-calendar"></i>
                                </div>
                                <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{ old('published_at',$post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <div class="dropzone">

                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block">
                                {{ __('Save post')}}
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </form>

    </div>
@stop


<!-- bootstrap datepicker -->
@push('style')
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"/>
@endpush

@push('script')

    <!-- CK Editor -->
    <script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1',{
                language: 'es',
                width: '100%',
                uiColor: '#fb503b',

            });
            CKEDITOR.config.height = 315;
        });
    </script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="/adminlte/plugins/select2/i18n/es.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2({
                language: "es",
                tags:true,

            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" ></script>
    <script src="/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
    <script>
        //Date picker
        $('#sandbox-container input').datepicker({
            todayBtn: true,
            clearBtn: true,
            language: 'es',
            multidate: false,
            daysOfWeekHighlighted: "0,6",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });
    </script>
    <script>
        var myDropozone = new Dropzone('.dropzone',{

            /*donde se envia los datos*/
            url : '/admin/posts/{{$post->url}}/photos',

            /*que tipo de archivos acepta*/

            acceptedFiles : 'image/*',

            /*Maximo de peso del archivo*/

            maxFilesiza: 5,

            /*Cantidad de archivos que se pueden subir*/
            maxFiles:10,
            /*Cambiar el nombre del parametro*/
            paramName: 'photo',
            /*token post del formulario*/
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            /*mensaje del cuadro para cargar imagenes*/
            dictDefaultMessage : 'Arrastra las fotos aqui para subirlas'
        });

        myDropozone.on('error',function (file, res) {
            console.log(res.photo[0]);
            var msg =res.photo[0];
            $('.dz-error-message > span.data-dz-errormessage').text(msg)
        });

        Dropzone.autoDiscover=false;
    </script>

@endpush
