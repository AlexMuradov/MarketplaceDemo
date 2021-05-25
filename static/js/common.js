// var Person = Vars.LngHome.Person; var Persons = Vars.LngHome.Persons;

$(document).ready(function () {

    if($("#curr span").length){
        $("#curr span").text(CurrencyList[getCookieValue("XX_CCY")][3] + ' ' + CurrencyList[getCookieValue("XX_CCY")][2])
    }

    moment.locale(Lng);

    if(typeof userID !== "undefined") {
        if(userID != ''){
            $("#login").hide();
        $("#profile").show();
        }
        
      }

    if(typeof userNotifications !== "undefined") {
        $(".header .counter").text(userNotifications)
    }
    
      

    $("body, html").click(function () {
        $(".dropdown").removeClass('active');
        if($(window).width() > 991){
            $(".dropdown-city").css("display", "none")
         }
    });

    //stopPropagation
    $(".dropdown, .popup").click( function (e) {
        e.stopPropagation();
    });

    //Select
    $(".select-item").click(function () {
        $(this).closest(".select").toggleClass('active');
        $(".select-drop").slideToggle(300);
    });

    $(".select-option").click(function () {
        let option = $(this).text();
        let optionLink = $(this).find("a").text();

        $(this).closest(".select").removeClass('active').find(".select-item span").text(option);
        $(this).closest(".select-lang").removeClass('active').find(".select-item span").text(optionLink);

        $(this).addClass('active').siblings().removeClass('active');
        $(this).closest(".select").find(".select-drop").slideUp(300);
    });

    //choice number of guests
    $(".input-visitor, .dropdown__icon_visitor").click( function (e) {
        e.stopPropagation();
        $(".dropdown-guests").addClass('active');
    });


    $(".input-city").click( function (e) {
        e.stopPropagation();
        $(".dropdown-city").addClass('active');
        autoCompl(e.target.value)
    });

    $(".share_btn, .share_btn_mob").click( function (e) {
        e.stopPropagation();
        $(".dropdown-share").addClass('active');
    });


    
    $('.btn-count-minus').on("click", function () {
        let $input = $(this).parent().find("input");
        let count = parseInt($input.val() - 1);

        if($input.hasClass('input-count')){
            let $inputAdult= $(this).parent().find(".input-count");
            let guestAdult  = count < 0 ? 0 : count;
            if(count<1) $input.parent().find('.btn-count-minus').attr('disabled', true);
            $inputAdult.val(guestAdult);
        }

        $input.change();
        return false;
    });


    $('.btn-count-plus-guests').click(function () {
        let $input = $(this).parent().find('.input-count');
        
        $input.val(parseInt($input.val()) + 1);
        let count = parseInt($input.val());
        count = count >= 12 ? 12 : count;
        if(count!=0) $input.parent().find('.btn-count-minus').attr('disabled', false);
        $input.val(count);
        if($input.hasClass("count__adults_mob")){
            $("#AdultGuests").val(count);
            console.log($("#AdultGuests").val())
        }
        if($input.hasClass("count__children_mob")){
            $("#ChildGuests").val(count);
            console.log($("#ChildGuests").val())
        }
        if($input.hasClass("count__baby_mob")){
            $(".count__baby").val(count);
            console.log($(".count__baby").val())
        }
        $input.change();
        return false;
    });
    
    $('.btn-count-plus').click(function () {
        let $input = $(this).parent().find('.input-count');
        
        $input.val(parseInt($input.val()) + 1);
        let count = parseInt($input.val());
        if(count!=0) $input.parent().find('.btn-count-minus').attr('disabled', false);
        $input.val(count);
        $input.change();
        return false;
    });
    
    
    $(".input-count").change( function (e) {
        let a = parseInt($(e.target).closest('ul').find(".count__adults_mob").val());
        let b = parseInt($(e.target).closest('ul').find(".count__children_mob").val());
        let c = parseInt($(e.target).closest('ul').find(".count__baby_mob").val());
        let total = a+b+c;

        if (total == 1 || total >= 5){
            $("#GuestMob").val(a+b+c + " " + Vars.LngHome.Person);
            $(".input-visitor").val(a+b+c + " " + Vars.LngHome.Person);
        } else {
            $("#GuestMob").val(a+b+c + " " + Vars.LngHome.Persons);
            $(".input-visitor").val(a+b+c + " " + Vars.LngHome.Persons);
        }
    });

    $(".input-count").change( function (e) {
        let a = parseInt($(e.target).closest('ul').find(".count__adults").val());
        let b = parseInt($(e.target).closest('ul').find(".count__children").val());
        let c = parseInt($(e.target).closest('ul').find(".count__baby").val());
        let total = a+b+c;

        if (total == 1 || total >= 5){
            $(".input-visitor").val(a+b+c + " " + Vars.LngHome.Person);
        } else {
            $(".input-visitor").val(a+b+c + " " + Vars.LngHome.Persons);
        }

        if($(".search-catalog_btn").length) $(".search-catalog_btn").removeClass('hidden')
    });

    $(document).on('click', '.btn-count-plus', function () {
        let $input = $(this).parent().find('.input-count');
        $input.val(parseInt($input.val()) + 1);
        let count = parseInt($input.val());
        count = count >= 12 ? 12 : count;
        $input.val(count);
        $input.change();
        return false;
    })

    $(document).on('click', '.btn-count-minus', function() {
        let $input = $(this).parent().find("input");
        let count = parseInt($input.val() - 1);

        //adults
        let $inputChildren= $(this).parent().find(".count__adults");
        let guestAdult  = count < 1 ? 1 : count;
        $inputChildren.val(guestAdult);

        //children
        let $inputAdults = $(this).parent().find(".count__children");
        let guestChildren  = count < 0 ? 0 : count;
        $inputAdults.val(guestChildren);

        $input.change();
        return false;
    });


    //Slider (page MAIN)
    $(".row-slider").slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        variableWidth: true,
        prevArrow:" <button type=\"button\" class=\"btn-arrow btn-prev\"></button>",
        nextArrow:"  <button type=\"button\" class=\"btn-arrow btn-next\"></button>",
        responsive: [
            {
                breakpoint: 1179,
                settings: {
                    slidesToShow: 3,
                    variableWidth: false,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                }
            },

        ]
    });

    //Slider in cards
    // $(".card-slider").slick({
    //     infinite: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: true,
    //     dots: false,
    // });

    // POPUPS LANG

    $(".header__selects-item .link, .footer__select").click(function (e) {
        e.preventDefault();
        $(".popup__lang-curr").addClass('active');
        let popup =  $(".popup__lang-curr .popup");

        if (popup.height() >= $(window).height()){
            popup.addClass("positionTop");
        }
    });

    $(".btn-filter").click(function (e) {
        e.preventDefault();
        $(".popup__additional-filters").addClass('active'); 
        $(".positionTop").addClass('active');
        $(".positionTop button").css("display", "flex");
        $("#histogramSlider").css("display", "block");
        $("#histogramSliderMob").css("display", "block");
        window.addEventListener('scroll', noScroll);
        $("body").css("overflow", "hidden")
    });

    $(".btn-filter_mob").click(function (e) {
        e.preventDefault();
        $(".popup_filter_mob").addClass('active'); 
        $(".positionTopMob").addClass('active');
        $(".positionTopMob button").css("display", "flex");
        $("#histogramSlider").css("display", "block");
        $("#histogramSliderMob").css("display", "block");
        window.addEventListener('scroll', noScroll);
        $("body").css("overflow", "hidden")
    });

    $(".btn-price").click(function (e) {
        e.preventDefault();
        $(".popup__additional-filters").addClass('active'); 
        $(".positionTop").addClass('active');
        $(".positionTop button").css("display", "flex");
        $("#histogramSlider").css("display", "block");
        $("#histogramSliderMob").css("display", "block");
        window.addEventListener('scroll', noScroll);
        $("body").css("overflow", "hidden")
        $('.popup-content').animate({ scrollTop: $('.price_section_title').offset().top - 60 }, 500);
    });

    $(".lc_popup").click(function (e) {
        e.preventDefault();
        $(".popup__footer").addClass('active'); 
        $(".popup_ft").addClass('active'); 
        $(".popup_ft button").css("display", "flex");
        window.addEventListener('scroll', noScroll);
        // $("body").css("overflow", "hidden")
    });
    
    $(".xx__mob-toggle-btn").click(function (e) {
        e.preventDefault();
        $(".popup__additional-filters").addClass('active');
        $(".positionTop").addClass('active'); 
        window.addEventListener('scroll', noScroll);
        $("body").css("overflow", "hidden")
    });
    
    $(".close, .popups").click(function (e) {
        e.preventDefault();
        $(".popups").removeClass('active');
        $(".positionTop").removeClass('active');  
        $(".positionTopMob").removeClass('active');  
        $(".popup_ft").removeClass('active'); 
        $(".positionTop button").css("display", "none");
        $(".positionTopMob button").css("display", "none");
        $(".popup_ft button").css("display", "none");
        $("#histogramSlider").css("display", "none");
        $("#histogramSliderMob").css("display", "none");
        $("#submit_signin").addClass('hidden');
        window.removeEventListener('scroll', noScroll);
        $("body").css("overflow", "overlay ")
        $(".error").hide();
    });

    // POPUP SIGN-IN

    $(".signin_modal").click(function (e) {
        e.preventDefault();
        $(".forms_signin").addClass('active');
        let popup =  $(".forms_signin .popup");

        if (popup.height() >= $(window).height()){
            popup.addClass("positionTop");
        }
    });

    $(".close, .popups").click(function (e) {
        e.preventDefault();
        $(".popups").removeClass('active');
        $(".popup_price").removeClass("active");
        
        
        $(".error").hide();
    });

    //show only 6 apartments in the desktop and 3 in the mobile. The rest are hidden
    function hideCards() {
        let lengthCard = $(".offers-cards .card").length;
        if (window.matchMedia("(max-width: 767px)").matches) {
            if (lengthCard > 3) {
                $(".offers-cards .card").hide();
                for (let i = 1; i <= 3; i++) {
                    $(".offers-cards .card:nth-child(" + i + ")").show();
                }
            }
        } else {
            if (lengthCard > 6) {
                $(".offers-cards .card").hide();
                for (let i = 1; i <= 6; i++) {
                    $(".offers-cards .card:nth-child(" + i + ")").show();
                }
            }
        }
    }

    hideCards();

    //show all apartments
    $("#more-apartaments").click(function (e) {
        e.preventDefault();
        $(".offers-cards .card").show();
    });

    //selected option in sorting button (page CATALOG)
    $(".sorting-option").click(function () {
        let option = $(this).text();
        $(this).addClass('active').siblings().removeClass('active');
        $(this).closest(".sorting").find("button span").text(option);
    });


    // card layout (page CATALOG)

    if (window.matchMedia("(min-width: 1179px)").matches) {
        $(".catalog-list").find("li").removeClass('card').addClass('card-item');
    } else {
        $(".catalog-list").find("li").removeClass('card-item').addClass('card');
    }

    //tabs
    $(".tab").click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        let index = $(this).index();
        $(".forms-content form").eq(index).addClass('active').siblings().removeClass('active');
    });

    $(".more").click(function () {
        $(this).toggleClass('active');
        $(".read-more").slideToggle(300);
        $(".remember__item").show();
    });

    //show only 6 remember in the desktop and 3 in the mobile. The rest are hidden
    function hideRemember() {
        let lengthRemember = $(".remember__item").length;
        if (window.matchMedia("(max-width: 767px)").matches) {
            if (lengthRemember > 3) {
                $(".remember__item").hide();
                for (let i = 1; i <= 3; i++) {
                    $(".remember__item:nth-child(" + i + ")").show();
                }
            }
        } else {
            if (lengthRemember > 6) {
                $(".remember__item").hide();
                for (let i = 1; i <= 6; i++) {
                    $(".remember__item:nth-child(" + i + ")").show();
                }
            }
        }
    }

    hideRemember();

    //show/hide intelligence in mobile (page payment_1)
    if (window.matchMedia("(max-width: 991px)").matches) {
        $(".continue").click(function (e) {
            e.preventDefault()
            $(".step-mob").hide();
            $(".payment__right").show();
            $(".payment__close").show();
        });
        $(".payment__close").click(function (e) {
            e.preventDefault()
            $(".step-mob").show();
            $(".payment__right").hide();
            $(".payment__close").hide();
        });
    }

    //select
    
    $(".input-select, .dropdown__icon_city, .icon").click(function (e) {
        e.preventDefault();
        $(this).closest(".field").find(".select").slideToggle(300);
    });

    
    $(".input-select").keypress(function() {
    //FIX THIS
    let inpt = $(".input-select").val();
    var searchString = inpt,
        foundLi = $('li:contains("' + searchString + '")');
    foundLi.addClass('found');
    $('.select').animate({ scrollTop: foundLi.offset().top});
    });

    $(".select-option").click(function (e) {
        let option = $(this).text();
        e.preventDefault();
        
        $(this).addClass('active').siblings().removeClass('active');
        $(this).closest(".select").slideUp(300);
        $(this).closest(".field").find(".input-select").val(option);
        var str = $(this).attr("id");
        // var element = $(this).parentsUntil("form");
        // var element2 = $(element[1]).children('#input-ids').val(str);
        $('#input-ids').val(str);
    });

    $("#input-ids").keypress(function () {

        var str = $(".input-select").val();
        var n = str.indexOf(")");
        var str = str.substring(1, n);
 
        var str2 = $("#input-ids").val();
        var str2 = str2.substring(0, str.length);

        if(str !== str2) {
            $("#input-ids").val(str);
        }

    });

});

