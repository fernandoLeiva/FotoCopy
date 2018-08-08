<input type="hidden" id="permission" value="<?php echo $permission;?>">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <center>
          <h2> Colegios </h2>
          
          <a href="https://www.jqueryscript.net/" id="link">Siempre Siempre?</a>
          </center>
          <?php
          if (strpos($permission,'Add') !== false) {
            echo '<button class="btn btn-block btn-success" style="width: 100px; margin-top: 10px;" data-toggle="modal" data-target="#modalAgregar" id="btnAdd" title="Nueva">Agregar</button>';
          }
          ?>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="Colegio" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="20%">Acciones</th>
                <th>id</th>
                <th>nombre</th>
                <th>direccion</th>
                <th>telefono</th>
                <th>email</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($list as $f)
                {

                  echo '<tr>';
                  echo '<td>';

                  if (strpos($permission,'Edit') !== false) {
                   echo '<i class="fa fa-fw fa-pencil" style="color: #8eb29a; cursor: pointer; margin-left: 15px;" title="Editar"  ></i>';
                  }

                  if (strpos($permission,'Del') !== false) {
                   echo '<i class="fa fa-trash" style="color: #8eb29a; cursor: pointer; margin-left: 15px;" title="Eliminar Colegio" ></i>';
                  }
                  if (strpos($permission,'View') !== false) {
                    echo '<i class="fa fa-eye" style="color: #8eb29a; cursor: pointer; margin-left: 15px;" title="Ver Detalles" ></i>';
                  }
                  echo '</td>';
                  echo '<td style="text-align: left">'.$f['id'].'</td>';
                  echo '<td style="text-align: left">'.$f['nombre'].'</td>';
                  echo '<td style="text-align: left">'.$f['direccion'].'</td>';
                  echo '<td style="text-align: left">'.$f['telefono'].'</td>';
                  echo '<td style="text-align: left">'.$f['email'].'</td>';

                  echo '</tr>';

                }

              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>

$(document).ready(function() {
    $('#username').editable();
    $("#link").popConfirm({
        title: "Me Amaras por Siempre Siempre?"
    });

});


function guardarColegio(){
      var nombre=$('#nombre').val();
      var direccion=$('#direccion').val();
      var telefono=$('#telefono').val();
      var email=$('#email').val();

    var hayError = false;
    if($('#nombre').val() == '' || $('#direccion').val() == '' || $('#telefono').val() == '' || $('#email').val() == '' )
    {
      hayError = true;
    }
    if(hayError == true){
      $('#error').fadeIn('slow');
      return;
    }
    $('#error').fadeOut('slow');          $.ajax({
             type: 'POST',
             data: {    "nombre":nombre,  "direccion":direccion,  "telefono":telefono,  "email":email },
             url: 'index.php/Colegio/Guardar_Colegio',
             success: function(result){
                 
                $('#modalAgregar').modal('hide');
                 ActualizarPagina();
            },
            error: function(result){
                alert("OPERACIÓN FALLIDA");
            }
          });
    }
    var id_ ="";
    $(".fa-pencil").click(function (e) {

        id_ = $(this).parents('tr').find('td').eq(1).html();
        var nombre = $(this).parents('tr').find('td').eq(2).html();
        var direccion = $(this).parents('tr').find('td').eq(3).html();
        var telefono = $(this).parents('tr').find('td').eq(4).html();
        var email = $(this).parents('tr').find('td').eq(5).html();

        $('#cuerpoModalEditar').html(' <div class="row">'+
          '<div class="col-xs-12">'+
            '<div class="alert alert-danger alert-dismissable" id="errorE" style="display: none">'+
             '<h4><i class="icon fa fa-ban"></i> Error!</h4>'+
             'Revise que todos los campos esten completos'+
           '</div>'+
         '</div>'+
       '</div>'+
          '<div class="row">'+
            '<div class="col-xs-4">'+
               ' <label style="margin-top: 7px;">nombre <strong style="color: #dd4b39">*</strong>: </label>'+
            '</div>'+
            '<div class="col-xs-5">'+
                '<input type="text" class="form-control"  id="nombreE" value="'+nombre+'" >'+
            '</div>'+
        '</div><br>'+
          '<div class="row">'+
            '<div class="col-xs-4">'+
               ' <label style="margin-top: 7px;">direccion <strong style="color: #dd4b39">*</strong>: </label>'+
            '</div>'+
            '<div class="col-xs-5">'+
                '<input type="text" class="form-control"  id="direccionE" value="'+direccion+'" >'+
            '</div>'+
        '</div><br>'+
          '<div class="row">'+
            '<div class="col-xs-4">'+
               ' <label style="margin-top: 7px;">telefono <strong style="color: #dd4b39">*</strong>: </label>'+
            '</div>'+
            '<div class="col-xs-5">'+
                '<input type="text" class="form-control"  id="telefonoE" value="'+telefono+'" >'+
            '</div>'+
        '</div><br>'+
          '<div class="row">'+
            '<div class="col-xs-4">'+
               ' <label style="margin-top: 7px;">email <strong style="color: #dd4b39">*</strong>: </label>'+
            '</div>'+
            '<div class="col-xs-5">'+
                '<input type="text" class="form-control"  id="emailE" value="'+email+'" >'+
            '</div>'+
        '</div><br>'        );
        $('#modalEditar').modal('show');

    });    function editarColegio(){
     var id=id_;
      var nombre=$('#nombreE').val();
      var direccion=$('#direccionE').val();
      var telefono=$('#telefonoE').val();
      var email=$('#emailE').val();

    var hayError = false;
    if($('#nombreE').val() == '' || $('#direccionE').val() == '' || $('#telefonoE').val() == '' || $('#emailE').val() == '' )
    {
      hayError = true;
    }
    if(hayError == true){
      $('#errorE').fadeIn('slow');
      return;
    }
    $('#errorE').fadeOut('slow');
     $.ajax({
       type: 'POST',
       dataType : "json",
       data: {"id" : id,  "nombre":nombre,  "direccion":direccion,  "telefono":telefono,  "email":email },
       url: 'index.php/Colegio/Modificar_Colegio',
       success: function(result){
         
       $('#modalEditar').modal('hide');
        ActualizarPagina();
        },
        error: function(result){
            alert("OPERACIÓN FALLIDA");
            console.log(result);
        }

       });

    }
  $(".fa-trash").click(function (e) {

    id_ = $(this).parents('tr').find('td').eq(1).html();
    $('#modalEliminar').modal('show');

  });

  function eliminarColegio(){

    $.ajax({
      type: 'POST',
      data: { "id": id_},
      url: 'Colegio/Eliminar_Colegio',
      success: function(data){
         
        ActualizarPagina();
      },

      error: function(result){
        alert("OPERACION FALLIDA");
      }
    });

  }function ActualizarPagina(){ //Funcion Resfresca
  $('#content').empty();
  $("#content").load("<?php echo base_url(); ?>index.php/Colegio/index/<?php echo $permission; ?>");

}$(function () {

      $('#Colegio').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "language": {
                "lengthMenu": "Ver _MENU_ filas por página",
                "zeroRecords": "No hay registros",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrando de un total de _MAX_ registros)",
                "sSearch": "Buscar:  ",
                "oPaginate": {
                    "sNext": "Sig.",
                    "sPrevious": "Ant."
                  }
          }
      });
    });</script>
