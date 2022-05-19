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
            font-family: Gotham sans-serif;
            background: url(img/ImageAvocat2.jpg) no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

        <div class="d-flex justify-content-between m-4">
            <div class="mt-3">
                <img src="{{ asset('img/Logo-Blanc-AdvocatPro.png') }}" height="106" width="127" alt="">
            </div>
            <div class="mt-3">
                <button onclick="">Fr.</button>
                <button onclick="">Ar.</button>
            </div>
        </div>

    <div class="container mx-auto w-50 mb-5">
        <div class="row">
            <div id="msg" class="p-3">
                <h1>
                    "La gloire d'un bon avocat consiste à gagner de mauvais procès."
                </h1>
                <h4 class="pb-2 font-weight-light">Honoré de Balzac</h4>
            </div>
        </div>
        <div class="row">
            <div id="login">
                <h4>Authentification</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <input id="email" type="email" class="form-control auth-input py-2 px-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                    <!-- @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                    @enderror -->
                    </div>

                    <div class="mb-2">
                        <input id="password" type="password" class="form-control auth-input py-2 px-4 @error('email') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                    <!-- @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror -->
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div class="mb-5">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none text-dark" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        @endif
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Se souvenir de moi ') }}
                        </label>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-dark connect">
                            {{ __('Se connecter') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
