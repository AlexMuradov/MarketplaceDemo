
$.each(PropertyType, function(k, v) {
    if (Page_Data_Listings != '') {
        if (Page_Data_Listings[0].PropertyType == k) {
            $('#PropertyType').append("<li class='select-option active' id='" + k + "'>" + v + "</li>");
            $('.input-select').val(v);
            $('#input-ids').val(k);
        }
        else $('#PropertyType').append("<li class='select-option' id='" + k + "'>" + v + "</li>");
    }
    else $('#PropertyType').append("<li class='select-option' id='" + k + "'>" + v + "</li>");
});

if (Page_Data_Listings != '')
{
    var str = "#v" + Page_Data_Listings[0].PlaceType;
    if (Page_Data_Listings[0].PlaceType != null)
        $(str).prop("checked", true)
    
    $('input[name=Title]').val(Page_Data_Listings[0].Title);
    $('textarea[name=Description]').val(Page_Data_Listings[0].Description);
}

$('.input-select').focusout(function () {
    $('.input-select').css({'border' : '1px solid #12457061'});
})

function validate() {
    var el = document.getElementById('input-ids');
    var el2 = document.getElementById('input-title');
    if (el.value.replaceAll(' ', '') === "")
    {
        $('.input-select').css({'border' : '1px solid #ff3535'});
        // console.log(el.value);
        return false;
    }
    else if(el2.value === ""){
        $('#input-title').css({'border' : '1px solid #ff3535'});
        // console.log(el.value);
        return false;
    }
    return true;
}


$(document).ready(function(){
    $(".chCounter .cc").text($("input[name='Title']").val().length)

    $("input[name='Title']").on('keyup', () => {
        $(".chCounter .cc").text($("input[name='Title']").val().length)
    })
    $(".logo").attr("href", `/${Lng}/home`)
})
