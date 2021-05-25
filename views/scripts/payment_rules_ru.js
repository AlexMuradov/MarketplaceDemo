/*if (TotalNights == 1 || TotalNights == 21 || TotalNights == 31) { NText = Nights1 }
else if(TotalNights >= 2 && TotalNights <= 4) { NText = Nights2 }
else if(TotalNights >= 22 && TotalNights <= 24) { NText = Nights2 }
else { NText = Nights5 }*/

let dateF = new Date(DateFrom);
let dateT = new Date(DateTo);
//alert( dateT.getDay() );

/*
$( "#TotalNights" ).append( City + ' — ' + TotalNights + ' ' + NText);
$( "#CheckInType" ).append( City + ' — ' + TotalNights + ' ' + NText);
$( "#CheckIn" ).append( ArrivalAt  + ' ' + ArrivalWeekDay + ' ' + After + ' ' + CheckInTime);
$( "#CheckOut" ).append( DepartureAt  + ' ' + DepartureWeekDay + ' ' + Before + ' ' + CheckOutTime);
$( "#ArrivalDate" ).append( ArrivalDayNum + ' ' + ArrivalMonth);
$( "#DepartureDate" ).append( DepartureDayNum + ' ' + DepartureMonth);


$.each(PropertyRules, function( k, v ) {
k=k+1;
if (v.RuleID == 5) {
  var sprite = 3;
} 
else if (v.RuleID == 4) {
  var sprite = 2;
} 
else {
  var sprite = v.RuleID;
}
if (!PropertyRulesName[k][1]) {
  var dis = ' disabled';
} else {
  var dis = '';
}
  var rememberhtml = [
  '<div class="remember__item' + dis + '">',
  '<div class="remember__icon">',
  '<svg>',
  '<use xlink:href="/static/img/sprite/sprite.svg#'+ sprite +'" ></use>',
  '</svg>',
  '</div>',
  '<p class="remember__text">' + PropertyRulesName[k][0] + '</p>',
  '</div>'
  ];

  $(rememberhtml.join('')).appendTo(".remember__row");

});*/