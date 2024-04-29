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
                                       <a href="{{route('users.liste')}}">Gestion des utilisateurs</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Modification des utilisateurs
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
                <form method="POST" action="{{route('users.update')}}" id="form-user-save" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input name="code" id="code" readonly
                                    value="{{$users->code}}" type="text" class="form-control">
                                    <em id="codeerror"></em>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative mb-3">
                                <label for="matricule" class="form-label">Matricule</label>
                                <input name="matricule" id="matricule"
                                    type="text" value="{{$users->matricule}}" class="form-control" readonly>

                                    <em id="matriculeerror"></em>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="position-relative mb-3">
                                <label for="idjade" class="form-label">ID J@DE</label>
                                <input name="idjade" id="idjade"
                                    type="text" value="{{$users->idjade}}" class="form-control">
                                    <em id="idjadeerror"></em>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="initial-user" class="form-label">Initial</label>
                                <input name="initial" id="initial-user"
                                    type="text" value="{{$users->initial}}" class="form-control">
                                    <em id="initialerror"></em>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="fin_activ" class="form-label">Fin activité</label>
                                <input name="fin_activ" value="{{$users->fin_activ}}" id="fin_activ"
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
                                    <option selected value="{{$users->profil}}">{{$users->profilelibelle->libelle}}</option>
                                    @foreach ($profils as $profil)
                                    <option value="{{$profil->id}}">{{$profil->libelle}}</option>
                                    @endforeach
                                </select>
                                <em id="profileerror"></em>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input name="name" value="{{$users->name}}" id="name"
                                    type="text" class="form-control">
                                    <em id="nameerror"></em>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="position-relative mb-3">
                                <label for="firstname" class="form-label">Prénoms</label>
                                <input name="firstname" id="firstname"
                                    type="text" value="{{$users->firstname}}" class="form-control">
                                    <em id="firstnameerror"></em>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="email" class="form-label">Addresse mail</label>
                                <input name="email" id="email"
                                    type="email" value="{{$users->email}}" class="form-control" disabled>
                                    <em id="emailerror"></em>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input name="telephone" id="telephone"
                                    type="text" value="{{$users->telephone}}" class="form-control" readonly>
                                    <em id="telephoneerror"></em>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="mobile-user" class="form-label">Mobile</label>
                                <input name="mobile" id="mobile"
                                    type="text" value="{{$users->mobile}}" class="form-control" readonly>
                                    <em id="mobileerror"></em>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative form-check">
                                @if ($users->statut==1)
                                <input name="statut" id="etat"  type="checkbox" checked class="form-check-input">
                                @else
                                <input name="statut" id="etat"  type="checkbox" class="form-check-input">
                                @endif
                                <label for="etat" id="etat" class="form-label form-check-label">Etat</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-check">
                                @if ($users->is_admin==1)
                                <input name="is_admin" id="adminfonct" type="checkbox" checked class="form-check-input">
                                @else
                                <input name="is_admin" id="adminfonct" type="checkbox" class="form-check-input">
                                @endif
                                <label for="adminfonct" class="form-label form-check-label">Administrateur fonctionnel</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <button id="update-user" class="mb-2 me-2 btn-icon btn btn-primary btn-lg">
                            Enregistrer
                        </button>
                        <div class="float-end">
                            <a href="{{route('users.liste')}}" class="btn btn-danger btn-lg">Annuler</a>

                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{-- End form to create users --}}
    </div>

</div>
@endsection

