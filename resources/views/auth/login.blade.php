<!DOCTYPE html>
<html>
<head>









    <title>Agenda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="logos_inicio.css">
    <link rel="stylesheet" type="text/css" href="menu_inicio.css">

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
div.contenedor{
  width: 20%;
  height: 230px;
  float: left;
  transition: height .4s;
  border-radius: 8%;
}
div#uno{
  background-color: rgb(184, 30, 222);
}
div#dos{
  background-color: rgba(0, 140, 255, 1);
}
div#tres{
  background-color: rgb(15, 160, 57);
}
div#cuatro{
  background-color: rgb(44, 60, 191);
}
div#cinco{
  background-color: rgb(44, 142, 191);
}
img.icon{
  display: block;
  margin: 13% auto;
  background-color: rgba(255, 255, 255,.15 );
  width: 25%;
  padding: 1%;
  border-radius: 50%;
  box-shadow: 0px 0px 0px 10px rgba(255,255,255,0);
  transition: box-shadow .4s;
}
p.texto{
  text-align: center;
  font-size: 1.2em;
  font-weight: bold;
  color: white;
  opacity: .7;
  padding-top: 19px;
  transition: padding-top .4s;
}
.texto1{
  text-align: center;
  font-size: 1.2em;
  font-weight: bold;
  color: white;
  opacity: .7;
  padding-top: 11px;
  transition: padding-top .4s;
}
div.contenedor:hover{
  height: 250px;
}
div.contenedor:hover p.texto1{
  opacity: 1;
}
div.contenedor:hover img.icon{
  box-shadow: 0px 0px 0px 0px rgba(255,255,255,1)
}
ul{
list-style:none;
}
a:visited {color:#FF34B3;} 
a:active {color:#FFB6C1;} 
a:hover {color:#FF1493;
text-decoration: none;} 
.primero {
    display:none;
    padding:5px;
    border:1px solid #ccc;
    background-color:#f1f1f1;
    position:relative;
    width:200px;
    border-radius: 2px;
  }
  /* Al pasar el mouse por encima del div semostrara el div con la
    clase ".primero". Esta clase, tiene que estar dentro del id
    "primero" para que funcione
   */
  #primero:hover .primero {
    display:block;
  }
  .update{
    width: 100%;
    text-align: auto;
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
/*Titulo*/
div#titulo{
  width:100%;
  margin-top:15px;
}
p#header{
  text-align: center;
  font-size: 2.5em;
  color:#9a9a9a;
}

#logueo{
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
                          
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: black; font-weight: bold; font-size: 1.3em">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); " style="color: red">
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
<div id="titulo">
    <p id="header">Agenda Electronica</p>
</div>
<br><br>
<div>
  @if(session()->has('flash'))
  <div class="alert alert-info">{{session('flash')}}</div>
  @endif
   @if(session()->has('error'))
  <div class="alert alert-danger">{{session('error')}}</div>
  @endif
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="logueo">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" >
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                 
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>