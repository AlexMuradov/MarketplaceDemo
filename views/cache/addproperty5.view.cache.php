<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Добавление квартиры</title>
    <meta name="description" content="Xx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=400, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="//static/img/Xx..ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="">
    <link rel="stylesheet" href="/static/css/daterangepicker.min.css">
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
        <header class="header header-main">
            <div class="container container__heder">
                <div class="header__between">
                    <a href="#" class="logo">Xx
                        <span class="logo-span">.</span>
                    </a>
                </div>
            </div>
            <div class="progress progress__five progress-striped">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                    aria-valuemax="100" style="width: 100%">
                </div>
            </div>
        </header>

        <div id="wrapper-content">
            <div class="container">
                <div class="title apartaments__title">
                    <h2>Review your guest requirements</h2>
                    <p>Guests can only book without sending a request if they meet all your requirements and agree to
                        your house rules.</p>
                </div>
                <div class="container__box container__box-five">
                    <div class="list__item">
                        <div class="list__items">
                            <p>Airbnb’s guests requirements:</p>


                            <ol class="requirements">
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Email address</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Confirmed phone number</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Payment information</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>A message about the guest’s trip</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Check-in time for last minute trips</p>
                                </li>
                            </ol>
                        </div>
                        <div class="list__items">
                            <p>Airbnb’s guests requirements:</p>


                            <ol class="requirements">
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Email address</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Confirmed phone number</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Payment information</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>A message about the guest’s trip</p>
                                </li>
                                <li>
                                    <img src="/static/img/ok.svg" alt="available">
                                    <p>Check-in time for last minute trips</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <form action="" method="POST">
                    <input type="hidden" name="step5_submit" value="1">
                        <div class="checkbox__add">
                            <label class="label-checkbox">
                                <input type="checkbox" name="GovernmentID" value="1" class="checkbox">
                                <span class="check"></span>
                                <span class="check-text">Government-issued ID submitted to Airbnb</span>
                            </label>
                        </div>
                        <p>More requirements can mean fewer reservations.</p>
                        <div class="btn__block">
                            <a href="#" class="btn btn-red btn-back">BACK</a>
                            <button type="submit" class="btn btn-red">NEXT</button>
                        </div>
                    </form>
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
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>

</body>

</html>