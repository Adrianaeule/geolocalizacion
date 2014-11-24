<!DOCTYPE html>
<?php
    $nombre = $_GET['nombre'];
    $row = seleccionarll($nombre);
    $longitud = $row[0];
    $latitud = $row[1];
?>

<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 50px; padding: 0px }
  #map_canvas { height: 50% }
</style>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript">
  function initialize(){
    var lon = '<?php echo $longitud;?>'
    var lat = '<?php echo $latitud;?>'
    var nom = '<?php echo $nombre;?>'
    var latlng = new google.maps.LatLng(lon, lat);
    var myOptions = {
      zoom: 3,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
    var marcador = new google.maps.Marker({
        position: new google.maps.LatLng(lon, lat),
        map: map,
        title: nom
    });
  }

</script>
</head>
<body onload="initialize()">
  <div id="map_canvas" style="width:50%; height:50%"></div>
</body>
</html>