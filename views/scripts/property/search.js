
var markerArray = [];
var markerArrayMob = [];
var marker;
var prices;
var minPrice = "";
var maxPrice = "";
var sorting = "";
var propertyId = "";
var page = "";
var isInstant = "";
var isCardOpen = false;


let map = L.map('map', {
    zoom: 14,
    center: [40.386287, 49.862855],
    doubleClickZoom: true,
    scrollWheelZoom: true,
}).locate({setView: false});

let map_mobile = L.map('map_mobile', {
    zoom: 14,
    center: [40.386287, 49.862855],
    doubleClickZoom: true,
    scrollWheelZoom: true,
}).locate({setView: false});

L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
}).addTo(map);

L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
}).addTo(map_mobile);

var command = L.control({position: 'topleft'});
command.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'command');
    div.innerHTML = `<div class="form-map-search">
    <label class="label-checkbox">
    <input type="checkbox" class="checkbox" id="command">
    <span class="check"></span>
    <span class="check-text">Search by map</span>
    </label>
    </div>`;
    return div;
};

var commandMob = L.control({position: 'topleft'});
commandMob.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'commandMob');
    div.innerHTML = `<div class="form-map-search">
    <label class="label-checkbox">
    <input type="checkbox" class="checkbox" id="commandMob">
    <span class="check"></span>
    <span class="check-text">Search by map</span>
    </label>
    </div>`;
    return div;
};

command.addTo(map);
commandMob.addTo(map_mobile);
BuildPage(SearchResult);

function LoadPage(p) {
    // $.ajax({
    // type: "POST",
    // url: "/ru/search",
    // data: {DateFrom: savedDateFrom, DateTo: savedDateTo, Guests: savedGuests, City :savedCity, Page: p},
    // dataType: 'json',
    // success: function(result) {
    //     $(".catalog-listX").empty();
    //     BuildPage(result[0]);
    //     },
    // error: function(result) {}
    // });
}
var checkBox = document.getElementById("command");
var checkBoxMob = document.getElementById("commandMob");

function SetFilters() {
    //var val = document.getElementById('histogramSlider-slider-value').innerHTML;
    //val = val.split(" - ");
    
    window.scrollTo(0, 0)
    $(".bottom-proceed").hide();
    $(".btn-load").css("display", "flex");

    

    if ($('#histogramSlider-slider-value_start').val() != 0 && $('#histogramSlider-slider-value_end').val() != 0
    && $('#histogramSlider-slider-value_start').val() != null && $('#histogramSlider-slider-value_end').val() != null) {
        minPrice = "/minPrice:" + $('#histogramSlider-slider-value_start').val();
        maxPrice = "/maxPrice:" + $('#histogramSlider-slider-value_end').val();
    }
    else {
        minPrice = "";
        maxPrice = "";
    }
    $(".popups").removeClass('active');
    $("#catalog-listX").empty();
    //$("body").addClass('loader');
    var coordinateFilter = "";
    var amenitiesFilter = "";
    var rulesFilter = "";
    var propertiesFilter="";

    $.each($("input[name='propertytype']:checked"), function(){
        propertiesFilter += "/properties:" + parseInt($(this).attr('id'));
    });

    var maxGuests = document.getElementById("MaxGuests").value == 1 ? "" : "/maxGuests:" + document.getElementById("MaxGuests").value;
    var bedrooms = document.getElementById("Bedrooms").value == 1 ? "" : "/bedrooms:" + document.getElementById("Bedrooms").value;
    var bathrooms = document.getElementById("Bathrooms").value == 1 ? "" : "/bathrooms:" + document.getElementById("Bathrooms").value;

    $.each($("input[name='amenities']:checked"), function(){
    amenitiesFilter += "/amenities:" + parseInt($(this).attr('id'));
    });
    $.each($("input[name='rules']:checked"), function(){
        rulesFilter += "/rules:" + parseFloat($(this).attr('id'));
        });

    if (checkBox.checked == true)
    {
        var crd1 = map.getBounds().getSouthWest().wrap().lat
        var crd2 = map.getBounds().getSouthWest().wrap().lng
        var crd3 = map.getBounds().getNorthEast().wrap().lat
        var crd4 = map.getBounds().getNorthEast().wrap().lng
        coordinateFilter += "/coordinates:"+crd1+"/coordinates:"+crd2+"/coordinates:"+crd3+"/coordinates:"+crd4;
    }

    if (checkBoxMob.checked == true)
    {
        var crd1 = map_mobile.getBounds().getSouthWest().wrap().lat
        var crd2 = map_mobile.getBounds().getSouthWest().wrap().lng
        var crd3 = map_mobile.getBounds().getNorthEast().wrap().lat
        var crd4 = map_mobile.getBounds().getNorthEast().wrap().lng
        coordinateFilter += "/coordinates:"+crd1+"/coordinates:"+crd2+"/coordinates:"+crd3+"/coordinates:"+crd4;
    }
    removeOldMarkers();
    var JsonURL = "/" + Lng + "/" + "property.search/api__Search:1/CityID:" + savedCity + "/checkinDate:"+savedDateFrom+"/checkoutDate:"+savedDateTo+"/AdultGuests:"+savedGuestAdult+"/ChildGuests:"+savedGuestChild+"/BabyGuests:"+savedGuestBaby+"/json:1"+coordinateFilter+amenitiesFilter+propertiesFilter+minPrice+maxPrice+maxGuests+bedrooms+bathrooms+sorting+page+isInstant+rulesFilter;

    $.ajax({
        url : JsonURL,
        type: 'POST',
        async: true,
        //data: filters,
        success : handleData
        })
        function handleData(e) {
        BuildPage(JSON.parse(e));
    }

   // str_del = "/json:1";
    var res = JsonURL.replace("/json:1", "");
    window.history.pushState("object or string", "Title", res);

    //$(".popups").removeClass('active');
    $(".positionTop").removeClass('active'); 
    $(".positionTopMob").removeClass('active'); 
    window.removeEventListener('scroll', noScroll);
    $("body").css("overflow", "visible ")


    // if(Object.keys(group._layers).length){
    //     map.fitBounds(group.getBounds());
    // }
}


