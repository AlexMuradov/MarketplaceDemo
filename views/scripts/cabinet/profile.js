
var phoneCodeSent = false;
const phoneVerificationFormData = new FormData();
phoneVerificationFormData.append('api__CreateTempPhone', 1);
phoneVerificationFormData.append('phoneCode', '');
phoneVerificationFormData.append('phone', '');
phoneVerificationFormData.append('messCode', '');
    

var AccountActivity = {"1":["Android","172.69.54.65","2020-07-08 22:20:00"],
                "2":["Apple","1.66.54.5","2020-07-09 12:20:00"],
                "3":["Windows","7.9.4.6","2020-07-10 14:20:00"],
                "4":["Android","172.69.54.65","2020-07-11 19:20:00"]}; 

// if (CountryList.lenth != 0) {
//     $.each(CountryList, function(k, v) {
//         $('#address-country').append("<option name='country' value='" + k + "'>" + v[1] + "</option>");
//     });
// }

// $("#CountryID").val(PersonalInfo[0]['Country']);
// $("#CityID").val(PersonalInfo[0]['City']);
// $('#address-building').val(PersonalInfo[0]['Building']);
// $('#address-street').val(PersonalInfo[0]['Street']);
// $('#address-appartement').val(PersonalInfo[0]['Appartement']);

var jsonCity  = "";
$.getJSON('./assets/JSON/City.json', function(data) {         
    jsonCity = data;
});

// loadCity(PersonalInfo[0]['Country']);

// function loadCity(countryId){
//     $('#address-city').empty();
   
//     $.each(jsonCity, function(k, v) {
//         console.log(v);
//         if (v[3] == countryId) {
//             $('#address-city').append("<option  value='" + k + "'>" + v[1] + "</option>");
//         }
//     });
// }



$('#address-city').change(function () {
    $("input[name='CityID']").val(this.value);
});




$("#full-name").val(PersonalInfo[0]['Name'] + ' ' + PersonalInfo[0]['Surname']);
$('#firstname').val(PersonalInfo[0]['Name']);
$('#lastname').val(PersonalInfo[0]['Surname']);
$('#address-street').val(PersonalInfo[0]['Street']);
$('#address-building').val(PersonalInfo[0]['Building']);
$('#address-appart').val(PersonalInfo[0]['Appartment']);
$('#address-zip').val(PersonalInfo[0]['Zip']);
$("#phone-no").val(SecurityInfo[0]['Phone']);



if (SecurityInfo[0]['VerifiedEmail'] == 1) 
    $('#emailStatus').html("Verified.");
else
    $('#emailStatus').html("Not verified");


if (SecurityInfo[0]['VerifiedPhone'] == 1) 
    $('#phoneStatus').html("Verified.");
else
    $('#phoneStatus').html("Not verified.");


// var addressStr = CountryList[PersonalInfo[0]['Country']][1] + ", " + CountryList[PersonalInfo[0]['City']][1] + ", " + PersonalInfo[0]['Street'] + " " + PersonalInfo[0]['Building'] + " " + PersonalInfo[0]['Appartment'];
// $("input[name=address]").val(addressStr);


// $("#info").click(function() {
//    changeView(this, "#personalInfo")
// });

// $("#documents").click(function() {
//     changeView(this, "#accountDocuments")
// });

// $("#notification").click(function() {
//     changeView(this, "#accountNotifications")
// });

// $("#activity").click(function() {
//     changeView(this, "#accountActivity")
// });

// $("#security").click(function() {
//     changeView(this, "#accountSecurity")
// });

function changeView(e, el){
    $(e).parent().find("a").removeClass('active');
    $(e).find("a:first").addClass('active').siblings().removeClass('active');

    $(".card-inner-lg").addClass('disabled');
    $(el).removeClass('disabled');
}

$('#saveAddress').click(function (){
    
    $.ajax({
        url : re,
        type: 'GET',
        async: true,
        data: {},
        success : handleData
        })
        function handleData(e) {
        BuildPage(JSON.parse(e));
    }
})

