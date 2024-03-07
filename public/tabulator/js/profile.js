var table = new Tabulator("#profile-table", {
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
      {title:"code profile", field:"code"},
      {title:"libelle", field:"libelle"},
      {title:"type", field:"type",formatter:formatterType},
      {title:"statut", field:"statut", hozAlign:"center",formatter:formatterStatut},
      {title:"Auteur", field:"auteur"},
      {title:"créer le", field:"created_at", hozAlign:"center", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      }},
      {title:"Action",field:"id", visible:false},
    ],
    ajaxURL: "/api/liste-profile",
    layout:"fitColumns"
});

document.getElementById("download-xlsx").addEventListener("click", function(){
    table.download("xlsx", "liste-profile.xlsx", {sheetName:"My Data"});
});

//trigger download of data.pdf file
document.getElementById("download-pdf").addEventListener("click", function(){
    table.download("pdf", "liste-profile.pdf", {
        orientation:"portrait", //set page orientation to portrait
        title:"Example Report", //add title to report
    });
});

function checkboxChange(id){
    statut=document.getElementById(id);
    label=document.getElementById('labStatut');
    if (statut.checked===true) {
        label.style.color="green";
        label.innerHTML="Activé";
        statut.value=1;
    }else{
        label.style.color="red";
        label.innerHTML="Désactivé";
        statut.value=0;
    }
    console.log(statut.value);
}
function formatterType(type){
    let val=type.getValue();
    let libelle;
    switch (val) {
        case 1: libelle='Administrateur système';
            break;
        case 2: libelle='Administrateur limité';
            break;
        case 3: libelle='Utilisateur standard';
            break;

        default:
            break;
    }
    return libelle;
}

function formatterStatut(status){
    let statut=status.getValue();
    if (statut===0) {
        return `<span class="badge bg-danger">Désactivé</span>`;
    }else return `<span class="badge bg-success">Activé</span>`;
}


function actualiser(){
    table.setData();
}


document.getElementById("btn-modif-profile").addEventListener("click", function(){
    let profile=table.getSelectedData();
    if(profile.length==0){
        Swal.fire({
            icon:"error",
            title: "Oops,Erreur détectée.",
            text: "Aucune ligne n'a été sélectionnée pour cette opération!",
            });
    }else{
        formMod=document.getElementById("profile-form-edit");
        formMod.code.value=profile[0]['code'];
        formMod.code.setAttribute('disabled',true);
        formMod.id.value=profile[0]['id'];
        formMod.libelle.value=profile[0]['libelle'];
        formMod.type.value=profile[0]['type'];
        formMod.statut.value=profile[0]['statut'];

        $('#edit-profile').modal('show');
    }

    console.log(profile.length);
});


// Form Validation
function clickbtn(){

    $("#profile-form").validate({
        rules: {
        code: {
            required: true,
        },
        libelle:{
            required:true,
        },
        type:{
            required:true,
            Number:false,
        },
        _token:{required: true,},
        },
        messages: {
        code: "Veuillez saisir un code valide.",
        libelle: "Veuillez saisir un libellé valide.",
        type: "Veuillez sélectionné un type valide.",
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
        $('#btn_save').html('Enregistrement en cours...')
        $('#btn_save').attr('disabled',true)
            console.log( form.libelle.value)
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
            actualiser()
                // console.log(data);
        });

        },

    });

}

function _applique(){
    $("#profile-form").validate({
        rules: {
        code: {
            required: true,
        },
        libelle:{
            required:true,
        },
        type:{
            required:true,
            Number:false,
        },
        _token:{required: true,},
        },
        messages: {
        code: "Veuillez saisir un code valide.",
        libelle: "Veuillez saisir un libellé valide.",
        type: "Veuillez sélectionné un type valide.",
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
        $('#btn_application').html('Enregistrement en cours...')
        $('#btn_application').attr('disabled',true)
            // console.log( form.libelle.value)
        $.post("/save-profile",
        {
            "_token": form._token.value,
            code: form.code.value,
            libelle: form.libelle.value,
            type: form.type.value,
        },
        function(data){
            // console.log(data)
            $('#btn_application').html('Appliquer')
            $('#btn_application').attr('disabled',false)
            if(data.resultat==false){
                 $('#alert').addClass('alert-danger')

                 $('#alert').html(`<div class="font-weight-bold">Oops! Une erreur détectée.....</div>
                 <ul class="mb-0">${data.message_return}</ul>
                 </div>`)

            }else{

                $('#alert').addClass('alert-success')
                $('#alert').html(`<div class="font-weight-bold">${data.message_return}</div>`)

                form.type.value=""
                form.code.value=""
                form.libelle.value=""
                actualiser()
            }
                console.log(data);
        });

        },

    });

}

function editProfile(){
    formEdit=document.getElementById("profile-form-edit");
    $('#btn_edit').html('Traitement en cours...')
    $('#btn_edit').attr('disabled',true)

    $.post("/edit-profile",
        {
            "_token": formEdit._token.value,
            code: formEdit.code.value,
            libelle: formEdit.libelle.value,
            type: formEdit.type.value,
            statut: formEdit.statut.value,
        },
        function(data){
            // console.log(data)
            $('#btn_edit').html('Enregistrer la modification')
            $('#btn_edit').attr('disabled',false)
            console.log(data);
            if(data.resultat==false){

                Swal.fire({
                    title: "OOp, Erreur détectée!",
                    text: `${data.message_return}`,
                    icon: "error"
                  });
            }else{

                Swal.fire({
                    title: "Succès!",
                    text: `${data.message_return}`,
                    icon: "success"
                  });
                actualiser()
            }
                console.log(data);
        });
}





