<?php includeHtml('layouts/partials/header') ?>
<div class="container mx-auto">
	<h1 class="text-3xl text-center mb-10">Check your Sentiment</h1>

	<form action="<?php echo pathTo('/sentiment/check') ?>" method="post">
		<input type="text" name="page" value="/sentiment/check" hidden>
		<textarea name="text" class="textarea textarea-bordered w-full h-[400px]" placeholder="Place your text here..."></textarea>
		<div class="flex justify-end">
			<button class="btn btn-primary mt-5">Check Sentiment</button>
			<?php

			?>
		</div>
	</form>
</div>
<?php includeHtml('layouts/partials/footer') ?>