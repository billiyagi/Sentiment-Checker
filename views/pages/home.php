<?php includeHtml('layouts/partials/header') ?>
<div class="container mx-auto">
	<h1 class="text-3xl text-center mb-10">Check your Sentiment</h1>

	<form action="/about" method="post">
		<textarea name="content" class="textarea textarea-bordered w-full h-[400px]" placeholder="Place your text here..."></textarea>
		<div class="flex justify-end">
			<button class="btn btn-primary mt-5">Check Sentiment</button>
		</div>
	</form>
</div>
<?php includeHtml('layouts/partials/footer') ?>