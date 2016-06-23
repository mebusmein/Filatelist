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
<h1 class="text-center">Account Profiel</h1>

<form>
 <div class="form-group">
    <label for="Username">Gebruikersnaam</label>
    <input type="text" class="form-control" id="Username" placeholder="<?=$user->username?>">
  </div>
   <div class="form-group">
    <label for="Firstname">Voornaam</label>
    <input type="text" class="form-control" id="Firstname" placeholder="<?=$user->firstname?>">
  </div>
  <div class="form-group">
    <label for="Lastname">Achternaam</label>
    <input type="text" class="form-control" id="Lastname" placeholder="<?=$user->lastname?>">
  </div>
    <div class="form-group">
    <label for="Address">Adres</label>
    <input type="text" class="form-control" id="Address" placeholder="<?=$user->address?>">
  </div>
    <div class="form-group">
    <label for="Postalcode">Postcode</label>
    <input type="text" class="form-control" id="Postalcode" placeholder="<?=$user->postalcode?>">
  </div>
    <div class="form-group">
    <label for="City">Woonplaats</label>
    <input type="text" class="form-control" id="City" placeholder="<?=$user->city?>">
  </div>
  <div class="form-group">
    <label for="Email">Emailadres</label>
    <input type="email" class="form-control" id="Email" placeholder="<?=$user->email?>">
  </div>
  <div class="form-group">
    <label for="Password">Wachtwoord</label>
    <input type="password" class="form-control" id="Password" placeholder="secrets">
  </div>
  <button type="submit" class="btn btn-default center-block">Wijzigen</button>
</form>



</div>




</div>