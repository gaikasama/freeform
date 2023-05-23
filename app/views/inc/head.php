<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta htttp-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title><?php echo SITENAME; ?></title>

     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="<?php echo URLROOT ?>favicon.ico?v=5">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-57x57.png?v=2">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-60x60.png?v=2">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-72x72.png?v=2">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-76x76.png?v=2">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-114x114.png?v=2">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-120x120.png?v=2">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-144x144.png?v=2">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-152x152.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URLROOT ?>/assets/favicon/apple-touch-icon-180x180.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URLROOT ?>/assets/favicon/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="194x194" href="<?php echo URLROOT ?>/assets/favicon/favicon-194x194.png?v=2">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo URLROOT ?>/assets/favicon/android-chrome-192x192.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT ?>/assets/favicon/favicon-16x16.png?v=2">
    <link rel="manifest" href="<?php echo URLROOT ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo URLROOT ?>/assets/favicon/safari-pinned-tab.svg?v=2" color="#1591e2">
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/assets/favicon/favicon.ico?v=2">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-TileImage" content="<?php echo URLROOT ?>/assets/favicon/mstile-144x144.png?v=2">
    <meta name="msapplication-config" content="<?php echo URLROOT ?>/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#1591e2">


    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css?=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/home.js"></script>
</head>


<?php if($data['title'] == 'Login page' || $data['title'] == 'Sign up') : ?>

    <body class="body__background">
<?php else : ?>

    <body class="body__background-main">
<?php endif; ?>

<header class="header">
    <div class="header__title">
        <h1 class="header__title-text <?php if(!isset($_SESSION['user_id'])) echo 'header__title-text--white'?>"><?php echo SITENAME?></h1>
    </div>

    <div class="header__navigation">

            <?php if(isset($_SESSION['user_id'])) : ?>
            <div  class="header__navigation-item">
                <a href="<?php echo URLROOT; ?>/users/logout" class=" button button--gray button--round">Log out</a>
            </div>
            <?php endif; ?>
            <div  class="header__navigation-item">
                <?php if(!isset($_SESSION['user_id'])) : ?>
                    <?php if($data['title'] == 'Login page') : ?>
                        <a href="<?php echo URLROOT ?>/users/register" class="button button--round">Sign Up</a>
                    <?php else : ?>
                        <a href="<?php echo URLROOT ?>" class="button button--round">Login</a>
                    <?php endif; ?>
                <?php endif; ?>

                    </div>
    </div>

</header>