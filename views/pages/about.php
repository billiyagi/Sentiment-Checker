<?php includeHtml('layouts/partials/header') ?>
<div class="container mx-auto">
	<h1 class="text-3xl text-center mb-10">About Developers</h1> 
	<?php 
		// Contoh penggunaan
		$text1 = "bego";
		$text2 = "saya keren";
		$text3 = "aku adalah shiva";
		$text4 = "aku memelihara anjing";

		$result1 = $sensorsModule->sensorSentiment($text1);
		$result2 = $sensorsModule->sensorSentiment($text2);
		$result3 = $sensorsModule->sensorSentiment($text3);
		$result4 = $sensorsModule->sensorSentiment($text4);
		
		// Tampilkan hasil 
		echo nl2br("Kalimat 1: " . $text1 . "\n");
		echo nl2br("Hasil Sentimen 1: " . $result1 . "\n"); // Output: -
		echo nl2br("\n");

		echo nl2br("Kalimat 2: " . $text2 . "\n");
		echo nl2br("Hasil Sentimen 2: " . $result2 . "\n"); // Output: +
		echo nl2br("\n");

		echo nl2br("Kalimat 3: " . $text3 . "\n");
		echo nl2br("Hasil Sentimen 3: " . $result3 . "\n"); // Output: ~
		echo nl2br("\n");

		echo nl2br("Kalimat 4: " . $text4 . "\n");
		echo nl2br("Hasil Sentimen 4: " . $result4 . "\n"); // Output: -

	?>
</div>
<?php includeHtml('layouts/partials/footer') ?>