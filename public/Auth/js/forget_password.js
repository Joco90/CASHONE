// Form Validation

$(document).ready(() => {

    $("#forgetPassworForm").validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        _token:{required: true,},
      },
      messages: {
        email: "Veuillez saisir une addresse e-mail correcte.",
        _token:"cle de notre requête est absent",
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
        $('#btnEvoie').html('Envoie en cours...')
        $('#btnEvoie').attr('disabled',true)
        $.post("/api/forget-password",
        {
            "_token": form._token.value,
            email: form.email.value,
        },
        function(data){
            $('#btnEvoie').html('Envoyer')
            $('#btnEvoie').attr('disabled',false)
            if(data.resultat==false){
                Swal.fire({
                    icon:"error",
                    title: "Oops, une erreur est survenue!",
                    text: `${data.message_return}`,
                    footer: '<a href="/Auth/login">Voulez-vous aller à page de connexion</a>'
                  });
                // $('#alert').addClass('alert-danger')

                // $('#alert').html(`<div class="font-weight-bold">Oops! Une erreur détectée.....</div>
                // <ul class="mb-0">${data.message_return}</ul>
                // </div>`)
            }else{
                Swal.fire({
                    icon: "success",
                    title: "Traitement effectué avec succès.",
                    html: `${data.message_return}`,
                    showConfirmButton: true,
                    confirmButtonText:'<a href="/Auth/login">Ok</a>'
                  });
                // $('#alert').addClass('alert-success')

                // $('#alert').html(`<div class="font-weight-bold">${data.message_return}</div>`)
            }
            // console.log(data);
        });

      },

    });
  });

