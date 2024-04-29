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
                            <div class="page-title-subheading">Enregistrement,modification,suppression de personnels.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">

                    </div>
                </div>
            </div>
            {{-- Critères de recherche de personnel --}}
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Critères de recherche</h5>
                    <form class="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="position-relative mb-3">
                                    <label for="matricule" class="form-label">Matricule</label>
                                    <select id="matricule" name="matricule" class="multiselect-dropdown form-control">

                                    </select>
                                        <em id="matriculeerror"></em>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input name="nom" id="nom"
                                         type="text" class="form-control">
                                        <em id="nomerror"></em>
                                </div>
                            </div>

                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="submit" class="btn-icon btn btn-secondary"> Rechercher</button>
                        </div>
                    </form>
                </div>
                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                    <li class="nav-item">
                        <a href="{{route('personel.nouveau')}}"  class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-plus"></i> Ajouter nouveau
                        </a>
                    </li>
                    <li class="nav-item">
                        <button onclick="actualiserPersonnel()" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-refresh-2"></i> Actualiser
                        </button>
                    </li>
                    <li class="nav-item">
                        <button id="btn-modif-personnel" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-note"></i> Modifier
                        </button>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('personel.nouveau')}}"  class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-download"></i> Importer
                        </a>
                    </li>
                    <li class="nav-item">
                        <form id="del-personnel">
                            @csrf
                            <button type="submit" id="btn-del-personnel" class="mb-2 me-2 btn-icon btn btn-secondary" >
                                <i class="nav-link-icon pe-7s-trash"></i> Supprimer
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <button id="download-xlsx-personnel" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-download"></i> Exporter vers Excel
                        </button>
                    </li>
                    <li class="nav-item">
                        <button id="download-pdf-personnel" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-download"></i> Exporter vers pdf
                        </button>
                    </li>
                </ul>
                <div id="personnel-table"></div>
            </div>

        </div>

    </div>
@endsection

<script type="text/javascript" src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
<script>

    $(document).ready(() =>
    {
            setTimeout(function() {
                $("#matricule").select2({
                    theme: "bootstrap4",
                    placeholder: "Saisir un matricule",
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
                        url: "{{ url('/gestion-personel/recherch-personnel') }}",
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


            $('#matricule').on('change', function()
             {
                var selectedValue = $(this).val(); // Obtenir la valeur sélectionnée
                console.log(selectedValue);
                // Effectuer votre requête AJAX ici en utilisant la valeur sélectionnée
                $.ajax({
                    url: "{{ url('/gestion-personel/trouver-personnel') }}" , // URL de votre requête AJAX
                    type: 'POST', // Méthode HTTP (POST, GET, etc.)
                    data: { matricule: selectedValue ,  _token: $('meta[name="csrf-token"]').attr('content')}, // Données à envoyer avec la requête
                    success: function(response) {
                        // Gérer la réponse de la requête AJAX ici
                        console.log(response.resultat[0]['NOM']+' '+response.resultat[0]['PRENOM']);
                        $('#nom').val(response.resultat[0]['NOM']+' '+response.resultat[0]['PRENOM']);
                    },
                    error: function(xhr, status, error) {
                        // Gérer les erreurs de la requête AJAX ici
                        console.error(status + ': ' + error);
                    }
                });
            });

    });



</script>
