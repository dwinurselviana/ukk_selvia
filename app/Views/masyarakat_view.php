<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Masyarakat
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card border-info">
            <div class="card-header bg-info">
                
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="masyarakat">
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Telp</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($masyarakat as $row) {
                        $data = $row['nik'].",".$row['nama'].",".$row['username'].",".$row['password'].",".$row['telp'].",".base_url('masyarakat/edit/'.$row['id_masyarakat']);
                        $no++;
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nik'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['telp'] ?></td>
                        <td>
                            <a href="<?= base_url('masyarakat/delete/' . $row['id_masyarakat']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                    ?>
                </table>
                <?php if (!empty(session()->getFlashdata("message"))) : ?>
                    <div class="alert alert-success">
                         <?php echo session()->getFlashdata("message"); ?>
                    </div>
                <?php endif ?>     
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalMasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Input Data Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmMasyarakat" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" class="form-control" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" name="telp" class="form-control" id="telp">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dissmis="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->Section("script") ?>
<script>
    $("#document").ready(function() {
        $("#modalMasyarakat").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('masyarakat');
            if (data!= "") {
                const barisdata = data.split(",");
                $('#nik').val(barisdata[0]);
                $('#nama').val(barisdata[1]);
                $('#username').val(barisdata[2]);
                $('#password').val(barisdata[3]);
                $('#telp').val(barisdata[4]);
                $('#frmMasyarakat').attr('action', barisdata[5]);
                $('#ubahpassword').show();
            }else {
                $('#nik').val('');
                $('#nama').val('');
                $('#username').val('').change();
                $('#password').val('');
                $('#telp').val('');
                $('#frmMasyarakat').attr('action', '/smasyarakat');
                $('#ubahpassword').hide();
            }
        });

        $('#masyarakat').DataTable();
    })
</script>
<?= $this->endSection() ?>