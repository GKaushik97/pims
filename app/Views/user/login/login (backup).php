<?php
/**
 * User login
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LogIn</title>
        <link rel="shortcut icon" href="<?= WEBROOT ?>img/favicon.png" type="image/x-icon">
            <!-- CSS files -->
            <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>bootstrap-5.3.2/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>css/admin/template_admin.css">
            <!-- bootstrap icons -->
            <link rel="stylesheet" href="<? echo WEBROOT;?>bootstrap-5.3.2/icons/bootstrap-icons.css">
            
            <!-- JS files -->
            <script type="text/javascript" src="<?= WEBROOT ?>js/jquery-3.7.1.min.js"></script>
            <script type="text/javascript" src="<?= WEBROOT ?>bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="" style="background-color: #ffffff;position: relative;box-shadow: rgba(0,132,255, 0.2) 0px 7px 29px 0px;">
            <?/*
            <form action="<?= WEBROOT ?>login/loginSubmit" method="post">
                <?= csrf_field() ?>
                <div class="position-relative">
                    <div class="login-logo">
                        <img src="<?= WEBROOT ?>img/logo.png" class="img-fluid" alt="login logo" width="175">
                    </div>
                    <div class="" style="padding:0px 50px 50px 50px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="login-img">
                                    <img src="<?= WEBROOT ?>img/login/login_invoice.webp" class="img-fluid" alt="login invoice img">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="" style="display: flex;justify-content: center;align-items: center;height: 100%;padding-left: 50px;">
                                    <div class="login-block">
                                        <div class="login-text">Login</div>
                                        <div class="mb-3">
                                            <div class="input-items">
                                                <input class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="User Name" autofocus="autofocus" type="text">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <span class="text-danger"><?= validation_show_error('username') ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-items">
                                                <input name="password" class="form-control " placeholder="Password" type="password">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                            <span class="text-danger"><?= validation_show_error('password') ?></span>
                                        </div>
                                        <span class="text-danger"><? echo isset($message) ? $message : '';?></span>
                                        <div class="d-grid mb-3">
                                            <button class="btn login-btn btn-lg" type="submit" value="LogIn"><i class="icon-login"></i>&nbsp;Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            */?>
            <form action="<?= WEBROOT ?>login/loginSubmit" method="post">
                <?= csrf_field() ?>
                <div class="container position-relative">
                    <div class="" style="padding:0px 50px 50px 50px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="login-img">
                                    <img src="<?= WEBROOT ?>img/login/login_invoice.webp" class="img-fluid" alt="login invoice img">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="login-logo">
                                    <img src="<?= WEBROOT ?>img/logo.png" class="img-fluid" alt="login logo" width="175">
                                </div>
                                <div class="" style="display: flex;justify-content: center;align-items: center;height: 100%;padding-left: 50px;">
                                    <div class="login-block">
                                        <div class="login-text">Login</div>
                                        <div class="mb-3">
                                            <div class="input-items">
                                                <input class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="User Name" autofocus="autofocus" type="text">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <span class="text-danger"><?= validation_show_error('username') ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-items">
                                                <input name="password" class="form-control " placeholder="Password" type="password">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                            <span class="text-danger"><?= validation_show_error('password') ?></span>
                                        </div>
                                        <span class="text-danger"><? echo isset($message) ? $message : '';?></span>
                                        <div class="d-grid mb-3">
                                            <button class="btn login-btn btn-lg" type="submit" value="LogIn"><i class="icon-login"></i>&nbsp;Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <style type="text/css">
                @font-face {
                    font-family: "Nunito",sans-serif;
                    src: url('../fonts/Nunito_Sans/static/NunitoSans_7pt-Regular.woff');
                }
                body {
                    /*background: rgb(250,232,248);
                    background: -webkit-linear-gradient(to right, rgba(250,232,248,1), rgba(242,235,253,1));
                    background: linear-gradient(to right, rgba(250,232,248,1), rgba(242,235,253,1));*/
                    width: 100%;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: "Nunito",sans-serif;
                    font-size: 12px;
                    /*background-color: #edf6ff;*/
                    color: #a0a5a8;
                    background: url("../public/img/login-bg1.png") no-repeat center center fixed;
                    background-size: auto;
                    background-size: auto;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                }

                .login-block {
                    /*width: 400px;
                    background: #ffffff;
                    border-radius: 6px;
                    overflow: hidden;
                    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
                    -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
                    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
                    -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
                    -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
                    transform: translateY(7%);
                    padding: 30px;
                    border: 1px solid #d5d5d5;*/
                    width: 400px;
                }
                .login-logo {
                    padding: 50px;
                }
                .input-items {
                position: relative;
                }
                .input-items input, .input-items textarea {
                width: 100%;
                height: 44px;
                border: 1px solid #e4e4e4;
                padding-left: 44px;
                padding-right: 12px;
                position: relative;
                font-size: 16px;
                color: #000000;
                -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                border-radius: 6px;
                }
                .input-items i {
                position: absolute;
                top: 8px;
                left: 13px;
                font-size: 20px;
                z-index: 9;
                color: #ee1d24;
                }
                .input-items input:focus, .input-items textarea:focus {
                border-color: #ee1d24;
                }
                .login-btn {
                color: #fff;
                background-color: #ee1d24;
                border-color: #d61a20;
                }
                .login-btn:hover {
                color: #fff;
                background-color: #d61a20;
                border-color: #be171c;
                }
                .login-text {
                font-size: 28px;
                text-align: center;
                margin-bottom: 1.5rem;
                color: #000;
                }
                .l-msg {
                position: fixed;
                top: 0px;
                width: 100%;
                text-align: right;
                background-color: rgba(255,255,255,0.2);
                font-size: 24px;
                color: #000;
                padding: 15px;
                }
                .f-16 {
                font-size: 16px;
                }
                .loc-title {
                    padding-top: 5px;
                }
                .login-footer {
                    color: #666;
                    font-size: 12px;
                    padding-top: 25px;
                    text-align: center;
                }
                .login-footer > a {
                    color: #bb2727;
                }
                .login-message {
                    text-align: center;
                    color: #000;
                    font-size: 20px;
                }
                .login-img {
                    max-height: 500px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .login-img img {
                    max-height: 500px;
                }
            </style>
        </div>
    </body>
</html>