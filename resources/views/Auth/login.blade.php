
@extends('Layouts.login_layout')
@section('content-login')

    <div class="modal-dialog w-100 mx-auto">
        @include('Partials._alerte')
        <div class="modal-content">

            <div class="modal-body">
                <div class="h5 modal-title text-center">
                    <h1 style="font-weight: 800">Connexion Cashone</h1>
                    <h4 class="mt-2">
                        <span style="color:green">
                            Veuillez saisir votre addresse mail et mot de passe puis cliquez sur le bouton connexion au panel.</span>
                    </h4>
                </div>
                <form class="login-form" id="loginForm" method="POST" action="{{route('Auth.connexion')}}">
                    <div class="">
                        @csrf
                        <div class="col-md-12">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="codeUtilisateur">Code utilisateur</label>
                                <input name="code" id="codeUtilisateur"
                                 type="text" value="{{old('code')}}" class="form-control {{$errors->has('code') ? ' is-invalid' : '' }}">
                                 @if ($errors->has('code'))
                                 <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="Password">Mot de passe</label>
                                <input name="password" id="Password"
                                 type="password" class="form-control {{$errors->has('password') ? ' is-invalid' : '' }}">
                                 @if ($errors->has('password'))
                                 <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                 @endif
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-2">Mot de passe oublié?
                        | <span><a href="{{route('Auth.forget')}}" class="text-primary">cliquez ici</a></span>
                    </h6>
                    <div class="modal-footer clearfix">
                        <div class="float-start">
                            <button type="submit" class="btn btn-success btn-lg"> CONNEXION AU PANEL</button>
                        </div>

                    </div>
                </form>
               
            </div>

        </div>
    </div>
@endsection
