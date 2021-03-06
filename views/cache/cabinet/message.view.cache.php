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
    <title>Chats / Messenger | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.0.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.0.0">
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
                <div class="nk-content p-0">
                    <div class="nk-content-inner">
                        <div class="nk-content-body p-0">
                            <div class="nk-chat">
                                <div class="nk-chat-aside">
                                    <div class="nk-chat-aside-head">
                                        <div class="nk-chat-aside-user">
                                            
                                        </div>
                                    </div>
                                    <!-- .nk-chat-aside-head -->
                                    <div class="nk-chat-aside-body" data-simplebar>
                                        <div class="nk-chat-aside-search">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-left">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control form-round" id="default-03" placeholder="Search by name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-chat-list">
                                            <h6 class="title overline-title-alt">Messages</h6>
                                            <!-- USER LIST -->
                                            <ul class="chat-list">
                                            
                                            </ul><!-- .chat-list -->
                                        </div><!-- .nk-chat-list -->
                                    </div>
                                </div><!-- .nk-chat-aside -->
                                <div class="nk-chat-body profile-shown">
                                    <div class="nk-chat-head">
                                        <ul class="nk-chat-head-info">
                                            <li class="nk-chat-body-close">
                                                <a href="#" class="btn btn-icon btn-trigger nk-chat-hide ml-n1"><em class="icon ni ni-arrow-left"></em></a>
                                            </li>
                                            <li class="nk-chat-head-user">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-purple">
                                                        <span id="userTitleInitials"></span>
                                                    </div>
                                                    <div class="user-info">
                                                        <div class="lead-text" id="userTitle"></div>
                                                        <div class="sub-text" id="userTitleActive"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        
                                        <div class="nk-chat-head-search">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-left">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control form-round" id="chat-search" placeholder="Search in Conversation">
                                                </div>
                                            </div>
                                        </div><!-- .nk-chat-head-search -->
                                    </div><!-- .nk-chat-head -->
                                    <div class="nk-chat-panel chat-lines" data-simplebar>
                                    </div><!-- .nk-chat-panel -->
                                    <form action="" method="post">
                                    <div class="nk-chat-editor">
                                        <div class="nk-chat-editor-upload  ml-n1">
                                            <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt" data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a>
                                            <div class="chat-upload-option" data-content="chat-upload">
                                                <ul class="">
                                                    <li><a href="#"><em class="icon ni ni-img-fill"></em></a></li>
                                                    <li><a href="#"><em class="icon ni ni-camera-fill"></em></a></li>
                                                    <li><a href="#"><em class="icon ni ni-mic"></em></a></li>
                                                    <li><a href="#"><em class="icon ni ni-grid-sq"></em></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="nk-chat-editor-form">
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-simple no-resize" rows="1" name="Message" id="chat-textarea" placeholder="Type your message..."></textarea>
                                                <input type="hidden" name="api__Send" value="1">
                                                <input type="hidden" id="messageTo" name="To" value="">
                                            </div>
                                        </div>
                                        <ul class="nk-chat-editor-tools g-2">

                                            <li>
                                                <button class="btn btn-round btn-primary btn-icon" type="submit" id="sendChat"><em class="icon ni ni-send-alt"></em></button>
                                            </li>
                                        </ul>
                                    </div>
                                    </form>
                                    <!-- .nk-chat-editor -->
                                </div><!-- .nk-chat-body -->
                            </div><!-- .nk-chat -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2020 Rentxx. 
                                <form action="/ru/cabinet.message" enctype='multipart/form-data' method="post">
                                    <input type="file" name="file">
                                    <input type="hidden" name="To" value="1">
                                    
                                    <input type="submit" name="api__mAttach" value="1">
                                </form>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.0.0"></script>
    <script src="./assets/js/scripts.js?ver=2.0.0"></script>
    <script src="./assets/js/apps/chats.js?ver=2.0.0"></script>
    <script src="/static/v2/js/cabinet.js"></script>
    <script>
        <?php echo $JsLocalizationVars; ?>
        <?php echo $JsLocalizationScript; ?>
    </script>
</body>

</html>