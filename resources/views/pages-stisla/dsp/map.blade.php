@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div id="map" class="card shadow-lg" style="height: 74vh; width:auto; border-radius: 15px;background-size: cover;">
               
      </div>
   </section>
@endsection

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush
@push('map')
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoicmFobWF0cmgiLCJhIjoiY2xwNml3MzJ0MjBpNjJscXl6am9mc21sayJ9.BHym8QvhGHWK1QC3qDX4sg';
   const map = new mapboxgl.Map({
   container: 'map', // container ID
   // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
   style: 'mapbox://styles/mapbox/streets-v12', // style URL
   center: [106.648409, -5.606965], // starting position [lng, lat]
   zoom: 8.3 // starting zoom
   });
   
   // map.Marker({
   //    color: '#57fa7d',
   //    scale: 0.6
   // })

   map.on('load', function () {

      map.addSource('earthquakes', {
         type: 'geojson',
         data: {!! $geoJsonVessel !!},
         cluster: true,
         clusterMaxZoom: 14,
         clusterRadius: 50
         
      });

      map.addLayer({
         id: 'clusters', 
         type: 'circle',
         source: 'earthquakes',
         filter: ['has', 'point_count'],
         paint: {
            'circle-color': [
                  'step',
                  ['get', 'point_count'],
                  '#51bbd6',
                  100,
                  '#f1f075',
                  750,
                  '#f28cb1'
            ],
            'circle-radius': [
                  'step',
                  ['get', 'point_count'],
                  20,
                  100,
                  30,
                  750,
                  40
            ]
         }
      });

      map.addLayer({
         id: 'cluster-count',
         type: 'symbol',
         source: 'earthquakes',
         filter: ['has', 'point_count'],
         layout: {
            'text-field': '{point_count_abbreviated}',
            'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
            'text-size': 12
         }
      });

      map.addLayer({
         'id': 'poi-labels',
         'type': 'symbol',
         'source': 'earthquakes',
         'layout': {
         'text-field': ['get', 'title'],
         'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
         'text-radial-offset': 0.5,
         'text-justify': 'auto',
         'icon-image': ['get', 'icon']
         }
      });


      map.addLayer({
         id: 'unclustered-point',
         type: 'circle',
         source: 'earthquakes',
         
         filter: ['!', ['has', 'point_count']],
         
         paint: {
               // 'circle-color': '#185ADB',
             'circle-color': [
                'match',
                ['get', 'type'],
                'Vessel',
                '#185ADB',
                'Port',
                '#223b53',
                /* other */ '#ccc'
              ],
            
               'circle-radius': 7,
               // 'circle-stroke-width': 1,
               // 'circle-stroke-color': '#66DE93'
            }
         
      });
      

      map.on('click', 'clusters', function (e) {
         var features = map.queryRenderedFeatures(e.point, {
            layers: ['clusters']
         });
         var clusterId = features[0].properties.cluster_id;
         map.getSource('earthquakes').getClusterExpansionZoom(
            clusterId,
            function (err, zoom) {
                  if (err) return;

                  map.easeTo({
                     center: features[0].geometry.coordinates,
                     zoom: zoom
                  });
            }
         );
      });

      


      map.on('click', 'unclustered-point', function (e) {
         var coordinates = e.features[0].geometry.coordinates.slice();
         var nama = e.features[0].properties.title;
         var no = e.features[0].properties.no;
         var lat = e.features[0].properties.lat;
         var long = e.features[0].properties.long;
         var speed = e.features[0].properties.speed;
         var heading = e.features[0].properties.heading;

         new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(
                  "<div class='card'><div class='card-header'><span class='font-bold text-lg'><b>" + nama +"</b></span></div><div class='card-body'><div class='row'><div class='col-md-2'>S <br> H</div><div class='col-md-10'>: "+ speed + " Knot<br>: " + heading + "</div></div></div>  <div class='card-footer'>"+lat+", "+long + "</div></div>"
            )
            .addTo(map);
      });

      map.on('mouseenter', 'clusters', function () {
         map.getCanvas().style.cursor = 'pointer';
      });
      map.on('mouseleave', 'clusters', function () {
         map.getCanvas().style.cursor = '';
      });
   });


   // loadLocation({!! $geoJsonVessel !!})
   map.setStyle('mapbox://styles/mapbox/outdoors-v11')
   map.addControl(new mapboxgl.NavigationControl())


   for (const feature of geojson.features) {
  // create a HTML element for each feature
  const el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
}
</script>
@endpush