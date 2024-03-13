var table = new Tabulator("#user-table", {
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
      {title:"Profile", field:"profile", hozAlign:"center"},
      {title:"Id utilisateur", field:"code", hozAlign:"center"},
      {title:"Nom", field:"name", hozAlign:"center"},
      {title:"Prénoms", field:"firstname", hozAlign:"center"},
      {title:"Matricule", field:"matricule", hozAlign:"center"},
      {title:"Adresse mail", field:"email", hozAlign:"center"},
      {title:"Téléphone", field:"telephone", hozAlign:"center"},
      {title:"Mobile", field:"mobile", hozAlign:"center"},
      {title:"Bloc", field:"bloc",visible:false},
      {title:"date_bloc", field:"date_bloc", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      }},
      {title:"Motif_bloc", field:"motif_bloc"},
      {title:"statut", field:"statut",visible:false},
      {title:"debut_activ", field:"debut_activ",visible:false},
      {title:"fin_activ", field:"fin_activ",visible:false},
      {title:"Initial", field:"initial"},
      {title:"Idjade", field:"idjade"},
      {title:"créer le", field:"created_at", hozAlign:"center", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      }},
      {title:"Action",field:"id", visible:false},
    ],
    ajaxURL: "/api/liste-users",
    layout:"fitColumns"
});

document.getElementById("download-xlsx-user").addEventListener("click", function(){
    table.download("xlsx", "Liste-utilisateur.xlsx", {sheetName:"My Data"});
});

//trigger download of data.pdf file
document.getElementById("download-pdf-user").addEventListener("click", function(){
    table.download("pdf", "Liste-utilisateur.pdf", {
        orientation:"portrait",
        title:"Export des utilisateurs",
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

        if(formMod.statut.value!==0){
            formMod.statut.checked=true;
        }else formMod.statut.checked=false;
        console.log(formMod.statut.value)
        console.log(formMod.statut)
        $('#edit-profile').modal('show');
    }

    console.log(profile.length);
});

$('#del-profile').submit(function(e){
        e.preventDefault()
    let listeProfile=table.getSelectedData();
     form=document.getElementById("del-profile")
    let liste=[]
    // console.log(liste.push(1,2,3))
    if(listeProfile.length==0){
        Swal.fire({
            icon:"error",
            title: "Oops,Erreur détectée.",
            text: "Aucune ligne n'a été sélectionnée pour cette opération!",
            });
    }else{
        Swal.fire({
            title: "Voulez-vous supprimer le(s) sélectionnée(s)?",
            text: "Cette action est irréversible, êtes-vous sûr?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0acc41",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, Supprimer!"
          }).then((result) => {
            if (result.isConfirmed) {
                $('#btn-del-profile').html('Traitement en cours...')
                $('#btn-del-profile').attr('disabled',true)
                listeProfile.forEach(element => {
                    liste.push(element['id'])
                    });
                // liste="["+liste.substring(0,liste.length-1)+"]"

                $.post("/del-profile",
                {
                    "_token": form._token.value,
                    listeP:liste,
                },
                function(data){
                    $('#btn-del-profile').html('Supprimer')
                    $('#btn-del-profile').attr('disabled',false)
                    if (data.resultat==false) {
                        // console.log(data.message_return)
                        // console.log(data.don+" echec")

                        Swal.fire({
                            icon:"error",
                            title: "Oops,Erreur détectée.",
                            text:`${data.message_return}` ,
                            });
                    }else{
                        console.log(data.don+" Succès")
                         Swal.fire({
                            title: "Supression!",
                            text: `${data.message_return}`,
                            icon: "success"
                        });
                        actualiser()
                    }

                }).fail((done)=>{

                    console.log(done)
                })

            }
          });



     console.log(liste)
}

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
            $('#edit-profile').modal('hide');
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

function destroyProfile(){

}





