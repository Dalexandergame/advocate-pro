@component('mail::message')

# &nbsp; &nbsp; AdvocatePRO
<strong>Bonjour : </strong> {{ $user['name'] }}<br>
<strong>Voici le lien pour réinitialiser votre mot de passe:</strong><br> {{ $url }}
<br>
@component('mail::button', ['url' => ''])
changer le mot de passe
@endcomponent
<br>
@endcomponent