if (AccountActivity != null) {
    $.each(AccountActivity, function(i, v){
    var structure = `
        <tr>
            <td class="tb-col-os">${v[0]}</td>
            <td class="tb-col-ip"><span class="sub-text">${v[1]}</span></td>
            <td class="tb-col-time"><span class="sub-text">${v[2]}</span></td>
            <td class="tb-col-action"></td>
        </tr>`

        $('#activityTable').append(structure);
    });
}

let options = {
    url: "./assets/JSON/Country.json",
    getValue: "name",
    list: {
        maxNumberOfElements: 4,
        onSelectItemEvent: function() {
            var ids = $("#address-country").getSelectedItemData().id;
            $("#CountryID").val(ids).trigger("change");
        },
        match: {
            enabled: true
        }
    }
};

//$("#address-country").easyAutocomplete(options);

// $('#address-country').keypress(function () {
//     loadCity(this.value);
//   //  $("input[name='CountryID']").val(this.value);
// });

// $(document).on('keyup', '#address-country', function() {
//     loadCity(this.value);
// })

// async function loadCity(v) {
     
//     const autocompl_req = await 
//       fetch(`/api/v1/api__City:1/searchInput:${v}/Limit:4`);
//       const autocompl_data = await (autocompl_req).json();
//       console.log(autocompl_data);
//       if(autocompl_data){
//         $('#address-country').empty();
//         autocompl_data.forEach(
//             element => $('#address-country').append(`<option value="${element.ID}">${element.City}</option>`));
//     }
// }

$(document).on('change', '.option', function() {
    alert(this.value);
});

$(".input-city").on("keyup", function(e) {
    autoCompl(e.target.value);
});


async function autoCompl(e) {
    if(e){
        const autocompl_req = await 
            fetch(`https://rentxx.com/ru/home/api__City:1/searchInput:${e}/Limit:4`);
            const autocompl_data = await (autocompl_req).json();
            

        if(autocompl_data){
            $( "#cityList" ).empty();
            autocompl_data.forEach(
                element => $("#cityList")
                        .append(`<li class="align-items-center">${element.City}><
                                    <input type="hidden" value="${element.City}">
                                    <input type="hidden" value="${element.ID}">
                                </li>`)
            );
            
            $("#cityList").children(".li").click(function(e){
                $("#City").val(e.target.children[1].value);
                $("#cityId").val(e.target.children[2].value);
                $( ".dropdown-city" ).css('display', 'none');
                if($(window).width() < 992){
                    if(!($("#City").val())){
                        $(".btnSearch").prop('disabled', true)
                    }
                    else{
                        $(".btnSearch").prop('disabled', false)
                    }
                }
            })
            if($(window).width() > 991) {
                $( ".dropdown-city ul" ).css( "padding", "9px 0px" );
            }
            else {
                $( ".dropdown-city ul" ).css( "padding", "0 20px 20px" );
            }
        }
        else{
            $( "#cityList" ).empty();
            $( ".dropdown-city ul" ).css( "padding", "0px 0px" );
        }
    }
}

$('#birth-day').change(function (){
    str = (this.value).substring(6, 10) + "-" + (this.value).substring(0, 2) + "-" + (this.value).substring(3, 5); 
    $('#birthday').val(str)
})

$('#front').change(function(){
    $('#frontL').val(this.files[0].name)
})

$('#back').change(function(){
    $('#backL').val(this.files[0].name)
})

