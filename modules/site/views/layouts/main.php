<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;

use app\modules\users\widgets\LoginForm\LoginForm;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title><?php echo Html::encode($this->title); ?></title>
	<?php $this->head(); ?>
</head>
<body>
<div class="container">
	<?php $this->beginBody(); ?>
	<div class="masthead">
		<a href="<?php echo Yii::$app->homeUrl; ?>"><h3 class="muted">Demo App</h3></a>

		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<?php echo Menu::widget(array(
						'options' => array('class' => 'nav'),
						'encodeLabels' => false,
						'items' => array(
							array('label' => 'Home', 'url' => array('site/default/index')),
							array('label' => 'Users', 'url' => array('users/default/index')),
							array('label' => 'Blogs', 'url' => array('blogs/default/index')),
							array('label' => 'About', 'url' => array('site/default/about')),
							array('label' => 'Contact', 'url' => array('site/default/contact')),
							Yii::$app->user->isGuest ?
								array('label' => 'Login', 'url' => array('users/default/login'), 'options' => array('data-toggle' => 'modal', 'data-target' => '#LoginForm') ) :
								array('label' => 'Logout (' . Yii::$app->user->identity->username .')' , 'url' => array('users/default/logout')),
						),
					)); ?>
				</div>
			</div>
		</div>
		<!-- /.navbar -->
	</div>

	<?php echo Breadcrumbs::widget(array(
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : array(),
	)); ?>
	<?php echo $content; ?>

	<hr>

	<div class="footer">
		<p>&copy; My Company <?php echo date('Y'); ?></p>
		<p>
			<?php echo Yii::powered(); ?>
			Template by <a href="http://twitter.github.io/bootstrap/">Twitter Bootstrap</a>
		</p>
	</div>
	<?php $this->endBody(); ?>
</div>
<?php echo Toolbar::widget(); ?>
</body>
</html>
<?php $this->endPage(); ?>