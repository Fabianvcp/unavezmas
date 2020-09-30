@extends('layout')
@section('content')
    <section class="pages container">
        <div class="page page-about">
            <h1 class="text-capitalize">Error 403</h1>
            <div class="divider-2" style="margin: 35px 0;"></div>
            <p>Página no autorizada.</p>
            <span style="color: darkred">{{  $exception->getMessage()}}</span>
            <p><a href="{{ url()->previous() }}"><i class="far fa-home"></i>  Regresar</a>.</p>
        </div>
    </section>
@endsection
