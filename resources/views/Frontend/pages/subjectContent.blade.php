@extends('Frontend.main')
@section('content')
<section class="breadcrumbs">
       
</section>
<!-- ======= Featured Services Section ======= -->
<section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">
    <div class="row">
      @foreach ($subjectContent as $data)
       
          <div class="col-md-4 col-lg-3  mb-5 " >
            <a href="{{url('content-details/'.$data->grade.'/'.$data->subject.'/'.$data->level)}}"> 
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100" style="background:url('{{url('images/'.$data->thumbnail) }} ') top center;background-size:cover;background-repeat:no-repeat; color:#000;">
              <h1 style="font-size:50px;color:red;font-weight:bold;">{{$data->heading}}</h1>
              <h1>{{$data->title}}</h1>
             
            </div>
         </a>
          </div>
     
      @endforeach
    </div>

  </div>
</section><!-- End Featured Services Section -->
@endsection