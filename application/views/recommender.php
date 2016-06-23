<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/7.1.0/css/bootstrap-slider.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--<nav class="navbar navbar-inverse navbar-fixed-top">-->
<!--    <div class="container">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a class="navbar-brand" href="#">Project name</a>-->
<!--        </div>-->
<!--        <div id="navbar" class="navbar-collapse collapse">-->
<!--            <form class="navbar-form navbar-right">-->
<!--                <div class="form-group">-->
<!--                    <input type="text" placeholder="Email" class="form-control">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="password" placeholder="Password" class="form-control">-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-success">Sign in</button>-->
<!--            </form>-->
<!--        </div><!--/.navbar-collapse -->
<!--    </div>-->
<!--</nav>-->

<!-- Main jumbotron for a primary marketing message or call to action -->
<!--<div class="jumbotron">-->
<!--    <div class="container">-->
<!--        <h1>Hello, world!</h1>-->
<!--        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>-->
<!--    </div>-->
<!--</div>-->
<div class="container">
    <!-- Example row of columns -->
    <div class="row" style="padding-top: 30px">
        <div class="col-md-6">
            <form method="post" class="form-horizontal">
                <?php foreach ($tags as $item=>$key):?>
                    <div class="form-group" style="padding-top: 10px;">
                        <label class="col-sm-2 control-label"><?=$item?></label>
                        <div class="col-sm-10">
                            <input class="slider" name="field[<?=$item?>]" data-slider-id='ex1Slider' type="text" data-slider-min="-1" data-slider-max="1" data-slider-step="0.01" data-slider-value="<?=$key?>"/>
                        </div>
                    </div>
                <?php endforeach;?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <?php foreach ($objects as $item):?>
                    <li class="list-group-item">
                        <span class="badge"><?=round($item->score*100,0)?></span>
                        <?=$item->name?>
                        <? foreach($item->getPreferences() as $tag=>$value):?>
                            <span class="label label-primary"><?=$tag?></span>
                        <? endforeach;?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; 2015 Company, Inc.</p>
    </footer>
</div> <!-- /container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/7.1.0/bootstrap-slider.min.js"></script>

<script>
    $(function() {
        $('.slider').slider({
            formatter: function (value) {
                return 'Current value: ' + value;
            }
        });
    });
</script>

</body>
</html>