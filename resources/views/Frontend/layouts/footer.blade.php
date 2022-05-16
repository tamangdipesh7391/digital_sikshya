@section('footer')
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="footer-info">
            <h3 style="text-decoration: underline">Digital_Sikshya</h3>
            <p>
              Putalisadak <br>
              Kathmandu, Nepal<br><br>
              <strong>Phone:</strong> 9825548855<br>
              <strong>Email:</strong> info@digitalsikshya.com<br>
            </p>
           
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4 style="text-decoration: underline">Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#hero')}}">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#about')}}">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#gallery')}}">Gallery</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#featured-services')}}">Our Courses</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-info">
            <h4 style="text-decoration: underline">Social Links</h4>
           
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4 style="text-decoration: underline">Subscribe Us</h4>
          <p>Subscribe us to get notified about our latest events,notices, results and exam announcements etc. </p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>

        </div>
        

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Digital_Sikshya</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
      Designed by <a href="#">Dipesh Tamang</a>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{url('frontend/assets/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{url('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{url('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('frontend/assets/js/main.js')}}"></script>

</body>

</html>
@endsection