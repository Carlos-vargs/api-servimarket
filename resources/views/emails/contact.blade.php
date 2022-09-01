@component('mail::message')
# {{ $user->name }} wants to contact you

{{ $content }}

@component('mail::button', [ 'url' => "https://servimarket.vercel.app/user/{$user->id}" ])
    view the user
@endcomponent

@endcomponent
