<?php
include 'header.php';
?>

<!-- Page Header. -->
<header class="intro-header" style="background-image: url('<?= base_url('assets/img/home-bg.png')?>');">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="site-heading">
					<h1>Phileon</h1>
					<hr class="small">
					<span class="subheading">Een soort marktplaats, maar dan anders!</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<h1 class="text-center">Advertenties voor u</h1>
		</div>
		<?php
		foreach ( $set as $value ) {
			
			echo "<div class=\"col-lg-3 col-mod-3\">
					<a href=\"#x\"><img src=\"<?= base_url('assets/img/stamp1.png')?>\" alt=\"Image\" width=\"50%\" height=\"50%\" class=\"img-responsive\"></a>
					</div>";
		}
		?>
	</div>
	<div class="row">
		<?php foreach ( $set as $value ):?>
			<div class="col-lg-3 col-mod-3">
				<button>Like</button>
				<button>Dislike</button>
			</div>
		<?php endforeach; ?>
	</div>
</div>


<?php

include 'footer.php';
?>
