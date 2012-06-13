<html>
	<head>
		<!-- Le styles -->
	    <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/bootstrap.css" rel="stylesheet">
	    <style>
	      body {
	        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	      }
	    </style>
	    <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/bootstrap-responsive.css" rel="stylesheet">

	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->

	    <!-- Le fav and touch icons -->
	    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    </head>
    <body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#">Установщик модулей</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li class="active"><a href="#">Главная</a></li>
							<li><a href="#about">О проекте</a></li>
							<li><a href="#contact">Контакты</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>

		<div class="container">
			<?php
			    foreach(Yii::app()->user->getFlashes() as $key => $message): ?>
			        <div class="alert alert-<?php echo $key?>">
					  <a class="close" data-dismiss="alert" href="#">×</a>
					  <?php echo $message; ?>
					</div>
			    
			<?php endforeach;?>
			<?php echo $content; ?>
		</div> <!-- /container -->

	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-transition.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-alert.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-modal.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-dropdown.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-scrollspy.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-tab.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-tooltip.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-popover.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-button.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-collapse.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-carousel.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl ?>/js/bootstrap-typeahead.js"></script>

	</body>
</html>