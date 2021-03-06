<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Добавление квартиры</title>
    <meta name="description" content="Xx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/static/v2/img/Xxlogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="">
    <link rel="stylesheet" href="/static/v2/css/styles.css">
    <link rel="stylesheet" href="/static/css/daterangepicker.min.css">
    <link rel="stylesheet" href="/static/css/main_alt.css">
    <link rel="stylesheet" href="/static/css/add__item.css">
    <link rel="stylesheet" href="/static/js/dropzone/dropzone.css">
</head>

<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <!-- preloader -->
    <div id="wrapper">
        <!-- header.html -->
        
        <?php include(HOME . XX . "views/imports/add_property_header.html"); ?>

        <div id="wrapper-content">
            <div class="container">
                <div class="main__content">
                    <div class="left__content">
                        <div class="title apartaments__title">
                            <h2 class="res_AddFilesTitle"></h2>
                        </div>
                        <div class="container__box">
                            <h6 class="res_AddFilesDescription"></h6>
                            <div>
                                <form action="/ru/fileupload/listing:<?php echo $ListingID; ?>/type:1" method="POST"
                                    class="dropzone mt-22 mb-22" id="my-awesome-dropzone"></form>
                            </div>
                            <div id="uploadedFiles">
                            </div>
                            <form>
                                <div class="btn__block">
                                    <a href="/<?php echo $lng; ?>/page.complete" class="btn btn-red res_FinishBtn"></a>
                                    <a href="<?php echo $BackButton; ?>" class="btn btn-red btn-back res_BackBtn"></a>
                                </div>
                            </form>

                        </div>
                    </div>
                    <?php include(HOME . XX . "views/imports/e_addpropertymenu.html"); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="/static/js/moment.min.js"></script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/jquery.inputmask.bundle.js"></script>
    <script src="/static/js/slick.min.js"></script>
    <script src="/static/js/jquery.daterangepicker.min.js"></script>
    <script src="/static/js/common.js"></script>
    <script src="/static/js/mask.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="/static/js/dropzone/dropzone.js"></script>
    <script src="/static/v2/js/resouceReader.js"></script>
    <script src="/static/v2/js/add_property_step.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            init: function () {
                this.on("complete", function (file) {
                    $('#uploadedFiles').empty();
                    $.ajax({
                        url: "/ru/fileupload/listfiles:1/listing:<?php echo $ListingID; ?>",
                        dataType: "JSON",
                        success: function (json) {
                            for (var i = 0; i < json.length; i++) {
                                var filename = json[i]['Filename'];
                                var filenr = json[i]['ID'];
                                var filetype = json[i]['Type'];

                                if (filetype == 1) { var ftype = "(Главная)"; } else { var ftype = ""; }
                                var htmll = "<div><img style='display:inline; vertical-align:middle' src='/static/uploads/listings/thumbs/" + filename + "'><span> <a href='#' onclick='delphoto(" + filenr + ", <?php echo $ListingID; ?>);'>Delete</a> - <a href='#' onclick='makemainp(" + filenr + ", <?php echo $ListingID; ?>)'>MakeMain</a> " + ftype + "</span></div><br/>";
                                $("#uploadedFiles").append(htmll);
                            }
                        }
                    })
                });
            }
        };
    </script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>
</body>

</html>