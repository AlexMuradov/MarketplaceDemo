$(document).ready(function(){
    if(ControllerResult[0] == "error"){
        NioApp.Toast(
            Vars["LngRegistration"][ControllerResult[ControllerResult.length - 1][ControllerResult[ControllerResult.length - 1].length-1]],
            'error', {
            position: 'top-center'
          });
    }    

    var propertyId = "";

    function FilterUrl(){
        if(document.location.href.search('/CityID')){
            propertyId = document.location.href.substring(document.location.href.search('propertyID') + 11)
            $("form")[0].action = $("form")[0].action + document.location.href.substring(document.location.href.search('auth.signin') + 11)
        }
        var params = document.location.pathname.split("/")
        if(params.filter(el => el.includes('message')).length){
            NioApp.Toast(
                'Verification message send to your email',
                'success', {
                position: 'top-center'
              });
        }
    }
    FilterUrl()
})