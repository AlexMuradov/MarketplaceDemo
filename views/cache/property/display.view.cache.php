<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <link rel="shortcut icon" href="/static/v2/img/Xxlogo.ico" type="image/x-icon">
   <link rel="stylesheet" href="/static/css/libs.min.css">
   <link rel="stylesheet" href="/static/css/daterangepicker.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
   <link rel="stylesheet" href="/static/css/ldbtn.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="bootstrap.histogram.slider.css">
   <link rel="stylesheet" href="/static/css/slider.css">
   <link rel="stylesheet" href="/static/v2/css/styles.css">
   <link rel="stylesheet" href="/static/css/main_alt.css">
   <link rel="stylesheet" href="/static/v2/css/toastr.css">
   <link rel="stylesheet" href="/static/v2/css/card.css">
   <link rel="stylesheet" href="/static/v2/css/bk-card-calendar.css">
   <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
   <script src="https://js.stripe.com/v3/"></script>
   <style>
     .leaflet-top .leaflet-control{
       margin-top: 20px;
     }
   </style>
  </head>
  <body class="xx__mob--footer">
   <div id="wrapper" class="xx__mob">
    <header class="header header_v2 header-second-search">
      <div class="container_v2">
        <div class="header__between"><a class="logo" href="/">Xx<span class="logo-span">.</span></a>
          <nav class="header-nav">
            <ul class="menu">
              <li class="menu-item" id="login" style="display: flex;">
                <form action="/<?php echo $lng; ?>/auth.signin" method="POST">
                  <input type="hidden" name="redirect1">
                  <button type="submit" class="link link-sign-in c-dark res_HeadEnter" style="padding: 0;" id="Login_Profile"></button>
                </form>
                <div class="mob_hidden d-flex">
                  <span>/</span>
                  <a class="link link-sign-in c-dark" href="/<?php echo $lng; ?>/auth.registration" id="Login_Profile">
                    <span class="res_Registration"></span>
                  </a>
                </div>  
              </li>
              <li class="menu-item" id="profile">
                <a class="link c-dark relative" href="/<?php echo $lng; ?>/cabinet.profile"> 
                  <img src="/static/v2/img/user-profile.svg" alt="profile">
                  <!-- <span class="counter">6</span> -->
                </a>
              </li>
            </ul>
          </nav>
        </div>
         <div class="xx__mob-toggle">
           <div class="xx__mob-toggle-row">
             <a class="logo" href="/">Xx<span class="logo-span">.</span></a>
           </div>
           <div class="xx__mob_content">
            <div class="xx__mob-toggle-row">
              <input type="text" value="Баку, Азербайджан" class="xx__mob-toggle-input" id="CityID-Mob-toggle">
              <!-- <ul id="cityList" class="dropdown dropdown-city"></ul> -->
            </div>
            <div class="xx__mob-toggle-row">
              <input type="text" value="" class="xx__mob-toggle-input" name="arrivalMob" id="arrivalMob"  readonly placeholder="Заезд">
              <input type="date"  min="" name="arrivalMob" id="arrivalMobDate"> 
              <input type="text" value="" class="xx__mob-toggle-input" name="departureMob" id="departureMob" readonly placeholder="Выезд">
              <input type="date"  min="" name="departureMob" id="departureMobDate">
              <input type="text" value="3 гостей" class="xx__mob-toggle-input input-visitor" id="Guest-mob-toggle" readonly>
              <ul class="dropdown dropdown-guests dropdown-guests-mob active">
                <li class="dropdown-item flex-center-between">
                  <div>
                    <p class="c-dark fw-semi">Взрослые</p>
                    <p class="c-dark_v2 fw-light">от 13 лет</p>
                  </div>
                  <div class="count ">
                    <button type="button" class="btn-count btn-count-minus "></button>
                    <input name="AdultGuestsMob" id="AdultGuestsMob" type="text" class="input-count count__adults" value="2" readonly="">
                    <button type="button" class="btn-count btn-count-plus"></button>
                  </div>
                </li>
                <li class="dropdown-item flex-center-between">
                  <div>
                    <p class="c-dark fw-semi">Дети</p>
                    <p class="c-dark_v2 fw-light">до 12 лет</p>
                  </div>
                <div class="count">
                  <button type="button" class="btn-count btn-count-minus "></button>
                  <input name="ChildGuestsMob" id="ChildGuestsMob" type="text" class="input-count count__children" value="0" readonly="">
                  <button type="button" class="btn-count btn-count-plus"></button>
                </div>
              </li>
              <li class="dropdown-item flex-center-between">
                <div>
                  <p class="c-dark fw-semi">Младенцы</p>
                  <p class="c-dark_v2 fw-light">до 3 лет</p>
                </div>
                <div class="count">
                  <button type="button" class="btn-count btn-count-minus "></button>
                  <input name="BabyGuestsMob" id="BabyGuestsMob" type="text" class="input-count count__baby" value="0" readonly="">
                  <button type="button" class="btn-count btn-count-plus"></button>
                </div>
              </li>
            </ul>
            </div>
            <div class="xx__mob-toggle-row">
              <!-- <input type="text" value="" class="xx__mob-toggle-input" placeholder="Цена"> -->
              <a class="xx__mob-toggle-btn popupToggle">Все фильтры</a>
            </div>
           </div>
         </div>
        </div>
      </header>
    
    <div id="wrapper-content">
     <div class="catalog">
      <div class="catalog-content">
      

     <!-- property card section -->

      <div class="property_card_content">
       <div class="back_to_search">
           <button  class="back_to_search_btn"><img src="/static/v2/img/icons8-arrow-32.png" class="back_to_search_icon" alt=""> Назад к
               поиску</button>
       </div>
      <div class="propety_gallery">
        <div class="pic_section_1 pic_section">
        </div>
        <div class="pic_section_2 pic_section">
        </div>
        <div class="pic_section_3 pic_section">
        </div>
        <div id="myModal" class="modal">
          <div class="modal-content">
            
            
            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <span class="close close_gallery cursor" onclick="closeModal()"></span>
            
          </div>
        </div>
        <div class="pc_price_label_mob"></div>
        <div class="property_card-slider" id="sliderplace">
        </div>
        </div>
        <div class="property_content">
        <div class="property_head">
            <div class="property_head_content">
                <div class="property_card_decription">
                    <div class="property_head_card_title">
                    </div>
                </div>
                <div class="property_head_btn">
                    <button class="share_btn">
                      <img src="/static/v2/img/share.svg" alt=""> 
                      <span class="res_Share"></span>
                    </button>
                    <div id="share_content" class="dropdown dropdown-share">
                      <div class="rectangle">
                        <img src="/static/v2/img/rectangle.svg" alt="">
                      </div>
                      <div class="share_to_email">
                        <input type="email" placeholder="recipient@email.com">
                        <a class="res_Send"></a>
                      </div>
                      <div class="share_by_link">
                        <input type="text" readonly>
                        <a href="#" class="copy_share_link"><img src="/static/v2/img/copy.svg" alt="copy"></a>
                      </div>
                    </div>
                    <button class="like_card_btn"><img src="/static/img/ic-mod-3.svg" class="bottom-like-icon" alt="">
                      <span class="res_Remember"></span>
                    </button>
                    <button class="share_btn_mob">
                      <img src="/static/v2/img/share-mob.svg" alt=""> 
                    </button>
                    <button class="like_card_btn_mob">
                      <img src="/static/img/ic-mod-3.svg" class="bottom-like-icon" alt="">
                    </button>
                </div>
              </div>
              <ul class="property_params"></ul>
        </div>
        <div class="property_description">
            <div class="pd_col">
                <div class="bedrooms">
                    <div class="bedroom_title property_description_title res_SleepPlaces"></div>
                    <div class="pc_content"></div>
                </div>
                <div class="to_remember">
                    <div class="to_remember_title property_description_title res_ToRemember"></div>
                    <div class="pc_content">
                        <div class="pc_content_item">
                            <img src="/static/v2/img/clock-icon.svg" alt="">
                            <div class="to_remember_item_text">
                                <div class="pc_content_item_title res_Arrive"></div>
                                <div class="pc_content_item_text card_arrive"></div>
                            </div>
                        </div>
                        <div class="pc_content_item">
                            <img src="/static/v2/img/clock-icon.svg" alt="">
                            <div class="to_remember_item_text">
                                <div class="pc_content_item_title res_Departure"></div>
                                <div class="pc_content_item_text card_departure"></div>
                            </div>
                        </div>
                        <div class="pc_content_item">
                            <div class="to_remember_item_text">
                                <div class="pc_content_item_title">
                                    
                                </div>
                                <div class="pc_content_item_text free_cancel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="amenities">
                        <div class="amenities_title property_description_title res_Amenities"></div>
                        <div class="pc_content">
                        </div>
                </div>
                <div class="rules">
                    <div class="rules_title property_description_title res_Rules"></div>
                    <div class="pc_content">
                    </div>
                </div>
            </div>
            <div class="pd_col">
              <div class="property_ods">
              </div>
              <div id="map" class="map_property"></div>
              </div>
              <div class="property_reviews">
              </div>
            </div>
            
            <!-- booking block -->
            <div class="booking_container">
              <div class="booking">
                <div class="steps">
                  <ul>
                    <li class="bk_step selected_step_bk res_Information"></li>
                    <li class="bk_step res_Payment"></li>
                    <li class="bk_step res_Arrive"></li>
                  </ul>
                </div>
                <div class="hidden steps_mob">
                  <h1 class="res_Step"><span class="steps_mob_count">1</span> <span class="res_of"></span> 3</h1>
                </div>
                <div class="bk_step_content step_1 active_step">
                  <div class="bk_main_content">
                    <div class="xx_cal_container" id="xx_calendar_container"></div>
                  </div>
                  <footer class="bk_footer">
                    <div class="bk_footer_content">
                      <div class="bk_footer_row night_price">
                        <h1><span class="night_price_nc"></span>х <span class="night_price_np"></span></h1>
                        <h1><span class="night_price_tnp"></span></h1>
                      </div>
                      <div class="bk_footer_row cleaning_price">
                        <p class="res_CleaningPrice"></p>
                        <p><span class="night_price_cp"></span></p>
                      </div>
                      <div class="bk_footer_row commission">
                        <p class="res_Commission"></p>
                        <p><span class="night_price_cmp"></span></p>
                      </div>
                      <div class="bk_footer_row total">
                        <h1 class="res_Total"></h1>
                        <h1><span class="night_price_tp"></span></h1>
                      </div>
                    </div>
                    <div class="bk_footer_1">
                      <div class="bk_free_cancel">
                      </div>
                    </div>
                    <div class="bk_footer_btn">
                      <button class="bk_close_btn res_Back"></button>
                      <button class="bk_step_btn bk_next res_GoToPay"></button>
                    </div>
                    <div class="bk_footer_2">
                      <div class="bk_free_cancel">
                      </div>
                    </div>
                  </footer>
                </div>
                <div class="bk_step_content step_2">
                  <div class="bk_main_content">
                    <div class="account_exist">
                      <p class="res_AccExist"> 
                        <form action="/<?php echo $lng; ?>/auth.signin" method="POST">
                          <input type="hidden" name="redirect">
                          <button type="submit" class="signin_btn res_HeadEnter"></button>
                          <!-- <input type="submit" value="Войти"> -->
                        </form>
                      </p>
                    </div>
                    <div class="bk_step_2_form">
                      <div class="bk_step_2_form_row">
                        <input type="text" class="bk_step_2_name" placeholder="Имя">
                      </div>
                      <div class="bk_step_2_form_row">
                        <input type="email" class="bk_step_2_email" placeholder="E-Mail">
                      </div>
                      <div class="bk_step_2_form_row">
                        <input type="tel" class="bk_step_2_code" placeholder="Код">
                        <input type="number" class="bk_step_2_phone" pattern="\d*" placeholder="Номер">
                      </div>
                    </div>
                    <div class="bk_step_2_notification">
                      <p class="res_Notifications"></p>
                      <div class="bk_step_2_notification_check">
                        <ul>
                          <li class="bk_step_2_list-item"> 
                            <label class="align-items-center"> 
                              <input class="checkbox" type="radio" name="radio-notif" checked=""><span class="check-item"> </span><span class="check-text">SMS</span>
                            </label>
                          </li>
                          <li class="bk_step_2_list-item"> 
                            <label class="align-items-center"> 
                              <input class="checkbox" type="radio" name="radio-notif" checked=""><span class="check-item"> </span><span class="check-text">Telegram</span>
                            </label>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <footer class="bk_footer">
                    <div class="bk_footer_content">
                      <div class="bk_footer_content">
                        <div class="bk_footer_row night_price">
                          <h1><span class="night_price_nc"></span>х <span class="night_price_np"></span></h1>
                          <h1><span class="night_price_tnp"></span></h1>
                        </div>
                        <div class="bk_footer_row cleaning_price">
                          <p class="res_CleaningPrice"></p>
                          <p><span class="night_price_cp"></span></p>
                        </div>
                        <div class="bk_footer_row commission">
                          <p class="res_Commission"></p>
                          <p><span class="night_price_cmp"></span></p>
                        </div>
                        <div class="bk_footer_row total">
                          <h1 class="res_Total"></h1>
                          <h1><span class="night_price_tp"></span></h1>
                        </div>
                      </div>
                    <div class="bk_footer_1">
                      <div class="bk_free_cancel">
                      </div>
                    </div>
                    <div class="bk_footer_btn">
                      <button class="bk_close_btn res_Back"></button>
                      <button class="bk_step_btn res_Pay" id="doPayment"></button>
                    </div>
                    <div class="bk_footer_2">
                      <div class="bk_free_cancel">
                      </div>
                    </div>
                  </footer>
                </div>
                <!-- <div class="bk_step_content step_3">
                  <div class="bk_main_content">
                    <div class="bk_pn_check">
                      <div class="bk_pn_check_info">
                        <p>
                          На номер 
                          <span class="bk_pn"></span>
                          был выслан код верификации.
                          <button class="bk_pn_change_btn">Неверный номер?</button>
                        </p>
                      </div>
                      <div class="bk_pn_wrong hidden">
                        <div class="bk_step_2_form_row">
                          <input type="text" class="bk_step_3_code" placeholder="Код">
                          <input type="number" class="bk_step_3_phone" pattern="\d*" placeholder="Номер">
                        </div>
                      </div>
                      <div class="bk_pn_check_wrong hidden">
                        <p>Неверный код!</p>
                      </div>
                      <div class="bk_pn_check_code">
                        <input type="number" class="bk_pn_check_input" maxlength="1" required placeholder="-">
                        <input type="number" class="bk_pn_check_input" maxlength="1" required placeholder="-">
                        <input type="number" class="bk_pn_check_input" maxlength="1" required placeholder="-">
                        <input type="number" class="bk_pn_check_input" maxlength="1" required placeholder="-">
                      </div>
                      <div class="bk_pn_check_code_resend">
                        <button class="bk_pn_check_code_resend_btn">Послать еще раз</button>
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="bk_step_content step_4">
                  <div class="bk_main_content">
                    <div class="bk_step_content_4_title">
                      Квартира забронирована
                    </div>
                    <div class="bk_step_content_4_descr">
                      На ваш эмаил было выслано письмо с подробностями заселения.
                    </div>
                    <div class="bk_step_content_4_icon">
                      <img src="/static/v2/img/bk_step_3_icon.svg" alt="">
                    </div>
                    <!-- <div class="bk_pn_check">
                      <div class="bk_pn_check_code">
                        <input type="number" class="bk_pn_check_input" required placeholder="Код">
                        <button class="bk_pn_check_code_resend">Послать еще раз</button>
                      </div>
                      <div class="bk_pn_check_info">
                        <p>
                          На номер 
                          <span class="bk_pn"></span>
                          был выслан код верификации.
                          <button class="bk_pn_change_btn">Неверный номер?</button>
                        </p>
                      </div>
                    </div> -->
                    <div class="bk_step_content_4_attention">
                      <div class="bk_step_content_4_attention_title">
                        Внимание!
                      </div>
                      <div class="bk_step_content_4_attention_descr">
                        Владелец данной квартиры требует удостовериние личности для допуска к жилью.
                      </div>
                    </div>
                    <div class="bk_footer_content">
                      <div class="bk_footer_row doc_type">
                        <ul>
                          <li class="bk_step_2_list-item"> 
                            <label class="align-items-center"> 
                              <input class="checkbox" type="radio" name="radio-doc_type" checked=""><span class="check-item"> </span><span class="check-text">Паспорт</span>
                            </label>
                          </li>
                          <li class="bk_step_2_list-item"> 
                            <label class="align-items-center"> 
                              <input class="checkbox" type="radio" name="radio-doc_type" checked=""><span class="check-item"> </span><span class="check-text">Вод. Права</span>
                            </label>
                          </li>
                          <li class="bk_step_2_list-item"> 
                            <label class="align-items-center"> 
                              <input class="checkbox" type="radio" name="radio-doc_type" checked=""><span class="check-item"> </span><span class="check-text">Уд. Личности</span>
                            </label>
                          </li>
                        </ul>
                      </div>
                      <div class="bk_footer_row doc_file">
                        <input type="text" readonly class="w-50" id="bk_doc_front" placeholder="Лицевая сторона">
                        <input type="file" class="hidden" id="bk_doc_front_hidden">
                        <input type="text" readonly class="w-50" id="bk_doc_back" placeholder="Обратная сторона">
                        <input type="file" class="hidden" id="bk_doc_back_hidden">
                      </div>
                      <div class="bk_footer_row doc_type_label">
                        <p>Вы можете загрузить документ позже из <a href="#">личного кабинета</a></p>
                      </div>
                    </div>
                  </div>
                  <footer class="bk_footer">
                    <div class="bk_footer_btn">
                      <button class="bk_close_btn load_doc_btn res_Close" type="submit"></button>
                      <button class="bk_step_btn load_doc_btn res_LoadNow" type="submit"></button>
                    </div>
                  </footer>
                </div>
              </div>
            </div>
        </div>
    </div>
    
    <div class="property_card_footer_mob">
      <div class="pc_footer_back_to_search">
        <button class="bk_close_btn bk_close_btn_mob res_Back"></button>
      </div>
      <div class="pc_footer_book">
        <button class="pc_footer_book_btn res_Book"></button>
      </div>
    </div>


     </div
    <!-- end property card section -->
     
     <div class="xx__mob-map hidden">
      <a href="#!" class="xx__mob-map-btn">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22.6562 12.5C22.6562 6.89111 18.1089 2.34375 12.5 2.34375C6.89111 2.34375 2.34375 6.89111 2.34375 12.5C2.34375 18.1089 6.89111 22.6562 12.5 22.6562C18.1089 22.6562 22.6562 18.1089 22.6562 12.5Z" stroke="#222B34" stroke-miterlimit="10"/>
          <path d="M21.7568 8.40514C20.9726 8.41002 21.0498 9.8568 20.0727 9.17418C19.7099 8.92125 19.4868 8.55358 19.0312 8.44176C18.6333 8.34411 18.2256 8.44567 17.8325 8.51354C17.3857 8.59069 16.8559 8.62536 16.5171 8.96373C16.1894 9.28942 16.0161 9.72643 15.6675 10.0541C14.9931 10.6888 14.7085 11.3817 15.145 12.2792C15.5649 13.142 16.4433 13.6102 17.3911 13.5487C18.3222 13.4867 19.2895 12.9466 19.2627 14.2997C19.2529 14.7782 19.353 15.1102 19.5 15.555C19.6362 15.9652 19.6269 16.3627 19.6582 16.786C19.7158 17.577 19.8613 18.4637 20.2539 19.1625L20.9863 18.1293C21.0766 18.0013 21.2656 17.8221 21.3105 17.6713C21.3901 17.4042 21.2334 16.9452 21.2153 16.6459C21.1972 16.3465 21.206 16.0433 21.1601 15.744C21.0957 15.3246 20.8476 14.9315 20.8135 14.517C20.7505 13.745 20.8916 13.1288 20.2969 12.4833C19.7226 11.8607 18.8808 11.7113 18.0766 11.8378C17.6714 11.9012 16.04 12.162 16.6948 11.2357C16.8242 11.0536 17.0503 10.9042 17.1958 10.7308C17.3222 10.5799 17.4321 10.3026 17.5805 10.1849C17.729 10.0673 18.4106 9.932 18.6059 9.99206C18.8012 10.0521 19.0049 10.3339 19.1743 10.4589C19.4873 10.6946 19.8527 10.8514 20.2392 10.9159C20.9062 11.0135 22.3008 10.6258 22.29 9.77038C22.2881 9.36022 21.9072 8.78893 21.7568 8.40514Z" fill="#222B34"/>
          <path d="M14.0362 15.4443C13.776 14.3486 12.2872 13.9824 11.4845 13.3882C11.023 13.0464 10.6124 12.5186 10.0064 12.4756C9.72715 12.4556 9.49326 12.5161 9.2164 12.4443C8.9625 12.3789 8.76328 12.2422 8.49277 12.2778C7.9874 12.3442 7.66855 12.8843 7.12558 12.811C6.61045 12.7417 6.07969 12.1392 5.9625 11.6484C5.81211 11.0176 6.31113 10.813 6.8458 10.7568C7.06894 10.7334 7.31943 10.708 7.53379 10.7896C7.81601 10.8945 7.94931 11.1709 8.20273 11.3105C8.67783 11.5708 8.77402 11.1548 8.70127 10.7329C8.59238 10.1011 8.46543 9.84326 9.0289 9.40869C9.41953 9.10889 9.75351 8.89209 9.69101 8.35352C9.6539 8.03711 9.48057 7.89404 9.64219 7.5791C9.76474 7.33936 10.1012 7.12305 10.3204 6.97998C10.8863 6.61084 12.7447 6.63818 11.9854 5.60498C11.7623 5.30176 11.3507 4.75977 10.9601 4.68555C10.4718 4.59326 10.255 5.13818 9.91465 5.37842C9.56308 5.62695 8.87851 5.90918 8.52646 5.5249C8.05283 5.00781 8.84043 4.83789 9.01474 4.47705C9.18906 4.11621 8.61094 3.43408 8.30137 3.26123L6.8458 4.89355C6.80399 5.16692 6.81854 5.44596 6.88857 5.71349C6.95861 5.98102 7.08263 6.2314 7.25303 6.44922C7.54258 6.82178 8.00351 6.94141 8.02451 7.4502C8.04502 7.93848 7.96885 8.18848 7.64951 8.53174C7.51133 8.67822 7.41367 8.88623 7.27305 9.02344C7.10068 9.19092 7.16465 9.13965 6.8956 9.18555C6.38974 9.271 5.95908 9.40283 5.47031 9.5376C4.65586 9.7627 4.58066 8.43213 4.20957 7.91016L2.98887 8.896C2.97568 9.05762 3.18906 9.35498 3.24717 9.53076C3.58066 10.5352 4.25351 11.312 4.68808 12.2729C5.1456 13.2905 6.37412 13.0083 6.9166 13.8999C7.39805 14.6909 6.88389 15.6924 7.24424 16.5205C7.50596 17.1216 8.12314 17.2529 8.54892 17.6924C8.98398 18.1362 8.9747 18.7437 9.04111 19.3213C9.116 20.0007 9.23755 20.6742 9.40488 21.3369C9.46396 21.5659 9.51816 21.8687 9.6749 22.0576C9.78232 22.1875 10.151 22.2993 10.002 22.3423C10.2101 22.3765 10.5807 22.5708 10.754 22.4282C10.9825 22.2407 10.9215 21.6636 10.961 21.4028C11.0797 20.6265 11.4684 19.8672 11.9928 19.2861C12.5108 18.7129 13.2208 18.3247 13.6583 17.6748C14.0846 17.041 14.213 16.186 14.0362 15.4443ZM12.4059 16.7295C12.1129 17.2524 11.4605 17.6025 11.0411 18.0181C10.9273 18.1309 10.6852 18.5215 10.5426 18.437C10.4405 18.3765 10.4059 17.8696 10.3683 17.7534C10.1743 17.1682 9.80401 16.6574 9.3082 16.291C9.15537 16.1753 8.77646 16.0249 8.68906 15.8662C8.5914 15.6938 8.6793 15.2871 8.68271 15.0996C8.68808 14.8262 8.56357 14.3716 8.63096 14.123C8.70908 13.8364 8.55869 14.0093 8.81504 13.9526C8.95029 13.9224 9.50888 14.0205 9.67734 14.0557C9.94492 14.1113 10.0924 14.2778 10.3033 14.4463C10.858 14.8911 11.4688 15.2354 12.0904 15.5762C12.5719 15.8428 12.7135 16.1802 12.4059 16.7295Z" fill="#222B34"/>
          <path d="M9.00732 3.2761C9.23877 3.50217 9.45654 3.76975 9.80176 3.79221C10.1284 3.81419 10.4365 3.63743 10.7217 3.8596C11.0381 4.10374 11.2661 4.41282 11.686 4.48899C12.0923 4.56272 12.5225 4.32542 12.623 3.90989C12.7207 3.51389 12.5103 3.08323 12.4976 2.68577C12.4976 2.63059 12.5273 2.38547 12.4893 2.34397C12.4609 2.31272 12.2246 2.34788 12.1885 2.34885C11.9238 2.35667 11.6598 2.37489 11.3965 2.40354C10.4364 2.50745 9.49623 2.74834 8.60449 3.11887C8.72314 3.2009 8.87207 3.23362 9.00732 3.2761Z" fill="#222B34"/>
          <path d="M17.4028 6.01907C17.8173 6.01907 18.2382 5.83352 18.1045 5.35403C17.9922 4.95218 17.8007 4.51614 17.3349 4.73294C17.0385 4.87063 16.6186 5.22122 16.5839 5.56888C16.5444 5.96341 17.1264 6.01907 17.4028 6.01907Z" fill="#222B34"/>
          <path d="M17.0717 8.11742C17.495 8.37084 18.1229 8.25169 18.4423 7.88988C18.6918 7.60667 18.8387 7.11498 19.2875 7.11546C19.485 7.11505 19.6748 7.1924 19.8158 7.3308C20.0013 7.52269 19.9647 7.70287 20.0043 7.9431C20.0926 8.48265 20.6713 7.97386 20.8221 7.76488C20.9198 7.62865 21.0521 7.4265 21.0077 7.24925C20.9667 7.08373 20.7733 6.90746 20.6874 6.7556C20.4364 6.31615 20.2299 5.80492 19.8539 5.44994C19.4921 5.10814 19.0472 5.14769 18.704 5.50267C18.4227 5.79564 18.0961 6.02757 17.9037 6.38402C17.7679 6.63451 17.6151 6.75413 17.3402 6.81908C17.1888 6.85472 17.016 6.8679 16.889 6.96947C16.5355 7.24779 16.7367 7.91625 17.0717 8.11742Z" fill="#222B34"/>
        </svg>
          
       <span class="xx__mob-map-btn-text">Показать
       на карте</span>
      </a>
     </div>
    </div>
  </div>
  <!-- <?php include(HOME . XX . "views/cache/footer.view.cache.php"); ?> -->
  <div class="popups popup__additional-filters xx__mob-popup popupToggle" id="filtersPopup">
   <div class="popup positionTop">
    <div class="popup__head">
     <h2 class="popup__head-title">Дополнительные фильтры</h2>
     <button type="button" class="close"></button>
    </div>
    <div class="popup-content">
     <div class="popup__section">
      <h4 class="popup__head-title">Тип Жилища</h4>
      <div class="popup__row" id="PropertyType">
      </div>
     </div>
      <div class="popup__section">
       <h4 class="popup__head-title price_section_title">Цена</h4>
       <div class="popup__row" id="PropertyPrice">
        <div class="priceSlider" id="histogramSlider"></div>
       </div>
       </div>
     <div class="popup__section">
      <h4 class="popup__head-title">Комнаты</h4>
      <div class="popup__row" id="PropertyRooms">
       <ul class="dropdown__noactive width100">
        <li class="filter-rooms">
         <p class="c-gray w-50">Максимум гостей</p>
         <div class="count w-50">
          <button type="button" class="btn-count btn-count-minus btn-count-minus-guests"></button>
          <input type="text" name="MaxGuests" id="MaxGuests" class="input-count count__adults" value="1" readonly="">
          <button type="button" class="btn-count btn-count-plus"></button>
         </div>
        </li>
        <li class="filter-rooms">
         <p class="c-gray w-50">Спален</p>
         <div class="count w-50">
           <!-- by default button class is "count-btn", "count-minus", "count-plus" -->
          <button type="button" class="btn-count btn-count-minus minus__bedroom" onclick="delInput()"></button>
          <input type="text" name="Bedrooms" id="Bedrooms" class="input-count count__adults" value="1" readonly="">
          <button type="button" class="btn-count btn-count-plus plus__bedroom" onclick="addInput()"></button>
         </div>
        </li>
        <li class="filter-rooms">
         <p class="c-gray w-50">Ванных комнат</p>
         <div class="count w-50">
          <button type="button" class="btn-count btn-count-minus "></button>
          <input type="text" name="Bathrooms" id="Bathrooms" class="input-count count__adults" value="1" readonly="">
          <button type="button" class="btn-count btn-count-plus"></button>
         </div>
        </li>
       </ul>
      </div>
     </div>
     <div class="popup__section">
      <h4 class="popup__head-title res_Amenities"></h4>
      <div class="popup__row" id="AmenitiesList">
      </div>
     </div>
     <div class="popup__section">
      <h4 class="popup__head-title res_Rules"></h4>
      <div class="popup__row" id="RulesList">
      </div>
     </div>
    </div>
    <footer class="popup__bottom popup__bottom__between fixed-filter-footer">
      <button class="btn btn-small" id="showVariantsBtn" onclick="SetFilters()">показать варианты
      <svg class="arrow">
        <use xlink:href="img/sprite/sprite.svg#arrow-down"></use>
      </svg>
      </button>
      <button type="reset" class="link-item" id="resetFilters">очистить <span class="close"></span></button>
    </footer>
   </div>
  </div>
