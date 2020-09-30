
<ul class="sidebar-menu">
    <li class="header">Navegación</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="{{ setActiveRoute('dashboard')}}"  >
        <a href="{{ route('dashboard') }}">
            <i class="far fa-home"></i>
            <span> Inicio</span>
        </a>
    </li>

    <li class="treeview  {{ setActiveRoute('admin.posts.index')}}">
        <a href="#"><i class="far fa-bars"></i>
            <span> Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li  class="treeview  {{ request()->is('admin/posts') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}">
                    <i class="far fa-eye"></i> Ver todos los posts
                </a>
            </li>
            @can('create', new App\Post)

            <li  class="treeview  {{ request()->is('admin/posts/create') ? 'active' : '' }}">

                @if( request()->is('admin/posts/*'))
                    <a href="{{ route('admin.posts.index', '#create') }}">
                        <i class="far fa-pencil"></i> Crear un post
                    </a>
                @else
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        <i class="far fa-pencil"></i> Crear un post
                    </a>
                 @endif

            </li>
        </ul>
    </li>
    @endcan

    @can('view', new App\User)
    <li class="treeview  {{ setActiveRoute(['admin.users.index','admin.users.create' ])}}">
        <a href="#"><i class="far fa-users-class"></i>
            <span> Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li  class="treeview {{ setActiveRoute('admin.users.index')}} ">
                <a href="{{ route('admin.users.index') }}">
                    <i class="far fa-eye"></i> Ver todos los usuarios
                </a>
            </li>
            @can('create', new App\User)
            <li  class="treeview  {{ setActiveRoute('admin.users.create')}}">
                <a href="{{ route('admin.users.create') }}">
                    <i class="far fa-pencil"></i> Crear un usuario
                </a>
            </li>
            @endcan
        </ul>
    </li>
    @endcan

    @can('view', new \Spatie\Permission\Models\Role)
        <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit'])}}"  >
            <a href="{{ route('admin.roles.index') }}">
                <i class="far fa-user-shield"></i>
                <span> Roles</span>
            </a>
        </li>
    @endcan
    @can('view', new \Spatie\Permission\Models\Permission)
        <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit'])}}"  >
            <a href="{{ route('admin.permissions.index') }}">
                <i class="far fa-user-lock"></i>
                <span> Premisos</span>
            </a>
        </li>
    @endcan
</ul>
