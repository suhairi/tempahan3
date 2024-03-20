<x-mail::message>
# Salam

Your access to #e-Tempahan online system has been created.

Your access details are as follows :-

<strong>Name :</strong> {{ $name }} <br />
<strong>Email/Username :</strong> {{ $email }} <br />
<small>Click here to <a href="{{ $url }}">Login</a><small>
    

Thanks,<br>
Unit Logistik, {{ config('app.name') }}
</x-mail::message>
