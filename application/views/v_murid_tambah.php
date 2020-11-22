
<center><h3 class="mb-3">- TAMBAH DATA MURID BARU -</h3></center>
<form action="<?= base_url('murid/simpan') ?>" method="POST">
    <div class="form-group" style="display: none !important;">
    <label for="id">id</label>
    <input name="id" class="form-control" id="id" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="nim">NIM</label>
    <input name="nim" class="form-control" id="nim" aria-describedby="emailHelp" >
    <small id="emailHelp" class="form-text text-muted"><?= form_error('nim') ?></small>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input name="nama" class="form-control" id="nama" >
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input name="alamat" class="form-control" id="alamat">
  </div>
  <button type="submit" class="btn btn-primary bg-warning">Simpan</button>
  <a type="submit" class="btn btn-primary bg-info" href="<?= base_url('murid/')?>">Kembali</a>
</form>