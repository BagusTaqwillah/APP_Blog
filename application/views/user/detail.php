<section id="detail">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card p-5 mt-5">
                    <h2>Detail Blog</h2>
                    <h3><?=$blog['title']?></h3>
                    <small><?=$blog['date']?></small>
                    <img src="<?=base_url('assets/img_post/')?>/<?=$blog['img']?>" alt="" srcset="" class="img-thumbnail" width="60%">
                    <p><?=$blog['content']?></p>
                    <a href="<?=base_url()?>" class="btn btn-secondary">kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>