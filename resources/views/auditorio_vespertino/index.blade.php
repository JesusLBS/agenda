<!DOCTYPE html>
<html>
<head>
  <title>Auditorio Vespertino</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type = "text/javascript" src = "jquery-3.3.1.js"> </script>
  <link rel="stylesheet" type="text/css" href="formulario.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--Calendar-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<!--Calendar-->
<script type="text/javascript">
//Solo Numeros Campo Numero Alumnos
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
        tecla_especial = true;
        break;
      } 
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
      return false;
  }
</script> 
<style type="text/css">
*{
  margin: 0px;
  padding: 0px;
}

body{
background-image: linear-gradient(to right, rgb(191, 252, 231),rgb(191, 252, 231), rgb(191, 252, 231));
}
#calendar_{
background-color: rgb(19, 89, 163);

}

#title_calendar{
  background-color: rgb( 10, 31, 51); 
  color: white; 
  text-align: center; 
  font-size: 1.3em;
}
h2{
  color: white; 
  font-size: 3em;
  font-weight: bold;
}
 th, td{
    padding: 10px;
  }
  thead{
    background-color: black;
    border-bottom: solid 5px #58D3F7;
    color: white;
  }
  tr:hover td{
    background-color: green;
    color: white;
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
#modal_form{
  width: 85%;
  text-align: center;
  margin: auto;
}
#edit{
  width: 100%;
  text-align: right;
}
.hora_agenda{
  border-radius: 50%;
  width: 20%;
  height: 48px;
  background-color: rgba(0, 140, 255, 1);
  font-weight: bold;
}

