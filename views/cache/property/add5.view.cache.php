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
    <link rel="stylesheet" href="/static/css/daterangepicker.min.css">
    <link rel="stylesheet" href="/static/v2/css/styles.css">
    <link rel="stylesheet" href="/static/css/main_alt.css">
    <link rel="stylesheet" href="/static/css/add__item.css">
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
                            <h2><span class="res_ReviewRequirements"></span></h2>
                            <p><span class="res_ReviewRequirementsDescr"></span></p>
                        </div>
                        <div class="container__box container__box-five">
                            <div class="list__item">
                                <div class="list__items">
                                    <p><span class="res_RentxxRequirements"></span></p>


                                    <ol class="requirements">
                                        <li>
                                            <img src="/static/img/ok.svg" alt="available">
                                            <p><span class="res_EmailAddress"></span></p>
                                        </li>
                                        <li>
                                            <img src="/static/img/ok.svg" alt="available">
                                            <p><span class="res_ConfirmedPhoneNumber"></span></p>
                                        </li>
                                        <li>
                                            <img src="/static/img/ok.svg" alt="available">
                                            <p><span class="res_PaymentInformation"></span></p>
                                        </li>
                                        <li>
                                            <img src="/static/img/ok.svg" alt="available">
                                            <p><span class="res_MessageAboutGuestTrip"></span></p>
                                        </li>
                                        <li>
                                            <img src="/static/img/ok.svg" alt="available">
                                            <p><span class="res_Check-inTimeForLastMinute"></span></p>
                                        </li>
                                        <li>
                                            <img src="/static/img/ok.svg" alt="available">
                                            <p><span class="res_Government-issuedIDSubmittedToRentxx"></span></p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" name="step5_submit" value="1">
                                <!-- <div class="checkbox__add">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="GovernmentID" value="1" class="checkbox">
                                        <span class="check"></span>
                                        <span class="check-text res_Government-issuedIDSubmittedToRentxx"></span>
                                    </label>
                                </div> -->
                                <!-- <p><span class="res_MoreRequirementsCanMeanFewerReservations"></span></p> -->
                                <div class="btn__block">
                                    <button type="submit" class="btn btn-red res_NextBtn" id="submitBtn"></button>
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
    <script src="/static/v2/js/resouceReader.js"></script>
    <script src="/static/v2/js/add_property_step.js"></script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>

</body>

</html>