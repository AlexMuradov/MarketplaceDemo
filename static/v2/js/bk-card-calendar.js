var xxdate = typeof CurrentTime !== 'undefined' ? CurrentTime.slice(0, 11) : moment().format('DD/MM/YYYY HH:mm:ss').slice(0, 11);
var dateParts = xxdate.split("/");
var jsDateMin = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));
var jsDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));
var clickCount = 0;
var rangeStartDate = null;
var rangeEndDate = null;

var Month = ["Январь",
"Февраль",
"Март",
"Апрель",
"Май",
"Июнь",
"Июль",
"Август",
"Сентябрь",
"Октябрь",
"Ноябрь",
"Декабрь"];

var datesUnavailable = [];
var datesBooked = [];

$.each(typeof CalendarDates !== 'undefined' ? CalendarDates : '', function (k, undate) {
    if (CalendarDates[k]['BookingType'] == 1){
        var dtStart = new Date(undate.DateFrom);
        var dtEnd = new Date(undate.DateTo);
        
        if (dtStart.getTime() <= dtEnd.getTime()) {
            while (dtStart <= dtEnd) {
            datesUnavailable.push({dd: dtStart.getDate(), month: dtStart.getMonth() + 1, year: dtStart.getFullYear(), date: new Date(dtStart.getFullYear(), dtStart.getMonth(), dtStart.getDate())});
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
    }
    if (CalendarDates[k]['BookingType'] == 2){
        var dtStart = new Date(undate.DateFrom);
        var dtEnd = new Date(undate.DateTo);
        
        if (dtStart.getTime() <= dtEnd.getTime()) {
            while (dtStart <= dtEnd) {
            datesBooked.push({dd: dtStart.getDate(), month: dtStart.getMonth() + 1, year: dtStart.getFullYear(), date: new Date(dtStart.getFullYear(), dtStart.getMonth(), dtStart.getDate())});
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
    }
});


$(document).ready(function () {
   drawCalendar(jsDate);
   selectRange(dateRangeStart, dateRangeEnd);
   CalcPrices();
});

var jsMonth = jsDate.getMonth() + 1;
var jsYear = jsDate.getFullYear();
var lastDayOfMonth = new Date(jsYear, jsMonth, 0);
var lastDay = lastDayOfMonth.getDate();
var firstDayOfMonth = new Date(jsYear, jsMonth - 1, 1);
var jsDayOfWeek = firstDayOfMonth.getDay();

function drawCalendar(jsDate) {
    jsMonth = jsDate.getMonth() + 1;
    jsYear = jsDate.getFullYear();
    lastDayOfMonth = new Date(jsYear, jsMonth, 0);
    lastDay = lastDayOfMonth.getDate();
    firstDayOfMonth = new Date(jsYear, jsMonth - 1, 1);
    jsDayOfWeek = firstDayOfMonth.getDay();

    if (jsDayOfWeek == 0)
        jsDayOfWeek = 7;
    var structure = `<div class="xx-calendar">
                        <div class="xx-calendar-header">
                            <div class="previous_month">
                                <burron class="page-prev page-arrow xx_cal_arrow"></burron>
                            </div>
                            <div class="xx-month">
                            ${Month[jsMonth - 1]} ${jsYear}
                            </div>
                            <div class="next_month">
                                <burron class="page-next page-arrow xx_cal_arrow"></burron>
                            </div>
                        </div>`;
    structure = structure + '<div class="xx-weekdays">пн</div><div class="xx-weekdays">вт</div><div class="xx-weekdays">ср</div><div class="xx-weekdays">чт</div><div class="xx-weekdays">пт</div><div class="xx-weekdays">сб</div><div class="xx-weekdays">вс</div></div>'
    
    $(structure).appendTo('.xx_cal_container').html();
    if (jsDayOfWeek != 1) {
        drawEmptyCells(jsDayOfWeek);
    }
    drawEnabledCells(lastDay, jsYear, jsMonth);
    drawRestCells(jsDayOfWeek, lastDay);
    
    GetCalendarPrices(propertyId, `${jsYear}-${(jsMonth) < 10 ? '0' + (jsMonth) : jsMonth}-01`)
};


// empty previous and next month days 
function drawEmptyCells(cellsCount) {
    structure = '';
    for (var i = 1; i < cellsCount; i++) {
        structure = structure + '<div class="xx-empty"><div></div></div>';
    }
    $(structure).appendTo('.xx-calendar').html();
}

function drawEnabledCells(cellsCount, year, month) {
    // for(var i = 1; i <= cellsCount; i++) {
    //     var dd = ('0' + i).slice(-2);
    //     var mm = ('0' + month).slice(-2);
    //     var cdate = new Date(year, month-1, dd);
       
    //     if (!checkUnaviableDays(cdate)) {
    //         structure = '<div class="xx-enabled" id="' + year + '-' + mm + '-' + dd + '"><div class="cal_date"><div class="val">' + i + '</div><div class="cal_date_price"></div></div></div>';
    //         $(structure).appendTo('.xx-calendar').html();
    //     }
    //     else {
    //         structure = '<div class="xx-unavailable" id="' + year + '-' + mm + '-' + dd + '"><div>' + i + '</div></div>'
    //         $(structure).appendTo('.xx-calendar').html();
    //     }
    //  }
     for(var i = 1; i <= cellsCount; i++) {
        var dd = ('0' + i).slice(-2);
        var mm = ('0' + month).slice(-2);
        var cdate = new Date(year, month-1, dd);
       
        var checkDay = checkUnaviableDays(cdate);
        if (checkDay == 0) {
            var today = new Date()
            if(new Date(year + '-' + mm + '-' + dd + 'T00:00:00') >= new Date(today.getFullYear() + '-' + ((today.getMonth() + 1) < 10 ? '0' + (today.getMonth() + 1) : (today.getMonth() + 1)) + '-' + (today.getDate() < 10 ? '0' + today.getDate() : today.getDate()) + 'T00:00:00')){
                structure = '<div class="xx-date xx-enabled" id="' + year + '-' + mm + '-' + dd + '"><div class="cal_date"><div class="val">' + i + '</div><div class="cal_date_price"></div></div></div>';
                $(structure).appendTo('.xx-calendar').html();
            }
            else{
                structure = '<div class="xx-date xx-unavailable" id="' + year + '-' + mm + '-' + dd + '"><div class="cal_date"><div class="val">' + i + '</div><div class="cal_date_price"></div></div></div>';
                $(structure).appendTo('.xx-calendar').html();
            }
        }
        else if (checkDay == 1) {
            structure = '<div class="xx-date xx-unavailable" id="' + year + '-' + mm + '-' + dd + '"><div class="cal_date"><div class="val">' + i + '</div></div></div>';
            $(structure).appendTo('.xx-calendar').html();
        }
        else if (checkDay == 2) {
            structure = '<div class="xx-date xx-booked" id="' + year + '-' + mm + '-' + dd + '"><div id="val">' + i + '</div></div>'
            $(structure).appendTo('.xx-calendar').html();
        }
    }
}

function drawRestCells(ddCount, ddLast) {
    var cells = 0;
    if (ddCount + ddLast - 1 > 35)
        cells = 42 - (ddCount + ddLast - 2);
    else if (ddCount + ddLast - 1 == 28)
        cells = 0;
    else if (ddCount + ddLast - 1 <= 35)
        cells = 35 - (ddCount + ddLast - 2);

    drawEmptyCells(cells);
}

function drawSelectedCells(){
}

$(document).on('click', '.previous_month', function() {
    if ((jsDate.getMonth() - 1 >= jsDateMin.getMonth() && jsDate.getFullYear() >= jsDateMin.getFullYear())      
    ||(jsDate.getMonth() - 1 < jsDateMin.getMonth() && jsDate.getFullYear() > jsDateMin.getFullYear()))
    {
        var node = document.getElementById("xx_calendar_container");
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
        jsDate.setMonth(jsDate.getMonth() - 1);
        drawCalendar(jsDate);
        if (rangeStartDate != null && rangeEndDate != null)
            selectRange(rangeStartDate, rangeEndDate);
    }
    var cw = $(".xx-date").width()
    $(".xx-date").height(cw);
});

$(document).on('click', '.next_month', function() {
    var node = document.getElementById("xx_calendar_container");
    while (node.firstChild) {
        node.removeChild(node.firstChild);
    }

    jsDate.setMonth(jsDate.getMonth() + 1);
    drawCalendar(jsDate);
    if (rangeStartDate != null && rangeEndDate != null)
        selectRange(rangeStartDate, rangeEndDate);

    var cw = $(".xx-date").width()
    $(".xx-date").height(cw);

});
 
function checkUnaviableDays(cdate) {
    var result = 0;
    $.each(datesUnavailable, function (k, undate) {
        if (undate.month == jsMonth && undate.year == jsYear) {
            if (undate.date.getTime() == cdate.getTime()) {
                result = 1;
                return false;
            }
        }   
    });
    $.each(datesBooked, function (k, undate) {
        if (undate.month == jsMonth && undate.year == jsYear) {
            if (undate.date.getTime() == cdate.getTime()) {
                result = 2;
                return false;
            }
        }   
    });

    var dtStart = new Date(jsDateMin)
    var firstDay = new Date(dtStart.getFullYear(), dtStart.getMonth(), 1);

    while (firstDay <= dtStart) {
        if (firstDay.getTime() == cdate.getTime()){
            result = 3;
            return false;
        }
        if (result == 3)
            break;
        firstDay.setDate(firstDay.getDate() + 1);
    }

    return result;
}

$(document).on('click', '.xx-enabled', function(e) {
    // $(this).find('.cal_date').siblings().removeClass('select_edge')
    var value = $(this).find('.val').text();
    clickCount++;
    if (clickCount == 1) {
        $('.cal_date').removeClass('select_edge')
        $(this).find('.cal_date').addClass('select_edge')
        $('.xx-date').css("background", "");
        $('.xx-date').removeClass('selected_date');
        // $('.selected_date').first().css("background", "#fff");
        rangeStartDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        rangeEndDate = null;
    }
    else if (clickCount == 2) {
        // $(this).find('.cal_date').addClass('select_edge')
       // $(this).addClass('selected');
        rangeEndDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        selectRange(rangeStartDate, rangeEndDate);
        CalcPrices();
        clickCount = 0;
    }
});

function CalcPrices(){
    var first = `${DateToUrlString(rangeStartDate)} 00:00:00`;
    var second = `${DateToUrlString(rangeEndDate)} 00:00:00`;
    var fIndex, sIndex;

    $.each(CalendarPrices, (i) => {
        if(CalendarPrices[i]._date == first){
            fIndex = i;
        }
        if(CalendarPrices[i]._date == second){
            sIndex = i;
        }
    })

    var total = 0
    for(var i = fIndex; i < sIndex; i++){
        total += parseFloat(CalendarPrices[i].price);
    }

    dateRangeStart = new Date(first.replace(' ', 'T'));
    dateRangeEnd = new Date(second.replace(' ', 'T'));
    totalNightsPrice = total;

    $(".night_price_nc").html(CalcNightCount(dateRangeStart, dateRangeEnd) + Vars.LngDisplay.Night)
    $(".night_price_np").html(`${Ccy}${Math.round(xrateprice(BaseCCY, ForeignCCY, CalcNightPrice(total)))}`)
    $(".night_price_tnp").html(Ccy + Math.round(xrateprice(BaseCCY, ForeignCCY, +total)))
    $(".night_price_cp").html(Ccy + Math.round(xrateprice(BaseCCY, ForeignCCY, cleaningPrice)))
    $(".night_price_cmp").html(Ccy + Math.round(xrateprice(BaseCCY, ForeignCCY, commission)))
    $(".night_price_tp").html(Ccy + Math.round(xrateprice(BaseCCY, ForeignCCY, +total + +cleaningPrice + +commission)))
    
}

function selectRange(start, end) {
    var dtStart = new Date(start.getTime());
    var dtEnd = new Date(end.getTime());
    if(rangeStartDate == null){
        rangeStartDate = new Date(dtStart.getTime());
    }
    if(start.getTime() != end.getTime()){
        if (start.getTime() < end.getTime()) {
            $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).find('.cal_date').addClass('select_edge')
            while (dtStart <= dtEnd) {
                if (!checkUnaviableDays(dtStart)) {
                    $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).addClass('selected_date');
                    dtStart.setDate(dtStart.getDate() + 1);
                }
                else break;
            }
            rangeEndDate = new Date(dtStart.getTime() - 1);
            
            $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + (dtStart.getDate() - 1)).slice(-2)).find('.cal_date').addClass('select_edge')
        }
        else
        {
            $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).find('.cal_date').addClass('select_edge')
            while (dtStart >= dtEnd) {
                if (!checkUnaviableDays(dtStart)) {
                    $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).addClass('selected_date');
                    dtStart.setDate(dtStart.getDate() - 1);
                }
                else break;
            }
            dtStart.setDate(dtStart.getDate() + 1);
            rangeEndDate = new Date(rangeStartDate.getTime());
            rangeStartDate = new Date(dtStart.getTime());
            $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).find('.cal_date').addClass('select_edge')
        }
    
        
        $('.selected_date').first().css("background", "linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(245,245,245,1) 50%)");
        $('.selected_date').last().css("background", "linear-gradient(90deg, rgba(245,245,245,1) 50%, rgba(255,255,255,0) 100%)");
        
        $("input[name='rangedate']").val(('0' + rangeStartDate.getDate()).slice(-2) + '.' + ('0' + (rangeStartDate.getMonth() + 1)).slice(-2) + '.' + rangeStartDate.getFullYear() + ' - ' + 
        ('0' + rangeEndDate.getDate()).slice(-2) + '.' + ('0' + (rangeEndDate.getMonth() + 1)).slice(-2) + '.' + rangeEndDate.getFullYear());
    }
}

