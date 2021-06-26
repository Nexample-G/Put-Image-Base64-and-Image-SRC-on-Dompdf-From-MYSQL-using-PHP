<?php
	use Dompdf\Dompdf;
	$database = new mysqli('localhost','root','','dompdf');
	$img = '';
	$select = $database->query("SELECT * FROM putimg WHERE id");
	if($select -> num_rows > 0){
	while($dataimg = $select -> fetch_assoc()){
	$imgs = $dataimg['img'];
	$type = $dataimg['type'];
	$name = $dataimg['name'];
	$img .=  '<span><spam>'.$name.'</spam><img src="'.$imgs.'.'.$type.'"></span>';
}}

$CSS = "
	<style>
	img, span{
		width: 200px;
	}
	spam{
		width: 200px;
	}
</style>
";
	require_once "dompdf/autoload.inc.php";
	$dompdf = new Dompdf();
	$dompdf -> loadHtml($CSS.$img);
	$dompdf -> setPaper('A4', 'portrait');
	$dompdf -> render();
	$dompdf -> stream("", array("Attachment" => false));
?>












