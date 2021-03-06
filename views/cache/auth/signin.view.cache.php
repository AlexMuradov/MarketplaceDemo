<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="/static/cabinet5/">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/Xxlogo.ico" type="image/x-icon">
    <!-- Page Title  -->
    <title>Login</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.0.0">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="/" class="logo-link">
                                <!-- <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo"> -->
                                <img class="logo-dark logo-img logo-img-lg" src="../../static/v2/img/Xxlogo.ico" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title"><span class="res_LoginTitle"></span></h4>
                                    </div>
                                </div>
                                <form action="/<?php echo $lng; ?>/auth.signin" method="POST">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01"><span class="res_Email"></span></label>
                                        </div>
                                        <input type="email" name="Email" class="form-control form-control-lg" id="default-01" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password"><span class="res_Passwd"></span></label>
                                            <a class="link link-primary link-sm" href="/<?php echo $lng; ?>/auth.restore"><span class="res_Restore"></span></a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="Password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button name="api__Login" type="submit" value="1" class="btn btn-lg btn-primary btn-block"><span class="res_LoginTitle"></span></button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> <span class="res_QuestionNew"></span> <a href="/<?php echo $lng; ?>/auth.registration"><span class="res_CreateAccount"></span></a>
                                </div>
                                <!-- <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span class="res_Or"></span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item" id="googleAuth"><a class="nav-link"><span class="res_GoogleAuth"></span></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://help.rentxx.com/<?php echo $lng; ?>/company/terms" target="_blank">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://help.rentxx.com/<?php echo $lng; ?>" target="_blank">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://help.rentxx.com/<?php echo $lng; ?>" target="_blank">Help</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft"><span class="res_CopyrightFooter"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.0.0"></script>
    <script src="./assets/js/scripts.js?ver=2.0.0"></script>
    <script src="/static/v2/js/resouceReader.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-auth.js"></script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>

</html>