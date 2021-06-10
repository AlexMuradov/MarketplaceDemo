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
        <header class="header header-main">
            <div class="container container__heder">
                <div class="header__between">
                    <a href="#" class="logo">Xx
                        <span class="logo-span">.</span>
                    </a>
                </div>
            </div>
            <div class="progress progress__nine progress-striped">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                    aria-valuemax="100" style="width: 100%">
                </div>
            </div>
        </header>

        <div id="wrapper-content">
            <div class="container">
                <div class="title apartaments__title">
                    <h2><?php echo $AddFilesTitle; ?></h2>
                </div>
                <div class="container__box">
                    <h6><?php echo $AddFilesDescription; ?></h6>
                    <div>
                        <form action="/ru/fileupload/listing:<?php echo $ListingID; ?>/type:1" method="POST" class="dropzone mt-22 mb-22" id="my-awesome-dropzone"></form>
                    </div>
                    <div id="uploadedFiles">
                    </div>
                    <form>
                        <div class="btn__block">
                            <a href="#" class="btn btn-red btn-back"><?php echo $BackBtn; ?></a>
                            <button type="submit" class="btn btn-red"><?php echo $FinishBtn; ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
                <?php include(HOME . XX . "views/cache/footer.view.cache.php"); ?>
        <div>
            <div class="popups popup__lang-curr">
                <div class="popup">
                    <div class="popup__head">
                        <h2 class="popup__head-title">Язык и Валюта</h2>
                        <button type="button" class="close"></button>
                    </div>
                    <div class="popup-content">
                        <div class="popup__section">
                            <h4 class="popup__title">Валюта</h4>
                            <div class="popup__row">
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">EUR</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">USD</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">AZN</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">UAH</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">RUB</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">BEL</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">GEO</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="curr" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">EAD</span>
                                </label>
                            </div>
                        </div>
                        <div class="popup__section">
                            <h4 class="popup__title">Язык</h4>
                            <div class="popup__row">
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Английский</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Французский</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Немецкий</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Японский</span>
                                </label>
                            </div>
                        </div>
                        <div class="popup__bottom">
                            <a href="#" class="btn btn-small">SAVE CHANGES
                                <svg class="arrow">
                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popups popup__additional-filters">
                <div class="popup positionTop">
                    <div class="popup__head">
                        <h2 class="popup__head-title">Дополнительные фильтры</h2>
                        <button type="button" class="close"></button>
                    </div>
                    <form class="popup-content">
                        <div class="popup__section">
                            <label class="label-checkbox">
                                <input type="checkbox" class="checkbox">
                                <span class="check"></span>
                                <span class="check-text">Возможность отмены</span>
                            </label>
                            <label class="label-checkbox">
                                <input type="checkbox" class="checkbox">
                                <span class="check"></span>
                                <span class="check-text">Опытный хозяин
                                    <span class="check-span"> Останавливайтесь у самых гостеприимных хозяев <a href="#"
                                            class="c-blue">Подробнее</a></span>
                                </span>
                            </label>
                        </div>
                        <div class="popup__section">
                            <h4 class="popup__title">Удобства</h4>
                            <div class="popup__row">
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Кухня</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Шампунь</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Отопление</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Кондиционер</span>
                                </label>
                            </div>
                            <a href="#" class="link-item">Все удобства
                                <svg class="arrow c-blue">
                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="popup__section">
                            <h4 class="popup__title">Дополнительные удобства</h4>
                            <div class="popup__row">
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Бесплатная <br>парковка</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Спортзал</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Джакузи</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="checkbox" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Бассейн</span>
                                </label>
                            </div>
                        </div>
                        <div class="popup__section">
                            <h4 class="popup__title">Цена</h4>
                            <div class="popup__row">
                                <div class="popup__price">
                                    <p>От</p>
                                    <input type="number" class="popup__input">
                                </div>
                                <div class="popup__price">
                                    <p>До</p>
                                    <input type="number" class="popup__input">
                                </div>
                            </div>
                        </div>
                        <div class="popup__section">
                            <h4 class="popup__title">Язык хозяина</h4>
                            <div class="popup__row">
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Английский</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Французский</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Немецкий</span>
                                </label>
                                <label class="label-checkbox">
                                    <input type="radio" name="lang" class="checkbox">
                                    <span class="check"></span>
                                    <span class="check-text">Японский</span>
                                </label>
                            </div>
                            <a href="#" class="link-item">все языки
                                <svg class="arrow c-blue">
                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="popup__bottom popup__bottom__between">
                            <button type="reset" class="link-item">очистить <span class="close"></span></button>
                            <button type="submit" class="btn btn-small">показать варианты
                                <svg class="arrow">
                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                </svg>
                            </button>
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
    <script src="/static/js/dropzone/dropzone.js"></script>
    <script>
    Dropzone.options.myAwesomeDropzone = {
   init: function() {
       this.on("complete", function(file) { 
           $('#uploadedFiles').empty();
           $.ajax({
               url: "/ru/fileupload/listfiles:1/listing:<?php echo $ListingID; ?>",
               dataType: "JSON",
               success: function(json){
                   for(var i=0;i<json.length;i++){
                       var filename = json[i]['Filename'];
                       var filenr = json[i]['ID'];
                       var filetype = json[i]['Type'];

                        if(filetype==1) { var ftype = "(Главная)"; } else { var ftype = ""; }
                       var htmll = "<div><img style='display:inline; vertical-align:middle' src='/static/uploads/listings/m_thumbs/"+filename+"'><span> <a href='#' onclick='delphoto("+filenr+", <?php echo $ListingID; ?>);'><?php echo $Delete; ?></a> - <a href='#' onclick='makemainp("+filenr+", <?php echo $ListingID; ?>)'><?php echo $MakeMain; ?></a> "+ftype+"</span></div><br/>";
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