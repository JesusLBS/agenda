<!DOCTYPE html>
<html>
<head>
  <title>Display Autocad Matutino</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type = "text/javascript" src = "jquery-3.3.1.js"></script> 
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
/*Titulo*/
div#titulo{
  width:100%;
  margin-top:16px;
  font-weight: bold;
}
p#header{
  text-align: center;
  font-size: 2.7em;
  color:rgb(0, 0, 0);
  font-weight: bold;
  font-family: "Latin Modern Roman 10";
  font-style: italic;
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
ul li a{
  /*transiciones*/
  -webkit-transition:500ms ease;
  -o-transition:500ms ease;
  transition:500ms ease;
}

@include('contentsadmin.content_20')

#crib{
  width: 9%;
  color: white;
  margin: auto;
  background: #08088A;
  
  padding: .5%;
  border-radius: 10px;
  font-weight: bold;
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
    <p id="header">Laboratorio de Autocad Matutino</p>
  </div>
  <br>
<!---------------------------------------------Criterio de Busqueda------------------------------------------------------------->
 
 
<form   action="{{route('buscar_autocad')}}" method="POST" align="center" style="color:#FF0000"; enctype="multipart/form-data" >
      {{csrf_field()}}

     <b id="crib">Busqueda por Fecha y Hora Inicio: </b><input type="text" name="criterio"  placeholder="YYYY-MM-DD   00:00:00" onkeypress="return numeros(event)">

      <br>
      <br>
      <input class="btn btn-outline-dark " type="submit" name="buscar_autocad" value="Buscar">
      <br>
      <br>
</form>

<!-----------------------------------------------------Tabla Consulta--------------------------------------------------------->
<center>
  <table>
    <thead>     
      <th>Id</th>
      <th>Reservación Realizada</th>    
      <th>Fecha y Hora Inicio</th>
      <th>Fecha y Hora Final</th>
      <th>Alumnos</th>
      <th>Disponibilidad</th>
      <th style="text-align: center;">Acción</th>

    </thead> 
    @foreach($autocad1 as $autocad)
    <tr> 
      <td data-label="ID">{{$autocad->id_lab_autocad_mat}}</td>
      <td data-label="Reservación">{{$autocad->created_at}}</td>
      <td data-label="Fecha/Hora Inicio">{{$autocad->start_date}}</td>
      <td data-label="Fecha/Hora Final">{{$autocad->end_date}}</td>
      <td data-label="Alumnos">{{$autocad->numalumnos_autocad_mat}}</td>
      <td data-label="Disponibilidad" style="color: red; font-weight: bold; font-size: 1.4em;">{{$autocad->title}}</td>
      <td data-label="Acción"><a href="{{URL::action('lab_autocadcontroller@eliminar',['id_lab_autocad_mat'=>$autocad->id_lab_autocad_mat])}}" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres la borrar la hora?')">Eliminar</a>
      <a href="{{URL::action('lab_autocadcontroller@edit',['id_lab_autocad_mat'=>$autocad->id_lab_autocad_mat])}}" class="btn btn-primary">Modificar</a>
      </td>
    </tr>
    @endforeach
  </table>
</center> 
<br><br>
<center> 
  <table id="descarga">
    <thead>
      <th>Descarga en Formato</th>  
      <th>Descarga de Registros</th>            
    </thead> 
    <tr> 
      <td data-label="PDF Formato">        
        <form action="{{URL::action('pdfcontroller@autocadm',['criterio'=>$criterio])}}" method="get">
          <button type="submit" class="btn btn-danger">Descargar PDF</button>
        </form>

      </td>
      <td data-label="PDF Refistros">        
        <form action="{{URL::action('pdfcontroller@autocadm1_',['criterio'=>$criterio])}}" method="get">
          <button type="submit" class="btn btn-danger">Descargar PDF</button>
        </form>

      </td>
    </tr>
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