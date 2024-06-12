@extends('front.layout.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/embla-carousel/embla.css" />
@endsection

@section('container')


<section class="homeFirstContainer">
            <div class="leftSection">
              <h1>Stay ahead of the curve with our forward-thinking</h1>
              <p>
                An award-winning SEO agency with disciplines in digital
                marketing,design, and website development. Focused on
                understanding you
              </p>

              <div class="connectSectHome">
                <button>Schedule Call</button>
                <p>View case study</p>
              </div>
              <div class="sliderSectionHome">
                <p>Trusted by the world's biggest brands</p>
                <div class="embla">
                  <div class="embla__viewport">
                    <div class="embla__container">
                      <!-- Slides will be dynamically added here by JavaScript -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <aside class="rightSection">
              <div class="asideTop">
                <div class="asideRoundImg">
                  <img
                    src="./assets/css//images//homePgAside.png"
                    alt="asideImage"
                  />
                  <div class="roundIconProgress">
                    <img
                      src="./assets/css/images/progressIcon.png"
                      alt="progressIcon"
                    />
                  </div>
                </div>
                <div class="asideSlider">
                  <div class="slideContainer">
                    <div class="slide">
                      <h2>230+</h2>
                      <p>
                        some big companies that we work with, and trust us very
                        much
                      </p>
                    </div>
                    <div class="slide">
                      <h2>250+</h2>
                      <p>
                        some big companies that we work with, and trust us very
                        much
                      </p>
                    </div>
                    <div class="slide">
                      <h2>350+</h2>
                      <p>
                        some big companies that we work with, and trust us very
                        much
                      </p>
                    </div>
                  </div>
                  <div class="dotContainer">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                  </div>
                </div>
              </div>
              <div class="asideBottom">
                <img
                  src="./assets/css/images/asideChart.png"
                  alt="asideChart"
                />
              </div>
            </aside>
          </section>





          <!-- The modal form -->
<div id="modal" class="modal">
  <div class="modal-content">
    <h2>Sürətli əlaqə</h2>
    <form id="modal-form">
      <div class="formGroup">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your name" required /><br /><br />
      </div>

      <div class="formGroup">
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" placeholder="Your surname" required /><br /><br />
      </div>

      <div class="formGroup">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email" required /><br /><br />
      </div>

      <div class="formGroup">
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Your phone number" required /><br /><br />
      </div>

      <div class="formGroup">
        <label for="options">Options:</label>
        <select id="options" name="options">
          <option value="option1">Option 1</option>
          <option value="option2">Option 2</option>
          <option value="option3">Option 3</option>
        </select>
      </div>

      <div class="formGroup">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>


          <!-- ==================== Start Services ==================== -->

          <section class="services section-padding pb-0">
            <div class="container">
              <div class="sec-head mb-80">
                <div class="bord pt-25 bord-thin-top d-flex align-items-center">
                  <h2 class="fw-600 text-u ls1">
                    What We <span class="fw-200">Offer</span>
                  </h2>
                  <div class="ml-auto">
                    <a href="page-services2.html" class="go-more">
                      <span class="text">View all services</span>
                      <span class="icon ti-arrow-top-right"></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach($services as $item)
                <div class="col-md-6">
                  <div class="item-box2 mb-30">
                    <div class="icon mb-40">
                      <img src="/public/{{ asset($item->image) }}" alt="" />
                    </div>
                    <h5 class="mb-15">{{ $item->title }}</h5>
                    <p>
                     {{ substr($item->detail,0,40)}} ...
                    </p>
                    <a href="{{ route(app()->getLocale().'.service_single',$item->slug) }}" class="rmore">
                      <div class="arrow">
                        <img
                          src="/public/front/assets/imgs/arrow-right.png"
                          alt=""
                          class="icon-img-20"
                        />
                      </div>
                      <div class="shap-left-top">
                        <svg
                          viewBox="0 0 11 11"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="w-11 h-11"
                        >
                          <path
                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                            fill="#fff"
                          ></path>
                        </svg>
                      </div>
                      <div class="shap-right-bottom">
                        <svg
                          viewBox="0 0 11 11"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                          class="w-11 h-11"
                        >
                          <path
                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                            fill="#fff"
                          ></path>
                        </svg>
                      </div>
                    </a>
                  </div>
                </div>
              @endforeach

              </div>
            </div>
          </section>

          <!-- ==================== End Services ==================== -->


              <!-- ==================== Start numbers ==================== -->

              <section class="numbers" style="margin-top: 100px">
            <div class="container">
              <div class="row justify-content-center">

              @foreach($counter as $item)
                <div class="col-lg-4 col-md-6">
                  <div
                    class="item d-flex align-items-center justify-content-center md-mb50"
                  >
                    <h2 class="fz-80 line-height-1">{{ $item->number }}</h2>
                    <span class="sub-title opacity-7 ml-30"
                      >{{ $item->title }}</span
                    >
                  </div>
                </div>
                @endforeach


              </div>
            </div>
          </section>

          <!-- ==================== End numbers ==================== -->

          <!-- ==================== Start Portfolio ==================== -->

          <section class="work-carsouel section-padding position-re o-hidden">
            <div class="container">
              <div class="sec-head mb-80">
                <div class="bord pt-25 bord-thin-top d-flex align-items-center">
                  <h2 class="fw-600 text-u ls1">
                    Featured <span class="fw-200">projects</span>
                  </h2>
                  <div class="ml-auto">
                    <div class="swiper-arrow-control">
                      <div class="swiper-button-prev">
                        <span class="ti-arrow-left"></span>
                      </div>
                      <div class="swiper-button-next">
                        <span class="ti-arrow-right"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid rest">
              <div class="row">
                <div class="col-12">
                  <div
                    class="work-crus work-crus5 out"
                    data-carousel="swiper"
                    data-items="5"
                    data-center="center"
                    data-loop="true"
                    data-space="30"
                    data-swiper-speed="1000"
                  >
                    <div
                      id="content-carousel-container-unq-w"
                      class="swiper-container"
                      data-swiper="container"
                    >
                      <div class="swiper-wrapper">
                      @foreach($project as $item)

                        <div class="swiper-slide">
                          <div class="item">
                            <div class="img">
                              <img src="/public/{{ $item->image }}" alt="" />
                              <div class="cont">
                                <span class="mb-5">{{ $item->getCategory->name }}</span>
                                <h6 class="fz-18">{{ $item->title }}</h6>
                              </div>
                              <a href="{{ route(app()->getLocale().'.project_single',$item->slug) }}" class="{{ $item->title }}"></a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                     
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- ==================== End Portfolio ==================== -->

          <!-- ==================== Start brands ==================== -->

          <div class="clients-carso2">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-11">
                  <div
                    class="swiper5"
                    data-carousel="swiper"
                    data-items="5"
                    data-loop="true"
                    data-space="40"
                  >
                    <div
                      id="content-carousel-container-unq-clients"
                      class="swiper-container"
                      data-swiper="container"
                    >
                      <div class="swiper-wrapper">

                      @foreach($reference as $item)
                        <div class="swiper-slide">
                          <div class="item">
                            <div class="img icon-img-100">
                              <a href="{{ $item->link }}">
                                <img src="/public/{{ $item->image  }}" alt="{{ $item->name }}" />
                              </a>
                            </div>
                          </div>
                        </div>
                        @endforeach

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ==================== End brands ==================== -->


@endsection