<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<title>Dic</title>

<style>
.hidden {display:none;}
.shown {display:block;}

.flex {display:flex;}

</style>

<script>
function toggleBody(el, id){
if (el.className == "hidden " + id) {
	el.className = "shown " + id;
}
else if (el.className == "shown " + id) {
	el.className = "hidden " + id;
}
}


function toggle(id) {
els1=Array.from(document.getElementsByClassName("shown " + id));
els2=Array.from(document.getElementsByClassName("hidden " + id));
els1.forEach((el)=>toggleBody(el,id));
els2.forEach((el)=>toggleBody(el,id));
}
</script>

</head>
<body>
<a href="/">Back to index</a></br>
<hr/>

<?php
$xml=simplexml_load_file("dictest.xml") or die("Error: Cannot create object");

foreach($xml->children() as $sources) {
  $id = $sources['id'];
  echo "<div  onclick='toggle(this.id)' id=".$id .">
	<div class='flex'> Source \"" . $sources['data'] . "\":" ;
		echo "&nbsp;<img src='/static/up.png' width='15' class='shown ".$id ."' />";
		echo "<img src='/static/down.png' width='15' class='hidden ".$id ."' />";
	echo "</div>";
  echo "<br/>";
  echo "<div class='shown ".$id."' >";
  foreach($sources->children() as $words) {
	echo "<span style=\"padding: 0px 20px;\">&nbsp;</span>". $words ."<br/>";
	}
	echo "</div>";
echo "</div><hr/>";
}

?>

</body>
</html>