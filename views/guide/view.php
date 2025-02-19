<?php
/**
 * @var $this yii\web\View
 * @var $guide app\models\Guide
 * @var $section app\models\GuideSection
 */
use app\components\SideNav;
use yii\helpers\Html;

$nav = [];
foreach ($guide->chapters as $chapterTitle => $sections) {
    $items = [];
    foreach ($sections as $sectionTitle => $sectionName) {
        $items[] = [
            'label' => $sectionTitle,
            'url' => ['guide/view', 'section' => $sectionName, 'language' => $guide->language, 'version' => $guide->version, 'type' => $guide->typeUrlName],
            'active' => $section->name === $sectionName,
        ];
    }
    $nav[] = [
        'label' => $chapterTitle,
        'items' => $items,
    ];
}

$this->title = $section->getPageTitle();
$this->registerJs('
$(document).ready(function () {
  $(\'[data-toggle="offcanvas"]\').click(function () {
    $(\'.row-offcanvas\').toggleClass(\'active\')
  });
});
');
?>
<div class="container guide-view lang-<?= $guide->language ?>" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-xs-7 col-sm-8">
            <h1 class="guide-headline"><?= Html::encode($guide->title) ?></h1>
        </div>
        <div class="col-xs-5 col-sm-4">
            <?= $this->render('_versions.php', ['guide' => $guide, 'section' => $section]) ?>
        </div>
    </div>

    <div class="row row-offcanvas">
        <div class="col-sm-3">
            <?= SideNav::widget(['id' => 'guide-navigation', 'items' => $nav, 'options' => ['class' => 'sidenav-offcanvas']]) ?>
        </div>
        <div class="col-sm-9" role="main">
            <div class="guide-content content">
              <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
              </p>
                <?php if (!empty($missingTranslation)): ?>
                    <div class="alert alert-warning">
                        <strong>This section is not translated yet.</strong> <br />
                        Please read it in English and consider
                        <a href="https://github.com/yiisoft/yii2/blob/master/docs/internals/translation-workflow.md">
                        helping us with translation</a>.
                    </div>
                <?php endif ?>
                <?= $section->content ?>

                <div class="prev-next clearfix">
                    <?php
                    if (($prev = $section->getPrevSection()) !== null) {
                        $left = '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> ';
                        echo '<div class="pull-left">' . Html::a($left . Html::encode($prev[1]), ['guide/view', 'section' => $prev[0], 'version' => $guide->version, 'language' => $guide->language, 'type' => $guide->typeUrlName]) . '</div>';
                    }
                    if (($next = $section->getNextSection()) !== null) {
                        $right = ' <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
                        echo '<div class="pull-right">' . Html::a(Html::encode($next[1]) . $right, ['guide/view', 'section' => $next[0], 'version' => $guide->version, 'language' => $guide->language, 'type' => $guide->typeUrlName]) . '</div>';
                    }
                    echo '<div class="text-center"><a href="#">Go to Top <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></div>';
                    ?>
                </div>

                <?php if (($editUrl = $section->editUrl) !== false): ?>
                <div class="edit-icon"><i class="fa fa-github"></i></div>
                <p class="lang-en">
                    <em>Found a typo or you think this page needs improvement?<br />
                        <a href="<?= $editUrl; ?>">Edit it on github</a>!</em>
                </p>
                <?php endif; ?>
            </div>

            <?= \app\components\Comments::widget([
                'objectType' => 'guide',
                'objectId' => $section->name. '-' . $guide->version,
            ]) ?>
        </div>
    </div>
</div>
