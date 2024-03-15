
document.getElementById("save-user").addEventListener("click", function(){
    $("#form-user-save").validate({
        rules: {
        code: {
            required: true,
        },
        matricule: {
            required: true,
        },
        idjade: {
            required: false,
        },
        initial:{
            required:false,
        },
        fin_activ:{
            required:false,
            date:true,
        },
        profile:{
            required:true,
        },
        name:{
            required:true,
        },
        firstname:{
            required:true,
        },
        email:{
            required:true,
            email:true,
        },
        telephone:{
            required:true,
            number:false,
        },
        mobile:{
            required:true,
            number:false,
        },
        photo:{required: false,},
        sign:{required: false,},
        statut:{required: false,},
        is_admin:{required: false,},
        },
        messages: {
        code: "Veuillez saisir un code valide.",
        matricule: "Veuillez saisir un matricule valide.",
        idjade: "Veuillez saisir l'identifiant J@DE valide.",
        initial:"Veuillez saisir l'initiale valide.",
        fin_activ:"Veuillez saisir la date de fin d'activité valide.",
        profile:"Veuillez sélectionner un profile valide.",
        name:"Veuillez saisir un nom valide.",
        firstname:"Veuillez saisir vos prénoms valide.",
        email:"Veuillez saisir une addresse valide.",
        telephone:"Veuillez saisir le numéro de téléphone valide.",
        mobile:"Veuillez saisir le numéro mobile valide.",
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
        $('#save-user').html('Traitement en cours...')
        $('#save-user').attr('disabled',true)

        $.post("/save-profile",
        {
            "_token": form._token.value,
            code: form.code.value,
            libelle: form.libelle.value,
            type: form.type.value,
        },
        function(data){
            // console.log(data)
            $('#btn_save').html('Enregistrer le profile')
            $('#btn_save').attr('disabled',false)
            if(data.resultat==false){
                Swal.fire({
                    icon:"error",
                    title: "Oops, une erreur est survenue!",
                    text: `${data.message_return}`,
                    // footer: '<a href="/Auth/login">Voulez-vous aller à page de connexion</a>'
                    });

            }else{
                $('.bd-example-modal-lg').modal('hide');
                Swal.fire({
                    icon: "success",
                    title: "Enregistrement de profile.",
                    html: `${data.message_return}`,
                    showConfirmButton: true,
                    });
                    form.type.value=""
                    form.code.value=""
                    form.libelle.value=""

            }

                // console.log(data);
        });

        },

    });

});
