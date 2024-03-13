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
        {{-- Form to create users --}}
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form method="" class="">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input name="email" id="code"
                                    placeholder="Saisir votre code" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="matricule" class="form-label">Matricule</label>
                                <input name="matricule" id="matricule"
                                    placeholder="Matricule"
                                    type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="idjade" class="form-label">ID J@DE</label>
                                <input name="idjade" id="idjade"
                                    placeholder="Matricule"
                                    type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="fin_activ" class="form-label">Fin activité</label>
                                <input name="fin_activ" id="fin_activ"
                                    type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="exampleAddress" class="form-label">Address</label>
                        <input name="address" id="exampleAddress"
                            placeholder="1234 Main St"
                            type="text" class="form-control">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="exampleAddress2" class="form-label">Address 2</label>
                        <input name="address2" id="exampleAddress2"
                            placeholder="Apartment, studio, or floor"
                            type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative mb-3">
                                <label for="exampleCity" class="form-label">City</label>
                                <input name="city" id="exampleCity" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative mb-3">
                                <label for="exampleState" class="form-label">State</label>
                                <input name="state" id="exampleState" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label for="exampleZip" class="form-label">Zip</label>
                                <input name="zip" id="exampleZip" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="position-relative form-check">
                        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                        <label for="exampleCheck" class="form-label form-check-label">Check me out</label>
                    </div>
                    <button class="mt-2 btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
        {{-- End form to create users --}}
    </div>

</div>
@endsection
