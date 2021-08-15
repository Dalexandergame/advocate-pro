@component('mail::message')

# Bonjour dans AdvocatePRO
<strong>bonjour votre nom est: </strong> {{ $user['name'] }}
<strong>votre email est: </strong> {{ $user['email'] }}
<strong>votre mot de passe est: </strong> {{ $user['pass'] }}
@endcomponent
