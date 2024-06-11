@extends('front.layout.master')

@section('container')

      <!-- ==================== Start Header ==================== -->

      <header class="page-header bg-img section-padding" data-background="{{ asset('/public/front/assets/imgs/header/bg1.jpg') }}"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1>Referanslar</h1>
                            <div class="mt-15">
                                <a href="{{ route('index') }}">Ana Səhifə</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Referanslar</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Portfolio ==================== -->

                <section class="work-minimal section-padding sub-bg">
                    <div class="container">
                        <div class="row">
                            @foreach($clients as $item)
                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-30 mb-30">
                                <div class="reference-card">
                                    <img src="/public/{{ $item->image }}" alt="{{ $item->name }}">
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                </section>

                <!-- ==================== End Portfolio ==================== -->





@endsection