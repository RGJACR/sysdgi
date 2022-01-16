   $(".nuevaFoto").change(function(){
      var imagen = this.files[0];
      console.log("imagen",imagen["type"]);

               //Validar el tamaño de la imagen

               /*=============================================
               VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
               =============================================*/

               if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png")
               {

                 $(".nuevaFoto").val("");

                 Swal.fire({
                    title: "Error al subir la imagen",
                    text: "¡La imagen debe estar en formato JPG o PNG!",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                 });

              }
              else 
               if(imagen["size"] > 2000000){

                 $(".nuevaFoto").val("");

                 Swal.fire({
                    title: "Error al subir la imagen",
                    text: "¡La imagen no debe pesar más de 2MB!",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                 });

               }
              
              else
              {

                 var datosImagen = new FileReader;
                 datosImagen.readAsDataURL(imagen);

                 $(datosImagen).on("load", function(event){

                   var rutaImagen = event.target.result;

                   $(".previsualizar").attr("src", rutaImagen);

                })

              }

           })

   /*=============================================
    EDITAR USUARIO
    =============================================*/

   //  $(".btnEditarUsuario").click(function(){
   //    var idUsuario = $(this).attr("idUsuario");
   //    console.log("idUsuario",idUsuario);
   // })

 
   // $(".btnEditarUsuario").click(function(){
      // $(document).on('click','.editarform', function(){
      // $(".editarform").click(function(){------

      $(".tabladatatable").on('click','.editarform',function(){
      var iduser = $(this).attr("idUsuario");;
      // // var datos = new FormData();
      console.log("datos a mostrar",iduser);
      
      // datos.append('idUsuario', idUsuario);
      
      // submit_button = $('.submit_button'); que cambie el boton de forma secuencial
      // console.log(datos.get('idUsuario')); //del formulario con get se recupera los elementos
      // console.log("idUsuarioas",idUsuario);
      // console.log(datos.get('nombre'));
      $.ajax({
         url:"ajax/usuarios.ajax.php",
         method:"POST",
         data:{iduser:iduser},
         dataType:"json",
       success:function(data)
       {
         // YA ESTA PAPU pucha tio 3 dias en esa vaina tmrcomo puedo obtener el error en Jencode o del ajax bro habrá algo como el var_dum()
         // ,
          // console.log(data['idUsuario']);
          $('#modalEditarUsuario').modal('show');
          $('#idusers').val(data.id);
          $('#editarNombre').val(data.nombre);
          $('#nuevouser').val(data.usuario);
          $('#editarPassword').val(data.password);
          $('#editarPerfil').html(data.perfil);
          $('#editarPerfil').val(data.perfil);
          $('#fotoActual').val(data.foto);
          if(data['foto']!=""){
            $(".previsualizar").attr("src",data['foto']);   
          }
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