 <div class="row">
        
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Referensi Foto</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo base_url();?>/assets/img/dilan.jpg" alt="First slide">

                    <div class="carousel-caption">
                      Dilan
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>/assets/img/oto.jpg" alt="Second slide">

                    <div class="carousel-caption">
                     Otomotif
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>/assets/img/revan.jpg" alt="Third slide">

                    <div class="carousel-caption">
                      Revan
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Referensi Foto</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo base_url();?>/assets/imgdilan.jpeg" alt="First slide" class="user-image" alt="User Image">

                    <div class="carousel-caption">
                      Dilan
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>/assets/img/oto.jpg" alt="Second slide" class="user-image" alt="User Image">

                    <div class="carousel-caption">
                     Otomotif
                    </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>/assets/img/revan.jpeg" alt="Third slide" class="user-image" alt="User Image">

                    <div class="carousel-caption">
                      Revan
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>












      <style>
  .gambar-cover{
    max-width: 75%;
    position: relative;
    left: 12.5%;
    right: 12.5%;
    box-shadow: 5px 5px 5px #222222;

  }
</style>


    <div class="col-md-6">
      <!-- Horizontal Form -->

      <div class="box-header with-border">
        <h3 class="box-title">Kelola Data Buku</h3>
      </div>
      <?php 
      $notif = $this->session->flashdata('notif');
      if ($notif) {
        if($notif = "sukses"){
          echo  '<div class="alert alert-success">
          <p>Upload Data Sukses</p>
          </div>';
        }else{
          echo  '<div class="alert alert-danger">
          <p>Upload Data Gagal</p>
          </div>';
        }
      }
      ?>



      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php echo base_url('index.php/home/insert_buku'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="inputJudul" class="col-sm-2 control-label">Judul</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputJudul" placeholder="Judul">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTahun" class="col-sm-2 control-label">Tahun</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputTahun" placeholder="Tahun">
            </div>
          </div>
                    <div class="form-group">
                      <label for="inputidkat" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="inputidkat">
                          <?php   
                          foreach ($kategori as $data) {
                           echo '<option value="'.$data->id_kategori.'">'.$data->nama_kategori.'</option>'; 
                         }
                         ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                    <label for="inputHarga" class="col-sm-2 control-label">Harga</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputHarga" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCover" class="col-sm-2 control-label">Cover</label>
                    <input type="file" name="inputCover">
                  </div>
                  <div class="form-group">
                    <label for="inputPenerbit" class="col-sm-2 control-label">Penerbit</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputPenerbit" placeholder="Penerbit">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPenulis" class="col-sm-2 control-label">Penulis</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputPenulis" placeholder="Penulis">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStok" class="col-sm-2 control-label">Stok</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputStok" placeholder="Stok">
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Insert</button>
                </div>
                <!-- /.box-footer -->

              </form>

              <!-- /.box -->
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Buku</h3>

                    <div class="box-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tr>
                        <th>Judul Buku</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Cover</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>Action</th>
                      </tr>


                      <?php 
                        $i = 1;
                      foreach ($buku as $b) {
                        # code...
                        echo '

                        <tr>
                        <td>'.$b->judul_buku.'</td>
                        <td>'.$b->tahun.'</td>
                        <td>'.$b->nama_kategori.'</td>
                        <td>'.$b->harga.'</td>
                        <td>'.$b->foto_cover.'</td>
                        <td>'.$b->penerbit.'</td>
                        <td>'.$b->penulis.'</td>
                        <td>'.$b->stok.'</td>
                        <td>
                        <span class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-cover'.$i.'">Foto</span>
                        <span class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-editbuku" onclick="prepare_editbuku('.$b->id_buku.')">Edit</span>
                        <span class="btn btn-danger btn-sm">Delete</span>
                        </td>     

                        </tr>';
                          $i++;
                      }
                      ?>


                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>

            <?php 
            $i = 1;
            foreach ($buku as $b) {
                        # code...
              echo '
              <div id="modal-cover'.$i.'" class="modal fade" role="dialog">
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
                $i++;
            }
            ?>
          <form action="<?php echo base_url('index.php/home/edit_buku'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="modal modal-info fade" id="modal-editbuku">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <div class="modal-body">
               <div class="form-group">
            <label for="editJudul" class="col-sm-2 control-label">Judul</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="editJudul" placeholder="Judul">
            </div>
          </div>
          <div class="form-group">
            <label for="editTahun" class="col-sm-2 control-label">Tahun</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="editTahun" placeholder="Tahun">
            </div>
          </div>
                    <div class="form-group">
                      <label for="editidkat" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="editidkat">
                          <?php   
                          foreach ($kategori as $data) {
                           echo '<option value="'.$data->id_kategori.'">'.$data->nama_kategori.'</option>'; 
                         }
                         ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                    <label for="editHarga" class="col-sm-2 control-label">Harga</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editHarga" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="editCover" class="col-sm-2 control-label">Cover</label>
                    <input type="file" id="editCover">
                  </div>
                  <div class="form-group">
                    <label for="editPenerbit" class="col-sm-2 control-label">Penerbit</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editPenerbit" placeholder="Penerbit">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="editPenulis" class="col-sm-2 control-label">Penulis</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editPenulis" placeholder="Penulis">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="editStok" class="col-sm-2 control-label">Stok</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="editStok" placeholder="Stok">
                    </div>
                  </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div></form>
<script type="text/javascript">
  function prepare_editbuku(id){
    $('#editJudul').val();
    $('#editTahun').val();
    $('#editidkat').val();
    $('#editHarga').val();
    $('#editCover').val();
    $('#editPenerbit').val();
    $('#editPenulis').val();
    $('#editStok').val();

    $.getJSON("<?php echo base_url('index.php/home/get_buku_by_id/')?>"+ id, function(data){
        $('#editJudul').val(data.judul_buku);
        $('#editTahun').val(data.tahun);
        $('#editidkat').val(data.id_kategori);
        $('#editHarga').val(data.harga);
        $('#editCover').val(data.foto_cover);
        $('#editPenerbit').val(data.penerbit);
        $('#editPenulis').val(data.penulis);
        $('#editStok').val(data.stok);
    });
  }

</script>


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Admin_model extends CI_Model
{
  
  public function insert_buku($data)
  {
    $this->db->insert('buku', $data);
    if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
    }
  }


  public function select_kategori_buku()
  {
    return $this->db->get('kategori_buku')->result();
  }
  public function get_buku(){
    $this->db->get('buku')
    ->result();
  }
  public function select_buku(){
    return $this->db->join('kategori_buku', 'kategori_buku.id_kategori = buku.id_kategori' )->get('buku')->result();

  }
  public function get_buku_by_id($id_buku){
    return $this->db->where('id_buku', $id_buku)
            ->get('buku')
            ->row();
  }
  public function update_buku(){
    $data = array(
      'judul_buku' => $this->input->post('editJudul'),
      'tahun' => $this->input->post('editTahun'),
      'id_kategori' => $this->input->post('editidkat'),
      'harga' => $this->input->post('editHarga'),
      'foto_cover' => $this->input->post('editCover'),
      'penerbit' => $this->input->post('editPenerbit'),
      'penulis' => $this->input->post('editPenulis'),
      'stok' => $this->input->post('editStok')
    );
    $this->db->where('id_buku')
        ->update('buku', $data);
    if ($this->db->affected_rows() > 0) {
      # code...
      return TRUE;
    } else {
      return FALSE;
    }
    
  }

}


