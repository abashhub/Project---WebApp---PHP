
<section>

	<article>
		<form enctype="multipart/form-data"
			action="index.php?action=importExport" method="POST" id="form-import">
			Niveau à importer : <input type="text" name="level" size="1" /> <input
				type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <input
				type="file" name="queries" /> <input type="submit" name="import"
				value="Importer" />
			<p><?php echo $notification ?></p>
		</form>
	</article>



	<article>
		<form action="index.php?action=importExport" method="POST"
			id="form-import">
			Niveau à exporter : <input type="text" name="levelToExport" size="1" />
			<input type="submit" name="export" value="Exporter" />
			<p><?php echo $notificationExport ?></p>
		</form>
	</article>
</section>