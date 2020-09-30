@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12 ">
            <!-- Profile Image -->
            <div class="box box-danger">
                <div class="box-body box-profile">
                    @if( Auth::user()->path === null)
                        <img src="/adminlte/img/user2-160x160.jpg" class="profile-user-img img-responsive img-circle" alt="User Image">
                    @else
                        <img src="{{ Auth::user()->path}}" class="profile-user-img img-responsive img-circle" alt="{{ Auth::user()->name}}">
                    @endif

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ')}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Publicaciones</b> <a class="pull-right">{{ $user->posts->count() }}</a>
                        </li>
                        <li class="list-group-item">
                            @if($user->roles->count())
                            <b>Roles</b> <a class="pull-right">{{ $user->getRoleNames()->implode(', ')}}</a>
                            @endif
                        </li>
                    </ul>

                    <a href="{{ route('admin.users.edit', auth()->user()) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 ">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Publicaciones</h3>
                </div>
                <div class="box-body">
                    @forelse($user->posts as $post)
                        <a href="{{ route('posts.show', $post) }}" target="_blank">
                            <strong>{{ $post->title  }}</strong>
                        </a>
                        <small class="text-muted pull-right">Publicado el {{ $post->published_at->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y') }}</small>

                        <p class="text-muted">{{ $post->excerpt  }}</p>
                        @unless($loop->last)
                                <hr>
                        @endunless

                        @empty
                            <small class="text-muted">No tiene realizada publicaciones</small>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-3  col-xs-12 col-sm-12 ">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>
                <div class="box-body">
                    @forelse($user->roles as $role)
                        <strong>{{ $role->name  }}</strong><br>
                        @if($role->permissions->count())
                            <small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }} </small>
                        @endif
                        @unless($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">No tiene roles asignados</small>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-3  col-xs-12 col-sm-12 ">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos adicionales</h3>
                </div>
                <div class="box-body">
                    @forelse($user->permissions as $permission)
                        <strong>{{ $permission->name  }}</strong><br>
                        @unless($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">No tiene permisos adicionales</small>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