$(document).ready(function () {
    //Mask
    $("input.inputmask-date").inputmask({
        alias: "dd/mm/yyyy",
        val: true
        }
    );
    $("input[name='username']").inputmask({
        regex: String.raw`\D*`,
    });

    $("input[name='email']").inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function (pastedValue, opts) {
            pastedValue = pastedValue.toLowerCase();
            return pastedValue.replace("mailto:", "");
        },
        definitions: {
            '*': {
                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                casing: "lower"
            }
        }
    });
    $("input.input-card").inputmask("9999 - 9999 - 9999 - 9999");
    $("input.input-validity").inputmask( "99 / 99");
    $("input.input-birth").inputmask( "99 / 99 / 9999");
    $("input.input-cvv").inputmask("999");

});


$(document).ready(function () {

    //valid form

    $("#sign-in").click(function () {
        $(".btn-error").hide();
        let input = $(this).closest("form").find("input:invalid");
        input.closest(".field").find(".btn-error").show();
        if(input.val() == ''){
            $(".error").addClass('active');
        }
    });

    $("#sign-up").click(function (e) {
        $(".btn-error").hide();
        let input = $(this).closest("form").find("input:invalid");
        input.closest(".field").find(".btn-error").show();

        e.preventDefault();

        if(input.val() != ''){
            $(this).closest(".signup").removeClass('active');
            $(".signup-step").addClass('active');
        } else {
            $(".error").addClass('active');
        }
    });

    $("#" + Lng).attr('checked', true);

    $('#popup-side').submit(function (e) {
        e.preventDefault();
        saveSettings();
    });

    $('#lc_popup_submit_btn').click(function (e) {
        e.preventDefault();
        console.log('saved');
        saveSettings();
    });

    $("#curr" + getCookieValue("XX_CCY")).attr('checked', true);

    function saveSettings() {
        var el = $('input[name="radio-lang"]:checked').attr('id');  
        location.href = window.location.origin + "/" + el + window.location.pathname.substring(3, window.location.pathname.length);
        var curr = $('input[name="radio-curr"]:checked').attr('value');
        document.cookie = "XX_CCY=" + curr+ "; path=/";
    }


});

    function getCookieValue(name) {
        const nameString = name + "="
      
        const value = document.cookie.split(";").filter(item => {
          return item.includes(nameString)
        })
      
        if (value.length) {
          return value[0].substring(nameString.length+1, value[0].length)
        } else {
          return ""
        }
      }