</div>

<div class="popups popup__footer popupToggle">
  <div class="popup popup_ft">
  <div class="flex-center-between">
    <h2 class="popup-title"><span class="res_LangPop"></span></h2>
    <button id="popup-close" class="popup-close close" type="button"></button>
  </div>
  <ul class="list_ft">
    <li class="list-item_ft"> 
      <label class="align-items-center"> 
        <input class="checkbox" type="radio" name="radio-lang" id="en" checked><span class="check-item"> </span><span class="check-text"><span class="res_English"></span></span>
      </label>
    </li>
    <li class="list-item_ft"> 
      <label class="align-items-center"> 
        <input class="checkbox" type="radio" name="radio-lang" id="ru"><span class="check-item"> </span><span class="check-text"><span class="res_Russian"></span></span>
      </label>
    </li>
  </ul>
  <h2 class="popup-title"><span class="res_CcyPop"></span></h2>
  <ul class="list_ft">
    <li class="list-item_ft"> 
      <label class="align-items-center"> 
        <input class="checkbox" type="radio" name="radio-curr" id="curr2" value="2" checked><span class="check-item"> </span><span class="check-text">USD</span>
      </label>
    </li>
    <li class="list-item_ft"> 
      <label class="align-items-center"> 
        <input class="checkbox" type="radio" name="radio-curr" id="curr4" value="4"><span class="check-item"> </span><span class="check-text">EUR</span>
      </label>
    </li>
  </ul>
  <h2 class="popup-title">Уведомления</h2>
  <ul class="list_ft">
    <li class="list-item_ft"> 
      <label class="d-flex">
        <input class="checkbox" type="checkbox" checked><span class="switch"><span class="switch-circle"></span></span><span class="check-text">Получать уведомления на почту</span>
      </label>
    </li>
    <li class="list-item_ft"> 
      <label class="d-flex">
        <input class="checkbox" type="checkbox"><span class="switch"> </span><span class="check-text">Только свободные квартиры</span>
      </label>
    </li>
  </ul>
  <button class="btnSave btn_v2 popupToggle" id="lc_popup_submit_btn" type="submit"><span class="res_SaveChanges"></span></button>
