<style>
    .aktif{
    width:15px;
    height:15px;
    border-radius:50%;
    margin:auto;
  }
</style>
<div class="edit_karyawan">
    <div class="container-fluid">
        <div class="row">
            <div class="col mt-5">
                <div class="card p-4 ">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h5>Data Post</h5>
                                <?php if ($this->session->flashdata('pesan')) { ?>
                                        <?=$this->session->flashdata('pesan')?>
                                <?php }?>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBarang">
                                Tambah Post
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Harga Booking</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;foreach($post as $lap) :?>
                                        <tr>
                                            <td><?= $i++?></td>
                                            <td><img width="40%"src="<?=base_url()?>/assets/img_post/<?=$lap['img']?>" alt=""></td>

                                            <td>
                                                <?=$lap['title'];?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url('Admin/updatePost')?>/<?=$lap['id_post']?>"  class="btn btn-sm btn-primary mt-1"><i class="fas fa-edit"></i></a>
                                                <a  onclick="return confirm('yakin ingin hapus')"href="<?=base_url('Admin/hapusPost')?>/<?= $lap['id_post']?>"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
            </div>
        </div>
    </div>
</div>

 <!-- Modal add barang -->
 <div class="modal fade" id="addBarang" tabindex="-1" role="dialog" aria-labelledby="addBarangLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addBarangLabel">Form Tambah Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="Admin/addPost"  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Foto Post</label>
                    <input type="file" name="img" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" required> 
                  </div>
                  <div class="form-group">
                    <label for="">Tgl Post</label>
                    <input type="date" name="date" class="form-control" required> 
                  </div>
                  <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control"></textarea>
                  </div>         
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">kembali</button>
                  <button type="submit" class="btn btn-primary">tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>



