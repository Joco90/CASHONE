// // Form Validation
// function clickbtn(){

//     $("#profile-form").validate({
//         rules: {
//         code: {
//             required: true,
//         },
//         libelle:{
//             required:true,
//         },
//         type:{
//             required:true,
//             Number:false,
//         },
//         _token:{required: true,},
//         },
//         messages: {
//         code: "Veuillez saisir un code valide.",
//         libelle: "Veuillez saisir un libellé valide.",
//         type: "Veuillez sélectionné un type valide.",
//         _token:"clé de notre réquête est absente.",
//         },
//         errorElement: "em",
//         errorPlacement: function (error, element) {
//         // Add the `invalid-feedback` class to the error element
//         error.addClass("invalid-feedback");
//             error.insertAfter(element);
//         },
//         highlight: function (element, errorClass, validClass) {
//         $(element).addClass("is-invalid").removeClass("is-valid");
//         },
//         unhighlight: function (element, errorClass, validClass) {
//         $(element).addClass("is-valid").removeClass("is-invalid");
//         },
//         submitHandler: function(form) {
//         $('#btn_save').html('Enregistrement en cours...')
//         $('#btn_save').attr('disabled',true)
//             console.log( form.libelle.value)
//         $.post("/save-profile",
//         {
//             "_token": form._token.value,
//             code: form.code.value,
//             libelle: form.libelle.value,
//             type: form.type.value,
//         },
//         function(data){
//             // console.log(data)
//             $('#btn_save').html('Enregistrer le profile')
//             $('#btn_save').attr('disabled',false)
//             if(data.resultat==false){
//                 Swal.fire({
//                     icon:"error",
//                     title: "Oops, une erreur est survenue!",
//                     text: `${data.message_return}`,
//                     // footer: '<a href="/Auth/login">Voulez-vous aller à page de connexion</a>'
//                     });

//             }else{
//                 $('.bd-example-modal-lg').modal('hide');
//                 Swal.fire({
//                     icon: "success",
//                     title: "Enregistrement de profile.",
//                     html: `${data.message_return}`,
//                     showConfirmButton: true,
//                     });
//                     form.type.value=""
//                     form.code.value=""
//                     form.libelle.value=""

//             }
//                 console.log(data);
//         });

//         },

//     });

// }

// function _applique(){
//     $("#profile-form").validate({
//         rules: {
//         code: {
//             required: true,
//         },
//         libelle:{
//             required:true,
//         },
//         type:{
//             required:true,
//             Number:false,
//         },
//         _token:{required: true,},
//         },
//         messages: {
//         code: "Veuillez saisir un code valide.",
//         libelle: "Veuillez saisir un libellé valide.",
//         type: "Veuillez sélectionné un type valide.",
//         _token:"clé de notre réquête est absente.",
//         },
//         errorElement: "em",
//         errorPlacement: function (error, element) {
//         // Add the `invalid-feedback` class to the error element
//         error.addClass("invalid-feedback");
//             error.insertAfter(element);
//         },
//         highlight: function (element, errorClass, validClass) {
//         $(element).addClass("is-invalid").removeClass("is-valid");
//         },
//         unhighlight: function (element, errorClass, validClass) {
//         $(element).addClass("is-valid").removeClass("is-invalid");
//         },
//         submitHandler: function(form) {
//         $('#btn_application').html('Enregistrement en cours...')
//         $('#btn_application').attr('disabled',true)
//             console.log( form.libelle.value)
//         $.post("/save-profile",
//         {
//             "_token": form._token.value,
//             code: form.code.value,
//             libelle: form.libelle.value,
//             type: form.type.value,
//         },
//         function(data){
//             // console.log(data)
//             $('#btn_application').html('Appliquer')
//             $('#btn_application').attr('disabled',false)
//             if(data.resultat==false){
//                  $('#alert').addClass('alert-danger')

//                  $('#alert').html(`<div class="font-weight-bold">Oops! Une erreur détectée.....</div>
//                  <ul class="mb-0">${data.message_return}</ul>
//                  </div>`)

//             }else{

//                 $('#alert').addClass('alert-success')
//                 $('#alert').html(`<div class="font-weight-bold">${data.message_return}</div>`)

//                 form.type.value=""
//                 form.code.value=""
//                 form.libelle.value=""
//             }
//                 console.log(data);
//         });

//         },

//     });

//     // let form=document.getElementById('profile-form')
//     // libelle=form.libelle.value;
//     // code=form.code.value;
//     // type=form.type.value;
//     // form.type.value=""
//     // form.code.value=""
//     // form.libelle.value=""
//     // console.log(code)
// }


