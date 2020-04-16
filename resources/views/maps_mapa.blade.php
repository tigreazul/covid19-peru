<div id="map"></div>
<script>
    // This example creates circles on the map, representing populations in North
    // America.

    // First, create an object containing LatLng and population for each city.
    var citymap = {
        lima: {
            center: {lat: -12.062106, lng: -77.036526},
            population: 3050
        },
        piura: {
            center: {lat: -5, lng:  -80.333333},
            population: 203502
        },
        loreto: {
            center: {lat: -3.749365, lng: -73.244414},
            population: 903502
        },
        junin: {
            center: {lat: -11.5, lng: -75},
            population: 603502
        },
        arequipa: {
            center: {lat: -16.398867, lng: -71.536961},
            population: 603502
        },
        callao: {
            center: {lat: -12.052263, lng: -77.139113},
            population: 603502
        },
        lambayeque: {
            center: {lat:  -6.333333, lng: -80},
            population: 603502
        },
        cusco: {
            center: {lat:  -13.517089, lng: -71.978536},
            population: 603502
        },
        libertad: {
            center: {lat: -8, lng: -78.5},
            population: 603502
        },
        ancash: {
            center: {lat: -9.5, lng: -77.75},
            population: 603502
        },
        tumbes: {
            center: {lat: -3.833333, lng: -80.5},
            population: 603502
        },
        huanuco: {
            center: {lat: -9.5, lng: -75.833333},
            population: 603502
        },
        ica: {
            center: {lat: -14.338611, lng: -75.648333},
            population: 603502
        },
        madre_dios: {
            center: {lat: -12, lng:  -70.25},
            population: 603502
        },
        san_martin: {
            center: {lat: -7, lng: -76.833333},
            population: 603502
        }
    };

    function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: {lat:  -8.958883, lng: -74.276973},
            mapTypeId: 'roadmap'
        });

        for (var city in citymap) {
            var cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: citymap[city].center,
                radius: Math.sqrt(citymap[city].population) * 100
            });
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr9ejth9hlN5gCV-GaDQ3fPaMwkEWlGdo&callback=initMap"></script>
<style>
    #map {
        height: 800px;
        width:100%
    }
</style>