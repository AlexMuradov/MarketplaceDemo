<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/static/cabinet5/images/Xxlogo.ico" type="image/x-icon">
    <!-- Page Title  -->
    <title>Card Boxed | DashLite Admin Template</title>
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
                <div class="nk-content nk-content-fluid" style="margin-top: 35px">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title page-title res_SystemIntegration"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <!-- <div class="row g-gs">
                                    <div class="col-xxl-6">
                                        <div class="nk-download">
                                            <div class="data">
                                                <div class="thumb">
                                                    <img src="/demo2/images/icons/product-pp.svg" alt="">
                                                </div>
                                                <div class="info">
                                                    <h6 class="title">
                                                        <span class="name">NOKEY</span> 
                                                        <span class="badge badge-dim badge-primary badge-pill">New</span>
                                                    </h6>
                                                    <div class="meta">
                                                        <span class="version">
                                                            <span class="text-soft">Version: </span> <span>0.0.0</span>
                                                        </span>
                                                        <span class="release">
                                                            <span class="text-soft">Status: </span> <span>In developing</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a href="#" class="btn btn-primary">Enable</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                                            <div class="media media-center gx-3 wide-xs">
                                                <div class="media-object">
                                                    <em class="icon icon-circle icon-circle-lg ni ni-unlock-fill"></em>
                                                </div>
                                                <div class="media-content">
                                                    <h6 class="title">
                                                        <span class="name">NOKEY</span> 
                                                        <span class="badge badge-dim badge-primary badge-pill">New</span>
                                                    </h6>
                                                    <div class="meta">
                                                        <span class="version">
                                                            <span class="text-soft res_Version"></span> <span>0.0.1</span>
                                                        </span>
                                                        <span class="release">
                                                            <span class="text-soft res_Status"></span> <span>Active</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-block-actions flex-shrink-0">
                                                <a href="https://nokey.app/" target="_blank" class="btn btn-lg btn-primary">Enable</a>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div>
                            </div>
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
    <script src="/static/cabinet5/assets/js/bundle.js?ver=2.0.0"></script>
    <script src="/static/cabinet5/assets/js/scripts.js?ver=2.0.0"></script>
    <script src="/static/v2/js/cabinet.js"></script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>
    <script src="/static/v2/js/resouceReader.js"></script>
</body>

</html>