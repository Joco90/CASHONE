var tableUser = new Tabulator("#personnel-table", {
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
      {title:"Civilité", field:"civilite", hozAlign:"center"},
      {title:"Nom", field:"nom", hozAlign:"center",visible:true},
      {title:"Prénoms", field:"prenoms", hozAlign:"center"},
      {title:"Matricule", field:"matricule", hozAlign:"center"},
      {title:"telephone", field:"telephone", hozAlign:"center"},
      {title:"Mobile", field:"mobile", hozAlign:"center"},
      {title:"Adresse mail", field:"email_pro", hozAlign:"center"},
      {title:"Mail perso", field:"email_perso", hozAlign:"center",visible:false},
      {title:"Centre", field:"code_ci", hozAlign:"center",visible:false},
      {title:"Contrat", field:"contrat",visible:false},
      {title:"Né(e) le", field:"date_naissance", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      },visible:false},
      {title:"type_id", field:"type_id",visible:false},
      {title:"statut", field:"statut",visible:false},
      {title:"bq_data", field:"bq_data",visible:false},
      {title:"num_id", field:"num_id",visible:false},
      {title:"emploi", field:"emploi",visible:false},
      {title:"auteur", field:"auteur",visible:false},
      {title:"créer le", field:"created_at", hozAlign:"center", sorter:"date",formatter:(cell)=>{
        let val = cell.getValue();
        return `${moment(val).format('DD/MM/YYYY')}`
      },visible:false},
      {title:"Action",field:"id",formatter:formatterbtn},
    ],
    ajaxURL: "/api/liste-personnel",
    layout:"fitColumns"
});

function formatterbtn(cel){
    let value=cel.getValue();

    return `<a href="/gestion-personel/personnel-supprimer/${value}" class="btn btn-danger btn-sm" title="Supprimer">
    <i class="pe-7s-trash btn-icon-wrapper"></i>
    </a>
    <a href="/gestion-personel/personnel-modifier/${value}" class="btn btn-secondary btn-sm" title="Modifier">
    <i class="pe-7s-pen btn-icon-wrapper"></i>
    </a>
    <a href="/gestion-personel/personnel-details/${value}" class="btn btn-info btn-sm" title="details">
    <i class="pe-7s-menu btn-icon-wrapper"></i>
    </a>`;
}

document.getElementById("download-xlsx-personnel").addEventListener("click", function(){
    tableUser.download("xlsx", "personnel.xlsx", {sheetName:"My Data"});
});

//trigger download of data.pdf file
document.getElementById("download-pdf-personnel").addEventListener("click", function(){
    tableUser.download("pdf", "Liste-personnel-cashone.pdf", {
        orientation:"portrait",
        title:"Export de personnels",
    });
});

function actualiserPersonnel(){
    table.setData();
}


