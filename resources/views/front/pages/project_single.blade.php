@extends('front.layout.master')

@section('container')



                <!-- ==================== Start Slider ==================== -->

                <header class="header-project2 section-padding pb-0">
                    <div class="container mt-80 mb-80">
                        <div class="row align-items-end">
                            <div class="col-lg-6">
                                <div class="full-width mb-30">
                                    <h1 class="mb-10">{{ $project->title }}</h1>
                                    <p>{{ $project->description }}</p>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <div class="info">
                                    <div class="row">


                                    @foreach($project->attribute as $item)
                                        <div class="col-md-6">
                                            <div class="item mb-30">
                                                <span class="opacity-8 mb-5">{{ $item->key }} :</span>
                                                <h6>{{ $item->value }}</h6>
                                            </div>
                                        </div>
                                        @endforeach
                                     

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid rest">
                        <div class="project2" data-carousel="swiper" data-items="2" data-loop="true" data-space="30"
                            data-center="true">
                            <div id="content-carousel-container-unq-project2" class="swiper-container"
                                data-swiper="container">
                                <div class="swiper-wrapper">

                                @foreach($project->getImages as $images)

                                    <div class="swiper-slide">
                                        <div class="img">
                                            <img src="/public/{{ $images->image }}" alt="">
                                        </div>
                                    </div>
                                 

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Slider ==================== -->



                <!-- ==================== Start section ==================== -->

                <section class="section-padding bord-thin-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <h2 class="mb-50">The <br> Challenge</h2>
                            </div>
                            <div class="col-lg-7">
                                <div class="text">
                                    <h5 class="line-height-40">The goal is there are many
                                        variations of
                                        passages of Lorem Ipsum available, but the majority have suffered
                                        alteration
                                        in some form, by injected humour, or randomised words which don't look
                                        even
                                        slightly believable.</h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== End section ==================== -->





@endsection