<?php

// Set output image/png
header('Content-Type: image/png');

// Data member
$member = array(
	'nama' => 'Mastrayasa',
	'url' => 'www.sibangstudio.com',
	'foto' => 'foto-member.jpg',
	'post_count' => 200,
);

// Buat gambar
$source_latar 		= imagecreatefrompng('latar.png');
$source_foto 		= imagecreatefromjpeg( $member['foto'] );

// tinggi & lebar foto member
$height = $width = 140;

// resize foto berukuran 140px X 140px
$temp_foto = imagecreatetruecolor($height,$width);
imagecopyresampled($temp_foto, $source_foto, 0, 0, 0, 0, $height, $width, imageSX($source_foto), imageSY($source_foto));

// Gabung Latar dengan foto
imagecopymerge($source_latar, $temp_foto, 5, 35, 0, 0, 140, 140, 100); 

// Warna Text									 R , G , B
$text_color1 = imagecolorallocate($source_latar, 120, 120, 120);
$text_color2 = imagecolorallocate($source_latar, 56, 56, 56);

// tulis nama member
imagestring($source_latar,2,5,185, "Nama :",$text_color1);
imagestring($source_latar,3,5,197, $member['nama'],$text_color2);

// tulis website member
imagestring($source_latar,2,5,212, "Website :",$text_color1);
imagestring($source_latar,3,5,223, $member['url'] ,$text_color2);

// tulis jumlah post
imagestring($source_latar,2,5,240, "Jumlah Post :",$text_color1);
imagestring($source_latar,3,5,252, $member['post_count'],$text_color2);

// buat gambar
imagepng($source_latar);

// hapus gambar dari memori komputer
imagedestroy($temp_foto);
imagedestroy($source_latar);
imagedestroy($source_foto);

?>