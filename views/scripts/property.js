var structure = [];
var bedsNames = [];
var roomName = '';
var count = 0;

$("#area").text(Area + ' ' + Page_Data_Listings[0].Area + ' ' + SqM);
$("#bath").text(BathRooms + ' ' +Page_Data_Listings[0].Bathrooms);
$("#roomCount").text(Page_Data_Listings[0].Bedrooms + ' '+ AllRooms);
$("#guestCount").text(MaxGuests + ' ' + Page_Data_Listings[0].MaxGuests);
$("#minNights").text(MinNights + ' ' + Page_Data_Listings[0].MinNightsStay);


$.each(ArriveTime, function(k, v) {
    if (k == Page_Data_Listings[0].CheckInTime)
        $("#checkIn").text(v[1]);
    if (k == Page_Data_Listings[0].CheckOutTime)
        $("#checkOut").text(v[1]);
});

if (Page_Data_Rules != '') {
    count = 0;
    structure = '<div class="facilities__items facilities__items-accordion">'
    for(var i = 0; i < Page_Data_Rules.length; i++) {
        $.each(Rules, function(k, v) {
            if (k == Page_Data_Rules[i].RuleID) {
                if(Page_Data_Rules[i].Value == 1)
                    structure = structure + '<div class="facilities__item"><div><img src="/static/img/pet__bg.svg" alt="wi_fi"><p>' + v[0] +'</p></div></div>'
                else
                    structure = structure + '<div class="facilities__item"><div><img src="/static/img/no__party.svg" alt="wi_fi"><p>' + v[2] +'</p></div></div>'
                count++;
                return false;
            }
        });
        if (count == 3 || (i + 1) == Page_Data_Amenities.length) {
            count = 0;
            structure = structure + '</div>';
            $(structure).appendTo('#accordion3');
            structure = '<div class="facilities__items facilities__items-accordion">'
        }
    }
}

substrText(Page_Data_Listings[0].Description, 200, 250, "#ListingDescriptionMain", "#ListingDescriptionSkipped");

function substrText(allText, triplength, maxlength, elementMain, elementSkipped){
    if (allText)
    {
        if (allText.length >= maxlength) {
            for (var i = triplength; i <= allText.length; i++) {
                if (allText[i] === " ") {
                    var textPart = allText.substr(0, i);
                    $(elementMain).text(textPart);
                    textPart = allText.substr(i, allText.length);
                    $(elementSkipped).text(textPart);
                    break;
                }
                else $(elementMain).text(allText);
            }
        }
        else $(elementMain).text(allText);
    }   
}

if (Page_Data_Amenities != '') {
    count = 0;
    structure = '<div class="facilities__item">';
    for (i = 0; i < Page_Data_Amenities.length ; i++) {
        $.each(Amenities, function(k, v) {
            if (k == Page_Data_Amenities[i].AmenityID) {
                structure = structure + '<div><img src="/static/img/wifi.svg" alt="' + v[1] +'"<p>' + v[0] + '</p></div>';
                count++;
                return false;
            }
        });
        if (count == 2 || (i + 1) == Page_Data_Amenities.length) {
            count = 0;
            structure = structure + '</div>'
            if (i <= 5)
                $(structure).appendTo('#amenetiesMain').html();
            else
                $(structure).appendTo('#amenetiesSkipped').html();
            structure = '<div class="facilities__item">';
        }
    }
}

if (Page_Data_Rooms.length != 0) {
    for (var i = 0; i < Page_Data_Rooms.length; i++) {
        structure = '<div class="sleepingplaces__item">';
        if (Page_Data_Rooms[i].RoomType == 1) {
            roomName = Bedroom + ' ' + (i + 1);
            getBeds(Page_Data_Rooms[i].ID, roomName)
            insertStruct();
        }
    }
}