$(document).ready(() => {
    FillProfile()

    $("#editBtn").on("click", (e) => {
        e.preventDefault();
        $(".card-inner input").attr("disabled", false);
        disabledInp = false;
        
        $("#editBtn").toggleClass("hidden");
        $("#saveBtn").toggleClass("hidden");
        $("#cancelBtn").toggleClass("hidden");
    })

    // $("#saveBtn").on('click', () => {
    //     $(".card-inner input").attr("disabled", true);

    //     $("#editBtn").toggleClass("hidden");
    //     $("#saveBtn").toggleClass("hidden");
    //     $("#cancelBtn").toggleClass("hidden");
    // })

    // $("#commonInfoForm").on('submit', (e) => {
    //     e.preventDefault();
    // })

    $("#cancelBtn").on('click', (e) => {
        e.preventDefault();
        FillProfile();
        $(".card-inner input").attr("disabled", true);
        
        $("#editBtn").toggleClass("hidden");
        $("#saveBtn").toggleClass("hidden");
        $("#cancelBtn").toggleClass("hidden");
    })

    $(".link-list-menu a").on("click", (e) => {
        $(".link-list-menu a").removeClass("active");
    })


    $("#confirmPhone").on("click", () => {
        if(!phoneCodeSent){
            const formData = new FormData();
            formData.append('api__createPhoneVerify', 1);
            formData.append('phoneCode', $("#changePhone input[name=phoneCode]").val());
            formData.append('phone', $("#changePhone input[name=phone]").val());
            phoneVerificationFormData.set('api__CreateTempPhone', 1);
            phoneVerificationFormData.set('phoneCode', $("#changePhone input[name=phoneCode]").val());
            phoneVerificationFormData.set('phone', $("#changePhone input[name=phone]").val());
    
            fetch(`/api/v1`,{
                    method: 'POST',
                    body: formData
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    // fetch(`/api/v1`,{
                    //     method: 'POST',
                    //     body: phoneVerificationFormData
                    // })
                    // .then((response) => {
                    //     return response.json();
                    // })
                    // .then((data) => {
                    //     if(data){
                    //         $("#changePhone").modal('hide')
                    //     }
                    // });
                    if(data){
                        $("#changePhone .modal-body").empty();
                        $("#changePhoneLabel").text("Insert verification code from message")
                        $("#changePhone .modal-body").append(`<div class="row g-3 d-flex justify-content-center text-center">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" required="" maxlenght="4" placeholder="XXXX" name="phoneVerCode" class="text-center">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>`)
                        phoneCodeSent = true;
                    }
                });

        }
        else{
            phoneVerificationFormData.set('messCode', $("#changePhone input[name=phoneVerCode]").val());
            
            fetch(`/api/v1`,{
                method: 'POST',
                body: phoneVerificationFormData
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if(data){
                    $("#changePhone").modal('hide')
                    NioApp.Toast(
                        'Email sent!',
                        'success', {
                        position: 'top-center'
                      });
                }
                else{
                    $("input[name=phoneVerCode]").css('border-color', '#ff3535')
                }
            });
        }
            
    })

    
    $("#confirmPassword").on("click", () => {
        const formData = new FormData();
        formData.append('api__VerifyPassword', 1);
        formData.append('pass', $("#changePassword input[name=oldPass]").val());

        fetch(`/api/v1`,{
            method: 'POST',
            body: formData
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            if(data){
                if($("#changePassword input[name=newPass]").val() == $("#changePassword input[name=confNewPass]").val() && $("#changePassword input[name=newPass]").val() != '' && $("#changePassword input[name=confNewPass]").val() != ''){
                    const newPassFormData = new FormData();
                    newPassFormData.append('api__UpdatePassword', 1);
                    newPassFormData.append('newPass', $("#changePassword input[name=newPass]").val());

                    fetch(`/api/v1`,{
                        method: 'POST',
                        body: newPassFormData
                    })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        if(data){
                            $("#changePassword").modal('hide')
                            NioApp.Toast(
                                'Пароль был успешно изменен!',
                                'success', {
                                position: 'top-center'
                                });
                                $("#changePassword input").val('')
                        }
                    });
                }
                else{
                    $("#changePassword input[name=newPass]").css('border-bottom-color', '#ff3535')
                    $("#changePassword input[name=confNewPass]").css('border-bottom-color', '#ff3535')
                }
            }
            else{
                
                $("#changePassword input[name=oldPass]").css('border-bottom-color', '#ff3535')
            }
        });
    })

    $("#confirmSetPass").on("click", () => {
        if($("#setPassModal input[name=newPass]").val() == $("#setPassModal input[name=confNewPass]").val() && $("#setPassModal input[name=newPass]").val() != '' && $("#setPassModal input[name=confNewPass]").val() != ''){
            const newPassFormData = new FormData();
            newPassFormData.append('api__SetPassTempAcc', 1);
            newPassFormData.append('newPass', $("#setPassModal input[name=newPass]").val());

            fetch(`/api/v1`,{
                method: 'POST',
                body: newPassFormData
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if(data){
                    $("#setPassModal").modal('hide')
                    NioApp.Toast(
                        'Регистрация прошла успешно!',
                        'success', {
                        position: 'top-center'
                        });
                        $("#changePassword input").val('')
                }
            });
        }
        else{
            $("#setPassModal input[name=newPass]").css('border-bottom-color', '#ff3535')
            $("#setPassModal input[name=confNewPass]").css('border-bottom-color', '#ff3535')
        }
    })
    
    $("#confirmDelete").on("click", () => {
        const formData = new FormData();
        formData.append('api__DeleteAll', 1);

        fetch(`/api/v1`,{
            method: 'POST',
            body: formData
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            if(data){
                NioApp.Toast(
                    'Документы были успешно удалены!',
                    'success', {
                    position: 'top-center'
                    });
                    $('#deleteDocsBtn').addClass('d-none')
                    $('#updateDocsBtn').removeClass('d-none')
            }
            else{
                NioApp.Toast(
                    'Что-то пошло не так',
                    'error', {
                    position: 'top-center'
                    });
            }
        });
    })

    $("#changePassword input").on("focus", (e) => {
        $("#changePassword input").attr('style', '')
    })

    $("#setPassModal input").on("focus", (e) => {
        $("#setPassModal input").attr('style', '')
    })

    $('input[name=phoneVerCode]').on("focus", (e) => {
        $(e.target).attr('style', '')
    })
})

