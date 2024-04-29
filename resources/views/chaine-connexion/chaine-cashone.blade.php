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
                            CASHONE - gestion de chaines de connexion
                            <div class="page-title-subheading">Chaine de connexion CASHONE V4</div>
                        </div>
                    </div>
                    <div class="page-title-actions">

                    </div>
                </div>
            </div>
            {{-- Critères de recherche de personnel --}}
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Chaine de connexion de reprise</h5>
                    <form id="formChaine">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative mb-3">
                                    <label for="type" class="form-label">Type sgbd</label>
                                    <select id="type" name="type" class="form-control form-select">
                                        <option value="">Sélection de type sgbd</option>
                                        <option value="1">Mysql</option>
                                        <option value="2">Sql server</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input name="code" id="code"
                                         type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative mb-3">
                                    <label for="name_db" class="form-label">Nom de la base</label>
                                    <input type="text" id="name_db" name="name_db" class="form-control">
                                    <em id="name"></em>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative mb-3">
                                    <label for="serveur" class="form-label">Serveur</label>
                                    <input name="serveur" id="serveur"
                                         type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative mb-3">
                                    <label for="utilisateur" class="form-label">Utilisateur</label>
                                    <input type="text" id="utilisateur" name="utilisateur" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative mb-3">
                                    <label for="passwords" class="form-label">Mot de passe</label>
                                    <input type="password" id="passwords" name="passwords" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer clearfix">
                            <button type="submit" id="save-chaine" class="btn-icon btn btn-secondary"> Enregistrer</button>
                            <button type="reset" class="btn-icon btn btn-danger"> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="chainedb-table"></div>
        </div>

    </div>
@endsection
