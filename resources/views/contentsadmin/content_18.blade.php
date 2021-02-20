<!DOCTYPE html>
<html>
<head>
  <title>Display Users Inactivos</title>
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
table{
  background-color: white;
}
th, td{ 
    padding: 10px;
  }
  thead{
    background-color: rgb(47, 50, 49);
    border-bottom: solid 5px rgb(0,0,0);
    color: white;
  }
  tr:nth-child(even){
    background-color: #ddd;
  }
  tr:hover td{
    background-color: rgb(113, 113, 113);
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
#agregaruser{
    width: 85%;
    text-align: right;
}

@include('contentsadmin.content_20')

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
   <p id="header">Activación de Usuarios</p>
</div>
<!------------------------------------------------------------*----------------------------------------------------------->
@if(Session::has('activ'))

        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: green; font-weight: bold; font-size: 1.1em">{{Session::get('activ')}}</p>
        </center>
       </div>
@endif

@if(Session::has('activ_'))
        <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: blue; font-weight: bold; font-size: 1.1em">{{Session::get('activ_')}}</p>
        </center>
        </div>
@endif

@if(Session::has('desactiv'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: green; font-weight: bold; font-size: 1.1em">{{Session::get('desactiv')}}</p>
        </center>
        </div>
@endif

@if(Session::has('del'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: green; font-weight: bold; font-size: 1.1em">{{Session::get('del')}}</p>
        </center>
        </div>
@endif

<div id="agregaruser">
   <a href="{{URL::action('administrador@index2')}}" class="btn btn-primary">Registrar Usuario</a>
</div>
<br>
<div id="agregaruser">
   <a href="{{URL::action('usercontroller@index2')}}" class="btn btn-primary">Usuarios Activos</a>
</div>
<br>
<center>
  <table>
    <thead>
      <th>Id Usuario</th>
      <th style="text-align: center;">Registro</th>          
      <th>Nombre Usuario</th>
      <th style="text-align: center;">E-Mail</th>
      <th>Estado del Usuario</th>
      <th style="text-align: center;">Acción</th>
    </thead>
    @foreach($user as $user1)
    <tr> 
      <td data-label="Id Usuario"  style="text-align: center;">{{$user1->id}}</td>
      <td data-label="Registro" >{{$user1->created_at}}</td>
      <td data-label="Nombre Usuario" >{{$user1->name}}</td>
      <td data-label="E-Mail" >{{$user1->email}}</td>
      <td data-label="Estado del Usuario"  style="color: red; font-weight: bold; text-align: center; font-size: 1em;">Inactivo</td>
      <td data-label="Acción"  class="user">
        <a href="{{URL::action('usercontroller@activaruser',['id'=>$user1->id])}}" class="btn btn-success" onclick="return confirm('¿Seguro que quieres Activar a {{$user1->name}} ?')">
          Activar
        </a>
        <a href="{{URL::action('usercontroller@eliminar',['id'=>$user1->id])}}" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres Eliminar a {{$user1->name}} ?')">
          Eliminar
        </a>
        <a href="{{URL::action('usercontroller@edit',['id'=>$user1->id])}}" class="btn btn-primary">
          Modificar 
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</center> 
<br><br>
<center>
<a href="javascript:history.go(-1)"><img src="atras.png" style="width: 5%"></a>
</center>
<br><br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>