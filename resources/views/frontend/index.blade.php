<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracking Covid - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png ') }}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png ') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/venobox/venobox.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/line-awesome/css/line-awesome.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css ') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css ') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: - v2.2.1
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html">Tracking Covid</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"></li>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">Data kasus</a></li>
          <li><a href="#provinsi">Provinsi</a></li>
          <li><a href="#global">Global</a></li>
          <li><a href="#services">Tentang</a></li>
          <li><a href="#footer">Contact</a></li>

          
        </ul>
      </nav><!-- .nav-menu -->
<!-- <li class="get-started"><a href="#get-started">Get Started</a></li> -->
    </div>
    
  </header><!-- End Header -->

  <!-- ======= home Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>TRACKING COVID19</h1>
      <h2></h2>
      
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Data Section ======= -->
    <section id="about" class="about">
      <div class="container" >
      <div class="section-title" data-aos="zoom-out">
      <br><h2>Data Kasus Covid-19</h2>
      </div>
        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                  <i class="icofont-worried"></i>
                  <p>Total positif</p>
                  <span data-toggle="counter-up">{{$positif}}</span>
                  <p>Orang</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                  <i class="icofont-simple-smile"></i>
                  <p> Total Sembuh</p>
                  <span data-toggle="counter-up">{{$sembuh}}</span>
                  <p>Orang</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                  <i class="icofont-crying"></i>
                  <p> Total Meninggal</p>
                  <span data-toggle="counter-up">{{$meninggal}}</span>
                  <p>Orang</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                  <i class="icofont-globe"></i>
                  <p>Kasus Data Global</p>
                  
                  <p>Orang</p>
                </div>
              </div>

            </div>
          </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Table Section Provinsi ======= -->
    <section id="provinsi" class="provinsi">
      <div class="container" >

        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Provinsi</h2>
        </div>
        <div class="card-body" >
           <div style="height:600px;overflow:auto;margin-right:15px;">
           <table  class="table table-bordered table-striped mb-0 " width="100%">
             <thead>
                <tr>
                      <th scope="col"><center>No</center></th>
                      <th scope="col"><center>Provinsi</center></th>
                      <th scope="col"><center>Positif</center></th>
                      <th scope="col"><center>Sembuh</center></th>
                      <th scope="col"><center>Meninggal</center></th>
                    </tr>
             </thead>
             <tbody>
              @php
                $no = 1;
              @endphp

              @foreach($tampil as $tmp)
                  <tr>
                    <th scope="row"><center>{{$no++}}</center></th>
                      <td><center>{{$tmp->nama_provinsi}}</center></td>
                      <td><center>{{number_format($tmp->positif)}}</center></td>
                      <td><center>{{number_format($tmp->sembuh)}}</center></td>
                      <td><center>{{number_format($tmp->meninggal)}}</center></td>
                  </tr>
                  
                </tbody>
                @endforeach
           </table>
           </div>
        </div>
             </div>
    </section>
    <!-- End Table Section provinsi -->

    <!-- ======== Table Section Global ======= -->
    <section id="global" class="global">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Global</h2>
        </div>

       
        <div class="card-body" >
            <div style="height:600px;overflow:auto;margin-right:15px;">
              <table class="table table-bordered table-striped mb-0 " width="100%">
                <thead>
                  <tr>
                    <th scope="col"><center>No</center></th>
                    <th scope="col"><center>Negara</center></th>
                    <th scope="col"><center>Positif</center></th>
                    <th scope="col"><center>Sembuh</center></th>
                    <th scope="col"><center>Meninggal</center></th>
                  </tr>
                </thead>
             
                
              </table>
            </div>
          </div>
        </div>

      </div>
      </section>
    <!-- ======== End Table Section Global ======= -->
    


    <!-- ======= Services Section ======= -->
    <section id="services" class="services  section-bg ">
      <div class="container">

      <div class="section-title pt-5" data-aos="fade-up">
          <h2>Mengenai Tentang VirusCorona</h2>
        </div>

        <div class="row">
          <div class="col-md-12 col-xl-6">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="card text-white "></i></div>
              <h4 class="title"><a href="">Apa Itu Virus Corona ?</a></h4>
              <p class="description">Coronavirus adalah kumpulan virus yang bisa menginfeksi sistem pernapasan.
               Pada banyak kasus, virus ini hanya menyebabkan infeksi pernapasan ringan, seperti flu. 
               Namun, virus ini juga bisa menyebabkan infeksi pernapasan berat,
                seperti infeksi paru-paru (pneumonia).</p>
            </div>
          </div>
        
          <div class="row">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box" >
              <div class="icon"><i class="" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href=""> Yang Perlu Anda Ketahui</a></h4>
              <p class="description">Gejala Awal infeksi virus Corona atau COVID-19 bisa menyerupai gejala flu, 
              yaitu demam, pilek, batuk kering, sakit tenggorokan, dan sakit kepala. 
              Setelah itu, gejala dapat hilang dan sembuh atau malah memberat. 
              Penderita dengan gejala yang berat bisa mengalami demam tinggi, 
              batuk berdahak bahkan berdarah, sesak napas, dan nyeri dada. 
              Gejala-gejala tersebut muncul ketika tubuh bereaksi melawan virus Corona.
              Secara umum, ada 3 gejala umum yang bisa menandakan seseorang terinfeksi virus Corona, yaitu:<br>
                 -Demam (suhu tubuh di atas 38 derajat Celsius)<br>
                 -Batuk kering<br>
                 -Sesak napas</p>
            </div>
         </div>

      </div>
    </section><!-- End Services Section -->
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <center>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- <div class="col-lg-3 col-md-6 footer-info">
            <h3>Serenity</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div> -->
           
          <div class="col-lg-3 col-md-12 footer-links">
            <h4>Useful Links</h4>
            <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">Data kasus</a></li>
            <li><a href="#provinsi">Provinsi</a></li>
            <li><a href="#global">Global</a></li>
            <li><a href="#services">Tentang</a></li>
            <li><a href="#footer">Contact</a></li>
              
            

            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact">
            <h4>Tracking covid</h4>
            <p>
              JL.Situtarate - Cibaduyut <br>
              Kab.Bandung<br>
              
              <strong>Phone:</strong> +62 819 9107 9164<br>
              <strong>Email:</strong> smkassalaam<br>
            </p>

            
          </div>

          

        </div>
      </div>
    </div>
    <!-- <div class="container">
      <div class="copyright">
        &copy; Hak Cipta <strong><span>Serenity</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
       <!-- <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div> -->
    </center>
  </footer>End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/counterup/counterup.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js ') }}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js ') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js ') }}"></script>

</body>

</html>