function BuildPage(data) {
    dataL = data[0];
    dataP = data[1];
    prices = data[2];
    var iconSrc;
    var testArr = ['4','2','10'];

    $.each(dataL, function(k, v) {
    var PID = dataL[k]["ID"];
    var discount = "1";
    var title = dataL[k]['Title'];
    var status1 = "Умный замок";
    var status2 = "Бесплатная отмена";
    var name = "this is name";
    var priceCrossed = "100";
    var averageReview = dataL[k].AverageReview ? dataL[k].AverageReview : "";
    var countReview = dataL[k].CountReview ? `(${dataL[k].CountReview})` : "";
    FinalPrice = dataL[k]['Price'];
    var DisplayCCY = $.cookie("XX_CCY");
    var instantBookingMark = ""
    var C_Distance;
    // $.each(LngCity, function(k) {
    //     if(LngCity[k][0] == savedCity){
    //         C_Distance = (distance_calc(dataL[k].Latitude, dataL[k].Longitude, LngCity[k][3], LngCity[k][4]) * 10) / 10;
    //     }
    // });
    

    //var C_Distance = Math.round(distance_calc(Booking_List[k]['lat1'], Booking_List[k]['long1'], CityList[k+1][3], CityList[k+1][4]) * 10) / 10;
    var Ccy = CurrencyList[DisplayCCY][2];
    BaseCCY = CCYXRate[dataL[k]['Currency']];
    ForeignCCY = CCYXRate[DisplayCCY];
    priceXR = Math.round(xrateprice(BaseCCY, ForeignCCY, FinalPrice));
    var params = document.location.pathname.split("/")
    var url = `/${Lng}/property.display/api__SingleSearch:1/checkinDate:${params.filter(el => el.includes('checkinDate'))[0].split(":")[1]}/checkoutDate:${params.filter(el => el.includes('checkoutDate'))[0].split(":")[1]}/id:`
    if(dataL[k]['InstantBooking'] == 1) {
        var InstantBooking = Vars['LngSearch']['InstantBooking'];
        var ISymbol = "&#128498; ";
        instantBookingMark = `
                <div class="card-info__left">
                    <img src="/static/img/ic-mod-1.svg" class="card-info__left-icon" alt="">
                    ${Vars['LngSearch']['CheckIn']} 24/7
                </div>`
    } 
    else {
        var InstantBooking = "Запросить квартиру";
        var ISymbol = "";
    }
    if(testArr.includes(PID)){
        iconSrc = '/static/img/ic-mod-4.svg'
    }
    else{
        iconSrc = '/static/img/ic-mod-2.svg'
    }

    marker = L.marker([dataL[k]['Latitude'], dataL[k]['Longitude']],{icon:myIcon = L.divIcon({
    className: 'my-div-icon',
    html: '<div class="map-pin" id="'+dataL[k]["ID"]+'"><span class="map-price">'+ISymbol+priceXR+Ccy+'</span></div>'
    })
    }).addTo(map);

    markerMob = L.marker([dataL[k]['Latitude'], dataL[k]['Longitude']],{icon:myIcon = L.divIcon({
    className: 'my-div-icon',
    html: '<div class="map-pin" id="'+dataL[k]["ID"]+'"><span class="map-price">'+priceXR+Ccy+'</span></div>'
    })
    }).addTo(map_mobile);

    markerArray.push(marker);
    markerArrayMob.push(markerMob);
    var html =  `
        <li class="card-item" id="card${dataL[k]["ID"]}">
        <div class="card-top">
        <div class="card-slider" id="sliderplace">
        </div>
        
        <span class="xx__mob-item-label">${Vars['LngSearch']['SelfCheckIn']}</span>
        <span class="xx__mob-item-like">
        </span>
        <span class="xx__mob-item-lightning"></span>
        
        </div>
        <div class="card-col">
        <div class="card-content">
        <div class="catalog-title">
            <a href="${url}${dataL[k]["ID"]}" class="text-16-catalog xx__mob_ldescr" title="${title}" target="_blank">${title}</a>
            <div class="catalog-rating">
            <div class="rating-word">${CountTotalRating(averageReview)}</div>
            <div class="rating-number"><span class="bold">${averageReview}</span> ${countReview}</div>
            </div>
        </div>
        <div class="card-info">
            <div class="flags">
            <div class="card-info__left xx__mob-rooms">
            ${getLocalizationBedrooms(dataL[k].Bedrooms)}
            </div>
            <div class="card-info__left">
            <img src="/static/img/ic-mod-1.svg" class="card-info__left-icon" alt="">${(distance_calc(dataL[k].Latitude, dataL[k].Longitude, LngCity[savedCity][3], LngCity[savedCity][4]) * 10) / 10 >=1 ? ((distance_calc(dataL[k].Latitude, dataL[k].Longitude, LngCity[savedCity][3], LngCity[savedCity][4]) * 10) / 10).toFixed(1) + ' ' + Vars['LngSearch']['FromCenterKm'] : Math.round((distance_calc(dataL[k].Latitude, dataL[k].Longitude, LngCity[savedCity][3], LngCity[savedCity][4]) * 10) * 100) + ' ' + Vars['LngSearch']['FromCenterMetr'] } 
            </div>
            ${instantBookingMark}
            </div>
            <div class="prices-row">
            <div class="price">
            <div class="prices-row">
            <span class="price-item">${Ccy}${priceXR}</span>
            <div class="night-info">
                <span class="price-crossed"></span>
                <span class="c-blue"><span class="bold">${Ccy}${Math.round(priceXR/CalcNightCount(new Date((savedDateFrom + ' 00:00:00').replace(' ', 'T')), new Date((savedDateTo + ' 00:00:00').replace(' ', 'T'))))} </span>${Vars['LngSearch']['PerNight']}</span>
            </div>
            </div>
            </div>
            </div>
        </div>
        
        </div>
        <div class="card-bottom xx__mob--hidden">
        <div class="bottom-like"><img src="${iconSrc}" class="bottom-like-icon" alt="">${Vars['LngSearch']['Remember']}</div>    
        <button class="instant_booking"><div class="bottom-proceed"><div class="lightning_icon">${ISymbol}</div> ${InstantBooking}</div>
            <div class="btn-load">
            <div class="fountainG" id="fountainG_1"></div>
            <div class="fountainG" id="fountainG_2"></div>
            <div class="fountainG" id="fountainG_3"></div>
            </div>
        </button>
        </div>
        </div>
        </li>
        `
        $("#catalog-listX").append(html);
    });
    $.each(dataP, function(k, v) {
        if(dataP[k].Type == 1){
            var imgH = '<div class="slide"><img src="/static/uploads/listings/thumbs/'+dataP[k]['Filename']+'" alt="image room" class="card-img"></div>';
            $("#catalog-listX #card"+dataP[k]['ListingID']+" #sliderplace").append(imgH);
        }
    });
    $.each(dataP, function(k, v) {
        if(dataP[k].Type == 0){
            var imgH = '<div class="slide"><img src="/static/uploads/listings/thumbs/'+dataP[k]['Filename']+'" alt="image room" class="card-img"></div>';
            $("#catalog-listX #card"+dataP[k]['ListingID']+" #sliderplace").append(imgH);
        }
    });

   

{/* <div class="bottom-like"><img src="/static/img/ic-mod-2.svg" class="bottom-like-icon" alt="">Запомнить</div> */}

    //Slider in cards
    $(".card-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    });
    $(".xx__mob-item-like").on('click', function () {
        $(this).toggleClass("active");
    })
    //$("body").removeClass('loader');
}

    $("#mob_popup_toggle").on('click', function(e) {
        e.preventDefault()
        // $(this).toggleClass('xx__mob-header--hidden');
        $('.xx__mob .catalog-content').toggleClass("xx__mob-content");
        $('.xx__mob-toggle').slideToggle();
        $('.xx__mob-toggle').toggleClass("active");
        $(this).toggleClass("xx__mob-header-btn--scale");
    });

var group = new L.featureGroup(markerArray);
var groupMob = new L.featureGroup(markerArrayMob);


$(document).on('click', '.map-pin', function(e) {
    focusCard($(this).attr('id'));
});

function focusCard(id) {
    var element = document.getElementById("card" + id);

    var cardsToRemove = document.querySelectorAll('.text-16-catalog');
    $.each(cardsToRemove, function(i,v){
        //console.log(v);
        $(v).removeClass('selected');
    })

    var childElement = element.querySelector('.text-16-catalog');
    $(childElement).addClass('selected');
   
    // $(element).addClass('selected').siblings().removeClass('selected');
    var headerOffset = -70;
    var elementPosition = childElement.getBoundingClientRect().top + window.pageYOffset + headerOffset;

    window.scrollTo ({
        top: elementPosition,
        behavior: "smooth"
    });
}

$(document).on('mouseover', '.card-item', function() {
//$(".card-item").mouseover(function () {
    let index = $(this).index();
    $(".my-div-icon").eq(index).addClass('active').siblings().removeClass('active');
});

$(".card-item").mouseout(function () {
    if($(".catalog__head").css("display") != "none")
    $(".my-div-icon").removeClass('active');
});

map.on('zoomend', function(e) {
    if (checkBox.checked == true) {
        SetFilters();
    }
});

map.on('dragend', function(e) {
    if (checkBox.checked == true) {
        SetFilters();
    }
});

map_mobile.on('zoomend', function(e) {
    if (checkBoxMob.checked == true) {
        SetFilters();
    }
});

map_mobile.on('dragend', function(e) {
    if (checkBoxMob.checked == true) {
        SetFilters();
    }
});

function FilterPage(swLat, swLng, neLat, neLng) {
    $.ajax({
        type: "POST",
        url: "/ru/search",
        data: {SouthWestLat: swLat, SouthWestLng: swLng, NorthEastLat: neLat, NorthEastLng :neLng, Map: 1},
        dataType: 'json',
        success: function(result) {
        $(".catalog-listX").empty();
        BuildPage(result);
        },
        error: function(result) {
        // alert('error');
        }
    });
}

$.each(Amenities, function(k, v) {
    $('.AmenitiesList').append(`
    <label class="label-checkbox">
    <input type="checkbox" name="amenities" class="checkbox" id="${k}">
    <span class="check-item"></span>
    <span class="check-text">${v[0]}</span>
    </label>
    `
    );
});

$.each(PropertyType, function(k, v) {
    $('.PropertyType').append(`
    <label class="label-checkbox">
    <input type="checkbox" name="propertytype" class="checkbox" id="${k}">
    <span class="check-item"></span>
    <span class="check-text">${v}</span>
    </label>
    `);
});

$.each(Rules, function(k, v) {
    $('.RulesList').append(`
    <label class="label-checkbox">
    <input type="checkbox" name="rules" class="checkbox rules" id="${k}">
    <span class="check-item"></span>
    <span class="check-text">${v[v[3]]}</span>
    </label>
    `);
});

function removeOldMarkers() {
    for(i=0; i < markerArray.length; i++) {
        map.removeLayer(markerArray[i]);
        map_mobile.removeLayer(markerArrayMob[i]);
    }
}


//var listings =  [60, 50, 72, 61, 31, 90, 75, 42, 99, 83, 36, 82, 171, 52, 148, 134, 109, 37, 42, 192, 86, 38, 47, 200, 163, 145, 133, 104, 23, 140, 125, 62, 180, 202, 170, 112, 20, 54, 141, 178, 67, 192, 23, 57, 58, 88, 27, 186, 101, 155, 190, 20, 154, 30, 128, 122, 43, 130, 64, 208, 92, 79, 174, 211, 146, 106, 35, 45, 210, 187, 211, 197, 62, 100, 159, 161, 78, 178, 118, 195, 187, 39, 70, 110, 155, 144, 48, 55, 107, 60, 52, 218, 132, 50, 61, 185, 128, 79, 135, 97];

$(function () {
    var numBins = 50;

    // if (prices.length > 0 && prices.length <= 100)
    //     numBins = prices.length / 2;

    listingPrices = dataFactory(prices.length);
    function dataFactory(itemCount) {
        var data = [];
        for (var i = 0; i < itemCount; i++) {
            if (prices[i].value) {
                var v = parseInt(prices[i].value);
                data.push(v);
            }
        }
        return data;
    }
    console.log("listingPrices[0] : " + listingPrices[0]);
    console.log("listingPrices[listingPrices.length - 1] : " + listingPrices[listingPrices.length - 1]);
   

    listingPrices = listingPrices.sort(function (a, b) {
        return a - b;
    });

    $("#histogramSlider").histogramSlider({
        data: prices,
        sliderRange: [listingPrices[0], listingPrices[listingPrices.length - 1]],
        optimalRange: [0, 0],
        selectedRange: [listingPrices[0], listingPrices[listingPrices.length - 1]],
        numberOfBins: numBins,
        showTooltips: false,
        showSelectedRange: true,
        height: 100,
        pureData: listingPrices,
        sliderRangeStart: listingPrices[0]
    });
    $("#histogramSliderMob").histogramSlider({
        data: prices,
        sliderRange: [listingPrices[0], listingPrices[listingPrices.length - 1]],
        optimalRange: [0, 0],
        selectedRange: [listingPrices[0], listingPrices[listingPrices.length - 1]],
        numberOfBins: numBins,
        showTooltips: false,
        showSelectedRange: true,
        height: 100,
        pureData: listingPrices,
        sliderRangeStart: listingPrices[0]
    });
});

function setCityName(id) {
    $.getJSON('/static/JSON/city.json', function(data) {
        $.each(data, function(k, v) {
            if(v['id'] === id) {
               $("#js-easyAutocomplete").val(v['cityname']);
               //document.getElementById("CityID-Mob").innerHTML = v['cityname'].split(",")[0];
            }
        });
    });
}

// var Month = ["Янв",
// "Фев",
// "Мар",
// "Апр",
// "Май",
// "Июн",
// "Июл",
// "Авг",
// "Сен",
// "Окт",
// "Ноя",
// "Дек"];

var queryString = window.location.pathname;

moment.locale(Lng)

var par = queryString.split("/");
var datesFull = "";
var dateShort = "";
var dateShort2 = "";
var guestsCount = 0;
for(i = 0; i < par.length; i++) {
    if (par[i].indexOf('CityID') > -1) {
        $("#cityId").val(par[i].split(":")[1]);
        setCityName(par[i].split(":")[1]);
    }
    if (par[i].indexOf('checkinDate') > -1) {
        // datesFull = datesFull + par[i].split("-")[2] + " " + Month[parseInt(par[i].split("-")[1]) - 1] + " " +  par[i].split("-")[0].split(":")[1];
        datesFull = datesFull + moment(par[i], 'YYYY-MM-DDTHH:mm:ssZ').format("DD MMM");
        dateShort = moment(par[i], 'YYYY-MM-DDTHH:mm:ssZ').format("YYYY-MM-DD");
    }
    if (dateShort != ""){
        $("#arrivalMobDate").val(dateShort);
        dateShort = moment(dateShort).format("DD MMM")
        $('#arrivalMob').val(dateShort);
        dateShort = ""
    }
    if (par[i].indexOf('checkoutDate') > -1) {
        // datesFull = datesFull + " - " + par[i].split("-")[2] + " " + Month[parseInt(par[i].split("-")[1]) - 1] + " " + par[i].split("-")[0].split(":")[1];
        datesFull = datesFull + " - " + moment(par[i], 'YYYY-MM-DDTHH:mm:ssZ').format("DD MMM");
        dateShort2 = moment(par[i], 'YYYY-MM-DDTHH:mm:ssZ').format("YYYY-MM-DD");
    }
    if (dateShort2 != ""){
        $("#departureMobDate").val(dateShort2);
        dateShort2 = moment(dateShort2).format("DD MMM")
        $('.input-date').val(datesFull);
        $('.search_info_mob_date').text(datesFull);
        $('#checkinDate').val(savedDateFrom);
        $('#checkoutDate').val(savedDateTo);
        $('#input-date-mob').text(datesFull);
        $('#departureMob').val(dateShort2);
        dateShort2 = ""
    }
        // document.getElementById('input-date-mob').innerHTML = dateShort;


    if (par[i].indexOf('AdultGuests') > -1) {
       guestsCount += parseInt(par[i].split(":")[1]);
       $('#AdultGuests').val(parseInt(par[i].split(":")[1]));
    }
    if (par[i].indexOf('ChildGuests') > -1) {
        guestsCount += parseInt(par[i].split(":")[1]);
        $('#ChildGuests').val(parseInt(par[i].split(":")[1]));
    }
    if (par[i].indexOf('BabyGuests') > -1) {
        guestsCount += parseInt(par[i].split(":")[1]);
        $('#BabyGuests').val(parseInt(par[i].split(":")[1]));
    }
    $('.input-visitor').val(guestsCount + " " + Vars.LngHome.Person);
    $('.search_info_mob_guests').text(guestsCount + " " + Vars.LngHome.Person);
    $('.Guest-mob-toggle').val(guestsCount + " " + Vars.LngHome.Person);
    $('#Guest-mob-toggle').val(guestsCount + " " + Vars.LngHome.Person);
    // document.getElementById('guest-mob').innerHTML = guestsCount + " " + Person;
}

$("#filterByPrice").click(function (e) {
    e.preventDefault();
    var val = document.getElementById('histogramSlider-slider-value').innerHTML;
    val = val.split(" - ");

    console.log(val[0]);
    if (val[0] != 0 && val[1] != 0 && val[0] && val[1]) {
        minPrice = "/minPrice:" + val[0];
        maxPrice = "/maxPrice:" + val[1];
    }
    else {
        minPrice = "";
        maxPrice = "";
    }
    SetFilters();
});

$('#resetFilters').click(function (e) {
    var el = document.getElementById('filtersPopup');
    checkBoxes = el.querySelectorAll('.checkbox');
    
    $.each(checkBoxes, function(i,v){
        $(v).prop('checked', false);
    });

    document.getElementById("MaxGuests").value = 1;
    document.getElementById("Bedrooms").value = 1;
    document.getElementById("Bathrooms").value = 1;

});

$(".sort").click(function () {
    $(this).addClass('selected').siblings().removeClass('selected');
    sorting = "/sorting:" + this.id;
    SetFilters();
});


function saveListing(ListingID) {
    $.ajax({
        type: "GET",
        url: "/ru/c_savedlistings",
        data: {
            DoAdd : 1,
            listing: ListingID,
        },
        success: function(result) {
        },
        error: function(result) {
             alert(result);
        }
    });
}

function forgetListing(ListingID) {
    $.ajax({
        type: "GET",
        url: "/ru/c_savedlistings",
        data: {
            DoDelete : 1,
            listing: ListingID,
        },
        success: function(result) {
        },
        error: function(result) {
             alert(result);
        }
    });
}

$(document).ready(async function(){
    var city = $("#cityId").val();
    const getCity = await 
        fetch(`/api/v1/api__GetCity:1/CityId:${city}`);
        const getCity_data = await (getCity).json();

    if(getCity_data){
        $(".City").val(getCity_data[0].City)
        $("#CityID-Mob-toggle").val(getCity_data[0].City)
        $("#CityID-Mob").text(getCity_data[0].City)
    }
})

async function addToFavorites(e, ic, pid){
    var icon;
    var save;
    var id;

    if($(e.target).hasClass("bottom-like-icon")){
        icon = e.target;
    }
    else{
        icon = $(e.target).find('img');
    }

    if($(icon).attr("src") == `/static/img/ic-mod-${ic}.svg`){
        $(icon).attr("src", "/static/img/ic-mod-4.svg")
        save = 1;
    }
    else{
        $(icon).attr("src", `/static/img/ic-mod-${ic}.svg`)
        save = 0;
    }
    
    if(!pid){
        id = $(e.target).closest(".card-item").attr("id").slice(4)
    }
    else{
        id = pid;
    }
    const fav = await 
        fetch(`/api/v1/api__Favorites:1/id:${id}/save:${save}`);
        const result = await (fav).json();

        if(!result){
            if(save){
                $(icon).attr("src", `/static/img/ic-mod-${ic}.svg`)
            }
            else{
                $(icon).attr("src", "/static/img/ic-mod-4.svg")
            }
            toastr.error('Authentication required')
        }
}

$(".bottom-like").on("click", async (e) => {
    await addToFavorites(e, 2);
})

$(document.body).on("click", ".like_card_btn", async (e) => {
    await addToFavorites(e, 3, propertyId);
})


$(document.body).on("click", ".text-16-catalog", (e) => {
    // e.preventDefault()
    // var id = $(e.target).closest(".card-item").attr("id").slice(4);
    // propertyId = id;


    // var url = window.location.pathname + `/propertyID:${propertyId}`;
    // window.history.pushState({ path: url }, '', url);
    
    // OpenCard(id)
})

$(document.body).on("click", ".instant_booking", (e) =>{
    if($(window).width() > 767){
        var url = $(e.target).closest(".card-item").find(".text-16-catalog").attr("href");
        window.open(url, "_blank")
    }
})

$(document.body).on("click", ".slick-list", (e) =>{
    var url = $(e.target).closest(".card-item").find(".text-16-catalog").attr("href");
    window.open(url, "_blank")
})

async function OpenCard(id){
    isCardOpen = true;
    
    if(!propertyId){
        propertyId = document.location.href.substring(document.location.href.search('propertyID')+11)
    }

    let index = $(`#card${id}`).closest(".card-item").index();
    $(".my-div-icon").eq(index).addClass('active').siblings().removeClass('active');
    ChangeStep(1)
    var imgArr = dataP.filter(el => el.ListingID == id);
    var title = dataL.filter(el => el.ID == id)[0].Description;
    
    $(".catalog__head").hide();
    $(".catalog-listX").hide();
    $(".pagination").hide();
    $(".footer-mob").hide();
    $(".xx__mob-map").hide();
    if($(window).width() > 991){
        $(".catalog-content").addClass('calc_card_content');
    }
    $(".leaflet-top.leaflet-left").hide();
    $(".property_card_content").show();

    await LoadCardData(id);

    $.each(imgArr, function(k, v) {
        if(imgArr[k]['Type'] == 1){
            $(".pic_section_1").html(`<a>
                                            <img src="/static/uploads/listings/${imgArr[k]['Filename']}" alt="${k+1}">
                                        </a>`)
        }
        else{
            $(".pic_section_2").append(`<div class="pic_section_item">
                                            <a>
                                                <img src="/static/uploads/listings/thumbs/${imgArr[k]['Filename']}" alt="${k+1}">
                                            </a>
                                        </div>`)
        }

        $(".modal-content").append(`<div class="mySlides">
                                        <img src="/static/uploads/listings/${imgArr[k]['Filename']}" alt="${k+2}" style="width:100%">
                                        <div class="numbertext">${k+1} / ${imgArr.length}</div>
                                    </div>`);
        
        var imgH = '<div class="slide"><img src="/static/uploads/listings/'+imgArr[k]['Filename']+'" alt="image room" class="card-img"></div>';
        $(".property_card-slider").append(imgH);
    });


    $($(".pic_section_2 a img")[1]).css("border-top-right-radius", "10px");
    $($(".pic_section_2 a img")[3]).css("border-bottom-right-radius", "10px")
    
    if (window.matchMedia("(max-width: 991px)").matches){
        $(".property_card-slider").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            });
    }

    $(".property_head_card_title").html(title);

    $(".share_by_link input").val(document.location.href)


    

    // for(var i = 1; i<= xx_cal_items.length; i++){
    //     if(i%7==0){
    //         $(xx_cal_items[i]).css("margin-right", "2%")
    //         $(xx_cal_items[i]).css("padding-right", 0)
    //     }
    // }
    var cw = $(".xx-enabled").width()
    $(".xx-enabled").height(cw);

    window.scrollTo(0, 0)
    // $(".account_exist a").attr("href", $(".account_exist a").attr("href") + document.location.href.substring(document.location.href.search('api__Search:1') + 13))
}

