<?php
//echo "<script>alert('ok')</script>";
if($_POST['title'] != null or $_POST['note'] != null or $_POST['random'] != null){
	
	echo $_POST['title'].'<br>';
	echo $_POST['note'].'<br>';
	echo $_POST['random'];

	/*$str = '';
	trim($str);
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$size = strlen( $chars );
	for( $i = 0; $i < 16; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}*/

	$fopen = fopen('../note/file/'.$_POST['random'].'.txt', 'w');

	$content = array('title'=>$_POST['title'],'note'=>$_POST['note']);
	$json = json_encode($content);

	fwrite($fopen,$json);
	fclose($fopen);
}

?>