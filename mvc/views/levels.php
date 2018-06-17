		
		<!-- section to display only if connected user is a teacher and he came from the page listStudents -->
		<section id="show-student">
			<?php 
				if($showArray){
			?>
					<table id="array-student">
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
					<p>Choisissez le niveau pour voir les réponses données par l'élève</p>
			<?php 
				}
			?>
		
		</section>
		
		<!-- section to display  for teachers and students -->
		<section id="level-choice">
			<h3 id="title-levels">Choix niveaux</h3>
			<ul>
				
				<!-- if teacher came from listStudents link redirect to individual student page for the chosen level
				else both teacher and student will be redirected to the list of question for the level selected-->
				<?php for($i=1; $i<=$levelsCount; $i++){?>
				
				<li>
					<a href="index.php?action=<?php 
											if($showArray){		 
												echo 'student&serial=' . $serial;
											} else {
												echo 'questions';
											}?>&level=<?php echo $i?>">Niveau <?php echo $i?></a>
				</li>
				<?php }?>
				
			</ul>
		</section>