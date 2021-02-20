<!DOCTYPE html>
<html>
<head>
  <title>Informática Vespertino Modificación</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
		<p id="header">[Modificación] Laboratorio de Informática Vespertino</p>
	</div>
<!------------------------------------------------------------*----------------------------------------------------------->
<br>
<br>

<form id="formulario_aula1" action="{{route('informatica_vespertinoedit')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}


<div id="info_documento">
  <div id="codigo">
    <p>Código: 
      <select name="codigo_infor_ves" >
      <option value="15-528-PO-15-F03" >15-528-PO-15-F03</option>
      </select>
    </p>
  </div>
  <div id="Campo2">
    <p>Revisión: 
      <select name="revision_infor_ves">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
  <div id="Campo3">
    <p>Fecha de Aprovación: 
      <select name="fecha_apro_infor_ves">
      <option value="26/06/2018" >26/06/2018</option>
      </select>
    </p>
  </div>
    <div id="Campo4">
    <p>Página: 
      <select name="pagina_infor_ves">
      <option value="01" >01</option>
      </select>
    </p>
  </div>
</div>
<input type="text" name="id_lab_infor_ves" value="{{$informatica_vespertino1->id_lab_infor_ves}}" style="display:none" readonly>
<br>
  <div id="titulo_form">
    <p id="titulo_form_1">Laboratorio Informática No INFORMATICA VESPERTINO</p>
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
      <input type="text" class="form-control" placeholder="Número y Nombre Practica" required="" value="{{$informatica_vespertino1->nombreprac_infor_ves}}" name="nombreprac_infor_ves">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Unidad de Aprendizaje</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Unidad de Aprendizaje" required="" value="{{$informatica_vespertino1->unidad_infor_ves}}" name="unidad_infor_ves">
    </div>
  </div>

  <div class="form-group">
    <center>
      <label>Desarrollo de la Practica</label>
    </center>
    <textarea class="form-control"rows="6" required="" value="{{$informatica_vespertino1->desarrollo_infor_ves}}" name="desarrollo_infor_ves">{{$informatica_vespertino1->desarrollo_infor_ves}}</textarea>
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
      <input type="text" class="form-control" placeholder="Número de Alumnos" required="" value="{{$informatica_vespertino1->numalumnos_infor_ves}}" name="numalumnos_infor_ves">
    </div>

  </div>
  <p style="font-size: 20px; font-weight: bold;">Formato 24Hrs</p>
   <div class="form-group row">
      <label class="col-sm-2 col-form-label">Fecha y Hora de Inicio</label>
    <div class="col-sm-4">
      <input type="datetime" class="form-control" name="start_date" value="{{$informatica_vespertino1->start_date}}" class="date" readonly="">
    </div>
    <label class="col-sm-2 col-form-label">Fecha y Hora de Finalización</label>
    <div class="col-sm-4">
      <input type="datetime" class="form-control" name="end_date" value="{{$informatica_vespertino1->end_date}}" class="date" readonly="">
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
    <textarea class="form-control" rows="10" required="" value="{{$informatica_vespertino1->observaciones_infor_ves}}" name="observaciones_infor_ves">{{$informatica_vespertino1->observaciones_infor_ves}}</textarea>
  </div>
  <center>
    <br>
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