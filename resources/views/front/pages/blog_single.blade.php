@extends('front.layout.master')

@section('container')


                <!-- ==================== Start Slider ==================== -->

                <header class="blog-header section-padding pb-0">
                    <div class="container mt-80">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="caption">
                                    <div class="sub-title fz-12">
                                        @foreach($blog->tags as $tag)
                                        <a href="#"><span>{{ $tag->title }} </span></a>
                                        @endforeach
                                    </div>
                                    <h1 class="fz-55 mt-30">{{ $blog->title }}
                                    </h1>
                                </div>
                                <div class="info d-flex mt-40 align-items-center">
                                    <div class="left-info">
                                        <div class="d-flex align-items-center">
                                            <div class="author-info">
                                                <div class="d-flex align-items-center">
                                                    <a href="#0" class="circle-60">
                                                        <img src="assets/imgs/blog/author.png" alt=""
                                                            class="circle-img">
                                                    </a>
                                                    <a href="#0" class="ml-20">
                                                        <span class="opacity-7">Author</span>
                                                        <h6 class="fz-16">Markup</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="date ml-50">
                                                <a href="#0">
                                                    <span class="opacity-7">Published</span>
                                                    <h6 class="fz-16">{{ date_format($blog->created_at,"d m,Y") }} </h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-info ml-auto">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="background bg-img mt-80" data-background="{{ asset('/public/front/assets/imgs/blog/b1.jpg') }}"></div>
                </header>

                <!-- ==================== End Slider ==================== -->



                <!-- ==================== Start Blog ==================== -->

                <section class="blog section-padding">
                    <div class="container">
                        <div class="row xlg-marg justify-content-center">
                            <div class="col-lg-10">
                                <div class="main-post">
                                    <div class="item pb-60">
                                        <article>
                                            <div class="text">
                                        {!!   $blog->desc !!}   
                                        </div>
                                        </article>

                                    </div>
                                    <div class="info-area flex pt-50 bord-thin-top">
                                        <div>
                                            <div class="tags flex">
                                                <div class="valign">
                                                    <span>Tags :</span>
                                                </div>
                                                <div>
                                                    @foreach($blog->tags as $tag)
                                                    <a href="">{{ $tag->title }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="share-icon flex">
                                                <div class="valign">
                                                    <span>Share :</span>
                                                </div>
                                                <div>

                                                    <a href="https://www.facebook.com/"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a href="https://www.twitter.com/"><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a href="https://www.youtube.com/"><i
                                                            class="fab fa-youtube"></i></a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                </section>

                <!-- ==================== End Blog ==================== -->




@endsection