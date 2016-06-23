
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
	</div>
	<div class="row">
		<?php
		foreach ( $products as $product ) :
			?>
			
			<div class="pull-left" style="width: 292px; height: 300px">
			<h4><?= $product->productName?></h4>
			<a href="<?= site_url('app/product/'.$product->id)?>"><img
				src="<?= base_url('assets/img/stamp1.png')?>" alt="Image"
				width="50%" height="50%" class="img-responsive"></a> <small>&euro; <?= $product->getHighestBid()['bid']?>,-</small>
			<br>
			<div class="btn-group btn-group-xs" role="group" aria-label="...">
				<button type="button" class="btn btn-success">Like</button>
				<button type="button" class="btn btn-danger">Dislike</button>
			</div>
			<div class="clearfix"></div>
			<div class="btn-group btn-group-xs" role="group" aria-label="...">
				<?php foreach($product->tags as $tag):?>
					<button type="button" class="btn btn-default"><?= $tag['tag'] ?></button>
				<?php endforeach;?>
				</div>

		</div>
		<?php endforeach; ?>
	</div>
</div>