@component('mail::message')
# Tus contraseña temporal para acceder a {{ config('app.name')  }}

Utiliza estas credenciales para acceder al sistema.


@component('mail::table')
    | Email       | Password      |
    | :------------:|:-------------:|

@endcomponent
@component('mail::table')
    | {{ $user->email }}| {{ $password }}|
    | :------------|:-------------|

@endcomponent

@component('mail::button', ['url' => url('login')])
Ingreso
@endcomponent


                                Thanks,{{ config('app.name') }}
@endcomponent
