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

                </div>
            </div>
        <div class="main-card mb-3 card">
            <div class="collapse" id="accordionType">
                <div class="card-body">
                    <h5 class="card-title">Création de nouveau type de contrat</h5>
                    <form class="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative mb-1">
                                    <label for="code" class="form-label">Code</label>
                                    <input id="code" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative mb-3">
                                    <label for="libelle" class="form-label">libelle</label>
                                    <input name="libelle" id="libelle"
                                         type="text" class="form-control">
                                </div>
                            </div>

                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button class="btn-icon btn btn-secondary"> Sauvegarder</button>
                            <button class="btn-icon btn btn-success"> Appliquer</button>
                            <button type="reset" class="btn-icon btn btn-danger"> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>

            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">
                    <button data-bs-toggle="collapse" href="#accordionType" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-plus"></i> Ajouter nouveau
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="actualiser()" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Actualiser
                    </button>
                </li>
                <li class="nav-item">
                    <button id="btn-modif-typeContrat" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-note"></i> Modifier
                    </button>
                </li>
                <li class="nav-item">
                    <form id="del-typeContrat">
                        @csrf
                        <button type="submit" id="btn-del-typeContrat" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-trash"></i> Supprimer
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <button id="typeContrat-xlsx" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers Xsls
                    </button>
                </li>
                <li class="nav-item">
                    <button id="typeContrat-pdf" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers pdf
                    </button>
                </li>
            </ul>
            <div id="typeContrat-table"></div>
        </div>
        </div>

    </div>
@endsection

