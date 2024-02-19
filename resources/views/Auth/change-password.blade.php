
@extends('Layouts.login_layout')
@section('content-login')
    <div class="modal-dialog w-100 mx-auto">
        <div class="modal-content">
            <div class="modal-body">
                <div class="h5 modal-title text-center">
                    <h1 style="font-weight: 800">Connexion Cashone</h1>
                    <h4 class="mt-2">
                        <span style="color:green">
                           Voulez-vous changer votre mot de passe?</span>
                    </h4>
                </div>
                <form class="login-form" id="loginForm" method="POST" action="">
                    <div class="">
                        @csrf
                        <div class="col-md-12">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="old_password">Ancien mot de passe</label>
                                <input name="old_password" id="old_password"
                                    placeholder="Ancien mot de passe ici..." type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="new-password">Nouveau mot de passe</label>
                                <input name="new-password" id="new-password"
                                    placeholder="Nouveau mot de passe ici..." type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="confirm-password">Confirmez mot de passe</label>
                                <input name="confirm-password" id="confirm-password"
                                    placeholder="confirmez mot de passe ici..." type="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer clearfix">
                        <div class="float-start">
                            <button type="submit" class="btn btn-primary btn-lg"> Validation</button>
                        </div>
                        {{-- <div class="float-end">
                            <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                        </div> --}}
                    </div>
                </form>
                {{-- <div class="divider"></div> --}}

            </div>

        </div>
    </div>
@endsection
