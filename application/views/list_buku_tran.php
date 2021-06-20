<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
      
    </section>
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
                
                  <th>Judul Buku</th>
                  <th>Tahun</th>
                  <th>Foto Cover</th>
                  <th>Harga</th>
                  <th>Penerbit</th>
                  <th>Penulis</th>
                  <th>Stock</th>
      
                  
                </tr>
                </thead>
                <tbody>

                  <?php
                  $a =1;
                    foreach ($buku as $b) {
                      echo '
                <tr  class="odd" role="row">

                  <td>'.$a.'</td>
                  <td>'.$b->judul.'</td>
                  <td>'.$b->tahun.'</td>
                  <td><img src="'.base_url().'uploads/'.$b->foto_cover.'" width="50px" /></td>
                  <td>'.$b->harga.'</td>
                  <td>'.$b->penerbit.'</td>
                  <td>'.$b->penulis.'</td>
                  <td>'.$b->stok.'</td>
                  
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
  </div>