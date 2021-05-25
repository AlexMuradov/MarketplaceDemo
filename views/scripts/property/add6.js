$.each(Rules, function(k, v) {
    $('#RulesList').append('<div class="rules__block-set">' +
    '<div class="rules__set">' + 
        '<p class="counts-item">' + v[0] +
        '</p>'+
    '</div>' +
    '<div class="popup__row">' +
        '<label class="label-checkbox label-checkbox__reject">' +
            '<input type="radio" name="' + v[1] + '" id="reject' + v[1] + '-' + k +'" value="0" class="checkbox checkbox__reject">' +
            '<span class="check"></span>' +
            '<span class="check-text"></span>' + 
        '</label>' +
        '<label class="label-checkbox label-checkbox__accept">' + 
            '<input type="radio" name="' + v[1] + '"id="accept' + v[1] + '-' + k +'" value="1" class="checkbox checkbox__accept">' +
            '<span class="check"></span>' + 
            '<span class="check-text"></span>' + 
        '</label>' + 
    '</div>' +
    '</div>'); 

    if (Page_Data_Rules != '') {
        for (i = 0; i < Page_Data_Rules.length ; i++) {
            var str = "#reject" + v[1] + '-' + k;
            
            if (Page_Data_Rules[i].RuleID == k) {
                if (Page_Data_Rules[i].Value == 0) {
                    var str = "#reject" + v[1] + '-' + k;
                    $(str).prop('checked', true);
                }
                if (Page_Data_Rules[i].Value == 1) {
                    var str = "#accept" + v[1] + '-' + k;
                    $(str).prop('checked', true);
                }
            }
        }
    }
 });

$(document).ready(() => {
    $("form").on("submit", (e) => {
        if($("input[type=radio]:checked").length < 10){
            e.preventDefault()
            
            toastr.error('Please select all boxes')
            // alert("Please select all boxes")
            // $(".notif").text(`Please select all boxes`)
        }
    })

    $(".payment__form a").on("click", (e) => {
        if($("input[type=radio]:checked").length < 10){
            e.preventDefault()
            toastr.error('Please select all boxes')
            // $(".notif").text(`Please select all boxes`)
        }
    })
})