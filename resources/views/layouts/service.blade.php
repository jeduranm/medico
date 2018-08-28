    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

      <div class="container">

        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <img src="img/dummy/img-1.jpg" class="img-responsive" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="row">
              @foreach($services as $service)

                <div class="col-sm-6 col-md-6">
                  <div class="wow fadeInRight" data-wow-delay="0.1s">
                    <div class="service-box">
                      <div class="service-icon">
                        <span class="{{ $service->icologo }}"></span>
                      </div>
                      <div class="service-desc">
                        <h5 class="h-light">{{ $service->title }}</h5>
                        <p>{{ $service->description }}</p>
                      </div>
                    </div>
                  </div>
                </div>

              @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: services -->
