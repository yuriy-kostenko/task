<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Light-IT</title>
		<link rel="shortcut icon" href="/img/Favicon_16x16.png">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    	<link rel="stylesheet" href="/css/style.css">
    	<script src="js/angular.min.js"></script>
    	<script src="js/angular-animate.js"></script>
    	<script src="js/ui-bootstrap-tpls-1.0.3.min.js"></script>
    	<script src="js/highcharts.js"></script>
    	<script src="js/highcharts-ng.js"></script>
    	<script src="js/script.js"></script>
    </head>

    <body ng-app="myApp">
		<header>
			<nav class="navbar navbar-default" ng-controller="CollapseCtrl">
		       	<div class="container">
				    <div class="row">    
				        <div class="navbar-header">
				            <button type="button" ng-click="isCollapsed = !isCollapsed" class="navbar-toggle">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
				            <a href="/" class="navbar-brand"><img src="/img/logo-task.png" alt="logo"></a>
				        </div>
				        <div class="collapse navbar-collapse" uib-collapse="isCollapsed" id="responsive-menu">
				            <ul class="nav navbar-nav navbar-right">
				                <li class="active"><a href="/">Home</a></li>
				            </ul>
				        </div>
				    </div>
				</div>
		    </nav>
	    
	    	<div class="header-image">
	    	  	<div class="container-fluid">
	        		<div class="row">
	        			<h1>Caesar cipher</h1>
	        		</div>
	      		</div>
	   		</div>
	  	</header>
		<main class="wrapp-content">
			<div class="container">
				<div class="row">
					<div ng-controller="ChipherController">
						<div ng-controller="diagramController">
							<form name="chipherForm">
				        		<div class="col-xs-12 col-sm-5">
				        			<textarea id="chipherText"  ng-model="chipher.text" required placeholder="Введите текст" class="form-control" rows="10"></textarea>
				        		</div>
				    
				        		<div class="control-panel col-xs-12 col-sm-2">
				        			<div class="row-y">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">ROT</span>
										<input id="chipherRot" class="form-control rotate" type="text" name="rot" ng-model="chipher.rot">
									</div>
									</div>
				        			<div class="row-y">
				        			<button class="btn btn-success" type="submit" ng-click="save(chipher, chipherForm)">Шифровать</button>
				        			</div>
				        			<div class="row-y">
				        			<button class="btn btn-primary" type="submit" ng-click="enc(chipher, chipherForm)">Расшифровать</button>
				        			</div>
				        		</div>

				        		<div class="col-xs-12 col-sm-5">
				        			<textarea name="text" ng-bind="response.text" class="form-control" disabled="disabled" rows="10"></textarea>
				        		</div>
				        	</form>
				        	<highchart id="chart1" config="highchartsNG"></highchart>
				        </div>
					</div>
				</div>
		    </div>
		</main>
		<footer class="site-footer">
			<div class="myinfo">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-8 about-me">
							<img src="/img/photo-work.jpg" alt="My Photo" class="img-circle">
							<p>Здравствуйте, меня зовут Юрий! Я занимаюсь веб-программированием не так давно, но уже уразумеваю перспективу этой работы, 
							помимо того, она приносит мне удовольствие и уверенность в будущем. Я думаю, Ваша компания станет для меня отличным стартом.</p>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4 my-contacts">
							<ul>
								<li><i class="fa fa-envelope"></i> <span>y.kostenko111@ya.ru</span></li>
								<li><i class="fa fa-phone-square"></i> <span>+380996351647</span></li>
								<li><i class="fa fa-skype"></i> <span>yuriy.kostenko.</span></li>
							</ul>
						</div>
					</div>
				</div>		
			</div>
			<div class="site-info">
				<div class="container">
					<div class="row">
						<p>&copy; 2016 - All Rights Reserved</p>
					</div>
				</div>
			</div>
		</footer>
    </body>
</html>