<<div class="modal" id="modalAgregar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Agregar Colegio</h4>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-danger alert-dismissable" id="error" style="display: none">
             <h4><i class="icon fa fa-ban"></i> Error!</h4>
             Revise que todos los campos esten completos
           </div>
         </div>
       </div>

        <div class="row">
        <div class="col-xs-4">
                        <label style="margin-top: 7px;">nombre <strong style="color: #dd4b39">*</strong>: </label>
                        </div>
                        <div class="col-xs-5">
                        <input type="text" class="form-control"  id="nombre" >
                        </div>
</div><br>
        <div class="row">
        <div class="col-xs-4">
                        <label style="margin-top: 7px;">direccion <strong style="color: #dd4b39">*</strong>: </label>
                        </div>
                        <div class="col-xs-5">
                        <input type="text" class="form-control"  id="direccion" >
                        </div>
</div><br>
        <div class="row">
        <div class="col-xs-4">
                        <label style="margin-top: 7px;">telefono <strong style="color: #dd4b39">*</strong>: </label>
                        </div>
                        <div class="col-xs-5">
                        <input type="text" class="form-control"  id="telefono" >
                        </div>
</div><br>
        <div class="row">
        <div class="col-xs-4">
                        <label style="margin-top: 7px;">email <strong style="color: #dd4b39">*</strong>: </label>
                        </div>
                        <div class="col-xs-5">
                        <input type="text" class="form-control"  id="email" >
                        </div>
</div><br>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" onclick="guardarColegio()" >Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><!-- Modal -->
<div class="modal" id="modalEditar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editar Colegio</h4>
      </div>
      <div class="modal-body" id="cuerpoModalEditar">
       <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-danger alert-dismissable" id="error" style="display: none">
             <h4><i class="icon fa fa-ban"></i> Error!</h4>
             Revise que todos los campos esten completos
           </div>
         </div>
       </div>


      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" onclick="editarColegio()" >Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><!-- Modal -->
<div class="modal" id="modalEliminar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Eliminar Colegio</h4>
      </div>
      <div class="modal-body" id="cuerpoModalEditar">
       <h5>¿Desea eliminar el registro?</h5>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="eliminarColegio()" >Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
