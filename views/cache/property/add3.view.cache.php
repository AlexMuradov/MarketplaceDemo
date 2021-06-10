<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Добавление квартиры</title>
  <meta name="description" content="Xx">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="/static/v2/img/Xxlogo.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="">
  <link data-n-head="ssr" rel="stylesheet"
    href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css">
  </script>
  <link rel="stylesheet" href="/static/v2/css/styles.css">
  <link rel="stylesheet" href="/static/css/main_alt.css">
  <link rel="stylesheet" href="/static/css/add__item.css">
</head>


<body>
  <div id="wrapper">
    <!-- header.html -->
    
    <?php include(HOME . XX . "views/imports/add_property_header.html"); ?>

    <div id="wrapper-content">
      <div class="container">
        <div class="main__content">
          <div class="left__content">
            <div class="title apartaments__title">
              <h2 class="res_PalceLocationTitle"></h2>
              <p class="res_PalceLocationDescription"></p>
            </div>
            <div class="container__box container__box-three">
              <form class="choice" action="" method="POST" id="position" onsubmit="return validate()">
                <div class="field field-payment field-payment__theee">
                  <p class="name res_Country"></p>
                  <span class="error">
                    <p id="country_error"></p>
                  </span>
                  <input type="text" class="input-select" id="CountrySelect" readonly="">
                  <input type="hidden" class="country-input" name="CountryID" id="input-id" value="">
                  <div class="icon">
                    <img src="/static/img/arrow-downblu.svg" alt="arrow">
                  </div>
                  <ul class="select" id="CountryList" style="display: none;">
                  </ul>
                </div>
                <div class="choice__room">
                  <div class="payment-row">
                    <div class="field field-payment field-payment_theee">
                      <p class="name res_City"></p>
                      <input type="text" class="input-select" id="CitySelect" readonly="">
                      <input type="hidden" name="CityID" id="input-id">
                      <div class="icon">
                        <img src="/static/img/arrow-downblu.svg" alt="arrow">
                      </div>
                      <ul class="select" id="CityList" style="display: none;">

                      </ul>
                    </div>
                    <div class="field mt-22">
                      <p class="name res_Street"></p>
                      <input type="text" name="Street" id="street">
                    </div>
                    <div class="field mt-22">
                      <p class="name res_Appartment"></p>
                      <input type="text" name="Appartment">
                    </div>
                    <div class="field mt-22">
                      <p class="name res_Zip"></p>
                      <input type="text" name="Zip">
                    </div>
                    <div class="field mt-22">
                      <p class="name res_Area"></p>
                      <input type="text" name="Area">
                    </div>
                    <div class="field mt-22" style="width: calc(25% - 15px); margin-right: 20px;">
                      <p class="name res_CurrentFloor"></p>
                      <input type="number" name="currentFloor">
                    </div>
                    <div class="field mt-22" style="width: calc(25% - 15px); margin-right: 0px;">
                      <p class="name res_TotalFloors"></p>
                      <input type="number" name="totalFloors">
                    </div>
                    <!-- <div class="container__box container__box-two">
                      <ul class="dropdown__noactive">
                        <li class="dropdown-item">
                          <p class="c-gray res_CurrentFloor"></p>
                          <div class="count">
                            <button type="button" class="btn-count btn-count-minus"></button>
                            <input type="text" name="currentFloor" id="currentFloor" class="input-count count__children"
                              value="0" readonly="">
                            <button type="button" class="btn-count btn-count-plus"></button>
                          </div>
                        </li>
                        <li class="dropdown-item">
                          <p class="c-gray res_TotalFloors"></p>
                          <div class="count">
                            <button type="button" class="btn-count btn-count-minus"></button>
                            <input type="text" name="totalFloors" class="input-count count__children" value="0"
                              readonly="">
                            <button type="button" class="btn-count btn-count-plus"></button>
                          </div>
                        </li>
                      </ul>
                    </div> -->
                    <div class="field mt-22">
                      <p class="name"></p>
                      <input type="hidden" name="Latitude">
                    </div>
                    <div class="field mt-22">
                      <p class="name"></p>
                      <input type="hidden" name="Longitude">
                      <input type="hidden" name="TimeZone">
                    </div>
                  </div>
                </div>
                <div class="title apartaments__title">
                  <h2 class="res_MapTitle"></h2>
                  <p class="res_MapDescription"></p>
                </div>
                <div class="main__map-pin">
                  <div id="mapid"></div>
                </div>
                <!-- map -->
                <div class="btn__block">
                  <button type="submit" class="btn btn-red res_NextBtn" id="submitBtn"></button>
                  <a href="<?php echo $BackButton; ?>" class="btn btn-red btn-back res_BackBtn"></a>
                  <input type="hidden" name="step3_submit" value="1">
                </div>
              </form>
            </div>
          </div>
          <?php include(HOME . XX . "views/imports/e_addpropertymenu.html"); ?>
        </div>
      </div>
    </div>
  </div>


  <script src="/static/js/jquery.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js"> -->
  </script>
  <!-- <script src="/static/js/mappin.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js">
  </script>
  <script src="/static/js/slick.min.js"></script>
  <script src="/static/js/common_alt1.js"></script>
  <!-- <script src="/static/js/main.js"></script> -->
  <script src="/static/v2/js/resouceReader.js"></script>
  <script src="/static/v2/js/add_property_step.js"></script>

  <script>
    <?php echo $JsLocalizationVars; ?>
    <?php echo $JsLocalizationScript; ?>
  </script>

</body>

</html>