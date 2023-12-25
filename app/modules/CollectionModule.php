<?php

class CollectionModule
{

    // pecah text menjadi array
    function textToArray($text) //contoh param "Hallo dunia!"
    {
        // Menggunakan fungsi explode()
        $array_text = explode(" ", $text);

        // Output: ['Halo', 'dunia!']

        return $array_text;
    }

    // menggabungkan array kembali
    function mergeArray($array) //contoh param ["Halo", "dunia", "!"]
    {
        // Menggabungkan array teks dengan spasi
        $mergeText = implode(" ", $array);

        // Output: "Halo dunia !"
        return $mergeText;
    }

}
