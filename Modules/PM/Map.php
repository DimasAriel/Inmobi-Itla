
<!DOCTYPE html>

<? 
$isLogin=true;
include $_SERVER['DOCUMENT_ROOT'] . "/inc/Controllers/ProductsController.php";
$Productos = GetProducts();

$Interface = [];
$Interface["InterfaceDisplay"] = $Producto["titulo"];
$Interface["InterfaceDesc"] = "Registrar Ventas";

include $PageHeader 

?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <? echo $Interface['InterfaceDisplay'] ?> <span class="label bg-green"> <? echo $Producto['tipo_acciones_id_Display'] ?> </span>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <? echo "GENERAL" ?></a></li>
        <li class="active"><? echo $Interface['InterfaceDisplay'] ?></li>
      </ol>
    </section>


    <section class="content">
<form action="/inc/Functions/CreateProduct.php" method="POST" id="clientform">
        <div class="row">
        <!-- left column -->
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Mapa</h3>
            </div>

<div id="map" style="height: 600px; position: relative; overflow: hidden;">
        
</div>
              </div>
              </div>
              <div class="box-footer">
              </div>

            <!--      <a  class="btn btn-primary" href="/Modules/PM/Modificar.php?i=<?// echo $P['id'] ?>"> Modificar </a>
      -->
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
      
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
    </section>
  </div>
 
 
<? include $PageFooter ?>


<? 
$Ubicat = "";
foreach ($Productos as $key => $Producto) {
  $Ubicat .= $Producto["ubicacion"] .";";
}


?>
<script type="text/javascript">
    var Products = "<? echo $Ubicat; ?>".split(";");
    var PosString = "".split(",");
    var Position = { "Latitude" : 0, "Longitude" : 0}

    /*global variables*/
    var defLat = 18.985188;
    var defLong = -70.494306;
    var map;
    var markers = [];
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: defLat, lng: defLong },
            zoom: 8
        });

        for (var i in Products) { 
        if(Products[i] != "") { 
          addMarkerByLatLong(parseFloat(Products[i].split(",")[0]), parseFloat(Products[i].split(",")[1]));
        }
        }
    }
    function deleteMarkers() {
        clearMarkers(null);
        markers = [];
    }
    function clearMarkers(map) {
        for (var i = 0; i < (markers || []).length; i++) {
            markers[i].setMap(map);
        }
    }
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }

    function addMarkerByLatLong(Lat, Long) {
        var marker = new google.maps.Marker({
            position: { lat: Lat, lng: Long },
            map: map
        });
        markers.push(marker);
    }

    function clear() {
        map.setCenter({ lat: defLat, lng: defLong });
        map.setZoom(8);
        deleteMarkers();
    }
    



$(function () {initMap()})



</script>

<script src="http://maps.google.com/maps/api/js?sensor=false&callback=initMap"></script>
