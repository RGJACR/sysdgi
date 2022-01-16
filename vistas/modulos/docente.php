  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel de Inicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">docente</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- me enamore pero no te lo puedo contar en que momento me sucedio fue sin darme cuenta -->
    <!-- Main content -->

<div class="box" style="padding: 0 .5rem;">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar usuario</button>
        <div class="box-body" style="padding-top: 10px;">

            <table class="table table-hover tabladatatable dt-responsive">
              <thead>
                <tr>
                  <th scope="col" width="10px">id</th>
                  <th scope="col" width="30px">Nombre</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Contraseña</th>
                  <th scope="col">Perfil</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Estado</th>
                  <th scope="col" >Ultima Sesion</th>
                  <th scope="col" >Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;
                $valor = null;
                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                foreach ($usuarios as $key =>$value){
                echo '<tr>
                  <td>'.$value['id'].'</td>
                  <td>'.$value['nombre'].'</td>
                  <td>'.$value['usuario'].'</td>
                  <td>'.$value['password'].'</td>
                  <td>'.$value['perfil'].'</td>';
                  if ($value['foto']!="") {
                    // code...
                    echo '<td><img src="'.$value['foto'].'" class="img-thumbnail" width="40px"></td>';
                  }
                  else{
                    echo '<td><img src="vistas/dist/img/user2-160x160.jpg" class="img-thumbnail" width="40px"></td>';
                  }
                  echo'<td><button class="btn btn-success btn-xs">Activo</button></td>';
                  echo'<td>'.$value['ultimo_login'].'</td>';  
                  echo '
                  <td> <div class="btn-group">
                  <button class="btn btn-warning btn-xs editarform" idUsuario="'.$value['id'].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>

                  <button class="btn btn-danger btn-xs" idUsuario="'.$value['id'].'" fotoUsuario="'.$value['foto'].'" usuario="'.$value['usuario'].'"><i class="fa fa-times"></i></button>
                  </div></td> 
                  </tr>';
                }
                ?>                
              <!--   <tr>
                  <td>1</td>
                  <td>Jose</td>
                  <td>RG</td>
                  <td>123456</td>
                  <td>JACRaddas</td>
                  <td> </td>
                  <td><button class="btn btn-success btn-xs">Activo</button></td>
                  <td>19-02-2021</td>
                </tr> -->
              </tbody>
            </table>
        <!-- </div> -->
    <!-- /.content -->
        </div>

        <!-- Modal Nuevo Usuario -->
        <div class="modal fade" id="modalAgregarUsuario" role="dialog">
          <div class="modal-dialog">
           <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <input type="text" autocomplete="off" name="nuevoNombre" class="form-control input-lg" placeholder="Ingresar nombre completo" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-key"></i></span>
                    <input type="text" autocomplete="off" name="nuevoUsuario" id="nuevoUsuario" class="form-control input-lg" placeholder="Ingresar usuario" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="nuevoPassword" class="form-control input-lg" placeholder="Ingresar contraseña" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <select class="form-control input-lg" name="nuevoPerfil">
                      <option  value="">Seleccionar perfil</option>
                      <option  value="Administrador">Administrador</option>
                      <option  value="Vendedor">Personal</option>
                      <option  value="Editor">Editor</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="panel">SUBIRFOTO</div>
                  <input type="file" name="nuevaFoto" class="nuevaFoto center-block">
                  <p class="center-block">Peso maximo de la foto 2Mb</p>
                  <img src="vistas/img/avatar5.png" class="thumbnail center-block previsualizar" width="100px">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div> 
            </div>

            <?php
            $crearusuario = new ControladorUsuarios();
            $crearusuario -> ctrCrearUsuario();
            ?>

          </form>
        </div>
        </div>

        <!-- Modal Editar  Usuario -->
        <div class="modal fade" id="modalEditarUsuario" role="dialog">
          <div class="modal-dialog">
           <form role="form" id="" method="post" enctype="multipart/form-data" >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <input type="text" name="idusers" id="idusers" class="form-control input-lg" value="Id" readonly required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <input type="text" name="editarNombre" id="editarNombre" class="form-control input-lg" value="Nombre Usuario" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-key"></i></span>
                    <input type="text" name="nuevouser" id="nuevouser" class="form-control input-lg" placeholder="Ingresar usuario" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" name="editarPassword" id="editarPassword" class="form-control input-lg" placeholder="Escriba la nueva contraseña">
                    <input type="hidden" name="passwordActual" id="passwordActual">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <select class="form-control input-lg" name="editarPerfil">
                      <option  value="" id="editarPerfil"></option>
                      <option  value="Administrador">Administrador</option>
                      <option  value="Vendedor">Vendedor</option>
                      <option  value="Especial">Especial</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="panel">SUBIRFOTO</div>
                  <input type="file" name="editarFoto" class="nuevaFoto center-block">
                  <p class="center-block">Peso maximo de la foto 2Mb</p>
                  <img src="vistas/dist/img/user2-160x160.jpg" class="thumbnail center-block previsualizar" width="100px">
                  <input type="hidden" name="fotoActual" id="fotoActual">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary submit_button">Guardar</button>
              </div>
            </div>

            <?php

            // echo $idusuario['id'];

            $editarUsuarios = new ControladorUsuarios();
            $editarUsuarios -> ctrEditarUsuario();
            
            // foreach ($editarUsuario as $key => $value) {
            //   // code...
            //   echo'.'.$value.'.'; 
            // }

             // var_dump($editarUsuario);

            // object(ControladorUsuarios)#2 (0) { }

            ?>
          </form>
        </div>
      </div>

</div>
</div>