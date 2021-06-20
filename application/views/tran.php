
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Transaksi
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
     
    </section>



    <!-- Main content -->
    <section class="content">
 

      <!-- Default box -->
       
    <div class="box box-primary">

            
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
         
          </div>

      <!-- /.box -->
   <section class="content">
        <div class="box box-primary">
      
           <div class="box-header with-border">
              <h3 class="box-title">List transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                    <th>ID ADMIN</th>
                  <th>Nama Pembeli</th>
                  <th>Total</th>
                  <th>Tanggal</th>
                  <th colspan="2" style="text-align: center; ">Aksi</th>
                  
                </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 1;
                    foreach ($tran as $a) {
                      echo '
              <tr role="row">
                  <td>'.$no++.'</td>
                  <td>'.$a->id_admin.'</td>
                  <td>'.$a->nama_pembeli.'</td>
                  <td>'.$a->total.'</td>
                  <td>'.$a->tanggal_beli.'</td>

                   

                    <td>
                    <a href="'.base_url('index.php/home/deltran/'.$a->id_transaksi).'" class="btn btn-block btn-danger">Hapus</a></td>
                    
                  
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





