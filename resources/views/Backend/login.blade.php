
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="http://127.0.0.1:8000/frontend/assets/img/favicon.png" rel="icon">
  <link href="http://127.0.0.1:8000/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="http://127.0.0.1:8000/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="http://127.0.0.1:8000/frontend/assets/css/style.css" rel="stylesheet">

 
</head>

<body>


<style>
  .login-box{
    margin-top: 70px;
  }
</style>


  <main id="main">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-5  m-auto">
                <div class="card border-primary mt-3">
                    <div class="card-header text-primary text-center"><h5 class="card-title"><a href="{{url('/')}}">BBA College Nepal</a></h5></div>
                    <div class="card-body text-primary">
                        @if (Session('success'))
                        <div class="alert alert-success">
                             {{Session('success')}}
                        </div>
                   
                   @endif
                   @if (Session('error'))
                   <div class="alert alert-danger">
                        {{Session('error')}}
                   </div>
              
              @endif
    
                      <h5 class="card-title text-center"><i class="fa fa-lock"></i> Login Here</h5><hr>
                        <form action="{{route('admin-home')}}" method="POST">
                            @csrf
                            <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="Enter username">
                            <a style="color:red">
                                @error('username')
                                    {{$message}}
                                @enderror
                            </a>
                           
                            <input type="password" name="password"  value="{{old('password')}}" class="form-control mt-3" placeholder="Enter password ">
                            <a style="color:red">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </a>

                            
                            <div class="col-md-12 col-lg-6">
                            <button type="submit" class="btn btn-primary mt-3 text-white">Login</button>

                            </div>
                            <hr>
                            <div class="col-md-12 mt-3 text-center ">
                              <p class="forgot" align="center"><a href="#">Forgot Password?</p>
                                <p>Haven't account yet? <a  href="{{route('register')}}"> Register Now.</p>                            </div>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
   
    </main><!-- End #main -->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="http://127.0.0.1:8000/frontend/assets/vendor/purecounter/purecounter.js"></script>
<script src="http://127.0.0.1:8000/frontend/assets/vendor/aos/aos.js"></script>
<script src="http://127.0.0.1:8000/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://127.0.0.1:8000/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="http://127.0.0.1:8000/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="http://127.0.0.1:8000/frontend/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="http://127.0.0.1:8000/frontend/assets/js/main.js"></script>

</body>

</html>