#referencia{
 width: 85%;
 text-align: right;
}
.fc-day:hover{
background-color: white;
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
    <p id="header">Auditorio Vespertino</p>
  </div>
  <br>
<!------------------------------------------------------------*----------------------------------------------------------->
<div id="modal_form">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Agregar Reservación de Laboratorio  <b style="color: black;">Con Reporte PDF</b></button>
<br>
<br>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-sinpdf-modal-xl">Agregar Reservación de Laboratorio  <b style="color: black;">Normal</b></button>
<br>
<br>
<!------------------------------------------------------------*----------------------------------------------------------->
@if(auth()->user()->role_id == 2 )
@include('contentsadmin.content9')
@else
@endif
<!------------------------------------------------------------*----------------------------------------------------------->
  <br>
</div>
 <div>
    <table id="referencia">
      <tr>
        <th>OCUPADO</th>
        <th bgcolor="#FF0000" width="45px" height="35px"></th>
     </tr>
     <tr>
        <th>USO DE AULA  FINALIZADO</th>
        <th bgcolor="#E4FF00" width="45px" height="35px"></th>
     </tr>
    </table>
  </div>
<!------------------------------------------------------------Con reporte PDF-----------------------------------------------------------> 

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <!--****************************************-->
<br>
<br>
<form id="formulario_aula1" action="{{route('auditoriovespertino1')}}" method="POST" enctype="multipart/form-data">

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
<div id="info_documento">
  <div id="codigo">
    <p>Código: 
      <select name="codigo_auditorio_ves">
      <option value="15-528-PO-15-F03" >15-528-PO-15-F03</option>
      </select>
    </p>
  </div>
  <div id="Campo2">
    <p>Revisión: 
      <select name="revision_auditorio_ves">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
  <div id="Campo3">
    <p>Fecha de Aprovación: 
      <select name="fecha_apro_auditorio_ves">
      <option value="26/06/2018" >26/06/2018</option>
      </select>
    </p>
  </div>
    <div id="Campo4">
    <p>Página: 
      <select name="pagina_auditorio_ves">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
</div>
<div id="titulo_form">
    <p id="titulo_form_1">Auditorio No AUDITORIO VESPERTINO</p>
</div>

  <input type="text" name="title" value="Ocupado" style="display:none">
 

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Módulo</label>
    <div class="col-sm-10">
      <select id="modulo" class="form-control" name="modulo_id" required="">
        <option selected></option>
            @foreach($modulo as $modulo1)
            <option value="{{$modulo1->id_modulo}}">{{$modulo1->nombre_modulo}}</option>
            @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Número y Nombre Practica</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Número y Nombre Practica" required="" name="nombreprac_auditorio_ves">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Unidad de Aprendizaje</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Unidad de Aprendizaje" required="" name="unidad_auditorio_ves">
    </div>
  </div>

  <div class="form-group">
    <center>
      <label>Desarrollo de la Practica</label>
    </center>
    <textarea class="form-control"rows="6" required="" name="desarrollo_auditorio_ves"></textarea>
  </div>
 <br>
 <div class="form-group row">
    <label  class="col-sm-1 col-form-label">Docente</label>
    <div class="col-sm-6">
      <select id="modulo" class="form-control" name="docente_id" required="">
        <option selected ></option>
            @foreach($docente as $docente1)
            <option value="{{$docente1->id_docente}}">{{$docente1->nombre_docente}} {{$docente1->apellidopaterno_docente}} {{$docente1->apellidomaterno_docente}}</option>
            @endforeach     
      </select>
    </div>
     <label class="col-sm-2 col-form-label">Número de Alumnos</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="Número de Alumnos" required="" name="numalumnos_auditorio_ves" onkeypress="return numeros(event)">
    </div>
  </div>

  <p style="font-size: 20px; font-weight: bold;">Fecha y Hora de la Reservación:</p>
  <div class="form-group row">
    <div class="col-sm-4">
      <input type="date" name="fecha_reservacion_auditorio_ves" class="form-control"   value="{{old('fecha_reservacion_auditorio_ves',$now->format('Y-m-d'))}}" readonly="">
    </div>
    <div class="col-sm-4">
      <input type="time" name="hora_reservacion_auditorio_ves" class="form-control"   value="{{old('hora_reservacion_auditorio_ves',$now->format('H:i:s'))}}" readonly="">
    </div>
  </div>
   <div class="form-group row">
  </div>

<p style="font-size: 20px; font-weight: bold;">Para el día:</p>
<p style="font-size: 16px; font-weight: bold;">Ejemplo: Formato de llenado: 07-06-2019 03:00 pm</p>

   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Fecha y Hora de Inicio</label>
    <div class="col-sm-4">
      <input type="datetime-local" class="form-control" name="start_date" class="date" required="">
    </div>
    <label class="col-sm-2 col-form-label">Fecha y Hora de Finalización</label>
    <div class="col-sm-4">
      <input type="datetime-local" class="form-control" name="end_date" class="date" required="">
    </div>
  </div>
  <br>
  <div class="form-group">
    <center>
      <label>OBSERVACIONES Y CONDICIONES DEL LABORATORIO</label>
    </center>
    <textarea class="form-control" rows="10" required="" name="observaciones_auditorio_ves"></textarea>
  </div>
  <select name="color" style="display:none" >
      <option value="#FF0000" ></option>
  </select>

  <center>
     <input class="btn btn-outline-primary " type="submit" name="guardar_aula" value="Guardar">
     <button type="" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
  </center>
</form>
<br>
    <!--****************************************-->
    </div>
  </div>
</div>
<br>
<!------------------------------------------------------------Sin reporte PDF-----------------------------------------------------------> 
<div class="modal fade bd-sinpdf-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <!--****************************************-->
<br>
<br>
<form id="formulario_aula1" action="{{route('auditoriovespertino1_')}}" method="POST" enctype="multipart/form-data">

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
<div id="info_documento">
  <div id="codigo">
    <p>Código: 
      <select name="codigo_auditorio_ves">
      <option value="15-528-PO-15-F03" >15-528-PO-15-F03</option>
      </select>
    </p>
  </div>
  <div id="Campo2">
    <p>Revisión: 
      <select name="revision_auditorio_ves">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
  <div id="Campo3">
    <p>Fecha de Aprovación: 
      <select name="fecha_apro_auditorio_ves">
      <option value="26/06/2018" >26/06/2018</option>
      </select>
    </p>
  </div>
    <div id="Campo4">
    <p>Página: 
      <select name="pagina_auditorio_ves">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
</div>
<div id="titulo_form">
    <p id="titulo_form_1">Auditorio No AUDITORIO VESPERTINO</p>
</div>

  <input type="text" name="title" value="Ocupado" style="display:none">
 

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Módulo</label>
    <div class="col-sm-10">
      <select id="modulo" class="form-control" name="modulo_id" required="">
        <option selected></option>
            @foreach($modulo as $modulo1)
            <option value="{{$modulo1->id_modulo}}">{{$modulo1->nombre_modulo}}</option>
            @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Número y Nombre Practica</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Número y Nombre Practica" required="" name="nombreprac_auditorio_ves">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Unidad de Aprendizaje</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Unidad de Aprendizaje" required="" name="unidad_auditorio_ves">
    </div>
  </div>

  <div class="form-group">
    <center>
      <label>Desarrollo de la Practica</label>
    </center>
    <textarea class="form-control"rows="6" required="" name="desarrollo_auditorio_ves"></textarea>
  </div>
 <br>
 <div class="form-group row">
    <label  class="col-sm-1 col-form-label">Docente</label>
    <div class="col-sm-6">
      <select id="modulo" class="form-control" name="docente_id" required="">
        <option selected ></option>
            @foreach($docente as $docente1)
            <option value="{{$docente1->id_docente}}">{{$docente1->nombre_docente}} {{$docente1->apellidopaterno_docente}} {{$docente1->apellidomaterno_docente}}</option>
            @endforeach     
      </select>
    </div>
     <label class="col-sm-2 col-form-label">Número de Alumnos</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="Número de Alumnos" required="" name="numalumnos_auditorio_ves" onkeypress="return numeros(event)">
    </div>
  </div>

  <p style="font-size: 20px; font-weight: bold;">Fecha y Hora de la Reservación:</p>
  <div class="form-group row">
    <div class="col-sm-4">
      <input type="date" name="fecha_reservacion_auditorio_ves" class="form-control"   value="{{old('fecha_reservacion_auditorio_ves',$now->format('Y-m-d'))}}" readonly="">
    </div>
    <div class="col-sm-4">
      <input type="time" name="hora_reservacion_auditorio_ves" class="form-control"   value="{{old('hora_reservacion_auditorio_ves',$now->format('H:i:s'))}}" readonly="">
    </div>
  </div>
   <div class="form-group row">
  </div>

<p style="font-size: 20px; font-weight: bold;">Para el día:</p>
<p style="font-size: 16px; font-weight: bold;">Ejemplo: Formato de llenado: 07-06-2019 03:00 pm</p>

   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Fecha y Hora de Inicio</label>
    <div class="col-sm-4">
      <input type="datetime-local" class="form-control" name="start_date" class="date" required="">
    </div>
    <label class="col-sm-2 col-form-label">Fecha y Hora de Finalización</label>
    <div class="col-sm-4">
      <input type="datetime-local" class="form-control" name="end_date" class="date" required="">
    </div>
  </div>
  <br>
  <div class="form-group">
    <center>
      <label>OBSERVACIONES Y CONDICIONES DEL LABORATORIO</label>
    </center>
    <textarea class="form-control" rows="10" required="" name="observaciones_auditorio_ves"></textarea>
  </div>
  <select name="color" style="display:none" >
      <option value="#FF0000" ></option>
  </select>

  <center>
     <input class="btn btn-outline-primary " type="submit" name="guardar_aula" value="Guardar">
     <button type="" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
  </center>
</form>
<br>
    <!--****************************************-->
    </div>
  </div>
</div>
<br>
<!------------------------------------------------------------Calendar----------------------------------------------------------->
 @if(\Session::has('success'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>
        <p style="color: green; font-weight: bold; font-size: 1.4em">{{ \Session::get('success')}}!!!</p>
        </center>
      </div>
      @endif
<div class="container" id="calendar_">
  <br>
  <div id="calendar_talleradmin_mat">
  <div class="">
       @if(\Session::has('danger'))
      <div class="alert alert-danger">
        <p>{{ \Session::get('danger')}}</p>
      </div>
      @endif

    <div class="colmd-8 col-md-offset-2">
      <div class="panel panel-default">
        <div  class="panel-heading" id="title_calendar">
        Agenda Auditorio Vespertino
        </div>
          <div class="panel-body">
             {!! $calendar->calendar() !!}
             {!! $calendar->script() !!}
          </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>