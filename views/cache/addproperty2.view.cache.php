<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Добавление квартиры</title>
    <meta name="description" content="Xx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=400, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="//static/img/Xx..ico" type="image/x-icon">
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
            <div class="progress progress__two progress-striped">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                    aria-valuemax="100" style="width: 100%">
                </div>
            </div>
        </header>

        <div id="wrapper-content">
            <div class="container">
                <div class="main__content">
                    <div class="left__content">
                        <div class="title apartaments__title">
                            <h2 class="res_GuestsAccommodateTitle"></h2>
                        </div>
                        <div class="container__box container__box-two">

                            <form class="choice" action="" method="POST" onsubmit="return(validate())">
                                <ul class="dropdown__noactive">
                                    <li class="dropdown-item">
                                        <p class="c-gray res_MaxGuests"></p>
                                        <div class="count ">
                                            <button type="button" class="count-btn count-minus "></button>
                                            <input type="text" name="MaxGuests" id="maxGuests" class="input-count count__adults" value="1" readonly="">
                                            <button type="button" class="count-btn count-plus"></button>
                                        </div>
                                    </li>
                                    <li class="dropdown-item">
                                        <p class="c-gray res_BedroomsCount"></p>
                                        <div class="count">
                                            <button type="button" class="count-btn count-minus minus__bedroom"
                                                onclick="delInput()"></button>
                                            <input type="text" name="Bedrooms" class="input-count count__adults" value="1" readonly="">
                                            <button type="button" class="count-btn count-plus plus__bedroom"
                                                onclick="addInput()"></button>
                                        </div>
                                    </li>
                                    <li class="dropdown-item">
                                        <p class="c-gray res_BathCount"></p>
                                        <div class="count">
                                            <button type="button" class="count-btn count-minus "></button>
                                            <input type="text" name="Bathrooms" class="input-count count__adults" value="1" readonly="">
                                            <button type="button" class="count-btn count-plus"></button>
                                        </div>
                                    </li>
                                </ul>
                                <div class="title apartaments__title">
                                    <h2 class="res_SleepingArrangementTitle"></h2>
                                </div>
                                <div class="sleeping__arrangements">
                                    <div class="add__remove">
                                        <div id="bedroom__code">
                                            <div class="sleeping__arrangements-item">
                                                <div class="sleeping__arrangements-title">
                                                    <p class="res_Bedroom"> 1</p>
                                                </div>
                                                <ul class="dropdown__noactive">
                                                    <li class="dropdown-item">
                                                        <p class="c-gray res_DoubleKing"></p>
                                                        <div class="count">
                                                            <button type="button" class="count-btn count-minus "></button>
                                                            <input type="text" name="King1" id="King1" class="input-count count__children" value="1"
                                                                readonly="">
                                                            <button type="button" class="count-btn count-plus"></button>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <p class="c-gray res_DoubleQueen"></p>
                                                        <div class="count">
                                                            <button type="button" class="count-btn count-minus "></button>
                                                            <input type="text" name="Queen1" id="Queen1" class="input-count count__children" value="0"
                                                                readonly="">
                                                            <button type="button" class="count-btn count-plus"></button>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <p class="c-gray res_Single"></p>
                                                        <div class="count">
                                                            <button type="button" class="count-btn count-minus "></button>
                                                            <input type="text" name="Single1" id="Single1" class="input-count count__children" value="0"
                                                                readonly="">
                                                            <button type="button" class="count-btn count-plus"></button>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <p class="c-gray res_Sofa"></p>
                                                        <div class="count">
                                                            <button type="button" class="count-btn count-minus "></button>
                                                            <input type="text" name="Sofa1" id="Sofa1" class="input-count count__children" value="0"
                                                                readonly="">
                                                            <button type="button" class="count-btn count-plus"></button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="sleeping__arrangements-item">
                                        <div class="sleeping__arrangements-title">
                                            <p class="res_CommonSpace"></p>
                                        </div>
                                        <ul class="dropdown__noactive dropdown__noactive-two">
                                            <li class="dropdown-item">
                                                <p class="c-gray res_DoubleKing"></p>
                                                <div class="count">
                                                    <button type="button" class="count-btn count-minus "></button>
                                                    <input type="text" name="King_CS" id="King_CS" class="input-count count__children" value="1" readonly="">
                                                    <button type="button" class="count-btn count-plus"></button>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <p class="c-gray res_DoubleQueen"></p>
                                                <div class="count">
                                                    <button type="button" class="count-btn count-minus "></button>
                                                    <input type="text" name="Queen_CS" id="Queen_CS" class="input-count count__children" value="0"
                                                        readonly="">
                                                    <button type="button" class="count-btn count-plus"></button>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <p class="c-gray res_Single"></p>
                                                <div class="count">
                                                    <button type="button" class="count-btn count-minus "></button>
                                                    <input type="text" name="Single_CS" id="Single_CS" class="input-count count__children" value="0"
                                                        readonly="">
                                                    <button type="button" class="count-btn count-plus"></button>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <p class="c-gray res_Sofa"></p>
                                                <div class="count">
                                                    <button type="button" class="count-btn count-minus "></button>
                                                    <input type="text" name="Sofa_CS" id="Sofa_CS" class="input-count count__children" value="0"
                                                        readonly="">
                                                    <button type="button" class="count-btn count-plus"></button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btn__block">
                                    <a href="<?php echo $BackButton; ?>" class="btn btn-red btn-back res_BackBtn"></a>
                                    <button type="submit" class="btn btn-red res_NextBtn"></button>
                                </div>
                                <input type="hidden" name="step2_submit" value="1">
                            </form>
                        </div>
                    </div>
                    <?php include(HOME . XX . "views/cache/e_addpropertymenu.view.cache.php"); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="/static/js/moment.min.js"></script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/jquery.inputmask.bundle.js"></script>
    <script src="/static/js/slick.min.js"></script>
    <script src="/static/js/jquery.daterangepicker.min.js"></script>
    <script src="/static/js/common_alt1.js"></script>
    <script src="/static/js/mask.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="/static/v2/js/resouceReader.js"></script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>
   
</body>

</html>