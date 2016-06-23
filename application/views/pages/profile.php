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
<h1 class="text-center">Profiel van <?=$user->username?></h1>








<table class="table table-condensed">
  <thead>
    <tr>
      <th>Omschrijving</th>
      <th>Gegevens</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Gebruikersnaam</td>
      <td><?=$user->username?></td>
    </tr>
    <tr>
      <td>Voornaam</td>
      <td><?=$user->firstname?></td>
    </tr>
    <tr>
      <td>Achternaam</td>
      <td><?=$user->lastname?></td>
    </tr>
    <tr>
      <td>Adres</td>
      <td><?=$user->address?></td>
    </tr>
    <tr>
      <td>Postcode</td>
      <td><?=$user->postalcode?></td>
    </tr>
    <tr>
      <td>Woonplaats</td>
      <td><?=$user->city?></td>
    </tr>
    <tr>
      <td>Emailadres</td>
      <td><?=$user->email?></td>
    </tr>
  </tbody>
</table>




</div>




</div>