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
                        <label class="form-check-label" for="gender">Male</label>
                    </div>   
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                        <label class="form-check-label" for="gender">Female</label>
                    </div>   
                  </div>        
              </div>
              <div class="mb-3">
                <label for="number" class="form-label">Phone Number</label>
                <input type="string" class="form-control" id="number" name="number" placeholder="Enter your phone number">
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
                <select name="municipality" class="form-control" id="municipality" style="max-width: 50% !important; border:solid 1px #d9d8d9; border-radius: 3px;" onblur="addr_search_municipal();">
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
                placeholder="Enter your purok" optional>
              </div>
                <!-- lat and long-->
             
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
              </div>
              <div class="mb-3">    
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"placeholder="Enter your password" >
              @error('password')
              <span class = "invalid-feedback" role="alert">
                <strong style = 'background: brown;color: aliceblue; padding: 30px;'>{{ $message }}</strong>
              </div>
              @enderror
              <div class="mb-3">    
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation"placeholder="Confirm Password">
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <input type="hidden" name="image" class="image-tag">
              </div>
        </form>
        <button type="button" id="submit-btn" class="btn btn-primary" >Save</button>
      </div>
      <label style = "color: red"> " Click map to get current location "</label>
      <div class="input-group mt-2">
        <div class="input-group-prepend">
         <span class="input-group-text">
              <i class="material-icons">Coordinates</i>
            </span>
        </div>
          <input type="text" name="location" id="location" class="form-control p-2" placeholder="{{ __('latitude / longitude') }}" value="{{ old('name') }}" required style="border:solid 1px #d9d8d9; border-radius: 3px;" onchange="checkInput();">
    </div>  
    <div>
      <label style="font-style: italic; font-size: 11px; margin-left: 55px; color: #08288b;">Example: 8.42938,124.618446</label>
    </div>
      <div class="col-md-6 ml-auto mr-auto">
        <div id="map" style="height: 350px; width: 750px; margin-top: 20px; margin-left: 10px; border: 1px solid #000;"></div>
      </div>
    </div>
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


@endsection


