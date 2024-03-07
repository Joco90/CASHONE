<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="alert" id="alert"></div>
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Modification de profile utilisateurs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

            </div>
            <div class="modal-body">

                <form id="profile-form-edit" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_prof" class="form-control">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="code">Code profile</label>
                                <input  name="code" id="code"
                                    placeholder="Code profile"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative mb-3">
                                <label class="form-label" for="libelle">Libellé</label>
                                <input name="libelle" id="libelle"
                                    placeholder="description du profile"
                                    type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4 position-relative mb-3">
                            <label for="type" class="form-label">Type profile</label>
                            <select id="type" name="type" id="type" class="form-select">
                              <option></option>
                              <option value="1">Administrateur système</option>
                              <option value="2">Administrateur limité</option>
                              <option value="3">Utilisateur standard</option>
                            </select>
                            {{-- <small class="form-text text-muted" id="typeerror"></small> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <em>Etat: </em>
                                <input type="checkbox" onclick="checkboxChange(this.id)" id="statut" name="statut"
                                class="form-check-input">
                                <label id="labStatut" class="form-label form-check-label" style="color=green"><span>Activé</span></label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="editProfile()" id="btn_edit" class="btn btn-secondary">Enregistrer la modification</button>
                        <button type="button" id="btn_close" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
