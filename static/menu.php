<nav>
	<a href="index.php?"><p>Accueil</p></a>
	<a href="index.php?page=connexion">
		<p>
			<?= !$_SESSION['auth'] ? 'Se connecter' : 'Se déconnecter'?>
			<span class="<?= $_SESSION['auth'] ? 'lock' : 'unlock' ?>">
				<img
					src="contenus/<?= $_SESSION['auth'] ? 'closed_lock' : 'open_lock' ?>.svg"
				/>
			</span>
		</p>
	</a>
</nav>