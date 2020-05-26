
<!-- start footer Area -->
<footer class="footer-area section-gap">
  <div class="container">
    <div class="row">

      <?php

      $categories = DB::table('categories')
                      ->get();




      ?>

      <div class="col-lg-3  col-md-12">
        <div class="single-footer-widget">
          <h6>Top categories</h6>
          <ul class="footer-nav">

            @foreach($categories as $category)
 <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
@endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-6  col-md-12">
        <div class="single-footer-widget newsletter">
          <h6>Newsletter</h6>
          <p>You can trust us. we only send recent posts, not a single spam.</p>
          <div id="mc_embed_signup">
            <form action="{{ route('subscriber.store') }}" method="post" class="form-inline">
                        @csrf
              <div class="form-group row" style="width: 100%">
                <div class="col-lg-8 col-md-12">
                  <input name="email" placeholder="Enter Email"  type="email">

                </div>

                <div class="col-lg-4 col-md-12">

                     <button class="nw-btn primary-btn" type="submit"> Subscribe<span class="lnr lnr-arrow-right"></span></button>
                </div>
              </div>
              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>


    </div>

    <div class="row footer-bottom d-flex justify-content-between">
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      <p class="col-lg-8 col-sm-12 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | this backend web application is made with <i class="fa fa-heart-o" aria-hidden="true"></i> </p>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

      <div class="col-lg-4 col-sm-12 footer-social">


      </div><!-- col-lg-4 col-md-6 -->

      </div>

    </div>
  </div>
</footer>
<!-- End footer Area -->

<script src="{{ asset('bloger/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('bloger/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('bloger/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('bloger/js/parallax.min.js') }}"></script>
<script src="{{ asset('bloger/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('bloger/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('bloger/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('bloger/js/main.js') }}"></script>
