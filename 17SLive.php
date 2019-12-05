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
        var map;

        let searchParams = new URLSearchParams(window.location.search);

        function initMap() {
            /* Map */
            // Instantiate the Map
            var mapOptions = {
                zoom: 14,
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
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            marker = new google.maps.Marker({
                map: map,
                title: '17S Regent',
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
            var path = [
                new google.maps.LatLng(45.99930935318251, -66.57779216766357),
                new google.maps.LatLng(45.99642706481073, -66.57670542737418),
                new google.maps.LatLng(45.99588965705079, -66.57665288214412),
                new google.maps.LatLng(45.99363122185493, -66.57761847738948),
                new google.maps.LatLng(45.99297942744893, -66.5780369019958),
                new google.maps.LatLng(45.99113830294408, -66.58011829619136),
                new google.maps.LatLng(45.99053452003378, -66.58105170492854),
                new google.maps.LatLng(45.99025126158379, -66.58171689276423),
                new google.maps.LatLng(45.98931948013945, -66.58711780018353),
                new google.maps.LatLng(45.9890138524094, -66.58858832076277),
                new google.maps.LatLng(45.98876785813263, -66.58892091468061),
                new google.maps.LatLng(45.98786586976437, -66.5896933908769),
                new google.maps.LatLng(45.98715023217249, -66.59065898612226),
                new google.maps.LatLng(45.98655386044507, -66.59135636046614),
                new google.maps.LatLng(45.98556237822836, -66.59204300597395),
                new google.maps.LatLng(45.985033083458845, -66.59224685385908),
                new google.maps.LatLng(45.98262510112053, -66.59224685385908),
                new google.maps.LatLng(45.98030648045337, -66.59300860121931),
                new google.maps.LatLng(45.97983678019526, -66.59306224539961),
                new google.maps.LatLng(45.978822810497455, -66.59269746497358),
                new google.maps.LatLng(45.97898683626632, -66.58539112761702),
                new google.maps.LatLng(45.98039594671745, -66.58544477179731),
                new google.maps.LatLng(45.98040351722896, -66.58816753816365),
                new google.maps.LatLng(45.980459433562935, -66.58911167573689),
                new google.maps.LatLng(45.97889490519247, -66.5894856808523),
                new google.maps.LatLng(45.97882279900487, -66.59269757077743),
                new google.maps.LatLng(45.97819104022108, -66.59260896414793),
                new google.maps.LatLng(45.97708011295836, -66.5922978279022),
                new google.maps.LatLng(45.976230126714285, -66.5922441837219),
                new google.maps.LatLng(45.97523206117511, -66.59201887816465),
                new google.maps.LatLng(45.973964490748784, -66.59130004614866),
                new google.maps.LatLng(45.97310071292961, -66.59077621587977),
                new google.maps.LatLng(45.972496113469816, -66.5904397484149),
                new google.maps.LatLng(45.97210836997024, -66.59032173121824),
                new google.maps.LatLng(45.971623686778365, -66.59028954471006),
                new google.maps.LatLng(45.96989260270094, -66.59089711971058),
                new google.maps.LatLng(45.96792770813904, -66.59166421163798),
                new google.maps.LatLng(45.9676160242573, -66.59185733068705),
                new google.maps.LatLng(45.96723570388156, -66.59226502645731),
                new google.maps.LatLng(45.96700592598464, -66.592728712775),
                new google.maps.LatLng(45.96688235452445, -66.59308276436496),
                new google.maps.LatLng(45.96663626190832, -66.59489593765903),
                new google.maps.LatLng(45.96647701923921, -66.59557976965709),
                new google.maps.LatLng(45.9658655098834, -66.59753241781993),
                new google.maps.LatLng(45.96551500757506, -66.59919538740917),
                new google.maps.LatLng(45.96545534738683, -66.59989276175304),
                new google.maps.LatLng(45.96598482931222, -66.60203852896495),
                new google.maps.LatLng(45.9660594038247, -66.6028950926297),
                new google.maps.LatLng(45.966104148484, -66.60373194184234),
                new google.maps.LatLng(45.96600720167653, -66.60507083328997),
                new google.maps.LatLng(45.96786779194967, -66.60620968795837),
                new google.maps.LatLng(45.96811579284871, -66.60639728624778),
                new google.maps.LatLng(45.96834323604805, -66.60665746052223),
                new google.maps.LatLng(45.96882794794713, -66.60732801277595),
                new google.maps.LatLng(45.96908708064552, -66.60784567911583),
                new google.maps.LatLng(45.97013664888788, -66.6103397460185),
                new google.maps.LatLng(45.971154324317574, -66.61271712460132),
                new google.maps.LatLng(45.97033697469057, -66.61340113882),
                new google.maps.LatLng(45.96920742115891, -66.61436233333859),
                new google.maps.LatLng(45.969025809905425, -66.61384236895617),
                new google.maps.LatLng(45.968889718632795, -66.61356493689613),
                new google.maps.LatLng(45.96872566295552, -66.61332687023389),
                new google.maps.LatLng(45.96823071551739, -66.61210646513211),
                new google.maps.LatLng(45.96794920724173, -66.61138417269632),
                new google.maps.LatLng(45.96781684192886, -66.61116101066403),
                new google.maps.LatLng(45.96763332168654, -66.61098247996784),
                new google.maps.LatLng(45.9655210197864, -66.60972893358502),
                new google.maps.LatLng(45.965153232594254, -66.61128317078737),
                new google.maps.LatLng(45.96451167053018, -66.61397441999725),
                new google.maps.LatLng(45.963818104312395, -66.61687657015136),
                new google.maps.LatLng(45.96546317400778, -66.61764271392678),
                new google.maps.LatLng(45.96574655928966, -66.6178251041398),
                new google.maps.LatLng(45.96595536856975, -66.6181147827134),
                new google.maps.LatLng(45.96811247608701, -66.62162613590664),
                new google.maps.LatLng(45.9693856247333, -66.62384364854336),
                new google.maps.LatLng(45.97053937757327, -66.62571583043575),
                new google.maps.LatLng(45.971383373755216, -66.62713740121364),
                new google.maps.LatLng(45.97267343656716, -66.62936008893831),
                new google.maps.LatLng(45.97280765440866, -66.62975705587252),
                new google.maps.LatLng(45.97290458931411, -66.63048661672457),
                new google.maps.LatLng(45.97321217010234, -66.63117058002337),
                new google.maps.LatLng(45.97244414700217, -66.63191086971148),
                new google.maps.LatLng(45.973016256613285, -66.63323113789733),
                new google.maps.LatLng(45.97342218549329, -66.63428142540835),
                new google.maps.LatLng(45.97580570523621, -66.6340096786335),
                new google.maps.LatLng(45.97589517877256, -66.6352327659443),
                new google.maps.LatLng(45.976778722181784, -66.63788815286904),
                new google.maps.LatLng(45.97611140588865, -66.63841923025399),
                new google.maps.LatLng(45.97524649235859, -66.63911124017983),
                new google.maps.LatLng(45.97429419669008, -66.63978715685158),
                new google.maps.LatLng(45.97403322426034, -66.63994808939248),
                new google.maps.LatLng(45.97351710528392, -66.64020021703988),
                new google.maps.LatLng(45.97288899792276, -66.64059231379684),
                new google.maps.LatLng(45.97174256900837, -66.64110527765916),
                new google.maps.LatLng(45.96971431460841, -66.64212451708482),
                new google.maps.LatLng(45.96684860550239, -66.64354072344469),
                new google.maps.LatLng(45.966229642825766, -66.64382503760027),
                new google.maps.LatLng(45.96588153306892, -66.64405034315752),
                new google.maps.LatLng(45.96533340629951, -66.64435611498521),
                new google.maps.LatLng(45.96509476437872, -66.64453850519823),
                new google.maps.LatLng(45.96398572938294, -66.64539144766496),
                new google.maps.LatLng(45.96231418786547, -66.64148190120562),
                new google.maps.LatLng(45.96086526900842, -66.63803313583588),
                new google.maps.LatLng(45.96027980149805, -66.63669203132844),
                new google.maps.LatLng(45.959864775446064, -66.63603905209897),
                new google.maps.LatLng(45.95942100600206, -66.63544896611569),
                new google.maps.LatLng(45.95919352616968, -66.63518610963223),
                new google.maps.LatLng(45.95843085380432, -66.63459313112071),
                new google.maps.LatLng(45.95768339989871, -66.63408944330337),
                new google.maps.LatLng(45.95644433622644, -66.63332233152511),
                new google.maps.LatLng(45.956052750965554, -66.63362273893478),
                new google.maps.LatLng(45.949883365325064, -66.63888323690651),
                new google.maps.LatLng(45.94918220781438, -66.63948114186422),
                new google.maps.LatLng(45.948954685950156, -66.63965548545019),
                new google.maps.LatLng(45.948781246524725, -66.63961525231497),
                new google.maps.LatLng(45.948687999297476, -66.63968767195837),
                new google.maps.LatLng(45.948512694085565, -66.63966353207724),
                new google.maps.LatLng(45.94816767688964, -66.63951869279043),
                new google.maps.LatLng(45.947685620031955, -66.63920079588951),
                new google.maps.LatLng(45.947473011922554, -66.63909685874125),
                new google.maps.LatLng(45.94685746467281, -66.63904589676997),
                new google.maps.LatLng(45.94656062717228, -66.63888721429339),
                new google.maps.LatLng(45.945861341430344, -66.6389861558547),
                new google.maps.LatLng(45.94555938903727, -66.63905589328908),
                new google.maps.LatLng(45.9454232401197, -66.63909880863332),
                new google.maps.LatLng(45.945090303336286, -66.6392919276824),
                new google.maps.LatLng(45.94497093890977, -66.63939921604299),
                new google.maps.LatLng(45.944681226863985, -66.63978635334013),
                new google.maps.LatLng(45.94450217880659, -66.64010017179487),
                new google.maps.LatLng(45.94412542996389, -66.6408270504379),
                new google.maps.LatLng(45.944745023571905, -66.64149351336238),
                new google.maps.LatLng(45.9450191894736, -66.64190925575969),
                new google.maps.LatLng(45.945358631092304, -66.64274304225017),
                new google.maps.LatLng(45.94601909747321, -66.64456504131579),
                new google.maps.LatLng(45.94561221698423, -66.6449321542807),
                new google.maps.LatLng(45.945291886412825, -66.64500725613311),
                new google.maps.LatLng(45.94493752380906, -66.64498311625198),
                new google.maps.LatLng(45.94473875645979, -66.64490001148943),
                new google.maps.LatLng(45.94427857824847, -66.64466108178283),
                new google.maps.LatLng(45.943932909457494, -66.64453345206482),
                new google.maps.LatLng(45.94357667304877, -66.6443671551059),
                new google.maps.LatLng(45.943362184054656, -66.64478021529419),
                new google.maps.LatLng(45.94307308888005, -66.64526301291687),
                new google.maps.LatLng(45.942587073531136, -66.64611538948418),
                new google.maps.LatLng(45.942518516115406, -66.64623654816916),
                new google.maps.LatLng(45.94239286834821, -66.64638742242624),
                new google.maps.LatLng(45.94207345913675, -66.64577386711409),
                new google.maps.LatLng(45.94194476235045, -66.64566657875349),
                new google.maps.LatLng(45.94180883236642, -66.64572760782903),
                new google.maps.LatLng(45.941105720611056, -66.64640043256009),
                new google.maps.LatLng(45.94003661183652, -66.6473204302522),
                new google.maps.LatLng(45.938679580375414, -66.64842231642314),
                new google.maps.LatLng(45.93800902766463, -66.64900549406889),
                new google.maps.LatLng(45.93857207378204, -66.65038930477635),
                new google.maps.LatLng(45.93901680134535, -66.65149019309837),
                new google.maps.LatLng(45.9382056091142, -66.65219398054148),
                new google.maps.LatLng(45.93801721361851, -66.65238844069506),
                new google.maps.LatLng(45.937802703116375, -66.65258290084864),
                new google.maps.LatLng(45.9379394040733, -66.65274528321731),
                new google.maps.LatLng(45.93812481971228, -66.65295181331146),
                new google.maps.LatLng(45.938562231185564, -66.65338901338089),
                new google.maps.LatLng(45.93939383040938, -66.65424858424853),
                new google.maps.LatLng(45.93950475429242, -66.65433772534652),
                new google.maps.LatLng(45.93965417275684, -66.65427603453918),
                new google.maps.LatLng(45.940045173392384, -66.65395576238757),
                new google.maps.LatLng(45.940817633158865, -66.65568494984541),
                new google.maps.LatLng(45.94099368812181, -66.65617065331998),
                new google.maps.LatLng(45.93966448427847, -66.65724983774982),
                new google.maps.LatLng(45.93808646058417, -66.65862849318347),
                new google.maps.LatLng(45.9368143094976, -66.65972283446155),
                new google.maps.LatLng(45.934983256825696, -66.66121070922469),
                new google.maps.LatLng(45.934177303779045, -66.66192265991555),
                new google.maps.LatLng(45.93393965928547, -66.66133824120675),
                new google.maps.LatLng(45.93342852574845, -66.6603377772442),
                new google.maps.LatLng(45.93289127082123, -66.65935426065448),
                new google.maps.LatLng(45.93239691707172, -66.65842388695961),
                new google.maps.LatLng(45.932099789472474, -66.65785961565086),
                new google.maps.LatLng(45.931872309920415, -66.65723734315941),
                new google.maps.LatLng(45.93242920260139, -66.65675856885025),
                new google.maps.LatLng(45.932546728540636, -66.65668078478882),
                new google.maps.LatLng(45.93267399445507, -66.65667273816177),
                new google.maps.LatLng(45.932765403136976, -66.65674784001419),
                new google.maps.LatLng(45.933205655086496, -66.6579199653537),
                new google.maps.LatLng(45.93348360896676, -66.6586763482959),
                new google.maps.LatLng(45.934128482526305, -66.66010700584087),
                new google.maps.LatLng(45.93394576478979, -66.66026599709915),
                new google.maps.LatLng(45.93388980149965, -66.66034056088938),
                new google.maps.LatLng(45.93385808894351, -66.66043175599589),
                new google.maps.LatLng(45.933841299935864, -66.66064633271708),
                new google.maps.LatLng(45.933873547889995, -66.66095024449533),
                new google.maps.LatLng(45.93394154883817, -66.66134284086655),
                new google.maps.LatLng(45.93417752538496, -66.66192246974947),
                new google.maps.LatLng(45.93246439035155, -66.66347145940551),
                new google.maps.LatLng(45.93162118160659, -66.66417419816742),
                new google.maps.LatLng(45.93117321269458, -66.66455507184753),
                new google.maps.LatLng(45.9307739866989, -66.66482188108705),
                new google.maps.LatLng(45.93053160440104, -66.66499334179707),
                new google.maps.LatLng(45.93013592505646, -66.66516755607893),
                new google.maps.LatLng(45.92982250837543, -66.66525875118543),
                new google.maps.LatLng(45.92902403406583, -66.66534994629194),
                new google.maps.LatLng(45.929025899673405, -66.6647115805464),
                new google.maps.LatLng(45.92895873776105, -66.664279744895),
                new google.maps.LatLng(45.9288561291268, -66.66394983318617),
                new google.maps.LatLng(45.92849078657721, -66.66311202991642),
                new google.maps.LatLng(45.929352507708465, -66.66236090719218)
            ];
            var polyline = new google.maps.Polyline({
                path: path,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            polyline.setMap(map);
            shapes.push(polyline);


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
                data: "route_id=73", //the data
                dataType: 'json', //data format   
                success: function(data) {
                    //on receive of reply
                    //alert(data);
                    var json = JSON.parse(data);
                    marker.setPosition(new google.maps.LatLng(json['data']['BusLocation']['latitude'], json['data']['BusLocation']['longitude']));
                    map.setCenter(new google.maps.LatLng(json['data']['BusLocation']['latitude'], json['data']['BusLocation']['longitude']));
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