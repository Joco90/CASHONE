<div class="modal fade modal-create-user" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="alert" id="alert"></div>
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Création utilisateurs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

            </div>
            <div class="modal-body">

                <form id="user-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="code">Code utilisateur (*)</label>
                                <input  name="code" id="code"
                                    placeholder="Code utilisateur"
                                    type="text" class="form-control">
                                    {{-- <small class="form-text text-muted" id="codeerror"></small> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="profile" class="form-label">Profile</label>
                            <select id="profile" name="profile" id="profile" class="form-select">
                              <option></option>
                              <option value="1">Administrateur système</option>
                              <option value="2">Administrateur limité</option>
                              <option value="3">Utilisateur standard</option>
                            </select>
                            {{-- <small class="form-text text-muted" id="typeerror"></small> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="name">Nom</label>
                                <input name="name" id="name"
                                    placeholder="Nom utilisateur"
                                    type="text" class="form-control">
                                    {{-- <small class="form-text text-muted" id="libelleerror"></small> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="firstname">Prénom(s)</label>
                                <input name="firstname" id="firstname"
                                    placeholder="prénoms utilisateur"
                                    type="text" class="form-control">
                                    {{-- <small class="form-text text-muted" id="libelleerror"></small> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="clickbtn()" id="btn_save" class="btn btn-primary">Enregistrer le profile</button>
                        <button type="submit" onclick="_applique()" id="btn_application" class="btn btn-secondary">Appliquer</button>
                        <button type="button" id="btn_close" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
