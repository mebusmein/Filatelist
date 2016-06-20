<!-- Page Header -->
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

<!-- Main Content -->
<div class="container">

    <!-- search bar -->
    <div class="row">
        <h1 class="text-center">- ZOEKEN -</h1>
        <div class="form-group">
            <input type="text" class="form-control" id="searchbar" placeholder="Snel zoeken naar een product...">
        </div>
    </div>
</div>

<!-- Carousel -->
<div class="row" style="background-color: #EEA566;">
    <h1 class="text-center">- SPOTLIGHT -</h1>
    <hr>
    <div class="col-md-12">
        <div class="well">
            <div id="myCarousel" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp1.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp2.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp1.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp2.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp2.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp1.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp2.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-2 col-sm-offset-1"><a href="#x"><img src="<?= base_url('assets/img/stamp1.png')?>" alt="Image" class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                </div>
            </div>
            <!--/myCarousel-->
        </div>
        <!--/well-->
    </div>
</div>

<!-- POPULAR TAGS -->
<div class="row">

    <h1 class="text-center">- POPULAIRE TAGS -</h1>

    <hr>

    <form role="form">
        <div class="form-group " style="padding-right: 10px;">
            <div class="col-xs-2" style="margin: 0 2% 0 0;">
                <input type="text" class="form-control" placeholder="#TAG" readonly="readonly">
            </div>
            <!--voorbeeld-->
            <div class="col-xs-2" style="margin: 0 2% 0 0;">
                <input type="text" class="form-control" placeholder="#TAG" readonly="readonly">
            </div>
            <!--voorbeeld-->
            <div class="col-xs-2" style="margin: 0 2% 0 0;">
                <input type="text" class="form-control" placeholder="#TAG" readonly="readonly">
            </div>
        </div>
    </form>
</div>

<br>

<!-- NEWS -->
<div class="row news-background">

    <h1 class="text-center">- NIEUWS -</h1>

    <hr>

    <div class="col-md-10 col-md-offset-1">

        <div class="post-preview col-md-5">
            <h5 class="post-title">
                I have a dream, that one day we will finish this project.
            </h5>
            <p class="post-meta">Posted by Martin Luther King on 28 augustus 1963</p>

            <ul class="pager">
                <li class="next">
                    <a href="#">Lees meer &rarr;</a>
                </li>
            </ul>

        </div>

        <div class="post-preview col-md-5 col-md-offset-1">
            <h5 class="post-title">
                We cannot solve our problems with the same thinking we used when we created them.
            </h5>
            <p class="post-meta">Posted by A. Einstein on March 14, 1899</p>

            <ul class="pager">
                <li class="next">
                    <a href="#">Lees meer &rarr;</a>
                </li>
            </ul>
            <br>
        </div>

    </div>

</div>

</div>