//daterangepicker (MAIN, CATALOG)


let optionDate = {
    opens: 'left',
    autoUpdateInput: true,
    startOfWeek: 'monday',
    singleMonth: true,
    showShortcuts: false,
    // showTopbar: false,
    autoApply: false,
    format: "YYYY-MM-DD"
}

let optionDate2 = {
    opens: 'left',
    autoUpdateInput: true,
    startOfWeek: 'monday',
    singleMonth: true,
    showShortcuts: false,
    showTopbar: false,
    autoApply: false,
    format: "DD.MM"
}

var nowDate = new Date();
var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
var maxLimitDate = new Date(nowDate.getFullYear() + 1, nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
var minDateForSecondPicker;

$(document).ready(() => {
    $('#catalog-date').daterangepicker({
        "autoApply": true,
        "startDate": new Date(savedDateFrom + ' 0:0:0:0'),
        "endDate": new Date(savedDateTo + ' 0:0:0:0'),
        "maxDate": maxLimitDate,
        "minDate": today,
        "parentEl": ".date-field",
        locale: {
            format: 'DD MMM'
        }
    }, function(start, end, label) {
        $('#checkinDate').val(start.format('YYYY-MM-DD'));
        $('#checkoutDate').val(end.format('YYYY-MM-DD'));
    });
    
    $('#input-date-mob-toggle').daterangepicker({
        "autoApply": true,
        "startDate": today,
        "endDate": today,
        "maxDate": maxLimitDate,
        "minDate": today,
        "drops": "auto",
        locale: {
            format: 'DD MMM'
        }
    
    }, function(start, end, label) {
        $('#checkinDate').val(start.format('YYYY-MM-DD'));
        $('#checkoutDate').val(end.format('YYYY-MM-DD'));
    });
})

// $('.input-date').val("");

$(function() {
    $('.search-result__date').daterangepicker(optionDate2)
});

//Autocomplete
$(document).ready(function () {

    let options = {
        url: "/static/JSON/city.json",
        getValue: "cityname",
        list: {
            maxNumberOfElements: 4,
            onSelectItemEvent: function() {
                var ids = $("#js-easyAutocomplete").getSelectedItemData().id;
                $("#CityID").val(ids).trigger("change");
            },
            match: {
                enabled: true
            }
        }
    };
    $("#js-easyAutocomplete").easyAutocomplete(options); //page MAIN, Search
    $("#CityID-Mob-toggle").easyAutocomplete(options); //page MAIN, Search

    let options2 = {
        url: "/static/JSON/city.json",
        getValue: function(element) {
            return element.codecountry;
        },
        list: {
            maxNumberOfElements: 4,
            onSelectItemEvent: function() {
                let selectedItemValue = $("#input-country").getSelectedItemData().mask;
                $("#input-phone").val(selectedItemValue).trigger("mask");
            },
            match: {
                enabled: true
            }

        }
    };

    $("#input-country").easyAutocomplete(options2); //page SIGNIN

    let options3 = {
        url: "/static/JSON/city.json",
        getValue: function(element) {
            return element.cityname;
        },
        list: {
            maxNumberOfElements: 4,
            onSelectItemEvent: function() {
                let selectedItemValue = $(".search-result__city-body").getSelectedItemData().city;
                $(".search-result__city-body").val(selectedItemValue).trigger("city");

                let selectedItemValue2 = $(".search-result__city-head").getSelectedItemData().city;
                $(".search-result__city-head").val(selectedItemValue2).trigger("city");
            },
            match: {
                enabled: true
            }
        }
    };

  //  $(".input-city").easyAutocomplete(options3); //page Catalog
    $(".search-result__city").easyAutocomplete(options3); //page Catalog

});

$(document).ready(function () {
    //after selected country - focus on next input
    $(".easy-autocomplete-container").click( function () {
        $("input#input-phone").focus();
    });
});


$(document).ready(function () {
    $(".n_round").html("(2)");
});

function distance_calc(lat1, lon1, lat2, lon2) {
    var p = 0.017453292519943295;
    var c = Math.cos;
    var a = 0.5 - c((lat2 - lat1) * p)/2 + 
            c(lat1 * p) * c(lat2 * p) * 
            (1 - c((lon2 - lon1) * p))/2;
  
    return 12742 * Math.asin(Math.sqrt(a));
  }

  function xrateprice(b, f, a) {
        x1 = a / (1/b);
        x2 = x1 / f;
        return Math.round(x2 * 100) /100;
  }


  function displayBtn(e){
    if(e.target.value!= ''){
      $(".delete").show();
    }
    else{
        hideBtn()
    }
  }

  function hideBtn(){
    $(".delete").hide();
    $( "#cityList" ).empty();
    $( ".dropdown-city ul" ).css( "padding", "0px 0px" );
  }

  function startLoad(){
    var aa = $(".form-input");
    if(aa[0].value != '' && aa[5].value != ''){
      $(".btn-load").css('display', 'flex');
      $(".btn-search").hide();
    }
  }

  function clearCityInput(){
    $(".City").val("")
  }


$(document).ready(function(){
  $(".CityDrop").on("keyup", function(e) {
        //$( "#City" ).trigger( "focus" );
        $( ".dropdown-city" ).css('display', 'block');
        autoCompl(e.target.value);
        displayBtn(e);
    }).on("change",function(e){
        displayBtn(e);
    });

    $(".input-city").on("keyup", function(e) {
        //$( "#City" ).trigger( "focus" );
        //$( ".dropdown-city" ).css('display', 'block');
        autoCompl(e.target.value);
        //displayBtn(e);
    }).on("change",function(e){
        //displayBtn(e);
    });

    $(".delete").on("click", function(e){
          clearCityInput();
          hideBtn();
    });
    
    $(".btnSearch").on("click", function(e){
        startLoad();
    });

    $(".City").on("focus", function(e){
        e.target.placeholder = ""
        $( ".dropdown-city" ).css('display', 'block');
        var width = $(window).width();
        if(width < 992){
           $(".mCity").trigger("focus")
        }
    }).on("blur",function(e){
        e.target.placeholder = Vars.LngHome.Where
    });


    // $(".input-visitor").val("1 " + Person)

    $(".mClose").on("click", function(e){
        $(e.target).parent().find( "div" ).find( "input" ).val("");
        // clearCityInput();
        $(".dropdown-city").css("display", "none")
        $(".dropdown-guests").css("display", "none")
        
    })
    $("#GuestMob").on("focus", function(){
        $( ".dropdown-guests" ).css('display', 'block');
    })

    
    // $("#departureClickMob").on("click", function(){
    //     $("#departureMob").trigger("focus");
    // })

    // $("#arrivalMob").on("blur load", function(e){
    //     var date = $("#arrivalMob").val();
    //     $("#arrivalHidden").val($("#arrivalMob").val());
    //     $("#arrivalDepartureMob").val($("#arrivalMob").val());
    //     alert("test");
    // })

    // $("#departureMob").on("blur load", function(){
    //     var date = $("#departureMob").val();
    //     $("#departureHidden").val(date);
    // })

    
    function formatDate(date) {
        const months = ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      
        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();
      
        return day + ' ' + months[monthIndex];
      }
    
    $("#arrivalMob").attr({"min" : moment(today).format("YYYY-MM-DD")});
    $("#departureMob").attr({"min" : moment(today).format("YYYY-MM-DD")});

    // $("#arrivalMob").on("change", (e) => {
    //     $("#arrivalHidden").val(moment($(e.target).val()).format("YYYY-MM-DD"));
    //     var date = $(e.target).val();
    //     date = moment(date).format("DD MMM")
    //     $(e.target).val(date);
    // })

    // $("#departureMob").on("change", (e) => {
    //     $("#departureHidden").val(moment($(e.target).val()).format("YYYY-MM-DD"));
    //     $(e.target).val(moment($(e.target).val()).format("DD MMM"));
    // })

    $("#arrivalMob").on("focus", (e) => {
            $("#arrivalMobDate").trigger("focus")
            $("#arrivalMobDate").trigger("click")
            $("#arrivalHidden").trigger("click");
    });


    $("#arrivalMobDate").on("change", (e) => {
        $("#arrivalHidden").val(moment($(e.target).val()).format("YYYY-MM-DD"));
        var date = $(e.target).val();
        date = moment(date).format("DD MMM")
        $("#arrivalMob").val(date);
        $("#arrivalMob").attr('style', '')
        $("#departureMob").attr('style', '')
    })

    $("#departureMob").on("focus", (e) => {
        $("#departureMobDate").trigger("focus")
        $("#departureMobDate").trigger("click")
        $("#departureMob").trigger("blur");
    });

    $("#departureMobDate").on("change", (e) => {
        $("#departureHidden").val(moment($(e.target).val()).format("YYYY-MM-DD"));
        var date = $(e.target).val();
        date = moment(date).format("DD MMM");
        $("#departureMob").val(date);
        $("#arrivalMob").attr('style', '')
        $("#departureMob").attr('style', '')
    })
    
    
    if($(window).width() < 992){
        if(!($(".City").val())){
            $(".btnSearch").prop('disabled', true)
        }
     }
});



async function autoCompl(e) {
    if(e){
        const formData = new FormData();
        formData.append('api__City', 1);
        formData.append('Input', e);
        const autocompl_req = await fetch(`/api/v1`, {
            method: 'POST',
            body: formData
        });
            const autocompl_data = await (autocompl_req).json();
            

        if(autocompl_data){
            $( "#cityList" ).empty();
            autocompl_data.forEach(
                element => $( "#cityList" )
                        .append(`<li class="align-items-center"> 
                                    <img src="/static/v2/img/cities/${element.LocID}city.jpg" id="${element.LocID}city" alt="city">${element.City}
                                    <input type="hidden" value="${element.City}">
                                    <input type="hidden" value="${element.LocID}">
                                </li>` )
            );

            $("#cityId").val(autocompl_data[0].LocID);

            $("#cityList").children("li").click(function(e){
                $(".City").val(e.target.children[1].value);
                $("#cityId").val(e.target.children[2].value);
                $( ".dropdown-city" ).css('display', 'none');
                if($(window).width() < 992){
                    if(!($(".City").val())){
                        $(".btnSearch").prop('disabled', true)
                    }
                    else{
                        $(".btnSearch").prop('disabled', false)
                    }
                }
            })
            if($(window).width() > 991){
                $( ".dropdown-city ul" ).css( "padding", "9px 0px" );
            }
            else{
                $( ".dropdown-city ul" ).css( "padding", "0 20px 20px" );
            }
        }
        else{
            $( "#cityList" ).empty();
            $( "#cityList" ).append(`<li class="align-items-center"> 
                <h5>Ничего не найдено</h5>
            </li>` )
            $( ".dropdown-city ul" ).css( "padding", "0px 0px" );
        }
    }
}


  function noScroll() {
    window.scrollTo(0, 0);
  }


  var prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
//     if($(window).width() < 992){
//         var currentScrollPos = window.pageYOffset;
//         if(currentScrollPos > 50){
//             if (prevScrollpos > currentScrollPos) {
//                 $(".header").css("top", "0")
//                 $(".back_to_search").css("top", "100px")
//             //   document.getElementById("navbar").style.top = "0";
//             } else {
//             //   document.getElementById("navbar").style.top = "-50px";
//               $(".header").css("top", "-65px")
//               $(".back_to_search").css("top", "35px")
//             }
//         }
//         else{
//             $(".header").css("top", "0")
//             $(".back_to_search").css("top", "100px")
//         }
//         prevScrollpos = currentScrollPos;
//     }
//     else{
//         $(".header").css("top", "0")
//         $(".back_to_search").css("top", "100px")
//     }
// }

toastr.options = {
    "closeButton": false,
    "debug": true,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "3000",
    "hideDuration": "10000",
    "timeOut": "20000",
    "extendedTimeOut": "30000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

var uniqueAutocompleteID = + new Date();
$(".City").attr("autocomplete", uniqueAutocompleteID);
$(".City").attr("id", uniqueAutocompleteID);

function DateToUrlString(date){
    var dateStr = `${date.getFullYear()}-${(date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)}-${(date.getDate() ) < 10 ? '0' + (date.getDate()) : (date.getDate())}`;
    return dateStr;
}
 
