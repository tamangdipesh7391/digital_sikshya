@extends('Frontend.main')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{url('frontend/assets/img/slide/3.jpg')}})">
         
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{url('frontend/assets/img/slide/4.jpg')}})">
          
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{url('frontend/assets/img/slide/2.jpg')}})">
          
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->
 <!-- ======= Featured Services Section ======= -->
 <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        
      <div class="row">
        @foreach ($grades as $grade)
        
            <div class="col-md-4 col-lg-3  align-items-center mb-5 ">
              <a href="{{route('subjects',$grade->id)}}"> 
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="fas fa-book"></i></div>
                <h3 class="title"><a href="">{{$grade->title}}</a></h3>
                
              </div>
            </a>
            </div>
        
        @endforeach
      </div>

    </div>
  </section><!-- End Featured Services Section -->

  

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
     
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="frontend/assets/img/slide/aaa.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>What and why is Digital_Sikshya ?</h3><hr>
          <p>The existing learning platforms contain numerous features which may or may not be useful for
            all types of users. They may require further training to comprehend the system's fundamental
            functions. Normal users may experience burden to use such complex system. So, this system
            emphasis on enhancing learning method by incorporating various forms of multimedia and
            creative materials. Our objective is to make learning more attractive and increase the child
            literacy rate. This system will be developed using incremental process because the
            requirements are not fixed at the start and features will be added based on the needs.</p><p> Many
            teachers and students in remote regions are still unfamiliar with the latest trends and
            technologies which makes them difficult to embrace the complicated system. So, we must
            make it really simple to learn and utilize. We must include all levels of users if we want to bring
            a revolution in the kindergarten education system. We will be providing features according to
            the level of understanding of computers of all users.</p>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-home"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{$total_grades}}" data-purecounter-duration="1" class="purecounter"></span>

            <h2 class="mt-5"><strong>Grades</strong></h2>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-book"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$total_subjects}}" data-purecounter-duration="1" class="purecounter"></span>
            <h2 class="mt-5"><strong>Subjects</strong> </h2>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-pen"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$total_contents}}" data-purecounter-duration="1" class="purecounter"></span>
            <h2 class="mt-5"><strong>Contents</strong> </h2>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-award"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$total_levels}}" data-purecounter-duration="1" class="purecounter"></span>
            <h2 class="mt-5"><strong>Levels</strong> </h2>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

 

 
 
  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Gallery</h2>
        <p>Our best memories are always stay immortal.</p>
      </div>

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/1.jpg"><img src="frontend/assets/img/gallery/1.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/2.jpg"><img src="frontend/assets/img/gallery/2.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/3.jpg"><img src="frontend/assets/img/gallery/3.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/4.jpg"><img src="frontend/assets/img/gallery/4.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/5.jpg"><img src="frontend/assets/img/gallery/5.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/6.jpg"><img src="frontend/assets/img/gallery/6.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/7.jpg"><img src="frontend/assets/img/gallery/7.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/8.jpg"><img src="frontend/assets/img/gallery/8.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/9.jpg"><img src="frontend/assets/img/gallery/9.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="gallery-lightbox" href="frontend/assets/img/gallery/10.jpg"><img src="frontend/assets/img/gallery/10.jpg" class="img-fluid" alt=""></a></div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Gallery Section -->

  <!-- ======= Pricing Section ======= -->
  {{-- <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pricing</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="box" data-aos="fade-up" data-aos-delay="100">
            <h3>Free</h3>
            <h4><sup>$</sup>0<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li class="na">Pharetra massa</li>
              <li class="na">Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="box featured" data-aos="fade-up" data-aos-delay="200">
            <h3>Business</h3>
            <h4><sup>$</sup>19<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li class="na">Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3>Developer</h3>
            <h4><sup>$</sup>29<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li>Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="400">
            <span class="advanced">Advanced</span>
            <h3>Ultimate</h3>
            <h4><sup>$</sup>49<span> / month</span></h4>
            <ul>
              <li>Aida dere</li>
              <li>Nec feugiat nisl</li>
              <li>Nulla at volutpat dola</li>
              <li>Pharetra massa</li>
              <li>Massa ultricies mi</li>
            </ul>
            <div class="btn-wrap">
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section> --}}
  <!-- End Pricing Section -->

 
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>
          You can reach us directly at our location : <b>Putalisadak Kathmandu</b>
        </p>
      </div>

    </div>

    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.456205590923!2d85.32047061491615!3d27.703197382793576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a64b5f13e1%3A0x28b2d0eacda46b98!2sPutalisadak%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1651316885277!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
      </div>

    
  </section><!-- End Contact Section -->
@endsection