
var markerArray = [];
var marker;
var prices;
var minPrice = "";
var maxPrice = "";
var sorting = "";
var isCardOpen = false;
var dateRangeStart;
var dateRangeEnd;
dataL = SearchResult[0];
dataP = SearchResult[1];
var propertyId = dataL[0].ID;
var card_data = '';
var datePrices = [];
var totalNightsPrice = Math.round(+dataL[0].Price);
var cleaningPrice = 0;
var commission = 0;

var DisplayCCY = $.cookie("XX_CCY");
var Ccy = CurrencyList[DisplayCCY][2];
var BaseCCY = CCYXRate[dataL[0]['Currency']];
var ForeignCCY = CCYXRate[DisplayCCY];
var FinalPrice = dataL[0].Price;
var priceXR = Math.round(xrateprice(BaseCCY, ForeignCCY, FinalPrice));



// let map = L.map('map').setView([dataL[0].Latitude, dataL[0].Longitude], 15);

// L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
// }).addTo(map);

// let map = L.map('map', {
//     zoom: 14,
//     center: [dataL[0].Latitude, dataL[0].Longitude],
//     doubleClickZoom: true,
//     scrollWheelZoom: true,
// }).locate({setView: true});

// L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
// }).addTo(map);

// var command = L.control({position: 'topleft'});
// command.onAdd = function (map) {
//     var div = L.DomUtil.create('div', 'command');
//     div.innerHTML = `<div class="form-map-search">
//     <label class="label-checkbox">
//     <input type="checkbox" class="checkbox" id="command">
//     <span class="check"></span>
//     <span class="check-text">Search by map</span>
//     </label>
//     </div>`;
//     return div;
// };

// command.addTo(map);

// var group = new L.featureGroup(markerArray);
// map.fitBounds(group.getBounds());

// $(document).on('click', '.map-pin', function(e) {
    //     focusCard($(this).attr('id'));
    // });
    
    // var marker = L.marker([dataL[0].Latitude, dataL[0].Longitude]).addTo(map);
    
    
    
var checkBox = document.getElementById("command");

    $("#mob_popup_toggle").on('click', function(e) {
        e.preventDefault()
        // $(this).toggleClass('xx__mob-header--hidden');
        $('.xx__mob .catalog-content').toggleClass("xx__mob-content");
        $('.xx__mob-toggle').slideToggle();
        $('.xx__mob-toggle').toggleClass("active");
        $(this).toggleClass("xx__mob-header-btn--scale");
    });


$.each(Amenities, function(k, v) {
    $('#AmenitiesList').append(`
    <label class="label-checkbox">
    <input type="checkbox" name="amenities" class="checkbox" id="${k}">
    <span class="check-item"></span>
    <span class="check-text">${v[0]}</span>
    </label>
    `
    );
});

$.each(PropertyType, function(k, v) {
    $('#PropertyType').append(`
    <label class="label-checkbox">
    <input type="checkbox" name="propertytype" class="checkbox" id="${k}">
    <span class="check-item"></span>
    <span class="check-text">${v}</span>
    </label>
    `);
});

$.each(Rules, function(k, v) {
    $('#RulesList').append(`
    <label class="label-checkbox">
    <input type="checkbox" name="rules" class="checkbox rules" id="${k}">
    <span class="check-item"></span>
    <span class="check-text">${v[0]}</span>
    </label>
    `);
});

function removeOldMarkers() {
    for(i=0; i < markerArray.length; i++) {
        map.removeLayer(markerArray[i]);
    }
}
$(".btn-price").click(function (e) {
    e.preventDefault();
    $(".popup__additional-filters").addClass('active');
    $(".positionTop").addClass('active');
    window.addEventListener('scroll', noScroll);
    $("body").css("overflow", "hidden")
    $('.popup-content').animate({ scrollTop: $('.price_section_title').offset().top - 60 }, 500);
    // ShowPricesHistogram();
});


