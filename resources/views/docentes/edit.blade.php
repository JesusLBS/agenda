<!DOCTYPE html>
<html>
<head>
  <title>Docente Modificación</title>
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
		<p id="header">[Modificación] Docente</p>
	</div>
<!------------------------------------------------------------*----------------------------------------------------------->
<br>
<br>

<form id="formulario_aula1" action="{{route('docenteedit')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
<input type="text" name="id_docente" value="{{$docente->id_docente}}" style="display:none" readonly>
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre Docente</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nombre Docente" required="" name="nombre_docente"
       value="{{$docente->nombre_docente}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Apellido Paterno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nombre Docente" required="" name="apellidopaterno_docente"
       value="{{$docente->apellidopaterno_docente}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Apellido Materno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nombre Docente" required="" name="apellidomaterno_docente"
       value="{{$docente->apellidomaterno_docente}}">
    </div>
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