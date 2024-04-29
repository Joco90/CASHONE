var tableUser = new Tabulator("#user-table", {
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
      {title:"Profile", field:"profile", hozAlign:"center",visible:false},
      {title:"Id utilisateur", field:"code", hozAlign:"center"},
      {title:"Nom", field:"name", hozAlign:"center"},
      {title:"Prénoms", field:"firstname", hozAlign:"center"},
      {title:"Matricule", field:"matricule", hozAlign:"center"},
      {title:"Adresse mail", field:"email", hozAlign:"center"},
      {title:"Téléphone", field:"telephone", hozAlign:"center"},
      {title:"Mobile", field:"mobile", hozAlign:"center",visible:false},
      {title:"Bloc", field:"bloc",visible:false},
      {title:"date_bloc", field:"date_bloc", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      },visible:false},
      {title:"Motif_bloc", field:"motif_bloc",visible:false},
      {title:"statut", field:"statut",visible:false},
      {title:"debut_activ", field:"debut_activ",visible:false},
      {title:"fin_activ", field:"fin_activ",visible:false},
      {title:"Initial", field:"initial",visible:false},
      {title:"Idjade", field:"idjade",visible:false},
      {title:"créer le", field:"created_at", hozAlign:"center", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      },visible:false},
      {title:"Action",field:"id",formatter:formatterbtn},
    ],
    ajaxURL: "/api/liste-users",
    layout:"fitColumns"
});

function formatterbtn(cel){
    let value=cel.getValue();

    return `<a href="/gestion-des-utilisateurs/del-user/${value}" class="btn btn-danger btn-sm" title="Supprimer">
    <i class="pe-7s-trash btn-icon-wrapper"></i>
    </a>
    <a href="/gestion-des-utilisateurs/edit-user/${value}" class="btn btn-secondary btn-sm" title="Modifier">
    <i class="pe-7s-pen btn-icon-wrapper"></i>
    </a>
    <a href="/gestion-des-utilisateurs/details-user/${value}" class="btn btn-info btn-sm" title="Etat">
    <i class="pe-7s-menu btn-icon-wrapper"></i>
    </a>`;
}

document.getElementById("download-xlsx-user").addEventListener("click", function(){
    tableUser.download("xlsx", "Liste-utilisateur.xlsx", {sheetName:"My Data"});
});

//trigger download of data.pdf file
document.getElementById("download-pdf-user").addEventListener("click", function(){
    tableUser.download("pdf", "Liste-utilisateur.pdf", {
        orientation:"portrait",
        title:"Export des utilisateurs",
    });
});


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


document.getElementById("btn-modif-user").addEventListener("click", function(){
    let user=tableUser.getSelectedData();

    if(user.length==0){
        Swal.fire({
            icon:"error",
            title: "Oops,Erreur détectée.",
            text: "Aucune ligne n'a été sélectionnée pour cette opération!",
            });
    }else{
        let user_id=user[0]['id'];
        console.log(user_id);
        $.get("/edit-user",
                {
                    id:user_id,
                },function(data){
                    if(data.resultat==false){
                        Swal.fire({
                            icon:"error",
                            title: "Oops,Erreur détectée.",
                            text: `${data.message_return}`,
                            });
                    }
            }).fail((done)=>{

                console.log(done)
            });
    }
});


$('#del-user').submit(function(e){
        e.preventDefault()
    let listeProfile=tableUser.getSelectedData();
     form=document.getElementById("del-user")
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
                $('#btn-del-user').html('Traitement en cours...')
                $('#btn-del-user').attr('disabled',true)
                listeProfile.forEach(element => {
                    liste.push(element['id'])
                    });
                // liste="["+liste.substring(0,liste.length-1)+"]"

                $.post("/del-user",
                {
                    "_token": form._token.value,
                    listeP:liste,
                },
                function(data){
                    $('#btn-del-user').html('Supprimer')
                    $('#btn-del-user').attr('disabled',false)
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

function destroyProfile(){

}





