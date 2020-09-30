@extends('layout')
@section('content')

    <section class="pages container">
        <div class="page page-contact">
            <h1 class="text-capitalize">contact us</h1>
            <p>Nam in maximus arcu, ac aliquam tellus. Donec vestibulum ipsum nunc, at placerat ante posuere non. Integer at dui a lacus suscipit elementum id non massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc eu neque eros. Ut eu quam justo.</p>
            <div class="divider-2" style="margin:25px 0;"></div>
            <div class="form-contact">
                <form action="{{ route('contacto') }}" method="post">
                    @csrf
                    <div class="input-container container-flex space-between">
                        <input name="name" type="text" placeholder="Ingresa tu nombre" class="input-name">
                        <input name="email" type="text" placeholder="Ingresa tu email" class="input-email">
                    </div>
                    <div class="input-container">
                        <input name="subject" type="text" placeholder="Asunto" class="input-subject">
                    </div>
                    <div class="input-container">
                        <textarea name="message"  cols="30" rows="10" placeholder="Ingrese su mensaje"></textarea>
                    </div>
                    <div class="send-message">
                        <button  class="text-uppercase c-green">Enviar mensaje</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
