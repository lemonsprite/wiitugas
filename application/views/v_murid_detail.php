
<center><h3 class="mb-3">- INFO DETAIL MURID -</h3></center>
<form action="<?= base_url('murid/update') ?>" method="POST">
    <div class="form-group" style="display: none !important;">
    <label for="id">id</label>
    <input name="id" class="form-control" id="id" aria-describedby="emailHelp" value="<?= $murid[0]['id'] ?>">
  </div>
  <div class="form-group">
    <label for="nim">NIM</label>
    <input name="nim" class="form-control" id="nim" aria-describedby="emailHelp" value="<?= $murid[0]['nim'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input name="nama" class="form-control" id="nama" value="<?= $murid[0]['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input name="alamat" class="form-control" id="alamat" value="<?= $murid[0]['alamat'] ?>">
  </div>
  <button type="submit" class="btn btn-primary bg-warning">Update</button>
  <a type="submit" class="btn btn-primary bg-info" href="<?= base_url('murid/')?>">Kembali</a>
</form>