</div>
</div>
<footer class="footer footer_v2">
  <div class="container_v2">
    <div class="footer-top">
      <ul class="col">
        <li class="footer-main"><span class="res_Company"></span></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/company/about-us" target="_blank"><span class="res_About"></span></a></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/company/for-investors" target="_blank"><span class="res_Invest"></span></a></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/company/careers" target="_blank"><span class="res_Careers"></span></a></li>
      </ul>
      <ul class="col">
        <li class="footer-main"><span class="res_Host"></span></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/host/hosting-rules" target="_blank"><span class="res_HostRules"></span></a></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/host/online-payments" target="_blank"><span class="res_HostPayMethod"></span></a></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/host/rules-and-your-safety" target="_blank"><span class="res_RulesAndSafety"></span></a></li>
      </ul>
      <ul class="col">
        <li class="footer-main"><span class="res_Support"></span></li>
        <li class="footer-item"><a class="footer-link" href="#"><span class="res_KnowBase"></span></li></a></li>
        <li class="footer-item"><a class="footer-link" href="#"><span class="res_ReportAbuse"></span></li></a></li>
      </ul>
      <ul class="col">
        <li class="footer-main"><span class="res_ForGuests"></span></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/guests/how-do-i-book-a-place" target="_blank"><span class="res_HowToBook"></span></a></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/guests/payment-methods" target="_blank"><span class="res_PayMethods"></span></a></li>
        <li class="footer-item"><a class="footer-link" href="https://help.rentxx.com/<?php echo $lng; ?>/guests/%20rules-and-your-safety" target="_blank"><span class="res_RulesAndSafety"></span></a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container_v2">
      <div class="flex-center-between">
        <div class="align-items-center"> 
          <p class="footer-text"><span class="res_CopyrightFooter"></span></p>
          <ul class="footer-bottom__ul">
            <li class="footer-bottom__li"><a class="footer-link" href="#"><span class="res_Privacy"></span></a></li>
            <li class="footer-bottom__li"><a class="footer-link" href="#"><span class="res_Terms"></span></a></li>
            <li class="footer-bottom__li"><a class="footer-link" href="#"><span class="res_Sitemap"></span></a></li>
          </ul>
          <div class="footer__cards"><a class="footer__card" href="#"><img class="footer-card__logo" src="/static/v2/img/visa.svg" alt="visa"></a><a class="footer__card" href="#"><img class="footer-card__logo" src="/static/v2/img/mastercard.svg" alt="mastercard"></a></div>
        </div>
        <div class="align-items-center"> <button class="align-items-center popupToggle lc_popup" href="#"><img src="/static/v2/img/language-learning.svg" class="popupToggle" alt="language"><span class="fs-10 c-dark_v2 ml-8 popupToggle res_CurrentLng"></span></button><button class="align-items-center ml-20 popupToggle lc_popup" id="curr"><img src="/static/v2/img/money.svg" class="popupToggle" alt="money"><span class="fs-10 c-dark_v2 ml-8 popupToggle"></span><img class="ml-8 popupToggle" src="/static/v2/img/down-arrow.svg" alt="arrow"></button></div>
      </div>
    </div>
  </div>
