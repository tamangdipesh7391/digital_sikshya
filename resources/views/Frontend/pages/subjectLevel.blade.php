@extends('Frontend.main')
@section('content')
<section class="breadcrumbs">
       
</section>
<!-- ======= Featured Services Section ======= -->
<section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

    <div class="row">
      @foreach ($subjectLevel as $data)
       
          <div class="col-md-4 col-lg-3  mb-5 ">
            <a href="{{url('subject-content/'.$data->grade.'/'.$data->subject.'/'.$data->level)}}"> 
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-book"></i></div>
              <h4 class="title"><a href="">{{$data->getLevelName->title}}</a></h4>
             
            </div>
         </a>
          </div>
     
      @endforeach
    </div>

  </div>
</section><!-- End Featured Services Section -->
@endsection