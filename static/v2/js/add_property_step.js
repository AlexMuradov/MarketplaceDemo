$(document).ready(() => {
    SetStep();

    $(document.body).on("click", "#saveFinishBtn", () => {
        $("form").prepend(`
            <input type="hidden" name="finish" value="1">
        `)
        $("#submitBtn").trigger("click");
    })
})

function SetStep(){
    var step = document.location.href.substr(document.location.href.search('/step:') + 6, 1)
    $($(".payment__form-ul").children()[step - 1]).addClass('text-16').siblings().removeClass('text-16');
    $.each($(".payment__form-ul").children(), (k) => {
        $($(".payment__form-ul").children()[k]).find('a').attr('href', `/${Lng}/property.add/step:${k+1}/listing:${ListingID}`);
    })
    $(".progress").addClass('progress_' + step)

    if(step == 9){
        $("#saveFinishBtn").hide();
    }
}