$(".back_to_search_btn").on("click", () => {
    var params = document.location.pathname.split("/")
    $.each(params, (i) =>{
        if(params[i].includes("propertyID")){
            params.splice(i, 1)
        }
    })
    var url = params.toString().replaceAll(",","/")
    window.history.pushState({ path: url }, '', url);

    // window.history.back();
    CloseCard()
    $("html, body").animate({ scrollTop: $(`#card${propertyId}`).offset().top - 100 }, 300)
})


function CloseCard(){
    
    isCardOpen = false;
    $(".property_card_content").hide();
    $(".pic_section_2").empty();
    $(".property_params").empty();
    $(".bedrooms .pc_content").empty();
    $(".property_card-slider").empty();
    $(".property_card-slider").removeClass("slick-initialized").removeClass("slick-slider");
    $(".collapse_amenities").remove();
    $(".collapse_rules").remove();
    $(".mySlides").remove();
    $(".catalog-content").removeClass('calc_card_content');
    $(".catalog__head").show();
    $(".xx__mob-map").show();
    $(".leaflet-top.leaflet-left").show();
    
    if (window.matchMedia("(max-width: 991px)").matches){
        $(".footer-mob").show()
    }
    $(".catalog-listX").show();
    $(".pagination").show();
    // SetFilters();
    // $("html, body").animate({ scrollTop: $(`#card${propertyId}`).offset().top - 100 }, 300);

    // $(".account_exist a").attr("href", $(".account_exist a").attr("href").slice(0, 15))
}


