function upd(id) {
    $('#uploadedFiles').empty();
    $.ajax({
        url: "/ru/fileupload/listfiles:1/listing:" + id,
        dataType: "JSON",
        success: function(json){
            for(var i=0;i<json.length;i++){
                var filename = json[i]['Filename'];
                var filenr = json[i]['ID'];
                var filetype = json[i]['Type'];

                 if(filetype==1) { var ftype = "(Главная)"; } else { var ftype = ""; }
                var htmll = "<div><img style='display:inline; vertical-align:middle' src='/static/uploads/listings/thumbs/"+filename+"'><span> <a href='#' onclick='delphoto("+filenr+","+id+");'>Delete</a> - <a href='#' onclick='makemainp("+filenr+","+id+")'>MakeMain</a> "+ftype+"</span></div><br/>";
                $("#uploadedFiles").append(htmll);
            }
        }
    });
}

function delphoto(id, lid) {
    $.ajax({
        type: "POST",
        url: "/ru/fileupload/del:" + id,
        data: 1//,
        //success: success,
        //dataType: dataType
      });
      upd(lid);
}

function makemainp(id, lid) {
    $.ajax({
        type: "POST",
        url: "/ru/fileupload/makemain:" + id,
        data: 1//,
        //success: success,
        //dataType: dataType
      });
      upd(lid);
}

$.ajax({
    url: "/ru/fileupload/listfiles:1/listing:" + ListingID,
    dataType: "JSON",
    success: function (json) {
        for (var i = 0; i < json.length; i++) {
            var filename = json[i]['Filename'];
            var filenr = json[i]['ID'];
            var filetype = json[i]['Type'];

            if (filetype == 1) { var ftype = "(Главная)"; } else { var ftype = ""; }
            var htmll = "<div><img style='display:inline; vertical-align:middle' src='/static/uploads/listings/thumbs/" + filename + "'><span> <a href='#' onclick='delphoto(" + filenr + ", " + ListingID + ");'>Delete</a> - <a href='#' onclick='makemainp(" + filenr + ", "+ListingID+")'>MakeMain</a> " + ftype + "</span></div><br/>";
            $("#uploadedFiles").append(htmll);
        }
    }
});

// $(document).ready(() => {
//     $(".btn__block a").on("click", (e) => {
//         if($("#uploadedFiles div").length < 5){
//             e.preventDefault();
//         }
//     })
// })