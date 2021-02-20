<!DOCTYPE html>
<html>
<head>
  <title>Registro Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type = "text/javascript" src = "jquery-3.3.1.js"> </script> 
  <link rel="stylesheet" type="text/css" href="formulario.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
*{
  margin: 0px;
  padding: 0px;
}
body{ 
background-image: linear-gradient(to right, rgb(191, 252, 231),rgb(191, 252, 231), rgb(191, 252, 231));
}
th, td{
    padding: 10px;
  }
  thead{
    background-color: #08088A;
    border-bottom: solid 5px #58D3F7;
    color: white;
  }
  tr:nth-child(even){
    background-color: #ddd;
  }
  tr:hover td{
    background-color: #2E64FE;
    color: white;
  }
  .centrar{
    text-align: center;
  }

div#titulo{
  width:100%;
  margin-top:17px;
}
p#header{
  text-align: center;
  font-size: 2.7em;
  color:rgb(0, 0, 0);
  font-weight: bold;
  font-family: "Latin Modern Roman 10";
  font-style: italic;
}
td.modificacion{
  background-color: white;
}

#modal_form{
    width: 85%;
    text-align: right;
}

#inicio{
  font-size: 1.5em;
  font-weight: bold;
  /*transiciones*/
  -webkit-transition:500ms ease;
  -o-transition:500ms ease;
  transition:500ms ease;
}

.inicio_{
  color: black;
}
.inicio_:hover{
  font-size: 1.2em;
  color: black;
}


#inicio:hover{
background-image: linear-gradient(to right,  rgb(0, 174, 63), rgb(191, 252, 231));
border-radius: 20px;
color: white;
}
ul li a{ 
  /*transiciones*/
  -webkit-transition:500ms ease;
  -o-transition:500ms ease;
  transition:500ms ease;
}

ul li a:hover{
background-image: linear-gradient(to right, rgb( 7, 202, 72), rgb(191, 252, 231));
  border-radius: 50px;

}
.dropdown-item{
  font-weight: bold; 
  font-size: 1.2em;
  color: red;
}

.dropdown-item:hover{
  font-size: 1.4em;
  color: red;
}
#navbarSupportedContent{
  font-size: 1.2em;
  border-radius: 18px 18px 18px 18px;
}

</style>
</head>
<body>

<!------------------------------------------------------------*----------------------------------------------------------->
 <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!----------------------------------------------------------------------------------------------------------->
                <div class="" id="inicio">                      
                  <center>
                   <a class="inicio_" href="{{ url('/agenda') }}" style="text-decoration: none;">
                          Inicio
                   </a>
                 </center>
                </div>

                <!----------------------------------------------------------------------------------------------------------->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto menu_ ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black; font-weight: bold;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        {{ __('Cerrar sesión') }}
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
<div id="titulo">
    <br> 
    <p id="header">Registro Usuarios</p>
</div>
<!------------------------------------------------------------*-----------------------------------------------------------> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <center>
                <div class="card-header" id="registrarse"></div>
              </center>
                <div class="card-body">
                    <form method="POST" action="{{ route('register1') }}">
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
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Tipo de Usuario:</label>
                            <div class="col-md-6 offset-md-4"> 
                                <label class="radio-inline"><input type="radio" name="role_id" value="1" checked>Usuario</label>
                                <label class="radio-inline"><input type="radio" name="role_id" value="2">Administrador</label>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6 offset-md-4"> 
                                <label class="radio-inline"><input type="radio" name="active_id" value="0" checked>Inactivo</label>
                                <label class="radio-inline"><input type="radio" name="active_id" value="1">Activo</label>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Registrar') }}
                                </button>
                                <input type="button" class="btn btn-outline-danger"  value="Regresar" name="Back2" onclick="history.back()"/>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>