<html>

<head>
    <title>HotSpot Bus Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div id="map" class="map-responsive"></div>

        <div id="legend">
            <h2> HotSpot Bus Tracker </h2>

            <div class="inner">
                <small class="timestamp">Last Updated: <span></span></small>
            </div>

            <div class="toggler"></div>
        </div>
    </div>
    <script>
        var marker;

        let searchParams = new URLSearchParams(window.location.search);

        function initMap() {
            /* Map */
            // Instantiate the Map
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng('45.962544', '-66.641998'),
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP]
                },
                disableDefaultUI: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scaleControl: true,
                styles: [{
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "poi",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "transit",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#dce9f1"
                        }]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    }
                ]
            };
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            marker = new google.maps.Marker({
                map: map,
                title: '10N Carlisle',
                icon: 'marker.png'
            });
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://opendata.arcgis.com/datasets/edee18d4f82d4bbdbd649858c796bbb3_0.geojson",
                "method": "GET",
                "headers": {
                    "User-Agent": "PostmanRuntime/7.19.0",
                    "Accept": "*/*",
                    "Cache-Control": "no-cache",
                    "Postman-Token": "9ec5d9bb-5645-4fcd-8ed0-5e2ad136029d,7d5d4783-b322-4e8c-bffd-86d35ca9dd22",
                    "Host": "opendata.arcgis.com",
                    "Accept-Encoding": "gzip, deflate",
                    "Connection": "keep-alive",
                    "cache-control": "no-cache"
                }
            }

            function mapFeature(feature, index, arr) {
                //console.log(feature.properties.OBJECTID);
                console.log(feature.properties.Route);
                //console.log(feature.properties.Shape__Length)
                //console.log(feature.geometry.coordinates);
                var transitLayer = new google.maps.TransitLayer();
                transitLayer.setMap(map);
                if (feature.properties.Route == "10N-11S") {
                    map.data.addGeoJson(feature);
                }
            };

            $.ajax(settings).done(function(response) {
                var featureArray = response.features;
                featureArray.forEach(mapFeature);
            });

        }
        // Get current time
        var d = new Date();
        var dy = d.getDay();
        var hr = d.getHours();
        console.log(dy);
        console.log(hr);
        /* UI */
        // Legend toggle
        $('#legend h2').click(function() {
            $(this).siblings('.inner').slideToggle('fast');
            $('.toggler').toggleClass('expanded');
        });

        // Update timestamp within Legend
        $('.timestamp span').text(
            new Date().toLocaleDateString('en-US', {
                day: 'numeric',
                month: 'short',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            })
        );

        function update() {

            $.ajax({
                url: 'update.php', //php          
                data: "route_id=66", //the data
                dataType: 'json', //data format   
                success: function(data) {
                    //on receive of reply
                    //alert(data);
                    var json = JSON.parse(data);
                    marker.setPosition(new google.maps.LatLng(json['data']['BusLocation']['latitude'], json['data']['BusLocation']['longitude']));
                }
            });
        }

        $(document).ready(update); // Call on page load


        setInterval(update, 5000); //every 5 secs
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmOrgVMGP9nR-9OQ_cLuhugkAvcQZmFXI&callback=initMap"></script>
</body>
<style type="text/css">
    h2 {
        font-size: 1.3em;
        color: #414141;
        font-family: 'Fira Sans', sans-serif !important;
        margin: 8px 0 5px;
    }

    #map {
        height: 100vh;
    }

    #legend {
        position: absolute;
        top: 2%;
        right: 5%;
        background: white;
        padding: 5px 10px;
        min-width: 325px;
        text-align: center;
        -webkit-border-radius: 25px;
        border-radius: 25px;
    }

    @media only screen and (max-width: 400px) {
        #legend {
            left: 5%;
        }
    }

    #legend h2 {
        cursor: pointer;
    }

    #legend .inner {
        display: none;
        padding: 10px 0 5px;
    }

    #legend ul {
        display: flex;
        flex-direction: row;
        justify-content: center;
        padding: 0;
        list-style: none;
    }

    #legend ul li {
        padding: 0 15px;
        line-height: 25px;
    }

    #legend ul li[data-legend]:before {
        content: "";
        display: inline-block;
        width: 25px;
        height: 25px;
        vertical-align: middle;
        margin-right: 8px;
    }

    #legend .directions {
        display: block;
        text-align: center;
        margin: 8px 0;
    }

    .toggler {
        display: block;
        width: 24px;
        height: 24px;
        position: absolute;
        top: 10px;
        right: 10px;
        background: #6c6c6c;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        pointer-events: none;
    }

    .toggler:before,
    .toggler:after {
        width: 100%;
        height: 100%;
        display: block;
        color: white;
        font-size: 20px;
        line-height: 20px;
        font-weight: bold;
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
    }

    .toggler:before {
        content: "+";
    }

    .toggler:after {
        content: "–";
    }

    .toggler.expanded:before {
        opacity: 0;
        -webkit-transform: translate(-50%, -50%) rotate(-45deg);
        transform: translate(-50%, -50%) rotate(-45deg);
    }

    /* Tooltip styling */
    .gm-style {
        color: #414141;
        font-family: 'Fira Sans', sans-serif;
        line-height: 1.5em;
    }

    .gm-style .gm-style-iw-c {
        -webkit-border-radius: 16px;
        border-radius: 16px;
    }

    .gm-style .gm-style-iw-c button {
        top: 0 !important;
        right: 0 !important;
    }

    .infowindowsmall {
        font-size: 0.85em;
    }
</style>

</html>