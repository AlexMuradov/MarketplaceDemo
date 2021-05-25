coordinate1 = "";
coordinate2 = "";
coordinate3 = "";
coordinate4 = "";



$(document).ready(function (e) {
    $(".input-visitor").val("1 " + Vars.LngHome.Person)
    $("#addProperty").attr("href", `/${Lng}/page.terms`)
    $("#Login_Profile").attr("href", `/${Lng}/auth.signin`)
    
    if($(".City").val()){
      fetch(`/api/v1/api__City:1/Input:${$(".City").val()}`)
      .then((response) => {
          return response.json();
        })
      .then((data) => {
          $("#cityId").val(data[0].ID)
      });
    }

    if($("#arrival").val()){
      $("#arrivalHidden").val() = $("#arrival").val();
    }
    
    if($("#departure").val()){
      $("#departureHidden").val() = $("#arrival").val();
    }

  })

    $('.form').submit(function( event ) {
      var inp = $(".form-input")

      if(inp[0].value != '' && inp[5].value != ''){
        $(".btn-load").css('display', 'flex');
        $(".btn-search").hide();
      }

      var v1 = $('#cityId').val();
      var v2 = $('#arrivalHidden').val();
      var v3 = $('#departureHidden').val();
      var v4 = $('#AdultGuests').val();
      var v5 = $('#ChildGuests').val();
      var v6 = $('.count__baby').val();
      

      var md1 = $("#arrivalMobDate").val();
      var md2 = $("#departureMobDate").val();

      if(md1 && md2){
        var date = new Date();
        date.setHours(0,0,0,0)
        if(new Date(md2) <= new Date(md1) || new Date(md1) < date){
          $("#arrivalMob").css('color', '#ff3535');
          $("#departureMob").css('color', '#ff3535');
          $(".btn-load").css('display', 'none');
          $(".btn-search").show();
          return false;
        }
        // alert('md1:' + md1 + '/md2:' + md2)

      }

      var url = "/" + Lng + "/" + "property.search/api__Search:1/CityID:" + v1 + "/checkinDate:"+v2+"/checkoutDate:"+v3+"/AdultGuests:"+v4+"/ChildGuests:"+v5+"/BabyGuests:"+v6 + "/SearchByLocation:" + searchByLocation+coordinate1+coordinate2+coordinate3+coordinate4;
      location.href = url;
      return false;

    });
    

  $(function() {
    $('input[name="arrival"]').daterangepicker({
      "autoApply": true,
      singleDatePicker: true,
      "maxDate": maxLimitDate,
      "minDate": today,
      startDate: moment().startOf('hour'),
      "drops": "auto",
      locale: {
          format: 'DD MMMM'
      }
    }, function(start, end, label) {
        $('#arrivalHidden').val(start.format('YYYY-MM-DD'));
        // $('input[name="departure"]').data('daterangepicker').setStartDate(start.format('DD/MM/YYYY'));
        $('input[name="departure"]').trigger("focus")
        }
    );

    $('input[name="departure"]').daterangepicker({
      "autoApply": true,
      singleDatePicker: true,
      "maxDate": maxLimitDate,
      "minDate": today,
      startDate: moment().startOf('hour').add(32, 'hour'),
      "drops": "auto",
      locale: {
          format: 'DD MMMM'
      }
    }, function(start, end, label) {
        $('#departureHidden').val(start.format('YYYY-MM-DD'));
    }
    );

    $('#arrivalHidden').val(moment().startOf('hour').format('YYYY-MM-DD'));
    $('#departureHidden').val(moment().startOf('hour').add(32, 'hour').format('YYYY-MM-DD'));

    
    $(".popup-close").on("click", function(e){
      hidePopup();
  });
  });

/* Here are the different messages we'll use for creating the 500 displayable message
const messages = [
  ['Mгновенное бронирование.', 'Быстрое подтверждение.', 'Удобная резервция.'],
  ['Проверенные квартиры.', 'Без посредников.', 'Поддержка 24/7.'],
  ['Оплата картой.', 'Без % дополнительных сборов.', 'Без скрытых Комиссий.', 'VISA/MasterCard.']
];*/

