<html lang="en"><head>
    <meta charset="utf-8">
    <title>title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=400, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/css/libs.min.css">
    <link rel="stylesheet" href="/static/css/daterangepicker.min.css">
    <link rel="stylesheet" href="/static/css/main_alt.css">
<style type="text/css">span.im-caret {
    -webkit-animation: 1s blink step-end infinite;
    animation: 1s blink step-end infinite;
}

@keyframes blink {
    from, to {
        border-right-color: black;
    }
    50% {
        border-right-color: transparent;
    }
}

@-webkit-keyframes blink {
    from, to {
        border-right-color: black;
    }
    50% {
        border-right-color: transparent;
    }
}

span.im-static {
    color: grey;
}

div.im-colormask {
    display: inline-block;
    border-style: inset;
    border-width: 2px;
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
}

div.im-colormask > input {
    position: absolute;
    display: inline-block;
    background-color: transparent;
    color: transparent;
    -webkit-appearance: caret;
    -moz-appearance: caret;
    appearance: caret;
    border-style: none;
    left: 0; /*calculated*/
}

div.im-colormask > input:focus {
    outline: none;
}

div.im-colormask > input::-moz-selection{
    background: none;
}

div.im-colormask > input::selection{
    background: none;
}
div.im-colormask > input::-moz-selection{
    background: none;
}

div.im-colormask > div {
    color: black;
    display: inline-block;
    width: 100px; /*calculated*/
}</style></head>

