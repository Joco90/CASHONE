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
                            <span class="d-inline-block">CASHONE /Gestion des utilisateur</span>
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
                                        Enregistrement des utilisateurs
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                </div>
            </div>
        </div>
        {{-- Zone d'alerte --}}
        <div class="alert" role="alert"></div>

        {{-- Fin zone d'alerte --}}
        {{-- Form to create users --}}
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form method="POST" id="form-user-save" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input name="code" id="code"
                                    placeholder="Saisir votre code" type="text" class="form-control">
                                    <em id="codeerror"></em>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative mb-3">
                                <label for="matricule" class="form-label">Matricule</label>
                                <input name="matricule" id="matricule"
                                    type="text" class="form-control">
                                    <em id="matriculeerror"></em>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="position-relative mb-3">
                                <label for="idjade" class="form-label">ID J@DE</label>
                                <input name="idjade" id="idjade"
                                    type="text" class="form-control">
                                    <em id="idjadeerror"></em>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="initial-user" class="form-label">Initial</label>
                                <input name="initial" id="initial-user"
                                    type="text" class="form-control">
                                    <em id="initialerror"></em>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="fin_activ" class="form-label">Fin activité</label>
                                <input name="fin_activ" id="fin_activ"
                                    type="date" class="form-control">
                                    <em id="fin_activerror"></em>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="position-relative mb-3">
                                <label for="profile-user" class="form-label">Profil</label>
                                <select name="profile" id="profile" class="form-control form-select profiles">
                                    <option value=""></option>
                                    @foreach ($profiles as $profile)
                                    <option value="{{$profile->id}}">{{$profile->libelle}}</option>
                                    @endforeach
                                </select>
                                <em id="profileerror"></em>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input name="name" id="name"
                                    type="text" class="form-control">
                                    <em id="nameerror"></em>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="position-relative mb-3">
                                <label for="firstname" class="form-label">Prénoms</label>
                                <input name="firstname" id="firstname"
                                    type="text" class="form-control">
                                    <em id="firstnameerror"></em>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="email" class="form-label">Addresse mail</label>
                                <input name="email" id="email"
                                    type="email" class="form-control">
                                    <em id="emailerror"></em>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input name="telephone" id="telephone"
                                    type="text" class="form-control">
                                    <em id="telephoneerror"></em>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="mobile-user" class="form-label">Mobile</label>
                                <input name="mobile" id="mobile"
                                    type="text" class="form-control">
                                    <em id="mobileerror"></em>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">

                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input name="photo" id="photo"
                                    type="file" class="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="signature" class="form-label">Signature</label>
                                <input name="sign" id="signature"
                                    type="file" class="">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative form-check">
                                <input name="statut" id="etat" onclick="checkboxChange(this.id)" type="checkbox" class="form-check-input">
                                <label for="etat" id="etat" class="form-label form-check-label">Etat</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-check">
                                <input name="is_admin" id="adminfonct" onclick="checkboxChange(this.id)" type="checkbox" class="form-check-input">
                                <label for="adminfonct" class="form-label form-check-label">Administrateur fonctionnel</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <button id="save-user" class="mb-2 me-2 btn-icon btn btn-primary btn-lg">
                            Enregistrer
                        </button>
                        <button id="app-user" class="btn btn-secondary btn-lg">Appliquer</button>
                        <div class="float-end">
                            <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{-- End form to create users --}}
    </div>

</div>
@endsection

