let map = L.map('map').setView([Reserv[0].Latitude, Reserv[0].Longitude], 16);

L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
}).addTo(map);

var marker = L.marker([Reserv[0].Latitude, Reserv[0].Longitude]).addTo(map);

$(document).ready(() => {
    FillPage();
})

function FillPage(){
    $(".bookAddress").text(Reserv[0].City + ", " + Reserv[0].Street + ", " + Reserv[0].Building)
    $(".bookCity").text(Reserv[0].City)
    $(".bookPhone").text(Reserv[0].PhoneCode + Reserv[0].Phone)
    $(".bookEmail").text(Reserv[0].Email)
    $(".bookNightsCount").text(CalcNightCount(new Date(Reserv[0].DateFrom), new Date(Reserv[0].DateTo)) + " ноч.")
    $(".bookDateFrom").text(Reserv[0].DateFrom.split(" ")[0])
    $(".bookDateTo").text(Reserv[0].DateTo.split(" ")[0])
    $(".bookDescription").text(Reserv[0].Description)
    $(".listingImg").attr("src", "/static/uploads/listings/thumbs/" + Reserv[0].Filename)
    if(Reserv[0].VerifiedID == 0){
        $(".reserv-title").append(`
        <ul class="statuses">
            <li class="fw-bold">Необходимо подтвердение документов <em class="icon ni ni-cross text-danger"></em></li>
        </ul>
        <br>
        <button class="btn btn-primary">Загрузить документы</button>
        `)
    }
}

function CalcNightCount(d1, d2){
    var tdc = (Math.abs(d2 - d1) / (60*60*24*1000));
    return tdc;
}

function createPage(data, file, verified, propDesc) {
    return `
    <tr class="nk-tb-item" id="row${data['ID']}">
        <td class="nk-tb-col">
            <div class="user-card">
                    <img style="margin-right:7px; border-radius:3px" src="/static/uploads/listings/m_thumbs/${file}" alt>
                <div class="user-info">
                    <span class="tb-lead">${propDesc} <span class="dot dot-success d-md-none ml-1"></span></span>
                    <span>${data['Street']}</span>
                </div>
            </div>
        </td>
        <td class="nk-tb-col">
            <div class="user-card">
                <div class="user-info">
                    <span class="tb-lead">${data.Name} ${data.Surname} <span class="dot dot-success d-md-none ml-1"></span></span>
                    ${verified}
                </div>
            </div>
        </td>
        <td class="nk-tb-col tb-col-md">
            <span>${data.DateFrom.substring(0, 10)}</span>
        </td>
        <td class="nk-tb-col tb-col-md">
            <span>${data.DateTo.substring(0, 10)}</span>
        </td>
        <td class="nk-tb-col tb-col-mb">
            <span class="tb-amount">${data.Price} <span class="currency">${Vars2['LngCurrency'][data.Currency][2]}</span></span>
        </td>
        <td class="nk-tb-col nk-tb-col-tools" id="status${data.ID}">
            <ul class="nk-tb-actions gx-1">
                <li>
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li class="confirm" value="${data.ID}">
                                    <a> 
                                        <em class="icon ni ni-check"></em>
                                        <span>${Vars['LngCabinetRequests']['Confirm']}</span>
                                    </a>
                                </li>    
                                <li class="reject" value="${data.ID}">
                                    <a> 
                                        <em class="icon ni ni-cross"></em>
                                        <span>${Vars['LngCabinetRequests']['Reject']}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </td>
    </tr>`
}



    
$.each(Requests, function( key, value ) {
    var file;
    var verified;
    var propDesc;
    $.each(Photos, function(k,v) {
        if (v.ListingID == value.ListingID){
            file = v.Filename;
            return false;
        }
    })

    console.log(value.Description.length);
    if (value.Description.length > 20)
        propDesc = value.Description.substring(0, 17) + "...";
    else
        propDesc = value.Description
    
    if (value.Verified == 1)
        verified = '<span class="badge badge-dot badge-success">' + Vars['LngCabinetRequests']['Verified'] + '</span>'


    $('#requestsList').append(createPage(value, file, verified, propDesc));
});

$(document).on('click', '.confirm', function() {
    var str = '#status' + this.value;
    $.ajax({
        type: "POST",
        url: window.location,
        data: {api__Confirm: 1, id: this.value},
        success: function(msg) {
            $(str).empty();
            $(str).append('<span class="tb-status text-success">' + Vars['LngCabinetRequests']['Confirmed'] + '</span>')
        },
        error: function() {
            alert("Sorry! Couldn't process your request")
        }
    });
});

$(document).on('click', '.reject', function() {
    var str = '#status' + this.value;
    $.ajax({
        type: "POST",
        url: window.location,
        data: {api__Reject: 1, id: this.value},
        success: function(msg) {
            $(str).empty();
            $(str).append('<span class="tb-status text-danger">' + Vars['LngCabinetRequests']['Rejected'] + '</span>')
        },
        error: function() {
            alert("Sorry! Couldn't process your request")
        }
    });
});

