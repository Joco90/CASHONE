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
                            CASHONE - Personnel
                            <div class="page-title-subheading">Importation de personnel.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">

                    </div>
                </div>
            </div>
            {{-- Critères de recherche de personnel --}}
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Importation de données</h5>
                    <form action="{{route('importpersonel.getAgent')}}" method="POST" id="formImpoter">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="position-relative mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <select id="code" value="" name="code" class="multiselect-dropdown form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative mb-3">
                                    <label for="name_db" class="form-label">Nom de la base données</label>
                                    <input name="name_db" id="name_db"
                                         type="text" class="form-control" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer clearfix">
                            <button type="submit" id="pimportPersonnel" class="btn-icon btn btn-secondary"> Importer agent</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

<script type="text/javascript" src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
<script>

    $(document).ready(() =>
    {
            setTimeout(function() {
                $("#code").select2({
                    theme: "bootstrap4",
                    placeholder: "Saisir le code de la chaine",
                    minimumInputLength: 1, // L'utilisateur doit saisir au moins trois caractères
                    language: {
                        searchPlaceholder: "Rechercher une option...",
                        inputTooShort: function (args)
                        {
                            var remainingChars = args.minimum - args.input.length;
                            return "Saisissez au moins " + remainingChars + " caractères pour rechercher...";
                        }
                    },
                    ajax: {
                        url: "{{ url('/import-personel/recherche-chaine') }}",
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
                            console.log(data.resultat);
                            return {
                                results: data.resultat // Format des résultats attendus par Select2
                            };
                        },
                        cache: true // Activer la mise en cache des résultats
                    }
                });

            }, 2000);

            $('#code').on('change', function()
             {
                var selectedValue = $(this).val(); // Obtenir la valeur sélectionnée
                console.log(selectedValue);
                // Effectuer votre requête AJAX ici en utilisant la valeur sélectionnée
                $.ajax({
                    url: "{{ url('/import-personel/trouver-chaine') }}" , // URL de votre requête AJAX
                    type: 'POST', // Méthode HTTP (POST, GET, etc.)
                    data: { code: selectedValue ,  _token: $('meta[name="csrf-token"]').attr('content')}, // Données à envoyer avec la requête
                    success: function(response) {
                        // Gérer la réponse de la requête AJAX ici
                        console.log(response.resultat['code']);
                        // $('#code').val(response.resultat['code']);
                        $('#name_db').val(response.resultat['name_db']);
                    },
                    error: function(xhr, status, error) {
                        // Gérer les erreurs de la requête AJAX ici
                        console.error(status + ': ' + error);
                    }
                });
            });

            document.getElementById("importPersonnel").addEventListener('click',function(){

                $("#formImpoter").validate({

                    rules: {
                    code: {
                        required: true,
                    },
                    name_db:{
                        required:true,
                    },
                    _token:{required: true,},
                    },
                    messages: {
                    code: "Veuillez saisir un code valide.",
                    name_db: "Veuillez saisir un nom de base de données valide.",
                    _token:"clé de notre réquête est absente.",
                    },
                    errorElement: "em",
                    errorPlacement: function (error, element) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass("invalid-feedback");
                        error.insertAfter(element);
                    },
                    highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                    },
                    unhighlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                    },
                    submitHandler: function(form) {
                    $('#importPersonnel').html('Impotation de personnel en cours...')
                    $('#importPersonnel').attr('disabled',true)

                    $.post("/import-personel/import-agent",
                    {
                        "_token": form._token.value,
                        code: form.code.value,
                        name_db: form.name_db.value,
                    },
                    function(data){
                        console.log(data.message_return)
                        $('#importPersonnel').html('Importer');
                        $('#importPersonnel').attr('disabled',false);
                        if(data.resultat==false){
                            Swal.fire({
                                icon:"error",
                                title: "Oops, une erreur est survenue!",
                                text: `${data.message_return}`,
                                // footer: '<a href="/Auth/login">Voulez-vous aller à page de connexion</a>'
                                });

                        }else{
                            Swal.fire({
                                icon: "success",
                                title: "Enregistrement de chaine.",
                                html: `${data.message_return}`,
                                showConfirmButton: true,
                                });

                        }
                    });

                    },

                    });
            });
    });


</script>
