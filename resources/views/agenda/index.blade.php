<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
    <meta charset="utf-8">













 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


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
  padding: 4%;
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
  font-size: 5.5em;
  color:rgb(47, 50, 49);
}
#modal_form{
  width: 96%;
  text-align: center;
}
ul li a{
  /*transiciones*/
  -webkit-transition:500ms ease;
  -o-transition:500ms ease;
  transition:500ms ease;
}
ul li a:hover{
  background-image: linear-gradient(to right,  rgb(0, 174, 63), rgb(191, 252, 231));
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
/* Make the image fully responsive */
.carousel-inner img {
  width: 100%;
  height: 100%;
  border-radius: 18px 18px 18px 18px;
}
#nuevo{
   width: 75%;
  margin: auto;
   border-radius: 18px 18px 18px 18px;
}
.nameaula{
  font-weight: bold; 
  font-size: 3vw;
  color: black;
}
.name_aula{
  font-weight: bold; 
  font-size: 3vw;
  color: black;
  margin: auto;
  background-image: linear-gradient(to right,  rgb(113, 220, 0), rgb(38, 223, 198));
  border-radius: 18px 18px 18px 18px;
  font-family: "Latin Modern Roman 10";
  font-style: italic;
  width: 50%;
  height: 15%;
  text-align: center;
}
.carousel-caption{
  margin: auto;
  background-color: #9a9a9a;
  border-radius: 18px 18px 18px 18px;
  font-family: "Latin Modern Roman 10";
  font-style: italic;
  width: 50%;
  height: 15%;
}
#app{
  height: 200%;
}
.turnos{
  color: black;
}
.turnos:hover{
  font-size: 3.5vw;
  color: white;
  /*transiciones*/
  -webkit-transition:500ms ease;
  -o-transition:500ms ease;
  transition:500ms ease;
}
#menu:hover{
  font-size: 1.8vw;
}

#lbs{
  color: rgb(0, 137, 225);
}
#lbs:hover{
  background-image: linear-gradient(to right,  rgb(0, 174, 63), rgb(191, 252, 231));
  color: black;
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
<!-------------------------------------------------------------Menu------------------------------------------------------------>
                    <ul class="navbar-nav mr-auto" >
                            <li class="nav-item dropdown" id="menu">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black; font-weight: bold; font-size: 1em" >Informatica <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                    <a class="lbs dropdown-item" href="{{URL::action('lab_informaticacontroller@index')}}" id="lbs" style="text-decoration: none;">Matutino</a>
                                    <a class="lbs dropdown-item" href="{{URL::action('lab_informaticacontrollerves@index')}}" id="lbs" style="text-decoration: none;">Vespertino</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown" id="menu">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black; font-weight: bold; font-size: 1em" >Autocad <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{URL::action('lab_autocadcontroller@index')}}" id="lbs" style="text-decoration: none;">Matutino</a>
                                    <a class="dropdown-item" href="{{URL::action('lab_autocadcontrollerves@index')}}" id="lbs" style="text-decoration: none;">Vespertino</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown" id="menu">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black; font-weight: bold; font-size: 1em" >Taller de Administración <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{URL::action('taller_administracioncontroller@index')}}" id="lbs" style="text-decoration: none;">Matutino</a>
                                    <a class="dropdown-item" href="{{URL::action('taller_administracioncontrollerves@index')}}" id="lbs" style="text-decoration: none;">Vespertino</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown" id="menu">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black; font-weight: bold; font-size: 1em" >Auditorio <spran class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{URL::action('auditoriocontroller@index')}}" id="lbs" style="text-decoration: none;">Matutino</a>
                                    <a class="dropdown-item" href="{{URL::action('auditoriocontrollerves@index')}}" id="lbs" style="text-decoration: none;">Vespertino</a>
                                </div>
                            </li>
                    </ul>
<!-------------------------------------------------------------*------------------------------------------------------------>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black; font-weight: bold; font-size: 1em" >Bienvenido 
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit(); " >
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
<div id="logos">
  <div id="img1_estado">
    <img src="imagenes/estadodemexico.png" width="35%">
  </div>
  <div id="img2_conalep">
    <img src="imagenes/conalep.png" width="100%" height="">
  </div>
</div>
<!------------------------------------------------------------*----------------------------------------------------------->

@if(auth()->user()->role_id == 2 )
@include('contentsadmin.content1')
@else
@endif

<!------------------------------------------------------------*----------------------------------------------------------->
@if (session('status'))
    <div class="alert alert-success" role="alert">
         {{ session('status') }}
     </div>
@endif
@if(Session::has('update'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: green; font-weight: bold; font-size: 1.1em">{{Session::get('update')}}</p>
        </center>
        </div>
@endif<div id="titulo">
    <p id="header">Agenda Electronica</p>
</div>


<br>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>