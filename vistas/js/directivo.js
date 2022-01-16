      //Volviendo el valor al formulario
      $(".tabladatatable").on('click','.editardir',function(){
      var iduserdir = $(this).attr("iddire");;
      // // var datos = new FormData();
      console.log("datos a mostrar",iduserdir);
      
      // datos.append('idUsuario', idUsuario);
      
      // submit_button = $('.submit_button'); que cambie el boton de forma secuencial
      // console.log(datos.get('idUsuario')); //del formulario con get se recupera los elementos
      // console.log("idUsuarioas",idUsuario);
      // console.log(datos.get('nombre'));
      $.ajax({
         url:"ajax/directivo.ajax.php",
         method:"POST",
         data:{iduserdir:iduserdir},
         dataType:"json",
       success:function(data)
       {
         // YA ESTA PAPU pucha tio 3 dias en esa vaina tmrcomo puedo obtener el error en Jencode o del ajax bro habrá algo como el var_dum()
         // ,
          // console.log(data['idUsuario']);
          $('#modalEditarUsuario').modal('show');
          $('#edir').val(data.id);
          $('#ecmdir').val(data.cm);
          $('#enomie').val(data.nomie);
          $('#enivel').val(data.nivel);
          $('#edni').val(data.dni);
          $('#enomdir').val(data.nombredirector);
          $('#etelefonodir').val(data.telefono);
          $('#enuevoPerfildir').html(data.ugel);
          $('#enuevoPerfildir').val(data.ugel);
          $('#eusuariodir').val(data.usuario);
          $('#epassworddir').val(data.password);
          $('#eorreodir').val(data.correo);  
          // 
          // $salida["id"] = $fila["id"];
        // $salida["cm"] = $fila["cm"];
        // $salida["nomie"] = $fila["nomie"];
        // $salida["nivel"] = $fila["nivel"];
        // $salida["dni"] = $fila["dni"];
        // $salida["nombredirector"] = $fila["nombredirector"];
        // $salida["telefono"] = $fila["telefono"];
        // $salida["ugel"] = $fila["ugel"];
        // $salida["usuario"] = $fila["usuario"];
        // $salida["password"] = $fila["password"];
        // $salida["correo"] = $fila["correo"];
          // 
          // 
          // $('#fotoActual').val(data.foto);
          // if(data['foto']!=""){
          //   $(".previsualizar").attr("src",data['foto']);   
          // }
          console.log("respuesta", data);
      },
      error:function(jqXHR, textStatus, errorThrown){
       console.log(textStatus, errorThrown);
      }
      // beforeSend: function(){
      // submit_button.html('Enviando');
      // }    
   })  
});