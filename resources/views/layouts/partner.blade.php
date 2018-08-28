    <!-- Section: partner -->
    <section id="partner" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our partner</h2>
                <p>Take charge of your health today with our specially designed health packages</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div id="owl-partner" class="owl-carousel">

                @foreach($partners as $partner)

                  <div class="item"><a href="{{ $partner->file }}" title="{{ $partner->title }}" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="{{ $partner->file }}" class="img-responsive" alt="img"></a></div>

                @endforeach

              </div>
            </div>
          </div>



        </div>
      </div>
    </section>
    <!-- /Section: pricing -->