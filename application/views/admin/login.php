<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#424242" />
    <title>Login :
        <?php echo $name; ?>
    </title>
    <!--favican-->
    <!-- <link href="<?php echo base_url(); ?>backend/images/s-favican.png" rel="shortcut icon" type="image/x-icon"> -->
    <link
        href="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php $this->setting_model->getAdminsmalllogo(); ?>"
        rel="shortcut icon" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>backend/usertemplate/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/css/form-elements.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/css/style.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>backend/usertemplate/assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/main.css">

    <style type="text/css">
        /*.col-md-offset-3 { margin-left: 29%;}*/
        .bgoffsetbgno {
            background: transparent;
            border-right: 0 !important;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.29);
            border-radius: 4px;
        }

        .loginradius {
            border-radius: 4px;
        }

        /* @media (max-width: 767px){.col-md-offset-3 {margin-left: 0;}}*/
        .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
            background: rgb(53, 170, 71);
        }
    </style>

</head>

<body data-theme="light" class="font-nunito">
    <!-- WRAPPER -->
    <div id="wrapper" class="theme-cyan">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main university">
                <div class="auth-box">
                    <div class="top">
                        <img
                            src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo(); ?>" />
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Admin Login</p>
                        </div>
                        <div class="body">
                            <?php
                            $empty_notice = 0;
                            $offset = "";
                            $bgoffsetbg = "bgoffsetbg";
                            $bgoffsetbgno = "";
                            if (empty($notice)) {
                                $empty_notice = 1;
                                $offset = "col-md-offset-4";
                                $bgoffsetbg = "";
                                $bgoffsetbgno = "bgoffsetbgno";
                            }
                            ?>
                            <div class="<?php echo $bgoffsetbg; ?>">
                                <div
                                    class="<?php echo $offset; ?>">
                                        <?php
                                        if (isset($error_message)) {
                                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                        }
                                        ?>
                                        <?php
                                        if ($this->session->flashdata('message')) {
                                            echo "<div class='alert alert-success'>" . $this->session->flashdata('message') . "</div>";
                                        }
                                        ;
                                        ?>
                                        <?php
                                        if ($this->session->flashdata('disable_message')) {
                                            echo "<div class='alert alert-danger'>" . $this->session->flashdata('disable_message') . "</div>";
                                        }
                                        ;
                                        ?>
                                        <form action="<?php echo site_url('site/login') ?>" method="post">
                                            <?php echo $this->customlib->getCSRF(); ?>
                                            <div class="form-group has-feedback">
                                                <input type="text" name="username"
                                                    placeholder="<?php echo $this->lang->line('username'); ?>" value=""
                                                    class="form-username form-control" id="form-username">
                                                <span class="fa fa-envelope form-control-feedback"></span>
                                                <span class="text-danger">
                                                    <?php echo form_error('username'); ?>
                                                </span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="password" value="" name="password"
                                                    placeholder="<?php echo $this->lang->line('password'); ?>"
                                                    class="form-password form-control" id="form-password">
                                                <span class="fa fa-lock form-control-feedback"></span>
                                                <span class="text-danger">
                                                    <?php echo form_error('password'); ?>
                                                </span>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                <?php echo $this->lang->line('sign_in'); ?>
                                            </button>
                                        </form>
                                        <div class="form-auth-small">
                                            <div class="bottom">
                                                <span class="helper-text m-b-10"><a
                                                        href="<?php echo site_url('site/forgotpassword') ?>"
                                                        class="forgot"><i class="fa fa-lock"></i>
                                                        <?php echo $this->lang->line('forgot_password'); ?>?
                                                    </a></span>
                                            </div>
                                        </div>
                                </div>
                                <?php
                                if (!$empty_notice) {
                                    ?>
                                    <!-- <div class="col-lg-1 col-sm-1"><div class="separatline"></div></div>  -->
                                    <div class="col-lg-8 col-sm-8 col-sm-12">
                                        <h3 class="h3">
                                            <?php echo $this->lang->line('what_is_new_in'); ?>
                                            <?php echo $school['name']; ?>
                                        </h3>
                                        <div class="loginright mCustomScrollbar">
                                            <div class="messages">
                                                <?php
                                                foreach ($notice as $notice_key => $notice_value) {
                                                    ?>
                                                    <h4>
                                                        <?php echo $notice_value['title']; ?>
                                                    </h4>

                                                    <?php
                                                    $string = ($notice_value['description']);
                                                    $string = strip_tags($string);
                                                    if (strlen($string) > 100) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 100);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '... <a class=more href="' . site_url('read/' . $notice_value['slug']) . '" target="_blank">' . $this->lang->line('read') . ' ' . $this->lang->line('more') . '  </a>';
                                                    }
                                                    echo '<p>' . $string . '</p>';
                                                    ?>

                                                    <div class="logdivider"></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <img src="<?php echo base_url(); ?>backend/usertemplate/assets/img/backgrounds/bg3.jpg" class="img-responsive" style="border-radius:4px;" /> -->
                                    </div><!--./col-lg-6-->
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.mousewheel.min.js"></script>

    <!-- <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/scripts.js"></script> -->
    <!--[if lt IE 10]>
            <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
<script type="text/javascript">
    $(document).ready(function () {
        // var base_url = '<?php //echo base_url();   ?>';
        // $.backstretch([
        //     base_url + "backend/usertemplate/assets/img/backgrounds/11.jpg"
        // ], {duration: 3000, fade: 750});
        $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function () {
            $(this).removeClass('input-error');
        });
        $('.login-form').on('submit', function (e) {
            $(this).find('input[type="text"], input[type="password"], textarea').each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass('input-error');
                } else {
                    $(this).removeClass('input-error');
                }
            });
        });
    });
</script>