?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Home extends CI_Controller
{
  
  public function __construct()
  {
    # code...
    parent::__construct();
    $this->load->model('home_model');
    $this->load->model('admin_model');
  }
  public function index(){
    if ($this->session->userdata('logged_in')==true) {
      $data['main_view'] = 'home_view';
      $this->load->view('template', $data);
    } else{
      $this->load->view('login'); 
    }
    
  }
  public function login(){
    if ($this->session->userdata('logged_in') == FALSE) {
      $this->load->view('login');
      # code...
    }else{
      redirect('home');
    }
  }
  public function do_login(){
    if ($this->home_model->check_user() == TRUE) {
      # code...
      redirect('home');
    }else{
      $this->session->set_flashdata('notif', 'Login Gagal!');
      redirect('login');
    }
  }

  public function transaksiView()
  {
    if ($this->session->userdata('logged_in')==true) {
      $data['main_view'] = 'transaksi_view';
      $this->load->view('template', $data);
    } else{
      $this->load->view('login'); 
    }
  }
  public function kelolabuku()
  {
    if ($this->session->userdata('logged_in')==true) {
      $data['main_view'] = 'kelolabuku';
      $data['kategori'] = $this->admin_model->select_kategori_buku();
      $data['buku'] = $this->admin_model->select_buku();
      $this->load->view('template', $data);
    } else{
      $this->load->view('login'); 
    }
  }
  public function data_buku(){
    if($this->session->userdata('logged_in') == TRUE){
      $data['main_view'] = 'kelolabuku';
      $data['buku'] = $this->admin_model->get_buku();
      $this->load->view('template',$data);
    }else{
      redirect('home/login');
    }
  }
  public function logout(){
    $data =array(
      'id_admin' =>"",
      'username' =>"",
      'level' =>"",
      'logged_in' =>FALSE,
    );
    $this->session->unset_userdata($data);
    $this->session->sess_destroy();

    redirect('home/login');
  }
  
  public function insert_buku(){

    if ($this->session->userdata('logged_in') == TRUE) {
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']  = '5000';
      
      $this->load->library('upload', $config);
      
      if ( ! $this->upload->do_upload('inputCover')){
        $this->session->set_flashdata('notif', $this->upload->display_errors());
        redirect('home/kelolabuku');
      }
      else{
        $data = array(
          'judul_buku' => $this->input->post('inputJudul'),
          'tahun' => $this->input->post('inputTahun'),
          'id_kategori' => $this->input->post('inputidkat'),
          'harga' => $this->input->post('inputHarga'),
          'foto_cover' => $this->upload->data('file_name'),
          'penerbit' => $this->input->post('inputPenerbit'),
          'penulis' => $this->input->post('inputPenulis'),
          'stok' => $this->input->post('inputStok')
        );


        if ($this->admin_model->insert_buku($data) == true) {
          $this->session->set_flashdata('notif', 'sukses');
          redirect('home/kelolabuku');
        } else {
          $this->session->set_flashdata('notif', 'gagal');
          redirect('home/kelolabuku');
        }
      }

    }else{
      redirect('home/login');
    }
  }
  
  public function get_buku_by_id($id_buku){
    if ($this->session->userdata('logged_in') == TRUE) {
      $data_buku = $this->admin_model->get_buku_by_id($id_buku);
      echo json_encode($data_buku);
      # code...
    }else{
      redirect('home/login');
    }
  }
  public function edit_buku(){
    if ($this->session->userdata('logged_in') == TRUE) {
      $this->form_validation->set_rules('editJudul', 'Judul Buku', 'trim|required');
      $this->form_validation->set_rules('editTahun', 'Tahun', 'trim|required');
      $this->form_validation->set_rules('editidkat', 'Kategori', 'trim|required');
      $this->form_validation->set_rules('editHarga', 'Harga', 'trim|required');
      $this->form_validation->set_rules('editPenerbit', 'Penerbit', 'trim|required');
      $this->form_validation->set_rules('editPenulis', 'Penulis', 'trim|required');
      $this->form_validation->set_rules('editStok', 'Stok', 'trim|required');
      if ($this->form_validation->run() == TRUE) {
        if ($this->admin_model->update_buku() ==TRUE) {
          $this->session->set_flashdata('notif', 'Edit Buku Berhasil!');
          redirect('home/data_buku');
          # code...
        } else {
          # code...
          $this->session->set_flashdata('notif', 'Edit Buku Gagal!');
          redirect('home/data_buku');
        }
        
      } else {
        $this->session->set_flashdata('notif', validation_errors());
        redirect('home/data_buku');
      } 
      # code...
    }else{
      redirect('home/login');
    }
  }
}
?>

<li class="dropdown messages-menu">
            <a href="<?php echo base_url(); ?>assets#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="<?php echo base_url(); ?>assets#">
                      <div class="pull-left">
                        <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url(); ?>assets#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="<?php echo base_url(); ?>assets#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url(); ?>assets#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url(); ?>assets#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="<?php echo base_url(); ?>assets#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="<?php echo base_url(); ?>assets#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="<?php echo base_url(); ?>assets#">View all tasks</a>
              </li>
            </ul>
          </li>