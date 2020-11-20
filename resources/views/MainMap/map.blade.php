@push('css')
<style>
  #mainMap {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }
  #basemapControl {
    margin-left: -10px;
  }

  .treeIcon {
      width: 15px;
  }

  .leaflet-layerstree-header-label {
      display: inline-flex;
      position: relative;
  }
  .leaflet-layerstree-header-label > span {
      color: #363761;
      padding-left: 5px;

  }
  .leaflet-layerstree-header-label > input {
      height: 15px;
      width: 15px;
      -webkit-appearance: none;
      -moz-appearance: none;
      -o-appearance: none;
      appearance: none;
      border: 1px solid #363761;
      border-radius: 4px;
      outline: none;
      transition-duration: 0.3s;
      margin-left: 6px;
      background: transparent;
    }
  .leaflet-layerstree-header-label > input:checked {
      border: 1px solid #363761;
      background-color: #2f7db7;
  }
  .leaflet-layerstree-header-label > input:checked + span::before {
      content: '\2713';
      text-align: left;
      color: #2a3142;
  }
  .leaflet-layerstree-header-label > input:active {
      border: 2px solid #34495E;
  }
  .leaflet-layerstree-header-pointer {
      cursor: pointer;
      padding-bottom: 10px;
      margin-left: 6px;
  }
  .leaflet-popup-content p {
      margin: 0px;
  }
  .leaflet-bottom .leaflet-control {
    margin-bottom: 2px;
    margin-left: 5px;
  }
  #inputBuffer {
    margin-right: 3px;
  }
</style>

<link rel="stylesheet" type="text/css" href="{{ asset('css/autocomplete.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/leaflet-ruler.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/leaflet-coordinate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/leaflet-measure/leaflet-measure.css') }}">
<link rel="stylesheet" type="text/css" href="https://justinmanley.github.io/leaflet-draw-toolbar/deps/leaflet-toolbar/dist/leaflet.toolbar.css"/>
<link rel="stylesheet" type="text/css" href="https://justinmanley.github.io/leaflet-draw-toolbar/deps/leaflet-draw/dist/leaflet.draw.css"/>
@endpush

@include('MainMap.attribute')
@include('MainMap.searchspatialobj')
<div id="mainMap"></div>

