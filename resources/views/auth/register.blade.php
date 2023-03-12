@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="reg-form" id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">

            <!--HEADER-->
            <div class="form-header">
              <h1>Registration Form</h1>
            </div>

            <!--multiple step-->
            <div id="multi-step-form-container" style="margin-bottom:0">
              <!-- Form Steps / Progress Bar -->
              <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                  <!-- Step 1 -->
                  <li class="form-stepper-active text-center form-stepper-list" step="1" style="text-decoration: none">
                      <a class="mx-2">
                          <span class="form-stepper-circle">
                              <span>1</span>
                          </span>
                          <div class="label" style="">Account & Personal Details</div>
                      </a>
                  </li>
                  <!-- Step 2 -->
                  <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                      <a class="mx-2">
                          <span class="form-stepper-circle text-muted">
                              <span>2</span>
                          </span>
                          <div class="label text-muted">User Validation Information</div>
                      </a>
                  </li>
              </ul>
            </div>
            
            <!--BODY-->
            <!-- Step Wise Form Content -->
            <div class="form-body">
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                      <label class="font-normal mb-3">Account Information</label>
                      <!-- Step 1 input fields -->

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
                            placeholder="Enter password" required>
                          </div>
                          <div class="form-group right">
                            <label for="confirm-password" class="label-title"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                            <input type="password" class="form-input" id="confirm-password" placeholder="Re-type password" required="required">
                          </div>
                      </div>           

                      <label class="font-normal mb-3">Personal Details</label>
                        <!--name-->
                      <div class="form-group">
                        <label for="name" class="label-title">Full Name</label>
                        <input type="text" class="form-input" id="name" name="name" placeholder="Enter your name"  required>
                      </div>
    
                      <!--birthdate &&  gender-->
                      <div class="horizontal-group">
                        <div class="form-group left">
                          <label for="birthdate" class="label-title">Birthdate</label>
                          <input type="date" class="form-input" id="birthdate" name="birthdate" required>
                        </div>
    
                        <div class="form-group right">
                          <label for="gender-container" class="label-title mb-2">Gender</label>
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
                          <label for="number" class="label-title">Phone Number</label>
                          <input type="string" class="form-input" id="number" name="number"
                          placeholder="Enter your phone number"  required>
                        </div>
    
                        <div class="form-group right">
                          <label for="bloodtype-container" class="label-title">Blood Type</label>
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
                        <label for="address-container" class="label-title">Address</label>
                          <div id="address-container">
                            <select id="region" class="form-input mb-3" aria-label="Default select example" required>
                                <option selected value="0">Select Region</option>
                                <option value="2">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option>
                            </select> 
                            <select id="province" class="form-input mb-3" aria-label="Default select example" required>
                                <option selected value="0">Select Province</option>
                                <option value="1">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option>
                            </select> 
                            <select id="city" class="form-input mb-3" aria-label="Default select example" required>
                                <option selected value="0">Select City</option>
                                <option value="1">bulua</option>
                                <option value="2">A</option>
                                <option value="3">B</option>
                                <option value="3">AB</option> 
                            </select> 
                            <select id="barangay" class="form-input mb-3" aria-label="Default select example" required>
                              <option selected value="0">Select Barangay</option>
                              <option value="1">bulua</option>
                              <option value="2">A</option>
                              <option value="3">B</option>
                              <option value="3">AB</option> 
                          </select> 
                              <input type="text" class="form-input" id="purok" name="purok"
                              placeholder="Enter Purok"> 
                          </div>                          
                      </div>
                  
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                </section>

                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                  <h3 class="font-normal">Take a Photo!</h3>
                    <!-- Step 2 input fields -->

                    <!--TAKING PICTURE-->
                   <!-- <div class="row">
                      <div class="col-md-6">
                          <div style="border-radius: 15px; border: solid 1px #a4a4a4; padding: 20px;">
                              <div id="my_camera" style="border-radius: 15px;"></div>
                          </div>
                          <br/>
                          <input type="hidden" name="image" class="image-tag">
                      </div>
                      <div class="col-md-6">
                          <div id="results" style="border-radius: 15px; border: solid 1px #a4a4a4; padding: 20px;">Captured Image will display here</div>
                      </div>
                      <div style="col-md-15 text-center" class="log-btn">
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                      </div>
                    </div>

                    <script language="JavaScript">
                      Webcam.set({
                          width: 195,
                          height: 180,
                          image_format: 'jpeg',
                          jpeg_quality: 90
                      });
                      
                      Webcam.attach( '#my_camera' );
                      
                      function take_snapshot() {
                          Webcam.snap( function(data_uri) {
                              $(".image-tag").val(data_uri);
                              document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                          } );
                      }
                  </script> -->

                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button type="button" id="submit-btn" class="button submit-btn">Register</button>
                    </div>
              </section>
            </div>

            <div class="form-footer">
              <div>
                <p>Already have an account? <a href="{{ route('login') }}">Click here to Login</a></p>
              </div>
            </div>
        </form>
           <!-- <form class="reg-form"> -->

              <!--FORM HEADER
              <div class="form-header">
                <h1><i class="fa-solid fa-file-pen"></i> Registration Form</h1>
              </div>-->

              <!--FORM BODY-->
             <!-- <div class="form-body"> -->
                  <!-- username && password-->
                 <!-- <div class="horizontal-group">
                    <div class="form-group left">
                      <label for="username" class="label-title"><i class="fa-solid fa-user-large"></i> Username</label>
                      <input type="text" class="form-input" id="username" name="username"
                      placeholder="Enter username" required>
                    </div>
                    <div class="form-group right">    
                      <label for="password" class="label-title"><i class="fa-solid fa-lock"></i> Password</label>
                      <input type="password" class="form-input" id="password" name="password"
                      placeholder="Enter password" required>
                    </div>
                  </div>  -->
                  

                  <!--name-->
                 <!-- <div class="form-group">
                    <label for="name" class="label-title">Full Name</label>
                    <input type="text" class="form-input" id="name" name="name" placeholder="Enter your name"  required>
                  </div> -->

                  <!--birthdate &&  gender-->
                 <!-- <div class="horizontal-group">
                    <div class="form-group left">
                      <label for="birthdate" class="label-title">Birthdate</label>
                      <input type="date" class="form-input" id="birthdate" name="birthdate" required>
                    </div>

                    <div class="form-group right">
                      <label for="gender-container" class="label-title mb-2">Gender</label>
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
                  </div> -->
            
                  <!--phone number && bloodtype-->
                  <!--<div class="horizontal-group">
                    <div class="form-group left">
                      <label for="number" class="label-title">Phone Number</label>
                      <input type="string" class="form-input" id="number" name="number"
                      placeholder="Enter your phone number"  required>
                    </div>

                    <div class="form-group right">
                      <label for="bloodtype-container" class="label-title">Blood Type</label>
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
                  </div> -->

                    <!--address-->
                  <!--<div class="form-group">
                    <label for="address-container" class="label-title">Address</label>
                      <div id="address-container">
                        <select id="region" class="form-input mb-3" aria-label="Default select example" required>
                            <option selected value="0">Select Region</option>
                            <option value="2">bulua</option>
                            <option value="2">A</option>
                            <option value="3">B</option>
                            <option value="3">AB</option>
                        </select> 
                        <select id="province" class="form-input mb-3" aria-label="Default select example" required>
                            <option selected value="0">Select Province</option>
                            <option value="1">bulua</option>
                            <option value="2">A</option>
                            <option value="3">B</option>
                            <option value="3">AB</option>
                        </select> 
                        <select id="city" class="form-input mb-3" aria-label="Default select example" required>
                            <option selected value="0">Select City</option>
                            <option value="1">bulua</option>
                            <option value="2">A</option>
                            <option value="3">B</option>
                            <option value="3">AB</option> 
                        </select> 
                        <select id="barangay" class="form-input mb-3" aria-label="Default select example" required>
                          <option selected value="0">Select Barangay</option>
                          <option value="1">bulua</option>
                          <option value="2">A</option>
                          <option value="3">B</option>
                          <option value="3">AB</option> 
                      </select> 
                          <input type="text" class="form-input" id="purok" name="purok"
                          placeholder="Enter Purok"> 
                      </div>                          
                  </div>
              </div> -->
              
              <!--FORM FOOTER 
              <div class="form-footer">-->
              <!--<button type="button" id="submit-btn" class="reg-btn">Register</button> 
                  <div>
                    <p>Already have an account? <a href="{{ route('login') }}">Click here to Login</a></p>
                  </div>
              </div>             
            </form> -->
        </div>
    </div>
