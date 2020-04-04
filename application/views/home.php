<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <!-- <img src="http://afrizalmy.com/static/img/2.png" height="400"> -->
  <img src="<?php echo base_url(); ?>assets/img/afrizal.png" height="400">
  <?php foreach($user as $u){ ?>
  <h1 class="display-4"><?php echo $u->nama ?></h1>
  <p class="lead"><?php echo $u->npm ?></p>
  <p class="lead"><?php echo $u->deskripsi ?></p>
  <!-- 
     Maaf ya Pak,
     disini saya buat tabel baru buat menyimpan data dekripsi.
     Import database dari saya .
   -->
  <?php } ?>

</div>

<div class="container">
  

  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Biodata</h4>
      </div>
      <div class="card-body">
       <?php foreach($user as $u){ ?>
        <h3 class="card-title pricing-card-title"><small class="text-muted">Nama :  </small> <?php echo $u->nama ?></h3>
        <h3 class="card-title pricing-card-title"><small class="text-muted">Umur :  </small> <?php 
        echo date_diff(date_create($u->tgl_lahir), date_create('now'))->y;?> Tahun</h3>
        <h3 class="card-title pricing-card-title"><small class="text-muted">Alamat:  </small><?php echo $u->alamat ?></h3>
        <h3 class="card-title pricing-card-title"><small class="text-muted">Email :  </small><?php echo $u->email ?></h3>
        <!-- <button type="button" class="btn btn-lg btn-block btn-outline-warning">Edit Biodata</button> -->
        <input type="button" class="btn btn-lg btn-block btn-outline-warning" onclick="location.href='<?php echo base_url(); ?>index.php/welcome/editbio/<?php echo $u->npm;?>';" value="Edit Biodata" />
       <?php } ?>
      </div>
    </div>   
  </div>

   <br><br>
    <h1>Pendidikan <input type="button" class="btn btn-primary"onclick="location.href='<?php echo base_url(); ?>index.php/welcome/tambahjenjang/'" value="+ Tambah Data" /></h1>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Jenjang Pendidikan</th>
      <th scope="col">Sekolah/Univ</th>
      <th scope="col">Thn Lulus</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr><?php $no = 1; foreach($jenjang as $u){ ?>
      <th scope="row"><?php echo $no ?></th>
      <td><?php echo $u->nama_jenjang;?></td>
      <td><?php echo $u->nama_sekolah;?></td>
      <td><?php echo $u->thn_lulus; $no++;?></td>
      <td>
      <input type="button" class="btn btn-outline-warning"onclick="location.href='<?php echo base_url(); ?>index.php/welcome/editjenjang/<?php echo $u->id_pendidikan;?>'" value="Edit" />
      <a type="button" class="btn btn-outline-danger" href="<?php echo base_url(); ?>index.php/welcome/hapusjenjang/<?php echo $u->id_pendidikan;?>" onclick="return confirm('Anda yakin mau menghapus data ini?');">Delete</a>
    <!-- <input type="button" class="btn btn-outline-danger"onclick="location.href='<?php echo base_url(); ?>index.php/welcome/hapusjenjang/<?php echo $u->id_pendidikan;?>'" value="Hapus" /> -->
      </td>
    </tr> <?php } ?>
  </tbody>
</table>


  