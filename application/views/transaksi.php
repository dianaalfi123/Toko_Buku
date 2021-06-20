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


  <!--   tabel -->
   
 <!--  tabel -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Beli Buku</h3>
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

            <form role="form" action="<?php echo base_url('index.php/home/addTransaksi');?>" method="post">
              <div class="box-body">
                <div class="col-md-8">
                
                <div class="form-group">
                  <label class="col-sm-3">Nama Pembeli</label> <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_pembeli"  name="nama_pembeli" required
                  <?php if ($this->session->has_userdata('namaPembeli')) {
                      echo '
                          value"'.$this->session->userdata('namaPembeli').'" disabled
                      ';
                  }?>>
                  </div>

                </div>
                         <div class="form-group">
                  <label class="col-sm-3">Nama Kasir</label>
                   <div class="col-sm-9">
                  <select class="form-control" id="id_admin" name="id_admin">
                     <?php 
                      foreach ($admin as $a) {
                       echo '<option value="'.$a->id_admin.'">'.$a->nama.'</option>';
                      }
                     ?>
                    
                  </select>
                </div>
                </div > 

                <div class="form-group">
                  <label class="col-sm-3">Nama Buku</label>
                   <div class="col-sm-9">
                  <select class="form-control" id="id_buku" name="id_buku">
                     <?php 
                      foreach ($buku as $a) {
                       echo '<option value="'.$a->id_buku.'">'.$a->judul.'</option>';
                      }
                     ?>
                    
                  </select>
                </div>
                </div >
                <div class="form-group">
                  <label class="col-sm-3">Jumlah Buku</label>
                  <div class="col-sm-9">
                  <input type="number" class="form-control" id="jumlah"  name="jumlah" required>
                  </div>
                </div>
                 <div class="pull-right">
                <div class="box-footer">
                  <input type="submit" name="submit" value="Add" class="btn btn-info col-lg-12">
               <!--  <button id="addTransaksi" type="button" class="btn btn-primary">Submit</button> -->
              </div>
            </div>
            </div>

              </div>
              <!-- /.box-body -->

              
            </form>
            <!-- /.box-header -->
            <!-- form start -->
           
          </div>

           <section class="content">
        <div class="box box-primary">
      
           <div class="box-header with-border">
              <h3 class="box-title">List Data Belanjaan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabelTransaksi" class="table table-bordered table-hover">
                <thead id="headDataTransaksi">
                <tr>
                  <th>No</th>
                  <th>Nama Buku</th>
                  <th>Sub Total</th>
                  
                  <th style="text-align: center;"> Aksi</th>
                  
                </tr>
                </thead>
                <tbody id="dataTransaksi">
                    <?php
                        $no =1;
                        foreach ($detil_transaksi as $d ) {
                          echo 
                           '<tr>'. 
                                '<td>'.$no++.'</td>'.
                                 '<td>'.$d->judul.'</td>'.
                                  '<td>'.$d->jumlah.'</td>'.
                                  '<td><a href="'.base_url('index.php/home/hapusDetil/').$d->id_detil.'">Hapus</a></td>'.
                            '</tr>'
                          ;
                        }
                    ?>
                  
                </tbody>
                
              </table>
              <a id="kirim" onclick="printDiv('tabelTransaksi')" class="btn btn-block btn-warning">Kirim</a>
               <a id="hapus" href="<?php echo base_url('index.php/home/cancelBeli/'); ?>" class="btn btn-block btn-Danger">Cancel</a>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
            
              <!-- /.box-body -->
             </section> 
          </div>

        
        <!-- /.box-footer-->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
  function printDiv(divName){
    var divToPrint = document.getElementById(divName);
    var htmlToPrint = '' +
        '<style type="text/css">'+
        'table th, table td {' +
        'border 1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '#headDataTransaksi th:nth-child(4){display: none}' +
        '#dataTransaksi th:nth-child(4){display: none}'+
        '</style>';

      htmlToPrint += '<p><?php echo 'Nama Pembeli =  '.$this->session->userdata('namaPembeli'); ?></p><br>'
      htmlToPrint += divToPrint.outerHTML;
      newWin = window.open("");
      newWin.document.write(htmlToPrint);
      newWin.print();
      newWin.close();
      location.assign("<?php echo base_url('index.php/home/beli'); ?>");
  }


</script>

<!-- <script type="text/javascript">
  $('#addTransaksi').on('click',function () {
    $('#tabelTransaksi > tbody:last-child').append('<tr><td class="idBuku">'+ $('#id_buku').val() +'</td><td>'+$('#id_buku option:selected').text() +'</td><td class="jumlah">'+ $('#jumlah').val()*$('#id_buku option:selected').attr('data-harga') +'</td><td><button class="btnDelete">Hapus</button></td></tr>');
  });

  $('#tabelTransaksi').on('click','.btnDelete',function(){
    $(this).closest('tr').remove();
  });

  $('#kirim').on('click',function(){
    var detailarray = [];
    $('#tabelTransaksi tbody tr').each(function(a, b){
      detailarray.push({idBuku:$('.idBuku',b).text(), jumlah:parseInt($('.jumlah',b).text())});
    });
    console.log(JSON.stringify(detailarray));
    $.ajax({
      url:'<?php echo base_url("index.php/admin/addTransaksi");?>'
    });
  });

</script> -->