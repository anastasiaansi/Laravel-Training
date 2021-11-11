@php
    /** @var \App\Models\User $user */
@endphp
@component('mail::message')
    vielen Dank für Ihre Anmeldung!
    dein Passwort lautet {{ $user->password}}
@endcomponent