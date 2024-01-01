<?php includeHtml('layouts/partials/header') ?>
<div class="container mx-auto h-screen flex justify-center items-center w-full">
	<div class="text-center">
		<h1 class="text-4xl mb-4"><?php echo $message ?></h1>
		<a href="<?php echo pathTo('/') ?>" class="btn btn-primary">Back to Home</a>
	</div>
</div>
<?php includeHtml('layouts/partials/footer') ?>