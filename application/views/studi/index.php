
    <div class="content container">
      <div aria-label="breadcrumb">
        <div class="breadcrumb  mt-3" style='text-align: center; display: flex; justify-content: center; flex-direction: column; align-items: center;'>
          <div class="ikon mb-2" style='font-size: 1.6rem; width: 3rem; height: 3rem; border: 2px solid #6315e0; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: #35125d'>
            <i class='ti ti-pencil'></i>
          </div>
          <h4 style='margin: 0;'>FORM TRANSAKSI</h4>
        </div>
      </div>
      
      <div class="form">
        <form action="<?= base_url('studi/hasil'); ?>" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name='nama' required>
            </div>
            <div class="form-group col-md-6">
              <label>Nomor Telepon</label>
              <input type="text" class="form-control" id="nomortelp" name='nomortelp' required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Produk</label>
              <select id="produk" class="form-control" name='produk' required>
                <option value='0'>Pilih Produk...</option>
                <?php foreach($produk as $data) : ?>
                  <option value='<?= $data['produk']; ?>'><?= $data['produk']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Ukuran</label>
              <select id="ukuran" class="form-control" name='ukuran' required>
                <option value='0'>Pilih Ukuran...</option>
                <?php for($i = 32; $i <= 44; $i++) : ?>
                  <option value='<?= $i; ?>'><?= $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input class="form-control" id="harga" name='harga' readonly>
              </div>
            </div>
            <div class="form-group col-md-2">
              <label>Jumlah Pcs</label>
              <input type="number" class="form-control" id="pcs" name='pcs' value='1' required>
            </div>
          </div>
          <center><h5>TOTAL BELANJA</h5></center>
          <input class="form-control" id="total" name='total' readonly style='text-align: center;'>
          <button type="submit" class="btn btn-primary mt-4" style='display: flex; width: 100%; justify-content: center;'>SIMPAN TRANSAKSI</button>
        </form>
      </div>
    </div>


    <script>
      $('#produk').change(function(){

        var prd = $('#produk').val();
        console.log(prd);
        $.ajax({
          type: 'POST',
          url: "<?= base_url('studi/harga'); ?>",
          dataType: 'json',
          data: {namaproduk: prd },
          success: function(e) {
            console.log(e);
            $('#harga').val(e[0]['harga']);
            
            if($('#pcs').val() == 1)
              $('#total').val(e[0]['harga']);

            $('#total').val(e[0]['harga'] * $('#pcs').val());
          }
        });
      });

      $('#pcs').on('input',function(){
        var x = $('#harga').val();

        console.log('Data berubah');
        $('#total').val(x * $('#pcs').val());
      });
    </script>
  