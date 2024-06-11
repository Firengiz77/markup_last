@extends('front.layout.master')

@section('container')


                <!-- ==================== Start Header ==================== -->

                <header class="page-header bg-img section-padding" data-background="{{ asset('/public/front/assets/imgs/header/bg1.jpg') }}"
                    data-overlay-dark="9">
                    <div class="container pt-100 ontop">
                        <div class="text-center">
                            <h1 class="fz-100 text-u">FAQS.</h1>
                            <div class="mt-15">
                                <a href="{{ route('index') }}">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">FAQS</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start FAQS ==================== -->

                <section class="faqs section-padding position-re">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-4">
                                <div class="sec-head md-mb80">
                                    <h6 class="sub-title main-color mb-15">FAQS</h6>
                                    <h2>Frequently <br> asked questions</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="list-serv">
                                    <div class="accordion bord">

                                    @foreach($faqs as $item)
                                    <div class="item mb-15 wow fadeInUp @if($loop->first) active @endif" data-wow-delay=".1s">
                                            <div class="title">
                                                <h6>{{ $item->question }}</h6>
                                                <span class="ico ti-plus"></span>
                                            </div>
                                            <div class="accordion-info">
                                                <p class="">{{ $item->answer }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                       



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line-overlay up opacity-7">
                        <svg viewBox="0 0 1728 1101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M-43 773.821C160.86 662.526 451.312 637.01 610.111 733.104C768.91 829.197 932.595 1062.9 602.782 1098.75C272.969 1134.6 676.888 25.4306 1852 1"
                                style="stroke-dasharray: 3246.53, 0;"></path>
                        </svg>
                    </div>
                </section>

                <!-- ==================== End FAQS ==================== -->




@endsection