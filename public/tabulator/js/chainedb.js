var table = new Tabulator("#chainedb-table", {
    height:"300px",
    pagination:"local",
    paginationSize:6,
    paginationSizeSelector:[3, 6, 8, 10,15],
    movableColumns:true,
    // columnHeaderVertAlign:"center",
    columns:[
      {formatter:"rowSelection", titleFormatter:"rowSelection", hozAlign:"center", headerSort:false, cellClick:function(e, cell){
        cell.getRow().toggleSelect();
      },width:20},
      {title:"Code", field:"code"},
      {title:"nom de la base", field:"name_db"},
      {title:"Type sgbd", field:"type",formatter:formatterType},
      {title:"Serveur", field:"serveur", hozAlign:"center"},
      {title:"Utilisateur", field:"utilisateur", hozAlign:"center"},
      {title:"Statut", field:"statut", hozAlign:"center",formatter:formatterStatut},
      {title:"Auteur", field:"auteur"},
      {title:"Créer le", field:"created_at", hozAlign:"center", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      }},
      {title:"Action",field:"id", visible:false},
    ],
    ajaxURL: "/api/liste-chaine",
    layout:"fitColumns"
});

function actualiser(){
    table.setData();
}

$('#formChaine').submit(function(e){
    e.preventDefault();

    $("#formChaine").validate({
        rules: {
        type: {
            required: true,
        },
        code: {
            required: true,
        },
        name_db:{
            required:true,
        },
        serveur:{
            required:true,
        },
        utilisateur:{
            required:true,
        },
        passwords:{
            required:true,
        },
        _token:{required: true,},
        },
        messages: {
        type: "Veuillez sélectionner le type de sgbd.",
        code: "Veuillez saisir un code valide.",
        name_db: "Veuillez saisir un nom de base de données valide.",
        serveur: "Veuillez saisir un serveur valide.",
        utilisateur: "Veuillez sélectionné un utilisateur valide.",
        passwords: "Veuillez sélectionné un mot de passe valide.",
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
        $('#save-chaine').html('Enregistrement en cours...')
        $('#save-chaine').attr('disabled',true)

        $.post("/gestion-de-connexion/save-chaine",
        {
            "_token": form._token.value,
            type: form.type.value,
            code: form.code.value,
            name_db: form.name_db.value,
            serveur: form.serveur.value,
            utilisateur: form.utilisateur.value,
            passwords: form.passwords.value,
        },
        function(data){
             console.log(data)
            $('#save-chaine').html('Enregistrer');
            $('#save-chaine').attr('disabled',false);
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
                    form.type.value="",
                    form.code.value="",
                    form.name_db.value="",
                    form.serveur.value="",
                    form.utilisateur.value="",
                    form.passwords.value=""

            }
            actualiser();
                // console.log(data);
        });

        },

    });
});
