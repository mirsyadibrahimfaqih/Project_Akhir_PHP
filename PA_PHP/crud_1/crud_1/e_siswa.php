<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
                    require_once 'controllers/class_siswa.php';
                    // ciptakan object dari class Produk
                    $ar_gender = ['Laki-Laki','Perempuan'];
                    $obj = new Mahasiswa($dbh);
                    // panggil method tampilkan data produk
                    $rs = $obj->getAllJurusanMahasiswa();
                    // tangkap request id, di url
                    $id = $_REQUEST['id'];
                    $data_edit = $obj->getMahasiswa($id);
                ?>
                <form class="container form mt-3" action="controllers/siswaController.php" method="POST">
                        <div class="form-group row">
                            <label for="NIM"  class="col-3 col-form-label">NIM</label> 
                            <div class="col-8">
                            <input id="NIM" name="NIM" value="<?= $data_edit->NIM; ?>" type="text" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-3 col-form-label">Nama Produk</label> 
                            <div class="col-8">
                            <input id="nama" name="nama" value="<?= $data_edit->nama; ?>" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">gender</label> 
                            <div class="col-8">
                            <?php 
                                $no = 0;
                                foreach($ar_gender as $gender){
                                // edit kondisi
                                $cek = ($data_edit->gender == $gender) ? "checked" : "";
                             ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                <input name="gender" id="gender_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $gender ?>" <?= $cek ?> required="required"> 
                            <label for="kondisi_<?= $no ?>" class="custom-control-label"><?= $gender ?></label>
                                </div>
                            <?php 
                                $no++;
                                }
                            ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="umur" class="col-3 col-form-label">umur</label> 
                            <div class="col-8">
                            <input id="umur" name="umur" value="<?= $data_edit->umur; ?>" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="NIK" class="col-3 col-form-label">NIK</label> 
                            <div class="col-8">
                            <input id="NIK" name="NIK" value="<?= $data_edit->NIK; ?>" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-3 col-form-label">Jurusan Mahasiswa</label> 
                            <div class="col-8">
                            <select id="jurusan" name="jurusan" class="custom-select" required="required">
                                <option value="">-- Pilih Jurusan --</option>
                                <?php 
                                    foreach($rs as $j){
                                    // edit jurusan
                                    $sel = ($data_edit->idjurusan == $j->id) ? "selected" : "";
                                ?> 
                                <option value="<?= $j->id ?>" <?= $sel ?> ><?= $j->nama ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-3 col-form-label">Foto</label> 
                            <div class="col-8">
                            <input id="foto" name="foto" value="<?= $data_edit->foto; ?>" type="text" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="offset-3 col-8">
                            <button name="submit" type="submit" value="ubah" class="btn btn-primary">Update</button>
                            <input type="hidden" name="idx" value="<?= $id ?>" />
                        </div>
                        </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- 834 - 1746 -->