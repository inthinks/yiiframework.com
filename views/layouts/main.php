<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?= Yii::getAlias('@web/favicon.ico') ?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::getAlias('@web/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::getAlias('@web/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::getAlias('@web/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::getAlias('@web/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Yii::getAlias('@web/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Yii::getAlias('@web/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Yii::getAlias('@web/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Yii::getAlias('@web/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::getAlias('@web/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= Yii::getAlias('@web/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::getAlias('@web/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::getAlias('@web/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= Yii::getAlias('@web/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#4394F0">
    <meta name="msapplication-TileImage" content="<?= Yii::getAlias('@web/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#4394F0">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?= Html::csrfMetaTags() ?>
    <?= Html::cssFile(YII_DEBUG ? '@web/css/all.css' : '@web/css/all.min.css?v=' . filemtime(Yii::getAlias('@webroot/css/all.min.css'))) ?>
    <?php $this->registerJs('yiiBaseUrl = ' . \yii\helpers\Json::htmlEncode(Yii::$app->request->getBaseUrl()), \yii\web\View::POS_HEAD); ?>

    <title><?php if (!empty($this->title)): ?><?= Html::encode($this->title) ?> - <?php endif?>Yii PHP Framework</title>
    <?php $this->head() ?>
</head>
<body class="color-yii">
<?php $this->beginBody() ?>

    <div id="page-wrapper" class="">

	<!-- ==========================
    	HEADER - START
    =========================== -->
  <div class="top-header hidden-xs hidden-sm hidden-md">
      <div class="container">
          <div class="pull-left">
              <div class="header-item"><?= Html::a('The Definitive Guide', ['guide/entry']) ?></div>
              <div class="header-item"><?= Html::a('Class Reference', ['api/index', 'version' => reset(Yii::$app->params['api.versions'])]) ?></div>
          </div>
          <div class="pull-right">
              <?php if (Yii::$app->user->isGuest): ?>
                  <div class="header-item"><?= Html::a('<i class="fa fa-sign-in"></i>Login</a>', ['/site/login']) ?></div>
                  <div class="header-item"><?= Html::a('<i class="fa fa-user"></i>Sign up</a>', ['/site/signup']) ?></div>
              <?php else: ?>
                  <div class="header-item">Welcome, <?= Yii::$app->user->identity->username ?>!</div>
                  <div class="header-item"><?= Html::a('<i class="fa fa-sign-out"></i>Logout</a>', ['/site/logout'], ['data-method' => 'post']) ?></div>
              <?php endif; ?>
              <ul class="brands brands-inline brands-tn brands-circle main">
                  <li><a href="https://github.com/yiisoft/yii2"><i class="fa fa-github"></i></a></li>
                  <li><a href="https://twitter.com/yiiframework"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="https://www.facebook.com/groups/yiitalk/"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://www.linkedin.com/groups/yii-framework-1483367"><i class="fa fa-linkedin"></i></a></li>
                  <!--li><a href="#"><i class="fa fa-google-plus"></i></a></li-->
              </ul>
          </div>
      </div>
  </div>
  <div class="clearfix"></div>
	<header class="navbar navbar-inverse navbar-static">
    	<div class="container">
            <div id="main-nav-head" class="navbar-header">
                <a href="<?= Yii::$app->homeUrl ?>" class="navbar-brand">
                    <img src="<?= Yii::getAlias('@web/image/logo36.png') ?>" class="logo" alt="Yii Framework">
                    <?php /* <object type="image/svg+xml" data="<?= Yii::getAlias('@web/logo.svg') ?>" class="logo"></object><span class="hidden-sm"> Yii Framework</span>*/ ?>
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-inverse fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse navbar-right">
                <?php

                    // main navigation
                    echo Nav::widget([
                        'id' => 'main-nav',
                        'encodeLabels' => false,
                        'options' => ['class' => 'nav navbar-nav navbar-main-menu'],
                        'activateItems' => false,
                        'dropDownCaret' => '<i class="fa fa-chevron-down"></i>',
                        'items' => [
                            ['label' => 'Learn', 'items' => [
                                ['label' => '<i class="fa fa-angle-double-right"></i>Getting started', 'url' => ['site/tour']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>The Definitive Guide', 'url' => ['guide/entry']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>API Documentation', 'url' => ['api/index', 'version' => reset(Yii::$app->params['api.versions'])]],
                                //['label' => '<i class="fa fa-angle-double-right"></i>Tutorials<span class="label label-warning">coming soon</span>', 'url' => 'https://yiicamp.com/tutorials'],
                                //['label' => '<i class="fa fa-angle-double-right"></i>Answers<span class="label label-warning">coming soon</span>', 'url' => 'https://yiicamp.com/answers'],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Books', 'url' => ['site/books']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Resources', 'url' => ['site/resources']],
                            ]],
                            ['label' => 'Develop', 'items' => [
                                ['label' => '<i class="fa fa-angle-double-right"></i>Install Yii', 'url' => ['site/download']],
                                //['label' => '<i class="fa fa-angle-double-right"></i>Extensions<span class="label label-warning">coming soon</span>', 'url' => 'https://yiicamp.com/extensions'],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Report an Issue', 'url' => ['site/report-issue']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Report a Security Issue', 'url' => ['site/security']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Contribute to Yii', 'url' => ['/site/contribute']],
                                //['label' => '<i class="fa fa-angle-double-right"></i>Jobs<span class="label label-warning">coming soon</span>', 'url' => 'https://yiicamp.com/jobs'],
                            ]],
                            ['label' => 'Discuss', 'items' => [
                                ['label' => '<i class="fa fa-angle-double-right"></i>Forum', 'url' => '/forum'],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Live Chat', 'url' => ['site/chat']],
                            ]],
                            ['label' => 'About', 'items' => [
                                ['label' => '<i class="fa fa-angle-double-right"></i>What is Yii?', 'url' => ['site/about']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>News', 'url' => ['site/news']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>License', 'url' => ['site/license']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Team', 'url' => ['site/team']],
                                ['label' => '<i class="fa fa-angle-double-right"></i>Official logo', 'url' => ['site/logo']],
                            ]],
                            ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest, 'options' => ['class' => 'hidden-lg']],
                            ['label' => 'Signup', 'url' => ['site/signup'], 'visible' => Yii::$app->user->isGuest, 'options' => ['class' => 'hidden-lg']],
                            ['label' => 'Logout', 'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => ['data-method' => 'post'], 'options' => ['class' => 'hidden-lg']],
                        ],
                    ]);
?>
                <!-- Search dropdown - only visible on larger screens -->
                <ul class="nav navbar-nav visible-lg">
                    <li class="dropdown search-form-toggle">
                        <a href="#" class="dropdown-toggle" title="Search" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                        <ul class="dropdown-menu navbar-search-form">
                          	<li>
                                <?= $this->render('_searchForm'); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- ==========================
    	HEADER - END
    =========================== -->

    <?= $content ?>

    <!-- ==========================
    	FOOTER - START
    =========================== -->
    <footer>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4">
                	<div class="footer-header"><i class="fa fa-flag fa-1g"></i>Contact</div>
                    <p class="contact-text">Use <?= Html::a('contact form', ['site/contact']) ?> if you have consulting requests or any other proposals.</p>
                    <ul class="brands brands-inline brands-sm brands-transition brands-circle">
                        <li><a href="https://github.com/yiisoft/yii2" class="brands-github"><i class="fa fa-github"></i></a></li>
                    	<li><a href="https://twitter.com/yiiframework" class="brands-twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/groups/yiitalk/" class="brands-facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/groups/yii-framework-1483367" class="brands-linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>

                <div class="col-md-4 fa-1g">
                	<div class="footer-header"><i class="fa fa-heart-o"></i>Our supporters</div>
                    <div class="row" id="latest-work-footer">
						<div class="overlay-wrapper col-sm-6">
                            <a href="https://www.jetbrains.com/"><img src="<?= Yii::getAlias('@web/image/logo_jetbrains.png') ?>" class="img-responsive" alt="JetBrains"></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hidden-xs hidden-sm">
                	<div class="footer-header"><i class="fa fa-envelope"></i>Newsletter</div>
                    <p class="contact-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec lorem quis est ultrices volutpat.</p>
                    <form>
                    	<fieldset>
                        	<div class="form-group nospace">
                            	<div class="input-group">
                                    <input type="email" class="form-control" id="email" placeholder="Put your email" required>
                                    <span class="input-group-btn"><button class="btn btn-primary" type="button">Submit</button></span>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>&copy; 2015 Yii Software LLC | <?= Html::a('Terms of service', ['/site/tos']) ?></p>
                </div>
            </div>
        </div>
    </footer>
    </div>
   	<!-- ==========================
    	JS
    =========================== -->
    <?= Html::jsFile(YII_DEBUG ? '@web/js/all.js' : '@web/js/all.min.js?v=' . filemtime(Yii::getAlias('@webroot/js/all.min.js'))) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
