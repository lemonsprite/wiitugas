        <a class="btn btn-secondary mb-2" href=" <?= base_url('murid/tambah') ?>" style="display: flex !important; justify-content: center;">Tambah Murid</a>
        <table class="table">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIM</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">OPERASI</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach($murid as $data) :?>
                <tr>
                    <th scope="row"><?= $data['nim'] ?></th>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary bg-success" href=" <?= base_url('murid/detail/'. $data['nim']) ?>">Lihat</a>
                            <a class="btn btn-secondary bg-danger" href=" <?= base_url('murid/delete/'. $data['id']) ?>">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
