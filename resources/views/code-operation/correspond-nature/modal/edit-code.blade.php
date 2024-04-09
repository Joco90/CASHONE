<div class="modal fade modifier" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form id="code-form-edit" method="POST">
                            <div class="modal-body">
                            
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="position-relative mb-3">
                                                <label class="form-label" for="code">Code </label>
                                                <input  name="code_input" id="code_input" maxlength="4" minlength="4"
                                                    placeholder="Code profile" value=""
                                                    type="text" class="form-control">
                                                    <small class="form-text text-muted" id="codeerror_input"></small>
                                            </div>
                                        </div>
                                        <input id="id_input" name="id" hidden>
                                        <div class="col-md-6">
                                            <div class="position-relative mb-3">
                                                <label class="form-label" for="libelle">Libellé (*)</label>
                                                <input name="libelle_input" id="libelle_input"
                                                    placeholder="description du profile"
                                                    type="text" class="form-control">
                                                    <small class="form-text text-muted" id="libelleerror_input"></small>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="submit" onclick="clickbtn()" id="btn_save" class="btn btn-primary">Enregistrer le profile</button>
                                        <button type="submit" onclick="_applique()" id="btn_application" class="btn btn-secondary">Appliquer</button>
                                        <button type="button" id="btn_close" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    
                                    </div> --}}
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="edit-code-comptable"  class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



           



    
    <script>
    
    $(document).ready(function(){
    
    
    
  

    

    
    $('#edit-code-comptable').click(function (e) {
                //  alert($('#contrat').prop('files'));
                e.preventDefault()
                // $('#modal-transfert-ria').modal('hide')
                console.log("okk");
    
                if (!$('input[name=code_input]').val()) {
                 
                    $('#codeerror_input').html('<span style="color:red;">Le code est obligatoire</span>');
                 return false;   
                }else{
                    $('#codeerror_input').html('');
    
                }
                if (!$('input[name=libelle_input]').val()) {
                    $('#libelleerror_input').html('<span style="color:red;">Le libellé est obligatoire</span>');
                 return false;   
                }else{
                    $('#libelleerror_input').html('');
    
                }
    
              
             
    
    
    
                let formData = new FormData($('#code-form-edit')[0]);
               
    
               
                var div = document.createElement('div');
                var img = document.createElement('img');
                img.src = '{{url('/images/cie.png')}}';
                img.style.cssText='width:100px;heigth:100px';
                div.innerHTML = "Patientez svp...<br />";
                div.style.cssText = 'position: fixed; padding-top: 300px; top: 0; z-index: 5000; width: 100%; height:100%; text-align: center; background: rgba(255,255,255,0.8);';
               
                 div.appendChild(img);
                document.body.appendChild(div);
                $(this).prop('readonly', true)
    
                let base = "{{\Illuminate\Support\Facades\URL::to('/').'/'}}"
                let url = 'accueil';
                setTimeout($.ajax(
                    {
                        url: "{{url('code-operation/edit-nature-comptable')}}",
                        method: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (rep) {
                        console.log(rep);
    
    
                            if(rep.code === "200" || rep.code === 200){
                                document.body.removeChild(div)
                                $("#code-form-edit")[0].reset();
                                // $('#carteForm').trigger("reset");
                                // document.getElementById("marchandForm").reset();
                                Swal.fire(
                                'Good!',
                                rep.message,
                                'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    } 
                                    })
                                
                            }else{
                                document.body.removeChild(div)
                                Swal.fire(
                                    'Erreur!!!',
                                    rep.message,
                                    'error'
                                    )
                                }
                        },
                        statusCode: {
                            500: function() {
                                document.body.removeChild(div)
                            }
                        },
                        error: function (rep) {
                            // consolo.log(rep)
                            document.body.removeChild(div)
                        }
                    }
                ), 10000);
            })
    
    });
    </script>