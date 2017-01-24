		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		<noscript>
			ERROR:  Javascript must be enabled to play.  Please enable Javascript in your browser's settings and reload the page. 
			 ┻━┻ ︵ヽ(`Д´)ﾉ︵﻿ ┻━┻
		</noscript>
		
		<h1>Simultanks</h1>
		<div class="container">
			<?php if ($message != 'undefined'){
				echo $message;
			}
			?>
			<form class="pure-form" action='add_player.php' method="get">
				<fieldset>
					<div class="pure-control-group">
						<label for="name" class="text-signin">Name (Limit 12 Characters)</label>
						<input id="username" name="playerName" class="pure-input-1 jbg-input" type="text" tabindex="2" placeholder="ENTER YOUR NAME" style="text-transform:uppercase;" maxlength="12" value="" autocapitalize="off" autocorrect="off" autocomplete="off">
					</div>
				</fieldset>

				<div class="pure-u-3-3 center">
					<div style="margin-left:5px; margin-right:5px;">
						<input type="submit" value="CONTINUE" id="button-join" tabindex="3" class="button-signin button-blue button-xlarge pure-button">
					</div>
				</div>
			</form>
		</div>