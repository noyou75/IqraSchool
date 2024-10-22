<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#424242" />
    <title>
        <?php $app_name = $this->setting_model->get();
        echo $app_name[0]['name'];
        ?>
    </title>
    <!--favican-->
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/main.css">

    <style type="text/css">
        .nopadding {
            border-right: 0px solid #ddd;
        }
    </style>
</head>

<body>
    <div id="wrapper" class="theme-cyan">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main university">
                <div class="auth-box">
                    <div class="top">
                        <img alt="Iconic"
                            src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo(); ?>" />
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">
                                <?php echo $this->lang->line('forgot_password'); ?>
                            </p>
                        </div>
                        <?php
                        if (isset($error_message)) {
                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                        }
                        ?>
                        <div class="body">
                            <p>Please enter your email address below to receive instructions for resetting password.</p>
                            <form action="<?php echo site_url('site/forgotpassword') ?>" method="post">
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="form-username">
                                        <?php echo $this->lang->line('email'); ?>
                                    </label>
                                    <input type="text" name="email"
                                        placeholder="<?php echo $this->lang->line('email'); ?>"
                                        class="form-username form-control" id="form-username">
                                    <span class="fa fa-envelope form-control-feedback"></span>
                                    <span class="text-danger">
                                        <?php echo form_error('email'); ?>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <?php echo $this->lang->line('submit'); ?>
                                </button>
                                <div class="bottom">
                                    <span class="helper-text">Know your password? <a
                                            href="<?php echo site_url('site/login') ?>"><?php echo $this->lang->line('admin_login'); ?></a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.backstretch.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/scripts.js"></script> -->
    <!--[if lt IE 10]>
            <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/placeholder.js"></script>
        <![endif]-->
</body>

</html>
<script type="text/javascript">
    $(document).ready(function () {
        //var base_url = '<?php echo base_url(); ?>';
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