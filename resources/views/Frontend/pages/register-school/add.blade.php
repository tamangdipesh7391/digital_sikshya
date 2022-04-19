{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('frontend/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('frontend/assets/css/style.css')}}" rel="stylesheet">

 
</head>

<body> --}}
    @extends('Frontend.main')
    @section('content')
    <section class="breadcrumbs">
       
      </section>
  
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card border-primary mt-3">
                    <div class="card-header text-primary text-center"><h5 class="card-title">Welcome to our learning platform!</h5></div>
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
    
                      <h5 class="card-title">Registration From</h5><hr>
                        <form action="{{route('register-school')}}" method="POST">
                            @csrf
                            <input type="text" name="name" class="form-control" placeholder="Your School Name">
                            <a style="color:red">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </a>
                            <input type="text" name="short_code" class="form-control mt-3" placeholder="Short Code">
                            <a style="color:red">
                                @error('short_code')
                                    {{$message}}
                                @enderror
                            </a>
                            <div class="row ">
                                <div class="col-lg-6 col-md-12 mt-3">

                                    <input type="email" name="email" class="form-control" placeholder="Your School Email">
                                    <a style="color:red">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-3">

                                    <input type="text" name="phone" class="form-control" placeholder="Your School Phone">
                                    <a style="color:red">
                                        @error('phone')
                                            {{$message}}
                                        @enderror
                                    </a>
                                </div>

                            </div>

                            <div class="row ">
                                <div class="col-lg-4 col-md-6 mt-3">

                                    <input type="text" name="district" class="form-control" placeholder="District">
                                    <a style="color:red">
                                        @error('district')
                                            {{$message}}
                                        @enderror
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3">

                                    <input type="text" name="city" class="form-control" placeholder="City">
                                    <a style="color:red">
                                        @error('city')
                                            {{$message}}
                                        @enderror
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-12 mt-3">

                                    <input type="text" name="street" class="form-control" placeholder="Street">
                                    <a style="color:red">
                                        @error('street')
                                            {{$message}}
                                        @enderror
                                    </a>
                                </div>

                            </div>
                            <input type="text" name="principle" class="form-control mt-3" placeholder="Principle Name">
                            <a style="color:red">
                                @error('principle')
                                    {{$message}}
                                @enderror
                            </a>
                            <div class="col-md-12 col-lg-6">
                            <button type="submit" class="btn btn-primary mt-3 text-white">Confirm Registration</button>

                            </div>
                            <hr>
                            <div class="col-md-12 mt-3 text-center text-dark">
                                Already registered!<a href="" class="text-primary"> Proceed to login.</a>
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <section class="breadcrumbs">
       
    </section>
    @endsection
{{-- 
</body>
</html> --}}
