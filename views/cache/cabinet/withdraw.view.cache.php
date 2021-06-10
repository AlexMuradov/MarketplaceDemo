<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href="/static/cabinet5/"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/static/cabinet5/images/Xxlogo.ico" type="image/x-icon">
    <!-- Page Title  -->
    <title>DataTables - General | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="/static/v2/css/cabinet.css">
    <link rel="stylesheet" href="/static/cabinet5/assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="/static/cabinet5/assets/css/theme.css?ver=2.0.0">
</head>

<body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php include(HOME . "/views/imports/e.cabinet.sidebar.html"); ?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php include(HOME . XX . "views/imports/cabinet_header.html"); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="withdraw wide-xs m-auto">
                                <div class="nk-block nk-block-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title"><span class="res_withdrawTitle">Вывод средст</span></h4>
                                        <div class="nk-block-des">
                                            <p><span class="res_transactionsDesc"></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="withdraw-block">
                                    <form action="#" class="withdraw-form">
                                        <input type="hidden" name="api__ConfirmWithdraw" value="1">
                                        <div class="withdraw-field form-group">
                                            <div class="card card-bordered is-dark" id="virtualAcc1">
                                                <div class="nk-wgw">
                                                    <div class="nk-wgw-inner">
                                                        <span class="nk-wgw-name" href="#">
                                                            <div class="nk-wgw-icon">
                                                                <img class="logo-dark logo-img" src="/static/cabinet5/images/logo-dark.png" srcset="/static/cabinet5/images/logo-dark2x.png 2x" alt="logo-dark">
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Rentxx Wallet</h5>
                                                        </span>
                                                        <div class="nk-wgw-balance pt-0">
                                                            <div class="amount">-38238.00<span class="currency currency-nio">EUR</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                        <div class="withdraw-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Choose Account</label>
                                            </div>
                                            <input type="hidden" value="btc" name="bs-currency" id="withdraw-choose-currency">
                                            <select class="form-select" id="selectAcc">
                                            </select>
                                        </div><!-- .withdraw-field -->
                                        <div class="withdraw-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="withdraw-amount">Amount</label>
                                            </div>
                                            <div class="form-control-group">
                                                <input type="text" class="form-control form-control-lg form-control-number" id="withdraw-amount" name="bs-amount" placeholder="0">
                                            </div>
                                            <div class="form-note-group">
                                                <span class="withdraw-min form-note-alt">Minimum: 10 EUR</span>
                                                <span class="withdraw-rate form-note-alt">1 EUR = <span id="currCCY"></span></span>
                                            </div>
                                        </div><!-- .withdraw-field -->
                                        <div class="withdraw-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Payment Method</label>
                                            </div>
                                            <div class="form-pm-group">
                                                <ul class="withdraw-pm-list">
                                                    <li class="withdraw-pm-item">
                                                        <input class="withdraw-pm-control" type="radio" name="bs-method" id="pm-bank" disabled />
                                                        <label class="withdraw-pm-label" for="pm-bank">
                                                            <span class="pm-name">Bank Transfer</span>
                                                            <span class="pm-icon"><em class="icon ni ni-building-fill"></em></span>
                                                        </label>
                                                    </li>
                                                    <li class="withdraw-pm-item">
                                                        <input class="withdraw-pm-control" type="radio" name="bs-method" id="pm-card" checked />
                                                        <label class="withdraw-pm-label" for="pm-card">
                                                            <span class="pm-name">Credit / Debit Card</span>
                                                            <span class="pm-icon"><em class="icon ni ni-cc-alt-fill"></em></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .withdraw-field -->
                                        <div class="withdraw-field form-action">
                                            <a href="#" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#buy-coin">Confirm</a>
                                        </div><!-- .withdraw-field -->
                                        <div class="form-note text-base text-center">Note: our transfer fee included, <a href="#">see our fees</a>.</div>
                                    </form><!-- .withdraw-form -->
                                </div><!-- .withdraw-block -->
                            </div><!-- .withdraw -->
                        </div><!-- .withdraw -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php include(HOME . "/views/imports/cabinet_footer.html"); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="/static/cabinet5/assets/js/bundle.js?ver=2.0.0"></script>
    <script src="/static/cabinet5/assets/js/scripts.js?ver=2.0.0"></script>
    <script src="/static/v2/js/resouceReader.js"></script>
    <script src="/static/v2/js/cabinet.js"></script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>
</body>

</html>