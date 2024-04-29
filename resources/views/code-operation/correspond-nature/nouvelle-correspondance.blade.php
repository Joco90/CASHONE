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
                            CASHONE - Correspondance Compte nature
                            {{-- <div class="page-title-subheading">Enregistrement,modification,suppression des profiles.</div> --}}
                        </div>
                    </div>

                </div>
            </div>
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">

                    <button data-bs-toggle="modal" data-bs-target=".nouveau-correspondance" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-plus"></i> Ajouter nouveau
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="actualiser()"  class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Actualiser
                    </button>
                </li>
                <li class="nav-item">
                    <button id="btn-modif-profile" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-note"></i> Modifier
                    </button>
                </li>
                {{-- <li class="nav-item">
                    <form id="del-profile">
                        @csrf
                        <button type="submit" id="btn-del-profile" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-trash"></i> Supprimer
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <button id="download-xlsx" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers Xsls
                    </button>
                </li>
                <li class="nav-item">
                    <button id="download-pdf" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers pdf
                    </button>
                </li> --}}
            </ul>
            <div class="main-card mb-3 card">
                <div class="card-header">Correspondance</div>
                <div class="card-body">
                    <form id="correspondance-form" method="POST">


                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="position-relative mb-3">
                                            <label class="form-label" for="code">Phrase </label>
                                            <input  name="phrase" id="phrase" maxlength="4" minlength="4"
                                                placeholder=""
                                                type="text" class="form-control">
                                                <small class="form-text text-muted" id="phraseerror"></small>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">


                                    <div class="col-md-5">

                                            <label class="form-label">Code</label>
                                            <select id="mySelect" name="code_correspond" class="multiselect-dropdown form-control">
                                                <!-- Options seront ajoutées dynamiquement -->
                                            </select>
                                            <small class="form-text text-muted" id="codeeerror"></small>
                                    </div>
                                    <div class="col-md-5">

                                            <label class="form-label" for="libelle">Libellé (*)</label>
                                            <input name="libelle" id="libelle_code"
                                                placeholder="description du profile"
                                                type="text" class="form-control">
                                                <small class="form-text text-muted" id="libelleerror"></small>

                                    </div>

                                </div>

                                {{-- <div class="modal-footer">
                                    <button type="submit" onclick="clickbtn()" id="btn_save" class="btn btn-primary">Enregistrer le profile</button>
                                    <button type="submit" onclick="_applique()" id="btn_application" class="btn btn-secondary">Appliquer</button>
                                    <button type="button" id="btn_close" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                                </div> --}}



                    </form>
                </div>
                <div class="d-block text-end card-footer">
                    <button class="me-2 btn btn-link btn-sm" type="reset">Annuler</button>
                    <button class="btn btn-success btn-lg"  id="correspondance-button">Save</button>
                </div>
            </div>

            {{-- <div id="profile-table"></div> --}}
        </div>

    </div>


@endsection


<script type="text/javascript" src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>



<script>



    $(document).ready(() =>
    {
            setTimeout(function() {
                $("#mySelect").select2({
                    theme: "bootstrap4",
                    placeholder: "Sélectionnez une option",
                    minimumInputLength: 1, // L'utilisateur doit saisir au moins trois caractères
                    language: {
                        searchPlaceholder: "Recherchez une option...",
                        inputTooShort: function (args)
                        {
                            var remainingChars = args.minimum - args.input.length;
                            return "Saisissez au moins " + remainingChars + " caractères pour rechercher...";
                        }
                    },
                    ajax: {
                        url: "{{ url('/code-operation/recherch-code-compta') }}",
                        dataType: 'json',
                        type: "POST",
                        delay: 250, // Délai en ms avant l'exécution de la requête après la saisie de l'utilisateur
                        data: function(params) {
                            return {
                                term: params.term, // Terme saisi par l'utilisateur
                                _token: $('meta[name="csrf-token"]').attr('content') // Jeton CSRF pour Laravel
                            };
                        },
                        processResults: function(data) {
                            console.log(data.data);
                            return {
                                results: data.data // Format des résultats attendus par Select2
                            };
                        },
                        cache: true // Activer la mise en cache des résultats
                    }
                });




            }, 2000);


            $('#mySelect').on('change', function()
             {
                var selectedValue = $(this).val(); // Obtenir la valeur sélectionnée
                console.log(selectedValue);
                // Effectuer votre requête AJAX ici en utilisant la valeur sélectionnée
                $.ajax({
                    url: "{{ url('/code-operation/get-code-compta') }}" , // URL de votre requête AJAX
                    type: 'POST', // Méthode HTTP (POST, GET, etc.)
                    data: { id: selectedValue ,  _token: $('meta[name="csrf-token"]').attr('content')}, // Données à envoyer avec la requête
                    success: function(response) {
                        // Gérer la réponse de la requête AJAX ici
                        console.log(response.data.libelle);
                        $('#libelle_code').val(response.data.libelle);
                    },
                    error: function(xhr, status, error) {
                        // Gérer les erreurs de la requête AJAX ici
                        console.error(status + ': ' + error);
                    }
                });
            });


            $('#correspondance-button').click(function (e)
              {
                //  alert($('#contrat').prop('files'));
                e.preventDefault()
                // $('#modal-transfert-ria').modal('hide')


                if (!$('input[name=phrase]').val()) {

                    $('#phraseerror').html('<span style="color:red;">La phrase est obligatoire</span>');
                 return false;
                }else{
                    $('#phraseerror').html('');

                }
                console.log($('#mySelect').val());
                if (!$('#mySelect').val()) {
                    $('#codeeerror').html('<span style="color:red;">Le code est obligatoire</span>');
                 return false;
                }else{
                    $('#codeeerror').html('');

                }


                console.log("okk");



                let formData = new FormData($('#correspondance-form')[0]);



                var div = document.createElement('div');
                var img = document.createElement('img');
                img.src = '{{url('/images/cie.png')}}';
                img.style.cssText='width:100px;heigth:100px';
                div.innerHTML = "Patientez svp...<br />";
                div.style.cssText = 'position: fixed; padding-top: 300px; top: 0; z-index: 5000; width: 100%; height:100%; text-align: center; background: rgba(255,255,255,0.8);';

                 div.appendChild(img);
                document.body.appendChild(div);
                $(this).prop('readonly', true)

                let base = "{{\Illuminate\Support\Facades\URL::to('/').'/'}}"
                let url = 'accueil';
                setTimeout($.ajax(
                    {
                        url: "{{url('code-operation/save-correspondance-compta')}}",
                        method: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (rep) {
                        console.log(rep);


                            if(rep.code === "200" || rep.code === 200){
                                document.body.removeChild(div)
                                $("#code-form")[0].reset();
                                // $('#carteForm').trigger("reset");
                                // document.getElementById("marchandForm").reset();
                                Swal.fire(
                                'Good!',
                                rep.message,
                                'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                    })

                            }else{
                                document.body.removeChild(div)
                                Swal.fire(
                                    'Erreur!!!',
                                    rep.message,
                                    'error'
                                    )
                                }
                        },
                        statusCode: {
                            500: function() {
                                document.body.removeChild(div)
                            }
                        },
                        error: function (rep) {
                            // consolo.log(rep)
                            document.body.removeChild(div)
                        }
                    }
                ), 10000);
            })
    });



</script>












