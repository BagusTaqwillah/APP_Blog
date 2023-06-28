<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Data User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Tambah User
            </button>
            
            <?php if ($this->session->flashdata('pesan')) { ?>
                <?=$this->session->flashdata('pesan')?>
           <?php }?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" >
                            <small class="text-danger text-small"><?=form_error('name')?></small>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                           <select name="role" id="" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="pengguna">Pengguna</option>
                           </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">kembali</button>
                        <button type="submit" class="btn btn-primary">simpan</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                     Data User
                </div>
                <div class="card-body">
                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;foreach($data_user as $d_user) :?>
                                        <tr>
                                            <td><?= $i++?></td>
                                            <td><?= $d_user['name']?></td>
                                            <td><?= $d_user['username']?></td>
                                            <td><?= $d_user['role']?></td>
                                            <td>
                                                <a onclick="confirm('yakin ingin hapus')" href="<?=base_url('Admin/hapus_user')?>/<?=$d_user['id_user']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                <a href="<?=base_url('Admin/editUser')?>/<?=$d_user['id_user']?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>

    </div>
</div>