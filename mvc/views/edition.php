		<section>
		<button type="button"><a href="index.php?action=questions&level=<?php echo $level?>">Retour</a></button>
			<article id="initial-state">
				<p>
					Niveau <?php echo $level?>
					<br>
					Question n° <?php echo $exercice[0]->num_query()?>
					<br>
					Enoncé : <?php echo $exercice[0]->question()?>
					<br>
					Theme : <?php echo $exercice[0]->theme()?>
					<br>
					Query : <?php echo $exercice[0]->query()?>
					<br>
				</p>
			
			</article>
		
			<article>
			
				<form action="index.php?action=edition&level=<?php echo $level?>&number=<?php echo $number?>" method="post" id="form-edition">
					
					<fieldset> <legend>Modifications à apporter</legend>
						Numéro :  <input type = "number" name = "num_query" /> <br/>
						Theme :  <input type = "text" name = "theme" /><br/>
						Enoncé : <br/>
						<textarea name = "question" cols = "100" rows = "5"> </textarea><br/>
						Query :  <br/>
						<textarea name = "query" cols = "100" rows = "5"> </textarea><br/>
						<input type="submit" name="edition" value="Modifier">
						
					</fieldset>
				
				</form>
			
			</article>
			
					
		
			<?php if($last_modified_by!=''){?>		
			<article>
				<p>
					Dernière modification : <?php echo $exercice[0]->last_modified_at()?>
					<br>
					Par : <?php echo $last_modified_by?> 
				</p>
			
			</article>
			<?php }?>
		</section>