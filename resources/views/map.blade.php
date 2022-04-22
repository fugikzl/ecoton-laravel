@extends('layouts.main')
@section("content")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">

<script src= "https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
<script>
    var pinStyle = new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 46],
            scale: 0.07,
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: "{{asset('ol/trash.webp')}}"
        })
      });
</script>
<style>
    .ol-popup {
          position: absolute;
          background-color: white;
          /*--webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));*/
          filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
          padding: 15px;
          border-radius: 10px;
          border: 1px solid #cccccc;
          bottom: 12px;
          left: -50px;
          min-width: 180px;
      }

      .ol-popup:after, .ol-popup:before {
          top: 100%;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
      }

      .ol-popup:after {
          border-top-color: white;
          border-width: 10px;
          left: 48px;
          margin-left: -10px;
      }

      .ol-popup:before {
          border-top-color: #cccccc;
          border-width: 11px;
          left: 48px;
          margin-left: -11px;
      }
  </style>
<style>
    .map {
      height: 400px;
      width: 100%;
    }
  </style>
<div class="card-body d-flex flex-column justify-content-center" style="align-items: center; row-gap:0.2vw;">
  <h2>Карта контейнеров</h2>


<div id="popup" title="myproject" class="ol-popup"><a href="#" id="popup-closer" class="ol-popup-closer"><a href="#" id="popup-closer" class="ol-popup-closer"></a><div id="popup-content"></div></div>
    <div id="map" class="map" style="height:500px;"></div>
    <button id="whereAmI" class="btn btn-success">
      Где я?
    </button>

    <br>
    <br>

</div>
<br>
<table class="table">
  <tbody>
      <tr>
          <th scope="col">Id</th>
          <th scope="col">Широта</th>
          <th scope="col">Долгота</th>
          <th scope="col">Описание</th>
          <th scope="col"></th>
          <th scope="col"></th>
      </tr>
@foreach ($mrks as $marker)
<tr>
    <td scope="row">{{$marker->id}}</td>
    <td>{{$marker->lat}}</td>
    <td>{{$marker->lng}}</td>
    <td>{{$marker->description}}</td>
    <td></td>
    <td></td>
</tr>
@endforeach
</tbody>
</table>  
<script src="{{asset('js/map.js')}}"> </script>
<script src="{{asset('ol/ol.css')}}"> </script>
<script type="text/javascript">
const marks = [
function(){}
@foreach ($markers as $marker)

  ,function(){addPin([{!!html_entity_decode($marker->lng)!!},{!!html_entity_decode($marker->lat )!!}], " Контейнер номер " + {!!html_entity_decode($marker->id)!!} );}

@endforeach
]

marks.forEach(function(func){func()})

const geolocation = new ol.Geolocation({
  // enableHighAccuracy must be set to true to have the heading value.
  trackingOptions: {
    enableHighAccuracy: true,
  },
  projection: view.getProjection(),
});

geolocation.setTracking(true);

const accuracyFeature = new ol.Feature();
geolocation.on('change:accuracyGeometry', function () {
  accuracyFeature.setGeometry(geolocation.getAccuracyGeometry());
});


const positionFeature = new ol.Feature();
positionFeature.setStyle(
  new ol.style.Style({
    image: new ol.style.Circle({
      radius: 2,
      fill: new ol.style.Fill({
        color: '#D53816',
      }),
      stroke: new ol.style.Stroke({
        color: '#D53816',
        width: 15,
      }),
    }),
  })
);


const coordinates = geolocation.getPosition();
  positionFeature.setGeometry(coordinates ? new ol.geom.Point(coordinates) : null);
geolocation.on('change:position', function () {
  const coordinates = geolocation.getPosition();
  positionFeature.setGeometry(coordinates ? new ol.geom.Point(coordinates) : null);

  new ol.layer.Vector({
  map: map,
  source: new ol.source.Vector({
    features: [accuracyFeature, positionFeature],
  }),
});
});

</script>     

<div>
  {{$mrks->links()}}
</div>
<script>
  document.getElementById("whereAmI").onclick = function(){
    map.getView().setCenter(positionFeature.getGeometry().getCoordinates());

    map.getView().setZoom(16);
  }
</script>
@endsection