//var listings =  [60, 50, 72, 61, 31, 90, 75, 42, 99, 83, 36, 82, 171, 52, 148, 134, 109, 37, 42, 192, 86, 38, 47, 200, 163, 145, 133, 104, 23, 140, 125, 62, 180, 202, 170, 112, 20, 54, 141, 178, 67, 192, 23, 57, 58, 88, 27, 186, 101, 155, 190, 20, 154, 30, 128, 122, 43, 130, 64, 208, 92, 79, 174, 211, 146, 106, 35, 45, 210, 187, 211, 197, 62, 100, 159, 161, 78, 178, 118, 195, 187, 39, 70, 110, 155, 144, 48, 55, 107, 60, 52, 218, 132, 50, 61, 185, 128, 79, 135, 97];


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


var queryString = window.location.pathname;

moment.locale(Lng)



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

$(document.body).on("click", ".like_card_btn_mob", async (e) => {
    await addToFavorites(e, 3, propertyId);
})



async function OpenCard(id){
    isCardOpen = true;
    
    if(!propertyId){
        propertyId = document.location.href.substr(document.location.href.search('/id:')+4)
    }

    // let index = $(`#card${id}`).closest(".card-item").index();
    // $(".my-div-icon").eq(index).addClass('active').siblings().removeClass('active');
    ChangeStep(1)
    // var imgArr = dataP.filter(el => el.ListingID == id);
    var imgArr = dataP;
    // var title = dataL.filter(el => el.ID == id)[0].Description;
    var title = dataL[0].Title;
    
    $(".xx__mob-map").hide();
    if($(window).width() > 991){
        $(".catalog-content").addClass('calc_card_content');
    }
    $(".leaflet-top.leaflet-left").hide();
    $(".property_card_content").show();

    await LoadCardData(dataL[0].ID);

    $.each(imgArr, function(k, v) {
        if(imgArr[k]['Type'] == 1){
            $(".pic_section_1").html(`<a>
                                            <img src="/static/uploads/listings/${imgArr[k]['Filename']}" alt="${k+1}">
                                        </a>`)
        }
        else if($(".pic_section_2").children().length < 4){
            $(".pic_section_2").append(`<div class="pic_section_item">
                                            <a>
                                                <img src="/static/uploads/listings/thumbs/${imgArr[k]['Filename']}" alt="${k+1}">
                                            </a>
                                        </div>`)
        }
        else{
            $(".pic_section_3").append(`<div class="pic_section_item">
                                            <a>
                                                <img src="/static/uploads/listings/thumbs/${imgArr[k]['Filename']}" alt="${k+1}">
                                            </a>
                                        </div>`)
        }

        $(".modal-content").append(`<div class="mySlides">
                                        <img src="/static/uploads/listings/${imgArr[k]['Filename']}" alt="${k+2}" style="max-height: calc(100vh - 70px); max-width: 100%;">
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

    $(".share_by_link input").val(`https://rentxx.com/${Lng}/property.display/checkinDate:${DateToUrlString(dateRangeStart)}/checkoutDate:${DateToUrlString(dateRangeEnd)}/id:${dataL[0].ID}`)


    

    // for(var i = 1; i<= xx_cal_items.length; i++){
    //     if(i%7==0){
    //         $(xx_cal_items[i]).css("margin-right", "2%")
    //         $(xx_cal_items[i]).css("padding-right", 0)
    //     }
    // }
    var cw = $(".xx-date").width()
    $(".xx-date").height(cw);

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


async function LoadCardData(id){
    
    var testArr = ['4','2','10'];
    const card_load = await 
        fetch(`/api/v1/api__Display:1/id:${id}`);
    card_data = await (card_load).json();
    // $(".pc_footer_price").html(`<p>${Ccy}${priceXR}</p>`)

    console.log(card_data);
    GenerateCardListigs(card_data.Page_Data_Listings[0]);
    
    var bedrooms = groupBy(card_data.Page_Data_Beds, 'RoomID');
    GenerateCardBedrooms(bedrooms);
    
    GenerateCardRules(card_data.Page_Data_Rules);
    GenerateCardAmenities(card_data.Page_Data_Amenities);
    GenerateCardDescription(card_data.Page_Data_Listings[0].Description)
    let map = L.map('map').setView([dataL[0].Latitude, dataL[0].Longitude], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    }).addTo(map);

    var marker = L.marker([dataL[0].Latitude, dataL[0].Longitude]).addTo(map);

    GenerateCardReviews(card_data.PropertyReviews)

    if(testArr.includes(id)){
        $(".like_card_btn img").attr("src", "/static/img/ic-mod-4.svg")
        $(".like_card_btn_mob img").attr("src", "/static/img/ic-mod-4.svg")
    }
    else{
        $(".like_card_btn img").attr("src", "/static/img/ic-mod-3.svg")
        $(".like_card_btn_mob img").attr("src", "/static/img/ic-mod-3.svg")
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
    var Area;
    if(pdl.Area){
        Area = `Площадь ${pdl.Area}кв.м.`;
    }
    var Bathrooms_count = pdl.Bathrooms;
    var Bedrooms_count = pdl.Bedrooms;
    var MaxGuests_count = pdl.MaxGuests;
    var Floor;
    if(pdl.CurrentFloor && pdl.CurrentFloor != null){
        Floor = `${pdl.CurrentFloor}/${pdl.TotalFloor} этаж`
    }
    
    if(Bathrooms_count == 1) Bathrooms_count+=' ванная';
    else Bathrooms_count+=' ванных';

    if(Bedrooms_count == 1) Bedrooms_count+=' спальня';
    else Bedrooms_count+=' спальни';

    if(MaxGuests_count == 1) MaxGuests_count+=' гость';
    else if(1 < MaxGuests_count < 5) MaxGuests_count+=' гостя';
    else MaxGuests_count+=' гостей';

    var property_params = [Area, MaxGuests_count, Bedrooms_count, Bathrooms_count, Floor]


    $.each(property_params, function(k) {
        if(property_params[k] && property_params[k] != null){
            $(".property_params").append(`<li class="property_params_item">${property_params[k]}</li>`)
        }
    });

    $.each(LngArriveTime, function(k) {
        if(LngArriveTime[k][0] == pdl.CheckInTime){
            $(".card_arrive").html(LngArriveTime[k][1])
        }
        if(LngArriveTime[k][0] == pdl.CheckOutTime){
            $(".card_departure").html(LngArriveTime[k][1])
        }
    });

    $(".free_cancel").html(`${Vars.LngDisplay.FreeCancel}${moment().add(14, 'days').format("DD MMMM")} <a href="#">Подробнее</a>`)
    $(".bk_free_cancel").html(`${Vars.LngDisplay.FreeCancel}${moment().add(14, 'days').format("DD MMMM")} <a href="#">Подробнее</a>`)

    
    $(".pc_price_label_mob").html(`<p class='pc_price_label_price'>${Ccy}${Math.round(xrateprice(BaseCCY, ForeignCCY, +dataL[0].Price))} </p><p class='pc_price_label_price_night'> — ${Vars.LngDisplay.PerNight} ${Ccy}${Math.round(xrateprice(BaseCCY, ForeignCCY,CalcNightPrice(dataL[0].Price)))}</p>`)
    
    // alert(Math.round(CalcNightPrice(dataL[0].Price)))
    // alert(CalcNightPrice(dataL[0].Price))
   
  }
  
  function CalcNightPrice(price){
    var diff = CalcNightCount(dateRangeStart, dateRangeEnd);
    var ppn = price > 0 ? price/diff : 0;
    return +ppn
  }

  function CalcNightCount(d1, d2){
      var tdc = (Math.abs(d2 - d1) / (60*60*24*1000));
      return tdc;
  }

  function GenerateCardBedrooms(bdr){
    var bd_counter = 1
    $.each(bdr, (i) => {
        $(".bedrooms .pc_content").append(`<div class="bedroom pc_content_item ${i}rm">
                                                <div class="badroom_icon ${i}rm_icons">
                                                    <img src="/static/v2/img/bed.svg" alt="">
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
                    // $(`.${i}rm_icons`).append(`
                    //     <img src="/static/img/${LngBedType[e][2]}.svg" alt="">
                    // `)
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
        <div class="pc_content_sec_hidden hdn"><div class="hidden_content"></div></div>
        `)
        $.each(rules, (i) =>{
            $.each(Rules, (e) => {
                if(rules[i].RuleID == e){
                    if(i < 6){
                        if(rules[i].Value == 1){
                            $(".rules .pc_content .pc_content_sec").append(`
                                <div class="pc_content_item">
                                    <div class="pc_content_item_icon">
                                        <img src="/static/v2/img/${Rules[e][1]}.svg" alt="">
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
                                        <img src="/static/v2/img/${Rules[e][1]}.svg" alt="">
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
                                        <img src="/static/v2/img/${Rules[e][1]}.svg" alt="">
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
                                        <img src="/static/v2/img/${Rules[e][1]}.svg" alt="">
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
        <div class="pc_content_sec_hidden hdn"><div class="hidden_content"></div></div>
        `)
        $.each(amenities, (i) =>{
            $.each(Amenities, (e) => {
                if(amenities[i].AmenityID == e){
                    if(i < 6){
                    $(".amenities .pc_content .pc_content_sec").append(`
                        <div class="pc_content_item">
                            <div class="pc_content_item_icon">
                                <img src="/static/v2/img/${Amenities[e][1]}.svg" alt="">
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
                                <img src="/static/v2/img/${Amenities[e][1]}.svg" alt="">
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
        ${Vars.LngDisplay.Reviews} <span> — </span>
                        <div class="review_rating">
                            ${totalRatingName} (${totalRating})
                        </div>
                    </div>
        `)
        
    }
  }

  
    
  function GenerateCardDescription(ds){
    if(ds){
        $(".property_ods").append(`
        <div class="ods_title property_description_title">
            ${Vars.LngDisplay.Description}
        </div>
        <div class="pc_content">
        </div>`)
        $(".property_ods .pc_content").append(`${ds}`)
        
        
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
            rtn = "Оценки еще нет"
    }

    return rtn;
  }


  $(document.body).on('click', '.bk_next', function(){
      var td = new Date();
      td = new Date(td.getFullYear()+'-'+('0' + (td.getMonth() + 1)).slice(-2)+'-'+('0' + (td.getDate())).slice(-2)+'T00:00:00')
      if(dateRangeEnd.getTime() != dateRangeStart.getTime() && dateRangeStart.getTime() >= td.getTime()){
          ChangeStep($("li.bk_step.selected_step_bk").index() + 2)
      }
      else{
        toastr.error('Error')
      }
  })

  $(document.body).on('click', '.bk_content_back', function(){
    ChangeStep($("li.bk_step.selected_step_bk").index())
})
    $(document.body).on('click', '.bk_close_btn', function(){
        if($(".step_1").hasClass("active_step") || $(".step_4").hasClass("active_step")){
             $(".booking").hide();
            window.removeEventListener('scroll', noScroll);
            $("body").css("overflow", "visible ")
        }
        else{
            ChangeStep($("li.bk_step.selected_step_bk").index())
            var cw = $(".xx-date").width()
            $(".xx-date").height(cw);
        }
       
    })

// $(document.body).on('click', '.bk_step', function(e){
//   ChangeStep($(e.target).index() + 1)
// })

function ChangeStep(step){
    $(".bk_step_content.step_"+step).addClass('active_step').siblings().removeClass('active_step')
    step >= 3 ? $($("li.bk_step")[step-2]).addClass('selected_step_bk').siblings().removeClass('selected_step_bk') : $($("li.bk_step")[step-1]).addClass('selected_step_bk').siblings().removeClass('selected_step_bk');
    
    step >= 3 ? $(".steps_mob_count").html(step-1) : $(".steps_mob_count").html(step);
    if(step == 2){
        $(".bk_content_back").show();
    }
    else{
        $(".bk_content_back").hide();
    }
}


// window.onpopstate = function(event) {
//     FilterUrl()
//     if(isCardOpen){
//         CloseCard()
//     }
//     window.removeEventListener('scroll', noScroll);
//     $("body").css("overflow", "visible ")
// };


FilterUrl();

function FilterUrl(){
    var params = document.location.pathname.split("/")
    OpenCard(document.location.href.charAt(document.location.href.search('/id:')+4));
    dateRangeStart = new Date((params.filter(el => el.includes('checkinDate'))[0].split(":")[1] + ' 00:00:00').replace(' ', 'T'))
    dateRangeEnd = new Date((params.filter(el => el.includes('checkoutDate'))[0].split(":")[1] + ' 00:00:00').replace(' ', 'T'))
    if(params.filter(el => el.includes('paid')).length){
        if (window.matchMedia("(max-width: 991px)").matches){
            $(".booking").show();
            window.addEventListener('scroll', noScroll);
            $("body").css("overflow", "hidden ");
        }
        var cw = $(".xx-date").width()
        $(".xx-date").height(cw);
        ChangeStep(4);

        // const formData = new FormData();
        // formData.append('api__SendMail', 1);
        // formData.append('vars', vars);
        // formData.append('email', email);
        // formData.append('tempType', tempType);

        // // /api__SendMail:1/vars:${vars}/email:${email}/tempType:${tempType}

        // fetch(`/api/v1`,{
        //     method: 'POST',
        //     body: formData
        // })
        // .then((response) => {
        //     return response.json();
        // })
        // .then((data) => {
            
        // });
    }
    if(params.filter(el => el.includes('step:2')).length){
        if (window.matchMedia("(max-width: 991px)").matches){
            $(".booking").show();
            window.addEventListener('scroll', noScroll);
            $("body").css("overflow", "hidden ");
        }
        var cw = $(".xx-date").width()
        $(".xx-date").height(cw);
        ChangeStep(2);
    }

}

function GetCalendarPrices(id, month){
    fetch(`/${Lng}/property.display/api__GetCalendarPrices:1/id:${id}/month:${month}`)
    .then((response) => {
        return response.json();
      })
    .then((data) => {
        datePrices = data;
        FillCalendarPrices(data)
        console.log(CalendarPrices)
        if(!CalendarPrices.filter(x => x._date == datePrices[0]._date).length){
            CalendarPrices = CalendarPrices.concat(datePrices)
        }
    });
}


function GetCountryCode(){
    fetch(`/api/countrydata/getcountrycode.php`)
    .then((response) => {
        return response.json();
      })
    .then((data) => {
        $('.bk_step_2_code').val(data);
        $('.bk_step_3_code').val(data);
    });
}

function GetUserInfo(id){
    fetch(`${Lng}/property.display/api__getPersonalInfoCard:1/AccountID:${id}`)
    .then((response) => {
        return response.json();
      })
    .then((data) => {
        $(".bk_step_2_name").val(data[0].DisplayName)
        $(".bk_step_2_email").val(data[0].Email)
        // $(".bk_step_2_code").val(data[0].PhoneCode)
        // $(".bk_step_3_code").val(data[0].PhoneCode)
        $(".bk_step_2_phone").val(data[0].Phone)
    });
}

function FillCalendarPrices(prices){
    $.each(prices, (k) =>{
        var dateId = prices[k]._date.split(" ")[0]
        $(`#${dateId} .cal_date_price`).html(Ccy + Math.round(xrateprice(BaseCCY, ForeignCCY, prices[k].price)))
    })
}

$(document).ready(function(){
    $(".pc_footer_book_btn").on("click", function(){
        $(".booking").show();
        var cw = $(".xx-date").width()
        $(".xx-date").height(cw);
        window.addEventListener('scroll', noScroll);
        $("body").css("overflow", "hidden ")

    })

    $(".bk_close_btn_mob").on("click", function(){
      
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

    $("#bk_doc_front_hidden").on("change", () => {
        $("#bk_doc_front").val('✔ Выбрано')
    })

    $("#bk_doc_back_hidden").on("change", () => {
        $("#bk_doc_back").val('✔ Выбрано')
    })

    $(".bk_pn_check_input").keyup(function () {
        if (this.value.length == this.maxLength) {
          $(this).next('.bk_pn_check_input').focus();
        }
        if (this.value.length == 0) {
            $(this).prev('.bk_pn_check_input').focus();
          }
    });

    $($(".bk_pn_check_input")[3]).keyup((e) =>{
        if (e.target.value.length == e.target.maxLength) {
            // ChangeStep(4)
            var code = '';
            $.each($('.bk_pn_check_input'), (k) => {
                code += $($('.bk_pn_check_input')[k]).val();
            })

            var isRight = checkCode(code)

            if(isRight){
                $('.bk_pn_check_wrong').hide()
                ChangeStep(4)
            }
            else{
                $('.bk_pn_check_wrong').show()
            }
        }
    }) 


    function checkCode(code){
        var rightCode = '0000';

        if(code == rightCode){
            return true;
        }
        else{
            return false;
        }
        
    }
    

    $('input').focus((e) => {
        e.preventDefault(); 
        e.target.focus({preventScroll: true});
      })

    $("input[name='redirect']").val(document.location.href + '/step:2')
    $("input[name='redirect1']").val(document.location.href)
      
    // $(document.body).on("click", ".next_month", () => {
    //     GetCalendraPrices(propertyId, `${jsYear}-${jsMonth}-01`)
    // })
    
    // $(document.body).on("click", ".previous_month", () => {
    //     GetCalendraPrices(propertyId, `${jsYear}-${jsMonth}-01`)
    // })

    $(".bk_step_2_form_row input").on('change', (e) => {
        $(e.target).attr("style", "")
    })

    $('.bk_pn_change_btn').on('click', () => {
        $('.bk_pn_wrong').removeClass('hidden');
    })

    // FillCalendarPrices(CalendarPrices);
    GetCountryCode();
    GetUserInfo(userID)

    $(".copy_share_link").on("click", () => {
        var copyText = $(".share_by_link input");
        copyText.select();
        document.execCommand("copy");
    })

    $.each(CalendarDates, function (k, undate) {
        var dtStart = new Date(undate.DateFrom);
        var dtEnd = new Date(undate.DateTo);
        
        if (dtStart.getTime() <= dtEnd.getTime()) {
            while (dtStart <= dtEnd) {
            datesUnavailable.push({dd: dtStart.getDate(), month: dtStart.getMonth() + 1, year: dtStart.getFullYear(), date: new Date(dtStart.getFullYear(), dtStart.getMonth(), dtStart.getDate())});
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
    });
})

 
// function checkUnaviableDays(cdate) {
//     var result = 0;
//     $.each(datesUnavailable, function (k, undate) {
//         if (undate.month == jsMonth && undate.year == jsYear) {
//             if (undate.date.getTime() == cdate.getTime()) {
//                 result = 1;
//                 return false;
//             }
//         }   
//     });
//     $.each(datesBooked, function (k, undate) {
//         if (undate.month == jsMonth && undate.year == jsYear) {
//             if (undate.date.getTime() == cdate.getTime()) {
//                 result = 2;
//                 return false;
//             }
//         }   
//     });

//     var dtStart = new Date(jsDateMin)
//     var firstDay = new Date(dtStart.getFullYear(), dtStart.getMonth(), 1);

//     while (firstDay <= dtStart) {
//         if (firstDay.getTime() == cdate.getTime()){
//             result = 3;
//             return false;
//         }
//         if (result == 3)
//             break;
//         firstDay.setDate(firstDay.getDate() + 1);
//     }

//     return result;
// }


function ValidateEmail(email)
{
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}