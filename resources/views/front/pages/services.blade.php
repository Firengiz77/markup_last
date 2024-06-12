@extends('front.layout.master')

@section('container')
    <!-- ==================== Start Header ==================== -->

    <header class="page-header bg-img section-padding" data-background="/public/front/assets/imgs/header/b5.jpg"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1 class="fz-100 text-u">Services.</h1>
                            <div class="mt-15">
                                <a href="{{ route('index') }}">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Services</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->

                
                <!-- ==================== Start Services ==================== -->

                <section class="services section-padding">
                    <div class="container">
                        <div class="sec-head mb-80">
                            <div class="bord pt-25 bord-thin-top d-flex align-items-center">
                                <h2 class="fw-600">What We Have <span class="fw-200">to Offer</span></h2>
                            </div>
                        </div>
                        <div class="row">

                        @foreach($services as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-40">
                                <div class="item-box radius-15 md-mb30">
                                    <div class="icon mb-40 opacity-5">
                                        <img src="/public/{{ $item->icon }}" alt="">
                                    </div>
                                    <h5 class="mb-15">{{ $item->title }}</h5>
                                    <p>{{ substr($item->detail,0,100) }} ...</p>
                                    <a href="{{ route(app()->getLocale().'.service_single',$item->slug) }}" class="rmore mt-30">
                                        <span class="sub-title">Read More</span>
                                        <img src="/public/front/assets/imgs/arrow-right.png" alt="" class="icon-img-20 ml-5">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </section>

                <!-- ==================== End Services ==================== -->


@endsection