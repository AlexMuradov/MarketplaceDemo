$(document).ready(function(){
    if(ControllerResult[0] == "error"){
        NioApp.Toast(
            Vars["LngRegistration"][ControllerResult[ControllerResult.length - 1]],
            'error', {
            position: 'top-center'
          });
    }    

    $("#checkbox").on('click', () => {
        if($("#checkbox").prop('checked')){
            $("form button").attr('disabled', false)
        }
        else{
            $("form button").attr('disabled', true)
        }
    })
})
