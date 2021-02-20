<!DOCTYPE html>
<html>
<head>
	<title>Cuenta de Usuario </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


<style type="text/css">

table {
  border-collapse: collapse;
  margin:auto; 
  width: 85%;
}

thead{
	background-color:  rgb(236, 236, 236);
	border:  rgb(236, 236, 236) 1px solid;
}
th{
	

}
td{
	
}
#nameaplication{
color: rgb(172, 172, 172);
	font-size: 1.7em;
	text-align: center;
}
#footertable{
	background-color:  rgb(236, 236, 236);
	color: rgb(172, 172, 172);
	font-size: 1em;
	text-align: center;
}
#hello{
	color: black;
	font-size: 1.5em;
	font-weight: bold;
}
</style>

<table>
	<thead>
		<th>
			<p id="nameaplication">
              Agenda
            </p>
		</th>
	</thead>
	<tr>
		<td id="hello">
			<br>
			Hola !
		</td>
	</tr>
	<tr>
		<td>
			<br>
		</td>
	</tr>
	<tr>
		<td>El registro del Nuevo Usuario:  <b>{{$user['name']}}</b> se ha realizado satisfactoriamente</td>
		
	</tr>
	<tr>
		<td>Su E-Mail es:  {{$user['email']}} </td>
	</tr>
	<tr>
		<td id="hello">
			<br>
			<center>
			<a href="http://localhost/agenda/public/">Agenda Electronica</a>
		    </center>
		</td>
	</tr>
	<tr>
		<td><br><br><p id="footertable">© 2019 Agenda. Todos los derechos reservados.</p></td>
	</tr>
</table>

</body>
</html>