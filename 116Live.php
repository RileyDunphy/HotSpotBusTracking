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
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            marker = new google.maps.Marker({
                map: map,
                title: '116 Kings Place',
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
new google.maps.LatLng(45.96187299240157, -66.64356591653143),
new google.maps.LatLng(45.962061306828744, -66.64398434113775),
new google.maps.LatLng(45.96301813362496, -66.64314212750708),
new google.maps.LatLng(45.961685419147194, -66.63998757793428),
new google.maps.LatLng(45.96114314738274, -66.6386949710867),
new google.maps.LatLng(45.9602232983728, -66.63953182029934),
new google.maps.LatLng(45.95946441808453, -66.64017018604488),
new google.maps.LatLng(45.958748413393714, -66.6408219628355),
new google.maps.LatLng(45.95792267796517, -66.64152446293338),
new google.maps.LatLng(45.957279711117216, -66.64205554031832),
new google.maps.LatLng(45.95672217586358, -66.64255174898608),
new google.maps.LatLng(45.95621871111567, -66.64299699568255),
new google.maps.LatLng(45.95553622937662, -66.64356786357246),
new google.maps.LatLng(45.95479866611088, -66.64419156822362),
new google.maps.LatLng(45.953825263017954, -66.64508686410937),
new google.maps.LatLng(45.95309465655803, -66.64571568841893),
new google.maps.LatLng(45.95268253470229, -66.64474685020366),
new google.maps.LatLng(45.95212308836549, -66.64343256778636),
new google.maps.LatLng(45.95171984446739, -66.64265026353434),
new google.maps.LatLng(45.95117902255285, -66.64184293945613),
new google.maps.LatLng(45.95057630618452, -66.64084679695623),
new google.maps.LatLng(45.94999060650768, -66.64007230343464),
new google.maps.LatLng(45.9493068247749, -66.63913889469745),
new google.maps.LatLng(45.9488055157502, -66.63846246184056),
new google.maps.LatLng(45.948223650742314, -66.63781873167699),
new google.maps.LatLng(45.947758867967224, -66.63742981136983),
new google.maps.LatLng(45.94693257116266, -66.63670046844868),
new google.maps.LatLng(45.946660279738296, -66.63645370521931),
new google.maps.LatLng(45.946572623995216, -66.6360004118958),
new google.maps.LatLng(45.94632644116687, -66.63548263462621),
new google.maps.LatLng(45.945972394576756, -66.63511880947084),
new google.maps.LatLng(45.945850960120886, -66.63502533033386),
new google.maps.LatLng(45.94542386395715, -66.6348348934938),
new google.maps.LatLng(45.94479720162124, -66.63422603204742),
new google.maps.LatLng(45.944060491304214, -66.63344550922409),
new google.maps.LatLng(45.943730136217134, -66.63325507238403),
new google.maps.LatLng(45.942931862141506, -66.63290906742111),
new google.maps.LatLng(45.942301782220206, -66.6325759832605),
new google.maps.LatLng(45.94165083722029, -66.63212000772796),
new google.maps.LatLng(45.940128658984435, -66.63096009876796),
new google.maps.LatLng(45.93959203411189, -66.63053362753459),
new google.maps.LatLng(45.939179811859, -66.63008838083812),
new google.maps.LatLng(45.93851577318801, -66.62927030708858),
new google.maps.LatLng(45.937917214144385, -66.62867130478213),
new google.maps.LatLng(45.937008871147796, -66.62776479326931),
new google.maps.LatLng(45.93639246308309, -66.62713447415081),
new google.maps.LatLng(45.935858967625066, -66.62664012267766),
new google.maps.LatLng(45.93505311860039, -66.62588910415349),
new google.maps.LatLng(45.93451119293216, -66.62539613431773),
new google.maps.LatLng(45.93359556258853, -66.62479575075372),
new google.maps.LatLng(45.93262542805405, -66.62421708596435),
new google.maps.LatLng(45.931989293517844, -66.62384157670226),
new google.maps.LatLng(45.931659097641514, -66.6235808456268),
new google.maps.LatLng(45.93118898486647, -66.62307390812299),
new google.maps.LatLng(45.93042224476748, -66.62189563213451),
new google.maps.LatLng(45.93009950184795, -66.62134309707744),
new google.maps.LatLng(45.92938684898094, -66.61979891857777),
new google.maps.LatLng(45.92909954654429, -66.61908545097981),
new google.maps.LatLng(45.92882785178332, -66.6191927393404),
new google.maps.LatLng(45.927465936692094, -66.61906935772572),
new google.maps.LatLng(45.925938440077786, -66.61899962029133),
new google.maps.LatLng(45.925541685999534, -66.61891378960286),
new google.maps.LatLng(45.924772296264194, -66.61858018099622),
new google.maps.LatLng(45.92437969819926, -66.61857481657819),
new google.maps.LatLng(45.923640850809335, -66.61886985956983),
new google.maps.LatLng(45.92275123915833, -66.61963802907081),
new google.maps.LatLng(45.92187139543375, -66.62043196293922),
new google.maps.LatLng(45.92158778578706, -66.62063581082435),
new google.maps.LatLng(45.92014732493797, -66.62002963158699),
new google.maps.LatLng(45.918912349480074, -66.61927748937603),
new google.maps.LatLng(45.91851630139903, -66.61883850186462),
new google.maps.LatLng(45.91838101906168, -66.61900882213706),
new google.maps.LatLng(45.91774820794974, -66.6195618829733),
new google.maps.LatLng(45.91742817142154, -66.61986878380162),
new google.maps.LatLng(45.91727795841213, -66.62010481819493),
new google.maps.LatLng(45.91719678723781, -66.62039583787305),
new google.maps.LatLng(45.91717346216575, -66.62072709068639),
new google.maps.LatLng(45.91722291130688, -66.62113344535214),
new google.maps.LatLng(45.91739365045538, -66.62145765342075),
new google.maps.LatLng(45.91762596681371, -66.62170978106815),
new google.maps.LatLng(45.91895657000627, -66.6225262423448),
new google.maps.LatLng(45.91919505476274, -66.62265545939539),
new google.maps.LatLng(45.919308272900984, -66.62273653033924),
new google.maps.LatLng(45.91938477615727, -66.62286795858097),
new google.maps.LatLng(45.9195303186463, -66.6236109304781),
new google.maps.LatLng(45.919734890290854, -66.62417711905812),
new google.maps.LatLng(45.92067516980688, -66.62583586383238),
new google.maps.LatLng(45.921047488748904, -66.62639258242228),
new google.maps.LatLng(45.9214296017681, -66.62678954907881),
new google.maps.LatLng(45.921781315833954, -66.62705106445776),
new google.maps.LatLng(45.922689827330885, -66.62750291747784),
new google.maps.LatLng(45.92313575667304, -66.62775504512524),
new google.maps.LatLng(45.92337638466441, -66.62805804789309),
new google.maps.LatLng(45.923540574606356, -66.6283289510036),
new google.maps.LatLng(45.92457526008316, -66.6271271548128),
new google.maps.LatLng(45.92479349277912, -66.62684745589485),
new google.maps.LatLng(45.92525619682378, -66.62581748763313),
new google.maps.LatLng(45.92547010763721, -66.6254335609222),
new google.maps.LatLng(45.925890623869485, -66.624933714267),
new google.maps.LatLng(45.92615555448246, -66.62469499766468),
new google.maps.LatLng(45.926384801976575, -66.62463062464832),
new google.maps.LatLng(45.92658546405204, -66.62466792711427),
new google.maps.LatLng(45.927309346904366, -66.62498174556902),
new google.maps.LatLng(45.92799963876326, -66.62509976276567),
new google.maps.LatLng(45.928324950565994, -66.62511168356747),
new google.maps.LatLng(45.928602671514014, -66.62499712312433),
new google.maps.LatLng(45.92916133311039, -66.62448213899347),
new google.maps.LatLng(45.92936760688974, -66.62509176087264),
new google.maps.LatLng(45.929453329244396, -66.62563965800575),
new google.maps.LatLng(45.929537169159275, -66.62655348820704),
new google.maps.LatLng(45.930046472986646, -66.62758882088679),
new google.maps.LatLng(45.93023627158734, -66.62789076112671),
new google.maps.LatLng(45.93059169850071, -66.62777006172104),
new google.maps.LatLng(45.93082862346463, -66.62775396846695),
new google.maps.LatLng(45.93103101246622, -66.62782558990864),
new google.maps.LatLng(45.93133037684238, -66.62809034007188),
new google.maps.LatLng(45.93283429188892, -66.62970325439522),
new google.maps.LatLng(45.93333765519392, -66.63026824637348),
new google.maps.LatLng(45.93390930610615, -66.63091197653705),
new google.maps.LatLng(45.93500528825542, -66.63221323652755),
new google.maps.LatLng(45.93585836704876, -66.63319224281798),
new google.maps.LatLng(45.936406785388805, -66.63376623554717),
new google.maps.LatLng(45.93655228322173, -66.633916439252),
new google.maps.LatLng(45.93625467143844, -66.63447519684064),
new google.maps.LatLng(45.93617234312502, -66.63507601165998),
new google.maps.LatLng(45.93610332449696, -66.63697501564252),
new google.maps.LatLng(45.93603430578297, -66.63889011287915),
new google.maps.LatLng(45.93601005594414, -66.63957944059598),
new google.maps.LatLng(45.93594290248898, -66.63992812776792),
new google.maps.LatLng(45.935832845261615, -66.64021512413251),
new google.maps.LatLng(45.935642576319445, -66.6405446067613),
new google.maps.LatLng(45.935377691018786, -66.64082664844926),
new google.maps.LatLng(45.935062438554226, -66.64098221657213),
new google.maps.LatLng(45.934627564690224, -66.64099294540819),
new google.maps.LatLng(45.93375233126426, -66.64093393680986),
new google.maps.LatLng(45.93273035385864, -66.64084620152119),
new google.maps.LatLng(45.93238189185089, -66.64082419115823),
new google.maps.LatLng(45.93208714291032, -66.64068739849847),
new google.maps.LatLng(45.93175508210084, -66.64036016899865),
new google.maps.LatLng(45.93091936183722, -66.63926854447129),
new google.maps.LatLng(45.93017906599879, -66.63834023872585),
new google.maps.LatLng(45.92974352956604, -66.63770538874451),
new google.maps.LatLng(45.9290525072509, -66.63647441288856),
new google.maps.LatLng(45.92856185053131, -66.63557076647135),
new google.maps.LatLng(45.92790245714163, -66.63404190733286),
new google.maps.LatLng(45.927596858793486, -66.63331984631293),
new google.maps.LatLng(45.92652348849619, -66.63432654870871),
new google.maps.LatLng(45.92453270251395, -66.63599757638627),
new google.maps.LatLng(45.92352801925917, -66.63687991710106),
new google.maps.LatLng(45.92242468737116, -66.63795280070701),
new google.maps.LatLng(45.921871079134625, -66.6386340817968),
new google.maps.LatLng(45.9214120785836, -66.63936364264885),
new google.maps.LatLng(45.92130759012268, -66.63969623656669),
new google.maps.LatLng(45.92123668712642, -66.64039137494336),
new google.maps.LatLng(45.921251614080504, -66.64114548142908),
new google.maps.LatLng(45.92140127141748, -66.64184749021251),
new google.maps.LatLng(45.921655028338485, -66.64249578746751),
new google.maps.LatLng(45.922173733727824, -66.64339076808676),
new google.maps.LatLng(45.922673776058964, -66.64428662589773),
new google.maps.LatLng(45.923274567227594, -66.64535125193231),
new google.maps.LatLng(45.92373728394097, -66.64605399069421),
new google.maps.LatLng(45.924285274166735, -66.64660116133325),
new google.maps.LatLng(45.92488063812894, -66.64710300394938),
new google.maps.LatLng(45.925272443608065, -66.64742486903117),
new google.maps.LatLng(45.92562407995354, -66.64777892062114),
new google.maps.LatLng(45.926019611599344, -66.64828317591594),
new google.maps.LatLng(45.92658448218184, -66.64922731348918),
new google.maps.LatLng(45.927211350365816, -66.65033238360331),
new google.maps.LatLng(45.927617853700504, -66.65102631763637),
new google.maps.LatLng(45.92806241178269, -66.65181488708674),
new google.maps.LatLng(45.92835345085186, -66.65260345653712),
new google.maps.LatLng(45.9289541805117, -66.65487796978175),
new google.maps.LatLng(45.92944296816728, -66.6562566252154),
new google.maps.LatLng(45.930361424338074, -66.65842385009944),
new google.maps.LatLng(45.93218637794038, -66.6628068579704),
new google.maps.LatLng(45.93246247143714, -66.66347204580609),
new google.maps.LatLng(45.931238695212336, -66.66449664964978),
new google.maps.LatLng(45.93085439405837, -66.66478096380536),
new google.maps.LatLng(45.930539088416786, -66.66495935044793),
new google.maps.LatLng(45.930127120035415, -66.6651687480263),
new google.maps.LatLng(45.92968478975093, -66.66527362491973),
new google.maps.LatLng(45.92902063737752, -66.66534336235412),
new google.maps.LatLng(45.92902809980791, -66.66468890335449),
new google.maps.LatLng(45.92898332521047, -66.66439225649572),
new google.maps.LatLng(45.92892798023565, -66.66417143172816),
new google.maps.LatLng(45.92883843084303, -66.66388175315456),
new google.maps.LatLng(45.928474540821234, -66.66310455635119),
new google.maps.LatLng(45.92905568030436, -66.66260989693865),
new google.maps.LatLng(45.929890796793444, -66.66189402406866),
new google.maps.LatLng(45.93001205926056, -66.66178941791708),
new google.maps.LatLng(45.93013705260302, -66.66159361665899),
new google.maps.LatLng(45.93028443245091, -66.66130930250341),
new google.maps.LatLng(45.93042193911702, -66.66104518025156),
new google.maps.LatLng(45.93057864598531, -66.66084111872817),
new google.maps.LatLng(45.93116466701515, -66.6603528041494),
new google.maps.LatLng(45.932462314632794, -66.66347211450193),
new google.maps.LatLng(45.934182045577565, -66.66192789867091)];
var polyline = new google.maps.Polyline({path:path, strokeColor: "#FF0000", strokeOpacity: 1.0, strokeWeight: 2});
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
                data: "route_id=74", //the data
                dataType: 'json', //data format   
                success: function(data) {
                    //on receive of reply
                    //alert(data);
                    var json = JSON.parse(data);
                    marker.setPosition(new google.maps.LatLng(json['data']['BusLocation']['latitude'], json['data']['BusLocation']['longitude']));
                    window.map.panTo(new google.maps.LatLng(json['data']['BusLocation']['latitude'], json['data']['BusLocation']['longitude']));
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