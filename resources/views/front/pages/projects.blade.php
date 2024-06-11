@extends('front.layout.master')

@section('container')


                <!-- ==================== Start Header ==================== -->

                <header class="page-header bg-img section-padding" data-background="{{ asset('/public/front/assets/imgs/header/bg1.jpg') }}"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1>Portfolio</h1>
                            <div class="mt-15">
                                <a href="{{ route('index') }}">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Portfolio</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Portfolio ==================== -->

                <section class="work-minimal section-padding sub-bg">
                    <div class="container-xxl">
                        <div class="row">
                            <!-- filter links -->
                            <div class="filtering col-12 mb-50 text-center">
                                <div class="filter">
                                    <span class="text">Filter By :</span>
                                    <span data-filter='*' class='active'>Show All</span>
                                    @foreach($category as $item)
                                    <span data-filter='.{{ $item->name }}'>{{ $item->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="gallery row stand-marg">
                            @foreach($projects as $item)
                            <div class="col-lg-4 col-md-6 items design {{ $item->getCategory->name }}">
                                <div class="item mt-40">
                                    <div class="img">
                                        <img src="/public/{{ $item->image }}" alt="">
                                        <div class="cont d-flex align-items-center">
                                            <div>
                                                <h5 class="fz-22">
                                                    <a href="{{ route(app()->getLocale().'.project_single',$item->slug) }}">{{ $item->title }}</a>
                                                </h5>
                                                <p>
                                                    <a href="{{ route(app()->getLocale().'.project_single',$item->slug) }}">{{ $item->getCategory->name }}</a>
                                                </p>
                                            </div>
                                            <div class="ml-auto">
                                                <a href="{{ route(app()->getLocale().'.project_single',$item->slug) }}" class="ti-arrow-top-right"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                       


                        </div>
                    </div>
                </section>

                <!-- ==================== End Portfolio ==================== -->




@endsection