/********************************************************************/
function establece_caja(){
 $.ajax({
          beforeSend: function(){
           },
          url: 'establece_caja.php',
          type: 'POST',
          data: 'caja='+$("#numcaja").val(),
          success: function(x){
            alert("Se establecio el numero de caja en esta sesion...!");
            window.location='parametros.php';
             },
           error: function(jqXHR,estado,error){
             $("#btn-caja").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al establecer el numero de caja, contacte a soporte inmediatamente...!");
           }
           });
}
/********************************************************************/
function establece_name_empresa(){
    $.ajax({
          beforeSend: function(){
           },
          url: 'estabelece_name_empresa.php',
          type: 'POST',
          data: 'name='+$("#nombre_empresa").val()+'&dom='+$("#dom_empresa").val(),
          success: function(x){
            alert("Se establecio el nombre de la empresa correctamente...!");
            window.location='parametros.php';
             },
           error: function(jqXHR,estado,error){
             $("#btn-name").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al establecer el nombre de la empresa, contacte a soporte inmediatamente...!");
           }
           });
}
/*****************************************************************************/
function registra_usr(){
  if($("#nombre").val()==""||$("#clave").val()==""||$("#pass").val()==""||$("#rol").val()==""){
    alert("Debes de completar todos los campos...");
    $("#nombre").focus();
  }else{
    $.ajax({
          beforeSend: function(){
            $('#btn-reg-usr').prop('disabled', true);
            $('#btn-reg-usr').html("Procesando...");
           },
          url: 'registra_users.php',
          type: 'POST',
          data: 'nombre='+$("#nombre").val()+'&clave='+$("#clave").val()+'&pass='+$("#pass").val()+'&rol='+$("#rol").val(),
          success: function(x){

              if(x=="PROCESADO"){
                alert("Se registro el usuario correctamente...");
               $("#nombre").html('');
               $("#clave").html('');
               $("#pass").html('');
               $("#btn-reg-usr").html("<i class='fa fa-check-circle'></i>Registrar");
               $('#btn-reg-usr').prop('disabled', false);
               pone_lista_lineas();
              }
              if(x=="ERROR"){
                alert("Ocurrio un error al realizar el registro del usuario, por favor consulte a Soporte inmediatamente...!");
              }
              if(x=="EXISTE"){
                 alert("El nombre y/o usuario ingresados, ya se encuentran registrados...!");
               $("#btn-reg-usr").html("<i class='fa fa-check-circle'></i>Registrar");
               $('#btn-reg-usr').prop('disabled', false);
              }
              pone_users_registrados();
             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al registrar el usuario");
           }
           });
           }
}
/***********************************************************************************/
function pone_users_registrados(){

   $.ajax({
          beforeSend: function(){
            $("#users_registrados").html("<img src='dist/img/default.gif'></img>");
           },
          url: 'pone_users_regs.php',
          type: 'POST',
          data: null,
          success: function(x){
             $("#users_registrados").html(x);
             },
           error: function(jqXHR,estado,error){
             $("#users_registrados").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al consultar usuarios registrados, contacte a soporte inmediatamente...!");
           }
           });
}
/*******************************************************************************/
function busca_garantias(){
  if($("#factura").val()==""){
    alert("Debes ingresar el numero de factura...");
    $("#factura").focus();
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'busca_garantias.php',
          type: 'POST',
          data: 'factura='+$("#factura").val(),
          success: function(x){
              if(x!='0'){
                $("#garantias_registradas").html(x);

              }

             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al buscar el usuario");
           }
           });
           }
}
/***********************************************************************************/
function busca_reclamos(){
  if($("#factura").val()==""){
    alert("Debes ingresar el numero de factura...");
    $("#factura").focus();
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'busca_reclamos.php',
          type: 'POST',
          data: 'factura='+$("#factura").val(),
          success: function(x){
              if(x!='0'){
                $("#reclamos_registrados").html(x);

              }

             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al buscar reclamos");
           }
           });
           }
}
/***********************************************************************************/
function pone_garantias(){

   $.ajax({
          beforeSend: function(){
           },
          url: 'pone_garantias_regs.php',
          type: 'POST',
          data: null,
          success: function(x){
             $("#garantias_registradas").html(x);
             },
           error: function(jqXHR,estado,error){
             $("#garantias_registradas").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al consultar garantias registrados, contacte a soporte inmediatamente...!");
           }
           });
}
/*******************************************************************************/
function elimina_usr(usrid){
  if(usrid==""){
    alert("Debes de completar todos los campos...");
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'elimina_users.php',
          type: 'POST',
          data: 'id='+usrid,
          success: function(x){
              if(x!='0'){
                alert("Se elimino el usuario correctamente...");
              }
              pone_users_registrados();
             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al registrar el usuario, contacte a soporte inmediatamente...!");
           }
           });
           }
}
/***********************************************************************************/
function elimina_reclamo(id,fact){
  if(id==""){
    alert("Debes de completar todos los campos...");
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'elimina_reclamo.php',
          type: 'POST',
          data: 'id='+id,
          success: function(x){
              if(x!='0'){
                alert("Se elimino el reclamo correctamente...");
              }
              pone_reclamos_registrados(fact);
             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al eliminar el reclamo, contacte a soporte inmediatamente...!");
           }
           });
           }
}
/***********************************************************************************/
function pone_reclamos_registrados(id){

    $.ajax({
          beforeSend: function(){
           },
          url: 'busca_reclamos.php',
          type: 'POST',
          data: 'factura='+id,
          success: function(x){
              if(x!='0'){
                $("#reclamos_registrados").html(x);

              }

             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al buscar reclamos");
           }
           });

}
/***********************************************************************************/

function edita_usr(usrid){
  if(usrid==""){
    alert("Debes de completar todos los campos...");
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'pone_edit_users.php',
          type: 'POST',
          data: 'id='+usrid,
          success: function(x){
                $("#useredit").html(x);
              pone_users_registrados();
             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al consultar el usuario, contacte a soporte inmediatamente...!");
           }
           });
           }
}
/***********************************************************************************/
function edita(usrid){
  if($("#nombre").val()==""||$("#clave").val()==""||$("#pass").val()==""||$("#rol").val()==""){
    alert("Debes de completar todos los campos...");
    $("#nombre").focus();
  }else{
    $.ajax({
          beforeSend: function(){
           },
          url: 'edita_users.php',
          type: 'POST',
          data: 'id='+usrid+'&nombre='+$("#nombre").val()+'&clave='+$("#clave").val()+'&pass='+$("#pass").val()+'&rol='+$("#rol").val(),
          success: function(x){
              if(x!='0'){
                alert("Se edito el usuario correctamente...");
              }
              pone_users_registrados();
             },
           error: function(jqXHR,estado,error){
             $("#btn-reg-usr").html('Hubo un error: '+estado+' '+error);
             alert("Hubo un error al registrar el usuario");
           }
           });
           }
}
/***********************************************************************************/
