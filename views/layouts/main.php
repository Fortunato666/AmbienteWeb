<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="<?php echo Yii::$app->getUrlManager()->baseUrl;?>/js/jquery.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Municipio', 'url' => ['/site/indexmunicipio']],
            ['label' => 'Departamento', 'url' => ['/site/indexdepartamento']],
            ['label' => 'Clientes', 'url' => ['/site/indexclientes']],
            ['label' => 'Productos', 'url' => ['/site/indexproducto']],
            ['label' => 'Facturas', 'url' => ['/site/indexfactura']],
            ['label' => 'Detalle Factura', 'url' => ['/site/ventas']],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <a href="">Trabajo Final</a>
      <ul>
        <li>
          <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/indexmunicipio");?>" class="dropdown-item">
              <i class="tim-icons icon-paper"></i>Municipios
            </a>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/indexdepartamento");?>" class="dropdown-item">
              <i class="tim-icons icon-paper"></i>Departamentos
            </a>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/indexclientes");?>" class="dropdown-item">
              <i class="tim-icons icon-paper"></i>Clientes
            </a>
            <a href="<?php echo Yii::$app->getUrlManager()->createUrl("site/indexproducto");?>" class="dropdown-item">
              <i class="tim-icons icon-paper"></i>Productos
            </a>
            <a href="#" class="dropdown-item">
              <i class="tim-icons icon-paper"></i>consultar Pedidos
            </a>
        </li>
      </ul>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<script src="<?php echo Yii::$app->getUrlManager()->baseUrl;?>/js/util.js"></script>
<?php $this->endPage() ?>

