		<section id="students-list">
			<table id="array-students">
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
				<?php for ($i=0;$i<count($arrayStudents);$i++) { ?>
					<tr>
						<td><a href="index.php?action=levels&serial=<?php echo $arrayStudents[$i]->serial()?>"><?php echo $arrayStudents[$i]->serial() ?></a></td>
						<td><a href="index.php?action=levels&serial=<?php echo $arrayStudents[$i]->serial()?>"><?php echo $arrayStudents[$i]->name() ?></a></td>
						<td><a href="index.php?action=levels&serial=<?php echo $arrayStudents[$i]->serial()?>"><?php echo $arrayStudents[$i]->surname() ?></a></td>
						<td><?php echo $arrayStudents[$i]->last_login() ?></td>
						<td><?php echo(int)Db::getInstance()->get_percentage($arrayStudents[$i]->serial())?>%</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		
		
		</section>