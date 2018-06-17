
<section id="question-choice">

	<h2>Niveau <?php echo $level?></h2>


	<article>

		<p><?php echo $nbQuestions?> questions</p>
		<ul>			
			<?php
			for($i = 1; $i <= $nbQuestions; $i ++) {
				if ($_SESSION ['authentification'] == 'student') {
					?>
					<li><a
				href='index.php?action=exercice&level=<?php echo $level?>&number=<?php echo $i?>'>Question <?php echo $i?></a></li>
				
			<?php } else{?>
					<li><a
				href='index.php?action=edition&level=<?php echo $level?>&number=<?php echo $i?>'>Question <?php echo $i?></a></li>
			
					<?php
				}
			}
			?>
				</ul>

	</article>



</section>