const messages = LngHomepageHeader;

const messageElements = [
document.querySelector('#js-part1'),
document.querySelector('#js-part2'),
document.querySelector('#js-part3')];

const widthElement = document.querySelector('#js-hidden');
let lastMessageType = -1;
let messageTimer = 4000;

document.addEventListener('DOMContentLoaded', event => {
  setupMessages();
  setInterval(() => {
    swapMessage();
  }, messageTimer);
});
function setupMessages() {
  messageElements.forEach((element, index) => {
    let newMessage = getNewMessage(index);
    element.innerText = newMessage;
  });
}
function calculateWidth(element, message) {
  widthElement.innerText = message;
  let newWidth = widthElement.getBoundingClientRect().width;
  element.style.width = `${newWidth}px`;
}
function swapMessage() {
  let toSwapIndex = getNewSwapIndex();
  let newMessage = getNewMessage(toSwapIndex);
  messageElements[toSwapIndex].style.lineHeight = '0';
  setTimeout(() => {
    checkWidthSet(toSwapIndex, messageElements[toSwapIndex].innerText);
    messageElements[toSwapIndex].innerText = newMessage;
    calculateWidth(messageElements[toSwapIndex], newMessage);
  }, 200);
  setTimeout(() => {
    messageElements[toSwapIndex].style.lineHeight = '1.2';
  }, 400);
}
function checkWidthSet(index, message) {
  if (false == messageElements[index].style.width) {
    messageElements[index].style.width = `${messageElements[index].clientWidth}px`;
  }
}
function getNewSwapIndex() {
  let newMessageIndex = Math.floor(Math.random() * messages.length);
  while (lastMessageType == newMessageIndex) {
    newMessageIndex = Math.floor(Math.random() * messages.length);
  }
  return newMessageIndex;
}
function getNewMessage(toSwapIndex) {
  const messagesArray = messages[toSwapIndex];
  const previousMessage = messageElements[toSwapIndex].innerText;
  let newMessageIndex = Math.floor(Math.random() * messagesArray.length);
  let newMessage = messagesArray[newMessageIndex];
  while (newMessage == previousMessage) {
    newMessageIndex = Math.floor(Math.random() * messagesArray.length);
    newMessage = messagesArray[newMessageIndex];
  }
  return newMessage;
}


var searchByLocation = 0;

$('#nearby').click(function() {
  navigator.permissions.query({
  name: 'geolocation'
}).then(function(result) {
    if (result.state == 'granted') {
      searchByLocation = 1;
      navigator.geolocation.getCurrentPosition(savePosition, console.log());
    } else if (result.state == 'prompt') {
        navigator.geolocation.getCurrentPosition(savePosition, console.log());
        searchByLocation = 1;
    } else if (result.state == 'denied') {
        alert("OUPS. Location permission is denied or geolocation is not supported by your browser.");
    }
    result.onchange = function() {
      if (result.state == 'denied') {
        alert("You select search near by and block location access. Why? :)");
    }
    if (result.state == 'granted') {
        searchByLocation = 1;
        navigator.geolocation.getCurrentPosition(savePosition, console.log());
    }
  }
});
  // if (navigator.geolocation) {
  //     navigator.geolocation.getCurrentPosition(savePosition, console.log());
  // } 
  // else {
  //   alert("OUPS. Location permission is denied or geolocation is not supported by your browser."); 
  // }
});


function savePosition(position) {
  console.log(position);
  coordinate1 = "/coordinates:" + parseFloat(position.coords.latitude - 0.001).toFixed(7);
  coordinate2 = "/coordinates:" + parseFloat(position.coords.longitude - 0.001).toFixed(7);
  coordinate3 =  "/coordinates:" +parseFloat(position.coords.latitude + 0.001).toFixed(7);
  coordinate4 = "/coordinates:" +parseFloat(position.coords.longitude + 0.001).toFixed(7);
}

