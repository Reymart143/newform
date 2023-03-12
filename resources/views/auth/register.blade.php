@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data">
                      @csrf
                     <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                          </div>
                          <div class="mb-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate">
                          </div>
                          <div class="mb-3">
                            <label for="gender-container" class="form-label">Gender</label>
                            <div id="gender-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="gender">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                                    <label class="form-check-label" for="gender">
                                      Female
                                    </label>
                                  </div>
                            </div>
                           
                          </div>
                          <div class="mb-3">
                            <label for="number" class="form-label">Phone Number</label>
                            <input type="integer" class="form-control" id="number" name="number"
                            placeholder="Enter your phone number">
                          </div>
                          <div class="mb-3">
                            <label for="bloodtype-container" class="form-label">Blood Type</label>
                            <div id="bloodtype-container">
                                 <select id="bloodtype" class="form-select" aria-label="Default select example">
                                <option selected>Select BLoodtype</option>
                                <option value="0">Type O</option>
                                <option value="A">Type A</option>
                                <option value="B">Type B</option>
                                <option value="AB">Type AB</option>
                              </select> 
                            </div>
                          
                          </div>
                          
                         
                <div class="input-group mt-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">Address_Region</i>
                      </span>
                  </div>
                  <select class="form-control" name="region" id="region" on="getProvince(this);" style="max-width: 45% !important; border:solid 1px #d9d8d9; border-radius: 3px;" onchange="getProvince(this);">
                    @if($region->count()>0)
                    @foreach($region as $r)
                       <option value="{{$r->region}}">{{$r->region}}</option>
                    @endforeach
                    @endif
                </select>
                </div>

                <div class="input-group mt-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">Address_Province</i>
                      </span>
                  </div>
                  <select name="province" class="form-control" id="province" style="max-width: 50% !important; border:solid 1px #d9d8d9; border-radius: 3px;" onchange="getMunicipality(this);">
                      <option value=""></option>
                  </select>
                </div>

                <div class="input-group mt-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">Address_Municipality</i>
                      </span>
                  </div>
                  <select name="municipality" class="form-control" id="municipality" style="max-width: 50% !important; border:solid 1px #d9d8d9; border-radius: 3px;">
                      <option value=""></option>
                  </select>
                </div>

                <div class="input-group mt-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">Address_Barangay</i>
                      </span>
                  </div>
                    <input type="text" name="barangay" id="barangay" class="form-control p-2" placeholder="{{ __('Barangay') }}" value="{{ old('name') }}" required style="border:solid 1px #d9d8d9; border-radius: 3px;">
                  </div>
                          
                          </div>
                          <div class="mb-3">
                            <label for="purok" class="form-label">Purok</label>
                            <input type="text" class="form-control" id="purok" name="purok"
                            placeholder="Enter your purok">
                          </div>


                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter your username">
                          </div>
                          <div class="mb-3">    
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                          </div>
                          <!--take photo -->
                          <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <input type="hidden" name="image" class="image-tag">
                          </div>

                          <button type="button" id="submit-btn" class="btn btn-primary">Save</button>
                       

                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function getProvince(pl){
        var reg = (pl.value || pl.options[pl.selectedIndex].value);

        $.ajax({
                url: "{{ url('/province-list/provinces') }}/"+reg,
                context: document.body,
                success: function(data){
                  console.log(data);

                    $('#province').find('option').remove();
                    $.each(data.data, function(key, value) {
                            
                            $('#province').append(`<option value="${value.province}">${value.province}</option>`);
                        
                    });


                    var e = document.getElementById("province");
                    var strProvince = e.value;

                    $.ajax({
                        url: "{{ url('/municipalities-list/municipality') }}/"+strProvince,
                        context: document.body,
                        success: function(mun){
                            console.log(mun);
                            $('#municipality').find('option').remove();
                            $.each(mun.data, function(key, value) {
                                    
                                    $('#municipality').append(`<option value="${value.municipality}">${value.municipality}</option>`);
                                    
                                
                            });
                        }

                        
                    });
              
                }

        });
    };

    function getMunicipality(pl){
        var prov = (pl.value || pl.options[pl.selectedIndex].value);

        $.ajax({
                url: "{{ url('/municipalities-list/municipality') }}/"+prov,
                context: document.body,
                success: function(data){
                  console.log(data);

                    $('#municipality').find('option').remove();
                    $.each(data.data, function(key, value) {
                            
                            $('#municipality').append(`<option value="${value.municipality}">${value.municipality}</option>`);
                    });
                    setTimeout(addr_search, 1500);
                }
        });
    };

    $(function () {
        $("select#region").change();
    });
</script>
@endsection


