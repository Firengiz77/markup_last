@extends('front.layout.master')

@section('container')


                <!-- ==================== Start Header ==================== -->

                <header class="page-header bg-img section-padding" data-background="{{ asset('/public/front/assets/imgs/header/bg1.jpg') }}"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1 class="fz-100 text-u">Our Team.</h1>
                            <div class="mt-15">
                                <a href="{{ route('index') }}">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Our Team</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Team ==================== -->

                <section class="team section-padding pb-60">
                    <div class="container">
                        <div class="row">
                        @foreach($teams as $item)
                            <div class="col-lg-4">
                                <div class="item mb-80">
                                    <div class="img">
                                        <img src="/public/{{ $item->image }}" alt="">
                                        <div class="info">
                                            <span class="fz-12">{{ $item.-profession }}</span>
                                            <h6 class="fz-18">{{ $item->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <div class="links">

                                        @if($item->facebook)
                                            <a href="{{ $item->facebook }}">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        @endforeach

                                        @if($item->instagram)
                                        <a href="{{ $item->instagram }}">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        @endforeach
                                  
                                        @if($item->linkedin)
                                        <a href="{{ $item->linkedin }}">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </section>

                <!-- ==================== End Team ==================== -->


@endsection