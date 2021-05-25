// $('#target').submit( function(event) {
//     event.preventDefault();
//      //event.stopPropagation();
//     var formData = new FormData();

//     var files = [];
//     files.push($('#front')[0].files[0]);
//     files.push($('#back')[0].files[0]);
//     console.log(files);

//     formData.set('IDType', $('#IDType').val());
//     formData.set('files', files);
//     formData.set('api__AddFront', 1);


//    // $('#target').submit();

//     $.ajax({
//         type: "POST",
//         url: window.location,
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(msg) {
//            // NioApp.Toast('We are verifying your ID.', 'Info', {position: 'top-center'}); 
//            alert(msg);
//         },
//         error: function() {
//             alert("Sorry! Couldn't process your request")
//         }
//     });

// })


 if (AccountDocuments != ''){
    $('#front').attr("disabled", true);
    $('#back').attr("disabled", true);
    $('save').attr("disabled", true);
    
    if (AccountDocuments[0]['Verified'] == 0) {
        $('#titleDescription').html('You have already provided ID documents. We are verifying your documents. <a href="https://www.rentxx.com/">more info...</a>');
        $('#titleDescription').attr("class", "text-info");
        //$('#docInfoTitle').append(` <p class="sub-title text-primary"</p>`);
    }
    else if (AccountDocuments[0]['Verified'] == 1) {
        $('#titleDescription').html("You have already provided ID documents. ??Now you can add and book lisitings.");
        $('#titleDescription').attr("class", "text-info");
        $('#docInfoTitle').append(`<a class="text-primary" href="https://www.rentxx.com/">more info...</a>`);
    }
}



