<!DOCTYPE html>
<html>
<head>
  <title>Display Docentes</title>
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
    <p id="header">Docente</p>
</div>
<!------------------------------------------------------------*----------------------------------------------------------->
<div id="modal_form">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl" >Agregar</button>
    <br>
  <br>
</div>
<!------------------------------------------------------------*----------------------------------------------------------->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <!--****************************************-->
<br>

<form id="formulario_aula1" action="{{route('docentes1')}}" method="POST" enctype="multipart/form-data">

  {{csrf_field()}}
  
<div id="logos">
  <div id="img1_estado">
    <img src="estadodemexico.png" width="35%">
  </div>
  <div id="texto">
    <p>COLEGIO DE EDUCACIÓN PROFESIONAL  TÉCNICA DEL ESTADO DE MÉXICO</p>
  </div>
  <div id="img2_conalep">
    <img src="conalep.png" width="100%" height="">
  </div>
</div>
<div id="titulo_form">
    <p id="titulo_form_1">REGISTRO DE DOCENTE</p>
</div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre Docente</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nombre Docente" required="" name="nombre_docente">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Apellido Paterno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Apellido Paterno" required="" name="apellidopaterno_docente">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Apellido Materno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Apellido Materno" required="" name="apellidomaterno_docente">
    </div>
  </div>
  <label class="radio-inline"><input type="radio" name="activo_docente" value="1" checked>Activo</label>
  <label class="radio-inline"><input type="radio" name="activo_docente" value="0">Inactivo</label>

  <center>
     <input class="btn btn-outline-primary " type="submit" name="guardar_aula1" value="Guardar">
     <button type="" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
  </center>
</form>
<br>
    <!--****************************************-->
    </div>
  </div>
</div>
<br>
@if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if(\Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: green; font-weight: bold; font-size: 1.1em">{{ \Session::get('success')}}</p>
       </center>
      </div>

 

@endif
<center>
  <table>
    <thead>   
      <th>Id</th>      
      <th>Nombre</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th style="text-align: center;">Acción</th>
    </thead>
    @foreach($docente as $docente1)
    <tr>
      <td data-label="ID">{{$docente1->id_docente}}</td>
      <td data-label="Nombre">{{$docente1->nombre_docente}}</td>
      <td data-label="Apellido Paterno" >{{$docente1->apellidopaterno_docente}}</td>
      <td data-label="Apellido Materno" >{{$docente1->apellidomaterno_docente}}</td>
      <td data-label="Acción"  class="docnte">
        <a href="{{URL::action('docentecontroller@desactivar',['id_docente'=>$docente1->id_docente])}}" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres desactivar al Docente {{$docente1->nombre_docente}}?')">
          Desactivar 
        </a>
        <a href="{{URL::action('docentecontroller@edit',['id_docente'=>$docente1->id_docente])}}" class="btn btn-primary">
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