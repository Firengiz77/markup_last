@extends('front.layout.master')

@section('container')

       <!-- ==================== Start Header ==================== -->

       <header class="page-header bg-img section-padding" data-background="assets/imgs/header/bg1.jpg"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1>Blog</h1>
                            <div class="mt-15">
                                <a href="{{ route('index') }}">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Blog List</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Blog ==================== -->

                <section class="blog-crev section-padding">
                    <div class="container">
                        <div class="row">
                            @foreach($blogs as $item)
                            <div class="col-lg-4">
                                <div class="item sub-bg mb-40">
                                    <div class="img">
                                        <img src="/public/{{ $item->image }}" alt="">
                                        <div class="tag sub-bg">
                                           @if($item->tags)
                                            <span>{{ $item->tags[0]->title }}</span>
                                              @endif
                                            <div class="shap-right-bottom">
                                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-11 h-11">
                                                    <path
                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                        fill="#fff"></path>
                                                </svg>
                                            </div>
                                            <div class="shap-left-bottom">
                                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-11 h-11">
                                                    <path
                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                        fill="#fff"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <div class="date fz-13 text-u ls1 mb-10 opacity-7">
                                            <a href="{{ route(app()->getLocale().'.blog_single',$item->slug) }}">{{  date_format($item->created_at,"D M,Y") }}</a>
                                        </div>
                                        <h5>
                                            <a href="{{ route(app()->getLocale().'.blog_single',$item->slug) }}">{{ $item->title }}</a>
                                        </h5>
                                        <a href="{{ route(app()->getLocale().'.blog_single',$item->slug) }}" class="d-flex align-items-center mt-30">
                                            <span class="text mr-15">Read More</span>
                                            <span class="ti-arrow-top-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                         

                        </div>
                    </div>
                </section>

                <!-- ==================== End Blog ==================== -->

@endsection