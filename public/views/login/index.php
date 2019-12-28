<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?=URL_CSS?>estilo.css">

    <title>Eja EDC</title>
  </head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <div class="form-label-group text-center">
            <img align="center" src="<?=URL_IMG?>logo_edc_eja.png">
          </div>
            <h5 class="card-title text-center">Fazer Login</h5>
            <form class="form-signin" id="formLogin">
              <div class="form-label-group">
                <input type="text" name="login" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email </label>
              </div>

              <div class="form-label-group">
                <input type="password" name="senha" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Senha</label>
              </div>

              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar </button>
              <hr class="my-4">
             
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script type="text/javascript" src="<?=URL_JS?>script.js"></script>

</body>
</html>