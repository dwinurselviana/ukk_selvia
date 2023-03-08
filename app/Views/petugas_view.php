<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?>
Petugas
<?= $this->endSection()?>
<?= $this->section('content')?>
        <div class="col">
            <div class="card-border-info">
                <div class="card-header bg-info">
                    <a href="#" data-petugas="" class="btn btn-light" data-target="#modalPetugas" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah Data Petugas</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="petugas">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Level</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 0;
                        foreach ($petugas as $row){
                            $data=$row['nama_petugas'].",".$row['username'].",".$row['telp'].",".$row['level'].",".$row['password'].",".base_url('petugas/edit/'.$row['id_petugas']);
                            #code... 
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?=$row['nama_petugas']?></td>
                                <td><?=$row['username']?></td>
                                <td><?=$row['telp']?></td>
                                <td><?=$row['level']?></td>
                                <td><?=$row['password']?></td>
                                <td>
                                    <a href="" data-petugas="<?=$data?>" data-target="#modalPetugas" data-toggle="modal" class="btn btn-dark"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="<?=base_url('petugas/delete/'.$row['id_petugas'])?>" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    
                </div>
                <?php if(!empty(session()->getFlashdata("message"))) :?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata("message") ;?>

                        </div>
                        <?php endif ?>
            </div>
        </div>
    <div class="modal fade" id="modalPetugas" tabindex="-1" aria-labelledby="modalPetugasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLable">Input Data Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmPetugas" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control" id="nama_petugas">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp</label>
                            <input type="text" name="telp" class="form-control" id="telp">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">==Pilih Level==</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dissmis="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?=$this->endSection()?>
    <?=$this->section("script")?>
    <script>
        $(document).ready(function(){
            alert("a");
            $("#modalPetugas").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('petugas');
                if(data !=""){
                    const barisdata = data.split(",");
                    $('#nama_petugas').val(barisdata[0]);
                    $('#username').val(barisdata[1]);
                    $('#telp').val(barisdata[2]);
                    $('#level').val(barisdata[3]).change();
                    $('#password').val(barisdata[4]).change();
                    $('#frmPetugas').attr('action',barisdata[5]);
                }else{
                    $('#nama_petugas').val('');
                    $('#username').val('');
                    $('#telp').val('');
                    $('#level').val('').change();
                    $('#password').val('').change();
                    $('#frmPetugas').attr('action','/spetugas');
                }
            });

            $('#petugas').DataTable();
        })
    </script>
    <?=$this->endSection()?>