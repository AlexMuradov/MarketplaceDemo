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
    <link rel="stylesheet" href="/static/css/FC.css">
    <link rel="stylesheet" href="/static/css/xxcalendar.css">

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
        <header class="header header-main header_v2 header-second-search">
            <div class="container_v2 container__heder">
                <div class="header__between">
                    <a href="/" class="logo">Xx
                        <span class="logo-span">.</span>
                    </a>
                </div>
            </div>
            <div class="progress progress__seven progress-striped">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                    aria-valuemax="100" style="width: 100%">
                </div>
            </div>
        </header>

        <div id="wrapper-content">
            <div class="container">
                <div class="main__content">
                    <div class="main__content">
                        <div class="left__content">
                            <div class="title apartaments__title">
                                <h2 class="res_RequestWindowTitle"></h2>
                            </div>
                            <div class="container__box container__box-seven">
                                <form action="" method="POST" onsubmit="return validate()">
                                    <div class="days__plan">
                                        <div class="field field-payment">
                                            <p class="name res_DaysCount"></p>
                                            <input type="text" class="input-select" id="Request" readonly="">
                                            <input type="hidden" name="RequestWindow" class="BeforeArrive"
                                                id="input-id">
                                            <div class="icon">
                                                <svg class="arrow arrow-down">
                                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                                </svg>
                                            </div>
                                            <ul class="select" id="BeforeArriveList" style="display: none;">
                                            </ul>
                                        </div>
                                        <div class="days__plan-text">
                                            <h3 class="res_TIP"></h3>
                                            <p class="res_RequestWindowTip"></p>
                                        </div>
                                    </div>
                                    <div class="days__plan days__plan-two days__plan-two-mb">
                                        <h6 class="res_CheckInTime"></h6>
                                        <div class="days__plan-items">
                                            <div class="field field-payment">
                                                <p class="name res_From"></p>
                                                <input type="text" class="input-select" id="CheckIn" readonly="">
                                                <input type="hidden" name="CheckInTime" class="TimeFromArrive"
                                                    id="input-id">
                                                <div class="icon">
                                                    <svg class="arrow arrow-down">
                                                        <use xlink:href="/static/img/sprite/sprite.svg#arrow-down">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <ul class="select" id="ArriveTimeFromList">
                                                </ul>
                                            </div>
                                            <div class="field field-payment">
                                                <p class="name res_To"></p>
                                                <input type="text" class="input-select" id="CheckOut" readonly="">
                                                <input type="hidden" name="CheckOutTime" class="TimeToArrive"
                                                    id="input-id">
                                                <div class="icon">
                                                    <svg class="arrow arrow-down">
                                                        <use xlink:href="/static/img/sprite/sprite.svg#arrow-down">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <ul class="select" id="ArriveTimeToList">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title apartaments__title">
                                        <h2 class="res_AdvanceTimeTitle"></h2>
                                    </div>
                                    <div class="days__plan days__plan-three">
                                        <div class="field field-payment" name="test">
                                            <p class="name res_Period"></p>
                                            <input type="text" class="input-select" id="Advance" readonly="">
                                            <input type="hidden" name="AdvanceWindow" class="TimeInAdvance"
                                                id="input-id">
                                            <div class="icon">
                                                <svg class="arrow arrow-down">
                                                    <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                                                </svg>
                                            </div>
                                            <ul class="select" id="TimeInAdvanceList">
                                            </ul>
                                        </div>
                                        <div class="days__plan-text">
                                            <h3 class="res_TIP"></h3>
                                            <p class="res_AdvanceTimeTip"></p>
                                        </div>
                                    </div>
                                    <div class="title apartaments__title">
                                        <h2 class="res_StayTimeTitle"></h2>
                                    </div>
                                    <div class="days__plan days__plan-cost">
                                        <div class="days__plan-cost-choice">
                                            <ul class="dropdown__noactive">
                                                <li class="dropdown-item">
                                                    <p class="c-gray res_MinNights"></p>
                                                    <div class="count ">
                                                        <button type="button" class="btn-count btn-count-minus"></button>
                                                        <input type="text" name="MinNightsStay"
                                                            class="input-count count__adults" value="1" readonly="">
                                                        <button type="button" class="btn-count btn-count-plus"></button>
                                                    </div>
                                                </li>
                                                <li class="dropdown-item">
                                                    <p class="c-gray res_MaxNights"></p>
                                                    <div class="count ">
                                                        <button type="button" class="btn-count btn-count-minus"></button>
                                                        <input type="text" name="MaxNightsStay"
                                                            class="input-count count__adults" value="1" readonly="">
                                                        <button type="button" class="btn-count btn-count-plus"></button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="long__stay">
                                            <h6 class="res_ReservationMethod"></h6>
                                            <div class="payment__radio">
                                                <label class="label-checkbox label-radio">
                                                    <input type="radio" name="InstantBooking" value="1" id="instant"
                                                        class="checkbox">
                                                    <span class="check check-radio"></span>
                                                    <span class="check-text check-radio-text res_InstantBooking"><span
                                                            class="recommended res_RECOMMENDED"></span></span>
                                                </label>
                                                <label class="label-checkbox label-radio">
                                                    <input type="radio" name="InstantBooking" value="0" id="manual"
                                                        class="checkbox">
                                                    <span class="check check-radio"></span>
                                                    <span
                                                        class="check-text check-radio-text res_ManualApprove"></span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="days__plan days__plan-calendar calendar">
                                        <h6 class="res_BlockCalendarTitle"></h6>
                                        <!-- <div class="use__base-price">
                                        <label>
                                            <span><a href="<?php echo $CalendarButton; ?>"><?php echo $UpdateCalendarBtn; ?></a></span>
                                        </label>
                                    </div> -->
                                        <div class="xx_cal_container" id="xx_calendar_container">

                                        </div>
                                        <div class="calendar_actions_btn_group">
                                            <button type="button" class="disable btn_grey">Заблокировать</button>
                                            <button type="button" class="enable btn_grey">Разблокировать</button>
                                            <button type="button" class="Save btn_red" id="setCustomPrice">Save</button>
                                            <button type="button" class="Save btn_red" id="deleteCustomPrice">Save</button>
                                            <input type="text" id="price">
                                        </div>
                                    </div>
                                    <div class="btn__block">
                                        <button type="submit" class="btn btn-red res_NextBtn"></button>
                                        <a href="<?php echo $BackButton; ?>" class="btn btn-red btn-back res_BackBtn"></a>
                                    </div>
                                    <input type="hidden" name="aaa" id="test" value="&quot;">
                                    <input type="hidden" name="step7_submit" value="1">
                                </form>

                            </div>
                        </div>
                        <?php include(HOME . XX . "views/imports/e_editpropertymenu.html"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/static/js/FC.js"></script>
    <script src="/static/js/moment.min.js"></script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/jquery.inputmask.bundle.js"></script>
    <script src="/static/js/slick.min.js"></script>
    <script src="/static/js/jquery.daterangepicker.min.js"></script>
    <script src="/static/js/mask.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="/static/js/common.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="/static/v2/js/resouceReader.js"></script>
    <script src="/static/v2/js/add_property_step.js"></script>

    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>

</body>

</html>