@extends('Layouts.App_layout')
@section('content')
    <div class="app-main__outer">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 g-0 row">
                    <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-12">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <img src="/images/cie.png" 
                            style="width:114px;
                         
                           gap: 0px;
                           border-radius: 15px 0px 0px 0px;
                           opacity: 0px;
                           "  alt="" class="img-fluid d-block">
                            <h4>
                                <div>Bienvenu,</div>
                                <span>Sur 
                                    <span class="text-success">CASH-ONE</span> Une application innovante</span>
                            </h4>
                           
                        </div>
                    </div>
                    {{-- <div class="d-lg-flex d-xs-none col-lg-5">
                        <div class="slider-light">
                            <div class="slick-slider slick-initialized">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('images/macie.png');background-size: contain;background-repeat: no-repeat;"></div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>
                                                Easily exclude the components you don't require. Lightweight, consistent
                                                Bootstrap based styles across all elements and components
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
