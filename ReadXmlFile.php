//XML file (mylist.xml) looks like 
//<store>
//<storename>DS</storename>
//<entering>101</entering>
//<leaving>8</leaving>
//</store>


<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>load demo</title>
<style>
#xml{

width:200px;
height:100px;
border:2px solid black;
padding:20px;
}
</style>
  
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<div id="xml">
 <?php
$xml=simplexml_load_file("mylist.xml") or die("Error: Cannot create object");
echo $xml->storename . "<br>";
echo $xml->entering . "<br>";
echo $xml->leaving . "<br>";
?>
<script>
//refresh page every 30 seconds
setTimeout(function() {
    window.location.reload();
}, 30000);

</script>
 <div>
</body>
</html>
