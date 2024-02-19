@extends('Layouts.login_layout')
@section('content-login')
    <div class="modal-dialog w-100 mx-auto">
        <div class="modal-content">
            <div class="modal-body">
                <div class="h5 modal-title text-center">
                    <h1 style="font-weight: 800">Connexion Cashone</h1>
                    <h4 class="mt-2">
                        <span style="color:green">
                            Mot de passe oublié. Vueillez saisir votre addresse mail ou votre code utilisateur.</span>
                    </h4>
                </div>
                <form class="login-form" id="forgetPassworForm" method="POST" action="">
                    <div class="">
                        @csrf
                        <div class="col-md-12">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="codeUtilisateur">Code utilisateur</label>
                                <input name="codeUtil" id="codeUtilisateur"
                                    placeholder="Code utilisateur ici..." type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer clearfix">
                        <div class="float-start">
                            <button type="submit" class="btn btn-secondary btn-lg">Envoyer</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
