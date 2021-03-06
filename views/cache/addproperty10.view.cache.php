<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Добавление квартиры</title>
    <meta name="description" content="Xx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=400, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="//static/img/Xx..ico" type="image/x-icon">
    <link rel="stylesheet" href="https://static.rentxx.com/static/css/xxcalendar.css">
</head>

<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <!-- preloader -->

    <div class="calendar" id="xxcalendar">
      <div class="xx_cal_container" id="xx_calendar_container">
      </div>
      <form action="<?php echo $CalendarSaveButton; ?>" method="POST">
        <button type="submit" class="btn btn-red mt-22">Сохранить</button>
      </form>
      <button class="btn btn-red mt-22">Заблокировать</button>
    </div>

    <!-- <script src="https://momentjs.com/downloads/moment.js"></script> -->
    <script src="/static/js/jquery.min.js"></script>
    <!-- <script src="/static/js/jquery.inputmask.bundle.js"></script> -->
    <!-- <script src="/static/js/common.js"></script> -->
    
<!--     
    <script> moment().format() </script> 
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        
      headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: ''
      },
      initialDate: '2020-06-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = "Blocked";
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })

        }
        calendar.unselect()
        var dateFrom = moment(arg.start).format("YYYY-MM-DD");
        var dateTo = moment(arg.end).format("YYYY-MM-DD");

        $.ajax({
              url: window.location.pathname,
              type: 'GET',
              data: "dateFrom=" + dateFrom +"&dateTo=" + dateTo + "&step8_submit=1",
              processData: false,
              contentType: false,
              //success: function success(answer) {
              //  alert(answer);
              //}
            });

      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'Birthday Party',
          start: '2020-06-13',
          end: '2020-06-17'
        }
      ]
    });

    calendar.render();
  }); -->

<!-- 
            //data = '{ "one": "' + moment(arg.start).format("YYYY-MM-DD") + '", "two": "' + moment(arg.end).format("YYYY-MM-DD") + '",  "step8_submit":"' + 1 +'"}';
            //console.log(data);
            //console.log(window.location.pathname);
            //step8_submit = 1
            //$.ajax({
            //  type: "GET",
            //  contentType: 'application/json',
            //  url: "/test.php",
            //  data: 123,
            //  success: function(data){
            //    console.log(data);
            //  }
            //}); -->
<!-- </script> -->



<script>
  var xxdate = '2020-08-06';
var dateParts = xxdate.split("-");
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


var getDates = function(startDate, endDate) {
    var dates = [],
    currentDate = startDate,
    addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };
    while (currentDate <= endDate) {
        dates.push(currentDate);
        currentDate = addDays.call(currentDate, 1);
    }
    return dates;
};

var dates = getDates(new Date(1900,01,01), new Date(1900,01,02));   

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
            structure = '<div class="xx-enabled" id="' + year + '-' + mm + '-' + dd + '" <span> </span><div id="val">' + i + '</div></div>';
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
    var node = document.getElementById("xx_calendar_container");
    while (node.firstChild) {
        node.removeChild(node.firstChild);
    }
    jsDate.setMonth(jsDate.getMonth() - 1);
    drawCalendar(jsDate);
    if (rangeStartDate != null && rangeEndDate != null)
        selectRange(rangeStartDate, rangeEndDate);
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
    $.each(dates, function (k, undate) {
        if (undate.getTime() == cdate.getTime()) {
            result = true;
            return false;
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
        rangeEndDate.setDate(dtStart.getDate() - 1);
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


</script>

</body>

</html>