<?php 
	include 'contact-submit.php';
?>

<div class="row">
	<h3 class="title">Kontakt</h3>

	<p>Skontaktuj się ze mną, wypełniając formularz:</p>

	<?php echo $result; ?>
            
	<form method="POST" action="index.php#contact" enctype="multipart/form-data" class="form-horizontal">
	    <div class="form-group" style="padding: 10px; margin: 0px;">

	        <div class="col-sm-10">
	        <div class="input-group margin-bottom-sm">
	        	<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
	            <input type="email" name="email" class="form-control" placeholder="Twój email:" value="<?php
	        			// echo the email value if exists
	        			if (array_key_exists("email", $_POST)) {
                            if ($_POST["email"]) {
                            echo htmlspecialchars($_POST["email"]);
                            }
                        }
                ?>">
	        </div>
	        </div>
	        <div class="col-sm-2">
	            <button type="submit" name="submit" class="form-control" value="send">Wyślij&nbsp;&nbsp;<i class="fa fa-send-o" aria-hidden="true"></i></button>
	        </div>
	    </div>

	    <div class="form-group" style="padding: 10px; margin: 0px;">
	    	<div class="col-sm-12">
	        	<textarea class="form-control" rows="7" name="txtarea" placeholder="Szybka wiadomość:"><?php
	        			// echo the txtarea value if exists
	        			if (array_key_exists("txtarea", $_POST)) {
                            if ($_POST["txtarea"]) {
                            echo htmlspecialchars($_POST["txtarea"]);
                            }
                        }
                ?></textarea>
	    	</div>
	    </div>

	    <p>...lub napisz e-mail: <a href="mailto:roman@erla.pl"><i class="fa fa-envelope-o fa-1x" aria-hidden="true"></i> roman@erla.pl </a> 
	    <br> 
	    	albo zadzwoń: <a href="tel:+48509180864"><i class="fa fa-phone fa-1x" aria-hidden="true"></i> +48 509-180-864 <a href="tel:+48509180864"></a></p><br>

	</form>
</div>

<!-- 
<div class="input-group margin-bottom-sm">
  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
  <input class="form-control" type="text" placeholder="Email address">
</div> -->