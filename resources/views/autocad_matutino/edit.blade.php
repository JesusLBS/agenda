<!DOCTYPE html>
<html>
<head>
  <title>Autocad Matutino Modificación</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="formulario.css">

    <style type="text/css">
    
/*Formulario*/
#formulario_aula1{
  background-color: white;
  width: 80%;
  margin: auto;
  font-size: 1em;
  color: black;
}
div#titulo_form{
  width:100%;
  margin-top:17px;

}
p#titulo_form_1{
  text-align: center;
  font-size: 1.5em;
}
#texto{
  display: inline-block;
    width: 40%;
    height: 10%;
  float: left;
  border: 1px solid white;
  font-weight: bold;
  text-align: center;
}

#info_documento{

  background-color: white;  
  line-height: 30px; 
  width: 100%;
}
#codigo{
  display: inline-block;
  background-color: white;
  border: 1px solid white;
  width: 30%;
}

#Campo2{
  display: inline-block;
  background-color: white;
  border: 1px solid white;
  width: 18%;
}

#Campo3{
  display: inline-block;
  background-color: white;
  border: 1px solid white;
  width: 30%;
}

#Campo4{
  display: inline-block;
  background-color: white;
  border: 1px solid white;
  width: 20%;
}
/*Titulo*/
div#titulo{
  width:100%;
  margin-top:17px;
}
p#header{
  text-align: center;
  font-size: 2.5em;
  color:#9a9a9a;
}

  </style>


</head>
<body>
	<div id="titulo">
		<p id="header"> [Modificación] Laboratorio de Autocad Matutino</p>
	</div>
<!------------------------------------------------------------*----------------------------------------------------------->
<br>
<br>
<br>
<br>
<br>
<form id="formulario_aula1" action="{{route('autocad_matutinoedit')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}


<div id="info_documento">
  <div id="codigo">
    <p>Código: 
      <select name="codigo_autocad_mat" >
      <option value="15-528-PO-15-F03" >15-528-PO-15-F03</option>
      </select>
    </p>
  </div>
  <div id="Campo2">
    <p>Revisión: 
      <select name="revision_autocad_mat">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
  <div id="Campo3">
    <p>Fecha de Aprovación: 
      <select name="fecha_apro_autocad_mat">
      <option value="26/06/2018" >26/06/2018</option>
      </select>
    </p>
  </div>
    <div id="Campo4">
    <p>Página: 
      <select name="pagina_autocad_mat">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
</div>
<input type="text" name="id_lab_autocad_mat" value="{{$autocad_matutino1->id_lab_autocad_mat}}" style="display:none" readonly>
<br>
  <div id="titulo_form">
    <p id="titulo_form_1">Laboratorio Autocad No AUTOCAD MATUTINO</p>
  </div>
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
      <input type="text" class="form-control" placeholder="Número y Nombre Practica" required="" value="{{$autocad_matutino1->nombreprac_autocad_mat}}" name="nombreprac_autocad_mat">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Unidad de Aprendizaje</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Unidad de Aprendizaje" required="" value="{{$autocad_matutino1->unidad_autocad_mat}}" name="unidad_autocad_mat">
    </div>
  </div>

  <div class="form-group">
    <center>
      <label>Desarrollo de la Practica</label>
    </center>
    <textarea class="form-control"rows="6" required="" value="{{$autocad_matutino1->desarrollo_autocad_mat}}" name="desarrollo_autocad_mat">{{$autocad_matutino1->desarrollo_autocad_mat}}</textarea>
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
      <input type="text" class="form-control" placeholder="Número de Alumnos" required="" value="{{$autocad_matutino1->numalumnos_autocad_mat}}" name="numalumnos_autocad_mat">
    </div>
  </div>
 <p style="font-size: 20px; font-weight: bold;">Formato 24Hrs</p>
   <div class="form-group row">
      <label class="col-sm-2 col-form-label">Fecha y Hora de Inicio</label>
    <div class="col-sm-4">
      <input type="datetime" class="form-control" name="start_date" value="{{$autocad_matutino1->start_date}}" class="date" readonly="">
    </div>
    <label class="col-sm-2 col-form-label">Fecha y Hora de Finalización</label>
    <div class="col-sm-4">
      <input type="datetime" class="form-control" name="end_date" value="{{$autocad_matutino1->end_date}}" class="date" readonly="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
      <input type="datetime-local" class="form-control" name="start_date" class="date" required="">
    </div>
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
      <input type="datetime-local" class="form-control" name="end_date" class="date" required="">
    </div>
  </div>
  <br>
  <div class="form-group">
    <center>
      <label>OBSERVACIONES Y CONDICIONES DEL LABORATORIO</label>
    </center>
    <textarea class="form-control" rows="10" required="" value="{{$autocad_matutino1->observaciones_autocad_mat}}" name="observaciones_autocad_mat">{{$autocad_matutino1->observaciones_autocad_mat}}</textarea>
  </div>
  <center>
     <input class="btn btn-outline-primary" type="submit" name="guardar_aula1" value="Guardar">
     <input type="button" class="btn btn-outline-danger"  value="Cancelar" name="Back2" onclick="history.back()"/>
  </center>

</form>

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



