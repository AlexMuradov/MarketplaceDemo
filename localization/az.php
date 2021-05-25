<?php

Namespace Localization;

Class Language {

    static $LngTitles = [
        "home" => "Ani əmlak - Rentxx",
        "property/search" => "Axtarış - Rentxx",
        "property/display" => "- Rentxx",
        "property/add" => "Mülkiyyətinizi əlavə edin - Rentxx",
        "auth/verify" => "Təhlükəsizlik kodunun doğrulanması - Rentxx",
        "auth/signin" => "Giriş - Rentxx",
        "auth/registration" => "Yeni hesab - Rentxx",
        "page/Terms" => "Условия соглашения - Rentxx",
        "page/complete" => "",
        "page/emailsent" => "",
        "cabinet/subscriptions" => ""
    ];

    static $LngHomepageHeader = [
        ['Ani sifariş.', 'Tez təsdiqləmə.', 'Rahat sifariş.'],
        ['Doğrulanmış mənzillər.', 'Vasitəçi yoxdur.', '24 / 7 Dəstək. '],
        ['Kartla ödəmə.', 'Əlavə ödənişsiz%.', 'Gizli komissiya yoxdur.', 'VISA / MasterCard.']
    ];

    static $LngHome = array(
        "LoginSuccess" => "Uğurla daxil olmusunuz.",
        "LoginFail" => "Giriş uğursuz oldu, səhv istifadəçi adı və ya şifrə.",
        "InstantBooking" => "Dərhal mənzil sifarişi",
        "Close" => "Bağla",
        "LoadNow" => "İndi yüklə",
        "OnlinePayment" => "Onlayn ödəmə",
        "CatalogTotal" => "Kataloqda qalacaq 3842 yer",
        "City" => "Şəhər",
        "Arrival" => "Giriş",
        "Departure" => "Baxın",
        "ArrivalDeparture" => "Giriş - Giriş",
        "Quests" => "Qonaqlar",
        "Person" => "person",
        "Persons" => "şəxslər",
        "Adults" => "Yetkinlər",
        "v13yo" => "13 yaşından",
        "Children" => "Uşaqlar",
        "v12yo" => "12 yaşa qədər",
        "Baby" => "Körpələr",
        "v3yo" => "3 yaşa qədər",
        "HeadAddApt" => "əmlak əlavə et",
        "HeadEnter" => "Giriş",
        "HeadProfile" => "profilim <span class = \" n_round \"> </span>",
        "Search" => "AXTAR",
        "RecentViewed" => "Son baxılanlar",
        "InstantBookingButton" => "ANI BAKIŞ",
        "TopBaku" => "Bakıda ən yaxşı təkliflər",
        "AllProperty" => "BÜTÜN ƏMLAK",
        "Registration" => "Qeydiyyat",
        "HowtoConnect" => "Xidmətə necə qoşulmaq olar",
        "v2min" => "(2 dəq)",
        "RegHintText" => "Reg mətni Reg mətni Reg",
        "AddPropHint" => "appt mətn əlavə et",
        "AddAptTitle" => "mənzilinizi yerləşdirin",
        "v6min" => "(6 dəq)",
        "GetMoneyHintTitle" => "pul almaq",
        "Instant" => "(ani)",
        "CompanySlogan" => "Onlayn ödəniş istifadə edərək komissiyasız ani mənzil sifarişi <br>",
        "GetMoneyHint" => "pul mətni əldə etmək",
        "Getmails" => "Bildirişləri poçtla əldə edin",
        "OnlyFreeProperties" => "Yalnız pulsuz xüsusiyyətlər",
        "Where" => "Hara?",
        "Nearby" => "Yaxınlıqda yaşayış yeri tapın"
    );

    static $PropertyRulesList = array(
        1 => array("Pet friendly", 1),
        2 => array("No parties and events", 1),
        3 => array("No smoking", 0),
        4 => array("Kid friendly",0),
        5 => array("Walking in shoes is allowed",1)
    );

    static $LngPropertyType = array(
        1 => "Apartment",
        2 => "House",
        3 => "Cottage/Villa",
        4 => "Hotel"
    );

    static $LngBedType = array(
        1 => array("Double(large)", "King", "double_bed"),
        2 => array("Double", "Queen", "double_bed"),
        3 => array("Single", "Single", "bed_min"),
        4 => array("Sofa", "Sofa", "sofa")
    );

    static $LngRules = array(
        1 => array("Kids<br> ages 2-12 years are allowed", "children", "Kids<br> ages 2-12 years are not allowed", 0),
        2 => array("Kids<br> under age 2 are allowed", "infant", "Kids under age 2 are not allowed", 0),
        3 => array("Pet friendly", "pets", "No pets allowed", 0),
        4 => array("Smoke friendly", "smoking", "No smoking", 0),
        5 => array("Party friendly", "party", "No parties and events", 0),
        6 => array("Walking in shoes is allowed", "shoes", "No shoes inside", 0),
        7 => array("Stair climbing is necessary", "stairs", "Stair climbing is not necessary", 2),
        8 => array("Potential for noise", "noise", "Potential for noise", 0),
        9 => array("Pets living on property", "petsLive", "No pets living on property", 2),
        10 => array("Parking on premises", "parking", "No parking", 0),
    );

    static $LngAmenities = array(
        1 => array("Essentials (soap, bath towels)", "essentials"),
        2 => array("WI-FI", "wifi"),
        3 => array("Television", "tv"),
        4 => array("Air conditioner", "aircon"),
        5 => array("Front door", "privateEntrance"),
        6 => array("Hair dryer ", "driyer"),
        7 => array("Breakfast, tea, coffee", "breakfast"),
        8 => array("Workspace", "desk"),
        9 => array("Washing machine", "washingMachine"),
        10=> array("Smoke detector", "smokeDetector"),
        11=> array("First aid kit", "aidKit")
    );

    static $LngPayment = array(
        "AcceptRules" => "House rules",
        "IdentifyGuest" => "Who arrives?",
        "ConfirmAndPay" => "Confirmation and payment",
        "Step1of3" => "step 1 of 3",
        "Step2of3" => "step 2 of 3",
        "Step2of3" => "step 3 of 3",
        "Nights5" => "nights",
        "Nights2" => "nights",
        "Nights1" => "nights",
        "Review1" => "review",
        "Review2" => "review",
        "Review5" => "review",
        "LeaveReview" => "Leave a review",
        "Discount" => "Discount",
        "WeekDay1" => "Monday",
        "WeekDay2" => "Tuesday",
        "WeekDay3" => "Wednesday",
        "WeekDay4" => "Thursday",
        "WeekDay5" => "Friday",
        "WeekDay6" => "Saturday",
        "WeekDay0" => "Sunday",
        "Month1" => "january",
        "Month2" => "february",
        "Month3" => "march",
        "Month4" => "april",
        "Month5" => "may",
        "Month6" => "june",
        "Month7" => "july",
        "Month8" => "august",
        "Month9" => "september",
        "Month10" => "october",
        "Month11" => "november",
        "Month12" => "december",
        "Total" => "TOTAL",
        "CancellationTitle" => "Free cancellation until",
        "CancellationText" => "If canceled up to 14 days prior to arrival, you will receive a full refund. <a ref=\"#\" class=\"more-link\">Подробнее</a>",
        "ArrivalAt" => "Check in at",
        "DepartureAt" => "Check out at",
        "After" => "after",
        "Before" => "before",
        "CheckIn2" => "Self check in — Smart safe",
        "CheckIn3" => "Self check in — Without keys, using a pin code",
        "CheckIn1" => "Check in by host upon meeting",
        "RememberWhat" => "things to remember",
        "RegistrationWrongCode" => "Invalid authentication code.",
        "AcceptAndProceed" => "ACCEPT AND CONTINUE",
        "GreatPrice" => "Great price guarantee",
        "BestPriceText" => "Prices on our service are much lower than on other systems"
        
    );

    static $LngRegistration = array(
        "Title" => "Qeydiyyat",
        "LoginInvalidEmail" => "Bu yeni bir dəyişəndir",
        "LoginWrongDetails" => "Bu yeni dəyişəndir 2",
        "LoginShortPassword" => "Bu səhv 2",
        "RegistrationSuccess" => "Uğurla qeydiyyatdan keçdiniz.",
        "RegistrationFail" => "Qeydiyyat xətası.",
        "RegistrationEmailExists" => "Yanlış e-poçt ünvanı.",
        "RegistrationWrongNumber" => "Yanlış nömrə formatı",
        "RegistrationShortNumber" => "Sayı çox qısadır",
        "RegistrationNumberExists" => "Bu nömrə artıq qeydiyyatdan keçib, daxil olun və ya <a href=\"#\" class=\"error-link\"> parolunuzu bərpa edin </a>",
        "RegistrationInvalidEmail" => "Yanlış e-poçt ünvanı.",
        "RegistrationShortPassword" => "Minimum parol uzunluğu 6 simvoldur.",
        "RegistrationWrongCode" => "Yanlış identifikasiya kodu.",
        "Country" => "Ölkə"
    );

    static $LngRegistration_Sms_Verification = array(
        "VerificationSuccess" => "You have successfully verified your phone number.",
        "IncorrectCode" => "Verification code is invalid.",
        "VerificationFail" => "Verification failed. Internal error, try to recreate account.",
    );

    static $LngPersonalInfo = array(
        "Title" => "Personal information",
        "FirstNameLabel" => "Name",
        "FirstNameInput" => "Enter your name",
        "LastNameLabel" => "Surname",
        "LastNameInput" => "Enter your surname",
        "GenderLabel" => "Gender",
        "GenderPicker" => "Choose gender",
        "GenderMale" => "Male",
        "GenderFemale" => "Female",
        "PhoneLabel" => "Phone",
        "PhoneInput" => "Enter your phone number",
        "EmailLabel" => "E-mail",
        "EmailInput" => "Enter your E-mail",
        "BirthDateLabel" => "Date of birth",
        "CountryLabel" => "Country",
        "CityLabel" => "City",
        "StreetLabel" => "Street",
        "AppartmentLabel" => "Apartment",
        "BuildingLabel" => "House",
        "ZipLabel" => "ZIP code",
        "PassportIDLabel" => "Passport ID",
        "PassportFront" => "Passport (front side)",
        "PassportBack" => "Passport (back side)",
        "SaveBtn" => "Save",
        "EditBtn" => "Edit",
        "VerifyPhoneBtn" => "Confirm number ",
        "VerifyModalTitle" => "Verification",
        "VerifyModalDescription" => "We have sent a verification code to Your phone",
        "VerifyBtn" => "Verify",
        "VerifyEmailBtn" => "Confirm E-mail ",
        "CloseModal" => "Close",
        "UnderReview" => "Pending",
        "NotConfirmedTitle" => "Personal data is not confirmed",
        "NotConfirmedText" => "Confirm your number and passport ID to access all functions of the service"

    );

    static $LngLogin = array(
        "InvalidLoginOrPassword" => "Yanlış istifadəçi adı və ya parol.",
        "LoginTitle" => "Daxil ol",
        "Email" => "Email",
        "Passwd" => "Şifrə",
        "Restore" => "Şifrəni unutmusunuz?",
        "QuestionNew" => "Yeni istifadəçi?",
        "CreateAccount" => "İstifadəçi yaradın",
        "Or" => "və ya",
        "GoogleAuth" => "Google ilə daxil olun"
    );

    static $LngAddDocs = array(
        "Title" => "Какой-то текст",
        "ValidBefore" => "Valid before:",
        "DocType" => "Document type",
        "ImageFront" => "Front side.",
        "ImageBack" => "Back side.",
        "SubmitBtn" => "Submit",
        "TabToUpload" => "Tap to upload",
        "CloseModal" => "Close"
    );

    static $LngReservations = array(
        "NewRequestsTitle" => "New requests",
        "NewRequestsDescription" => "New requests need to be resolved",
        "HistoryRequestsTitle" => "History",
        "HistoryRequestsDescription" => "History of all .....",
        "SenderInfo" => "Sender",
        "Dates" => "Dates",
        "Operation" => "Operations",
        "Status" => "Status",
        "ModalConfirmTitle" => "Confirmation",
        "ModalConfirmDescription" => "Are you sure you want to confirm your request?",
        "ModalRefuseTitle" => "Refusal",
        "ModalRefuseDescription" => "Are you sure you want to refuse the request?",
        "Ok" => "Ok",
        "Cancel" => "Cancel"
    );

    static $LngCountry = array(
        1 => array("1", "Azerbaijan", "+994", "AZE"),
        2 => array("2", "Luxembourg", "+352", "LUX"),
        3 => array("3", "USA", "+1", "USA")
    );

    static $LngCity = array(
        1 => array("1", "Baku", "1", "40.36776393551758", "49.83890354633332"),
        2 => array("2", "Gabala", "1", "40.98099960933604", "47.847518920898445"),
        3 => array("3", "Luxembourg", "2", "49.609959111453364", "6.129662990570069"),
        4 => array("4", "Washington", "3", "38.89437302694247", "-77.03681945800783")
    );

    static $LngTotalRating = array(
        1 => "Terrible",
        2 => "Bad",
        3 => "Medium",
        4 => "Good",
        5 => "Excellent",
        6 => "Perfect",
        7 => "No rating yet"
    );

    static $LngBeforeArrive = array(
        1 => array("0", "On the same day"),
        2 => array("1", "1 day"),
        3 => array("2", "2 days"),
        4 => array("3", "3 days"),
        5 => array("7", "7 days"),
    );

    static $LngArriveTime = array(
        1 => array("1", "Flexible"),
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
        1 => array("30", "For month"),
        2 => array("60", "For 2 months"),
        3 => array("90", "For 3 months")
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
        1 => array("Paid", "Paid"),
        2 => array("NotPaid", "Not paid"),
        3 => array("Pending", "Pending"),
        4 => array("PaymentDeclined", "Declined"),
        5 => array("Cancelled", "Cancelled")
    );

    static $LngCabinet = array(
    1 => array("Paid", "Paid"),
    2 => array("NotPaid", "Not paid"),
    3 => array("Pending", "Pending"),
    4 => array("PaymentDeclined", "Payment declined"),
    5 => array("Cancelled", "Reservation canacelled")
    );

    static $LngAddProperty = array(
        "TIP" => "Tip",
        "PropertyTypeTitle" => "What kind of property do you want to rent?",
        "PropertyTypePlaceholder" => "Choose the property type",
        "PropertyDescription" => "Enter the property description",
        "EntirePlaceTitle" => "Entire place",
        "EntirePlaceDescription" => "Guests have the entire place to themselves. Kitchen, bedroom and bathroom are included",
        "PrivateRoomTitle" => "Private room",
        "PrivateRoomDescription" => "Guests are offered a private room. Other spaces can be shared.",
        "SharedRoomTitle" => "Shared room",
        "SharedRoomDescription" => "Guests can share the space with other guests",
        "GuestsAccommodateTitle" => "How many guests can your space accommodate?",
        "MaxGuests" => "Guests maximum",
        "BedroomsCount" => "Bedrooms",
        "BathCount" => "Bathrooms",
        "SleepingArrangementTitle" => "Sleeping arrangements",
        "Bedroom" => "Bedroom",
        "DoubleKing" => "Double(King)",
        "DoubleQueen" => "Double(Queen)",
        "Single" => "Single",
        "Sofa" => "Sofa",
        "CommonSpace" => "Common space",
        "PalceLocationTitle" => "Address of space",
        "PalceLocationDescription" => "Type the address and indicate the location on the map",
        "Country" => "Country",
        "City" => "City",
        "Street" => "Street",
        "Appartment" => "House, appart.(optional)",
        "Zip" => "ZIP code",
        "Area" => "Area sq.m",
        "CurrentFloor" => "Current floor",
        "TotalFloors" => "Total floors",
        "MapTitle" => "Indicate the location on the map",
        "MapDescription" => "Location on the map will allow guests to find your property faster",
        "ReviewRequirements" => "Review your guest requirements",
        "ReviewRequirementsDescr" => "Guests can only book without sending a request if they meet all your requirements.",
        "RentxxRequirements" => "All Rentxx guests must provide:",
        "EmailAddress" => "Email address",
        "ConfirmedPhoneNumber" => "Confirmed phone number",
        "PaymentInformation" => "Payment information",
        "MessageAboutGuestTrip" => "A message about the guest’s trip",
        "Check-inTimeForLastMinute" => "Check-in time for last minute trips",
        "Government-issuedIDSubmittedToRentxx" => "Government-issued ID submitted to Rentxx",
        "MoreRequirementsCanMeanFewerReservations" => "More requirements for guests can mean fewer reservations for you.",
        "AmenitiesTitle" => "What amenities are included to your property?",
        "QuestRequirementsTitle" => "Check out the accommodation conditions for guests",
        "QuestRequirementsDescription" => "Description of this page....",
        "Email" => "E-mail address",
        "Phone" => "Verified phone number",
        "Message" => "A message about the guest’s trip",
        "CheckIn" => "Check-in time for last minute trips",
        "ID" => "ID verification",
        "HomeRulesTitle" => "Specify house rules",
        "children" => "Kids ages 2-12 years are allowed",
        "infant" =>"Kids under age 2 are allowed",
        "pets" => "Pet friendly",
        "smoking" => "Smoke friendly",
        "party" => "Party friendly", 
        "shoes" => "No shoes inside", 
        "stairs" => "Stair climbing is necessary",
        "noise" => "Potential for noise",
        "petsLive" => "Pets living on property", 
        "parking" => "Parking on premises",
        "RequestWindowTitle" => "How much notice do you need before a guest arrives?",
        "RequestWindowTip" => "2 days' notice can help you organize your hosting, but you can miss out...",
        "DaysCount" => "Amount of days",
        "Period" => "Period",
        "From" => "From",
        "To" => "To",
        "RequirementsReviewTitle" => "Review your guest requirements",
        "CheckInTime" => "Specify guests’ check-in and check-out time", 
        "AdvanceTimeTitle" => "How far in advance can guests book?",
        "AdvanceTimeTip" => "Avoid canceling or declining guests by only unblocking dates you can host?",
        "StayTimeTitle" => "How long guests can stay?",
        "MinNights" => "Minimum amount of nights",
        "MaxNights" => "Maximum amounts of nights",
        "ReservationMethod" => "Reservation method",
        "InstantBooking" => "Instant booking",
        "ManualApprove" => "Confirm reservations yourself",
        "BlockCalendarTitle" => "You can specify blocked dates on your calendar",
        "UpdateCalendarBtn" => "Update calendar",
        "RECOMMENDED" => "RECOMMENDED",
        "PriceSpaceTitle" => "Price your space",
        "IncreaseChancesTitle" => "Increase your chances of booking of your property",
        "IncreaseChancesDescription" => "Set up Intelegent Pricing to automatically keep your nightly prices competitive as demand in your area changes.",
        "HowToSetYourPriceTitle" => "How do you want to set your price?",
        "HowToSetYourPriceDescription" => "You’re always in control of your nightly price. By continuing, you agree to turn on Intelegent Pricing. You can change this later in settings.",
        "IntellegentPricing" => "Intelligent pricing",
        "IntellegentPricingDesciption" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
        "FixedPrice" => "Fixed price",
        "FixedPriceDesciption" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt",
        "Currency" => "Currency",
        "BasePrice" => "Base price",
        "BasePriceDescription" => "This price will be the base price for your accommodation in case you turn off adaptive pricing",
        "MinimumPrice" => "Minimum price",
        "MinimumPriceDescription" => "Prices for accommodation will drop during periods when the demand for your space is low. Set the minimum price that suits you",
        "MaximumPrice" => "Maximum price",
        "MaximumPriceDescription" => "When demand for your space is high or when your city hosts бла бла бла...",
        "SomethingSpecialForQuests" => "Something special for your guests",
        "Off20" => "20% discount for first guests",
        "OffDescription20" => "First 3 guests will receive a 20% discount. You can get 3 reviews and attract new guests",
        "DontAddOffer" => "Refuse special discounts",
        "DontAddOfferDescription" => "You will not be able to use this offer after publication",
        "LearnMore" => "Learn more",
        "LengthOfStayPrices" => "Discounts for long-term stays",
        "LengthOfStayPricesDescription" => " Encourage guests for long-term stays ",
        "WeeklyDiscount" => "Discount for a week",
        "WeeklyDiscountDescription" => "Travelers often search by price. To help increase your chances of getting weekly stays, try setting a discount.",
        "MounthlyDiscount" => "Discount for month",
        "MounthlyDiscountDescription" => "Travelers often search by price. To help increase your chances of getting monthly stays, try setting a discount.",
        "AddFilesTitle" => "You are almost done we need few more details",
        "AddFilesDescription" => "Drag and drop your listing\'s best pictures to impress visitors. Use at least 5 high resolution photos and give complete picture of your property.",
        "DragFilesToUpload" => "Photos",
        "FinishBtn" => "Finish",
        "NextBtn" => "Next",
        "BackBtn" => "Go back",
        "Delete" => "Delete",
        "MakeMain" => "Make the main"
    );

    static $LngReviews = array(
        "Title" => "Review",
        "ReviewsDesc" => "Leave a short review for helping other users to find house they are looking for",
        "Cleanness" => "Cleanliness",
        "Location" => "Location",
        "Price" => "Price",
        "Communication" => "Communication",
        "WhatYouLiked" => "What you’ve liked?",
        "WhatYouNotLiked" => "What didn't you like?",
        "Save" => "Save",
        "TitleCompletedReview" => "Thank you for your feedback!",
        "ThanksText" => "Your review will be published after being approved. You got 5% discount on your next booking!",
        "GoBack" => "Go back"
    );

    static $LngMessages = array(
        "TitleMyMessages" => "My messages"
    );

    static $LngProperty = array(
        "MainTitle" => "Modern and spacious apartment in the city center",
        "AllPhotos" => "ALL PHOTOS",
        "Save" => "Save",
        "Charasteristics" => "Features",
        "SleepingArangement" => "Sleeping arrangements",
        "Description" => "DESCRIPTION",
        "Amentities" => "AMENITIES",
        "ShawAllAmenities" => "Show all amenities",
        "WhatToRemember" => "Things to remember",
        "Arrive" => "Check in",
        "Leave" => "Check out",
        "Rules" => "HOUSE RULES",
        "CancelationRules" => "CANCELLATION POLICY FROM THE HOST",
        "Location" => "LOCATION",
        "Availability" => "AVAILABILITY",
        "Reviews" => "REVIEWS",
        "Host" => "Host",
        "Approved" => "Approved",
        "Languages" => "Languages", 
        "EpreriencedHost" => "Experienced host",
        "EpreriencedHostDescription" => "Experienced hosts with high ratings who provide guests comfort",
        "AnswerFreguency" => "Response frequency", 
        "AnswerTime" => "Response time:",
        "SimilarOffers" => "Similar offers",
        "InstantBooking" => "Instant booking",
        "Rare" => "Rare finding",
        
        "ForWeek" => "for week",
        "ForMonth" => "for month",
        "ArrivalAndLeft" => "Check in and check out",
        "Guests" => "Guests",
        "Sum" => "TOTAL",
        "Area" => "Area",
        "Room" => "Rooms",
        "BathRooms" => "Bathrooms:",
        "AllRooms" => "-room",
        "MaxGuests" => "Guests maximum:",
        "SqM" => "Sq.m",
        "Bedroom" => "Bedroom",
        "MinNights" => "Nights minimum:"
    );

    static $LngRating = array(
        "Communication" => "Communication",
        "Cleanliness" => "Cleanliness",
        "Location" => "Location",
        "Price" =>"Price/quality",
        "Accuracy" => "Accuracy"
    );

    static $LngMonth = array(
        0 => array("January"),
        1 => array("February"),
        2 => array("March"),
        3 => array("April"),
        4 => array("May"),
        5 => array("June"),
        6 => array("July"),
        7 => array("August"),
        8 => array("September"),
        9 => array("October"),
        10 => array("November"),
        11 => array("December")
    );

    static $LngFooter = array(
        "Company" => "Company",
        "About" => "About",
        "Invest" => "To investors",
        "Partnership" => "Partnership",
        "Careers" => "Careers",
        "Contacts" => "Contacts",
        "Host" => "Host",
        "HostHome" => "Host your property",
        "HostRules" => "Hosting rules",
        "HostPayMethod" => "Online payment",
        "RulesAndSafety" => "Rules and your safety",
        "HostCapsa" => "System CAPSA<sup>&reg;</sup>",
        "Support" => "Support",
        "ForGuests" => "For guests",
        "BookGuarantee" => "Booking guarantee",
        "PayMethods" => "Payments methods",
        "HowToBook" => "How to book",
        "KnowBase" => "Knowledge base",
        "ReportAbuse" => "Report a violation",
        "PilotReview" => "Trustpilot reviews",
        "CopyrightFooter" => "© 2021 Rentxx, Inc. All rights reserved",
        "MobileVersion" => "Mobile version",
        "Privacy" => "Privacy",
        "Terms" => "Terms",
        "Sitemap" => "Site map",
        "LangCcy" => "Language and Currency",
        "CcyPop" => "Currency",
        "LangPop" => "Language",
        "English" => "English",
        "Russian" => "Русский",
        "Azeri" => "Azerbaijani",
        "Arabian" => "Arabian",
        "SaveChanges" => "SAVE CHANGES",
        "AZN" => "azn",
        "USD" => "usd",
        "RUB" => "rub",
        "EUR" => "eur",
        "CurrentLng" => "English" 
    );

    static $LngSearch = array(
        "Price" => "Price",
        "InstantBooking" => "Instant booking",
        "Instant" => "Instant booking",
        "AllFilters" => "All filters",
        "Sorting" => "Sort by:",
        "ByPopularity" => "By popularity",
        "CheapFirst" => "Cheap first",
        "ExpensiveFirst" => "Expensive first",
        "ByRevirews" => "Based on feedback",
        "FromCenter" => "From the center",
        "SearchByMap" => "Search by map",
        "Save" => "Save",
        "Room1" => "Room",
        "Room2" => "Rooms",
        "Room3" => "Rooms",
        "CheckIn" => "Check in",
        "FilterByPrice" => "Filter by price",
        "ListingsCount" => "Total listing",
        "Reset" => "Clear",
        "ShowResults" => "Show results",
        "AdditionalFilters" => "More filters",
        "PropertyTypeTitle" => "Property type",
        "GuestsAndRoomsCountTitle" => "Number of guests and rooms",
        "Amenities" => "Amenities",
        "Rules" => "House rules",
        "InstantBookingFilter" => "⚡ Instant booking",
        "MaxGuests" => "Max Guests",
        "Bedrooms" => "Bedrooms",
        "Bathrooms" => "Bathrooms",
        "Notifications" => "Notifications",
        "FromCenterKm" => "km from city center",
        "FromCenterMetr" => "metr from city center",
        "PerNight" => "per night",
        "SelfCheckIn" => "Self check in",
        "Remember" => "Remember"
    );

    static $LngEventTypes = array(
        0 => array("Booking"),
        1 => array("Fees")
    );

    static $LngCabinetTransactions = [
        "From" => "From",
        "To" => "To",
        "Amount" => "Amount",
        "Date" => "Date",
        "Status" => "Status",
        "ID" => "# ID",
        "Archive" => "Archive",
        "Invoice" => "Invoice",
        "Show" => "Show",
        "TypeSearch" => "Type the text",
        "of" => "of",
        "prev" => "prev.",
        "next" => "next",
        "NoRecordsFound" => "No records found",
        "First" => "First",
        "Last" => "Last",
        "Transactions" => "Transactions"
    ];
    static $LngDataTable = [
        "Show" => "Show",
        "TypeSearch" => "Type text",
        "of" => "of",
        "prev" => "prev.",
        "next" => "next",
        "NoRecordsFound" => "No records found",
        "First" => "First",
        "Last" => "Last"
    ];

    static $LngCabinetRequests = [
        "Property" => "Property",
        "User" => "User",
        "Amount" => "Amount",
        "DateFrom" => "Date from",
        "DateTo" => "Date to",
        "Status" => "Status",
        "ID" => "# ID",
        "Confirm" => "Confirm",
        "Reject" => "Reject",
        "Verified" => "Verified",
        "TypeSearch" => "Type text",
        "of" => "of",
        "prev" => "prev.",
        "next" => "next.",
        "NoRecordsFound" => "No records found",
        "NewRequests" => "New requests",
        "ArchiveRequests" => "Archive requests",
        "Last" => "Last",
        "Confirmed" => "Confirmed",
        "Rejected" => "Rejected",
        "Operation" => "Operation"
    ];

    static $LngCabinetBalance = [
        "Payments" => "Payments",
        "AvailableBalance" => "Available balance",
        "EWallets" => "Your E-wallets",
        "Wallet" => "Wallet",
        "Withdraw" => "Withdraw",
        "FiatAccounts" => "Fiat accounts",
        "AddNewWallet" => "Add a new wallet",
        "WalletInfo" => "Add more wallets to your account and manage them separetly.",
        "SureDelete" => "Are you sure about deleting this account?",
        "Close" => "Close",
        "Delete" => "Delete",
        "Save" => "Save",
        "Confirm" => "Confirm",
        "Address" => "Address",
        "AccCurr" => "Account currency"
    ];

    static $LngCabinetReservations = [
        "Reservations" => "Reservations",
        "TypeText" => "Type text",
        "Show" => "Show",
        "ID" => "# ID",
        "Description" => "Description",
        "DateFrom" => "Start date",
        "DateTo" => "End date",
        "Price" => "Price",
        "Image" => "Image",
        "Address" => "Address",
        "NoDataAvailable" => "No data available in table",
        "NoRecordsFound" => "No records found"
    ];

    static $LngCabinetListings = [
        "HousingControl" => "Control your listings",
        "Edit" => "Edit",
        "Delete" => "Delete",
        "ChangeStatus" => "Change status",
        "Status" => "Your listing status",
        "Active" => "Active",
        "Inactive" => "Inctive",
        "SureDelete" => "Are you sure about deleting: ",
        "Close" => "Close",
        "Save" => "Save"
    ];

    static $LngCabinetSubscriptions = [
        "SystemIntegration" => "System integration",
        "Version" => "Version: ",
        "Status" => "Status: "
    ];

    static $LngCabinetProfile = [ 
        "AccSettings" => "Account settings",
        "UploadCredentials" => "Please provide your credentials for account" ,
        "Profile" => "My profile",
        "PersonalInformation" => "Personal information",
        "Name" => "Name",
        "Surname" => "Last name",
        "DisplayName" => "Display name",
        "BirthDate" => "Date of birth",
        "Address" => "Address",
        "Country" => "Country",
        "City" => "City",
        "Street" => "Street",
        "Building" => "Building",
        "Apartment" => "Apartment",
        "ZIP" => "ZIP code",
        "Edit" => "Edit",
        "Save" => "Save",
        "Cancel" => "Cancel",
        "SecuritySettings" => "Security settings",
        "SecurityInformation" => "Security information",
        "Email" => "Email",
        "Phone" => "Phone number",
        "ChangePhone" => "Change phone number",
        "InsertNewPhone" => "Insert your new phone number",
        "Code" => "Code",
        "Phone" => "Phone number",
        "Current" => "Current phone: ",
        "Close" => "Close",
        "Confirm" => "Confirm",
        "Password" => "Password",
        "ChangePassword" => "Change your password",
        "OldPassword" => "Old password",
        "NewPassword" => "New password",
        "ConfirmNewPassword" => "Confirm new password",
        "Credentials" => "Credentials",
        "Passport" => "Passport",
        "GovernmentID" => "Government ID",
        "AvoidDelays" => "In order to avoid delays in verifying your account, please observe below:",
        "NotExpired" => "Chosen credential must not be expired.",
        "GoodAndClear" => "Entire document should be in good condition (not damaged) and clearly visible.",
        "NoLightGlare" => "Make sure that there is no light glare on the card.",
        "UploadHere" => "Upload your files here",
        "Upload" => "Upload",
        "Delete" => "Delete",
        "FrontSide" => "Tap to upload front side of your document",
        "BackSide" => "Tap to upload back side of your document",
        "TermsAndPrivacy" => 'I have read and agree to <a href="https://help.rentxx.com/en/company/terms" style="text-decoration: underline;">The Terms Of Service</a> and <a href="https://help.rentxx.com/en/host/rules-and-your-safety" style="text-decoration: underline;">Privacy Policy</a>.',
        "CorrectPersonalInfo" => "All The Personal Information I have entered is correct.",
        "SubmitVerify" => "Submit for verification",
        "SureDelete" => "Are you sure about deleting the data?"
   ];

    static $LngPageTerms = [ 
        "SimpleSteps" => "A couple of simple steps and you'll start renting your place on Rentxx",
        "5Minutes" => 'The entire process takes about <span class="text-bold">5 minutes</span>. It is important to check <a href="https://help.rentxx.com/ru/company/terms" target="_blank">the user agreement</a>, before yo start.',
        "ReadAndAgree" => "I HAVE READ AND AGREE",
        "GoBack" => "GO BACK"
   ];

    static $LngPageComplete = [ 
        "SuccessAdd" => "Your place has been successfully added!... What's next?",
        "EmailSent" => "We'll verify your listing within <span class='text-bold'>24 hours</span>. Email will be sent to <span class='text-bold email'></span> as soon as listing becomes active.",
        "GoHostCabinet" => "GO TO HOSTS'S CABINET",
        "Close" => "Close"
   ];
   
    static $LngPageEmailSent = [
        "MessageSent" => "Check your email. A message was sent to your mailbox."
   ];

}

Class AZ Extends Language {

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