var card_data = '';

async function LoadCardData(id){
    
    var testArr = ['4','2','10'];
    const card_load = await 
        fetch(`/${Lng}/search/api__Display:1/id:${id}`);
    card_data = await (card_load).json();
    var DisplayCCY = $.cookie("XX_CCY");
    var Ccy = CurrencyList[DisplayCCY][2];
    // $(".pc_footer_price").html(`<p>${Ccy}${priceXR}</p>`)

    console.log(card_data);
    GenerateCardListigs(card_data.Page_Data_Listings[0]);
    
    var bedrooms = groupBy(card_data.Page_Data_Beds, 'RoomID');
    GenerateCardBedrooms(bedrooms);
    
    GenerateCardRules(card_data.Page_Data_Rules);
    GenerateCardAmenities(card_data.Page_Data_Amenities);
    GenerateCardReviews(card_data.PropertyReviews)

    if(testArr.includes(id)){
        $(".like_card_btn img").attr("src", "/static/img/ic-mod-4.svg")
    }
    else{
        $(".like_card_btn img").attr("src", "/static/img/ic-mod-3.svg")
    }
}



var groupBy = function(xs, key) {
    if(xs){
        return xs.reduce(function(rv, x) {
          (rv[x[key]] = rv[x[key]] || []).push(x);
          return rv;
        }, {});
    }
  };


  function GenerateCardListigs(pdl){
    var Area = `Площадь ${pdl.Area}кв.м.`;
    var Bathrooms_count = pdl.Bathrooms;
    var Bedrooms_count = pdl.Bedrooms;
    var MaxGuests_count = pdl.MaxGuests;
    var Floor = `${pdl.CurrentFloor}/${pdl.TotalFloor} этаж`
    
    if(Bathrooms_count == 1) Bathrooms_count+=' ванная';
    else Bathrooms_count+=' ванных';

    if(Bedrooms_count == 1) Bedrooms_count+=' спальня';
    else Bedrooms_count+=' спальни';

    if(MaxGuests_count == 1) MaxGuests_count+=' гость';
    else if(1 < MaxGuests_count < 5) MaxGuests_count+=' гостя';
    else MaxGuests_count+=' гостей';

    var property_params = [Area, MaxGuests_count, Bedrooms_count, Bathrooms_count, Floor]
    $.each(property_params, function(k) {
        $(".property_params").append(`<li class="property_params_item">${property_params[k]}</li>`)
    });

    $.each(LngArriveTime, function(k) {
        if(LngArriveTime[k][0] == pdl.CheckInTime){
            $(".card_arrive").html(LngArriveTime[k][1])
        }
        if(LngArriveTime[k][0] == pdl.CheckOutTime){
            $(".card_departure").html(LngArriveTime[k][1])
        }
    });

    $(".free_cancel").html(`Бесплатная отмена до ${moment().add(14, 'days').format("DD MMMM")} <a href="#">Подробнее</a>`)

    
    $(".pc_price_label_mob").html(`<p class='pc_price_label_price'>${pdl.BasePrice}`)
    
  }
  

  function GenerateCardBedrooms(bdr){
    var bd_counter = 1
    $.each(bdr, (i) => {
        $(".bedrooms .pc_content").append(`<div class="bedroom pc_content_item ${i}rm">
                                                <div class="badroom_icon ${i}rm_icons">
                                                </div>
                                                <div class="bedroom_text ${i}rm_text">
                                                    <div class="pc_content_item_title">
                                                        ${getRoomType(i)} ${bd_counter}
                                                    </div>
                                                        <div class="pc_content_item_text">
                                                    </div>
                                                </div>
                                            </div>`)
        $.each(bdr[i], (j) =>{
            $.each(LngBedType, (e) => {
                if(bdr[i][j].BedType == e){
                    $(`.${i}rm_icons`).append(`
                        <img src="/static/img/${LngBedType[e][2]}.svg" alt="">
                    `)
                    $(`.${i}rm_text .pc_content_item_text`).append(`${LngBedType[e][0]}`)
                    if(j < bdr[i].length -1 ) $(`.${i}rm_text .pc_content_item_text`).append(', ')
                }
            })
        })
        bd_counter++;
    })
  }

  function getRoomType(roomId){
      var rt = '';
      $.each(card_data.Page_Data_Rooms, function (i){
        if(card_data.Page_Data_Rooms[i].ID == roomId){
            if(card_data.Page_Data_Rooms[i].RoomType == 1){
                rt = "Спальня"
            }
            else{
                rt = "Комната"
            }
        }
      })
      return rt;
  }

  function GenerateCardRules(rules){
    if(rules){
        $(".rules .pc_content").html('<div class="pc_content_sec"></div>')
        $(".rules .pc_content").append(`
        <div class="pc_content_sec_hidden hidden"><div class="hidden_content"></div></div>
        `)
        $.each(rules, (i) =>{
            $.each(Rules, (e) => {
                if(rules[i].RuleID == e){
                    if(i < 6){
                        if(rules[i].Value == 1){
                            $(".rules .pc_content .pc_content_sec").append(`
                                <div class="pc_content_item">
                                    <div class="pc_content_item_icon">
                                        <img src="/static/v2/img/wi-fi.svg" alt="">
                                    </div>
                                    <div class="pc_content_item_text">
                                        ${Rules[e][0]}
                                    </div>
                                </div>
                            `)
                        }
                        else{
                            $(".rules .pc_content .pc_content_sec").append(`
                                <div class="pc_content_item disabled">
                                    <div class="pc_content_item_icon">
                                        <img src="/static/v2/img/wi-fi.svg" alt="">
                                    </div>
                                    <div class="pc_content_item_text">
                                        ${Rules[e][2]}
                                    </div>
                                </div>
                            `)
                        }
                    }
                    else{
                        if(rules[i].Value == 1){
                            $(".rules .pc_content .hidden_content").append(`
                                <div class="pc_content_item">
                                    <div class="pc_content_item_icon">
                                        <img src="/static/v2/img/wi-fi.svg" alt="">
                                    </div>
                                    <div class="pc_content_item_text">
                                        ${Rules[e][0]}
                                    </div>
                                </div>
                            `)
                        }
                        else{
                            $(".rules .pc_content .hidden_content").append(`
                                <div class="pc_content_item disabled">
                                    <div class="pc_content_item_icon">
                                        <img src="/static/v2/img/wi-fi.svg" alt="">
                                    </div>
                                    <div class="pc_content_item_text">
                                        ${Rules[e][2]}
                                    </div>
                                </div>
                            `)
                        }
                    }
                }
            })
        })
        
        if(rules.length > 6){
            $(".rules").append(`
                <button class="collapse_rules"><p>смотреть все правила </p> 
                    <img src="/static/v2/img/arrow-down.svg">
                </button>
            `)
        }
    }
  }


  
  function GenerateCardAmenities(amenities){
    if(amenities){
        $(".amenities .pc_content").html('<div class="pc_content_sec"></div>')
        $(".amenities .pc_content").append(`
        <div class="pc_content_sec_hidden hidden"><div class="hidden_content"></div></div>
        `)
        $.each(amenities, (i) =>{
            $.each(Amenities, (e) => {
                if(amenities[i].AmenityID == e){
                    if(i < 6){
                    $(".amenities .pc_content .pc_content_sec").append(`
                        <div class="pc_content_item">
                            <div class="pc_content_item_icon">
                                <img src="/static/v2/img/wi-fi.svg" alt="">
                            </div>
                            <div class="pc_content_item_text">
                                ${Amenities[e][0]}
                            </div>
                        </div>
                    `)
                    }
                    else{
                        $(".amenities .pc_content .hidden_content").append(`
                        <div class="pc_content_item">
                            <div class="pc_content_item_icon">
                                <img src="/static/v2/img/wi-fi.svg" alt="">
                            </div>
                            <div class="pc_content_item_text">
                                ${Amenities[e][0]}
                            </div>
                        </div>
                    `)
                    }
                }
            })
        })

        if(amenities.length > 6){
            $(".amenities").append(`
                <button class="collapse_amenities"><p>смотреть все удобства </p> 
                    <img src="/static/v2/img/arrow-down.svg">
                </button>
            `)
        }
    }
  }

    
  function GenerateCardReviews(rv){
    if(rv){
        $(".property_reviews").html('<div class="rv_content"></div>')
        var totalRating = 0
        $.each(rv, (i) =>{
            var indRating = (+rv[i].Cleanliness + +rv[i].Accuracy + +rv[i].Communication + +rv[i].Location + +rv[i].Price)/5;
            totalRating+=indRating;
            $(".property_reviews .rv_content").append(`
                <div class="rv_item rv_item_${rv[i].ID}">
                    <div class="rv_name">
                        ${rv[i].Name + " " + rv[i].Surname} (${indRating})
                    </div>
                    <div class="rv_date">
                        ${moment(rv[i].Date).format("DD MMM YYYY")}
                    </div>
                    <div class="rv_text">
                        
                    </div>
                </div>
            `)
            if(rv[i].liked){
                $(`.property_reviews .rv_content .rv_item_${rv[i].ID} .rv_text`).append(`
                    <div class="rv_liked_${rv[i].ID} rv_l">
                        <div class='rv_liked_text'><div class="rvt"><span>+</span>${rv[i].liked}</div></div>
                    </div>
            `)
            }
            if(rv[i].notliked){
                $(`.property_reviews .rv_content .rv_item_${rv[i].ID} .rv_text`).append(`
                    <div class="rv_notliked_${rv[i].ID} rv_nl">
                        <div class='rv_notliked_text'><div class="rvt"><span>-</span>${rv[i].notliked}</div></div>
                    </div>
                `)
            }
            var moreLess = false;
            if($(`.rv_notliked_${rv[i].ID} .rv_notliked_text`).height() > 13){
                moreLess = true;
                $(`.rv_notliked_${rv[i].ID} .rv_notliked_text`).addClass("collapsed_text");
                $(`.rv_notliked_${rv[i].ID} .rv_notliked_text .rvt`).css("overflow", "hidden");
                $(`.rv_notliked_${rv[i].ID} .rv_notliked_text .rvt`).css("white-space", "nowrap");
            }
            if($(`.rv_liked_${rv[i].ID} .rv_liked_text`).height() > 13){
                moreLess = true;
                $(`.rv_liked_${rv[i].ID} .rv_liked_text`).addClass("collapsed_text");
                $(`.rv_liked_${rv[i].ID} .rv_liked_text .rvt`).css("overflow", "hidden");
                $(`.rv_liked_${rv[i].ID} .rv_liked_text .rvt`).css("white-space", "nowrap");
            }

            if(moreLess){
                $(`.rv_item_${rv[i].ID} .rv_text`).append(`<button class="collapse_text_btn"><p>Читать полностью </p> 
                    <img src="/static/v2/img/arrow-down.svg">
                </button>`)    
            }
        })
        totalRating = (totalRating/rv.length).toFixed(2);
        var totalRatingName = CountTotalRating(totalRating)
        $(".property_reviews").prepend(`<div class="property_description_title">
                        Отзывы <span> — </span>
                        <div class="review_rating">
                            ${totalRatingName} (${totalRating})
                        </div>
                    </div>
        `)
        
    }
  }


  function CountTotalRating(rt){
    var rtn = ""
    var a = parseInt(rt, 10)
    switch(true){
        case (0 <= a && a < 2):
            rtn = LngTotalRating[1];
            break;
        case (2 <= a && a < 4):
            rtn = LngTotalRating[2];
            break;
        case (4 <= a && a < 7):
            rtn = LngTotalRating[3];
            break;
        case (7 <= a && a < 9):
            rtn = LngTotalRating[4];
            break;
        case (9 <= a && a < 10):
            rtn = LngTotalRating[5];
            break;
        case (a == 10):
            rtn = LngTotalRating[6];
            break;
        default:
            rtn = LngTotalRating[7];
    }

    return rtn;
  }


  $(document.body).on('click', '.bk_step_btn', function(){
    ChangeStep($("li.bk_step.selected_step_bk").index() + 2)
  })

  $(document.body).on('click', '.bk_content_back', function(){
    ChangeStep($("li.bk_step.selected_step_bk").index())
    
    var cw = $(".xx-enabled").width()
    $(".xx-enabled").height(cw);
})
    $(document.body).on('click', '.bk_close_btn', function(){
        if($(".step_1").hasClass("active_step") || $(".step_4").hasClass("active_step")){
             $(".booking").hide();
            window.removeEventListener('scroll', noScroll);
            $("body").css("overflow", "visible ")
        }
        else{
            ChangeStep($("li.bk_step.selected_step_bk").index())
        }
       
    })

