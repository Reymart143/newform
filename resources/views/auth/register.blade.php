@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if($errors)
@foreach ( $errors->all() as $errors )
    <li style="color:red">
        @{{ $errors }}
    </li>
@endforeach
@endif
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="reg-form" {{-- style= "height: 500px; overflow-y: scroll; margin-top:-2px;" --}}>

            <!--HEADER-->
          
            <div class="form-header mb-3">
              <h1>Registration Form</h1>
            </div>
            
            <!--BODY-->
            <div class="form-body">

              <div>
                <p>Already have an account? <a href="{{ route('login') }}">Login here!</a></p>
              </div>
        
                <!--ACCOUNT INFORMATION-->
                <label class="font-normal mb-3 mt-3"><i class="fa-solid fa-circle-user"></i> Account Information</label>
            
                <!-- username -->
                <div class="form-group">
                  <label for="username" class="label-title"><i class="fa-solid fa-user-large"></i> Username</label>
                  <input type="text" class="form-input" id="username" name="username" @error('username') is-invalid @enderror"
                  placeholder="Enter username" required>
                  @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <!-- confirm pass && password-->
                <div class="horizontal-group mb-7">
                    <div class="form-group left">    
                      <label for="password" class="label-title"><i class="fa-solid fa-lock"></i> Password</label>
                      <input type="password" class="form-input" id="password" name="password"
                       placeholder="Enter password">
                      <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px;
                       cursor: pointer;"></i>
                    </div>
                    <div class="form-group right">                 
                      <label for="password_confirmation" class="label-title"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                      <input type="password" class="form-input" id="password_confirmation" name="password_confirmation" 
                      placeholder="Re-type password">
                      <i class="bi bi-eye-slash" id="togglePassword_confirmation" style="margin-left: -30px;
                            cursor: pointer;"></i>
                    </div>
                </div>
                
                <!--PERSONAL INFORMATION-->
                <label class="font-normal mb-3 mt-4"><i class="fa-solid fa-circle-user"></i>   Personal Details</label>

                <!--name-->
                <div class="form-group">
                  <label for="name" class="label-title"><i class="fa-solid fa-user"></i> {{ __('Name') }}</label>
                  <input type="text" class="form-input @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
                  <label for="number" class="label-title"><i class="fa-solid fa-location-dot"></i> Address</label>
                  <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">Region</i>
                        </span>
                    </div>
                        <select class="form-control" name="region" id="region" on="getProvince(this);" style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;" onchange="getProvince(this);">
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
                          <i class="material-icons">Province</i>
                        </span>
                    </div>
                     <select name="province" class="form-control" id="province" style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;" onchange="getMunicipality(this);">
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">Municipality</i>
                        </span>
                    </div>
                    <select name="municipality" class="form-control" id="municipality" style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;" onblur="addr_search_municipal();">
                        <option value=""></option>
                    </select>
                  </div>
                  <div class="input-group mt-2">
                    <label class="mb-1" style="font-weight: bold; color:black;">Instruction: 
                      <span style="color: #ba1b1b; font-weight:normal;">Find your barangay in map below and click the map!</span>
                    </label>
                </div>

                  <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons"  style="padding-bottom: 4px">Barangay</i>
                        </span>
                    </div>
                      <input type="text" name="barangay"  id="barangay" class="form-control p-2" placeholder="{{ __('Barangay') }}" value="{{ old('name') }}" required style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;">
                  </div>
                  <div class="form-group mt-2">
                    <input type="text" class="form-input @error('purok') is-invalid @enderror" id="purok" name="purok" placeholder="Enter your purok"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('purok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                <!--User Validation-->
                <label class="font-normal mb-3 mt-4"><i class="fa-solid fa-address-card"></i> User Validation</label>
                  <div>
                    <label class="mb-1" style="font-weight: bold; color:black;">Instruction: 
                      <span style="color: #ba1b1b; font-weight:normal;">Upload your photo with your valid ID!</span>
                    </label>
                  </div>
                  <div class="form-group">
                      <input type="file" class="form-control" id="image" name="image">
                      <input type="hidden" name="image" class="image-tag">
                  </div>
                  <div class="tacbox" style="text-align: center;">
                    <input id="checkbox" name="checkbox" id="option" type="checkbox" required/>
                    I agree to these<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-link">Terms and Conditions </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header" >
                            <h1 class="modal-title fs-5" id="exampleModalLabel" >TERMS AND CONDITIONS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="text-align:justify;">
                    
                            10.2 Use; Disclosure. During this the Term and for a period of two (2) years thereafter, each party shall use no less than reasonable care to protect the confidentiality of the other party’s Confidential Information. Neither party may disclose the other party’s Confidential Information to any third party, except as may be required: (1) to implement, perform and enforce the terms of this Agreement; (2) by applicable law; or (3) under appropriate nondisclosure terms to auditors, accounting, financial and legal advisers, or to an existing or potential investor, acquiring company, bank or other financial institution in connection with a merger, acquisition, financing, loan or similar corporate transaction. In no event may the Confidential Information of disclosing party be disclosed to its competitor. The parties acknowledge that they may have in development similar solutions and that nothing in this Agreement is intended to prevent either party from independently developing, offering, supporting and providing similar solutions, provided it is done without use of or reference to the other party’s Confidential Information.
                            
                            10.3 Exceptions. The following shall not be Confidential Information: (a) information that was rightfully in the receiving party’s possession without restriction prior to disclosure; (b) information that was in the public domain at the time of disclosure, or which becomes public domain without breach of this Agreement; (c) information that was rightfully disclosed to receiving party by a third party without restriction; or (d) information that was independently developed or created by the receiving party. Either party may disclose Confidential Information if and to the extent such disclosure is required by law or order of a court or other governmental authority or regulation.
                            
                            10.4 Terms of Agreement Confidential. Each of the parties agrees not to disclose to any third party the terms of this Agreement, including pricing, without the prior written consent of the other party hereto, except to advisors, investors and others on a need-to-know basis under circumstances that reasonably ensure the confidentiality thereof, or to the extent required by law.
                            
                            11. Zero Spam and Offensive Content (for Survey Customers). FORM has a zero-tolerance policy against e-mail ‘spamming’. As a condition of using the Services, Customer agrees to make commercially reasonable efforts to ensure that any email messages Customer sends using the Services abide to requirements of the CAN-SPAM Act and other applicable laws. Customer agrees to verify and update their email recipients list before distributing them with the Services. Customer must review and refine lists that they use for survey or form distribution and remove invalid addresses regularly. FORM reserves the right to monitor Customer’s usage of the Services and suspend Customer’s access to the Services if FORM judges Customer’s usage to be “spamming” or otherwise offensive. In the event that FORM is black-listed by any Mail Service Providers due to Customer’s negligence in their email list maintenance, Customer assumes all liability for FORM’s damages as outlined in Sections 8 and 9.
                            
                            12. General Provisions
                            12.1 Miscellaneous. This Agreement shall inure to the benefit of and be binding on the parties and their respective successors and permitted assigns, but neither party may assign this Agreement without written consent of the other, except that FORM may assign without consent to a related entity or the successor of all or substantially all of the assignor’s business or assets to which this Agreement relates. FORM may provide some elements of the Subscription Service through third party service providers and/or use contractors. Each party is independent of the other, and nothing contained herein shall be deemed or construed to create any partnership, joint venture, agency, fiduciary or other similar relationship. This Agreement is made solely and specifically between and for the benefit of FORM and Customer, and no other person or entity shall have any rights, interests or claims hereunder or be entitled to any benefits under or on account of this Agreement as a third party beneficiary or otherwise. No portion or aspect of the Services shall not be exported or re-exported in violation of any export provisions of the United States or any other applicable jurisdiction. If any provision of this Agreement is determined to be invalid, illegal or unenforceable, such provision shall be eliminated or limited so that this Agreement will remain in full force and effect. No waiver by either party of any breach by the other shall be deemed a waiver of any preceding or subsequent breach. This Agreement (including the Order Form) may be executed in counterparts and/or by facsimile or electronic signature.
                            
                            12.2 Entire Agreement; Order of Precedence. This Agreement incorporates by reference all exhibits, schedules, Order Forms or SOWs. This Agreement, together with such referenced items, along with FORM’s Privacy Policy constitute the entire agreement between Customer and FORM and are intended to be the final and complete understanding of their agreement, superseding all prior or contemporaneous oral or written prior agreements, understandings, negotiations, inducements, course of dealing, communications, conditions, representations, warranties or agreements relating thereto, both written and oral. No terms, provisions or conditions of any purchase order, invoice or other business form or written authorization used by Customer will have any effect on the rights, duties or obligations of the parties under, or otherwise modify, this Agreement or an Order Form, regardless of any failure of FORM to object to such terms, provisions or conditions. The Agreement shall not be amended or modified unless it is mutually agreed in writing. For clarity, Additional Services or Authorized Users outside of the original Order Form will require a written amendment or a change order to the Order Form, or a new Order Form. Customer acknowledges that other terms or agreements provided by FORM may apply if optional services or features are subsequently ordered or activated. Such other terms or agreements will only apply to such optional services or features. In the event of any conflict or inconsistency among the following documents, the order of precedence shall be: (1) the applicable Order Form, (2) this Agreement, and (3) the Related Documentation. Unless expressly agreed by the parties, in the event of any inconsistency or conflict between the terms and conditions of this Agreement and a SOW, the terms and conditions of the SOW shall govern with respect to the subject matter of the SOW only.
                            
                            12.3 Governing Law. The Agreement is governed by the substantive and procedural laws of the State of Massachusetts, except when the Agreement is executed by a FORM entity registered in the UK or otherwise specified in the Order Form, the Agreement is governed by the substantive and procedural laws of the United Kingdom.
                            
                            12.4 Force Majeure. Neither party shall be liable for failure to perform or delay in performing any obligation under this Agreement (except any payment obligations) to the extent resulting from any circumstance outside of such party’s reasonable control, including, but not limited to, acts of nature, disease outbreak, epidemic or pandemic (including the ongoing impact of the COVID-19 coronavirus pandemic), restrictions on transportation or the movement of people or goods (including quarantine and stay-at-home restrictions), natural disaster, fire, strike, act of war, terrorism, embargo, blockade, legal prohibition, governmental action, riot, insurrection, Internet service provider failure or delay, non-FORM application or denial of service attack (individually or collectively, “Force Majeure Event(s)”), provided that such party uses reasonable efforts under the circumstances, to notify the other party of the circumstances causing the delay and to resume performance as soon as possible and any delivery date shall be extended accordingly.
                            
                            12.5 Notices. Any notice required under this Agreement shall be given in writing and shall be deemed effective upon delivery to the party to whom addressed. All notices shall be sent to the applicable address specified on an Order Form or to such other address as the parties may designate in writing. Unless otherwise specified, all notices to FORM, Inc. or Designlogic Ltd. shall be sent to the attention of the CEO at 859 Willard Street, Suite 400, Quincy MA 02169. Any notice of material breach shall clearly define the breach including the specific contractual obligation that has allegedly been breached and the date on which Customer became aware of the alleged breach (failure to provide said date shall be considered defective notice).
                            
                            12.6 Publicity. Each party agrees that the other party may use the name, logo and trademarks (including such party’s Affiliate) in each party’s own marketing materials with prior written consent of the other party unless otherwise agreed.
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
            
              
                <!--Reg button-->
                <div class="mb-4 mt-4">
                  <button type="button" id="submit-btn" class="button submit-btn" >Register</button>
                </div>
                
              
                <!--Get Current Location-->
                <label class="font-normal mb-3 mt-3"><i class="fa-solid fa-location-dot"></i> Get Current Location</label>
                
                <div>
                    <label class="mb-1" style="font-weight: bold; color:black;">Instruction: 
                      <span style="color: #ba1b1b; font-weight:normal;">Click the Map to locate your current location!</span>
                    </label>
                </div>

                <!--Coordinates-->
                <input type="text" name="location" id="location" class="form-control p-2" placeholder="{{ __('Latitude / Longitude') }}" value="{{ old('name') }}" required style="border:solid 1px #d9d8d9; border-radius: 3px;" onchange="checkInput();"> 
              
                <div>
                  <label style="font-style: italic; font-size: 11px; margin-left: 10px; color: #08288b;">Example: 8.42938,124.618446</label>
                </div>

                <!--MAP-->
                <div class="col-md-6 ml-auto mr-auto">
                  <div id="map" style="height: 380px; width: 650px; margin-top: 20px; margin-left: 10px; border: 1px solid #000;"></div>
                </div>
            </div>
          
            <!--FOOTER-->
            <div class="form-footer">
              <div>
                <p>End of the Registration Form</p>
              </div>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- disable button -->

<script>
  
      // Creating map options
      var mapOptions = {
        center: [8.454641620475954, 124.62330811173518],
        zoom: 10
      }

      // Creating a map object
      var map = new L.map('map', mapOptions);

      // Creating a Layer object
      var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

      // Adding layer to the map
      map.addLayer(layer);


      /*
      // Creating a Marker
      var markerOptions = {
      title: "MyLocation",
      clickable: true,
      draggable: true
      }
      // Creating a marker
      var marker = L.marker([17.385044, 78.486671], markerOptions);
            
      // Adding marker to the map
      marker.addTo(map);
      // Icon options
      var iconOptions = {
      iconUrl: 'logo.png',
      iconSize: [50, 50]
      }

      // Creating a custom icon
      var customIcon = L.icon(iconOptions);
      // Creating a Marker
      var marker = L.marker([17.438139, 78.395830], markerOptions);
      // Icon options
      var iconOptions = {
              iconUrl: 'logo.png',
              iconSize: [50, 50]
            }
            // Creating a custom icon
            var customIcon = L.icon(iconOptions);
            
            // Creating Marker Options
            var markerOptions = {
              title: "MyLocation",
              clickable: true,
              draggable: true,
              icon: customIcon
            }        
      
      // Adding marker to the map
      marker.addTo(map);
      // Creating latlng object

      var latlngs = [
              [17.385044, 78.486671],
              [16.506174, 80.648015],
              [17.000538, 81.804034],
              [17.686816, 83.218482]
            ];
            // Creating a poly line
            var polyline = L.polyline(latlngs, {color: 'red'});
            
            // Adding to poly line to map
            polyline.addTo(map); 
            var rectOptions = {color: 'Red', weight: 1}   // Creating rectOptions
          
          // Creating a rectangle
          var rectangle = L.rectangle(latlngs, rectOptions);
          rectangle.addTo(map);   // Adding to rectangle to map
          */

      function addr_search()
      {

      var r = $('#region').val();
      var p = $('#province').val();
      var m = $('#municipality').val();
      var b = $("#barangay").val();

      var xmlhttp = new XMLHttpRequest();
      var url="https://nominatim.openstreetmap.org/search?q="+b+","+m+","+p+","+r+"&format=json&polygon_geojson=1&addressdetails=1";
      xmlhttp.onreadystatechange = function()
      {
        if (this.readyState == 4 && this.status == 200)
        {
          var myArr = JSON.parse(this.responseText);
          searchLocation(myArr);
        }
      };
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
      }

      function addr_search_municipal()
      {

      var r = $('#region').val();
      var p = $('#province').val();
      var m = $('#municipality').val();
      var b = $("#barangay").val();

      //alert(r+"\r\n"+p+"\r\n"+m+"\r\n"+b);

      var xmlhttp = new XMLHttpRequest();
      var url="https://nominatim.openstreetmap.org/search?q="+m+","+p+","+r+"&format=json&polygon_geojson=1&addressdetails=1";
      xmlhttp.onreadystatechange = function()
      {
        if (this.readyState == 4 && this.status == 200)
        {
          var myArr = JSON.parse(this.responseText);
          searchLocation(myArr);
        }
      };
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
      }

      function searchLocation(arr){
      var out = "<br />";
      var i;

      if(arr.length > 0)
      {
        for(i = 0; i < arr.length; i++)
        {
          chooseAddr(arr[0].lat, arr[0].lon);
          lat=arr[0].lat;
          lon=arr[0].lon;
        }

        $('#location').val(lat+','+lon);
      }else{
        Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Not found!',
                      text: 'No result found, trying to search your municipality!',
                      showConfirmButton: false,
                      timer: 2500
                    });
        addr_search_municipal();
      }
      
      }

      function chooseAddr(lat1, lng1)
      {       
      var pointIcon = L.Icon.extend({
          options: {
              iconSize:     [25, 40],
              iconAnchor:   [0, 0],
              popupAnchor:  [8, 0],
            }
        });

            map.setView([lat1, lng1],13);

            try{
              if (lMarker !== null) {
                  map.removeLayer(lMarker);
              }
            }catch (ex){

            }

            
            lMarker = L.marker([lat1, lng1], {icon: startIcon}).bindPopup("<b>"+lat1+","+lng1+"</b>").addTo(map).bounce(5);
            map.addLayer(lMarker);

      }

      var grnIcon = L.Icon.extend({
              options: {
                    iconSize:     [15, 20],
                    iconAnchor:   [0, 0],
                    popupAnchor:  [8, 0]
                }
            });


            var startIcon = new grnIcon({iconUrl: 'https://www.google.com/maps/vt/icon/name=assets/icons/poi/tactile/pinlet_shadow_v3-2-medium.png,assets/icons/poi/tactile/pinlet_outline_v3-2-medium.png,assets/icons/poi/tactile/pinlet_v3-2-medium.png,assets/icons/poi/quantum/pinlet/dot_pinlet-2-medium.png&highlight=ff000000,ffffff,34a853,ffffff?scale=1.25'});
            

      var popup = L.popup();
            var tmploc='';


            function onMapClick(e) {
            popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.toString())
            .openOn(map);
            tmploc=e.latlng.toString();

            var getloc = tmploc.split("(");
            var coor = getloc[1].split(")");
            var ltlng = coor[0].split(",");

            try{
                if (lMarker !== null) {
                    map.removeLayer(lMarker);
                }
              }catch (ex){

              }

            lMarker = L.marker([ltlng[0].trim(), ltlng[1].trim()], {icon: startIcon}).bindPopup("<b>"+ltlng[0].trim()+","+ltlng[1].trim()+"</b>").addTo(map).bounce(5);
            
            $('#location').val(ltlng[0].trim()+","+ltlng[1].trim());

            fetch("https://nominatim.openstreetmap.org/search.php?q="+ltlng[0]+","+ltlng[1]+"&polygon_geojson=1&format=json")
                  .then(response => response.json())
                  .then(j => {

                    var brgy = j[0].display_name.split(",");

                    try{
                      $('#barangay').val(brgy[0]+","+brgy[1])
                    }catch(e){

                    }
              })
          }

          
          map.on('click', onMapClick);

      document.querySelector('input#location').oninput = checkInput;

      function checkInput()
      {
        var clean = this.value.replace(/[^0-9,.]/g, "")
                            .replace(/(,.*?),(.*,)?/, "$1");
      

          Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid Coordinates!',
                html: '<span style="color: #df0000; font-weight:bold;">You have enter invalid Coordinates location</span><br/><br/><span style="color: #df0000;">This is an example:</span> <span style="color: #08288B;"> 8.42938,124.618446</span><br/><br/><span style="color: #08288B;">If you are familiar of the home place of a member, you can click it on the Map and the exact coordinates will automatically place on this input box.</span>',
                showConfirmButton: true,
            });

      }
      </script>
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

<script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  togglePassword.addEventListener("click", function () {
      // toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      
      // toggle the icon
      this.classList.toggle("bi-eye");
  });

  const togglePassword_confirmation = document.querySelector("#togglePassword_confirmation");
  const password_confirmation = document.querySelector("#password_confirmation");

  togglePassword_confirmation.addEventListener("click", function () {
      // toggle the type attribute
      const type = password_confirmation.getAttribute("type") === "password" ? "text" : "password";
      password_confirmation.setAttribute("type", type);
      
      // toggle the icon
      this.classList.toggle("bi-eye");
  });

</script>

@endsection


