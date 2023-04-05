<section id="principal">
	<?php if($_SESSION['auth']): ?>
	<h2>Petit tableau récapitulatif</h2>
	
	<table><tr>
		<td class="type-2"><p>Je n'aime pas du tout/n'en mange pas/suis allergique.</p></td>
		<td class="type-1"><p>Je n'aime pas, sauf dans certain cas.</p></td>
		<td class="type0"><p>J'y suis indifférent.</p></td>
		<td class="type1"><p>J'aime bien.</p></td>
		<td class="type2"><p>J'aime beaucoup.</p></td>
		<td class="type-"><p>(Non renseigné)</p></td>
	</tr></table>
	
	<br/>
	
	<form method="POST">
	<input
		type="submit"
		id="important"
		value="Appliquer les changements"
	/>
	<table id="table-ingredients">
		<tr>
		<th id="case-ingredient">Ingrédient</th>
		<?php foreach($listeHumains as $idHumain => $humain): ?>
			<th><?= $humain['nom'] ?></th>
		<?php endforeach ?>
		</tr>
		<?php foreach($aAimeHumain as $idIngredient => $relationIngredient): ?>
		<tr>
			<td><?= $relationIngredient['nom'] ?></td>
			<?php foreach($listeHumains as $idHumain => $humain): ?>
			<td class="type<?= isset($relationIngredient['aime'][$idHumain]) ? $relationIngredient['aime'][$idHumain] : '-' ?> case" id="c <?= $idHumain . " " . $idIngredient?>">
				<div>
					<?php for($i=-2; $i <= 2; $i++): ?>
						<input
							type="radio"
							class="type<?= $i ?> inputChoixNiveau"
							name="aime<?= "[" . $idIngredient . "][" . $idHumain . "]" ?>"
							id="i<?= $idIngredient . " " . $idHumain . " " . $i ?>"
							value="<?= $i ?>"
						/>
					<?php endfor ?>
					<input
						type="radio"
						class="type- inputChoixNiveau"
						name="aime[<?= $idIngredient ?>][<?= $idHumain ?>]"
						id="i <?= $idIngredient ?> <?= $idHUmain ?>"
						value="-"
					/>
				</div>
			</td>
			<?php endforeach ?>
		</tr>
		<?php endforeach ?>
	</table>
	<input
		type="submit"
		id="important"
		value="Appliquer les changements"
	/>
	</form>
	<?php else: ?>
	<p>Vous devez être conneté(e) pour voir cette page ! </p>
	<?php endif ?>
</section>
