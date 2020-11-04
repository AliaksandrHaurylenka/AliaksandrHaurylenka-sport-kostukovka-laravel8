@component('mail::message')
# Здравствуйте!!!

Спасибо за проявленный интерес к нашим рассылкам.
Для завершения подписки подтвердите свой Email адрес.

@component('mail::button', ['url' => route('subscriber.verify', ['token' => $subs->token])])
Подтвердить Email
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent