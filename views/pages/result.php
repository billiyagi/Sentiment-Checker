<?php includeHtml('layouts/partials/header') ?>
<div class="container mx-auto text-center">
	<h1 class="text-3xl mb-10">Hasil Analisis</h1>
	<?php if ($result['negatif']) : ?>
		<?php if ($result['support_before']['before'] == true && $result['support_after']['after'] == true) : ?>
			<div class="rounded-full border-2 border-red-500 inline-block p-10">
				<i class="fa-solid fa-thumbs-down text-8xl "></i>

			</div>
			<p class="mt-10 mb-16">Teks yang anda berikan teindikasi mengandung perkataan Negatif</p>
		<?php else : ?>
			<div class="rounded-full border-2 border-green-500 inline-block p-10">

				<i class="fa-solid fa-thumbs-up text-8xl "></i>
			</div>
		<?php endif; ?>


		<p class="text-4xl mt-10">
			<?php
			$i = 0;
			$arrayedText = explode(" ", $text);
			foreach ($arrayedText as $key => $text) : ?>
				<?php if ($result['support_before']['word'] == $arrayedText[$i] && $result['support_before']['before']) : ?>
					<span class="text-yellow-500"><?php echo $text ?></span>
				<?php elseif ($result['negatif'] == $arrayedText[$i] && ($result['support_before']['before'] == true && $result['support_after']['after'] == true)) : ?>
					<span class="text-red-500"><?php echo $text ?></span>
				<?php elseif ($result['support_after']['word'] == $arrayedText[$i] && $result['support_after']['after']) : ?>
					<span class="text-yellow-500"><?php echo $text ?></span>
				<?php else : ?>
					<?php echo $text ?>
				<?php endif ?>
			<?php
				$i++;
			endforeach; ?>
		</p>

		<?php if ($result['support_before']['before'] == true && $result['support_after']['after'] == true) : ?>
			<p class="mt-10">Kata Negatif yang terdeteksi adalah <span class="text-red-500"><?php echo $result['negatif'] ?></span></p>
		<?php else : ?>
			<p class="mt-10">Tidak ada kata negatif yang terdeteksi</p>
		<?php endif; ?>

	<?php else : ?>
		<i class="fa-solid fa-thumbs-up"></i>
	<?php endif ?>


	<a href="<?php echo pathTo('/') ?>" class="btn btn-primary mt-10">Kembali</a>

</div>
<?php includeHtml('layouts/partials/footer') ?>