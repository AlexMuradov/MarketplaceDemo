var xxdate = typeof CurrentTime !== 'undefined' ? CurrentTime.slice(0, 11) : moment().format('DD/MM/YYYY HH:mm:ss');
var dateParts = xxdate.split("/");
var jsDateMin = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));
var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
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

$.each(typeof CalendarDates !== 'undefined' ? CalendarDates : '', function (k, undate) {
    var dtStart = new Date(undate.DateFrom);
    var dtEnd = new Date(undate.DateTo);
    
    if (dtStart.getTime() <= dtEnd.getTime()) {
        while (dtStart <= dtEnd) {
           datesUnavailable.push({dd: dtStart.getDate(), dt: dtStart.getFullYear() + '-' + dtStart.getMonth() + 1 + '-' + ("0" + dtStart.getDate()).slice(0, 2), month: dtStart.getMonth() + 1, year: dtStart.getFullYear(), date: new Date(dtStart.getFullYear(), dtStart.getMonth(), dtStart.getDate())});
            dtStart.setDate(dtStart.getDate() + 1);
        }
    }
});


$(document).ready(function () {
   drawCalendar(jsDate);
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
    var structure = '<div class="xx-calendar"><div class="xx-month"><div class="previous"><ion-icon name="chevron-back-outline"></ion-icon></div>' + Month[jsMonth - 1] + ' ' + jsYear + '<div class="next"><ion-icon name="chevron-forward-outline"></ion-icon></div></div>';
    structure = structure + '<div class="xx-weekdays">Mon</div><div class="xx-weekdays">Tue</div><div class="xx-weekdays">Wed</div><div class="xx-weekdays">Thu</div><div class="xx-weekdays">Fri</div><div class="xx-weekdays">Sat</div><div class="xx-weekdays">Sun</div></div>'
    
    $(structure).appendTo('.xx_cal_container').html();
    if (jsDayOfWeek != 1) {
        drawEmptyCells(jsDayOfWeek);
    }
    drawEnabledCells(lastDay, jsYear, jsMonth);
    drawRestCells(jsDayOfWeek, lastDay);
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
    for(var i = 1; i <= cellsCount; i++) {
        var dd = ('0' + i).slice(-2);
        var mm = ('0' + month).slice(-2);
        var cdate = new Date(year, month-1, dd);
       
        if (!checkUnaviableDays(cdate)) {
            structure = '<div class="xx-enabled" id="' + year + '-' + mm + '-' + dd + '"><span>USD<div>125</div></span><div id="val">' + i + '</div></div>';
            $(structure).appendTo('.xx-calendar').html();
        }
        else {
            structure = '<div class="xx-unavailable" id="' + year + '-' + mm + '-' + dd + '"><div>' + i + '</div></div>'
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

$(document).on('click', '.previous', function() {
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
});

$(document).on('click', '.next', function() {
    var node = document.getElementById("xx_calendar_container");
    while (node.firstChild) {
        node.removeChild(node.firstChild);
    }

    jsDate.setMonth(jsDate.getMonth() + 1);
    drawCalendar(jsDate);
    if (rangeStartDate != null && rangeEndDate != null)
        selectRange(rangeStartDate, rangeEndDate);
});
 
function checkUnaviableDays(cdate) {
    var result = false;
    $.each(datesUnavailable, function (k, undate) {
        if (undate.month == jsMonth && undate.year == jsYear) {
            if (undate.date.getTime() == cdate.getTime()) {
                result = true;
                return false;
            }
        }   
    });
    return result;
}

$(document).on('click', '.xx-enabled', function(e) {
    var value = $(this).children('#val').text();
    clickCount++;
    if (clickCount == 1) {
        $(this).addClass('selected').siblings().removeClass('selected');
        rangeStartDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        rangeEndDate = null;
    }
    else if (clickCount == 2) {
       // $(this).addClass('selected');
        rangeEndDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        selectRange(rangeStartDate, rangeEndDate);
        clickCount = 0;
    }
});

function selectRange(start, end) {
    var dtStart = new Date(start.getTime());
    var dtEnd = new Date(end.getTime());
    if (start.getTime() < end.getTime()) {
        while (dtStart <= dtEnd) {
            if (!checkUnaviableDays(dtStart)) {
                $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).addClass('selected');
                dtStart.setDate(dtStart.getDate() + 1);
            }
            else break;
        }
        rangeEndDate = new Date(dtStart.getTime() - 1);
    }
    else
    {
        while (dtStart >= dtEnd) {
            if (!checkUnaviableDays(dtStart)) {
                $('#' + dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2)).addClass('selected');
                dtStart.setDate(dtStart.getDate() - 1);
            }
            else break;
        }
        dtStart.setDate(dtStart.getDate() + 1);
        rangeEndDate = new Date(rangeStartDate.getTime());
        rangeStartDate = new Date(dtStart.getTime());
    }
    $("input[name='rangedate']").val(('0' + rangeStartDate.getDate()).slice(-2) + '.' + ('0' + (rangeStartDate.getMonth() + 1)).slice(-2) + '.' + rangeStartDate.getFullYear() + ' - ' + 
    ('0' + rangeEndDate.getDate()).slice(-2) + '.' + ('0' + (rangeEndDate.getMonth() + 1)).slice(-2) + '.' + rangeEndDate.getFullYear());
}

