<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/home/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
    </section>

     <style type="text/css">
     body{overflow-x: hidden;
     }
   </style>

    <!-- Main content -->

    <?php
        if ($this->session->userdata('level') == 'admin') {
         echo'

      <!-- Default box -->
 <section class="content" style="padding-top:50px">

  <div class="box-body"  style="padding-left: 195px">
       
       

          <div class="col-lg-3 col-xs-6" style="padding-left:30px">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

            <p><br></br></p>
               <p><br></br></p>
           <p><br></br></p>
            <p><br></br></p>
              <h3 align="center" style="font-family:forte ; font-size:30px">Admin</h3>

              
                
                  <p><br></br></p>
                   <p><br></br></p> 

            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="'.base_url("index.php/home/admin").'" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



    
 
        <div class="col-lg-3 col-xs-6" style="padding-left:30px">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              
            <p><br></br></p>
               <p><br></br></p>
           <p><br></br></p>
            <p><br></br></p>
              <h3 align="center" style="font-family:forte ; font-size:30px">Data Buku</h3>

              
                
                  <p><br></br></p>
                   <p><br></br></p> 


            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="'.base_url("index.php/home/buku_up").'" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6" style="padding-left:30px">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              
            <p><br></br></p>
               <p><br></br></p>
           <p><br></br></p>
            <p><br></br></p>
              <h3 align="center" style="font-family:forte; font-size:30px">Kategori</h3>

              
                
                  <p><br></br></p>
                   <p><br></br></p> 


            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="'.base_url("index.php/home/kategori").'" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>


</div>
  
    </section>


         ';
        }
      ?>
   
   <?php
      if ($this->session->userdata('level') == 'kasir') {
        echo '

        <section class="content">

         <div  class="col-lg-3 col-xs-6" style="padding-top:20px;padding-left:20px">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
         
            <p><br></br></p>
               <p><br></br></p>
           <p><br></br></p>
            <p><br></br></p>
              <h3 align="center" style="font-family:forte; font-size:30px">Transaksi</h3>

              
                
                  <p><br></br></p>

                   <p><br></br></p> 


            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="'.base_url("index.php/home/transaksi").'" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>


          
      </section>
        ';
      }
   ?>
    <!-- /.content -->

  </div>