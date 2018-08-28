    <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

      <div class="container">
        <div class="row">


          @foreach($boxs as $box)

            <div class="col-sm-3 col-md-3">
              <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="box text-center">

                  <i class="{{ $box->icologo }} circled bg-skin"></i>
                  <h4 class="h-bold">{{ $box->title }}</h4>
                  <p>
                    {{ $box->description }}
                  </p>
                </div>
              </div>
            </div>

          @endforeach





        </div>
      </div>

    </section>
    <!-- /Section: boxes -->