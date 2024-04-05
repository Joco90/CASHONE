<div class="modal fade nouveau" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nouveau code comptable</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
    </div>
    <form id="code-form" method="POST">
        <div class="modal-body">
        
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="position-relative mb-3">
                            <label class="form-label" for="code">Code </label>
                            <input  name="code" id="code" maxlength="4" minlength="4"
                                placeholder="Code profile"
                                type="text" class="form-control">
                                <small class="form-text text-muted" id="codeerror"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative mb-3">
                            <label class="form-label" for="libelle">Libellé (*)</label>
                            <input name="libelle" id="libelle"
                                placeholder="description du profile"
                                type="text" class="form-control">
                                <small class="form-text text-muted" id="libelleerror"></small>
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
            <button type="submit" id="enregistrer-code-comptable"  class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
</div>
</div>


<script src="{{asset('/assets/js/jquery-3.3.1.min.js')}}"></script>
    
    <script>
    
    $(document).ready(function()
    {
    
    
    
  

    

    
             $('#enregistrer-code-comptable').click(function (e)
              {
                //  alert($('#contrat').prop('files'));
                e.preventDefault()
                // $('#modal-transfert-ria').modal('hide')
    
    
                if (!$('input[name=code]').val()) {
                 
                    $('#codeerror').html('<span style="color:red;">Le code est obligatoire</span>');
                 return false;   
                }else{
                    $('#codeerror').html('');
    
                }
                if (!$('input[name=libelle]').val()) {
                    $('#libelleerror').html('<span style="color:red;">Le libellé est obligatoire</span>');
                 return false;   
                }else{
                    $('#libelleerror').html('');
    
                }
    
              
                console.log("okk");
    
    
    
                let formData = new FormData($('#code-form')[0]);
               
    
               
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
                        url: "{{url('code-operation/nature-comptable')}}",
                        method: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (rep) {
                        console.log(rep);
    
    
                            if(rep.code === "200" || rep.code === 200){
                                document.body.removeChild(div)
                                $("#code-form")[0].reset();
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