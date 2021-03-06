<!DOCTYPE html>
<html>
<head>
  <title>PDF Taller de Administración Vespertino</title>
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
table{
  background-color: white;
  font-size: .8em;
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

#pdf{
  width: 80%;
  height: 200px; 
  margin: auto;
}
</style> 
</head>
<body>
<!------------------------------------------------------------*----------------------------------------------------------->
  <div id="titulo">
    <p id="header">Reporte PDF Taller de Administración Vespertino</p> 
  </div>
<!------------------------------------------------------------*----------------------------------------------------------->
<div id="pdf">
<center>
<table align="center" border="1" style="text-align: center;">
    <tr>
      <th>Id</th>
      <th>Reservación Realizada</th>
      <th>Fecha y Hora Inicio</th>
      <th>Fecha y Hora Final</th>
      <th>Alumnos</th>
      <th>Disponibilidad</th>
    </tr>
      @foreach($admin1 as $admin)
    <tr>
      <td>{{$admin->id_lab_talleradmin_ves}}</td>
      <td>{{$admin->created_at}}</td>
      <td>{{$admin->start_date}}</td>
      <td>{{$admin->end_date}}</td>
      <td>{{$admin->numalumnos_talleradmin_ves}}</td>
      <td>{{$admin->title}}</td>
    </tr>
      @endforeach
    </table>
</center>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</body>
</html>