
<section id="exercice">


	<h2>Niveau <?php echo $exercice[0]->num_level() ?></h2>

	<!-- display number of questions -->
	<p>Question <?php echo $number ?>/<?php echo  $nbquestions?>
		<br>
		<!-- theme question -->
	<?php if(!empty($exercice[0]->theme())){ ?> [ <?php echo $exercice[0]->theme(); ?> ] <?php } ?>
	
	
	
	
	
	
	</h2>

	<!-- return to level button-->
	<button type="button">
		<a href="index.php?action=questions&level=<?php echo $level?>">Retour</a>
	</button>

	<!-- navigate between questions -->

	<form
		action="index.php?action=exercice&level=<?php echo $level?>&number=<?php echo $number?>"
		method="post" id="form-previous">
		<input type="hidden" name="lvl" value="level<?php echo $level ?>" /> <input
			type="hidden" name="numQuestion" value="<?php echo $number-1 ?>" /> <input
			type="submit" value="&#8592" />
	</form>

	<form
		action="index.php?action=exercice&level=<?php echo $level?>&number=<?php echo $number?>"
		method="post" id="form-go">
		<input type="search" name="quest_number" size="2" /> <input
			type="submit" value="GO" />
	</form>

	<form
		action="index.php?action=exercice&level=<?php echo $level?>&number=<?php echo $number?>"
		method="post" id="form-next">
		<input type="hidden" name="lvl" value="level<?php echo $level ?>" /> <input
			type="hidden" name="numQuestion" value="<?php echo $number+1 ?>" /> <input
			type="submit" value="&#8594" />
	</form>


	<!-- question -->
	<p><?php echo $exercice[0]->question() ?></p>

	<!-- form question -->
	<form
		action="index.php?action=exercice&level=<?php echo $level?>&number=<?php echo $number?>"
		method="post">
		<textarea rows="10" cols="100" name="studQuery"> <?php if($correctAnswerExist) echo $correctStudentQuery [0]->answer ?></textarea>
		<br> Mettre à jour query(si correcte): <input type="checkbox"
			name="update" value="yes" /> <br> <input type="submit"
			value="Exécuter" />
	</form>

	<button type="button"
		onclick="alert('<?php echo $exercice [0]->query ()?>')">Afficher le
		query correct</button>
</section>


<!-- section to show after execution of student query -->
<?php if($showAnswer){?>
<section>
	<!-- array resulted from student's query -->
	<article id="tab-answer">
		<h4>Réponse :</h4>
			<?php if(!empty($tabAnswer)) {?>
			<table>
			<thead>
				<tr>
					<th></th>
					<?php if(!empty($tabAnswer[0]->isbn)){?><th>isbn</th><?php }?>
					<?php if(!empty($tabAnswer[0]->titre)){?><th>titre</th><?php }?>
					<?php if(!empty($tabAnswer[0]->serie)){?><th>serie</th><?php }?>
					<?php if(!empty($tabAnswer[0]->scenariste)){?><th>scenariste</th><?php }?>
					<?php if(!empty($tabAnswer[0]->dessinateur)){?><th>dessinateur</th><?php }?>
					<?php if(!empty($tabAnswer[0]->coloriste)){?><th>coloriste</th><?php }?>
					<?php if(!empty($tabAnswer[0]->editeur)){?><th>editeur</th><?php }?>
					<?php if(!empty($tabAnswer[0]->pays)){?><th>pays</th><?php }?>
					<?php if(!empty($tabAnswer[0]->annee_edition)){?><th>annee_edition</th><?php }?>
					<?php if(!empty($tabAnswer[0]->prix)){?><th>prix</th><?php }?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tabAnswer as $i => $answer) { ?>
					<tr>
					<td><?php echo $i+1 ?></td>
					<?php if (!empty($tabAnswer[0]->isbn)) { ?><td><?php echo $answer->isbn ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->titre)) { ?><td><?php echo $answer->titre ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->serie)) { ?><td><?php echo $answer->serie ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->scenariste)) {?><td><?php echo $answer->scenariste ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->dessinateur)) { ?><td><?php echo $answer->dessinateur ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->coloriste)) {?><td><?php echo $answer->coloriste ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->editeur)) {?><td><?php echo $answer->editeur ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->pays)) {?><td><?php echo $answer->pays ?></td>
					<?php } ?>
					<?php if (!empty($tabAnswer[0]->annee_edition)) {?>
					
					
					
					
					
					<td><?php echo $answer->annee_edition ?></td> <?php } ?>
					<?php if (!empty($tabAnswer[0]->prix)) {?><td><?php echo $answer->prix ?></td>
					
					
					
					
					
					<?php } ?>
					
				
				
				
				
				
				
				
				</tr>
				<?php } ?>
				</tbody>
		</table>
			<?php } else {$error;} ?>
			
			</article>

	<!-- array expected -->
	<article id="tab-expected">
		<h4>Réponse attendu:</h4>
			<?php if(!empty($tabExpected)) {?>
			<table>
			<thead>
				<tr>
					<th></th>
					<?php if(!empty($tabExpected[0]->isbn)){?><th>isbn</th><?php }?>
					<?php if(!empty($tabExpected[0]->titre)){?><th>titre</th><?php }?>
					<?php if(!empty($tabExpected[0]->serie)){?><th>serie</th><?php }?>
					<?php if(!empty($tabExpected[0]->scenariste)){?><th>scenariste</th><?php }?>
					<?php if(!empty($tabExpected[0]->dessinateur)){?><th>dessinateur</th><?php }?>
					<?php if(!empty($tabExpected[0]->coloriste)){?><th>coloriste</th><?php }?>
					<?php if(!empty($tabExpected[0]->editeur)){?><th>editeur</th><?php }?>
					<?php if(!empty($tabExpected[0]->pays)){?><th>pays</th><?php }?>
					<?php if(!empty($tabExpected[0]->annee_edition)){?><th>annee_edition</th><?php }?>
					<?php if(!empty($tabExpected[0]->prix)){?><th>prix</th><?php }?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tabExpected as $i => $answer) { ?>
					<tr>
					<td><?php echo $i+1 ?></td>
					<?php if (!empty($tabExpected[0]->isbn)) { ?><td><?php echo $answer->isbn ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->titre)) { ?><td><?php echo $answer->titre ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->serie)) { ?><td><?php echo $answer->serie ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->scenariste)) { ?><td><?php echo $answer->scenariste ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->dessinateur)) { ?><td><?php echo $answer->dessinateur ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->coloriste)) {?><td><?php echo $answer->coloriste ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->editeur)) { ?><td><?php echo $answer->editeur ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->pays)) {?><td><?php echo $answer->pays ?></td>
					
					<?php } ?>
					<?php if (!empty($tabExpected[0]->annee_edition)) { ?>
					
					<td><?php echo $answer->annee_edition ?></td> <?php } ?>
					<?php if (!empty($tabExpected[0]->prix)) {?><td><?php echo $answer->prix ?></td>
					
					<?php } ?>
					
				
				
				
				</tr>
				<?php } ?>
				</tbody>
		</table>
			<?php } else {echo $error;} ?>
			
			</article>
</section>
<?php }?>
