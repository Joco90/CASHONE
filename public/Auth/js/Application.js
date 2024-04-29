//Enregistrement des utilisateur bouton Enregistrer
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
            required:true,
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
            // var fichier = document.getElementById('photo').files[0];
            //  fichier =form.photo.files[0]

            //  console.log(fichier);

        $('.alert').removeClass("alert-success alert-danger")
        $('#save-user').html('Traitement en cours...')
        $('#save-user').attr('disabled',true)

        $.post("/user-save",
        {
            "_token": form._token.value,
            code: form.code.value,
            matricule: form.matricule.value,
            idjade: form.idjade.value,
            initial: form.initial.value,
            fin_activ: form.fin_activ.value,
            profile: form.profile.value,
            name: form.name.value,
            firstname: form.firstname.value,
            email: form.email.value,
            telephone: form.telephone.value,
            mobile: form.mobile.value,
            statut: form.statut.value,
            is_admin:form.is_admin.value,
        },
        function(data){
            let message=data.message_return
              console.log(message)
            $('#save-user').html('Enregistrer')
            $('#save-user').attr('disabled',false)
            if(data.resultat==false){
                $('.alert').addClass("alert-danger").removeClass("alert-success")
                $('.alert').html('');
                $('.alert').html(`<li>${message}</li>`);
                for (const property in message) {
                    if (Array.isArray(message[property])) {
                        for (let i = 0; i < message[property].length; i++) {
                            // console.log(message[property][i]);
                            $('.alert').append(`<li>${message[property][i]}</li>`)
                        }
                    }
                    $('#'+property+'error').addClass("is-invalid").removeClass("is-valid")
                    $('#'+property+'error').html(message[property][0])
                    $('#'+property).addClass("is-invalid")
                  }

            }else{
                $('.alert').addClass("alert-success").removeClass("alert-danger")
                $('.alert').html('');
                $('.alert').html(`<li>${message}</li>`);
                // Swal.fire({
                //     icon: "success",
                //     title: "Enregistrement utilisateur.",
                //     html: `${data.message_return}`,
                //     showConfirmButton: true,
                //     });
                    form.code.value="";
                    form.matricule.value="";
                    form.idjade.value="";
                    form.initial.value="";
                    form.fin_activ.value="";
                    form.profile.value="";
                    form.name.value="";
                    form.firstname.value="";
                    form.email.value="";
                    form.telephone.value="";
                    form.mobile.value="";
                    form.statut.value="";
                    form.is_admin.value="";
                    window.location.href = "/liste-users"
            }

                 console.log(data);
        });

        },

    });

});

//Enregistrement des utilisateur bouton appliquer
document.getElementById("app-user").addEventListener("click", function(){
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
            required:true,
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

        $('.alert').removeClass("alert-success alert-danger");
        $('#save-user').html('Traitement en cours...');
        $('#save-user').attr('disabled',true);
            console.log(form.matricule.value)
        $.post("/user-save",
        {
            "_token": form._token.value,
            code: form.code.value,
            matricule: form.matricule.value,
            idjade: form.idjade.value,
            initial: form.initial.value,
            fin_activ: form.fin_activ.value,
            profile: form.profile.value,
            name: form.name.value,
            firstname: form.firstname.value,
            email: form.email.value,
            telephone: form.telephone.value,
            mobile: form.mobile.value,
            statut: form.statut.value,
            is_admin:form.is_admin.value,
        },
        function(data){
            let message=data.message_return
              console.log(message)
            $('#save-user').html('Enregistrer')
            $('#save-user').attr('disabled',false)
            if(data.resultat==false){
                $('.alert').addClass("alert-danger").removeClass("alert-success")
                $('.alert').html('');
                $('.alert').html(`<li>${message}</li>`);
                for (const property in message) {
                    if (Array.isArray(message[property])) {
                        for (let i = 0; i < message[property].length; i++) {
                            // console.log(message[property][i]);
                            $('.alert').append(`<li>${message[property][i]}</li>`)
                        }
                    }
                    $('#'+property+'error').addClass("is-invalid").removeClass("is-valid")
                    $('#'+property+'error').html(message[property][0])
                    $('#'+property).addClass("is-invalid")
                  }

            }else{
                $('.alert').addClass("alert-success").removeClass("alert-danger")
                $('.alert').html('');
                $('.alert').html(`<li>${message}</li>`);
                // Swal.fire({
                //     icon: "success",
                //     title: "Enregistrement utilisateur.",
                //     html: `${data.message_return}`,
                //     showConfirmButton: true,
                //     });
                    form.code.value="";
                    form.matricule.value="";
                    form.idjade.value="";
                    form.initial.value="";
                    form.fin_activ.value="";
                    form.profile.value="";
                    form.name.value="";
                    form.firstname.value="";
                    form.email.value="";
                    form.telephone.value="";
                    form.mobile.value="";
                    form.statut.value="";
                    form.is_admin.value="";

            }

                 console.log(data);
        });

        },

    });

});

//
function checkboxChange(id){
    statut=document.getElementById(id);
    if (statut.checked===true) {
        statut.value=1;
    }else{
        statut.value=0;
    }
    console.log(statut.value);
}


// Importation de personnel via une source de donées
$("#formImpoter").submit(function(e){

   
});
