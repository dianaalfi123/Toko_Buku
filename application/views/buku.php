<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Buku
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
      
    </section>

      <style>
  .gambar-cover{
    max-width: 75%;
    position: relative;
    left: 12.5%;
    right: 12.5%;
    box-shadow: 5px 5px 5px #222222;

         }
       </style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->


        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Insert Buku</h3>
            </div>

            <?php
              $pesan = $this->session->flashdata('notif');
              if ($pesan != NULL) {
                echo'
                    <div style="text-align:right" class="box-header with-border">
              <h3 class="box-title"><button class="btn btn-danger">'.$pesan.'</button></h3>
            </div>
                ';  
                # code...
              }
            ?>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('index.php/home/tambah_buku')?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <!--div class="form-group">
                  <label >ID KATEGORI</label>
                  <input type="text" class="form-control" id="id_kategori"  name="id_kategori" required>
                </div -->

                <div class="form-group">
                  <label>ID KATEGORI</label>
                  <select class="form-control" name="id_kategori" id="id_kategori">
                    <?php 
                      foreach ($kategori as $a) {
                       echo '
                        <option>--Pilih Kategori Buku--</option>
                       <option value="'.$a->id_kategori.'">'.$a->nama_kategori.'</option>';
                      }
                     ?>
                    
                  </select>
                </div >

                <div class="form-group">
                  <label for="text">Judul Buku</label>
                  <input type="text" class="form-control" id="judul"  name="judul" required>
                </div>
                <div class="form-group">
                  <label for="text">Tahun</label>
                  <input type="text" class="form-control" id="tahun"  name="tahun" required>
                </div>
                <div class="form-group">
                  <label for="foto_cover" >Foto Cover</label>
                  <input type="file"  name="foto_cover" required>
                </div>
                <!--div class="form-group">
                  <label for="text">Foto Cover</label>
                  <input type="text" class="form-control" id="foto_cover"  name="foto_cover">
                </div -->
                <div class="form-group">
                  <label for="text">Harga</label>
                  <input type="text" class="form-control" id="harga"  name="harga" required>
                </div>
                 <div class="form-group">
                  <label for="text">Penerbit</label>
                  <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                </div>
                <div class="form-group">
                  <label for="text">Penulis</label>
                  <input type="text" class="form-control" id="penulis"  name="penulis" required>
                </div>
                <div class="form-group">
                  <label for="text">Stock</label>
                  <input type="text" class="form-control" id="stok" name="stok" required>
                </div>
           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        
        <!-- /.box-footer-->

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
                  <th>No</th>
                  <th>ID KATEGORI</th>
                  <th>Judul Buku</th>
                  <th>Tahun</th>
                  <th>Foto Cover</th>
                  <th>Harga</th>
                  <th>Penerbit</th>
                  <th>Penulis</th>
                  <th>Stock</th>
                  <th colspan="3" style="text-align: center; ">Aksi</th>
                  
                </tr>
                </thead>
                <tbody>

                  <?php
                  $a =1;
                    foreach ($buku as $b) {
                      echo '
                <tr  class="odd" role="row">

                  <td>'.$a.'</td>
                  <td>'.$b->id_kategori.'</td>
                  <td>'.$b->judul.'</td>
                  <td>'.$b->tahun.'</td>
                  <td><img src="'.base_url().'uploads/'.$b->foto_cover.'" width="50px" /></td>
                  <td>'.$b->harga.'</td>
                  <td>'.$b->penerbit.'</td>
                  <td>'.$b->penulis.'</td>
                  <td>'.$b->stok.'</td>
                  
                    
                    
                     <td>
                    <a class="btn btn-block btn-block btn-warning" data-toggle="modal" data-target="#modal-cover'.$a.'">Foto</a></td>
                      <td>
                    <a href="#" data-target="#modal_edit" data-toggle="modal" class="btn btn-block btn-block btn-primary" onclick="prepare_update_buku('.$b->id_buku.')">Update</a></td>

                 
                    <td>
                    <a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_hapus" onclick="prepare_hapus_buku('.$b->id_buku.')">Hapus</a></td>
                  
                </tr>
                      ';
                      $a++;
                    }
                  ?>
               
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
  <!--  <td>
                    <a href="'.base_url('index.php/home/hapus_buku/'.$b->id_buku).'" class="btn btn-block btn-danger">Hapus</a></td> -->

