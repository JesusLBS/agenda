<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type = "text/javascript" src = "jquery-3.3.1.js"> </script> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="logos_inicio.css">
    <link rel="stylesheet" type="text/css" href="menu_inicio.css">
        <script type="text/javascript">
document.oncontextmenu = function (e) {
  e.preventDefault();
 }
</script>
<style type="text/css">
*{
  margin: 0px;
  padding: 0px;
}
header{
  display: inline-block;
  margin: auto;
  width: 100%;
  height: 180%;
  background-color: white;
  border:60px solid white;
}
#header{
    font-weight: bold;
    color:rgba(0, 0, 0, 0.70);
}
#img1_estado{
  display: inline-block;
  width: 50%;
  height: 10%;
  float: left;
  padding: 20px;
  border: 0px solid black;
}
#img2_conalep{
  display: inline-block;
  width: 49%;
  height: 8%;
  float: right;
  border: 0px solid black;
}
#logos{
  overflow: hidden;
  line-height: 100px;
}
#registrarse{
  text-align: center;
  font-size: 2em;
  color:#9a9a9a;
  font-weight: bold;
}
</style>
</head>
<body>

 <div id="app"> 
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
        <!------------------------------------------------------------Titulo----------------------------------------------------------->
        <div class="nombref"></div>
        <!-------------------------------------------------------------*------------------------------------------------------------>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest                            
                                <li class="nav-item">
                                      <a class="navbar-brand" href="{{ url('/') }}" style="color: black; font-weight: bold; font-size: 1.3em">
                                       Inicio
                                      </a>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); " style="color: red; font-weight: bold; font-size: 1.3em">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div> 
<!------------------------------------------------------------*----------------------------------------------------------->
<div id="logos">
  <div id="img1_estado">
    <img src="imagenes/estadodemexico.png" width="35%">
  </div>
  <div id="img2_conalep">
    <img src="imagenes/conalep.png" width="100%" height="">
  </div>
</div>
<!------------------------------------------------------------*-----------------------------------------------------------> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="registrarse"  style="background-image: linear-gradient(to right,  rgb(0, 174, 63), rgb(191, 252, 231)); color: rgb(47, 50, 49);" >{{ __('Registrarse') }}</div>

                <div class="card-body" style="background-image: linear-gradient(to right,  rgb(0, 174, 63), rgb(191, 252, 231));font-weight: bold; ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>