</footer>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<!-- <script src="/static/js/moment.min.js"></script> -->
<script src="/static/js/moment-with-locales.js"></script>
<script src="/static/js/jquery.min.js"></script>
<script src="/static/js/libs.min.js"></script>
  <script src="/static/v2/js/card.js"></script>
<script src="/static/v2/js/toastr.min.js"></script>
<script src="/static/js/jquery.cookie.js"></script>
<!-- <script src="https://static.rentxx.com/static/js/map.js"></script> -->
<!-- <script src="https://static.rentxx.com/static/js/jquery.daterangepicker.min.js"></script> -->
<script src="/static/js/jquery.daterangepicker_v3.js"></script>
<!-- <script src="/static/js/jquery.daterangepicker_v3.js"></script> -->
<script src="/static/js/common.js"></script>
<script src="/static/js/slider.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="bootstrap.histogram.slider.js"></script>
<script src="/static/v2/js/resouceReader.js"></script>
<!-- <script src="/static/v2/js/popup.js"></script> -->
<script>
<?php echo $JsLocalizationVars; ?>
<?php echo $JsLocalizationScript; ?>
</script>
<script src="/static/v2/js/bk-card-calendar.js"></script>
<script type="text/javascript">
var imgg = SearchResult[1][0]['Filename'];
// console.log(`/API/StripePayment/StripeSession.php?Amount=54600&Days=4&Img=${imgg}&Name=${$(".property_head_card_title").text()}&Email=${$(".bk_step_2_email").val()}&CheckIn=${DateToUrlString(dateRangeStart)}&CheckOut=${DateToUrlString(dateRangeEnd)}&Lang=${Lng}&ID=${propertyId}`);
  // Create an instance of the Stripe object with your publishable API key
  var stripe = Stripe("pk_test_J5cz2wHjNUbt1XNdyA8iEBxn007v23N8r7");
  var checkoutButton = document.getElementById("doPayment");

  checkoutButton.addEventListener("click", function () {
    if($(".bk_step_2_name").val() && $(".bk_step_2_email").val() && $(".bk_step_2_code").val() && $(".bk_step_2_phone").val() && ValidateEmail($(".bk_step_2_email").val())){
      fetch(`/api/stripepayment/stripesession.php?Amount=${totalNightsPrice*100}&Days=${CalcNightCount(dateRangeStart, dateRangeEnd)}&Img=${imgg}&Name=${$(".property_head_card_title").text()}&UserName=${$(".bk_step_2_name").val()}&Email=${$(".bk_step_2_email").val()}&CheckIn=${DateToUrlString(dateRangeStart)}&CheckOut=${DateToUrlString(dateRangeEnd)}&Lang=${Lng}&ID=${propertyId}&PhoneCode=${$(".bk_step_2_code").val()}&Phone=${$(".bk_step_2_phone").val()}`, {
        method: "POST",
          //make sure to serialize your JSON body
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (session) {
          if(session.error){
            if(!$(".error-text").length){
              $(".step_2 .bk_main_content").prepend(`<p class='error-text'>${session.error}</p>`)
            }
            else{
              $(".error-text").text(session.error)
            }
            return false;
          }
          else{
            return stripe.redirectToCheckout({ sessionId: session.id });
          }
        })
        .then(function (result) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function (error) {
          console.error("Error:", error);
        });
    }
    else{
      if(!$(".bk_step_2_name").val()){
        $(".bk_step_2_name").css("border", "1px solid #ff3535")
      }
      if((!$(".bk_step_2_email").val() || !ValidateEmail($(".bk_step_2_email").val()))){
        $(".bk_step_2_email").css("border", "1px solid #ff3535")
      }
      if(!$(".bk_step_2_code").val()){
        $(".bk_step_2_code").css("border", "1px solid #ff3535")
      }
      if(!$(".bk_step_2_phone").val()){
        $(".bk_step_2_phone").css("border", "1px solid #ff3535")
      }
    }
  });

</script>
</body>
</html>