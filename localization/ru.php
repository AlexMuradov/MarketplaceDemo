<?php

Namespace Localization;

Class Language {

    static $LngTitles = [
        "home" => "Мгновенное жилье — Rentxx",
        "property/search" => "Поиск — Rentxx",
        "property/display" => " — Rentxx",
        "property/add" => "Подключение к системе — Rentxx",
        "auth/verify" => "Подтверждение кода безапасности — Rentxx",
        "auth/signin" => "Вход в систему — Rentxx",
        "auth/registration" => "Новый Аккаунт — Rentxx",
        "page/terms" => "Условия соглашения — Rentxx",
        "page/complete" => "",
        "page/emailsent" => "",
        "cabinet/subscriptions" => ""
    ];

    static $LngHomepageHeader = [
        ['Mгновенное бронирование.', 'Быстрое подтверждение.', 'Удобная резервация.'],
        ['Проверенные квартиры.', 'Без посредников.', 'Поддержка 24/7.'],
        ['Оплата картой.', 'Без % дополнительных сборов.', 'Без скрытых комиссий.', 'VISA/MasterCard.']
    ];

    static $LngHome = array(
        "LoginSuccess" => "Вы успешно вошли в систему.",
        "LoginFail" => "Ошибка входа, неверный логин или пароль.",
        "InstantBooking" => "Мгновенное бронирование квартир",
        "Close" => "Закрыть",
        "LoadNow" => "Загрузить сейчас",
        "OnlinePayment" => "Онлайн оплата",
        "CatalogTotal" => "В каталоге 3842 квартиры",
        "City" => "Город",
        "Arrival" => "Прибытие",
        "Departure" => "Выезд",
        "ArrivalDeparture" => "Прибытие и выезд",
        "Guests" => "Гостей",
        "Person" => "чел.",
        "Persons" => "чел.",
        "Adults" => "Взрослые",
        "v13yo" => "от 13 лет",
        "Children" => "Дети",
        "v12yo" => "до 12 лет",
        "Baby" => "Младенцы",
        "v3yo" => "до 3 лет",
        "HeadAddApt" => "Сдать жильё",
        "HeadEnter" => "вход",
        "HeadProfile" => "мой профиль <span class=\"n_round\"></span>",
        "Search" => "ПОИСК",
        "RecentlyViewed" => "Недавно просмотренные",
        "InstantBookingButton" => "МГНОВЕННОЕ БРОНИРОВАНИЕ",
        "TopBaku" => "Лучшие предложения в Баку",
        "AllProperty" => "ВСЕ КВАРТИРЫ",
        "Registration" => "регистрация",
        "HowtoConnect" => "Как подключиться к сервису",
        "v2min" => "(2 мин)",
        "RegHintText" => "Reg text Reg text Reg",
        "AddPropHint" => "add appt text",
        "AddAptTitle" => "добавление квартиры",
        "v6min" => "(6 мин)",
        "GetMoneyHintTitle" => "получение денег",
        "Instant" => "(мгновенно)",
        "CompanySlogan" => "Мгновенно бронирование квартир <br> с онлайн оплатой без комиссий",
        "GetMoneyHint" => "getting money text",
        "Notifications" => "Уведомления",
        "Getmails" => "Получать уведомления на почту",
        "OnlyFreeProperties" => "Только свободные квартиры",
        "Where" => "Куда?",
        "Nearby" => "Try: Baku"
    );

    static $PropertyRulesList = array(
        1 => array("Можно с животными", 1),
        2 => array("Без вечеринок и мероприятий", 1),
        3 => array("Нельзя курить", 0),
        4 => array("Можно с детьми",0),
        5 => array("Можно ходить в туфлях",1)
    );

    static $LngPropertyType = array(
        1 => "Квартира",
        2 => "Дом",
        3 => "Дача/Вилла",
        4 => "Отель"
    );

    static $LngBedType = array(
        1 => array("Двуспальная(широкая)", "King", "double_bed"),
        2 => array("Двуспальная", "Queen", "double_bed"),
        3 => array("Односпальная", "Single", "bed_min"),
        4 => array("Диван", "Sofa", "sofa")
    );

    static $LngRules = array(
        1 => array("Можно с<br> детьми 2-12 лет", "children", "Нельзя с<br> детьми 2-12 лет", 0),
        2 => array("Можно с детьми<br> младше 2 лет", "infant", "Нельзя с детьми младше 2 лет", 0),
        3 => array("Можно с животными", "pets", "Нельзя с животными", 0),
        4 => array("Можно курить", "smoking", "Нельзя курить", 0),
        5 => array("Разрешены вечеринки", "party", "Без мероприятий и вечеринок", 0),
        6 => array("Можно ходить в обуви", "shoes", "Запрещено ходить в обуви", 0),
        7 => array("Необходимо подниматься по лестницам", "stairs", "Нет необходимости подниматься по лестницам", 2),
        8 => array("Шумная локация", "noise", "Тихая локация", 0),
        9 => array("В жилище живут животные", "petsLive", "Нет животных в жилище", 2),
        10 => array("Есть парковка", "parking", "Нет парковки", 0),
    );

    static $LngAmenities = array(
        1 => array("Основные (мыло, полотенца)", "essentials"),
        2 => array("Вай-Фай", "wifi"),
        3 => array("Телевизор", "tv"),
        4 => array("Кондиционер", "aircon"),
        5 => array("Парадный вход", "privateEntrance"),
        6 => array("Фен", "driyer"),
        7 => array("Завтрак, чай, кофе", "breakfast"),
        8 => array("Рабочее место", "desk"),
        9 => array("Стиральная машина", "washingMachine"),
        10=> array("Детектор дыма", "smokeDetector"),
        11=> array("Мед.аптечка", "aidKit")
    );

    static $LngPayment = array(
        "AcceptRules" => "Правила дома",
        "IdentifyGuest" => "Кто приезжает?",
        "ConfirmAndPay" => "Подтверждение и оплатита",
        "Step1of3" => "шаг 1 из 3",
        "Step2of3" => "шаг 2 из 3",
        "Step2of3" => "шаг 3 из 3",
        "Nights5" => "ночей",
        "Nights2" => "ночи",
        "Nights1" => "ночь",
        "Review1" => "отзыв",
        "Review2" => "отзыва",
        "Review5" => "отзывов",
        "LeaveReview" => "Оставить отзыв",
        "Discount" => "Скидка",
        "WeekDay1" => "Понедельник",
        "WeekDay2" => "Вторник",
        "WeekDay3" => "Среду",
        "WeekDay4" => "Четверг",
        "WeekDay5" => "Пятницу",
        "WeekDay6" => "Субботу",
        "WeekDay0" => "Воскресенье",
        "Month1" => "января",
        "Month2" => "февраля",
        "Month3" => "марта",
        "Month4" => "апреля",
        "Month5" => "мая",
        "Month6" => "июня",
        "Month7" => "июля",
        "Month8" => "августа",
        "Month9" => "сентября",
        "Month10" => "октября",
        "Month11" => "ноября",
        "Month12" => "декабря",
        "Total" => "ИТОГО",
        "CancellationTitle" => "Бесплатная отмена до",
        "CancellationText" => "При отмене не позднее чем за 14 дней до прибытия вы получите полный возврат. <a href=\"#\" class=\"more-link\">Подробнее</a>",
        "ArrivalAt" => "Прибытие в",
        "DepartureAt" => "Выезд в",
        "After" => "после",
        "Before" => "до",
        "CheckIn2" => "Самостоятельное заселение — Умный сейф",
        "CheckIn3" => "Самостоятельное заселение — Без ключей, с помощью пин кода",
        "CheckIn1" => "Заселение хозяином при встрече",
        "RememberWhat" => "что нужно помнить",
        "RegistrationWrongCode" => "Неверный код подтверждения.",
        "AcceptAndProceed" => "СОГЛАСИТЬСЯ И ПРОДОЛЖИТЬ",
        "GreatPrice" => "Гарантия отличной цены",
        "BestPriceText" => "Цены на нашем сервисе на порядок ниже других систем"
        
    );

    static $LngRegistration = array(
        "Title" => "Регистрация",
        "LoginInvalidEmail" => "Это новая переменная",
        "LoginWrongDetails" => "Неправильная почта или пароль",
        "LoginShortPassword" => "Это ошибка 2",
        "RegistrationSuccess" => "Вы успешно создали аккаунт.",
        "RegistrationFail" => "Ошибка создания аккаунта.",
        "RegistrationEmailExists" => "Неверный эмаил адрес.",
        "RegistrationWrongNumber" => "Неверный формат номера",
        "RegistrationShortNumber" => "Слишком короткий номер",
        "RegistrationNumberExists" => "Такой номер уже существует в базе, войдите либо <a href=\"#\" class=\"error-link\">восстановите ваш пароль</a>",
        "RegistrationInvalidEmail" => "Неверный эмаил адрес.",
        "RegistrationShortPassword" => "Минимальная длина пароля 6 символов.",
        "RegistrationWrongCode" => "Неверный код подтверждения.",
        "Country" => "Страна"
    );

    static $LngRegistration_Sms_Verification = array(
        "VerificationSuccess" => "Ваш номер телефона успешно подтвержден.",
        "IncorrectCode" => "Неверно введен код подтверждения.",
        "VerificationFail" => "Не удалось подтвердить аккаунт. Внутренняя ошибка, попробуйте создать аккаунт заново.",
    );

    static $LngPersonalInfo = array(
        "Title" => "Персональная информация",
        "FirstNameLabel" => "Имя",
        "FirstNameInput" => "Введите имя",
        "LastNameLabel" => "Фамилия",
        "LastNameInput" => "Введите фамилию",
        "GenderLabel" => "Пол",
        "GenderPicker" => "Выберите пол",
        "GenderMale" => "Мужской",
        "GenderFemale" => "Женский",
        "PhoneLabel" => "Телефон",
        "PhoneInput" => "Введите номер телефона",
        "EmailLabel" => "Э-почта",
        "EmailInput" => "Введите почту",
        "BirthDateLabel" => "Дата рождения",
        "CountryLabel" => "Страна",
        "CityLabel" => "Город",
        "StreetLabel" => "Улица",
        "AppartmentLabel" => "Квартира",
        "BuildingLabel" => "Дом",
        "ZipLabel" => "Индекс",
        "PassportIDLabel" => "Номер паспорта",
        "PassportFront" => "Паспорт (лицевая сторона)",
        "PassportBack" => "Паспорт (обратная сторона)",
        "SaveBtn" => "Cохранить",
        "EditBtn" => "Редактировать",
        "VerifyPhoneBtn" => "Подтвердить номер",
        "VerifyModalTitle" => "Подтверждение",
        "VerifyModalDescription" => "Мы отправили код подтверждения на Ваш телефон",
        "VerifyBtn" => "Подтвердить",
        "VerifyEmailBtn" => "Подтвердить почту",
        "CloseModal" => "Закрыть",
        "UnderReview" => "На рассмотрении",
        "NotConfirmedTitle" => "Личные данные не подтверждены",
        "NotConfirmedText" => "Подтвердите номер и паспорт для доступа ко всем функциям сервиса"

    );

    static $LngLogin = array(
        "InvalidLoginOrPassword" => "Неправильный логин или пароль.",
        "LoginTitle" => "Авторизация",
        "Email" => "Email",
        "Passwd" => "Пароль",
        "Restore" => "Забыли Пароль?",
        "QuestionNew" => "Новый пользователь?",
        "CreateAccount" => "Создать Аккаунт",
        "Or" => "или",
        "GoogleAuth" => "Войти через Google"
    );

    static $LngAddDocs = array(
        "Title" => "Какой-то текст",
        "ValidBefore" => "Действителен до:",
        "DocType" => "Тип документа",
        "ImageFront" => "Лицевая сторона.",
        "ImageBack" => "Обратная сторона.",
        "SubmitBtn" => "Сохранить",
        "TabToUpload" => "Нажмите для загрузки",
        "CloseModal" => "Закрыть"
    );

    static $LngReservations = array(
        "NewRequestsTitle" => "Новые запросы",
        "NewRequestsDescription" => "Необходимы решения по поводу новых запросов",
        "HistoryRequestsTitle" => "История",
        "HistoryRequestsDescription" => "История всех .....",
        "SenderInfo" => "Отправитель",
        "Dates" => "Даты",
        "Operation" => "Действия",
        "Status" => "Статус",
        "ModalConfirmTitle" => "Подтверждение",
        "ModalConfirmDescription" => "Вы уверены что хотите подтвердить запрос?",
        "ModalRefuseTitle" => "Отказ",
        "ModalRefuseDescription" => "Вы уверены что хотите отказать на запрос?",
        "Ok" => "Ok",
        "Cancel" => "Отмена"
    );

    static $LngCountry = array(
        1 => array("1", "Азербайджан", "+994", "AZE"),
        2 => array("2", "Люксембург", "+352", "LUX"),
        3 => array("3", "США", "+1", "USA")
    );

    static $LngCity = array(
        1 => array("1", "Баку", "1", "40.36776393551758", "49.83890354633332"),
        2 => array("2", "Габала", "1", "40.98099960933604", "47.847518920898445"),
        3 => array("3", "Люксембург", "2", "49.609959111453364", "6.129662990570069"),
        4 => array("4", "Вашингтон", "3", "38.89437302694247", "-77.03681945800783")
    );

    static $LngTotalRating = array(
        1 => "Ужасно",
        2 => "Плохо",
        3 => "Средне",
        4 => "Хорошо",
        5 => "Отлично",
        6 => "Превосходно",
        7 => "Оценки еще нет"
    );

    static $LngBeforeArrive = array(
        1 => array("0", "В тот же день"),
        2 => array("1", "1 день"),
        3 => array("2", "2 дня"),
        4 => array("3", "3 дня"),
        5 => array("7", "7 дней"),
    );

    static $LngArriveTime = array(
        1 => array("1", "Гибкий"),
        2 => array("2", "8:00"),
        3 => array("3", "9:00"),
        4 => array("4", "10:00"),
        5 => array("5", "11:00"),
        6 => array("6", "12:00"),
        7 => array("7", "13:00"),
        8 => array("8", "14:00"),
        9 => array("9", "15:00"),
        10 => array("10", "16:00"),
        11 => array("11", "17:00"),
        12 => array("12", "18:00"),
        13 => array("13", "19:00"),
        14 => array("14", "20:00"),
        15 => array("15", "21:00"),
        16 => array("16", "22:00"),
        17 => array("17", "23:00"),
        18 => array("18", "00:00")
    );

    static $LngTimeInAdvance = array(
        1 => array("30", "За месяц"),
        2 => array("60", "За 2 месяца"),
        3 => array("90", "За 3 месяца")
    );

    static $LngCurrency = array(
        1 => array("1", "AZN - Azerbaijani manat", "₼", "AZN"),
        2 => array("2", "USD - US dollar", "$", "USD"),
        3 => array("3", "RUR - Russian ruble", "₽", "RUB"),
        4 => array("4", "EUR - Euro", "€", "EUR")
    );

    static $LngCurrencyXRate = array(
        1 => 0.50,
        2 => 0.86,
        3 => 0.012,
        4 => 1
    );

    static $LngTransactionStatus = array(
        1 => array("Paid", "Оплачено"),
        2 => array("NotPaid", "Не Оплачено"),
        3 => array("Pending", "На Рассмотрении"),
        4 => array("PaymentDeclined", "Отклонено"),
        5 => array("Cancelled", "Отменено")
    );

    static $LngCabinet = array(
    1 => array("Paid", "Оплачено"),
    2 => array("NotPaid", "Не Оплачено"),
    3 => array("Pending", "Ожидается подтверждение"),
    4 => array("PaymentDeclined", "Оплата отклонена"),
    5 => array("Cancelled", "Резервация отменена")
    );

    static $LngAddProperty = array(
        "TIP" => "Cовет",
        "PropertyTypeTitle" => "Tип жилья",
        "PropertyTypePlaceholder" => "Выберите тип жилья",
        "PropertyDescription" => "Введите описание жилья",
        "PropertyTitle" => "Введите заголовок жилья",
        "EntirePlaceTitle" => "Все пространство",
        "EntirePlaceDescription" => "В распоряжении гостей вся площадь жилья. Включая кухню, спальню и ванную",
        "PrivateRoomTitle" => "Отдельная комната",
        "PrivateRoomDescription" => "Гостям предлагается личная комната. Остальное пространство может быть общим.",
        "SharedRoomTitle" => "Общая комната",
        "SharedRoomDescription" => "Гости могут проживать с другими постояльцами",
        "GuestsAccommodateTitle" => "Сколько гостей может вместить ваше жилище?",
        "MaxGuests" => "Максимум гостей",
        "BedroomsCount" => "Спален",
        "BathCount" => "Ванных комнат",
        "SleepingArrangementTitle" => "Спальные места",
        "Bedroom" => "Спальня",
        "DoubleKing" => "Двуспальная (King Size)",
        "DoubleQueen" => "Двуспальная (Queen Size)",
        "Single" => "Односпальная",
        "Sofa" => "Диван",
        "CommonSpace" => "Общее пространство",
        "PalceLocationTitle" => "Адрес",
        "PalceLocationDescription" => "Укажите адрес и укажите точное местоположение на карте",
        "Country" => "Страна",
        "City" => "Город",
        "Street" => "Улица",
        "Appartment" => "Дом.Квартира(По желанию)",
        "Zip" => "Почтовый индекс",
        "Area" => "Площадь кв.м",
        "CurrentFloor" => "Текущий этаж",
        "TotalFloors" => "Всего этажей",
        "MapTitle" => "Укажите местоположение на карте",
        "MapDescription" => "Местоположение на карте позволит гостям быстрее найти ваше жилище",
        "ReviewRequirements" => "Требования к вашим гостям",
        "ReviewRequirementsDescr" => "Гости смогут забронировать ваше жилье мгновенно, только если они соответствуют всем вашим требованиям.",
        "RentxxRequirements" => "Требования к гостям Rentxx:",
        "ReviewYourRequirements" => "Правила жилья для гостей",
        "ReviewYourRequirementsTitle" => "- Гости смогут забронировать ваше жилье мгновенно, только если они согласны с правилами жилья.",        
        "EmailAddress" => "Адрес электронной почты",
        "ConfirmedPhoneNumber" => "Подтвержденный номер телефона",
        "PaymentInformation" => "Платёжные данные",
        "MessageAboutGuestTrip" => "Сообщение о поездке гостя",
        "Check-inTimeForLastMinute" => "Время прибытия для поездок запланированных в последнюю минуту",
        "Government-issuedIDSubmittedToRentxx" => "Удостоверение личности выпущенное государством подтверждено Rentxx",
        "MoreRequirementsCanMeanFewerReservations" => "*Требование удостоверения личности может вести к меньшему количеству бронирований.",
        "AmenitiesTitle" => "Удобства",
        "QuestRequirementsTitle" => "Ознамтесь с условиями заселения гостей",
        "QuestRequirementsDescription" => "Описание этой страницы....",
        "Email" => "Адрес электронного ящика",
        "Phone" => "Подтвержденный телефонный номер",
        "Message" => "A message about the guest’s trip",
        "CheckIn" => "Check-in time for last minute trips",
        "ID" => "Документ удостоверяющий личность",
        "HomeRulesTitle" => "Правила жилья",
        "children" => "Можно с детьми 2-12 лет",
        "infant" =>"Можно с детьми младше 2 лет",
        "pets" => "Можно с животными",
        "smoking" => "Можно курить",
        "party" => "Разрешены вечеринки", 
        "shoes" => "Запрещено хожить в обуви", 
        "stairs" => "Необходимо подниматься по лестницам",
        "noise" => "Potential for noise",
        "petsLive" => "В жилище живут животные", 
        "parking" => "Есть парковка",
        "RequestWindowTitle" => "Время заезда",
        "RequestWindowTip" => "Оповещение за 2 дня может помочь вам организовать прием гостей, но вы можете упустить бронирования, которые сделаны в последний момент.",
        "DaysCount" => "Кол-во дней",
        "Period" => "Период",
        "From" => "От",
        "To" => "До",
        "RequirementsReviewTitle" => "Требования к гостям",
        "CheckInTime" => "Укажите время заселения и выезда гостей", 
        "AdvanceTimeTitle" => "Насколько заранее гости смогут забронировать ваше жилье?",
        "AdvanceTimeTip" => "Разблокируйте только те даты, в которые вы готовы принимать гостей, чтобы избежать отмены бронирования.",
        "StayTimeTitle" => "На какой срок могут оставаться гости?",
        "MinNights" => "Минимальное кол-во дней",
        "MaxNights" => "Максимальное кол-во дней",
        "ReservationMethod" => "Способ резервации",
        "InstantBooking" => "Мгновенное бронирование",
        "ManualApprove" => "Подтверждать резервации самостоятельно",
        "BlockCalendarTitle" => "Вы можете указать неактивные дни в вашем календаре",
        "UpdateCalendarBtn" => "Обновить календарь",
        "RECOMMENDED" => "РЕКОМЕНДУЕТСЯ",
        "PriceSpaceTitle" => "Финансы",
        "IncreaseChancesTitle" => "Увеличьте шансы на резервацию именно вашего жилья",
        "IncreaseChancesDescription" => "Настройте Адаптивное ценообразование для автоматической корректировки цен за ночь по мере изменения спроса в вашем регионе, чтобы привлечь больше гостей. Вы по-прежнему сможете устанавливать особые цены для конкретных дней.",
        "HowToSetYourPriceTitle" => "Выберите способ для установления цены",
        "HowToSetYourPriceDescription" => "Цену за ночь всегда контролируете вы. Продолжая, вы соглашаетесь пользоваться Адаптивным ценообразованием. Вы можете изменить это позже в настройках.",
        "IntellegentPricing" => "Адартивное ценообразование",
        "IntellegentPricingDesciption" => "Адаптивное ценообразование поможет вам принять решение при оценке жилья, автоматически поднимая и понижая стоимость с изменением спроса и предложений на жилье.",
        "FixedPrice" => "Фиксированная цена",
        "FixedPriceDesciption" => "Включив Фиксированную цену, убедитесь что жилье соответствует установленной вами цене.",
        "Currency" => "Валюта",
        "BasePrice" => "Базовая цена",
        "BasePriceDescription" => "Эта цена будет базовой ценой на ваше жилье в случае, если вы отключите адаптивное ценообразование",
        "MinimumPrice" => "Минимальная цена",
        "MinimumPriceDescription" => "Цена на жилье будет опускаться в периоды, когда спрос на ваше жилье будет низким. Укажите минимальную цену которая вас устраивает",
        "MaximumPrice" => "Максимальная цена",
        "MaximumPriceDescription" => "Когда спрос на ваше жилье достаточно высокий, допустим при проведении важного мероприятия в городе, какую самую высокую цену вы хотели бы назначить?",
        "SomethingSpecialForQuests" => "Специальное предложение для ваших гостей",
        "Off20" => "20% скидки для первых гостей",
        "OffDescription20" => "Для первых 3 гостей будет применена скидка в 20%. Вы можете получить 3 отзыва и привлечь новых постояльцев",
        "DontAddOffer" => "Отказаться от специальных скидок",
        "DontAddOfferDescription" => "После публикации вы не сможете воспользоваться данным предложением",
        "LearnMore" => "Узнать больше",
        "LengthOfStayPrices" => "Скидки на длительные заселения",
        "LengthOfStayPricesDescription" => "Поощряйте гостей на длительные заселения",
        "WeeklyDiscount" => "Скидка за неделю",
        "PriceTIP" => "Цена основана на рекомендациях по параметрам объявления, ценах поблизости и спросе.",
        "DiscountTIP" => "Скидки базируются на ожиданиях большинства гостей, бронирующих жилье на неделю и более.",
        "WeeklyDiscountDescription" => "Гости часто ищут жилье основываясь на цену. Предложите скидку за неделю или месяц, чтобы повысить шансы бронирования вашего жилья.",
        "MounthlyDiscount" => "Скидка за месяц",
        "MounthlyDiscountDescription" => "Гости часто ищут жилье основываясь на цену. Предложите скидку за неделю или месяц, чтобы повысить шансы бронирования вашего жилья.",
        "AddFilesTitle" => "Вы почти у цели, нам нужно еще немного подробностей",
        "AddFilesDescription" => "Перетащите сюда фотографии вашего объявления, чтобы помочь гостям получить полное представление о вашем жилье. Используйте не менее 5 фотографий с высоким качеством для того чтобы гости имели возможность детально рассмотреть предлагаемое жилище.",
        "DragFilesToUpload" => "Фотографии",
        "FinishBtn" => "Завершить",
        "NextBtn" => "Далее",
        "BackBtn" => "Назад",
        "Delete" => "Удалить",
        "MakeMain" => "Сделать главной",
        "DragAndDrop" => "Перетащите и отпустите или кликните, чтобы загрузить фотографии"
    );

    static $LngReviews = array(
        "Title" => "Отзыв",
        "ReviewsDesc" => "Оставьте краткий отзыв, он поможет пользователям в поиске жилья",
        "Cleanness" => "Чистота",
        "Location" => "Месторасположение",
        "Price" => "Цена",
        "Communication" => "Коммуникация",
        "WhatYouLiked" => "Что вам понравилось?",
        "WhatYouNotLiked" => "Что вам не понравилось?",
        "Save" => "Сохранить",
        "TitleCompletedReview" => "Спасибо за ваш отзыв!",
        "ThanksText" => "Ваш отзыв будет опубликован после проверки модератором. Вы получили 5% скидку на ваше следующее бронирование!",
        "GoBack" => "Назад"
    );

    static $LngMessages = array(
        "TitleMyMessages" => "Мои сообщения"
    );

    static $LngProperty = array(
        "MainTitle" => "Просторная и современная квартира в центре города",
        "AllPhotos" => "ВСЕ ФОТО",
        "Save" => "Сохранить",
        "Charasteristics" => "ХАРАКТЕРИСТИКИ",
        "SleepingArangement" => "CПАЛЬНЫЕ МЕСТА",
        "Description" => "ОПИСАНИЕ",
        "Amentities" => "УДОБСТВА",
        "ShawAllAmenities" => "Показать все удобства",
        "WhatToRemember" => "ЧТО НУЖНО ПОМНИТЬ",
        "Arrive" => "ПРИБЫТИЕ",
        "Leave" => "ВЫЕЗД",
        "Rules" => "ПРАВИЛА ДОМА",
        "CancelationRules" => "ПОЛИТИКА ОТМЕНЫ БРОНИРОВАНИЯ ОТ ВЛАДЕЛЬЦА КВАРТИРЫ",
        "Location" => "МЕСТОРАСПОЛОЖЕНИЕ",
        "Availability" => "ДОСТУПНОСТЬ",
        "Reviews" => "ОТЗЫВЫ",
        "Host" => "ХОЗЯИН",
        "Approved" => "Проверен",
        "Languages" => "Языки", 
        "EpreriencedHost" => "Опытный владелец",
        "EpreriencedHostDescription" => "Опытные хозяины с отличными отзывами, которые делают всё для комфорта гостей",
        "AnswerFreguency" => "Частота ответов", 
        "AnswerTime" => "Время ответа:",
        "SimilarOffers" => "Похожие предложения",
        "InstantBooking" => "Мгновенное бронирование",
        "Rare" => "Редкая находка",
        "ForWeek" => "за неделю",
        "ForMonth" => "за месяц",
        "ArrivalAndLeft" => "Прибытие и выезд",
        "Guests" => "Гостей",
        "Sum" => "ИТОГО",
        "Area" => "Площадь",
        "Room" => "Комнатная",
        "BathRooms" => "Ванные комнаты:",
        "AllRooms" => "-комнатная",
        "MaxGuests" => "Максимум гостей:",
        "SqM" => "Кв.м",
        "Bedroom" => "Спальня",
        "MinNights" => "Минимум ночей:"
    );

    static $LngRating = array(
        "Communication" => "Общение",
        "Cleanliness" => "Чистота",
        "Location" => "Местоположение",
        "Price" => "Цена/качество",
        "Accuracy" => "Accuracy"
    );

    static $LngMonth = array(
        0 => array("Январь"),
        1 => array("Февраль"),
        2 => array("Март"),
        3 => array("Апрель"),
        4 => array("Май"),
        5 => array("Июнь"),
        6 => array("Июль"),
        7 => array("Август"),
        8 => array("Сентябрь"),
        9 => array("Октябрь"),
        10 => array("Ноябрь"),
        11 => array("Декабрь")
    );

    static $LngFooter = array(
        "Company" => "Компания",
        "About" => "О нас",
        "Invest" => "Инвесторам",
        "Partnership" => "Партнерам",
        "Careers" => "Вакансии",
        "Contacts" => "Контакты",
        "Host" => "Арендодателям",
        "HostHome" => "Разместить квартиру",
        "HostRules" => "Условия размещения",
        "HostPayMethod" => "Онлайн платежи",
        "RulesAndSafety" => "Правила и Ваша безопасность",
        "HostCapsa" => "Система CAPSA<sup>&reg;</sup>",
        "Support" => "Поддержка",
        "ForGuests" => "Гостям",
        "BookGuarantee" => "Гарантия заселения",
        "PayMethods" => "Методы оплаты",
        "HowToBook" => "Как бронировать жильё",
        "KnowBase" => "База знаний",
        "ReportAbuse" => "Пожаловаться на обьявление",
        "PilotReview" => "Trustpilot отзывы",
        "CopyrightFooter" => "© 2021 Rentxx, Inc. Все права защищены",
        "MobileVersion" => "Мобильная версия",
        "Privacy" => "Конфиденциальность",
        "Terms" => "Условия",
        "Sitemap" => "Карта сайта",
        "LangCcy" => "Язык и Валюта",
        "CcyPop" => "Валюта",
        "LangPop" => "Язык",
        "English" => "English",
        "Russian" => "Русский",
        "Azeri" => "Азербайджанский",
        "Arabian" => "Арабский",
        "SaveChanges" => "СОХРАНИТЬ",
        "AZN" => "azn",
        "USD" => "usd",
        "RUB" => "rub",
        "EUR" => "eur",
        "CurrentLng" => "Русский"

    );

    static $LngSearch = array(
        "Price" => "Цена",
        "InstantBooking" => "Мгновенное бронирование",
        "Instant" => "Мгновенная бронь",
        "AllFilters" => "Все фильтры",
        "Sorting" => "Сортировка:",
        "ByPopularity" => "По популярности",
        "CheapFirst" => "От дешевых",
        "ExpensiveFirst" => "От дорогих",
        "ByRevirews" => "По отзывам",
        "FromCenter" => "От центра",
        "SearchByMap" => "Искать по карте",
        "Save" => "Запомнить",
        "Room1" => "Комната",
        "Room2" => "Комнаты",
        "Room3" => "Комнат",
        "CheckIn" => "Заселение",
        "FilterByPrice" => "Фильтр по ценам",
        "ListingsCount" => "Кол-во квартир",
        "Reset" => "Очистить",
        "ShowResults" => "Показать варианты",
        "AdditionalFilters" => "Дополнительные фильтры",
        "PropertyTypeTitle" => "Тип жилища",
        "GuestsAndRoomsCountTitle" => "Количество гостей и комнат",
        "Amenities" => "Удобства",
        "Rules" => "Правила жилища",
        "InstantBookingFilter" => "⚡ Мгновенная бронь",
        "MaxGuests" => "Максимум гостей",
        "Bedrooms" => "Спален",
        "Bathrooms" => "Ванных комнат",
        "FromCenterKm" => "км. от центра",
        "FromCenterMetr" => "метр. от центра",
        "RequestProperty" => "Запросить ",
        "PerNight" => "за ночь",
        "SelfCheckIn" => "Самостоятельное заселение",
        "Remember" => "Запомнить"

    );

    static $LngDisplay = array(
        "Remember" => "Запомнить",
        "Area" => "Площадь",
        "Guests" => "гостей",
        "Bedrooms" => "спален",
        "Bathrooms" => "ванных",
        "Floor" => "этаж",
        "Share" => "Поделиться",
        "Send" => "Отправить",
        "SleepPlaces" => "Спальные места",
        "Bedroom" => "Спальня",
        "Room" => "Комната",
        "ToRemember" => "Что нужно помнить",
        "Arrive" => "Заезд",
        "Departure" => "Выезд",
        "FreeCancel" => "Бесплатная отмена до ",
        "Amenities" => "Удобства",
        "Rules" => "Правила дома",
        "ShowMore" => "смотреть все ",
        "Hide" => "скрыть",
        "ReadMore" => "Читать полностью",
        "Description" => "Описание",
        "Information" => "Информация",
        "Payment" => "Оплата",
        "Night" => " ноч. ",
        "Commission" => "Комиссия",
        "Total" => "Итого",
        "GoToPay" => "Перейти к оплате",
        "CleaningPrice" => "Плата за уборку",
        "AccExist" => "Есть аккаунт?",
        "Name" => "Имя",
        "Phone" => "Номер",
        "PhoneCode" => "Код",
        "Notifications" => "Как вы хотите получать уведомления?",
        "Pay" => "Оплатить",
        "Back" => "Назад",
        "Details" => "Подробнее",
        "PerNight" => "за ночь",
        "Step" => "Шаг",
        "Book" => "Забронировать",
        "Reviews" => "Отзывы"
    );

    static $LngEventTypes = array(
        0 => array("Booking"),
        1 => array("Fees")
    );

    static $LngDataTable = [
        "Show" => "Показывать",
        "TypeSearch" => "Введите текст",
        "of" => "из",
        "prev" => "пред.",
        "next" => "след.",
        "NoRecordsFound" => "Записи отсутствуют",
        "First" => "Первая",
        "Last" => "Последняя"
    ];

    static $LngCabinetTransactions = [
        "From" => "От",
        "To" => "Кому",
        "Amount" => "Сумма",
        "Date" => "Дата",
        "Status" => "Статус",
        "ID" => "# ID",
        "Archive" => "Архивировать",
        "Invoice" => "Счет-Фактура",
        "Show" => "Показывать",
        "TypeSearch" => "Введите текст",
        "of" => "из",
        "prev" => "пред.",
        "next" => "след.",
        "NoRecordsFound" => "Записи отсутствуют",
        "First" => "Первая",
        "Last" => "Последняя",
        "Transactions" => "Транзакции"
    ];


    static $LngCabinetRequests = [
        "Property" => "Жилище",
        "User" => "Пользователь",
        "Amount" => "Сумма",
        "DateFrom" => "Дата начала",
        "DateTo" => "Дата окончания",
        "Status" => "Статус",
        "ID" => "# ID",
        "Confirm" => "Подтвердить",
        "Reject" => "Отклонить",
        "Verified" => "Проверен",
        "TypeSearch" => "Введите текст",
        "of" => "из",
        "prev" => "пред.",
        "next" => "след.",
        "NoRecordsFound" => "Записи отсутствуют",
        "NewRequests" => "Новые запросы на резервацию",
        "ArchiveRequests" => "Архив запросов на резервацию",
        "Last" => "Последняя",
        "Confirmed" => "Подтверждено",
        "Rejected" => "Отклонено",
        "Operation" => "Действия"
    ];

    static $LngCabinetBalance = [
        "Payments" => "Финансы",
        "AvailableBalance" => "Доступный баланс",
        "EWallets" => "Ваши электронные кошельки",
        "Wallet" => "Кошелек",
        "Withdraw" => "Снять со счета",
        "FiatAccounts" => "Фиатные счета",
        "AddNewWallet" => "Добавить новый кошелек",
        "WalletInfo" => "Добавьте дополнительные кошельки в ваш аккаунт и ведите их по-отдельности.",
        "SureDelete" => "Вы уверены что хотите удалить этот счет?",
        "Close" => "Закрыть",
        "Delete" => "Удалить",
        "Save" => "Сохранить",
        "Confirm" => "Подтвердить",
        "Address" => "Адрес",
        "AccCurr" => "Валюта счета"
    ];

     static $LngCabinetReservations = [
        "Reservations" => "Резервации",
        "TypeText" => "Введите текст",
        "Show" => "Показать",
        "ID" => "ID",
        "Description" => "Описание",
        "DateFrom" => "Дата начала",
        "DateTo" => "Дата окончания",
        "Price" => "Цена",
        "Image" => "Фото",
        "Address" => "Адрес",
        "NoDataAvailable" => "Данные в таблице отсутствуют",
        "NoRecordsFound" => "Записи отсутствуют"
    ];

    static $LngCabinetListings = [
        "HousingControl" => "Управление жильем",
        "Edit" => "Редактировать",
        "Delete" => "Удалить",
        "ChangeStatus" => "Изменить статус",
        "Status" => "Статус вашей квартиры",
        "Active" => "Активно",
        "Inactive" => "Не активно",
        "SureDelete" => "Вы уверены что хотите удалить: ",
        "Close" => "Закрыть",
        "Save" => "Сохранить"
    ];

    static $LngCabinetSubscriptions = [
        "SystemIntegration" => "Интеграции систем",
        "Version" => "Версия: ",
        "Status" => "Статус: "
    ];

    static $LngCabinetProfile = [ 
        "AccSettings" => "Настройки аккаунта",
        "UploadCredentials" => "Пожалуйста предоставьте удостоверение личности для аккаунта" ,
        "Profile" => "Мой профиль",
        "PersonalInformation" => "Личные данные",
        "Name" => "Имя",
        "Surname" => "Фамилия",
        "DisplayName" => "Отображаемое имя",
        "BirthDate" => "Дата рождения",
        "Address" => "Адрес",
        "Country" => "Страна",
        "City" => "Город",
        "Street" => "Улица",
        "Building" => "Здание",
        "Appartment" => "Квартира",
        "ZIP" => "Почтовый индекс",
        "Edit" => "Редактировать",
        "Save" => "Сохранить",
        "Cancel" => "Отмена",
        "SecuritySettings" => "Параметры безопасности",
        "SecurityInformation" => "Информация о безопасности",
        "Email" => "Электронная почта",
        "Phone" => "Номер телефона",
        "ChangePhone" => "Сменить номер",
        "InsertNewPhone" => "Введите ваш новый номер телефона",
        "Code" => "Код",
        "Phone" => "Номер телефона",
        "Current" => "Текущий номер телефона: ",
        "Close" => "Закрыть",
        "Confirm" => "Подтвердить",
        "Password" => "Пароль",
        "ChangePassword" => "Сменить пароль",
        "OldPassword" => "Старый пароль",
        "NewPassword" => "Новый пароль",
        "ConfirmNewPassword" => "Подтвердите новый пароль",
        "Credentials" => "Документы",
        "Passport" => "Паспорт",
        "GovernmentID" => "Государственный ID",
        "AvoidDelays" => "Чтобы избежать задержки при проверке Вашей учетной записи, пожалуйста обратите внимание на следующее:",
        "NotExpired" => "Срок действия выбранного документа не должен быть истекшим.",
        "GoodAndClear" => "Документ должен быть в хорошем состоянии (не поврежден) и отчетливо виден.",
        "NoLightGlare" => "Убедитесь, что на карте нет бликов.",
        "UploadHere" => "Загрузите Ваши файлы сюда",
        "Upload" => "Загрузить",
        "Delete" => "Удалить",
        "FrontSide" => "Нажмите, чтобы загрузить лицевую сторону документа",
        "BackSide" => "Нажмите, чтобы загрузить обратную сторону документа",
        "TermsAndPrivacy" => 'Я прочитал(а) и согласен(на) с <a href="https://help.rentxx.com/en/company/terms" style="text-decoration: underline;">Условиями предоставления услуг</a> и <a href="https://help.rentxx.com/en/host/rules-and-your-safety" style="text-decoration: underline;">Политикой конфиденциальности</a>.',
        "CorrectPersonalInfo" => "Вся введенная Мной Личная Информация верна.",
        "SubmitVerify" => "Отправить на проверку",
        "SureDelete" => "Вы уверены что хотите удалить данные?"
   ];
        
    static $LngPageTerms = [ 
        "SimpleSteps" => "Пара простых шагов и Вы начнете сдавать жилье на Rentxx",
        "5Minutes" => 'Весь процесс займет около <span class="text-bold">5 минут</span>. Перед тем как начать Вы должны ознакомиться с <a href="https://help.rentxx.com/ru/company/terms" target="_blank">пользовательским соглашением</a>.',
        "ReadAndAgree" => "Я ОЗНАКОМИЛСЯ(АСЬ) И СОГЛАСЕН(НА)",
        "GoBack" => "ВЕРНУТЬСЯ НАЗАД"
   ];

    static $LngPageComplete = [ 
        "SuccessAdd" => "Ваше жилье успешно добавлено!... Что дальше?",
        "EmailSent" => 'Мы проверим Ваше обьявление в течении <span class="text-bold">24 часов</span>. Вы получите электронное письмо на <span class="text-bold email"></span>, как только объявление станет активным.',
        "GoHostCabinet" => "ПЕРЕЙТИ В КАБИНЕТ",
        "Close" => "Закрыть"
   ];
   
    static $LngPageEmailSent = [
        "MessageSent" => "Проверьте электронную почту. Мы выслали Вам сообщение."
   ];

        
}

Class RU Extends Language {

    public function Import($__import) {

        if(is_array($__import)) {

            $output = array();
            foreach($__import as $k => $v) {
                $output[$v] = parent::$$v;
            }

            return $output;
        } else {
        return parent::$$__import;
        }
    }

}

?>
