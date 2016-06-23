<div style="background-image: url('<?= base_url('assets/img/home-bg.png')?>');">
<br>$u
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-login">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <h1>Account aanpassen</h1>
            </div>
            <hr>
        </div>
    </div>
<div class="panel-body">
<div class="row">
    <div >
        <table class="col-md-offset-2">
            <tr>
                <td class="col-md-4">Gebruikersnaam: </td>
                <td class="col-md-4"><?=$user->username?></td>
            </tr>
            <tr>
                <td class="col-md-4">Email: </td>
                <td class="col-md-4"><?=$user->email?></td>
            </tr>
            <tr>
                <td class="col-md-4">Voornaam: </td>
                <td class="col-md-4"><?=$user->firstname?></td>
            </tr>
            <tr>
                <td class="col-md-4">Achternaam: </td>
                <td class="col-md-4"><?=$user->lastname?></td>
            </tr>
            <tr>
                <td class="col-md-4">Adres: </td>
                <td class="col-md-4"><?=$user->address?></td>
            </tr>
            <tr>
                <td class="col-md-4">Postcode: </td>
                <td class="col-md-4"><?=$user->postalcode?></td>
            </tr>
            <tr>
                <td class="col-md-4">Woonplaats: </td>
                <td class="col-md-4"><?=$user->city?></td>
            </tr>
        </table>
        <br>
        <div class="col-sm-6 col-sm-offset-3">
            <a class="btn btn-login" href="<?=site_url('account/edit')?>">gegevens wijzigen</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
