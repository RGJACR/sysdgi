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
              <li class="breadcrumb-item active">Directivos Madre de Dios</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Directivo</button>
        <div class="box-body" style="padding-top: 10px;">

            <table class="table table-hover tabladatatable dt-responsive">
              <thead>
                <tr>
                  <th scope="col" width="10px">Id</th>
                  <th scope="col" width="10px">CM</th>
                  <th scope="col" width="30px">Nombre I.E</th>
                  <th scope="col">Nivel</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Director</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Ugel</th>
                  <th scope="col" >Usuario</th>
                  <th scope="col" >Contraseña</th>
                  <th scope="col" >Correo</th>
                  <th scope="col" >RDR</th>
                  <th scope="col" >Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $item = null;  
                $valor = null;
                $directivo = ControladorUsuarios::ctrmostrarUsuariosdirectivo($item, $valor);
                foreach ($directivo as $key =>$value){
                echo '<tr>
                  <td>'.$value['id'].'</td>
                  <td>'.$value['cm'].'</td>
                  <td>'.$value['nomie'].'</td>
                  <td>'.$value['nivel'].'</td>
                  <td>'.$value['dni'].'</td>
                  <td>'.$value['nombredirector'].'</td>
                  <td>'.$value['telefono'].'</td>
                  <td>'.$value['ugel'].'</td>
                  <td>'.$value['usuario'].'</td>
                  <td>'.$value['password'].'</td>
                  <td>'.$value['correo'].'</td>
                  <td>'.$value['rdr'].'</td>';

                  // if ($value['foto']!="") {
                  //   // code...
                  //   echo '<td><img src="'.$value['foto'].'" class="img-thumbnail" width="40px"></td>';
                  // }
                  // else{
                  //   echo '<td><img src="vistas/dist/img/user2-160x160.jpg" class="img-thumbnail" width="40px"></td>';
                  // }
                  // echo'<td><button class="btn btn-success btn-xs">Activo</button></td>';
                  // echo'<td>'.$value['ultimo_login'].'</td>';  
                  echo '
                  <td> <div class="btn-group">
                  <button class="btn btn-warning btn-xs editardir" iddire="'.$value['id'].'" data-toggle="modal" data-target="#modalEditardirector"><i class="fas fa-pencil-alt"></i></button>

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

        <!-- Modal Nuevo director -->
        <div class="modal fade" id="modalAgregarUsuario" role="dialog">
          <div class="modal-dialog">
           <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Directivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <input type="text" autocomplete="off" name="cmdir" id="cmdir" class="form-control input-lg" placeholder="Ingresar codigo modular" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-key"></i></span>
                    <input type="text" autocomplete="off" name="nomie" id="nomie" class="form-control input-lg" placeholder="Ingresar Nombre de I.E" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="nivel" id="nivel" class="form-control input-lg" placeholder="Ingresar nivel" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="dnidir" id="dni" class="form-control input-lg" placeholder="Ingresar dni" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="nomdir" class="form-control input-lg" placeholder="Ingresar nombre de director" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="telefonodir" class="form-control input-lg" placeholder="Telefono" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <select class="form-control input-lg" name="nuevoPerfildir">
                      <option  value="">Seleccionar la Ugel</option>
                      <option  value="Ugel Tambopata">Ugel Tambopata</option>
                      <option  value="Ugel Tahuamanu">Ugel Tahuamanu</option>
                      <option  value="Ugel Manu">Ugel Manu</option>
                    </select>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="usuariodir" class="form-control input-lg" placeholder="Ingresar usuario" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="passworddir" class="form-control input-lg" placeholder="Ingresar Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="correodir" class="form-control input-lg" placeholder="Ingresar correo" required>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="password" class="form-control input-lg" placeholder="Ingresar rdr" required>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="panel">Subir RD de encargatura</div>
                  <input type="file" name="rd" class="rd center-block">
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
            $crearusuario -> ctrCrearUsuariodirectivo();
            ?>

          </form>
        </div>
        </div>
        <!-- Modal Editar director -->
        <div class="modal fade" id="modalEditardirector" role="dialog">
          <div class="modal-dialog">
           <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Directivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <input type="text" autocomplete="off" name="edir" id="edir" class="form-control input-lg" placeholder="Numero de Id" readonly required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <input type="text" autocomplete="off" name="ecmdir" id="ecmdir" class="form-control input-lg" placeholder="Ingresar codigo modular" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-key"></i></span>
                    <input type="text" autocomplete="off" name="enomie" id="enomie" class="form-control input-lg" placeholder="Ingresar Nombre de I.E" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="enivel" id="enivel" class="form-control input-lg" placeholder="Ingresar nivel" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="ednidir" id="edni" class="form-control input-lg" placeholder="Ingresar dni" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="enomdir" id="enomdir" class="form-control input-lg" placeholder="Ingresar nombre de director" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="etelefonodir" id="etelefonodir" class="form-control input-lg" placeholder="Telefono" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
                    <select class="form-control input-lg" name="enuevoPerfildir">
                      <option  value="" id="enuevoPerfildir">Seleccionar la Ugel</option>
                      <option  value="Ugel Tambopata">Ugel Tambopata</option>
                      <option  value="Ugel Tahuamanu">Ugel Tahuamanu</option>
                      <option  value="Ugel Manu">Ugel Manu</option>
                    </select>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="eusuariodir" id="eusuariodir" class="form-control input-lg" placeholder="Ingresar usuario" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="epassworddir" id="epassworddir" class="form-control input-lg" placeholder="Ingresar Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="eorreodir" id="eorreodir" class="form-control input-lg" placeholder="Ingresar correo" required>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
                    <input type="text" autocomplete="off" name="password" class="form-control input-lg" placeholder="Ingresar rdr" required>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="panel">Subir RD de encargatura</div>
                  <input type="file" name="erd" class="rd center-block">
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
            $creardire = new ControladorUsuarios();
            $creardire -> ctrEditardirectivo();
            ?>

          </form>
        </div>
        </div>


</div>
</div>