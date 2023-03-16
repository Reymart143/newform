@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="reg-form">

            <!--HEADER-->
            <div class="form-header mb-3">
              <h1>Registration Form</h1>
            </div>
            
            <!--BODY-->
            <div class="form-body">

                <!--ACCOUNT INFORMATION-->
                <label class="font-normal mb-3 mt-3"><i class="fa-solid fa-circle-user"></i> Account Information</label>

                <!-- username -->
                <div class="form-group">
                  <label for="username" class="label-title"><i class="fa-solid fa-user-large"></i> Username</label>
                  <input type="text" class="form-input" id="username" name="username"
                  placeholder="Enter username" required>
                </div>

                <!-- confirm pass && password-->
                <div class="horizontal-group mb-7">
                    <div class="form-group left">    
                      <label for="password" class="label-title"><i class="fa-solid fa-lock"></i> Password</label>
                      <input type="password" class="form-input" id="password" name="password"
                      placeholder="Enter password">
                    </div>
                    <div class="form-group right">
                      <label for="password_confirmation" class="label-title"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                      <input type="password" class="form-input" id="password_confirmation" name="password_confirmation" 
                      placeholder="Re-type password">
                    </div>
                </div>           

                <!--PERSONAL INFORMATION-->
                <label class="font-normal mb-3 mt-4"><i class="fa-solid fa-circle-user"></i>   Personal Details</label>

                <!--name-->
                <div class="form-group">
                  <label for="name" class="label-title"><i class="fa-solid fa-user"></i> Full Name</label>
                  <input type="text" class="form-input" id="name" name="name" placeholder="Enter your name"  required>
                </div>

                <!--birthdate &&  gender-->
                <div class="horizontal-group">
                  <div class="form-group left">
                    <label for="birthdate" class="label-title"><i class="fa-solid fa-cake-candles"></i> Birthdate</label>
                    <input type="date" class="form-input" id="birthdate" name="birthdate" required>
                  </div>

                  <div class="form-group right">
                    <label for="gender-container" class="label-title mb-2"><i class="fa-solid fa-venus-mars"></i> Gender</label>
                      <div class="input-group" id="gender-container" required="required">
                        <div>
                          <input class="form-check-input mb-2" type="radio" name="gender" id="male" value="male" style="margin-left:2mm">
                          <label class="form-check-label" for="gender">Male</label>
                        </div>
                        <div>
                          <input class="form-check-input" type="radio" name="gender" id="female" value="female" style="margin-left:3mm">
                          <label class="form-check-label" for="gender">Female</label>
                        </div>                                    
                      </div>
                  </div>                     
                </div>
          
                <!--phone number && bloodtype-->
                <div class="horizontal-group">
                  <div class="form-group left">
                    <label for="number" class="label-title"><i class="fa-solid fa-phone"></i> Phone Number</label>
                    <input type="string" class="form-input" id="number" name="number"
                    placeholder="Enter your phone number"  required>
                  </div>

                  <div class="form-group right">
                    <label for="bloodtype-container" class="label-title"><i class="fa-solid fa-kit-medical"></i> Blood Type</label>
                      <div id="bloodtype-container">
                        <select id="bloodtype" class="form-input" aria-label="Default select example"  required>
                            <option selected value="0">Select Blood Type</option>
                            <option value="0">Type O</option>
                            <option value="A">Type A</option>
                            <option value="B">Type B</option>
                            <option value="AB">Type AB</option>
                        </select> 
                      </div>                          
                  </div>                     
                </div>

                  <!--address-->
                <div class="form-group">
                  <label for="address-container" class="label-title"><i class="fa-solid fa-house"></i> Address</label>
                    <div id="address-container">
                      <select id="region" class="form-input mb-3" aria-label="Default select example" required>
                          <option selected value="0">Select Region</option>
                          <option value="Region I">Region I</option>
                          <option value="Region II">Region II</option>
                          <option value="Region V">Region V</option>
                          <option value="Region X">Region X</option>
                      </select> 
                      <select id="province" class="form-input mb-3" aria-label="Default select example" required>
                          <option selected value="0">Select Province</option>
                          <option value="Misamis Oriental">Misamis Oriental</option>
                          <option value="Misamis Occidental">Misamis Occidental</option>
                          <option value="Bukidnon">Bukidnon</option>
                          <option value="Bulacan">Bulacan</option>
                      </select> 
                      <select id="city" class="form-input mb-3" aria-label="Default select example" required>
                          <option selected value="0">Select City</option>
                          <option value="Cagayan de Oro">Cagayan de Oro</option>
                          <option value="Oroquieta">Oroquieta</option>
                          <option value="Don Carlos">Don Carlos</option>
                          <option value="Malolos">Malolos</option> 
                      </select> 
                      <select id="barangay" class="form-input mb-3" aria-label="Default select example" required>
                        <option selected value="0">Select Barangay</option>
                        <option value="Bulua">Bulua</option>
                        <option value="Iponan">Iponan</option>
                        <option value="Sinungguyan">Sinungguyan</option>
                        <option value="Kauswagan">Kauswagan</option> 
                    </select> 
                        <input type="text" class="form-input" id="purok" name="purok"
                        placeholder="Enter Purok"> 
                    </div>                          
                </div>

                <!--User Validation-->
                <label class="font-normal mb-3 mt-4"><i class="fa-solid fa-address-card"></i> User Validation</label>
                <div class="form-group" >
                  <label for="choose-file" class="label-title">Upload Profile Picture with your Valid ID</label>
                    <div>
                      <input type="file" id="choose-file" size="80" class="mb-3">
                    </div>
                </div>
          
                <!--Reg button-->
                <div class="mt-3 mb-4">
                    <button type="button" id="submit-btn" class="button submit-btn">Register</button>
                </div>
              
                <!--Get Current Location-->
                <label class="font-normal mb-3 mt-3"><i class="fa-solid fa-location-dot"></i> Get Current Location</label>
                  <div>
                    <label class="mb-3" style="font-weight: bold; color:black;">Instruction: 
                      <span style="color: #ba1b1b; font-weight:normal;">Click the Map to locate your current location!</span>
                    </label>
                  </div>

            </div>

              <!--FOOTER-->
              <div class="form-footer">
                <div>
                  <p>Already have an account? <a href="{{ route('login') }}">Click here to Login</a></p>
                </div>
              </div>
          </form>
        </div>
    </div>
</div>
@endsection
