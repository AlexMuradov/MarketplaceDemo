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
    <title>Reset</title>
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
                                        <h5 class="nk-block-title">Set new password</h5>
                                    </div>
                                </div>
                                <form action="/<?php echo $lng; ?>/auth.newpassword" method="POST">
                                    <input type="hidden" name="api__SetNewPassword" value="1">
                                    <input type="hidden" name="code" value="">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password"><span class="res_Passwd"></span></label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="Password" class="form-control form-control-lg" id="password" placeholder="Enter new passcode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
                                    </div>
                                </form>
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
                                        <p class="text-soft">&copy; 2020 Rentxx. All Rights Reserved.</p>
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
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?> 
    </script>

</html>