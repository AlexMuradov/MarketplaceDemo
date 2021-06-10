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
    <link rel="stylesheet" href="/static/css/slick.css">
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
                <div class="main__content main__content-eight">
                    <div class="left__content">
                        <div class="title apartaments__title">
                            <h2 class="res_PriceSpaceTitle"></h2>
                        </div>
                        <div class="container__box container__box-eight">
                            <form action="" method="POST">
                            <input type="hidden" name="step8_submit" value="1">
                                <div class="top__block">
                                    <div class="small__title">
                                        <h4 class="res_IncreaseChancesTitle"></h4>
                                        <p class="res_IncreaseChancesDescription"></p>
                                    </div>
                                    <div class="title apartaments__title">
                                        <h2 class="res_HowToSetYourPriceTitle"></h2>
                                    </div>
                                    <div class="long__stay set__your-price">
                                        <p class="currency__text res_HowToSetYourPriceDescription"></p>
                                        <div class="payment__radio">
                                            <label class="label-checkbox label-radio">
                                                <input type="radio" name="IntelligentPricing" value="1" id="intelegent" class="checkbox" checked="" onchange="javascript:toggleBilling()">
                                                <span class="check check-radio"></span>
                                                <span class="check-text check-radio-text res_IntellegentPricing">
                                                    <span class="payment__form-text res_IntellegentPricingDesciption"><span
                                                            class="recommended res_RECOMMENDED"></span>
                                                    </span>
                                            </label>
                                            <label class="label-checkbox label-radio">
                                                <input type="radio" name="IntelligentPricing" value="0" id="fixed" class="checkbox" onchange="javascript:toggleBilling()">
                                                <span class="check check-radio"></span>
                                                <span class="check-text check-radio-text res_FixedPrice">
                                                    <span class="payment__form-text res_FixedPriceDesciption"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="choice__price">
                                        <div class="field field-payment">
                                            <p class="name res_Currency"></p>
                                            <input type="text" value="" class="input-select" id="currencyVal" readonly="" required="">
                                            <input type="hidden" name="Currency" class="Currency" id="input-ids">
                                            <div class="icon">
                                                <svg class="arrow arrow-down">
                                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                                </svg>
                                            </div>
                                            <ul class="select" id="CurrencyList" style="display: none;">
                                            </ul>
                                        </div>
                                        <div class="choice__price-item base__price">
                                            <div class="price-item-title">
                                                <h3 class="res_BasePrice"></h3>
                                                <p class="res_BasePriceDescription"></p>
                                                <div class="price-item-main">
                                                    <div class="field feld-payment" id="dis">
                                                        <input type="text" name="BasePrice" value="" placeholder="" class="input-select">
                                                    </div>
                                                    <!--<div class="days__plan-text price-item-tip">
                                                        <h3 class="res_TIP">: $ 123</h3>
                                                        <p class="res_PriceTIP"></p>
                                                        <span class="question">
                                                            <span class="tooltip">Lorem ipsum dolor sit amet
                                                                consectetur adipisicing
                                                                elit. Quos, accusamus libero!</span>
                                                        </span>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choice__price-item minimum__price">
                                            <div class="price-item-title">
                                                <h3 class="res_MinimumPrice"></h3>
                                                <p class="res_MinimumPriceDescription">
                                                </p>
                                                <div class="price-item-main">
                                                    <div class="field feld-payment" id="dis1">
                                                        <input type="text" name="MinPrice" value="" placeholder=""
                                                            class="input-select">
                                                    </div>
                                                    <!--<div class="days__plan-text price-item-tip">
                                                        <h3 class="res_TIP">: $ 123</h3>
                                                        <p class="res_PriceTIP"></p>
                                                        <span class="question">
                                                            <span class="tooltip">Lorem ipsum dolor sit amet
                                                                consectetur adipisicing
                                                                elit. Quos, accusamus libero!</span>
                                                        </span>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choice__price-item maximum__price">
                                            <div class="price-item-title">
                                                <h3 class="res_MaximumPrice"></h3>
                                                <p class="res_MaximumPriceDescription"></p>

                                                <div class="price-item-main">
                                                    <div class="field feld-payment" id="dis1">
                                                        <input type="text" name="MaxPrice" value="" placeholder="" class="input-select">
                                                    </div>
                                                    <!--<div class="days__plan-text price-item-tip">
                                                        <h3 class="res_TIP">: $ 123</h3>
                                                        <p class="res_PriceTIP"></p>
                                                        <span class="question">
                                                            <span class="tooltip">Lorem ipsum dolor sit amet
                                                                consectetur adipisicing
                                                                elit. Quos, accusamus libero!</span>
                                                        </span>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="center__block">
                                    <div class="title apartaments__title">
                                        <h2 class="res_SomethingSpecialForQuests"></h2>
                                    </div>
                                    <div class="payment__radio">
                                        <label class="label-checkbox label-radio">
                                            <input type="radio" name="PromoDiscount" value="1" id="promo" class="checkbox" checked="">
                                            <span class="check check-radio"></span>
                                            <span class="check-text check-radio-text res_Off20">
                                                <span class="recommended res_RECOMMENDED"></span>
                                                <span class="payment__form-text res_OffDescription20"></span>
                                            </span></label>
                                        <label class="label-checkbox label-radio">
                                            <input type="radio" name="PromoDiscount" value="0" id="disablePromo" class="checkbox">
                                            <span class="check check-radio"></span>
                                            <span class="check-text check-radio-text res_DontAddOffer">
                                                <span class="payment__form-text res_DontAddOfferDescription">
                                                </span>
                                            </span></label>
                                    </div>
                                </div>
                                <div class="bottom__block">
                                    <div class="title apartaments__title">
                                        <h2 class="res_LengthOfStayPrices"></h2>
                                        <div class="title__link">
                                            <p class="res_LengthOfStayPricesDescription"></p>
                                            <a href="#" class="res_LearnMore"></a>
                                        </div>
                                    </div>
                                    <div class="choice__price-item base__price">
                                        <div class="price-item-title">
                                            <h3 class="res_WeeklyDiscount"></h3>
                                            <div class="price-item-main">
                                                <div class="field feld-payment">
                                                    <input type="text" name="WeeklyDiscount" placeholder="0% OFF" class="input-select">
                                                </div>
                                                <!--<div class="days__plan-text price-item-tip">
                                                    <h3 class="res_TIP">: 21 %</h3>
                                                    <p class="res_DiscountTIP"></p>
                                                    <span class="question">
                                                        <span class="tooltip">Lorem ipsum dolor sit amet
                                                            consectetur adipisicing
                                                            elit. Quos, accusamus libero!</span>
                                                    </span>
                                                </div>-->
                                            </div>
                                            <p class="res_WeeklyDiscountDescription"></p>
                                        </div>
                                    </div>
                                    <div class="choice__price-item base__price">
                                        <div class="price-item-title">
                                            <h3>Скидка на месяц</h3>
                                            <div class="price-item-main">
                                                <div class="field feld-payment">
                                                    <input type="text" name="MonthlyDiscount" placeholder="0% OFF" class="input-select">
                                                </div>
                                                <!--<div class="days__plan-text price-item-tip">
                                                    <h3 class="res_TIP">: 21 %</h3>
                                                    <p class="res_DiscountTIP"></p>
                                                    <span class="question">
                                                        <span class="tooltip">Lorem ipsum dolor sit amet consectetur adipisicing
                                                            elit. Quos, accusamus libero!</span>
                                                    </span>
                                                </div>-->
                                            </div><!--
                                            <p>Travelers often search by price. To help increase your chances of getting
                                                weekly stays, try setting a discount.</p>
                                            -->
                                        </div>
                                    </div>
                                </div>
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