</div>
  <script>
      /**
    * Define a function to navigate betweens form steps.
    * It accepts one parameter. That is - step number.
    */
    const navigateToFormStep = (stepNumber) => {
    /**
    * Hide all form steps.
    */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
      formStepElement.classList.add("d-none");
    });
    /**
    * Mark all form steps as unfinished.
    */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
      formStepHeader.classList.add("form-stepper-unfinished");
      formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
    * Show the current form step (as passed to the function).
    */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
    * Select the form step circle (progress bar).
    */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
    * Mark the current form step as active.
    */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
    * Loop through each form step circles.
    * This loop will continue up to the current step number.
    * Example: If the current step is 3,
    * then the loop will perform operations for step 1 and 2.
    */
    for (let index = 0; index < stepNumber; index++) {
      /**
       * Select the form step circle (progress bar).
       */
      const formStepCircle = document.querySelector('li[step="' + index + '"]');
      /**
       * Check if the element exist. If yes, then proceed.
       */
      if (formStepCircle) {
          /**
           * Mark the form step as completed.
           */
          formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
          formStepCircle.classList.add("form-stepper-completed");
      }
    }
    };
    /**
    * Select all form navigation buttons, and loop through them.
    */
    document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
    * Add a click event listener to the button.
    */
    formNavigationBtn.addEventListener("click", () => {
      /**
       * Get the value of the step.
       */
      const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
      /**
      * Call the function to navigate to the target form step.
      */
      navigateToFormStep(stepNumber);
    });
    });
  </script>
@endsection
