	<section>
		<!-- array student details -->
		<article>
			<!-- return to level button-->
			<button type="button">
				<a href="index.php?action=levels&serial=<?php echo $serial?>">Retour</a>
			</button>
			
			<?php 
				if($showArray){
			?>
					<table id="arrayStudent">
						<thead>
							<tr>
								<th>Matricule</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Dernière connexion</th>
								<th>Progression</th>
							</tr>
						</thead>
						<tbody>
						<?php for ($i=0;$i<count($arrayStudent);$i++) { ?>
							<tr>
								<td><?php echo $arrayStudent[$i]->serial() ?></td>
								<td><?php echo $arrayStudent[$i]->name() ?></td>
								<td><?php echo $arrayStudent[$i]->surname() ?></td>
								<td><?php echo $arrayStudent[$i]->last_login() ?></td>
								<td><?php echo(int)Db::getInstance()->get_percentage($arrayStudent[$i]->serial())?>%</td> 
							</tr>
						<?php } ?>
						</tbody>
					</table>
			<?php 
				}
			?>
		</article>
	
		<!-- array student answers -->
		<article>
			
					<table id="arrayAnswers">
						<thead>
							<tr>
								<th>Numéro query</th>
								<th>Réponse élève</th>
							</tr>
						</thead>
						<tbody>
						<?php for ($i=0;$i<count($arrayAnswers);$i++) { ?>
							<tr>
								<td><?php echo $arrayAnswers[$i]->num_query ?></td>
								<td><?php echo $arrayAnswers[$i]->answer ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
			
		</article>
	
			
	</section>