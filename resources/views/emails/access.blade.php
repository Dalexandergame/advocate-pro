@component('mail::message')
# Hi Dear,


Votre e-mail a été ajouté en tant qu'utilisateur dans Advocate-PRO,
veuillez cliquer sur le lien ci-dessous pour vous authentifier

<b>Identifiant</b>:
 {{$email}}

<b>Mot de passe</b>:
{{$password}}

@component('mail::button', ['url' => 'http://134.209.204.217/login'])
    connexion
@endcomponent

Your Sincerely,<br>
{{ config('app.name') }}
@endcomponent
