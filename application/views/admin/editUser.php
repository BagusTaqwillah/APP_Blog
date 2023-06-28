<div class="container">
    <div class="row">
        <div class="col">
            <h3>Edit User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    Form edit User
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" value="<?=$data_user['name']?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" value="<?=$data_user['username']?>" name="username" >
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control"  name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                           <select name="role" id="" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="pengguna">Pengguna</option>
                           </select>
                        </div>
                        <button class="btn btn-primary">Edit</button>
                        <a href="<?=base_url('data_admin')?>" class="btn btn-secondary">Kembali</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>