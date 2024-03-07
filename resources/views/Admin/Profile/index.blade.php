@extends('Layouts.App_layout')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            CASHONE - Gestion de profiles utilisateurs
                            <div class="page-title-subheading">Enregistrement,modification,suppression des profiles.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">

                        <div class="d-inline-block dropdown">
                            <button type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-secondary">
                                <span class="btn-icon-wrapper pe-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Actions
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" class="nav-link">
                                            <i class="nav-link-icon pe-7s-plus"></i>
                                            <span> Ajouter</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>Affiche Liste</span>
                                            <div class="ms-auto badge rounded-pill bg-danger">{{$profile->count()}}</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon pe-7s-download"></i>
                                            <span> Exporter vers Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="nav-link-icon pe-7s-download"></i>
                                            <span> Exporter</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">
                    <button data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-plus"></i> Ajouter nouveau
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="actualiser()" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Actualiser
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Modifier
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Exporter vers 
                    </button>
                </li>
            </ul>
            <div id="profile-table"></div>
        </div>

    </div>
@endsection

