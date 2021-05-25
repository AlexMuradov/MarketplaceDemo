
$(document).ready(function (e) {
    ReadResources();
    PlaceholderResources();
})

function ReadResources(){
    for (var item in Vars) {
        var resArr = Vars[item];
        for (var i in resArr) {
            // if((i.isArray())){

            // }
            var el = $(".res_" + i);
            if(el.length != 0){
                el.prepend(resArr[i]);
            }
        }
    }
}

function PlaceholderResources(){
    for (var item in Vars) {
        var resArr = Vars[item];
        for (var i in resArr) {
            var el = $("[rp-area=" + i + "]");
            if(el.length != 0){
                el.attr("placeholder", resArr[i]);
            }
        }
    }
}