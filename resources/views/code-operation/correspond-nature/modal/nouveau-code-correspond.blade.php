<div class="modal fade nouveau-correspondance" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nouveau code Correspondance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
    </div>
    <form id="code-form" method="POST">
        <div class="modal-body">
        
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        {{-- <div class="position-relative mb-3">
                            <label class="form-label" for="code">Code </label>
                            <select multiple="multiple" class="multiselect-dropdown form-control">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                           
                                <small class="form-text text-muted" id="codeerror"></small>
                        </div> --}}
                        <div class="card-body">
                            <h5 class="card-title">Select2 Bootstrap 5 Multiple</h5>
                              <select id="mySelect" multiple="multiple">
        <!-- Options seront ajoutées dynamiquement -->
    </select>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative mb-3">
                            <label class="form-label" for="code">Phrase </label>
                            <input  name="code" id="code" maxlength="4" minlength="4"
                                placeholder="Code profile"
                                type="text" class="form-control">
                                <small class="form-text text-muted" id="codeerror"></small>
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
    
    $(document).ready(function(){
    
        
        
        // $("#code_nature").autocomplete({
        //         source: function(request, response) {
        //             $.ajax({
        //                 url: "{{ url('code-operation/recherch-code-compta') }}",
        //                 dataType: "json",
        //                 type: "POST",
        //                 data: {
        //                     code: request.term,
        //                     _token: $('meta[name="csrf-token"]').attr('content')
        //                 },
        //                 success: function(reponse) {
        //                     console.log(reponse.data);
        //                     var options = $.map(reponse.data, function(item) {
        //                         return {
        //                             label: item.code_cn, // Le texte à afficher
        //                             value: item.libelle // La valeur associée à l'option
        //                         };
        //                     });
        //                     response(options);
        //                 }
        //             });
        //         },
        //         minLength: 2 // Nombre minimum de caractères avant que la recherche ne soit déclenchée
        //     });

    $("#code_nature").on('keyup', function() {
   console.log('okokkk');
    });

    
    $('#enregistrer-code-comptable').click(function (e) {
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
