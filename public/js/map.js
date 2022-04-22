
var content = document.getElementById('popup-content');
var center = ol.proj.transform([76.26, 9.93], 'EPSG:4326', 'EPSG:3857'); //initial position of map
    var view = new ol.View({
        center: center,
        zoom: 2
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
        zoom: 15
      })
    });
    var container = document.getElementById('popup');
    var popup = new ol.Overlay({
        element: container,
        autoPan: true,
        autoPanAnimation: {
            duration: 250
        }
    });
    map.addOverlay(popup);
    

    function addPin(arr, des)
    {
        let as = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.fromLonLat(arr)),
                        name: des
                    })
                ]
            }),
            style: pinStyle
        });
        
        map.addLayer(as);
    }

    map.on('pointerdown', function(evt) {

        feature = map.forEachFeatureAtPixel(evt.pixel, function(feature,layer) {

            return feature
            
        });


            if (feature){
                var coordinate = evt.coordinate;    //default projection is EPSG:3857 you may want to use ol.proj.transform

            if (feature.get("name") != undefined)
            {
                content.innerHTML = feature.get('name');
                map.getView().setCenter(coordinate);

                map.getView().setZoom(16);

            }
            else{
                content.innerHTML = 'Это я';
                map.getView().setCenter(coordinate);

                map.getView().setZoom(16);


            }
            popup.setPosition(coordinate);
            }
            else {
                popup.setPosition(undefined);
                
            }
    });
    

    