function getBeds(roomId, bedroomName) {
    structure = structure + '<div>';
    bedsNames = [];
    for (var i = 0; i < Page_Data_Beds.length; i++) {
        if (Page_Data_Beds[i].RoomID == roomId) {
            $.each(BedTypes, function(k, v) {
                if (k == Page_Data_Beds[i].BedType) {
                    structure = structure + '<img src="/static/img/' + v[2] +'.svg" alt="' + v[2] +'">';
                    if (bedsNames.length == 0)
                        bedsNames = bedsNames + v[0];
                    else
                    bedsNames = bedsNames + ', ' + v[0];
                }
            });
        }
    }
    structure = structure + '</div>';
    structure = structure +  '<h4>' + bedroomName + '</h4>';
    structure = structure + '<p>' + bedsNames + '</p>';
}

function insertStruct() {
    $(structure).appendTo('#test').html();
}

if (Page_Data_Addresses != '') {
    changeLocation(Page_Data_Addresses[0].Latitude, Page_Data_Addresses[0].Longitude)
    $("#address").text('Ул. ' + Page_Data_Addresses[0].Street  + ' дом, кв. ' + Page_Data_Addresses[0].Appartement)
}

function changeLocation (x, y) {
    curLocation = [x, y];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [40.377481, 49.850581];
    }
    
    var scale = 15;
    if (x != 0 && y != 0)
       scale = 18;

    var map = L.map('mapid').setView(curLocation, scale);
    
    // http://{s}.tile.openstreetmap.by/{z}/{x}/{y}.png
    L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    }).addTo(map);

    var marker = new L.marker(curLocation, {
       draggable: false
    });
    map.addLayer(marker);
 }

 $(document).on('click', '.input-dt', function() {
    document.querySelector("#xxcalendar").scrollIntoView({ behavior: 'smooth'});
});


$("#cleanlinessRating").text(Page_Data_Listings[0].Cleanliness);
$("#accuracyRating").text(Page_Data_Listings[0].Accuracy);
$("#communicationRating").text(Page_Data_Listings[0].Communication);
$("#locationRating").text(Page_Data_Listings[0].Location);
$("#priceRating").text(Page_Data_Listings[0].Price);

$("#cleanliness").attr({"style":"width:" +  Page_Data_Listings[0].Cleanliness * 100 / 5  + "%"});
$("#accuracy").attr({"style":"width:" +  Page_Data_Listings[0].Accuracy * 100 / 5  + "%"});
$("#communication").attr({"style":"width:" +  Page_Data_Listings[0].Communication * 100 / 5  + "%"});
$("#location").attr({"style":"width:" +  Page_Data_Listings[0].Location * 100 / 5  + "%"});
$("#price").attr({"style":"width:" +  Page_Data_Listings[0].Price * 100 / 5  + "%"});



if (PropertyReviews != '') {
    
    $.each(PropertyReviews, function(k, v) {
        var date = new Date(v['Date']);
        var element = "";
        if (k===0) {
            element = "description__text description__text-first";
        }  
        else if (k != PropertyReviews.length -1) {
            element = "description__text";
        }
        else{
            element = "description__text description__text-last";
        }
        structure = `
            <div class="${element}">
            <div class="avatar">
                <img class="client__photo" src="/static/img/ava.png" alt="avatar">
                <div class="name__client">
                    <h6 id="accountName${v['ID']}">Марина</h6>
                    <div>
                        <span>${date.getMonth() + 1}</span>
                        <span>${date.getFullYear()}</span>
                    </div>
                </div>
            </div>
            <div class="container__description">
                <h4 id="reviewText${v['ID']}"></h4>
                <div class="accordion">
                    <dl>
                        <dt>
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1"
                                class="accordion-title accordionTitle js-accordionTrigger">Читать
                                полностью</a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion6"
                            aria-hidden="true">
                            <p id="ReviewTextSkipped${v['ID']}"></p>
                        </dd>
                    </dl>
                </div>
            </div>
            </div>
        `;
        console.log(structure);
        $(structure).appendTo('#reviewsSection');  
        substrText(v['liked'], 100, 150, "#reviewText" + v['ID'], "#ReviewTextSkipped" + v['ID']); 
    });
}


