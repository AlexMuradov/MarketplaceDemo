<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>card</title>
    <meta name="description" content="Xx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=400, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="//static/img/Xx..ico" type="image/x-icon">
    <link rel="stylesheet" href="/static/css/slick.css">
    <link rel="stylesheet" href="/static/css/daterangepicker.min.css">
    <link rel="stylesheet" href="https://static.rentxx.com/static/css/xxcalendar.css">
   
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="">
    <link data-n-head="ssr" rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css"></script>
    <link rel="stylesheet" href="/static/css/main_alt.css">
    <link rel="stylesheet" href="/static/css/card.css">
</head>

<body>
    <!-- preloader --> 
    <!-- <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div> -->
    <!-- preloader
    <div id="wrapper">
        <!-- header.html -->
        <header class="header header-main">
            <div class="container container__heder">
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
                <div class="top__gallery">
                    <div class="left__img">
                        <a href="#openModal">
                            <img src="/static/uploads/listings/main__img.svg" alt="apartments">
                        </a>
                    </div>

                    <div class="center__img">
                        <a href="#openModal">
                            <img src="/static/uploads/listings/second__img1.svg" alt="apartments">
                        </a>
                        <a href="#openModal">
                            <img src="/static/uploads/listings/second__img4.svg" alt="apartments">
                        </a>
                    </div>
                    <div class="right__img">
                        <a href="#openModal">
                            <img src="/static/uploads/listings/second__img2.svg" alt="apartments">
                        </a>
                        <a href="#openModal">
                            <img src="/static/uploads/listings/second__img3.svg" alt="apartments">
                        </a>
                    </div>
                </div>
                <!-- данные__заказа__модальное_окно-начало -->
                <div id="openModal" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <a href="#close__window" title="Close" class="close__window">
                                    <img src="/static/img/X.png" alt="close">
                                </a>
                                <div class="slider">
                                    <div class="slider__item">
                                        <img src="/static/uploads/listings/second__img3.svg" alt="slider">
                                    </div>
                                    <div class="slider__item">
                                        <img src="/static/uploads/listings/second__img1.svg" alt="slider">
                                    </div>

                                    <div class="slider__item">
                                        <img src="/static/uploads/listings/second__img2.svg" alt="slider">
                                    </div>

                                    <div class="slider__item">
                                        <img src="/static/uploads/listings/main__img.svg" alt="slider">
                                    </div>

                                    <div class="slider__item">
                                        <img src="/static/uploads/listings/second__img4.svg" alt="slider">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- данные__заказа__модальное_окно-конец -->
            </div>
            <div class="container__info">
                <div class="apartments__info">
                    <div class="apartments__main">
                        <div class="title__main">
                            <h2><?php echo $MainTitle; ?></h2>
                            <div class="save__info">
                                <a href="#">
                                    <img src="/static/img/save_photo.svg" alt="oll_photo">
                                    <p><?php echo $AllPhotos; ?></p>
                                </a>
                                <form action="/">
                                    <label class="card-bottom">
                                        <input type="checkbox" class="checkbox">
                                        <span class="like-btn"></span>
                                        <span><?php echo $Save; ?></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="characteristics">
                            <h3><?php echo $Charasteristics; ?></h3>
                            <div class="characteristics__items">
                                <div class="characteristics__left">
                                    <div class="characteristics__block">
                                        <div class="characteristics__item">
                                            <span></span>
                                            <img src="/static/img/area.svg" alt="area">
                                            <p id="area">Площадь 20 кв.м.</p>
                                        </div>
                                        <div class="characteristics__item">
                                            <span></span>
                                            <img src="/static/img/bathroom.svg" alt="bathroom">
                                            <p id="bath">Ванные комнаты: 1</p>
                                        </div>
                                    </div>
                                    <div class="characteristics__block">
                                        <div class="characteristics__item">
                                            <span></span>
                                            <img src="/static/img/plans.svg" alt="plans">
                                            <p id="roomCount">1-комнатная</p>
                                        </div>
                                        <div class="characteristics__item">
                                            <span></span>
                                            <img src="/static/img/person.svg" alt="person">
                                            <p id="guestCount">Максимум 2 гостя</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="characteristics__right">
                                    <div class="characteristics__item">
                                        <span></span>
                                        <img src="/static/img/night.svg" alt="night">
                                        <p id="minNights">Минимум 1 ночь</p>
                                    </div>
                                    <div class="characteristics__item">
                                        <span></span>
                                        <img src="/static/img/stairs.svg" alt="stairs">
                                        <p>1 этаж из 9</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sleepingplaces">
                            <h3>Cпальные места</h3>
                            <div class="sleepingplaces__items" id="test">
                               
                            </div>
                        </div>
                        <div class="description__text">
                            <h3>Описание</h3>
                            <div class="container__description" >
                                <h4 id="ListingDescriptionMain"></h4>
                                <div class="accordion">
                                    <dl>
                                        <dt>
                                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1"
                                                class="accordion-title accordionTitle js-accordionTrigger">Читать
                                                полностью</a>
                                        </dt>
                                        <dd class="accordion-content accordionItem is-collapsed" id="accordion1"
                                            aria-hidden="true">
                                            <p id="ListingDescriptionSkipped"></p>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="facilities">
                            <h3>Удобства</h3>
                            <div class="facilities__items" id="amenetiesMain">
                                
                            </div>
                            <div class="container__facilities">
                                <div class="accordion">
                                    <dl>
                                        <dt>
                                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1"
                                                class="accordion-title accordionTitle accordionTitle-facilities
                                                js-accordionTrigger">Показать все
                                                удобства</a>
                                        </dt>
                                        <dd class="accordion-content accordionItem is-collapsed" id="accordion2"
                                            aria-hidden="true">
                                            <div class="facilities__items facilities__items-accordion" id="amenetiesSkipped">
                                                
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="rememberthis">
                            <h3>Что нужно помнить</h3>
                            <div class="rememberthis__items">
                                <div class="rememberthis__item">
                                    <span></span>
                                    <img src="/static/img/clock.svg" alt="clock">
                                    <div>
                                        <h5>Прибытие</h5>
                                        <p id="checkIn"></p>
                                    </div>
                                </div>
                                <div class="rememberthis__item">
                                    <span></span>
                                    <img src="/static/img/clock.svg" alt="clock">
                                    <div>
                                        <h5>Выезд</h5>
                                        <p id="checkOut"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home__rules">
                            <div class="accordion">
                                <dl>
                                    <dt>
                                        <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle accordionTitle-facilities
                                                js-accordionTrigger">Правила дома</a>
                                        <h3>Правила дома</h3>
                                    </dt>
                                    <dd class="accordion-content accordionItem" id="accordion3"
                                        aria-hidden="true">
                                        
                                       
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="home__rules cancellation__policy">
                            <div class="accordion">
                                <dl>
                                    <dt>
                                        <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle accordionTitle-facilities
                                                js-accordionTrigger">Политика отмены бронирования</a>
                                        <h3>Политика отмены бронирования от владельца квартиры</h3>
                                    </dt>
                                    <dd class="accordion-content accordionItem is-collapsed" id="accordion4"
                                        aria-hidden="true">
                                        <div class="facilities__items facilities__items-accordion">
                                            <p>Предоплата не возвращается в случае отмены заказа менее чем за 7 дней до
                                                заезда.</p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="coordinates">
                            <h3>Месторасположение</h3>
                            <div class="map__main">
                                <div class="map__title">
                                    <img src="/static/img/map__img.png" alt="">
                                    <h2 id="address"></h2>
                                </div>
                                <!-- <div class="map__item">
                                    <iframe title='google__map'
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d755.5303944531443!2d30.5188191295774!3d50.43567638127056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cefd91844331%3A0xa909ac4f315b09b8!2z0YPQuy4g0KHQsNC60YHQsNCz0LDQvdGB0LrQvtCz0L4sIDcsINCa0LjQtdCyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1592637471119!5m2!1sru!2sua"
                                        width="683" height="314" frameborder="0" style="border:0;" allowfullscreen=""
                                        aria-hidden="false" tabindex="0"></iframe>
                                </div> -->
                                <div class="main__map-pin">
                                    <div id="mapid"></div>
                                </div>
                            </div>
                            <div class="adress__item"></div>
                           
                            <div class="container__description">
                                <div class="accordion">
                                    <dl>
                                        <dt>
                                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1"
                                                class="accordion-title accordionTitle js-accordionTrigger">детальнее про
                                                локацию</a>
                                        </dt>
                                        <dd class="accordion-content accordionItem is-collapsed" id="accordion5"
                                            aria-hidden="true">
                                            <div class="facilities__items facilities__items-accordion">
                                                <div class="list__coordinates">
                                                    <h5>Ближайшее метро:</h5>
                                                    <ol>
                                                        <li>Дворец спорта (~0.32 км)</li>
                                                    </ol>
                                                </div>
                                                <div class="list__coordinates list__two">
                                                    <h5>Достопримечательности рядом:</h5>
                                                    <ol>
                                                        <li>НСК Олимпийский (~0.2 км)</li>
                                                        <li>Хоральная Синагога Бродского (~0.34 км)</li>
                                                        <li>Арена Сити (~0.63 км)</li>
                                                        <li>Пинчук Арт Центр (~0.63 км)</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="calendar" id="xxcalendar">
                            <h3>Доступность</h3>
                            <div class="xx_cal_container" id="xx_calendar_container">
                            </div>

                        </div>
                        <div class="reviews">
                            <div class="reviews__title">
                                <h3>Отзывы</h3>
                                <div>
                                    <img class="img-star" src="/static/img/star__.svg" alt="">
                                    <p>5.0 <span>(98 отзывов)</span></p>
                                </div>
                            </div>
                            <div class="progressbar">
                                <div class="progressbar__items">
                                    <div class="left__block">
                                        <div class="left__block-item">
                                            <h5>Общение</h5>
                                            <div>
                                                <div class="progress progress-striped">
                                                    <div class="progress-bar progress-bar-danger" id="communication" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 100%">
                                                    </div>
                                                </div>
                                                <span id="communicationRating">5,0</span>
                                            </div>
                                        </div>
                                        <div class="left__block-item">
                                            <h5>Чистота</h5>
                                            <div>
                                                <div class="progress progress-striped">
                                                    <div class="progress-bar progress-bar-danger" id="cleanliness" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 100%">
                                                    </div>
                                                </div>
                                                <span id="cleanlinessRating">5,0</span>
                                            </div>
                                        </div>
                                        <div class="left__block-item">
                                            <h5>Точность</h5>
                                            <div>
                                                <div class="progress progress-striped">
                                                    <div class="progress-bar progress-bar-danger" id="accuracy" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 92%">
                                                    </div>
                                                </div>
                                                <span id="accuracyRating">4,9</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left__block right__block">
                                        <div class="left__block-item">
                                            <h5>Местоположение</h5>
                                            <div>
                                                <div class="progress progress-striped">
                                                    <div class="progress-bar progress-bar-danger" id="location" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 100%">
                                                    </div>
                                                </div>
                                                <span id="locationRating">5,0</span>
                                            </div>
                                        </div>
                                        <div class="left__block-item">
                                            <h5>Цена/качество</h5>
                                            <div>
                                                <div class="progress progress-striped">
                                                    <div class="progress-bar progress-bar-danger" id="price" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 100%">
                                                    </div>
                                                </div>
                                                <span id="priceRating">5,0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="reviewsSection"></div>
                            <div class="show__oll-reviews">
                                <a href="#">Показать все отзывы</a>
                            </div>
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-prev page-arrow" href="#"></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                    <li class="page-item"><a class="page-next page-arrow" href="#"></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="about__master">
                            <h3>ХОЗЯИН sinan</h3>
                            <div class="about__master-items">
                                <div class="about__master-img">
                                    <img src="/static/img/master.png" alt="master">
                                    <div class="master__status">
                                        <p>Опытный владелец</p>
                                        <span class="question">
                                            <span class="tooltip">Опытные хозяины с отличными отзывами, которые делают
                                                всё для комфорта гостей</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="about__master-item-block">
                                    <div class="about__master-item">
                                        <div class="block">
                                            <img src="/static/img/feedback.png" alt="feedback">
                                            <span>73 отзыва</span>
                                        </div>
                                        <div class="block">
                                            <img src="/static/img/location.png" alt="location">
                                            <span>Баку, Азербайджан</span>
                                        </div>
                                    </div>
                                    <div class="about__master-item">
                                        <div class="block">
                                            <img src="/static/img/cheked.png" alt="cheked">
                                            <span>Проверен</span>
                                        </div>
                                        <div class="block">
                                            <img src="/static/img/reg_in.png" alt="reg_in">
                                            <span>На сайте с январь 2014 г.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="some__text">
                                <p>Im Sinan, studied in Tourism Management at University of Surrey. My hobbies are:
                                    Football, Basketball, Collecting pins and Traveling.</p>
                            </div>
                            <div class="master__skills">
                                <div class="master__skills-main">
                                    <p>Языки: <span>English, Русский, Türkçe</span></p>
                                    <p>Частота ответов: <span>100%</span></p>
                                    <p>Время ответа: <span>в течение часа</span></p>
                                </div>
                                <div class="master__skills-text">
                                    <p>Опытный владелец</p>
                                    <span>Опытные хозяины с отличными отзывами, которые делают всё для комфорта
                                        гостей</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="apartments__right">
                        <div class="payment__form">
                            <div class="payment__form-head">
                                <div class="form__head-title">
                                    <div class="title__price">$45 <span>$50$</span></div>
                                    <div class="title__text">за сутки</div>
                                </div>
                                <div class="reviews__block-head">
                                    <div class="reviews__block-title">
                                        <img src="/static/img/star__.svg" alt="star">
                                        <p>5,0 <span>(98 отзывов)</span></p>
                                    </div>
                                    <div class="reviews__block-text">
                                        <p>Редкая находка</p>
                                    </div>
                                </div>
                            </div>
                            <div class="payment__form-content">
                                <span class="like-btn like-btn_mb"></span>
                                <form class="search-result">
                                    <div class="field">
                                        <p class="name">Прибытие и выезд</p>
                                        <input type="text" class="input-dt" name="rangedate" value="10.10 - 20.10"
                                            required="">
                                    </div>
                                    <div class="search-result__item">
                                        <span class="result__item-text">Гостей</span>
                                        <input type="text" value="1 человек" class="search-result__input input-visitor"
                                            readonly="" required="">
                                        <ul class="dropdown">
                                            <li class="dropdown-item">
                                                <p class="c-gray">Взрослые
                                                    <span class="text-12">от 13 лет</span>
                                                </p>
                                                <div class="count ">
                                                    <button type="button" class="count-btn count-minus "></button>
                                                    <input type="text" class="input-count count__adults" value="1"
                                                        readonly="">
                                                    <button type="button" class="count-btn count-plus"></button>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <p class="c-gray">Дети
                                                    <span class="text-12">до 12 лет</span>
                                                </p>
                                                <div class="count">
                                                    <button type="button" class="count-btn count-minus "></button>
                                                    <input type="text" class="input-count count__children" value="0"
                                                        readonly="">
                                                    <button type="button" class="count-btn count-plus"></button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                                <ul class="payment__form-ul">
                                    <li class="payment__form-li">
                                        <div class="counts">
                                            <p class="counts-item">878₽ x 10 ночей</p>
                                            <p class="counts-item">$450</p>
                                        </div>
                                    </li>
                                    <li class="payment__form-li">
                                        <div class="counts">
                                            <p class="counts-item">Скидка 10% (за неделю)
                                                <span class="question">
                                                    <span class="tooltip">При отмене не позднее чем за 14 дней до
                                                        прибытия
                                                        вы получите полный возврат и любовь.</span>
                                                </span>
                                            </p>
                                            <p class="counts-item">-$45</p>
                                        </div>
                                    </li>
                                    <li class="payment__form-li">
                                        <div class="counts">
                                            <p class="counts-item">Плата за уборку
                                                <span class="question">
                                                    <span class="tooltip">При отмене не позднее чем за 14 дней до
                                                        прибытия
                                                        вы получите полный возврат и любовь.</span>
                                                </span>
                                            </p>
                                            <p class="counts-item">$15</p>
                                        </div>
                                    </li>
                                    <li class="payment__form-li">
                                        <div class="counts">
                                            <p class="counts-total">Итого</p>
                                            <p class="counts-total"> $420</p>
                                        </div>
                                    </li>
                                </ul>
                                <botton class="btn btn-red">ЗАБРОНИРОВАТЬ</botton>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="similaroffers">
                    <h2>Похожие предложения</h2>
                    <div class="similaroffers__items">
                        <div class="similaroffers__item">
                            <div class="item__img">
                                <span class="sale">-15%</span>
                                <img class="place__photo" src="content_/static/img/one__room.png" alt="one__room">
                                <div class="item__img-text">
                                    <a href="#">1 комната</a>
                                    <div class="reviews__block">
                                        <img src="/static/img/star.png" alt="star">
                                        <p>4,5 <span>(33)</span></p>
                                    </div>
                                </div>
                            </div>
                            <a href="#">Просторная и современная квартира в центре города</a>
                            <div class="place__price">
                                <div class="place__item">
                                    <img src="/static/img/map__img.png" alt="map">
                                    <p>ул. Зарифа Алиева, 28
                                        0,5 км от центра
                                    </p>
                                </div>
                                <div class="price__item">
                                    <div class="old__price">$30</div>
                                    <div class="new__price">$24</div>
                                </div>
                            </div>
                            <button class="reservation__btn" type="submit">
                                <span class="reservation__title">МГНОВЕННОЕ БРОНИРОВАНИЕ</span>
                                <span class="like-btn"></span>
                            </button>
                        </div>
                        <div class="similaroffers__item">
                            <div class="item__img">
                                <span class="sale">-15%</span>
                                <img class="place__photo" src="content_/static/img/two__room.png" alt="two__room">
                                <div class="item__img-text">
                                    <a href="#">2 комнаты</a>
                                    <div class="reviews__block">
                                        <img src="/static/img/star.png" alt="star">
                                        <p>5,0 <span>(98)</span></p>
                                    </div>
                                </div>
                            </div>
                            <a href="#">Просторная и современная квартира в центре города</a>
                            <div class="place__price">
                                <div class="place__item">
                                    <img src="/static/img/map__img.png" alt="map">
                                    <p>ул. Зарифа Алиева, 28
                                        0,5 км от центра
                                    </p>
                                </div>
                                <div class="price__item">
                                    <div class="old__price">$30</div>
                                    <div class="new__price">$24</div>
                                </div>
                            </div>
                            <button class="reservation__btn" type="submit">
                                <span class="reservation__title">МГНОВЕННОЕ БРОНИРОВАНИЕ</span>
                                <span class="like-btn"></span>
                            </button>
                        </div>
                        <div class="similaroffers__item">
                            <div class="item__img">
                                <span class="sale">-15%</span>
                                <img class="place__photo" src="content_/static/img/three__room.png" alt="three__room">
                                <div class="item__img-text">
                                    <a href="#">3 комнаты</a>
                                    <div class="reviews__block">
                                        <img src="/static/img/star.png" alt="star">
                                        <p>4,9 <span>(38)</span></p>
                                    </div>
                                </div>
                            </div>
                            <a href="#">Просторная и современная квартира в центре города</a>
                            <div class="place__price">
                                <div class="place__item">
                                    <img src="/static/img/map__img.png" alt="map">
                                    <p>ул. Зарифа Алиева, 28
                                        0,5 км от центра
                                    </p>
                                </div>
                                <div class="price__item">
                                    <div class="old__price">$30</div>
                                    <div class="new__price">$24</div>
                                </div>
                            </div>
                            <button class="reservation__btn" type="submit">
                                <span class="reservation__title">МГНОВЕННОЕ БРОНИРОВАНИЕ</span>
                                <span class="like-btn"></span>
                            </button>
                        </div>
                    </div>
                    <a class="btn btn-red apartments__info-btn" target="_blank" href="#">
                        больше вариантов
                        <svg class="arrow">
                            <use xlink:href="/static/img/sprite/sprite.svg#arrow-down"></use>
                        </svg>
                    </a>
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

    <!-- <script src="/static/js/fullcalendar/vendor/rrule.js"></script>
    <script src="/static/js/fullcalendar/packages/core/main.js"></script>
    <script src="/static/js/fullcalendar/packages/interaction/main.js"></script>
    <script src="/static/js/fullcalendar/packages/daygrid/main.js"></script>
    <script src="/static/js/fullcalendar/packages/timegrid/main.js"></script>
    <script src="/static/js/fullcalendar/packages/interaction/main.js"></script>
    <script src="/static/js/fullcalendar/packages/list/main.js"></script>
    <script src="/static/js/fullcalendar/packages/core/locales/ru.js"></script> -->
    <script src="/static/js/moment.min.js"></script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/jquery.inputmask.bundle.js"></script>
    <script src="/static/js/slick.min.js"></script>
    <!-- <script src="/static/js/jquery.daterangepicker.min.js"></script> -->
    <script src="/static/js/common.js"></script>
    <script src="/static/js/mask.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://static.rentxx.com/static/js/xxcalendar.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script>
        // optionDate = {
        //     opens: 'left',
        //     autoUpdateInput: true,
        //     startOfWeek: 'monday',
        //     singleMonth: true,
        //     showShortcuts: false,
        //     // showTopbar: false,
        //     autoApply: false,
        //     format: "DD.MM"
        // }
        // $(function () {
        //     $('input[name="daterange"]').dateRangePicker(optionDate);
        // });

    <?php echo $JsLocalizationVars; ?>
    <?php echo $JsLocalizationScript; ?>

    </script>

   

</body>

</html>