@push('js')
<!-- Leaflet Map -->
<script src="{{ asset('js/endless/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet/dist/esri-leaflet.js"></script>
<script src="https://yigityuce.github.io/Leaflet.Control.Custom/Leaflet.Control.Custom.js"></script>
<script src="{{ asset('js/iconLayersExtend.js') }}"></script>
<script src="{{ asset('js/controlLayersTree.js') }}"></script>
<script src="{{ asset('js/leaflet.wms.js') }}"></script>
<script src="{{ asset('js/leaflet.ajax.js') }}"></script>
<script src="{{ asset('js/leaflet-ruler.js') }}"></script>
<script src="{{ asset('js/leaflet-measure.js') }}"></script>
<script src="{{ asset('js/leaflet-coordinate.js') }}"></script>
<script src="https://justinmanley.github.io/leaflet-draw-toolbar/deps/leaflet-toolbar/dist/leaflet.toolbar-src.js"></script>
<script src="https://justinmanley.github.io/leaflet-draw-toolbar/deps/leaflet-draw/dist/leaflet.draw-src.js"></script>
<script src="https://justinmanley.github.io/leaflet-draw-toolbar/dist/leaflet.draw-toolbar.js"></script>
<script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
<script type="text/javascript">

    var map = L.map('mainMap',{ zoomControl: false }).setView([-4.45, 119.80], 5);
    L.control.coordinates({
			position:"bottomleft",
			useDMS:true,
			labelTemplateLat:"N {y}",
			labelTemplateLng:"E {x}",
			useLatLngOrder:true
		}).addTo(map);
    L.control.scale().addTo(map);

    // Basemap
    var osmMapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      });
    var esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });
    var Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
    	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
    });
    var mapBox = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox.streets'
    });
    var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
      maxZoom: 20,
      subdomains:['mt0','mt1','mt2','mt3']
    });
    var petaDasarBaruBIG = L.tileLayer("http://palapa.big.go.id:8080/geoserver/gwc/service/tms/1.0.0/basemap_rbi:basemap@EPSG:3857@png/{z}/{x}/{-y}.png", {
      attribution: '&copy; <a href="#">BIG</a>'
    });
    petaDasarBaruBIG.addTo(map);

    var iconLayersControl = new L.Control.IconLayers(
      [
          {
              title: 'OSM Mapnik',
              layer: osmMapnik,
              icon: 'images/iconLayersImage/osm_mapnik.png'
          },
          {
              title: 'Esri World Street Map',
              layer: Esri_WorldStreetMap,
              icon: 'images/iconLayersImage/google_street.png'
          },
          {
              title: 'Google Hybrid',
              layer: googleHybrid,
              icon: 'images/iconLayersImage/google_hybd.png'
          },
          {
              title: 'RBI 2019',
              layer: petaDasarBaruBIG,
              icon: 'images/iconLayersImage/rbi_2019.png'
          },
      ], {
      position: 'bottomright',
      maxLayersInRow: 4
      }
    );

    iconLayersControl.addTo(map);
    iconLayersControl.setActiveLayer(Esri_WorldStreetMap);
    iconLayersControl.expand();


    /* Function to move controler to sidebar */
    function setParent(el, newParent){
      newParent.appendChild(el);
    }

    /* Layers WMS */
    var wmsUrl = "{{ $wms_url }}";

    @foreach($dataBatasAll as $dataBatas)
      @foreach($dataBatas as $layerData)
      var layerBndy_{{ $layerData['id'] }} = L.tileLayer.wms(wmsUrl, {
          layers: "bataswilayah:{{ $layerData['nama_layer_geoserver'] }}",
          format: "image/png",
          transparent: "true",
          // bounds: L.latLngBounds([[-11.3614214886703,104.87548828125000],[-5.626770631920156,107.93823242187501]])
      })

      // map.on('moveend', function() {
      //     console.log(map.getBounds()._southWest.lng);
      //      layerBndy_{{ $layerData['id'] }}.options.bounds = L.latLngBounds([[-11.3614214886703,104.87548828125000],[-5.626770631920156,107.93823242187501]])
      // });

      @if($activeData[$layerData['nama_layer_geoserver']] != "initial_period")
        layerBndy_{{ $layerData['id'] }}.setParams(
          {CQL_FILTER: "IN ({{ $activeData[$layerData['nama_layer_geoserver']] }})"}
        );
      @endif
      @endforeach
    @endforeach

    /* Leaflet Tree Controller */
    var overlaysTree = [
      @foreach($dataBatasForController as $key => $dataBatas)
      {
          label: '<strong>{{ $key }}</strong>',
          selectAllCheckbox: 'Un/select all',
          collapsed: true,
          children: [
            @foreach($dataBatas as $layerKey => $layerData)
              @if(isset($layerData['nama']))
              {label: "{{$layerData['nama']}}", layer: layerBndy_{{$layerData['id']}}},
              @else
              /* Wilayah Pengelolaan Laut under Batas Wilayah ADM */
              {
                label: "<strong>{{ $layerKey }}</strong>",
                selectAllCheckbox: 'Un/select all',
                collapsed: true,
                children: [
                  @foreach($layerData as $layerData2)
                  {label: "{{$layerData2['nama']}}", layer: layerBndy_{{$layerData2['id']}}},
                  @endforeach
                ]
              },
              @endif
            @endforeach
          ]
      },
      @endforeach
    ]

    var layerTree = L.control.layers.tree([], overlaysTree, {
      namedToggle: false,
      selectorBack: false,
      closedSymbol: '<i class="icon-arrow-circle-right"></i>',
      openedSymbol: '<i class="icon-arrow-circle-down"></i>',
      collapsed: false,
    });
    layerTree.addTo(map).expandSelected().collapseTree(false);

    // Move Controller to right Bar
    // Basemap
    var htmlObjectBasemap = iconLayersControl.getContainer();
    var e_basemapController = document.getElementById('basemapControl');
    setParent(htmlObjectBasemap, e_basemapController);
    // layer Tree
    var htmlObjectAdmLayers = layerTree.getContainer().getElementsByClassName("leaflet-control-layers-overlays").item(0);
    var e_admLayersController = document.getElementById('layerControl');
    setParent(htmlObjectAdmLayers, e_admLayersController);
    $('.leaflet-control-layers.leaflet-control-layers-expanded.leaflet-control').remove();


    // Add WMS feature
    $("#addWmsButton").click(function(){
      var source = L.wms.source($("#addWmsService").val(), {
          "format": "image/png",
          "transparent": "true",
          "info_format": "text/html",
          "tiled": true
      });
      source.getLayer($("#addWmsLayer").val()).addTo(map);
    });

    $("#addArcgisMapButton").click(function(){
      var arcgisMS = $("#addArgisMap").val();
      L.esri.tiledMapLayer({
          url: arcgisMS,
      }).addTo(map);
    });

    // Add & Save WMS Feature
    /*
    for each item yang di external_service
    var source = L.wms.source(item->url, {
        "format": "image/png",
        "transparent": "true",
        "info_format": "text/html",
        "tiled": true
    });
    source.getLayer(item->namalayer).addTo(map);
    */


    // BTN Tool
    $('.btn-tool').on('click', function(){
      polygonDrawerBuffer.disable();
      pointDrawerBuffer.disable();
      polylineDrawerBuffer.disable();
      polygonDrawerArea.disable();
      polylineDrawerDistance.disable();
      coordinateDrawer.disable();
      map.closePopup();
      $("#measureOptions").collapse("hide");
      $("#bufferOptions").collapse("hide");
      $("#coordinateOptions").collapse("hide");
      if($(this).hasClass("active") == false){
        $('.btn-tool').removeClass('active');
        $(this).addClass('active');
        if($(this).attr('id') =='btn-feature-info'){
          $('.leaflet-container').css('cursor','help');
        } else {
          $('.leaflet-container').css('cursor','grab');
        };
      } else {
        $(this).removeClass('active');
        $('.leaflet-container').css('cursor','grab');
      }
    });

    // Feature Info
    map.on('click', function(ev){
      if($("#btn-feature-info").hasClass("active")){
        var activeLyrs = [];
        layerTree._layers.forEach(function (obj) {
          if (obj.overlay && map.hasLayer(obj.layer)) {
            activeLyrs.push(obj.layer.options.layers);
          }
        });
        var latlng = map.mouseEventToLatLng(ev.originalEvent);
        var myStyle = {
          "color": "#00c4ff",
          "weight": 5
        };
        var featureJson = L.geoJson.ajax(
          "{{ route('feature_info') }}?coordX="+latlng.lng+"&coordY="+latlng.lat+"&layers="+activeLyrs, {
          style: myStyle,
          onEachFeature : function (feature, layer){
            if (feature.propertiesalias) {
                var allattributes = "";
                for (var key in feature.propertiesalias) {
                  if (feature.propertiesalias.hasOwnProperty(key)) {
                      allattributes += "<tr><th>" + key + "</th><td>" + feature.propertiesalias[key] + "</td></tr>";
                  }
                }
                var content = "<table class='table table-striped table-bordered table-condensed'>" + allattributes + "<table>";
                layer.on({
                  click: function (e) {
                    $("#attributeModalInfo").html(content);
                    $("#attributeModal").modal("show");
                  }
                });
                $("#attributeModalInfo").html(content);
                $("#attributeModal").modal("show");
              }
          }
        });
        featureJson.addTo(map);
        map.on('click', function(ev){
          map.removeLayer(featureJson);
        });
      }
    });

    /* Use existing library
    // Distance Measurement
    // var options = {
    //   position: 'topleft',
    //   circleMarker: {
    //     color: 'blue',
    //     radius: 2
    //   },
    //   lineStyle: {
    //     color: 'blue',
    //     dashArray: '1,6'
    //   },
    //   lengthUnit: {
    //     display: 'km',
    //     decimal: 2,
    //     factor: null,
    //     label: 'Jarak:'
    //   },
    //   angleUnit: {
    //     display: '&deg;',
    //     decimal: 2,
    //     factor: null,
    //     label: 'Azimut:'
    //   }
    // };
    // var ruler_distance = L.control.ruler(options);
    // ruler_distance.addTo(map);
    // $("#btn-measure-distance").removeClass("leaflet-control");
    // $("#btn-measure-distance").click(function(){
    //   if($(this).hasClass('active')){
    //       $(this).removeClass('active');
    //   } else {
    //      $(this).addClass('active');
    //   };
    // });

    // // Area Measure
    // options = {
    //   position: 'topleft',
    //   activeColor: 'blue',
    //   completedColor: 'blue',
    //   primaryLengthUnit: 'kilometers',
    //   secondaryLengthUnit: 'miles',
    //   primaryAreaUnit: 'sqmeters',
    //   secondaryAreaUnit: 'sqmiles',
    //   decPoint: ',',
    //   thousandsSep: '.'
    // };
    // var measureControl = L.control.measure(options);
    // measureControl.addTo(map);
    // $('#btn-measure-area').click(
    //    function () {
    //        $(this).hide();
    //    }
    // );
    */

    // Distance Feature
    var polylineDrawerDistance = new L.Draw.Polyline(map);
    $('#btn-measure-distance').click(function() {
        if ($('#btn-measure-distance').hasClass('active')) {
          polylineDrawerDistance.enable();
        }
        map.on('draw:drawvertex', function (e) {
          if ($('#btn-measure-distance').hasClass('active')) {
            var layers = e.layers;
            var edgeList = [];
            Object.keys(e.layers._layers).forEach(function(key) {
              var edgeCoord = e.layers._layers[key].getLatLng();
              edgeList.push([edgeCoord.lng, edgeCoord.lat]);
            });
            if(edgeList.length > 1) {
              var edgeLine = turf.lineString(edgeList);
              var calLength = turf.length(edgeLine);
            } else {
              var calLength = 0;
            }
            L.drawLocal.draw.handlers.polyline.tooltip.start = "<p>"+ calLength +" Km</p>";
            L.drawLocal.draw.handlers.polyline.tooltip.cont = "<p>"+ calLength +" Km</p>";
            L.drawLocal.draw.handlers.polyline.tooltip.end = "<p>"+ calLength +" Km</p>";
            map.on('draw:created', function (e) {
              if ($('#btn-measure-distance').hasClass('active')) {
                var layer = e.layer;
                layer.addTo(map);
                e.layer.bindPopup(
                  '<p><b>Panjang :</b> '+ calLength + ' Kilometer</p>'
                );
              }
            });
          }
        });
    });

    // Area Feature
    var polygonDrawerArea = new L.Draw.Polygon(map);
    $('#btn-measure-area').click(function() {
        $(".btn-tool").removeClass('active');
        $(this).addClass('active');
        polygonDrawerBuffer.disable();
        pointDrawerBuffer.disable();
        polylineDrawerBuffer.disable();
        polylineDrawerDistance.disable();
        polygonDrawerArea.enable();
        map.on('draw:drawvertex', function (e) {
          if ($('#btn-measure-area').hasClass('active')) {
            var layers = e.layers;
            var edgeList = [];
            Object.keys(e.layers._layers).forEach(function(key) {
              var edgeCoord = e.layers._layers[key].getLatLng();
              edgeList.push([edgeCoord.lng, edgeCoord.lat]);
            });
            if(edgeList.length > 1) {
              var edgeLine = turf.lineString(edgeList);
              var calLength = turf.length(edgeLine);
            } else {
              var calLength = 0;
            }
            if(edgeList.length > 2) {
              edgeList[edgeList.length] = edgeList[0];
              var polygonDigit = turf.polygon([edgeList]);
              var calArea = turf.area(polygonDigit);
            } else {
              var calArea = 0;
            }
            L.drawLocal.draw.handlers.polygon.tooltip.start = "<p>"+ calLength +" Km</p><p>"+ calArea +" meter persegi</p>";
            L.drawLocal.draw.handlers.polygon.tooltip.cont = "<p>"+ calLength +" Km</p><p>"+ calArea +" meter persegi</p>";
            L.drawLocal.draw.handlers.polygon.tooltip.end = "<p>"+ calLength +" Km</p><p>"+ calArea +" meter persegi</p>";
            map.on('draw:created', function (e) {
              if ($('#btn-measure-area').hasClass('active')) {
                var layer = e.layer;
                layer.addTo(map);
                e.layer.bindPopup(
                  '<p><b>Keliling :</b> '+ calLength + ' Kilometer</p>' +
                  '<p><b>Luas :</b> ' + calArea + ' meter persegi</p> '
                );
              }
            });
          }
        });
    });


    // Buffer Feature
    var polylineDrawerBuffer = new L.Draw.Polyline(map);
    var polygonDrawerBuffer = new L.Draw.Polygon(map);
    var pointDrawerBuffer = new L.Draw.Marker(map);
    $('#buffer-polyline, #buffer-polygon, #buffer-point').click(function() {
      $(".btn-tool").removeClass('active');
      $(this).addClass('active');
      if ($(this).attr("id") === 'buffer-polyline') {
          polylineDrawerBuffer.enable();
      } else if ($(this).attr("id") === 'buffer-polygon') {
          polygonDrawerBuffer.enable();
      } else if ($(this).attr("id") === 'buffer-point') {
          pointDrawerBuffer.enable();
      };
    });

    var fg = new L.FeatureGroup();
    map.on('draw:created', function (e) {
      if ($('#buffer-polyline').hasClass('active') || $('#buffer-polygon').hasClass('active') || $('#buffer-point').hasClass('active')) {
        var layerType = e.layerType,
            layer = e.layer;
        layer.addTo(map);
        e.layer.bindPopup(
          '<div class="form-inline">'+
            '<div class="form-group">'+
              '<input type="number" id="inputBuffer" placeholder="Jarak dalam Kilometer" data-original-title="" title="">'+
              '<button class="btn btn-big btn-xs" type="button" id="inputBufferBtn">Buffer</button>'+
            '</div>'+
          '</div>', {minWidth:200}
        );
      	fg.addLayer(e.layer);
        e.layer.openPopup();
        function addBuffer(){
          var bufferValue = $("#inputBuffer").val();
          var buffered = turf.buffer(layer.toGeoJSON(), bufferValue, {units: 'kilometers'});
          var bufferLayer = L.geoJson(buffered).addTo(map);
          e.layer.closePopup();
          if(layerType=='marker') {
              e.layer.bindPopup(
              '<p><b>Radius :</b> '+ bufferValue + ' Kilometer</p>' +
              '<p><b>Koordinat :</b>(' + layer.getLatLng().lat.toFixed(3) + ',' + layer.getLatLng().lng.toFixed(3) + ')</p> '
            );
          } else if (layerType=='polygon') {
            var calArea = turf.area(layer.toGeoJSON());
            bufferLayer.bindPopup(
              '<p><b>Jarak Buffer :</b> '+ bufferValue + ' Kilometer</p>' +
              '<p><b>Luas :</b>' + calArea + ' meter persegi</p> '
            );
          } else if (layerType=='polyline') {
            var calLength = turf.length(layer.toGeoJSON());
            bufferLayer.bindPopup(
              '<p><b>Jarak Buffer :</b> '+ bufferValue + ' Kilometer</p>' +
              '<p><b>Panjang :</b>' + calLength + ' Kilometer</p> '
            );
          }
        }
        $('#inputBufferBtn').click(function() {
            addBuffer();
        });
        e.layer.getPopup().on('remove', function() {
            addBuffer();
        });
      }
    });
    map.addLayer(fg);

    var coordinateDrawer = new L.Draw.Marker(map);
    $('#btn-coordinate').click(function() {
      if ($(this).hasClass("active")) {
        coordinateDrawer.enable();
      } else {
        coordinateDrawer.disable();
      };
    });
    map.on('draw:created', function (e) {
      if ($('#btn-coordinate').hasClass('active')) {
        var layer = e.layer;
        layer.addTo(map);
        var latDD = layer.getLatLng().lat,
            latD = parseInt(latDD),
            latM = parseInt(Math.abs(latDD-latD)*60),
            latS = (((Math.abs(latDD-latD)*60)-latM)*60).toFixed(2),
            lngDD = layer.getLatLng().lng,
            lngD = parseInt(lngDD),
            lngM = parseInt(Math.abs(lngDD-lngD)*60),
            lngS = (((Math.abs(lngDD-lngD)*60)-lngM)*60).toFixed(2);
        e.layer.bindPopup(
          '<p><b>Latitude :</b> '+latD+'&deg; '+latM+'&#39; '+latS+'&#34; ('+latDD.toFixed(4)+')</p>' +
          '<p><b>Longitude :</b> '+lngD+'&deg; '+lngM+'&#39; '+lngS+'&#34; ('+lngDD.toFixed(4)+')</p>'
        );
      }
    });

    $('#addDDCoord').click(function() {
        var latDD = $('#lat-dd').val(),
            latD = parseInt(latDD),
            latM = parseInt(Math.abs(latDD-latD)*60),
            latS = (((Math.abs(latDD-latD)*60)-latM)*60).toFixed(2),
            lngDD = $('#lng-dd').val(),
            lngD = parseInt(lngDD),
            lngM = parseInt(Math.abs(lngDD-lngD)*60),
            lngS = (((Math.abs(lngDD-lngD)*60)-lngM)*60).toFixed(2);
        var markerLayer = L.marker([latDD,lngDD]).addTo(map);
        coordinateDrawer.disable();
        markerLayer.bindPopup(
          '<p><b>Latitude :</b> '+latD+'&deg; '+latM+'&#39; '+latS+'&#34; ('+latDD+')</p>' +
          '<p><b>Longitude :</b> '+lngD+'&deg; '+lngM+'&#39; '+lngS+'&#34; ('+lngDD+')</p>'
        );
    });
    $('#addDMSCoord').click(function() {
        var latD = $('#lat-deg').val(),
            latM = $('#lat-min').val(),
            latS = $('#lat-sec').val(),
            lngD = $('#lng-deg').val(),
            lngM = $('#lng-min').val(),
            lngS = $('#lng-sec').val();
        var latDD = parseInt(Math.abs(latD)) + parseFloat(Math.abs(latM)/60) + parseFloat(Math.abs(latS)/3600);
        var lngDD = parseInt(Math.abs(lngD)) + parseFloat(Math.abs(lngM)/60) + parseFloat(Math.abs(lngS)/3600);
        latDD = latDD * (latD/Math.abs(latD));
        lngDD = lngDD * (lngD/Math.abs(lngD));
        var markerLayer = L.marker([latDD,lngDD]).addTo(map);
        coordinateDrawer.disable();
        markerLayer.bindPopup(
          '<p><b>Latitude :</b> '+latD+'&deg; '+latM+'&#39; '+latS+'&#34; ('+latDD+')</p>' +
          '<p><b>Longitude :</b> '+lngD+'&deg; '+lngM+'&#39; '+lngS+'&#34; ('+lngDD+')</p>'
        );
    });

    // Search Spatial Object
    $('#btn-search-feature').click(function() {
      $("#searchSpatialObject").modal("show");

      $.getJSON("{{ route('all_layers') }}", function(data) {
          $("#allLayersName").html('');
          $.each(data, function(){
              $("#allLayersName").append('<option value="'+ this.nama_tabel_spasial +'">'+ this.nama +'</option>')
          });

          $('#allLayersName').change(function() {
            var tableName = $("#allLayersName").val();
            $.getJSON("{{ route('all_fields') }}?tableName="+tableName, function(data) {
                $("#allFieldsName").html('');
                $.each(data, function(){
                    $("#allFieldsName").append('<option value="'+ this.column_name +'">'+ this.column_name +'</option>')
                });

                $('#allFieldsName').change(function() {
                  var colName = $("#allFieldsName").val();
                  var tableName = $("#allLayersName").val();
                  var listData = [];
                  $("#findValues").val('');
                  $.getJSON("{{ route('all_values') }}?tableName="+tableName+"&colName="+colName, function(data) {
                      $.each(data, function(){
                          listData.push((this[1].toString() + ", " + this[0].toString()));
                      });
                      autocomplete(document.getElementById("findValues"), listData);
                  });
                }).trigger('change');

                $('#findValues').change(function() {
                  if($('#findValues').val() != ''){
                    $("#searchObject").prop('disabled', false);
                  } else {
                    $("#searchObject").prop('disabled', true);
                  }
                });

            });
          }).trigger('change');
      });

      $('#searchObject').click(function() {
          var searchVal = $("#findValues").val();
          if (searchVal.split(",")[1]){
            var gid = searchVal.split(",")[1].trim();
            var tableName = $("#allLayersName").val();
            var myStyle = {
              "color": "#00c4ff",
              "weight": 5
            };
            var featureJson = L.geoJson.ajax(
              "{{ route('get_obj') }}?tableName="+tableName+"&gid="+gid, {
              style: myStyle,
              onEachFeature : function (feature, layer){
                if (feature.properties) {
                    var allattributes = "";
                    for (var key in feature.properties) {
                      if (feature.properties.hasOwnProperty(key)) {
                          allattributes += "<tr><th>" + key + "</th><td>" + feature.properties[key] + "</td></tr>";
                      }
                    }
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + allattributes + "</table>";
                    layer.on({
                      click: function (e) {
                        $("#attributeModalInfo").html(content);
                        $("#attributeModal").modal("show");
                      }
                    });
                    $("#attributeModalInfo").html(content);
                  }
              }
            });
            $('#searchSpatialObject').modal('toggle');
            featureJson.on('data:loaded', function() {
               map.fitBounds(featureJson.getBounds())
               featureJson.addTo(map);
               $('#btn-search-feature, #btn-feature-info').click(function() {
                 map.removeLayer(featureJson);
               });
            })
          }
      });
    });
</script>
@endpush
