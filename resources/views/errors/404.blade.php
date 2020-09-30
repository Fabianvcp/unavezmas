@extends('layout')
@section('content')
    <section class="pages container">
        <div class="page page-about">
            <h1 class="text-capitalize">Error 404</h1>
            <div class="divider-2" style="margin: 35px 0;"></div>
            <p>Página no encontrada.</p>
            <p>Regresar a <a href="{{route('pages.home')}}"><i class="far fa-home"></i>  Volver</a>.</p>
        </div>
    </section>
@endsection
