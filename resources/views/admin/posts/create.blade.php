
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin.posts.store', '#create')}}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el título de tu nueva publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        {{--                            <label for="title" >Título de la publicación</label>--}}
                        <input name="title" value="{{ old('title') }}" id="post-title" type="text" class="form-control" placeholder="Ingrese aquí el titulo de la publicación"  required>
                        {!!  $errors->first('title', '<span class="help-block">:message</span>') !!}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Crear Publicación</button>
                </div>
            </div>
        </div>

    </form>
</div>

@push('script')
    <script>
        console.log(window.location.hash);
        if(window.location.hash === '#create'){
            $('#myModal').modal('show');
        }else{

        }
        $('#myModal').on('hide.bs.modal',  function (){
            window.location.hash = '#';
        });
        $('#myModal').on('show.bs.modal',  function (){
            $('#post-title').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush
