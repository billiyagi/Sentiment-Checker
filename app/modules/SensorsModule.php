<?php 

namespace App\Modules;

class SensorsModule 
{
 
  function isBadWord($word) {
    // Daftar kata-kata yang dianggap sebagai badword
    $badWords = array("bego", "bodoh", "dungu");
  
    // Cek apakah kata tersebut merupakan badword
    return in_array($word, $badWords);
  }

  function isAmbigous($word){
    $ambigousWords = array("anjing", "monyet", "kampret");

    return in_array($word, $ambigousWords);
  }
  
  function isSupportingWord($word) {
    // Daftar kata-kata pendukung
    $supportingWords = array("lu", "kayak", "seperti");
  
    // Cek apakah kata tersebut merupakan kata pendukung
    return in_array($word, $supportingWords);
  }
  
  function isGoodWord($word) {
    // Daftar kata-kata yang dianggap sebagai kata positif
    $goodWords = array("keren", "hebat", "bagus");
  
    // Cek apakah kata tersebut merupakan kata positif
    return in_array($word, $goodWords);
  }
  
  function sensorSentiment($text) {
    // Memecah kalimat menjadi array kata-kata
    $words = explode(" ", $text);
  
    // Jumlah kata dalam kalimat
    $totalWords = count($words);
  
    // Inisialisasi variabel sentimen
    $sentiment = "Netral";
  
    // Loop untuk memeriksa kalimat ambigu
    for ($i = 0; $i < $totalWords; $i++) {
      // Periksa apakah kata saat ini adalah badword
      if ($this->isAmbigous($words[$i])) {
        // Periksa apakah terdapat kata pendukung sebelumnya atau setelahnya
        $surroundingSupportingWord = ($i > 0 && $this->isSupportingWord($words[$i - 1])) || ($i < $totalWords - 1 && $this->isSupportingWord($words[$i + 1]));
  
        // Jika ditemukan kata pendukung, atur sentimen menjadi Negatif
        if ($surroundingSupportingWord) {
          $sentiment = "Negatif";
        }
    }

    // Periksa apakah kata saat ini adalah kata negatif
    if($this->isBadWord($words[$i])){
      // Jika ditemukan kata negatif, atur sentimen menjadi Negatif
      $sentiment = "Negatif";
    }

    // Periksa apakah kata saat ini adalah kata positif
    if ($this->isGoodWord($words[$i])) {
      // Jika ditemukan kata positif, atur sentimen menjadi Positif
      $sentiment = "Positif";
    }
    }
  
    // Return kategori sentimen
    return $sentiment;

    
  }
   
}



?>