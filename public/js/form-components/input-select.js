// Forms Multi Select

$(document).ready(() => {
    setTimeout(function() {
        // $(".multiselect-dropdown").select2({
        //     theme: "bootstrap4",
        //     placeholder: "Sélectionnez une option",
        //     minimumInputLength: 3, // L'utilisateur doit saisir au moins trois caractères
        //     ajax: {
        //         url: "{{ url('/code-operation/recherch-code-compta') }}",
        //         dataType: 'json',
        //         type: "POST",
        //         delay: 250, // Délai en ms avant l'exécution de la requête après la saisie de l'utilisateur
        //         data: function(params) {
        //             return {
        //                 term: params.term, // Terme saisi par l'utilisateur
        //                 _token: $('meta[name="csrf-token"]').attr('content') // Jeton CSRF pour Laravel
        //             };
        //         },
        //         processResults: function(data) {
        //             return {
        //                 results: data // Format des résultats attendus par Select2
        //             };
        //         },
        //         cache: true // Activer la mise en cache des résultats
        //     }
        // });

        $("#example-single").multiselect({
            inheritClass: true,
        });

        $("#example-multi").multiselect({
            inheritClass: true,
        });

        $("#example-multi-check").multiselect({
            inheritClass: true,
        });
    }, 2000);
});