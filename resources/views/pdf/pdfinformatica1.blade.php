<!DOCTYPE html>
<html>
<head>
  <title>PDF Informática</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type = "text/javascript" src = "jquery-3.3.1.js"> </script> 
  <link rel="stylesheet" type="text/css" href="formulario.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> 
<body>

<!------------------------------------------------------------Logos----------------------------------------------------------->
    <img  id="img1_estado" src="estadodemexico.png" width="35%">


    <p  id="texto">COLEGIO DE EDUCACIÓN PROFESIONAL  TÉCNICA DEL ESTADO DE MÉXICO</p>

 
    <img  id="img2_conalep" src="conalep.png" width="100%" height="">
 <br>
 <br>
 <br>
 <br>
 <!------------------------------------------------------------Informacion----------------------------------------------------------->
 <!------Tabla 1-------->

<center>
<table>
  <th><td>Código:15-528-PO-15-F03  </td></th>
  <th><td>   Revisión:01 </td></th>
  <th><td>  Fecha de Aprovación:26/06/2018 </td></th>
  <th><td>    Página:01</td></th>
</table>
</center>
 <!--------------------->  
<div id="titulo_form">
    <p id="titulo_form_1">Laboratorio Informática No INFORMATICA MATUTINO</p>
</div>
<br>
 <!------Tabla 2-------->
<center>
<table>
    <tr>
      <th>Módulo</th>
      <th></th>
      <th></th>
      <th></th>
      <td>{{$events->modulo_id}}</td>
    </tr>
    <tr>
      <th>Número y Nombre Practica</th>
      <th></th>
      <th></th>
      <th></th>
      <td>{{$events->nombreprac_infor_mat}}</td>
    </tr>
    <tr>
      <th>Unidad de Aprendizaje</th>
      <th></th>
      <th></th>
      <th></th>
      <td>{{$events->unidad_infor_mat}}</td>
    </tr>
    </table>
</center>
<br><br>


<center><p><b>Desarrollo de la Practica</b></p></center>
<textarea class="form-control" rows="10"  name="observaciones_infor_mat">{{$events->desarrollo_infor_mat}}</textarea>
<br>
 <!------Tabla 3-------->
<center>
<table>
    <tr>
      <th>Docente</th>
      <td>{{$events->docente_id}}</td>
      <th></th>
      <th></th>
      <th>Número de Alumnos</th>
      <td>  {{$events->numalumnos_infor_mat}}</td>
    </tr>
</table>
</center>
<br>
 <!------Tabla 4-------->
<table>
    <tr>
      <th>Fecha y Horario  de</th>
      <th></th>
      <th></th>
      <th></th>
      <td>{{$events->start_date}}</td>
      <td></td>
      <td><b>a</b>  {{$events->end_date}}</td>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <td></td>
    </tr>
</table>
<br>
<center><p><b>OBSERVACIONES Y CONDICIONES DEL LABORATORIO</b></p></center>
<br>
<textarea class="form-control" rows="30"  name="observaciones_infor_mat">{{$events->observaciones_infor_mat}}</textarea>
<br>
<br>
<center>
<img src="firma.png" width="75%">
</center>
<br><br>
 <!------Tabla 5-------->
<center>
<table>
    <tr>
      <th>Fecha de Reservación</th>
      <th></th>
      <th></th>
      <th></th>
      <td>{{$events->created_at}}</td>
    </tr>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>