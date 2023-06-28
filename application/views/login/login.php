  <style>
        body {
            background-color: #f8f9fa;
            display:flex;
            justify-content:center;
            align-items:center
        }
    </style>
  <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-container p-4 mt-5">
                                    <h3 class="text-center mb-4">Login</h3>
                                    <?php if ($this->session->flashdata('pesan')) {
                                        echo $this->session->flashdata('pesan');
                                    }?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="email">username</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter username" name="username">
                                            <small class="text-danger"><?= form_error('username')?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                                            <small  class="text-danger"><?= form_error('password')?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="role" id="" class="form-control">
                                                <option value="pengguna">pengguna</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">Login</button>
                                        <p class="text-center mt-3">Belum Punya Akun ? <a href="<?=base_url('daftar')?>">Daftar</a></p>
                                        <p class="text-center mt-3"><a href="<?=base_url('')?>">Kembali</a></p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <img src="<?=base_url('vendor/bg/ubah_pw.png')?>" alt="Image" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
