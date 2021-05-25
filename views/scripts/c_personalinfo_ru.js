$('#c_personalinfo').addClass("text-16");
$("#firstname").val(PersonalInfo[0]['Name']);  
$("#lastname").val(PersonalInfo[0]['Surname']);
$("#city").val(PersonalInfo[0]['City']);  
$("#street").val(PersonalInfo[0]['Street']);
$("#building").val(PersonalInfo[0]['Building']);
$("#appartement").val(PersonalInfo[0]['Appartement']);
$("#zip").val(PersonalInfo[0]['Zip']);
var strs = PersonalInfo[0]['Birthday'];
if(strs!=null) {
   var yyyy = strs.substr(0,4);
   var mm = strs.substr(5,2);
   var dd = strs.substr(8,2);
   var editedbd = dd + '/' + mm + '/' + yyyy;
}
$("#birthday").val(editedbd);
$("#email").val(SecurityInfo[0]['Email']);
$("#phone").val(SecurityInfo[0]['Phone']);

if(SecurityInfo[0]['Verified'] == 1) {
   $("#notificationBox").empty();
   $("#passportBox1").empty();
   $("#passportBox2").empty();
} else {
   if(PersonalInfo[0]['Passport_Front'] == 1) {
      $("#passport_front").prop("disabled", true);
      $("#passport_front_label").html(UnderReview);
   }

   if(PersonalInfo[0]['Passport_Back'] == 1) {
      $("#passport_back").prop("disabled", true);
      $("#passport_back_label").html(UnderReview);
   }
}

$(document).on('click', '.select-option.genderlist', function (e) {
   let str = $(this).attr("id");
   $("#hiddenGender").val(str);
});

if(PersonalInfo[0]['Gender']==1) {
   $("#hiddenGender").val(1);
   $("#gender").val(GenderMale);
}

if(PersonalInfo[0]['Gender']==2) {
   $("#hiddenGender").val(2);
   $("#gender").val(GenderFemale);
}

$(document).on('click', '.select-option.countrylist', function (e) {
   let str = $(this).attr("id");
   $("#hiddenCountry").val(str);
});


$("#hiddenCountry").val(PersonalInfo[0]['Country']);
if(PersonalInfo[0]['Country'] != null) {
   $("#country").val(CountryList[PersonalInfo[0]['Country']]['1']);
}

var verifytel = '<div class="error" id="error"><div class="error__head"><p class="text-15 c-blue">Phone verification</p><button type="button" class="close"></button></div><ul class="error-list"><li class="error-item">We will send you SMS code to verify your phone number.<br><br> <button type="submit" class="btn btn-red">Send Verification Code</button></li></ul></div>';
function verifytelb() {
   $("#verifyTel").html(verifytel);
}
$.each(CountryList, function(k, v) {
       $('#CountryList').append("<li class='select-option countrylist' id='" + k + "'>" + v[1] + "</li>");
 });
 

 /*
 if (Page_Data_Addresses != ''){
    $.each(CityList, function(k, v) {
       if (Page_Data_Addresses[0].Country != null) {
         if (v[2] == Page_Data_Addresses[0].Country)
          {
             if (Page_Data_Addresses[0].City != null)
             {
                if (v[0] == Page_Data_Addresses[0].City)
                {
                   $('#CityList').append("<li class='select-option active' id='" + k + "'>" + v[1] + "</li>");
                   $('#CitySelect').val(v[1]);
                   $("input[name='CityID']").val(k);
                   map.remove();
                   changeLocation(Page_Data_Addresses[0].Latitude, Page_Data_Addresses[0].Longitude);
                }
                else 
                $('#CityList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
             }
             else 
             $('#CityList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
          }
       }
    });
 }
 
 if (Page_Data_Addresses != ''){
    if (Page_Data_Addresses[0].Street != null)
    $("input[name='Street']").val(Page_Data_Addresses[0].Street);
 
    if (Page_Data_Addresses[0].Appartement != null)
    $("input[name='Appartement']").val(Page_Data_Addresses[0].Appartement);
 
    if (Page_Data_Addresses[0].Zip != null)
    $("input[name='Zip']").val(Page_Data_Addresses[0].Zip);
 }
 
 $(document).on('click', '.select-option', function (e) {
    let option = $(this).text();
    
    e.preventDefault();
    $(this).addClass('active').siblings().removeClass('active');
    $(this).closest(".select").slideUp(300);
    $(this).closest(".field").find(".input-select").val(option);
    var str = $(this).attr("id");
    
    var parentElement = $(this).parentsUntil("form");
    $(parentElement[1]).children('#input-id').val(str);
    var elementName = $(parentElement).children('#CitySelect').attr("id");
    $('#CityList').empty();
   
    if (elementName != 'CitySelect') {
       $('#CitySelect').val('');
       $('.CityID').val(0);
    }
    if (elementName == 'CitySelect') {
       $.each(CityList, function(k, v) {
          if (k == str) {
             map.remove();
             changeLocation(v[3], v[4]);
             return false;
          }
       });
    }
    $.each(CityList, function(k, v) {
       if (v[2] == $('.country-input').val()) {
          $('#CityList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
       }
    });
 });*/