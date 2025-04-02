<x-mail::message>
# User Account Notification

<strong>User Information</strong>
<p>Name: {{ $user->name }}</p>
<p>Username: {{ $user->username }}</p>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
