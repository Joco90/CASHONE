@extends('Layouts.App_layout')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                            <span class="d-inline-block pe-2">
                                <i class="lnr-apartment opacity-6"></i>
                            </span>
                            <span class="d-inline-block">CASHONE /Gestion de personnel</span>
                        </div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('panel')}}">CashOne</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                       <a href="{{route('personel.liste')}}">Gestion de personnel</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Création de personnel
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions"></div>

            </div>
        </div>
        {{-- Zone d'alerte --}}
        <div class="alert" role="alert">
            @include('Partials._alerte')
        </div>

        {{-- Fin zone d'alerte --}}
        {{-- Form to create users --}}
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                {{-- Form --}}
            </div>
        </div>
        {{-- End form to create users --}}
    </div>

</div>
@endsection