function FillProfile(){
    $("input[name=Name]").val(PersonalInfo[0]['Name']);
    $("input[name=Surname]").val(PersonalInfo[0]['Surname']);
    $("input[name=DisplayName]").val(PersonalInfo[0]['DisplayName']);
    $("#securityInfoCard .phoneCode").val(SecurityInfo[0]['PhoneCode']);
    $("#securityInfoCard .phone").val(SecurityInfo[0]['Phone']);
    $("#changePhone .phoneCode").append(SecurityInfo[0]['PhoneCode']);
    $("#changePhone .phone").append(SecurityInfo[0]['Phone']);
    $("input[name=Email]").val(SecurityInfo[0]['Email']);
    $("input[name=country]").val(PersonalInfo[0]['Country']);
    $("input[name=city]").val(PersonalInfo[0]['City']);
    $("input[name=street]").val(PersonalInfo[0]['Street']);
    $("input[name=building]").val(PersonalInfo[0]['Building']);
    $("input[name=appartment]").val(PersonalInfo[0]['Appartment']);
    $("input[name=zip]").val(PersonalInfo[0]['Zip']);
    $(".user-info .lead-text").text(PersonalInfo[0]['DisplayName']);
    $(".user-info .user-name").text(PersonalInfo[0]['DisplayName']);
    $(".user-info .sub-text").text(SecurityInfo[0]['Email']);
    if(SecurityInfo[0]['VerifiedID'] == 0){
        $('#updateDocsBtn').removeClass('d-none')

        $('.nk-news-item').append(`
        <div class="nk-news-icon">
            <em class="icon ni ni-info text-warning"></em>
        </div>
        <div class="nk-news-text">
            <span class="res_UploadCredentials"></span>
        </div>`)
    }
    else{
        $('#deleteDocsBtn').removeClass('d-none')
    }
        
    // var strs = PersonalInfo[0]['Birthday'];
    // var editedbd = '';
    // if(strs!=null) {
    //     var yyyy = strs.substr(0,4);
    //     var mm = strs.substr(5,2);
    //     var dd = strs.substr(8,2);
    //     editedbd = dd + '/' + mm + '/' + yyyy;
    // }

    $("input[name=dateOfBirth]").val(PersonalInfo[0]['Birthday']);
    
}


function getCookieValue(name) {
    const nameString = name + "="
  
    const value = document.cookie.split(";").filter(item => {
      return item.includes(nameString)
    })

    if (value.length) {
      if(value[0][0] == ' '){
        value[0].substr(1, value[0].length)
      }
      return value[0].substring(nameString.length, value[0].length)
    } 
    else {
      return ""
    }
  }

  if(!getCookieValue('XX_TEMPACCREG') && SecurityInfo.TMP_ID){
    document.cookie = "XX_TEMPACCREG=0";
  }

  $(document).ready(() => {
      if(getCookieValue('XX_TEMPACCREG') && getCookieValue('XX_TEMPACCREG') == 0){
        $("#tempAccReg").modal('show');
      }
  })