<div style="background-image: url('<?= base_url('assets/img/home-bg.png')?>');">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Product op veiling plaatsen</h1>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Naam</label>
                                        <input type="input" name="name" class="form-control" id="name" placeholder="Naam product">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Omschrijving</label>
                                        <textarea name="description" class="form-control" id="description" placeholder="Omschrijving">
                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="start">Start waarde</label>
                                        <input type="number" name="start" class="form-control" id="start" value="0">
                                    </div>
                                    <div class="form-group">
                                        <? get_instance()->load->model('tag');
                                        foreach(Tag::all() as $key => $tag): ?>
                                        <span><?=$tag->name?></span><input type="checkbox" name="tag[<?=$tag->name?>]" class="form-control" id="tag<?=$key?>" placeholder="Naam product">
                                        <? endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
