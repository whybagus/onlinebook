@component('mail::message')
# Activation your account

Thanks to signin up.

@component('mail::button', ['url' => route('auth.activate', [
    'token' => $user->activation_token,
    'email' => $user->email,
]) ])
    Active
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
