<div class="edit_karyawan">
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <h3>Edit Lapangan</h3>
                <div class="card p-4 ">
                    <h3>Form Edit Lapangan</h3>
                    <form  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">foto</label>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?=base_url('assets/img_post/')?><?=$post['img']?>" alt="" srcset="" class="img-thumbnail" id="img" width="70%">
                        </div>
                        <div class="col">
                            <input type="file" name="img" id="img_in" class="form-control" placeholder="masukan nama..">
                            <small class="text-danger">pastikan gambar dengan extensi jpg/png</small>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control"value="<?=$post['title']?>" required> 
                  </div>
                  <div class="form-group">
                    <label for="">Tgl Post</label>
                    <input type="date" name="date" class="form-control" required value=" <?=$post['date']?>"> 
                  </div>
                  <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" value=" <?=$post['content']?>"><?=$post['content']?></textarea>
                  </div> 
                  <button type="submit" class="btn btn-primary">update</button><a href="<?=base_url('admin')?>" class="btn btn-secondary">kembali</a>
                </div>
              </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const image=document.getElementById('img');
        input =document.getElementById('img_in')
        input.addEventListener("change",()=>{
            image.src = URL.createObjectURL(input.files[0])
        })
    </script>
