
<section>
	<article>

		<form action="index.php?action=login" method="POST" id="form-login">
			<p>
				Login : <input type="text" name="username" />
			</p>
			<p>
				Password : <input type="password" name="password" />
			</p>
			<input type="submit" name="connection" value="Connexion" />
		</form>

		<p id="login-notification">
				<?php echo $notification; ?><br> 
			<button type="button"
				onclick="alert('Entrez votre numéro de matricule/login et choississez un mot de passe.')">Nouvel utilisateur?</button>

		</p>
	</article>
</section>