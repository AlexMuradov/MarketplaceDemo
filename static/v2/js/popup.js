// function popupToggle(){
//     document.getElementById("popup-side").classList.toggle("active");
// }

function hidePopup(){
    $("#popup-side").removeClass("active");
}

$(document).click(function (e)
        {
            // var container = $(".popupToggle");
            // if ((!container.is(e.target)))     // if the target of the click isn't the TOGGLE BUTTON... 
            if ($(e.target).hasClass("popupToggle"))     // if the target of the click isn't the TOGGLE BUTTON... 
            {
                // Code to hide the menu
                $("#popup-side").toggleClass("active");
            }
            else{
                $("#popup-side").removeClass("active");
                $(".popup__slider").removeClass("active");
                $(".popup_price").removeClass("active");
                $(".popup__additional-filters").removeClass("active");
                $(".positionTop").removeClass("active");
            }
        });