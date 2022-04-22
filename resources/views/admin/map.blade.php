@section("map")
<style>
    
    #map {
      padding: 0;
      margin: 0;
      height: 500px;
      width: 100%;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #323232;
    }

    .search {

    }
    #geocode-input,
    #geocode-button {
      font-size: 16px;
      margin: 0 2px 0 0;
      padding: 4px 8px;
    }
    #geocode-input {
      width: 300px;
    }

  </style>
<script src= "https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.7.0/css/ol.css" type="text/css" />
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.7.0/build/ol.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ol-mapbox-style@6.1.4/dist/olms.js" type="text/javascript"></script>

<script src="https://unpkg.com/@esri/arcgis-rest-request@4.0.0/dist/bundled/request.umd.js"></script>
<script src="https://unpkg.com/@esri/arcgis-rest-geocoding@4.0.0/dist/bundled/geocoding.umd.js"></script>
<script src="https://unpkg.com/ol-popup@4.0.0"></script>
<link rel="stylesheet" href="https://unpkg.com/ol-popup@4.0.0/src/ol-popup.css" />
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>



  <div class="search">

    <div style="display:grid;">
    <input id="geocode-input" class="form-control" type="text" placeholder="Город, Улица, Дом" size="100">
    
    <button id="geocode-button" class="btn btn-success">Поиск</button>
    </div>
  </div>
  <div id="map" style="self-align:center; height:500px;"></div>
  <div>
<br>

    <form class="d-flex flex-column" method="POST" action="{{"addMarker"}}"style="gap:0.8vw;"> 
        @csrf   
        <input id="long" placeholder="Долгота" name="lng" class="form-control"  readonly>
        
        <input id="latt" placeholder="Широта" name="lat" class="form-control"readonly> 
        <input name="description" id="descript" placeholder="Описание" class="form-control"> 

        <input type="submit" class="btn btn-secondary" value="Добавить маркер">
        <br>

    </form>
</div>


  <script>

    var center = ol.proj.transform([76.26, 9.93], 'EPSG:4326', 'EPSG:3857'); //initial position of map
    var view = new ol.View({
        center: center,
        zoom: 8
    });


    var map = new ol.Map({
      target: 'map',
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        })
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([ 71.43,51.16]),
        zoom: 17
      })
    });
    var container = document.getElementById('popup');
    

      const apiKey = "AAPK1d62e07d784b4933809a8b74d0b6156f_s-7AyFB8Q7ytex5ljrDWXhTRH5tMB_XAh9iI1Dw4uollD40jupDumuGxt-H3296";

      const basemapId = "ArcGIS:Navigation";

      const basemapURL = "https://basemaps-api.arcgis.com/arcgis/rest/services/styles/" + basemapId + "?type=style&token=" + apiKey;

      olms(map, basemapURL);

      const popup = new Popup();
      map.addOverlay(popup);

      document.getElementById("geocode-button").addEventListener("click", () => {

        const query = document.getElementById("geocode-input").value;
        const authentication = new arcgisRest.ApiKey({
          key: apiKey
        });
        const center = ol.proj.transform(map.getView().getCenter(), "EPSG:3857", "EPSG:4326");
        arcgisRest
          .geocode({
            singleLine: query,
            authentication,

            params: {
              outFields: "*",
              location: center.join(","),
              outSR: 3857 // Request coordinates in Web Mercator to simplify displaying
            }
          })

          .then((response) => {
            const result = response.candidates[0];
            if (!result === 0) {
              alert("Данный запрос не соответсвует никаким ГеоДанным");
              return;
            }
            let lonlat = ol.proj.transform(map.getView().getCenter(), 'EPSG:3857', 'EPSG:4326');
            

            
            

            const coords = [result.location.x, result.location.y];

            popup.show(coords, result.attributes.LongLabel);


            var lonlast = ol.proj.transform(coords, 'EPSG:3857', 'EPSG:4326');

            var lon = lonlast[0];
            var lat = lonlast[1];

            document.getElementById("long").value=lon;
            document.getElementById("latt").value=lat;

            console.log(coords)

           

        })

          //.catch((error) => {
           // alert("Проблема в Использовании, Загляните в Консоль разработчика для проверки");
           // console.error(error);
          //});

      });
    ///map.on('pointerdown', function(evt){
    ///let lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
    ///let lon = lonlat[0];
    //let lat = lonlat[1];
    //let coords = [lon,lat];
    //document.getElementById("long").value=lon;
    //document.getElementById("latt").value=lat;
    //map.getView().setCenter(ol.proj.fromLonLat(coords));
   // });
  </script>
  <script>
   /// function sendP()
   // {
     // if (document.getElementById("latt").value*1 != 0 || document.getElementById("long").value*1 != 0)
     // {
     //   $.ajax({
     //  type: "POST", url: 'addMarker', 
     //  data: { lng: document.getElementById("long").value,
     //   lat: document.getElementById("latt").value,
     //    _token: document.querySelectorAll("[name=_token]")[5].value, description:document.getElementById("geocode-input").value}
     //  ,function(){}})
   // }
     // }
     
    
  </script>
@show