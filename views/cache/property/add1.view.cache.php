<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Добавление квартиры</title>
    <meta name="description" content="Xx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/static/v2/img/Xxlogo.ico" type="image/x-icon">
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
                            <h2 class="res_PropertyTypeTitle"></h2>
                        </div>
                        <div class="container__box">
                            <form class="choice" action="" method="POST" onsubmit="return validate()">
                                <div class="field field-payment">
                                    <p class="name res_PropertyTypePlaceholder"></p>
                                    <input type="text" value="" class="input-select" readonly="">
                                    <input type="hidden" name="PropertyType" id="input-ids">
                                    <div class="icon">
                                        <svg class="arrow arrow-down">
                                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                        </svg>
                                    </div>
                                    <ul class="select" id="PropertyType" style="display: none;">
                                    </ul>
                                </div>
                                <div class="field field-payment field-payment__theee">
                                    <p class="name res_PropertyTitle"></p>
                                    <span class="chCounter"><span class="cc"></span>/100</span>
                                    <input type="text" name="Title" id="input-title" maxlength="100">
                                </div>
                                <div class="field field-payment field-payment__theee">
                                    <p class="name res_PropertyDescription"></p>
                                    <textarea name="Description" id="input-descr" rows="4"></textarea>
                                </div>
                                <div class="choice__room">
                                    <div class="payment__radio">
                                        <label class="label-checkbox label-radio">
                                            <input type="radio" id="v1" name="PlaceType" value="1" class="checkbox" checked="">
                                            <span class="check check-radio"></span>
                                            <span class="check-text check-radio-text res_EntirePlaceTitle">
                                                <span class="payment__form-text res_EntirePlaceDescription">
                                                </span>
                                            </span>
                                        </label>
                                        <label class="label-checkbox label-radio">
                                            <input type="radio" id="v2" name="PlaceType" value="2" class="checkbox">
                                            <span class="check check-radio"></span>
                                            <span class="check-text check-radio-text res_PrivateRoomTitle">
                                                <span class="payment__form-text res_PrivateRoomDescription">
                                                </span>
                                            </span>
                                        </label>
                                        <label class="label-checkbox label-radio">
                                            <input type="radio" id="v3" name="PlaceType" value="3" class="checkbox">
                                            <span class="check check-radio"></span>
                                            <span class="check-text check-radio-text res_SharedRoomTitle">
                                                <span class="payment__form-text res_SharedRoomDescription">
                                                    
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- <div class="choice__room">
                                    <div class="payment-row">
                                        <div class="field mt-22">
                                            <p class="name">Площадь</p>
                                            <input type="text" name="Area" required="">
                                        </div>
                                        <div class="field mt-22">
                                            <p class="name">Этаж</p>
                                            <input type="text" name="Floor" required="">
                                        </div>
                                    </div>
                                    <div class="field field-payment field-payment__theee">
                                        <p class="name">Описание жилища</p>
                                        <textarea type="text" name="PropertyDescription" required=""></textarea>
                                    </div> -->
                                    <div class="btn__block">
                                        <!-- <a href="#" class="btn btn-red btn-back res_BackBtn"></a> -->
                                        <button type="submit" class="btn btn-red res_NextBtn" id="submitBtn"></button>
                                        <input type="hidden" name="step1_submit" value="1">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php include(HOME . XX . "views/imports/e_addpropertymenu.html"); ?>
                    </div>
                </div>
            </div>
        </div>
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