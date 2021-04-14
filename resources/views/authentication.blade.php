<!DOCTYPE html>
<html>
    <head>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
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
                <h4>Authentification</h4>
                <form>
                    <div class="mb-4">
                        <input
                            type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"
                        />
                    </div>
                    <div class="mb-4">
                        <input
                            type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe"
                        />
                        <p>Mot de passe oublier ?</p>
                    </div>
                    <div class="mb-4 form-check">
                        <input
                            type="checkbox" class="form-check-input" id="exampleCheck1"
                        />
                        <label
                            class="form-check-label" for="exampleCheck1" id="rem"
                            >Me souvenir de moi</label
                        >
                    </div>
                    <button type="button" class="btn btn-dark">
                        Connecter
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
