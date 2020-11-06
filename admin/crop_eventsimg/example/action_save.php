<?php

echo $_POST['img'];


// requires php5
	define('UPLOAD_DIR', 'upload/');
	$img = $_POST['img'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	// print $success ? $file : 'Unable to save the file.';



/*list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);

file_put_contents('/tmp/image.png', $data);*/

//echo file_put_contents('img.png', base64_decode($imageData));
?>