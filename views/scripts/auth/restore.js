$(document).ready(function(){
    if(ControllerResult[0] == "error"){
        NioApp.Toast(
            Vars["LngRegistration"][ControllerResult[ControllerResult.length - 1][ControllerResult[ControllerResult.length - 1].length-1]],
            'error', {
            position: 'top-center'
          });
    }    
})
