$.each(Booking_List, function(k, v) {
    TotalNights = Booking_List[k]['Duration'];
    if (TotalNights == 1 || TotalNights == 21 || TotalNights == 31) { NText = Nights1 }
    else if(TotalNights >= 2 && TotalNights <= 4) { NText = Nights2 }
    else if(TotalNights >= 22 && TotalNights <= 24) { NText = Nights2 }
    else { NText = Nights5 }

    if(v['Status'] == 1) { 
        transclass = "green_bg_status"; 
        actionword = LeaveReview;
        actionlink = "c_reviews/id:"
    }
    else { 
        transclass = ""; 
        actionword = ConfirmAndPay;
        actionlink = "payment/id:"
    }

    var DisplayCCY = $.cookie("XX_CCY");
    var C_Distance = Math.round(distance_calc(Booking_List[k]['lat1'], Booking_List[k]['long1'], CityList[k+1][3], CityList[k+1][4]) * 10) / 10;
    var Ccy = CurrencyList[DisplayCCY][2];
    BaseCCY = CCYXRate[Booking_List[k]['Currency']];
    ForeignCCY = CCYXRate[DisplayCCY];

    priceXR = xrateprice(BaseCCY, ForeignCCY, Booking_List[k]['Price']);

    address = Booking_List[k]['Building'] + ' ' + Booking_List[k]['Street'];
    htmlcode = '<li class="card-item"> <div class="card-top"> <div class="card-slider slick-initialized slick-slider"> <img src="/static/uploads/listings/thumbs/'+Booking_List[k]['Filename']+'" alt="image room" class="card-img"></div> </div> <div class="card-col"> <div class="card-content"> <div class="discount '+transclass+'">' + TransactionStatus[v['Status']][1]  + '</div> <a href="property/id:'+Booking_List[k]['PropID']+'" class="text-16">'+Booking_List[k]['Description']+'</a> <div class="card-info"> <p class="c-blue">'+Booking_List[k]['Duration']+' '+NText+'</p> </div> <div class="card-row"> <a href="'+actionlink+Booking_List[k]['ID']+'" class="location"> <span class="pin"></span> <p> <span class="address">'+address+'</span> '+C_Distance+' км от центра </p> </a> <div class="price"> <span class="c-blue">7 ночей</span> <div class="price-row"> <span class="price-item">'+priceXR+''+Ccy+'</span> </div> </div> </div> </div> <label class="card-bottom"> <input type="checkbox" class="checkbox"> <span><a href="'+actionlink+Booking_List[k]['ID']+'">'+actionword+'</a></span> </label> </div></li>';
    $('#catalog-list').append(htmlcode);
});

$('#c_bookings').addClass("text-16");
