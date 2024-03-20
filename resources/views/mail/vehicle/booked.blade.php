<x-mail::message>
# Salam

# e-Tempahan Online System<br />
You have a vehicle booking form to approve. <br /><br />

Details :- <br />
Applicant : {{ $applicant }} <br />
Destination : {{ $destination }} <br />



Click here to <a href="{{ $url }}">Login</a>
    

Thanks,<br>
Unit Logistik, {{ config('app.name') }}
</x-mail::message>