$(document.body).on('click', '.bk_step', function(e){
  ChangeStep($(e.target).index() + 1)
})

function ChangeStep(step){
    $(".bk_step_content.step_"+step).addClass('active_step').siblings().removeClass('active_step')
    $($("li.bk_step")[step-1]).addClass('selected_step_bk').siblings().removeClass('selected_step_bk');
    
    $(".steps_mob_count").html(step)
    if(step == 2){
        $(".bk_content_back").show();
    }
    else{
        $(".bk_content_back").hide();
    }
    if(step == 3){
        $(".bk_pn").text($(".bk_step_2_code").val() + $(".bk_step_2_phone").val())
    }
}


window.onpopstate = function(event) {
    FilterUrl()
    if(isCardOpen){
        CloseCard()
    }
    window.removeEventListener('scroll', noScroll);
    $("body").css("overflow", "visible ")
};




function FilterUrl(){
    var params = document.location.pathname.split("/")

    $.each(params, (i) =>{
        if(params[i].includes("InstantBooking")){
            $(".check-reservation-inp").prop('checked', true)
        }

        if(params[i].includes("Page")){
            var page = params[i].substr(5)
            if(page < 1) page = 1;

            $(".pagination .page-link.active").removeClass("active");
            $($(".pagination .page-link")[page - 1]).addClass("active");
        }
    })
}

