<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Admin
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
     
    </section>



    <!-- Main content -->
    <section class="content">
 

      <!-- Default box -->
       
    <div class="box box-primary">
   <div class="box-header with-border">
              <h3 class="box-title">Insert Admin</h3>
            </div>
            
                <?php
                  $pesan1 = $this->session->flashdata('notif1');
                  $pesan2 = $this->session->flashdata('notif2');
                  if ($pesan1 != NULL) {
                    echo '
                    <div style="text-align:right" class="box-header with-border"><button class="btn btn-success">'.$pesan1.'</button></div>
                    ';
                  }elseif ($pesan2 != null) {
                    echo '
                    <div style="text-align:right" class="box-header with-border"><button class="btn btn-danger">'.$pesan2.'</button></div>
                    ';
                  }
                  ?>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('index.php/home/tambah_admin')?>" role="form" method="post">
              <div class="box-body">

                <!--div class="form-group">
                  <label >ID ADMIN</label>
                  <input type="text" class="form-control" id="id_admin"  name="id_admin" required="numeric">
                </div-->
                   <div class="form-group">
                  <label >Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                 <div class="form-group">
                  <label >Username</label>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>


                 <div class="form-group">
                  <label >Password</label>
                  <input type="text" class="form-control" id="password"  name="password" required>
                </div>
                
                <!--div class="form-group">
                  <label >Level</label>
                  <input type="text" class="form-control" id="level"  name="level" required>
                </div-->

                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option>--Choose Level--</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                  </select>
                </div >

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

      <!-- /.box -->
    <section class="content">
        <div class="box box-primary">
      
           <div class="box-header with-border">
              <h3 class="box-title">List Data Buku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th colspan="2" style="text-align: center; ">Aksi</th>
                  
                </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 1;
                    foreach ($admin as $a) {
                      echo '
              <tr role="row">
                  <td>'.$no++.'</td>
                  <td>'.$a->nama.'</td>
                  <td>'.$a->username.'</td>
                  <td>'.$a->password.'</td>
                  <td>'.$a->level.'</td>

                    <td>
                    <a href="#" data-target="#modal_edit" data-toggle="modal" class="btn btn-block btn-block btn-primary" onclick="prepare_update_admin('.$a->id_admin.')">Update</a></td>

                    <td>
                    <a href="'.base_url('index.php/home/hapus_admin/'.$a->id_admin).'" class="btn btn-block btn-danger">Hapus</a></td>
                    
                  
                </tr>
                      ';
                    }
                  ?>

                
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
    </section>
    
    <!-- /.content -->
  </div>

  <script type="text/javascript">
          function prepare_update_admin(id)
          {
            $('#id_admin1').val();
            $('#nama1').val();
            $('#username1').val();
            $('#password1').val();
            $('#level1').val();

            $.getJSON("<?php echo base_url('index.php/home/get_admin_id/');?>" + id, function(data){
              $('#id_admin1').val(data.id_admin);
              $('#nama1').val(data.nama);
              $('#username1').val(data.username);
              $('#password1').val(data.password);
              $('#level1').val(data.level);
            });
          }
  </script>


  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <form action="<?php echo base_url('index.php/home/ubah_admin') ?>" method="post">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="modal_edit1">Update Admin</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_admin" id="id_admin1">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama"  id="nama1" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username"  id="username1" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password"  id="password1" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Level</label>
                                                
                                                 <select class="form-control" name="level"   id="level1" required>
                                                      
                                                      <option value="admin">Admin</option>
                                                      <option value="kasir">Kasir</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="SAVE">
                                        </div>
                                        </form>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>