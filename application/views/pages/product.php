<div style="background-image: url('<?= base_url('assets/img/home-bg.png')?>');">
<br><br>
    <div class="container" style="background-color: #fff;">

        <div class="row">

            <div class="col-md-2">
                <div class="list-group">
                    <div class="list-group-item text-center"><b>Tags</b></div>
                    <?php foreach ($product->tags as $tag){ ?>
                        <div class="list-group-item">- <?= $tag['name'] ?></div >
                    <?php }; ?>
                </div>
                <div class="list-group">
                    <div class="list-group-item text-center"><b>Gecreëerd door:</b></div>
                        <div class="list-group-item"><?= $product->createdBy; ?></div >
                    <div class="list-group-item text-center"><b>Start datum:</b></div>
                        <div class="list-group-item"><?= $product->startDate; ?></div >
                    <div class="list-group-item text-center"><b>Eind datum:</b></div>
                        <div class="list-group-item"><?= $product->endDate; ?></div >
                </div>
                <div class="list-group">
                    <form action="bid" method="post">
                    <div class="list-group-item text-center"><b>Plaats bod:</b></div>
                    <div class="list-group-item">
                        <input style="width: 100%" type="number" name="bid" min="<?=$product->getHighestBid()['bid']+5?>" value="<?=$product->getHighestBid()['bid']+5?>"></div >
                        <input type="hidden" name="id" value="<?=$product->id?>">
                        <?= $user;?>
                    <div class="list-group-item text-center"><input type="submit" class="btn btn-info btn-sm"></div>
                    </form>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
<!--                    --><?php //foreach ($product->images as $image){ ?>
<!--                    <img class="img-responsive" src="--><?//= $tag['id'] ?><!----><?//= $tag['id'] ?><!--" alt="">-->
<!--                    --><?php //}; ?>
                    <div class="caption-full">
                        <?php foreach ($product->bids as $bid){ ?>
                        <div class="pull-right"><b>Huidige bod</b> € <?= $bid['bid'] ?></div>
                        <?php }; ?>
                        <h2><?= $product->productName; ?></h2><br>
                            <p><?= $product->description; ?></p>
                    </div>
                </div>

                <div class="well col-md-offset-1">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-10">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>
                    <hr>
                </div>

            </div>

        </div>

    </div>
    <br><br>
</div>

