@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form>
                     
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
                          <div class="mb-3">
                            <label for="address-container" class="form-label">Address</label>
                            <div id="address-container">
                                 <select id="region" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select Region</option>
                                <option value="2">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option>
                              </select> 
                              <select id="province" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select Province</option>
                                <option value="1">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option>
                              </select> 
                              <select id="city" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select City</option>
                                <option value="1">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option>
                              </select> 
                              <select id="barangay" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select Barangay</option>
                                <option value="1">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option>
                              </select> 
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

                          <button type="button" id="submit-btn" class="btn btn-primary">Save</button>
                       

                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
