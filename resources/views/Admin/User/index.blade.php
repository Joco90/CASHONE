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
                            CASHONE - Utilisateur et mot de passe
                            <div class="page-title-subheading">Enregistrement,modification,suppression des utilisateurs.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">


                    </div>
                </div>
            </div>
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">
                    <a href="{{route('users.create')}}"  class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-plus"></i> Ajouter nouveau
                    </a>
                </li>
                <li class="nav-item">
                    <button onclick="actualiser()" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Actualiser
                    </button>
                </li>
                <li class="nav-item">
                    <button id="btn-modif-user" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-note"></i> Modifier
                    </button>
                </li>
                <li class="nav-item">
                    <form id="del-profile">
                        @csrf
                        <button type="submit" id="btn-del-user" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-trash"></i> Supprimer
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <button id="download-xlsx-user" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers Xsls
                    </button>
                </li>
                <li class="nav-item">
                    <button id="download-pdf-user" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers pdf
                    </button>
                </li>
            </ul>
            <div id="user-table"></div>
        </div>

    </div>
@endsection

