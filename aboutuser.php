<?php
    error_reporting(0);
    include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">


    <!--style-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--logo title-->
    <link rel="icon" href="assets/images/logo.png" type="image/x-icon-dark">
    <title>Trans Madiun</title>
  </head>
  <body id="home">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light position-fixed w-100" style="background-color: #ffffff;">
        <div class="container">
          <a class="navbar-brand" href="utama.php">
          </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <!-- <li class="nav-item"> -->
              <a class="nav-link active" aria-current="page" href="Utama.php">Beranda</a>
              <a class="nav-link "  href="home.php#order">Cara Order</a>
              <a class="nav-link "  href="home.php#jadwal">Jadwal</a>
              <a class="nav-link "  href="home.php#layanan">Layanan</a>
              <a class="nav-link "  href="home.php#about">Tentang Kami</a>
            </div>
                <style>
        .navbar {
            background-color: #ffffff;
            padding: 5px 0; /* Kurangi padding untuk membuat navbar lebih tipis */
        }
        .navbar .navbar-brand img {
            height: 50px; /* Kurangi tinggi logo agar navbar lebih tipis */
        }
        .navbar-nav .nav-link {
            padding: 5px 10px; /* Kurangi padding pada link navbar */
        }
        .auth-links {
            text-align: center;
            margin: 10px 0; /* Kurangi margin untuk membuatnya lebih tipis */
        }
        .auth-links a {
            display: inline-block;
            margin: 0 10px;
            padding: 5px 15px; /* Kurangi padding pada link auth */
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        }
        .auth-links a:hover {
            background-color: #0056b3;
        }
    </style>
            </div>
          </div>
        </div>
      </nav>
</head>
      <!--section 1-->
      <body id="Beranda">
      <section id="hero">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
       <img src="https://cdn.antaranews.com/cache/730x487/2022/03/07/Terminal-Caruban.jpg" class="img-fluid" alt="">
       <style>
      #hero {
      background-image: url('https://live.staticflickr.com/5477/9395435759_08ce8b4bc4_b.jpg');
      background-size: 100% 100%;
      background-position: center center;
      }
      </style>
      </section>

<div class="container-fluid mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-tittle">Filosofi</h5>
                            <hr>
                            <div class="justify-content-center">
                                <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none"></div>
                                <p>Filosofi Bus Trans Madiun merupakan cerminan dari komitmen kami untuk memberikan pengalaman perjalanan yang terbaik bagi setiap penumpang.
                                <br>Kami percaya bahwa pelayanan prima, keamanan, ketepatan waktu, serta kenyamanan dan kebersihan adalah elemen-elemen kunci yang membentuk identitas kami. Dengan mengutamakan pelayanan yang ramah, sopan, dan profesional, kami berusaha memastikan setiap penumpang merasa dihargai dan dilayani dengan baik. Keamanan dan keselamatan menjadi prioritas utama kami dengan adopsi teknologi terkini dan perawatan berkala pada armada kami. Kami juga memahami pentingnya waktu bagi penumpang, oleh karena itu, kami selalu berupaya untuk tiba dan berangkat tepat waktu sesuai dengan jadwal yang telah ditentukan. Fasilitas yang nyaman dan bersih serta dukungan terhadap upaya pelestarian lingkungan juga menjadi bagian integral dari filosofi kami, sehingga setiap perjalanan dengan Bus Trans Madiun menjadi pengalaman yang menyenangkan dan berkesan bagi semua penumpang. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid mt-3">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-11">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-tittle">Tentang kami</h5>
                                <hr>
                                <div class="justify-content-center">
                                    <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none"></div>
                                    <p>Bus Trans Madiun adalah sebuah perusahaan transportasi yang berkomitmen untuk menyediakan layanan perjalanan yang berkualitas dan terpercaya bagi masyarakat Madiun dan sekitarnya. Sebagai bagian dari komunitas transportasi publik, kami mengutamakan kepuasan dan kenyamanan pelanggan dalam setiap perjalanan. Dengan armada bus yang modern dan dilengkapi dengan berbagai fasilitas, kami menawarkan pengalaman perjalanan yang aman, nyaman, dan efisien. Keamanan penumpang adalah prioritas utama kami, sehingga kami secara rutin melakukan pemeliharaan dan pengawasan terhadap armada kami. Kami juga berkomitmen untuk menjaga ketepatan waktu dalam layanan kami, serta memberikan pelayanan yang ramah dan profesional kepada setiap penumpang. Dukungan terhadap pelestarian lingkungan juga menjadi bagian integral dari nilai-nilai kami, dengan mengadopsi teknologi ramah lingkungan dan praktik operasional yang bertanggung jawab. Bus Trans Madiun siap menjadi mitra dalam setiap perjalanan Anda, menghubungkan destinasi dan membangun hubungan yang berkelanjutan dengan komunitas kami.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="judul"><center>Struktur Jabatan</center></div>   

                <div class="row">
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="profil">
                            <div class="img">
                                <img src="assets/images/habib.jpg" alt="">
                            </div>
                            <div class="tim-content">
                                <h3 class="title">Eggar Aliya Dewangga</h3>
                                <span class="post">Anggota</span>
                            </div>
                            <ul class="sosmed">
                                <li><a href="https://www.instagram.com/naviantiii" target="_blank" rel="noopener" class="fab fa-instagram"></a></li>
                                <li><a href="https://twitter.com/potatoskies_" target="_blank" rel="noopener" class="fab fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="profil">
                            <div class="img">
                                <img src="assets/images/habib.jpg" alt="">
                            </div>
                            <div class="tim-content">
                                <h3 class="title">Habib Ainur Ma'ruf</h3>
                                <span class="post">Anggota</span>
                            </div>
                            <ul class="sosmed">
                                <li><a href="https://www.instagram.com/mybxlws" target="_blank" rel="noopener" class="fab fa-instagram"></a></li>
                                <li><a href="https://twitter.com/lulalolaa_" target="_blank" rel="noopener"class="fab fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="profil">
                            <div class="img">
                                <img src="assets/images/aulia.png" alt="">
                            </div>
                            <div class="tim-content">
                                <h3 class="title">Aulia Diva Sukmadevi</h3>
                                <span class="post">Anggota</span>
                            </div>
                            <ul class="sosmed">
                                <li><a href="https://www.instagram.com/mybxlws" target="_blank" rel="noopener" class="fab fa-instagram"></a></li>
                                <li><a href="https://twitter.com/lulalolaa_" target="_blank" rel="noopener"class="fab fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>

    <style>
        .container {
    margin-top: 5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
        }
