
    <div class="content container">
      <div aria-label="breadcrumb">
        <div class="breadcrumb  mt-3" style='text-align: center; display: flex; justify-content: center; flex-direction: column; align-items: center;'>
          <div class="ikon mb-2" style='font-size: 1.6rem; width: 3rem; height: 3rem; border: 2px solid #e06315; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: #ffa36a'>
            <i class='ti ti-check'></i>
          </div>
          <h4 style='margin: 0;'>TRANSAKSI TELAH TERSIMPAN</h4>
          <a href="<?= base_url('studi/'); ?>" class='mt-4'>Kembali ke form</a>
        </div>
      </div>
      
      <div class="form">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name='nama' value='<?= $nama; ?>' readonly>
            </div>
            <div class="form-group col-md-6">
              <label>Nomor Telepon</label>
              <input type="text" class="form-control" id="nomortelp" name='nomortelp' value='<?= $nomortelp;?>' readonly>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Produk</label>
              <select id="produk" class="form-control" name='produk' readonly>
                <option value='0'><?= $produk; ?></option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Ukuran</label>
              <select id="ukuran" class="form-control" name='ukuran' readonly>
                <option value='0'><?= $ukuran; ?></option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input class="form-control" id="harga" name='harga' readonly value='<?= $harga;?>'>
              </div>
            </div>
            <div class="form-group col-md-2">
              <label>Jumlah Pcs</label>
              <input type="number" class="form-control" id="pcs" name='pcs' value='<?= $pcs; ?>' readonly>
            </div>
          </div>
          <center><h5>TOTAL BELANJA</h5></center>
          <input class="form-control" id="total" name='total' value='<?= $total;?>' readonly style="text-align: center;">
        </form>
      </div>
