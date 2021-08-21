<!DOCTYPE html>
<html>
    <head>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"
        ></script>
        <!-- <link rel="stylesheet" type="text/css" href="resources\css\auth.css" /> -->
        <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
        <style>
            body {
                background-image: url(img/ImageAvocat2.jpg);
                 }
            #logo {
                background-image: url(img/Logo-Blanc-AdvocatPro.png);
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div id="menu" class="row no-gutters">
            <div id="logo" class="col-md-2"></div>
            <div class="col-md-7"></div>
            <div id="lang" class="col-md-1">
                <button onclick="">Fr.</button>
                <button onclick="">Ar.</button>
            </div>
        </div>

        <div id="auth" class="row no-gutters">
            <div id="msg" class="col-md-6">
                <h1>
                    "La gloire d'un bon avocat consiste à gagner de mauvais procès."
                </h1>
                <h3>Honoré de Balzac</h3>
            </div>
            <div id="login" class="col-md-6">
                <h4>Récupérer mon mot de passe</h4>
                <form method="POST" action="{{ route('password.email') }}">
                        @csrf      
                    <div class="mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
            
                    <div class="mb-4 form-check">
                    </div>
                    <button type="submit" class="btn btn-dark">
                    envoyer le lien de réinitialisation
                    </button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>