<body>
<div id="wrapper">
    <header class="header header-main">
        <div class="container">
            <div class="header__between">
                <a href="#" class="logo">Xx
                    <span class="logo-span">.</span>
                </a>
                <nav class="header-nav">
                    <ul class="menu">
                        <li class="menu-item d-md-block">
                            <a href="#" class="link">
                                <span class="add"></span>
                                добавить квартиру
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="link link-sign-in">
                                ВХОД
                            </a>
                        </li>
                    </ul>
                </nav>
                <button type="button" class="burger">
                    <span class="burger-line burger-top"></span>
                    <span class="burger-line burger-bottom"></span>
                </button>
            </div>
        </div>
    </header>
    <div id="wrapper-content">
        <div class="container">
            <div class="payment">
                <form action="" method="post" class="payment__content" enctype="multipart/form-data">
                    <h2 class="title">Личные данные</h2>
                    <div class="payment__block">
                        <div id="notificationBox">
                            <div class="like-box">
                                <img src="/static/img/medical.svg" alt="medical" class="like-box__icon">
                                <div class="like-box__col">
                                    <p class="like-box__title" id="NotConfirmedTitle"><?php echo $NotConfirmedTitle; ?></p>
                                    <p class="like-box__text" id="NotConfirmedText"><?php echo $NotConfirmedText; ?></p>
                                </div>
                        </div>
                        </div>

                        <div class="form-confirm">
                            <div class="payment-row">
                                <div class="field mt-22 w-100">
                                    <p class="name"><?php echo $FirstNameLabel; ?></p>
                                    <input type="text" name="firstname" id="firstname" required="">
                                </div>
                                <div class="field mt-22 w-100">
                                    <p class="name"><?php echo $LastNameLabel; ?></p>
                                    <input type="text" name="lastname" id="lastname" required="">
                                </div>
                            </div>
                            <div class="payment-row">
                                <div class="field mt-22 w-100">
                                    <p class="name"><?php echo $GenderLabel; ?></p>
                                    <input type="text" name="gender" id="gender" value="" class="input-select" readonly="" required="">
                                    <input type="hidden" name="hiddenGender" id="hiddenGender" value="">
                                    <div class="icon">
                                        <svg class="arrow arrow-down">
                                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                        </svg>
                                    </div>
                                    <ul class="select" style="display: none;">
                                        <li class="select-option genderlist" id="1" active><?php echo $GenderMale; ?></li>
                                        <li class="select-option genderlist" id="2"><?php echo $GenderFemale; ?></li>
                                    </ul>
                                </div>
                                <div class="field mt-22 w-100">
                                    <p class="name"><?php echo $BirthDateLabel; ?></p>
                                    <input type="text" class="input-birth" id="birthday" name="birthday" placeholder="DD / MM / YYYY" name="username" required="">
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $CountryLabel; ?></p>
                                    <input type="hidden" name="hiddenCountry" id="hiddenCountry" value="">
                                    <input type="text" name="country" id="country" value="" class="input-select" readonly="" required="">
                                    <div class="icon">
                                        <svg class="arrow arrow-down"> 
                                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                        </svg>
                                    </div>
                                    <ul class="select" style="display: none;" id="CountryList">

                                    </ul>
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $CityLabel; ?></p>
                                    <input type="text" name="city" id="city" required="">
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $StreetLabel; ?></p>
                                    <input type="text" name="street" id="street" required="">
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $BuildingLabel; ?></p>
                                    <input type="text" name="building" id="building" required="">
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $AppartmentLabel; ?></p>
                                    <input type="text" name="appartement" id="appartement" required="">
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $ZipLabel; ?></p>
                                    <input type="text" name="zip" id="zip" required="">
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $EmailLabel; ?></p>
                                    <input type="text" id="email" name="email" disabled>
                                </div>
                                <div class="field mt-22">
                                    <p class="name"><?php echo $PhoneLabel; ?></p>
                                    <input type="text" onclick="verifytelb()" id="phone" name="phone" required="">
                                </div>
                                <div class="field mt-22" id="passportBox1">
                                    <p class="name" id="passport_front_label"><?php echo $PassportFront; ?></p>
                                    <input type="file" name="passport_front" id="passport_front">
                                </div>
                                <div class="field mt-22" id="passportBox2">
                                    <p class="name" id="passport_back_label"><?php echo $PassportBack; ?></p>
                                    <input type="file" value="123" name="passport_back" id="passport_back">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="doUpdate" value="1">
                    <button type="submit" class="btn btn-red"><?php echo $SaveBtn; ?>
                        <svg class="arrow">
                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>
                    </button>
                </form>
                <?php include(HOME . XX . "views/cache/e_cabinetmenu.view.cache.php"); ?>
            </div>

        </div>

    </div>
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <ul class="col">
                    <li class="footer-main">Компания</li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">О нас</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Инвесторам</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Вакансии</a>
                    </li>
                </ul>
                <ul class="col">
                    <li class="footer-main">Арендадателям</li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Условия размещения</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Онлайн платежи</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Система CAPSA<sup>&reg;</sup></a>
                    </li>
                </ul>
                <ul class="col">
                    <li class="footer-main">Гостям</li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Гарантия заселения</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Методы оплаты</a>
                    </li>
                </ul>
                <ul class="col">
                    <li class="footer-main">Поддержка</li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Конфиденциальность</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Условия</a>
                    </li>
                    <li class="footer-item">
                    <a href="#" class="footer-link">Контакты</a>
                    </li>
                </ul>
                <ul class="col">
                    <li class="footer-main">Мобильная версия</li>
                    <li class="footer-item">
                        <img src="/static//static/img/qr-code.svg" alt="mobile application" class="qr_icon">
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom__row">
                    <div class="footer-bottom__first">
                    <p class="footer-text">
                        © 2020 Rentxx, Inc. Все права защищены                    </p>
                    </div>
                    
                    <div class="footer__row">
                    <a href="#" class="footer__select">
                        UNITED STATES — ENGLISH ($USD)
                        <svg class="footer__select-arrow">
                            <use xlink:href="/static//static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>  <use xlink:href="/static//static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div>
    <div class="popups popup__lang-curr">
        <div class="popup">
            <div class="popup__head">
                <h2 class="popup__head-title">???? ? ??????</h2>
                <button type="button" class="close"></button>
            </div>
            <div class="popup-content">
                <div class="popup__section">
                    <h4 class="popup__title">??????</h4>
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
                    <h4 class="popup__title">????</h4>
                    <div class="popup__row">
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">??????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">???????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">????????</span>
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
                <h2 class="popup__head-title">?????????????? ???????</h2>
                <button type="button" class="close"></button>
            </div>
            <form class="popup-content">
                <div class="popup__section">
                    <label class="label-checkbox">
                        <input type="checkbox" class="checkbox">
                        <span class="check"></span>
                        <span class="check-text">??????????? ??????</span>
                    </label>
                    <label class="label-checkbox">
                        <input type="checkbox" class="checkbox">
                        <span class="check"></span>
                        <span class="check-text">??????? ??????
                   <span class="check-span"> ???????????????? ? ????? ????????????? ?????? <a href="#" class="c-blue">?????????</a></span>

                </span>
                    </label>
                </div>
                <div class="popup__section">
                    <h4 class="popup__title">????????</h4>
                    <div class="popup__row">
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">?????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">???????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">?????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">???????????</span>
                        </label>
                    </div>
                    <a href="#" class="link-item">??? ????????
                        <svg class="arrow c-blue">
                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>
                    </a>
                </div>
                <div class="popup__section">
                    <h4 class="popup__title">?????????????? ????????</h4>
                    <div class="popup__row">
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">?????????? <br>????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">???????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">???????</span>
                        </label>
                    </div>
                </div>
                <div class="popup__section">
                    <h4 class="popup__title">????</h4>
                    <div class="popup__row">
                        <div class="popup__price">
                            <p>??</p>
                            <input type="number" class="popup__input">
                        </div>
                        <div class="popup__price">
                            <p>??</p>
                            <input type="number" class="popup__input">
                        </div>

                    </div>
                </div>
                <div class="popup__section">
                    <h4 class="popup__title">???? ???????</h4>
                    <div class="popup__row">
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">??????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">???????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">????????</span>
                        </label>
                        <label class="label-checkbox">
                            <input type="radio" name="lang" class="checkbox">
                            <span class="check"></span>
                            <span class="check-text">????????</span>
                        </label>
                    </div>
                    <a href="#" class="link-item">??? ?????
                        <svg class="arrow c-blue">
                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>
                    </a>
                </div>
                <div class="popup__bottom popup__bottom__between">
                    <button type="reset" class="link-item">???????? <span class="close"></span></button>
                    <button type="submit" class="btn btn-small">???????? ????????
                        <svg class="arrow">
                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="verifyTel"></div>

