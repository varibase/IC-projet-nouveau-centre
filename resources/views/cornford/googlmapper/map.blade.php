<div id="map-canvas-{!! $id !!}" style="width: 100%; height: 100%; margin: 0; padding: 0; position: relative; overflow: hidden;"></div>

<script type="text/javascript">

	var maps = [];

	function initialize_{!! $id !!}() {
		var bounds = new google.maps.LatLngBounds();
		var infowindow = new google.maps.InfoWindow();
		var position = new google.maps.LatLng({!! $options['latitude'] !!}, {!! $options['longitude'] !!});

		var mapOptions_{!! $id !!} = {
			@if ($options['center'])
				center: position,
			@endif
            zoom: {!! $options['zoom'] !!},
			mapTypeId: google.maps.MapTypeId.{!! $options['type'] !!},
			disableDefaultUI: @if (!$options['ui']) true @else false @endif,
			scrollwheel: @if ($options['scrollWheelZoom']) true @else false @endif,
            zoomControl: @if ($options['zoomControl']) true @else false @endif,
            mapTypeControl: @if ($options['mapTypeControl']) true @else false @endif,
            scaleControl: @if ($options['scaleControl']) true @else false @endif,
            streetViewControl: @if ($options['streetViewControl']) true @else false @endif,
            rotateControl: @if ($options['rotateControl']) true @else false @endif,
            fullscreenControl: @if ($options['fullscreenControl']) true @else false @endif,
            styles: [
                {
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#bdbdbd"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    featureType: 'poi.business',
                    stylers: [{visibility: 'off'}]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dadada"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c9c9c9"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                }
            ]
		};

		var map_{!! $id !!} = new google.maps.Map(document.getElementById('map-canvas-{!! $id !!}'), mapOptions_{!! $id !!});
		map_{!! $id !!}.setTilt({!! $options['tilt'] !!});

		var markers = [];
		var infowindows = [];
		var shapes = [];
        var bounds  = new google.maps.LatLngBounds();
		@foreach ($options['markers'] as $key => $marker)
			{!! $marker->render($key, $view) !!}
		@endforeach

		@foreach ($options['shapes'] as $key => $shape)
			{!! $shape->render($key, $view) !!}
		@endforeach

		@if ($options['overlay'] == 'BIKE')
			var bikeLayer = new google.maps.BicyclingLayer();
			bikeLayer.setMap(map_{!! $id !!});
		@endif

		@if ($options['overlay'] == 'TRANSIT')
			var transitLayer = new google.maps.TransitLayer();
			transitLayer.setMap(map_{!! $id !!});
		@endif

		@if ($options['overlay'] == 'TRAFFIC')
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(map_{!! $id !!});
		@endif

		var idleListener = google.maps.event.addListenerOnce(map_{!! $id !!}, "idle", function () {
			map_{!! $id !!}.setZoom({!! $options['zoom'] !!});

			@if (!$options['center'])
				map_{!! $id !!}.fitBounds(bounds);
			@endif

			@if ($options['locate'])
				if (typeof navigator !== 'undefined' && navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function (position) {
						map_{!! $id !!}.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
					});
				}
			@endif
		});

        var map = map_{!! $id !!};

		@if (isset($options['eventBeforeLoad']))
			{!! $options['eventBeforeLoad'] !!}
		@endif

		@if (isset($options['eventAfterLoad']))
			google.maps.event.addListenerOnce(map_{!! $id !!}, "tilesloaded", function() {
				{!! $options['eventAfterLoad'] !!}
			});
		@endif

		@if ($options['cluster'])
			var markerClusterOptions = {
				imagePath: '{!! $options['clusters']['icon'] !!}',
				gridSize: {!! $options['clusters']['grid'] !!},
				maxZoom: @if ($options['clusters']['zoom'] === null) null @else {!! $options['clusters']['zoom'] !!} @endif,
				averageCenter: @if ($options['clusters']['center'] === true) true @else false @endif,
				minimumClusterSize: {!! $options['clusters']['size'] !!}
			};
			var markerCluster = new MarkerClusterer(map_{!! $id !!}, markers, markerClusterOptions);
		@endif
        map_{!! $id !!}.fitBounds(bounds);
        map_{!! $id !!}.panToBounds(bounds);

		maps.push({
			key: {!! $id !!},
			markers: markers,
			infowindows: infowindows,
			map: map_{!! $id !!},
			shapes: shapes
		});
	}

    @if (!$options['async'])

	    google.maps.event.addDomListener(window, 'load', initialize_{!! $id !!});

    @endif

</script>