<style>
    #brand{
        color:orangered;
    }
    .carousel-inner{
        height:500px;
    }
    hr{
        border:1px solid orangered;
        width:20%;
    }
    #about{
        background-color:#3b4252;
        color:white;
        margin-top:50px;
        padding-bottom:50px;
    }
    #footer{
        margin-top:50px;
        background-color:#3b4252;
        color:white;
        padding:10px;
    }
    #kontak{
    }
    .img_about{
        border-radius:20px;
    }
    i{
        padding:20px;
    }
    .card-img-top{
        height:200px;
    }
</style>
<section id="navbar">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container p-1">
    <a class="navbar-brand" href="#">Lumut<span id="brand">ID</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#about">About</a>
        <a class="nav-item nav-link" href="#kontak">Kontak</a>
        <a class="nav-item nav-link btn btn-warning text-white" href="<?=base_url('login')?>">Login</a>
        </div>
    </div>
  </div>
</nav>
</section>

<section id="panel">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url('vendor/bg/dashboard1.jpg')?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?=base_url('vendor/bg/dashboard2.jpg')?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?=base_url('vendor/bg/dashboard3.jpg')?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>

<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h3>Blog</h3>
                <hr>
                <p>Baca Blog</p>
            </div>
        </div>
        <div class="row">
            <?php foreach($blog as $bl){?>
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?=base_url('assets/img_post/')?><?=$bl['img']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$bl['title']?></h5>
                <p class="card-text"><?=$bl['content']?>.</p>
                <a href="Dashboard/detail/<?=$bl['id_post']?>" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
            </div>
        </div>
        <?php }?>
        </div>
    </div>
</section>

<section id="about">
<div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h3>About</h3>
                <hr>
                <p>Tentang Kami</p>
            </div>
        </div>
        <div class="row">
           <div class="col">
            <h3>Lumut Blog</h3>
            <p>Lumut blog adalah layanan blog yang memberikan <br> informasi mengenai berita terkini dan terupdate baca informasi berita melalui website kami</p>
            <a href="" class="btn btn-warning">selengkapnya</a>
            </div>
            <div class="col">
               <img  class="img_about"src="<?=base_url('vendor/bg/dashboardA.jpg')?>" alt="" width="100%">
           </div>
        </div>
    </div>
</section>

<section id="kontak">
<div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h3>Kontak</h3>
                <hr>
                <p>Kontak Kami</p>
            </div>
        </div>
        <div class="row">
           <div class="col">
            <h3>Social Media</h3>
            <p>Klik link social Media Kami</p>
            <p><i class="fa-brands fa-facebook fa-2x" style="color: #0861fd;"></i> <i class="fa-brands fa-instagram fa-2x" style="color: #ff0000;"></i> <i class="fa-brands fa-github fa-2x"></i> <i class="fa-brands fa-whatsapp fa-2x" style="color: #1adb00;"></i></p>
            <a href="" class="btn btn-warning">selengkapnya</a>
            </div>
            <div class="col">
            <form  action="<?=base_url('Page/kirimSaran')?>" method="post" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nama_pengirim" class="form-control" id="name" placeholder="Nama Kamu" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Kamu" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="saran" rows="7" placeholder="Pesan" required></textarea>
              </div>
              <div class="my-3">
                </div>
                <div ><button type="submit" class="btn btn-warning">Kirim Pesan</button></div>
              </div>
            </form>
           </div>
        </div>
    </div>
</section>

<section id="footer">
    <footer>
        <div class="container p-3 text-center mt-3">
            <p>Development By: Moh Bagus Taqwillah</p>
        </div>
    </footer>
</section>