body{
    padding: 0;
    margin: 0;
    background: #fff;
}
#nav{
    font-size: 30px;
    background-color: #98C1D9;
}
.nav-link{
    color: #3D5A80;
}
.nav-link:hover{
    color: white;
}

.slider .slick-slide {
    border: solid 1px #000;
}
.slider .slick-slide img {
    width: 100%;
}
.slick-prev, .slick-next {
    width: 50px;
    height: 50px;
    z-index: 1;
}
.slick-prev {
    left: 5px;
}
.slick-next {
    right: 5px;
}
.slick-prev:before, 
.slick-next:before {
    font-size: 40px;
    text-shadow: 0 0 10px rgba(0,0,0,0.5);
}
.slick-dots {
    bottom: 15px;
}
.slick-dots li button:before {
    font-size: 12px;
    color: #fff;
    text-shadow: 0 0 10px rgba(0,0,0,0.5);
    opacity: 1;
}
.slick-dots li.slick-active button:before {
    color: #dedede;
}
.slider:not(:hover) .slick-arrow,
.slider:not(:hover) .slick-dots {
    opacity: 0;
}
.slick-arrow,
.slick-dots {
    transition: opacity 0.5s ease-out;
}
.card-body{
    background-color: #98C1D9;
}

.card-body {
    font-size: 16px; /* Ukuran font sedang */
    line-height: 1.5; /* Jarak antar baris */
    color: #333; /* Warna teks */
}

.card-tittle {
    font-size: 20px; /* Ukuran font judul */
    color: #007bff; /* Warna judul */
}

.card {
    border: 1px solid rgba(0, 0, 0, 0.125); /* Warna border */
    border-radius: 0.25rem; /* Border radius */
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Efek bayangan */
}

.spinner-border {
    width: 3rem; /* Ukuran spinner */
    height: 3rem; /* Ukuran spinner */
}

.container-fluid {
    padding: 20px; /* Padding untuk container */
}

/* Profile Card */
.profil{
    padding: 40px 0px 40px;
    background: #FFF;
    overflow: hidden;
    position: relative;
}

.profil .img{
    display: inline-block;
    width: 180px;
    height: 180px;
    margin-bottom: 50px;
    position: relative;
    z-index: 1;
        }
.profil .img:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: #3D5A80;
    position: absolute;
    top: 0;
    left: 0; 
    z-index: -1;    
}

.profil .img img{  
    width: 100%;
    height: auto;
    border-radius: 50%;
    transform: scale(1);
    transition: all 0.9s ease 0s;
}
.profil:hover .img img{
    box-shadow: 0 0 0 14px #004aad;
    transform: scale(1.1);
}
.profil .tim-content{
    margin-bottom: 30px;
 }
.profil .title{
    font-size: 22px;
    font-weight: 700;
    color:#4e5052;
    letter-spacing: 1px;
    text-transform: capitalize;
    margin-bottom: 5px;
}
.profil .post{
    display: block;
    font-size: 15px;
    color:#4e5052;
            text-transform: capitalize;
}
.profil .sosmed{
    width: 100%;
    padding:0;
    margin:0;
    background: #004aad;
    position: absolute;
    bottom: -100px;
    left:0;
    transition: all 0.5 ease 0s;
}
.profil:hover .sosmed{
    bottom:0;
}
.profil .sosmed li{
    display: inline-block;
}
.profil .sosmed li a{
    display: block;
    padding:10px;
    font-size: 17px;
    color:#fff;
    transition: all 0.3s ease 0s;
}
.profil .sosmed li a:hover{
     color:#98C1D9;
     background: #004aad;
     text-decoration: none;
}