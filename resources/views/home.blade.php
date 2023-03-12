@extends('layouts.app')

@section('content')
<div class="container">
     @if (Auth::user()->role==1)
    <div class="row">
        <div class="col-12 table-responsive">
            <br/>
            <div align ="right">
                <button type="button" name="create_record" id="create_record" class="btn btn-success"> <i class="bi bi-plus-square"></i>Add New User </button>
        </div>
    <br />
       
             <table class="table table-striped table-bordered " id="user_datatable">
            <thead>
                <tr>   
                    <th>Uploaded Photo</th>
                    <th>Full name</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Blood Type</th>
                    <th>Gender</th>
                    <th>Region</th>
                    <th>Province</th>
                    <th>Municipality</th>
                    <th>Barangay</th>
                    <th>Purok</th>
                    <th>Username</th>
                    <th width="180px">Action</th>
                    <th width="50px"><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs">Delete all check User</button></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
       
       
        </div>
    </div>
    @else
    <!--USER PROFILE -->
   
                  <div class="row">
                  <div class="col-md-9">
                    <div class="card">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Personal Information</a></li>
                        </ul>
                      </div><!-- /.card-hder -->

                      <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="personal_info">
                            <h1> NAME: {{ Auth::user()->name }} </h1>
                    
                            <h1> PHONE NUMBER: {{ Auth::user()->number }} </h1>
                            <h1> Age: {{ Auth::user()->age }} </h1>
                            <h1> BLOOD TYPE: {{ Auth::user()->bloodtype }} </h1>
                            <h1> REGION: {{ Auth::user()->region }} </h1>
                            <h1> PROVINCE: {{ Auth::user()->province }} </h1>
                            <h1> MUNICIPALITY: {{ Auth::user()->municipality }} </h1>
                            <h1> BARANGAY: {{ Auth::user()->barangay }} </h1>
                            <h1> PUROK: {{ Auth::user()->purok }} </h1>
                            <h1> USERNAME: {{ Auth::user()->username }} </h1>
                            <h1> PASSWORD: {{ Auth::user()->hashed }} </h1>
                        
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                             EDIT PROFILE
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                             <form>
                              <span id="form_result"></span>
                                        <div class="mb-3">
                                          <label for="name" class="form-label">Full Name</label>
                                          <input type="text" class="form-control" id="name" placeholder="your name" value="{{ Auth::user()->name }}" name="name">
                                        </div>
                                        <div class="mb-3">
                                          <label for="birthdate" class="form-label">Birthdate</label>
                                          <input type="text" class="form-control" id="age" placeholder="your age" value="{{ Auth::user()->birthdate }}" name="birthdate">
                                        </div>
                                      <h1> Age: {{ Auth::user()->age }} </h1>
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
                                          <input type="text" class="form-control" id="number" placeholder="your age" value="{{ Auth::user()->number }}" name="number">
                                        <div class="mb-3">
                                          <label for="bloodtype-container" class="form-label">Blood Type</label>
                                          <div id="bloodtype-container" value="{{ Auth::user()->bloodtype }}" name="bloodtype">
                                              <select id="bloodtype" class="form-select"aria-label="Default select example">
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
                                            <input type="text" name="barangay" id="barangay" class="form-control p-2" placeholder="{{ __('Barangay') }}" value="{{ Auth::user()->barangay }}"required style="border:solid 1px #d9d8d9; border-radius: 3px;">
                                          </div>
                                        <div class="mb-3">
                                          <label for="purok" class="form-label">Purok</label>
                                          <input type="text" class="form-control" id="purok" placeholder="your purok" value="{{ Auth::user()->purok }}" name="purok">
                                        <div class="mb-3">
                                          <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="your username" value="{{ Auth::user()->username }}" name="username">
                                        </div>
                                          <!--take photo -->
                                          <div class="mb-3">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="image" value="{{ Auth::user()->image }}"name="image">
                                            <input type="hidden" name="image" class="image-tag">
                                          </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <input type="submit" name="submit-btn" id="submit-btn" value="save changes" class="btn btn-info" />
                                          
                                        </div>
                                  </div>
                              </form>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
              <script>
              $('#sample_form').on('submit', function(event){
                      event.preventDefault(); 
                      var action_url = '';
              
                      if($('#action').val() == 'Add')
                      {
                          action_url = "{{ route('users.store') }}";
                      }
              
                      if($('#submit-btn').val() == 'Edit')
                      {
                          action_url = "{{ route('users.update') }}";
                      }
              
                      $.ajax({
                          type: 'post',
                          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                          url: action_url,
                          data:$(this).serialize(),
                          dataType: 'json',
                          success: function(data) {
                              console.log('success: '+data);
                              var html = '';
                              if(data.errors)
                              {
                                  html = '<div class="alert alert-danger">';
                                  for(var count = 0; count < data.errors.length; count++)
                                  {
                                      html += '<p>' + data.errors[count] + '</p>';
                                  }
                                  html += '</div>';
                              }
                              if(data.success)
                              {
                                  html = '<div class="alert alert-success">' + data.success + '</div>';
                                  $('#sample_form')[0].reset();
                                  $('#user_datatable').DataTable().ajax.reload();
                              }
                              $('#form_result').html(html);
                          },
                          error: function(data) {
                              var errors = data.responseJSON;
                              console.log(errors);
                          }
                      });
                });

              $(document).on('click', '.edit', function(event){
                      event.preventDefault(); 
                      var id = $(this).attr('id'); 
                      $('#form_result').html('');
              
                      
              
                      $.ajax({
                          url :"/users/edit/"+id+"/",
                          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                          dataType:"json",
                          success:function(data)
                          {
                              $('#name').val(data.result.name);
                              $('#username').val(data.result.username);
                              $('#number').val(data.result.number);
                              $('#birthdate').val(data.result.birthdate);
                              $('#bloodtype').val(data.result.bloodtype);
                              $('#region').val(data.result.region);
                              $('#province').val(data.result.province);
                              
                              $('#municipality').val(data.result.municipality);
                              $('#barangay').val(data.result.barangay);
                              $('#purok').val(data.result.purok);
                              
                              $('#hidden_id').val(id);
                              $('.modal-title').text('Edit Record');
                              $('#submit-btn').val('Update');
                              $('#action').val('Edit'); 
                              
                              $('#formModal').modal('show');
                          },
                          error: function(data) {
                              var errors = data.responseJSON;
                              console.log(errors);
                          }
                      })
                  });
              
                  var user_id;
                  </script>

              @endif
                  <!-- Modal -->
                  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <form>
                          <div class="modal-header">
                              <h5 class="modal-title" id="ModalLabel">Add New User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <span id="form_result"></span>
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
                                      <label for="password" class="form-label">password</label>
                                      <input type="password" class="form-control" id="password" name="password"
                                      placeholder="Enter your password">
                                    </div>
                                      <!--take photo -->
                                      <div class="mb-3">
                                        <label for="image" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        <input type="hidden" name="image" class="image-tag">
                                      </div>
                                    
                              <input type="hidden" name="action" id="action" value="Add" />
                              <input type="hidden" name="hidden_id" id="hidden_id" />
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" name="submit-btn" id="submit-btn" value="Add" class="btn btn-info">Update</button>
                          </div>
                      </form>  
                      </div>
                      </div>
                  </div>
                  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <form>
                          <div class="modal-header">
                              <h5 class="modal-title" id="ModalLabel">Confirmation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                          </div>
                          </form>  
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

    var table = $('#user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [  
           {data: 'image', name: 'image',
                render: function (data, type, row) {
                    var image = '<img src="{{ asset("storage/:image") }}" alt class="w-75 square  "/>';
                    image = image.replace(':image', data);
                    return image;
                }
            },
            {data: 'name', name: 'name'},
            {data: 'birthdate', name: 'birthdate'},
            {data: 'age', name: 'age'},
            {data: 'number', name: 'number'},
            {data: 'bloodtype', name: 'bloodtype'},
            {data: 'gender', name: 'gender'},
            {data: 'region', name: 'region'},
            {data: 'province', name: 'province'},
            {data: 'municipality', name: 'municipality'},
            {data: 'barangay', name: 'barangay'},
            {data: 'purok', name: 'purok'},
            {data: 'username', name: 'username'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'checkbox', name: 'checkbox', orderable:false, searchable:false},
            
        ]
    });

    $('#create_record').click(function(){
        $('.modal-title').text('Add New User');
        $('#action_button').val('Add');
        $('#action').val('Add');
        $('#form_result').html('');

        $('#formModal').modal('show');
        $('#submit-btn').text('Create User')
      

    })

    $(document).on('click', '.edit', function(event){
    
              event.preventDefault(); 
        var id = $(this).attr('id');
          
       
        $('#form_result').html('');
        $('#submit-btn').text('Update User')

        $.ajax({
            url :"/users/edit/"+id+"/",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType:"json",
            success:function(data)
            {
                $('#name').val(data.result.name);
                $('#username').val(data.result.username);
                $('#number').val(data.result.number);
                $('#birthdate').val(data.result.birthdate);
                $('#bloodtype').val(data.result.bloodtype);
                // $('#region').val(data.result.region);
                $('#region')
                .val(data.result.region)
                .trigger('change');
                setTimeout(
                function() 
                {
                  $('#province')
                              .val(data.result.province)
                              .trigger('change');
                }, 500);
                setTimeout(
                function() 
                {
                  
                $('#municipality')
                .val('Santa Monica')
                .trigger('change');
                }, 1000);
              // $('#province')
                // .val('Antique')
                // .trigger('change');
                // $('#municipality')
                // .val(data.result.municipality)
                // .trigger('change');
                $('#barangay').val(data.result.barangay);
                
                $('#purok').val(data.result.purok);
                $('#hidden_id').val(id);
                $('.modal-title').text('Edit Record');
                $('#submit-btn').val('Update');
                $('#action').val('Edit'); 
                $('#formModal').modal('show');
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        })
    });
 
    
    var user_id;

    $(document).on('click', '.delete', function(){
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
        
    });
 
    $('#ok_button').click(function(){
        $.ajax({
            url:"users/destroy/"+user_id,
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(data)
            {
                $('#confirmModal').modal('hide');
                $('#user_datatable').DataTable().ajax.reload();
                alert('Data Deleted');
                $('#ok_button').text('Ok');
            }
        })
    });

    $(document).on('click', '#bulk_delete', function(){
        var id = [];
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $('.users_checkbox:checked').each(function(){
                id.push($(this).val());
            });
            if(id.length > 0)
            {
                $.ajax({
                    url:"{{ route('users.removeall')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        console.log(data);
                        $('#user_datatable').DataTable().ajax.reload();
                        alert(data); 
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            }
            else
            {
                alert("Please select atleast one checkbox");
            }
        }
    });

</script>
@endsection