<?php
    $a=1;
    foreach ($buku as $b ) {
        echo '

      <div id="modal-cover'.$a.'" class="modal fade" role="dialog">
              <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
              <img src="'.base_url('./uploads/').$b->foto_cover.'" class="gambar-cover">

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              </div>

              </div>
              </div>
        ';
        $a++;
    }
?>
                  


      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
          function prepare_update_buku(id)
          {
            $('#id_buku1').val();
            $('#id_kategori1').val();
            $('#judul1').val();
            $('#tahun1').val();
            $('#harga1').val();
            $('#penerbit1').val();
            $('#penulis1').val();
            $('#stok1').val();
            /*$('#data_foto').val();*/


            $.getJSON("<?php echo base_url('index.php/home/get_buku_id/');?>" + id, function(data){
              
            $('#id_buku1').val(data.id_buku);
            $('#id_kategori1').val(data.id_kategori);
            $('#judul1').val(data.judul);
            $('#tahun1').val(data.tahun);
            $('#harga1').val(data.harga);
            $('#penerbit1').val(data.penerbit);
            $('#penulis1').val(data.penulis);
            $('#stok1').val(data.stok);
            /*$('#data_foto').html('<img src="<?php echo base_url(); ?>uploads/' + data.foto_cover+'"width="50px"');
    */        });
          }

          function prepare_hapus_buku(id){
            $("#hapus_id_buku").empty();
            $("#hapus_judul").empty();

            $.getJSON("<?php echo base_url('index.php/home/get_buku_id/');?>" + id, function(data){
              $("#hapus_id_buku").val(data.id_buku);
              $("#hapus_judul").text(data.judul);
            })
          }
  </script>

  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <form action="<?php echo base_url('index.php/home/ubah_buku') ?>" method="post" enctype="multipart/form-data">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="modal_edit1">Update Buku</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_buku" id="id_buku1">

                                            <div class="form-group">
                                                <label>ID KATEGORI</label>
                                                <select class="form-control" name="id_kategori"  id="id_kategori1" required>
                                                  <?php 
                                                      foreach ($kategori as $a) {
                                                          echo '

                                                          <option value="'.$a->id_kategori.'">'.$a->nama_kategori.'</option>';
                                                        }
                                                  ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" class="form-control" name="judul"  id="judul1" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <input type="text" class="form-control" name="tahun"  id="tahun1" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" class="form-control" name="harga"  id="harga1" required>
                                            </div>

                                           <div class="form-group">
                                                <label>Penerbit</label>
                                                <input type="text" class="form-control" name="penerbit"  id="penerbit1" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Penulis</label>
                                                <input type="text" class="form-control" name="penulis"  id="penulis1" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input type="text" class="form-control" name="stok"  id="stok1" required>
                                            </div>
                                             <div id="foto_cover" >
                                            <!-- 
                                                <label>Foto Cover</label>
                                                <input type="file" class="form-control" name="foto_cover"  id="data_foto" required> -->
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


<div id="modal_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Konfirmasi Hapus Buku</h4>
        </div>
        <form action="<?php echo base_url('index.php/home/hapus_buku'); ?>" method="post">
            <div class="modal-body">
              <input type="hidden" name="hapus_id_buku" id="hapus_id_buku">
              <p>Apakah anda yakin menghapus buku<b> <span id="hapus_judul"></span></p>
              
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" class="btn btn-danger" value="YA">
              <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
            </div>
          
        </form>
      </div>
  </div>
</div>