</div>


<script src="/static/js/moment.min.js"></script>
<script src="/static/js/jquery.min.js"></script>
<script src="/static/js/libs.min.js"></script>
<script src="/static/js/jquery.inputmask.bundle.js"></script>
<script src="/static/js/jquery.daterangepicker.min.js"></script>
<script src="/static/js/common.js"></script>
<script>
    <?php echo $JsLocalizationVars; ?>
    <?php echo $JsLocalizationScript; ?>
</script>

<div class="date-picker-wrapper no-shortcuts " style="display: none;"><div class="drp_top-bar"><div class="normal-top"><span class="selection-top">???????: </span> <b class="start-day">...</b> <span class="separator-day"> - </span> <b class="end-day">...</b> <i class="selected-days">(<span class="selected-days-num">3</span> ????)</i></div><div class="error-top">error</div><div class="default-top">default</div><input type="button" class="apply-btn disabled" value="?????????"></div><div class="month-wrapper">   <table class="month1" cellspacing="0" border="0" cellpadding="0">       <thead>           <tr class="caption">               <th>                   <span class="prev">&lt;                   </span>               </th>               <th colspan="5" class="month-name">               </th>               <th><span class="next">&gt;</span>               </th>           </tr>           <tr class="week-name"><th>??</th><th>??</th><th>??</th><th>??</th><th>??</th><th>??</th><th>??</th>       </tr></thead>       <tbody></tbody>   </table><div class="dp-clearfix"></div><div class="time"><div class="time1"></div><div class="time2"></div></div><div class="dp-clearfix"></div></div><div class="footer"></div><div class="date-range-length-tip"></div></div><div class="date-picker-wrapper no-shortcuts  no-topbar " style="display: none;"><div class="month-wrapper">   <table class="month1" cellspacing="0" border="0" cellpadding="0">       <thead>           <tr class="caption">               <th>                   <span class="prev">&lt;                   </span>               </th>               <th colspan="5" class="month-name">               </th>               <th><span class="next">&gt;</span>               </th>           </tr>           <tr class="week-name"><th>??</th><th>??</th><th>??</th><th>??</th><th>??</th><th>??</th><th>??</th>       </tr></thead>       <tbody></tbody>   </table><div class="dp-clearfix"></div><div class="time"><div class="time1"></div><div class="time2"></div></div><div class="dp-clearfix"></div></div><div class="footer"></div><div class="date-range-length-tip"></div></div></body></html>