function getLocalizationBedrooms(count){
    console.log(count);
    if (count == 1)
    return  count + " " + Vars['LngSearch']["Room1"]
    else if (count == 2 || count == 3 || count == 4)
    return  count + " " + Vars['LngSearch']["Room2"]
    else return count + " " + Vars['LngSearch']["Room3"]
}

$(document).ready(function(){
    $(".pc_footer_book_btn").on("click", function(){
        $(".booking").show();
        var cw = $(".xx-enabled").width()
        $(".xx-enabled").height(cw);
        window.addEventListener('scroll', noScroll);
        $("body").css("overflow", "hidden ")

    })
    // $(".bk_close_btn").on("click", function(){
    //     $(".booking").hide();
    //     window.removeEventListener('scroll', noScroll);
    //     $("body").css("overflow", "visible ")
    // })

    $(".bk_close_btn_mob").on("click", function(){
        // var params = document.location.pathname.split("/")
        // $.each(params, (i) =>{
        //     if(params[i].includes("propertyID")){
        //         params.splice(i, 1)
        //     }
        // })
        // var url = params.toString().replaceAll(",","/")
        // window.history.pushState({ path: url }, '', url);

        // // window.history.back();
        // CloseCard()
        // if(propertyId){
        //     $("html, body").animate({ scrollTop: $(`#card${propertyId}`).offset().top - 100 }, 300)
        // }
    })

    if(userID){
        $(".account_exist").hide()
    }

    $("#bk_doc_front").on("click", () => {
        $("#bk_doc_front_hidden").trigger("click")
    })
    $("#bk_doc_back").on("click", () => {
        $("#bk_doc_back_hidden").trigger("click")
    })

    

    $(".bk_pn_check_input").keyup(function () {
        if (this.value.length == this.maxLength) {
            console.log(this)
          $(this).next('.bk_pn_check_input').focus();
        }
    });

    $($(".bk_pn_check_input")[3]).keyup(() =>{
        $($(".bk_pn_check_input")[3]).trigger("blur")
        ChangeStep(4)
    }) 

    $('input').focus((e) => {
        e.preventDefault(); 
        e.target.focus({preventScroll: true});
      })

      $('.xx__mob-map-btn').on('click', () => {
        //   $('.leaflet-control-container').hide();
        //   $('.footer-mob').hide();
        //   $('#map').addClass('active_map');
        //   $('#map').css('position', 'fixed !important');
        //   $("#command").trigger('click')
          $(".map_footer_mob a").attr('href', document.location.pathname);
          $('.map_mob').removeClass('hidden');
          setTimeout(function() {
            map_mobile.invalidateSize();
            map_mobile.fitBounds(groupMob.getBounds());
            checkBoxMob.checked = true
          }, 10);
      })

      $(".map_footer_search_btn").on('click', () => {
        // $("#command").trigger('click')
        // $('#map').removeClass('active_map');
        // $('.map_footer_mob').addClass('hidden');
          $('.map_mob').addClass('hidden');
          
      })

      $('.search-catalog .input-catalog').on('change', () => {
        $(".search-catalog_btn").removeClass('hidden')
      })

      $(".search-catalog_btn").on('click', () => {
          var city = $('#cityId').val();
          var cid = $('#checkinDate').val();
          var cod = $('#checkoutDate').val();
          var ag = $('#AdultGuests').val();
          var cg = $('#ChildGuests').val();
          var bg = $('#BabyGuests').val();
          var JsonURL = `/${Lng}/property.search/api__Search:1/CityID:${city}/checkinDate:${cid}/checkoutDate:${cod}/AdultGuests:${ag}/ChildGuests:${cg}/BabyGuests:${bg}${document.location.href.substring(document.location.href.search('/BabyGuests:')+13)}`

          document.location = JsonURL;
        //   $.ajax({
        //       url : JsonURL,
        //       type: 'POST',
        //       async: true,
        //       //data: filters,
        //       success : handleData
        //       })
        //       function handleData(e) {
        //       BuildPage(JSON.parse(e));
        //   }
      
         // str_del = "/json:1";
        //   var res = JsonURL.replace("/json:1", "");
        //   window.history.pushState("object or string", "Title", res);
      })

        $('.check-reservation').on('click', () => {
            if(!$(".check-reservation-inp").prop('checked')){
                isInstant = '/InstantBooking:1'
            }
            else{
                isInstant = ''
            }
            SetFilters();
        })

        if(Object.keys(group._layers).length){
            map.fitBounds(group.getBounds());
        }
        FilterUrl();
})

  function CalcNightCount(d1, d2){
      var tdc = (Math.abs(d2 - d1) / (60*60*24*1000));
      return tdc;
  }
