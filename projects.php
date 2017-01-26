
<div class="row">

<h3 class="title">Zrealizowane projekty</h3>

<?php
	include 'database.php';
?>




	<div class="col-sm-12">

		
		<div class="information-area">
			<?php echo $projectsArray[0]["title"]; ?><br>
			<?php echo $projectsArray[0]["date"]; ?>
		</div>

		<div class="main-wrapper">

			<div class="nav-box-left">
			  <div class="box-out">
			    <div class="box-in">
			      <i class="fa fa-angle-double-left fa-2x" style="color: #ECA72C;" id="btn-left"></i>
			    </div>
			  </div>
			</div>

			<div class="slider-wrapper">
  				<ul>

					<?php
					for ($i=0; $i < count($projectsArray); $i++) { ?>

						<li id="<?php echo 'project'.$i; ?>" style="background-image: url('<?php echo $projectsArray[$i]["image"]; ?>')" data-date="<?php echo $projectsArray[$i]["date"]; ?>" data-name="<?php echo $projectsArray[$i]["title"]; ?>">
					     
					      <div class="bait">
					      	
							<span class="fa-stack fa-lg">
							  <i class="fa fa-circle-o fa-stack-2x"></i>
							  <i class="fa fa-info fa-stack-1x fa-inverse" style="color: #31263E;"></i>
							</span>

					      </div>


					      <div class="description">
					      	<div class="title">
					      		<?php echo $projectsArray[$i]["title"]; ?>
					      	</div>
					      	<div class="teaser">
					      		<span class="fa-stack fa-lg">
								  <i class="fa fa-square fa-stack-2x" style="color: #ECA72C;"></i>
								  <i class="fa fa-info fa-stack-1x fa-inverse" style="color: #31263E;"></i>
								</span>

					      		<?php echo $projectsArray[$i]["desc"]; ?>
					      	</div>
					      	<div class="buttons-area">
					      		<button id="btn-gallery" data-project-id="<?php echo 'project'.$i; ?>"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Galeria strony</button>
					      		<a href="<?php echo $projectsArray[$i]["href"]; ?>" target="_blank">
					      		<button><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Strona w Internecie</button>
					      		</a>
					      	</div>

							<ul class="full-page-imgs">
								<?php 
								if (array_key_exists('fullpageimgs', $projectsArray[$i])) {
									$counter = 1;
									$total = count($projectsArray[$i]["fullpageimgs"]);
									foreach ($projectsArray[$i]["fullpageimgs"] as $href) {
										echo '<li data-img="'.$href.'" data-desc="'.$projectsArray[$i]["title"].' - '.$counter.'/'.$total.'"></li>';
										$counter++;
									}
								}
								?>
							</ul>
					      </div><!-- description -->



					    </li>
							
					<?php
					} ?>

				</ul>
			</div>

			<div class="nav-box-right">
			  <div class="box-out">
			    <div class="box-in">

						  <i class="fa fa-angle-double-right fa-2x" style="color: #ECA72C;" id="btn-right"></i>

			    </div>
			  </div>
			</div>
    
		</div>


		



		<div class="thumbnails">
		   <ul>
	   		<?php
	   			for ($i=0; $i < count($projectsArray); $i++) {

	   				$class = "";
	   				if ($i==0) {
	   					$class="selected";
	   				}
	   		?>

		    	<li style="background-image: url('<?php echo $projectsArray[$i]["image"]; ?>')" class="<?php echo $class; ?>"></li>
	    	<?php
	    		}
	    	?>
		  </ul>
		</div>

	</div><!-- col -->

</div><!-- row -->


