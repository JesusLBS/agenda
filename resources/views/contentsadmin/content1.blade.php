<br>
<div id="modal_form">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Administrar
</button>
<br><br>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="  background-image: linear-gradient(to right,  rgb(0, 174, 63), rgb(191, 252, 231));
">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div id="titulo_form">
        <h5> <p id="titulo_form_1" style="font-weight: bold;">Administrar</p></h5>
       </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
              <!--****************************************-->
<br>
<br><br>
<form id="formulario_aula1"  enctype="multipart/form-data">
  <div class="update">
    <center>
       <a href="{{URL::action('docentecontroller@index')}}" class="btn btn-primary" style="color: white">Registrar Docente</a><br><br>
       <a href="{{URL::action('modulocontroller@index')}}" class="btn btn-primary" style="color: white">Registrar Módulo </a><br><br>
       <a href="{{URL::action('administrador@actualizaragenda')}}" id="update" class="btn btn-warning" style="color: white">Actualizar Agenda</a><br><br>
       <a href="{{URL::action('usercontroller@index')}}" class="btn btn-primary" style="color: white">Activación y Registro Usuarios</a><br><br>
  </center>
</div> 

<br><br>
  <center>
     <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
  </center>
</form>
<br>
    <!--****************************************-->
      </div>
    </div>
  </div>
</div>