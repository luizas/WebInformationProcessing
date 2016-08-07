//Json file(tesco.json) looks like("shop":"Tesco","in":"0","out":"80"}
//every 30 sec check data in json file

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>load demo</title>
  <style>
#json{

width:200px;
height:100px;
border:2px solid black;
padding:20px;
}
</style>
  
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<div id="json">

<?php

$file = 'tesco.json'; 
if(file_exists($file)) {$filedata = file_get_contents($file);
 $objson = json_decode($filedata, true);
 foreach($objson AS $prop => $val) {echo '<br/>'. $prop .' - '. $val;}}
?>
<script>

setTimeout(function() {
    window.location.reload();
}, 30000);

</script>
<div> 
</body>
</html>
