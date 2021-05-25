$.each(BeforeArriveList, function(k, v) {
   if (Page_Data_Listings != '') {
      if (Page_Data_Listings[0].RequestWindow == k) {
         $('#BeforeArriveList').append("<li class='select-option active' id='" + k + "'>" + v[1] + "</li>");
         $("#Request").val(v[1]);
         $("input[name='RequestWindow']").val(k);
      }
      else
         $('#BeforeArriveList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
   }
    else
      $('#BeforeArriveList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");

});

$.each(ArriveTime, function(k, v) {
   if (Page_Data_Listings != '') {
      if (Page_Data_Listings[0].CheckInTime == k) {
         $('#ArriveTimeFromList').append("<li class='select-option active' id='" + k + "'>" + v[1] + "</li>");
         $("#CheckIn").val(v[1]);
         $("input[name='CheckInTime']").val(k);
      }
      else
         $('#ArriveTimeFromList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
   }
   else
      $('#ArriveTimeFromList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
});

$.each(ArriveTime, function(k, v) {
   if (Page_Data_Listings != '') {
      if (Page_Data_Listings[0].CheckOutTime == k) {
         $('#ArriveTimeToList').append("<li class='select-option active' id='" + k + "'>" + v[1] + "</li>");
         $("#CheckOut").val(v[1]);
         $("input[name='CheckOutTime']").val(k);
      }
      else
         $('#ArriveTimeToList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
   }
   else
      $('#ArriveTimeToList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
});

$.each(TimeInAdvance, function(k, v) {
   if (Page_Data_Listings != '') {
      if (Page_Data_Listings[0].AdvanceWindow == k) {
         $('#TimeInAdvanceList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
         $("#Advance").val(v[1]);
         $("input[name='AdvanceWindow']").val(k);
      }
      else
         $('#TimeInAdvanceList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
   }
   else
      $('#TimeInAdvanceList').append("<li class='select-option' id='" + k + "'>" + v[1] + "</li>");
});

if (Page_Data_Listings != '') {
   if (Page_Data_Listings[0].MinNightsStay != null)
      $("input[name='MinNightsStay']").val(Page_Data_Listings[0].MinNightsStay);

   if (Page_Data_Listings[0].MaxNightsStay != null)
      $("input[name='MaxNightsStay']").val(Page_Data_Listings[0].MaxNightsStay);

      if (Page_Data_Listings[0].InstantBooking != null)
      {
         if (Page_Data_Listings[0].InstantBooking == 1)
            $("#instant").prop("checked", true)
         else 
            $("#manual").prop("checked", true)
      }
}        

$(document).on('click', '.select-option', function (e) {
   let option = $(this).text();
   
   e.preventDefault();
   $(this).addClass('active').siblings().removeClass('active');
   $(this).closest(".select").slideUp(300);
   
   var str = $(this).attr("id");

   var parentElement = $(this).parentsUntil("form");
   $(parentElement[1]).children('#input-id').val(str);
});

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

//var xxdate = '2020-08-06';
var xxdate = CurrentTime.slice(0, 11);
var dateParts = xxdate.split("/");
var jsDateMin = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));
var jsDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));
var clickCount = 0;
var rangeStartDate = null;
var rangeEndDate = null;

var disabledRange = [];
var datesUnavailable = [];
var datesBooked = [];
var ResultDateRanges = [];   


$.each(CalendarDates, function (k, undate) {
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
    var structure = '<div class="xx-calendar"><div class="xx-month"><div class="previous"><ion-icon name="chevron-back-outline"></ion-icon></div>' + Month[jsMonth-1] + ' ' + jsYear + '<div class="next"><ion-icon name="chevron-forward-outline"></ion-icon></div></div>';
    structure = structure + '<div class="xx-weekdays">Mon</div><div class="xx-weekdays">Tue</div><div class="xx-weekdays">Wed</div><div class="xx-weekdays">Thu</div><div class="xx-weekdays">Fri</div><div class="xx-weekdays">Sat</div><div class="xx-weekdays">Sun</div></div>'
    
    $(structure).appendTo('.xx_cal_container').html();

    if (jsDayOfWeek != 1) {
        drawEmptyCells(jsDayOfWeek);
    }
    drawEnabledCells(lastDay, jsYear, jsMonth);
    drawRestCells(jsDayOfWeek, lastDay);
    drawDisabledCells();
};

function drawEmptyCells(cellsCount) {
    structure = '';
    for (var i = 1; i < cellsCount; i++) {
        structure = structure + '<div class="xx-empty"><div></div></div>';
    }
    $(structure).appendTo('.xx-calendar').html();




}

function drawDisabledCells(){
    var dtStart = new Date(jsDateMin)
    var firstDay = new Date(dtStart.getFullYear(), dtStart.getMonth(), 1);

    while (firstDay <= dtStart) {
        $("#" + DateFormat(firstDay)).attr('class', 'xx-disabled');
        firstDay.setDate(firstDay.getDate() + 1);
    }
}


function drawEnabledCells(cellsCount, year, month) {
    for(var i = 1; i <= cellsCount; i++) {
        var dd = ('0' + i).slice(-2);
        var mm = ('0' + month).slice(-2);
        var cdate = new Date(year, month-1, dd);
       
        var checkDay = checkUnaviableDays(cdate);
        if (checkDay == 0) {
            structure = '<div class="xx-enabled" id="' + year + '-' + mm + '-' + dd + '"><div id="val">' + i + '</div></div>';
            $(structure).appendTo('.xx-calendar').html();
        }
        else if (checkDay == 1) {
            structure = '<div class="xx-unavailable" id="' + year + '-' + mm + '-' + dd + '"><div id="val">' + i + '</div></div>'
            $(structure).appendTo('.xx-calendar').html();
        }
        else if (checkDay == 2) {
            structure = '<div class="xx-booked" id="' + year + '-' + mm + '-' + dd + '"><div id="val">' + i + '</div></div>'
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
        // clickCount = 0;
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
    //clickCount = 0;
    if (rangeStartDate != null && rangeEndDate != null)
            selectRange(rangeStartDate, rangeEndDate);
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

function checkBookedDays(cdate) {
    var result = false;
    $.each(datesBooked, function (k, undate) {
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
        rangeEndDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        selectRange(rangeStartDate, rangeEndDate);
        clickCount = 0;
    }
});

$(document).on('click', '.xx-unavailable', function(e) {
    var value = $(this).children('#val').text();
    clickCount++;
    if (clickCount == 1) {
        $(this).addClass('selected').siblings().removeClass('selected');
        rangeStartDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        rangeEndDate = null;
    }
    else if (clickCount == 2) {
        rangeEndDate = Object.assign(new Date(jsYear, jsMonth - 1, value));
        selectRange(rangeStartDate, rangeEndDate);
        clickCount = 0;
    }
});

function selectRange(start, end) {
    if (rangeStartDate != null) {
        var dtStart = new Date(start.getTime());
        var dtEnd = new Date(end.getTime());
        if (start.getTime() < end.getTime()) {
            while (dtStart <= dtEnd) {
                $('#' + DateFormat(dtStart)).addClass('selected');
                dtStart.setDate(dtStart.getDate() + 1);
            }
            rangeEndDate = new Date(dtStart.getTime() - 1);
        }
        else {
            while (dtStart >= dtEnd) {
                $('#' + DateFormat(dtStart)).addClass('selected');
                dtStart.setDate(dtStart.getDate() - 1);
            }
            dtStart.setDate(dtStart.getDate() + 1);
            rangeEndDate = new Date(rangeStartDate.getTime());
            rangeStartDate = new Date(dtStart.getTime());
        }
    }
}

$(document).on('click', '.disable', function(e) {
    disableDays();
});

$(document).on('click', '.enable', function(e) {
    enableDays();
});

function disableDays() {
    if (rangeStartDate != null) {
        var dtStart = new Date(rangeStartDate.getTime());
        if (rangeEndDate != null)
            var dtEnd = new Date(rangeEndDate.getTime());
        else
            var dtEnd = new Date(rangeStartDate.getTime());

        if (dtStart.getTime() <= dtEnd.getTime()){
            while (dtStart <= dtEnd) {
                //not booking
                if (checkUnaviableDays(dtStart) != 2){
                    disableCell(dtStart);
                }
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
        else {
            while (dtStart >= dtEnd){
                //not booking
                if (checkUnaviableDays(dtStart) != 2){
                    disableCell(dtStart);
                }
                dtStart.setDate(dtStart.getDate() - 1);
            }
        }
         datesUnavailable = datesUnavailable.sort(function(a, b) { return new Date(a.date).getTime() - new Date(b.date).getTime() });
         UpdateDisabledRanges(datesUnavailable);

        rangeStartDate = null;
        rangeEndDate = null;
        clickCount = 0;

        saveCal();
    }
}

function enableDays() {
    if (rangeStartDate != null) {
        var dtStart = new Date(rangeStartDate.getTime());
        if (rangeEndDate != null)
            var dtEnd = new Date(rangeEndDate.getTime());
        else
            var dtEnd = new Date(rangeStartDate.getTime());

        if (dtStart.getTime() <= dtEnd.getTime()) {
            while (dtStart <= dtEnd) {
                if (checkUnaviableDays(dtStart) != 2){
                   enableCell(dtStart);
                }
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
        else {
            while (dtStart >= dtEnd) {
                if (checkUnaviableDays(dtStart) != 2){
                    enableCell(dtStart);
                }
                dtStart.setDate(dtStart.getDate() - 1);
            }
        }
        datesUnavailable = datesUnavailable.sort(function(a, b) { return new Date(a.date).getTime() - new Date(b.date).getTime() });
        UpdateDisabledRanges(datesUnavailable);

        rangeStartDate = null;
        rangeEndDate = null;
        clickCount = 0;

        saveCal();
    }
}

function DateFormat(dt){
    return dt.getFullYear() + '-' + ('0' + (dt.getMonth() + 1)).slice(-2) + '-' + ('0' + dt.getDate()).slice(-2); 
}

function enableCell(dt){
    $("#" + DateFormat(dt)).attr('class', 'xx-enabled');
    for( var i = 0; i < datesUnavailable.length; i++) {
        if (moment(datesUnavailable[i].date).format('YYYY-MM-DD') === moment(dt).format('YYYY-MM-DD')) {
            datesUnavailable.splice(i, 1);
        }
    }
}

function disableCell(dt){
    $("#" + DateFormat(dt)).attr('class', 'xx-unavailable');
    datesUnavailable.push({dd: dt.getDate(), month: dt.getMonth() + 1, year: dt.getFullYear(), 
                                date: new Date(dt.getFullYear(), dt.getMonth(), dt.getDate())});
}

function UpdateDisabledRanges(arr)
{
    var start;
    var end;
    ResultDateRanges = [];
    var startIndex = 0;
    var startAgain = false;
    if (arr.length != 0) {
        for(var i = 0; i < arr.length; i++) {
            if (i == startIndex || startAgain) {
                start = arr[i].date;
                startAgain = false;
            }
            var res = (arr[i == arr.length - 1 ? 0 : i + 1].date.getTime() - arr[i].date.getTime())/(1000 * 60 * 60 * 24);
            if(res != 1 && res != 0) {
                startAgain = true;
                end = new Date(arr[i].date.getTime());
             
                ResultDateRanges.push({startDate: start.getFullYear() + '-' + ('0' + (start.getMonth() + 1)).slice(-2) + '-' + ('0' + start.getDate()).slice(-2),
                    endDate: end.getFullYear() + '-' + ('0' + (end.getMonth() + 1)).slice(-2) + '-' + ('0' + end.getDate()).slice(-2)});
            }
        }
    }
    console.log(ResultDateRanges);
}

$('#Request').focusout(function (){
    $('#Request').css({'border' : '1px solid #12457061'});
});
 
 $('#CheckIn').focusout(function (){
    $('#CheckIn').css({'border' : '1px solid #12457061'});
});
 
 $('#CheckOut').focusout(function (){
    $('#CheckOut').css({'border' : '1px solid #12457061'});
});

 $('#Advance').focusout(function (){
    $('#Advance').css({'border' : '1px solid #12457061'});
});
 
function validate() {
    var result = true;
    var requestInput = document.getElementById('Request');
    var checkInInput = document.getElementById('CheckIn');
    var checkOutInput = document.getElementById('CheckOut');
    var advanceInput = document.getElementById('Advance');

    if (requestInput.value == "") {
       $(requestInput).css({'border' : '1px solid red'});
       result = false;
    }
    if (checkInInput.value == "") {
       $(checkInInput).css({'border' : '1px solid red'});
       result = false;
    } 
    if (checkOutInput.value == "") {
       $(checkOutInput).css({'border' : '1px solid red'});
       result = false;
    } 
    if (advanceInput.value == "") {
        $(advanceInput).css({'border' : '1px solid red'});
        result = false;
    } 
    // add logic here
    if (checkInInput.value != "" && checkOutInput.value != "") {
        checkInId = document.getElementsByName('CheckInTime')[0].value;
        checkOutId = document.getElementsByName('CheckOutTime')[0].value;

        if (checkInId == 1 && checkOutId == 1) {
            //add some text to error text
            $(checkInInput).css({'border' : '1px solid red'});
            $(checkOutInput).css({'border' : '1px solid red'});
            result = false;
        }
        else {
            if (checkInId < checkOutId) {
                //add error text 
                $(checkInInput).css({'border' : '1px solid red'});
                $(checkOutInput).css({'border' : '1px solid red'});
                result = false;
            }
        }
    }
    else { result = false; }

    if (result == false) {
        document.querySelector('.title').scrollIntoView({ behavior: 'smooth' })
    }
    return result;
 }

//  $('.input-select').onchange(function (){
//     $('#CountrySelect').css({'border' : '1px solid #12457061'});
//  });


$('#setCustomPrice').click(function () {
    
    var arr = getDaysFromRange();
    console.log(arr);

    $.ajax({
        type: "POST",
        url: "/api/v1/",
        data: {api__SetCustomPrice: 1, listingId : Page_Data_Listings[0]['ID'], dates: arr, price: 145},
        success: function(result) {
            alert(result);
        },
        error: function(result) {
            alert('error');
        }
    });
});


$('#deleteCustomPrice').click(function () {
    var arr = getDaysFromRange();
    console.log(arr);

    $.ajax({
        type: "POST",
        url: "/api/v1/",
        data: {api__DeleteCustomPrice: 1, listingId : Page_Data_Listings[0]['ID'], dates: arr},
        success: function(result) {
            alert(result);
        },
        error: function(result) {
            alert('error');
        }
    });
})


var customPriceArr = [];

function getDaysFromRange(){
    if (rangeStartDate != null) {
        customPriceArr = [];
        var dtStart = new Date(rangeStartDate.getTime());
        if (rangeEndDate != null)
            var dtEnd = new Date(rangeEndDate.getTime());
        else
            var dtEnd = new Date(rangeStartDate.getTime());

        if (dtStart.getTime() <= dtEnd.getTime()){
            while (dtStart <= dtEnd) {
                if (checkUnaviableDays(dtStart) != 2){
                    customPriceArr.push(dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2));
                }
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
        else {
            while (dtStart >= dtEnd) {
                if (checkUnaviableDays(dtStart) != 2){
                    customPriceArr.push(dtStart.getFullYear() + '-' + ('0' + (dtStart.getMonth() + 1)).slice(-2) + '-' + ('0' + dtStart.getDate()).slice(-2));
                }
                dtStart.setDate(dtStart.getDate() + 1);
            }
        }
        return customPriceArr;
    }
    
}


function saveCal(){
    
    $.ajax({
        type: "POST",
        url: "/api/v1/",
        data: {api__EditCalendar: 1, datesRange : ResultDateRanges, listingId : Page_Data_Listings[0]['ID']},
        success: function(result) {
          //  alert(result);
        },
        error: function(result) {
            alert('error');
        }
    });
}
