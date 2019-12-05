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
                title: '13S Prospect',
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
                new google.maps.LatLng(46.01372849630655, -66.6291069253761),
                new google.maps.LatLng(46.01362045631899, -66.63031928385084),
                new google.maps.LatLng(46.0135757500555, -66.63087718332594),
                new google.maps.LatLng(46.01350123953606, -66.63138143862074),
                new google.maps.LatLng(46.01323582567271, -66.63181404100226),
                new google.maps.LatLng(46.01161898514533, -66.63325871572738),
                new google.maps.LatLng(46.010458698604126, -66.63427259073501),
                new google.maps.LatLng(46.00975775249945, -66.6348946214423),
                new google.maps.LatLng(46.009277124706955, -66.6352379441962),
                new google.maps.LatLng(46.0081109329352, -66.63627327687595),
                new google.maps.LatLng(46.00729204263113, -66.63694382912968),
                new google.maps.LatLng(46.00655807505245, -66.63754457369117),
                new google.maps.LatLng(46.00378901243789, -66.63989418878822),
                new google.maps.LatLng(45.99953481783763, -66.64370465918915),
                new google.maps.LatLng(45.99640378427915, -66.64639112666617),
                new google.maps.LatLng(45.99442860858582, -66.648161384616),
                new google.maps.LatLng(45.994793742786676, -66.64891472878696),
                new google.maps.LatLng(45.995354512372266, -66.65011884300355),
                new google.maps.LatLng(45.995773770242955, -66.65115685789232),
                new google.maps.LatLng(45.99622091490294, -66.65216112840636),
                new google.maps.LatLng(45.99641940581074, -66.65264009658284),
                new google.maps.LatLng(45.9966895893809, -66.65314703408666),
                new google.maps.LatLng(45.99620884804494, -66.65361373845525),
                new google.maps.LatLng(45.99585853777429, -66.65394365016408),
                new google.maps.LatLng(45.99566351985354, -66.65412638195738),
                new google.maps.LatLng(45.99546839109101, -66.65428332597287),
                new google.maps.LatLng(45.99521310860143, -66.65437452107938),
                new google.maps.LatLng(45.99469881329459, -66.65449522048505),
                new google.maps.LatLng(45.994473701172225, -66.65455154687436),
                new google.maps.LatLng(45.99430077405149, -66.65456227571042),
                new google.maps.LatLng(45.99396113642252, -66.6546320131448),
                new google.maps.LatLng(45.99373379843616, -66.65467761069806),
                new google.maps.LatLng(45.993560499179964, -66.65472320825131),
                new google.maps.LatLng(45.99323253351086, -66.65479831010373),
                new google.maps.LatLng(45.99288593131645, -66.65488145858319),
                new google.maps.LatLng(45.99243683599743, -66.65498606473477),
                new google.maps.LatLng(45.99222439959764, -66.65508530646832),
                new google.maps.LatLng(45.99201382587032, -66.65524892121823),
                new google.maps.LatLng(45.9918154414553, -66.65551066025739),
                new google.maps.LatLng(45.991649590192985, -66.65597736462598),
                new google.maps.LatLng(45.99147628441031, -66.65663718804365),
                new google.maps.LatLng(45.99143676665369, -66.65683283239684),
                new google.maps.LatLng(45.99145329953541, -66.65731424267938),
                new google.maps.LatLng(45.99163964989473, -66.6580196636503),
                new google.maps.LatLng(45.99182286452196, -66.65865406930038),
                new google.maps.LatLng(45.99188435979929, -66.65913954913208),
                new google.maps.LatLng(45.99188249630709, -66.6598637455661),
                new google.maps.LatLng(45.99181541054433, -66.66118339240143),
                new google.maps.LatLng(45.991276858002564, -66.66114047705719),
                new google.maps.LatLng(45.991174364710744, -66.66117266356537),
                new google.maps.LatLng(45.99106441715033, -66.66126654088089),
                new google.maps.LatLng(45.991012238570654, -66.66144088446686),
                new google.maps.LatLng(45.99104019138734, -66.66212613432612),
                new google.maps.LatLng(45.99111845919887, -66.66271622030939),
                new google.maps.LatLng(45.99128244854034, -66.66332776396479),
                new google.maps.LatLng(45.99167564827757, -66.66421347303935),
                new google.maps.LatLng(45.99169987376245, -66.66447901173183),
                new google.maps.LatLng(45.99147438999329, -66.66574501438686),
                new google.maps.LatLng(45.99147252648725, -66.6658067051942),
                new google.maps.LatLng(45.989997885236946, -66.66534982207264),
                new google.maps.LatLng(45.98918203327655, -66.66506698987962),
                new google.maps.LatLng(45.98852977531264, -66.66486954308454),
                new google.maps.LatLng(45.9879098909499, -66.66466321437929),
                new google.maps.LatLng(45.98729189770562, -66.66452910392854),
                new google.maps.LatLng(45.98627060981635, -66.66438962905977),
                new google.maps.LatLng(45.98568913822076, -66.66434671371553),
                new google.maps.LatLng(45.985778595786854, -66.66332747428987),
                new google.maps.LatLng(45.9857860505775, -66.66300560920808),
                new google.maps.LatLng(45.98573386702189, -66.66247989624117),
                new google.maps.LatLng(45.98563322716852, -66.66198636978243),
                new google.maps.LatLng(45.98497153719877, -66.66027869372215),
                new google.maps.LatLng(45.984524241401594, -66.65914680151786),
                new google.maps.LatLng(45.98437425962093, -66.65889904114118),
                new google.maps.LatLng(45.9840340034804, -66.65848161940659),
                new google.maps.LatLng(45.98342376855746, -66.65764032421697),
                new google.maps.LatLng(45.98334548986538, -66.65744184074987),
                new google.maps.LatLng(45.98430712810727, -66.65689650398889),
                new google.maps.LatLng(45.985033984793, -66.65647271496454),
                new google.maps.LatLng(45.985943474075825, -66.6557270608584),
                new google.maps.LatLng(45.98687158502948, -66.65489021164575),
                new google.maps.LatLng(45.98768413525759, -66.65418747288385),
                new google.maps.LatLng(45.98857867217368, -66.65337744576135),
                new google.maps.LatLng(45.98901475367875, -66.65300302601622),
                new google.maps.LatLng(45.9888763201469, -66.65256709070275),
                new google.maps.LatLng(45.98873095966337, -66.65199041576454),
                new google.maps.LatLng(45.988656415677596, -66.65158770434044),
                new google.maps.LatLng(45.988642312441776, -66.6512018295906),
                new google.maps.LatLng(45.98866094845236, -66.65092901909873),
                new google.maps.LatLng(45.988713129248694, -66.65062861168906),
                new google.maps.LatLng(45.98880250225496, -66.65036050545808),
                new google.maps.LatLng(45.98900190666572, -66.64999036061403),
                new google.maps.LatLng(45.989376997114746, -66.64933157721487),
                new google.maps.LatLng(45.989559627323985, -66.64896947899786),
                new google.maps.LatLng(45.98971057632779, -66.64858592310873),
                new google.maps.LatLng(45.989816799454076, -66.64814335862127),
                new google.maps.LatLng(45.99001060954511, -66.64669956038858),
                new google.maps.LatLng(45.98941476898053, -66.64654000200937),
                new google.maps.LatLng(45.989237729037605, -66.64649440445612),
                new google.maps.LatLng(45.988973099856544, -66.64647562899302),
                new google.maps.LatLng(45.98876437735649, -66.64647831120203),
                new google.maps.LatLng(45.98853653718464, -66.64654000200937),
                new google.maps.LatLng(45.988294268012886, -66.6466338793249),
                new google.maps.LatLng(45.98805013415947, -66.64678944744776),
                new google.maps.LatLng(45.98771499763571, -66.64706035055826),
                new google.maps.LatLng(45.98737022453197, -66.64737685122202),
                new google.maps.LatLng(45.987092540849325, -66.6476423899145),
                new google.maps.LatLng(45.98683619338861, -66.64791061081598),
                new google.maps.LatLng(45.98646925535736, -66.64824892888572),
                new google.maps.LatLng(45.9860033347627, -66.64866601238754),
                new google.maps.LatLng(45.98561568583927, -66.64901469955947),
                new google.maps.LatLng(45.985143121322835, -66.64944117079284),
                new google.maps.LatLng(45.98490829220782, -66.64965574751403),
                new google.maps.LatLng(45.98459518517161, -66.64990787516143),
                new google.maps.LatLng(45.98429325885236, -66.65017609606292),
                new google.maps.LatLng(45.98407706368613, -66.65035549100696),
                new google.maps.LatLng(45.98394912485443, -66.65046814378559),
                new google.maps.LatLng(45.98313033151917, -66.65099608316945),
                new google.maps.LatLng(45.98270538646502, -66.65124821081685),
                new google.maps.LatLng(45.981892763156274, -66.6516183556609),
                new google.maps.LatLng(45.98120314227691, -66.6518704833083),
                new google.maps.LatLng(45.980923563797695, -66.6510057198555),
                new google.maps.LatLng(45.980789533758426, -66.650582172783),
                new google.maps.LatLng(45.98053849348787, -66.64973635472978),
                new google.maps.LatLng(45.98023281727578, -66.64876003064836),
                new google.maps.LatLng(45.979718382767516, -66.64726335801805),
                new google.maps.LatLng(45.97924867752046, -66.64582455104687),
                new google.maps.LatLng(45.97886470916017, -66.64459609931805),
                new google.maps.LatLng(45.97848318232987, -66.6433426727312),
                new google.maps.LatLng(45.978163195383864, -66.6423353629391),
                new google.maps.LatLng(45.97770093282349, -66.64088160565302),
                new google.maps.LatLng(45.9771230991962, -66.63901049127622),
                new google.maps.LatLng(45.97676776065983, -66.6378925203565),
                new google.maps.LatLng(45.97650751690217, -66.6381070970777),
                new google.maps.LatLng(45.97546738961536, -66.63893858187231),
                new google.maps.LatLng(45.97481124192282, -66.63942674391302),
                new google.maps.LatLng(45.97428930070656, -66.63977006666693),
                new google.maps.LatLng(45.97361822620029, -66.64016703360113),
                new google.maps.LatLng(45.97274954545795, -66.64065867879981),
                new google.maps.LatLng(45.97193286062184, -66.64103955247992),
                new google.maps.LatLng(45.97075469652297, -66.64162427404517),
                new google.maps.LatLng(45.9699493547438, -66.64201051214332),
                new google.maps.LatLng(45.96893147546464, -66.642493309766),
                new google.maps.LatLng(45.96703734994789, -66.64342671850318),
                new google.maps.LatLng(45.96572111828828, -66.64413482168311),
                new google.maps.LatLng(45.965363157526895, -66.64434403398627),
                new google.maps.LatLng(45.96466960196939, -66.64484292486304),
                new google.maps.LatLng(45.963979766592075, -66.64539545992011),
                new google.maps.LatLng(45.96208017539403, -66.64091913033633),
                new google.maps.LatLng(45.96111341049236, -66.64173941813647),
                new google.maps.LatLng(45.96132176983, -66.64225403450587),
                new google.maps.LatLng(45.961709588840215, -66.64316598557093),
                new google.maps.LatLng(45.96219435878547, -66.64429251335719),
                new google.maps.LatLng(45.96258962960151, -66.64517227791407),
                new google.maps.LatLng(45.96306919885132, -66.64628807686427),
                new google.maps.LatLng(45.963643450229974, -66.64767209671595),
                new google.maps.LatLng(45.96395667574585, -66.64843920849421),
                new google.maps.LatLng(45.96303936744824, -66.64927605770686),
                new google.maps.LatLng(45.96378514770651, -66.6509765782223),
                new google.maps.LatLng(45.964374307012235, -66.65242497109034),
                new google.maps.LatLng(45.964635324954955, -66.65473167084315),
                new google.maps.LatLng(45.96502684956312, -66.65832046650507),
                new google.maps.LatLng(45.96435939166412, -66.66180624779679),
                new google.maps.LatLng(45.963540530936555, -66.66597172541634),
                new google.maps.LatLng(45.963253328117375, -66.6672040056992),
                new google.maps.LatLng(45.96253364342909, -66.66895280597691),
                new google.maps.LatLng(45.96113698351105, -66.66855583904271),
                new google.maps.LatLng(45.96074543141206, -66.66865239856725),
                new google.maps.LatLng(45.95989146533112, -66.66904936550145),
                new google.maps.LatLng(45.959731496211035, -66.66851347616858),
                new google.maps.LatLng(45.95937349674779, -66.66776782206244),
                new google.maps.LatLng(45.95922147203845, -66.66739893101163),
                new google.maps.LatLng(45.95911332561564, -66.66690004013486),
                new google.maps.LatLng(45.95901263737706, -66.66590225838132),
                new google.maps.LatLng(45.95904992933861, -66.66479545518803),
                new google.maps.LatLng(45.958893302931436, -66.6632773248856),
                new google.maps.LatLng(45.95856985957389, -66.66237164671139),
                new google.maps.LatLng(45.95819097607713, -66.66133047146343),
                new google.maps.LatLng(45.95787004021011, -66.66015345534998),
                new google.maps.LatLng(45.957493436101295, -66.6588714369397),
                new google.maps.LatLng(45.95743749657826, -66.65817942701386),
                new google.maps.LatLng(45.95745614309222, -66.6572674759488),
                new google.maps.LatLng(45.956590938235436, -66.65792193494843),
                new google.maps.LatLng(45.95457230681692, -66.6596392147971),
                new google.maps.LatLng(45.95280941310447, -66.6611127237685),
                new google.maps.LatLng(45.95142383621334, -66.66229156012662),
                new google.maps.LatLng(45.950327291177246, -66.66318205351956),
                new google.maps.LatLng(45.94888011690143, -66.66433003897794),
                new google.maps.LatLng(45.94688086554284, -66.66605738158353),
                new google.maps.LatLng(45.94591505189744, -66.6668459510339),
                new google.maps.LatLng(45.94607171498641, -66.66819778437741),
                new google.maps.LatLng(45.94628805852427, -66.66957107539304),
                new google.maps.LatLng(45.94625733673477, -66.66993302645113),
                new google.maps.LatLng(45.946149165011434, -66.67026025595095),
                new google.maps.LatLng(45.94536211611759, -66.67192858995821),
                new google.maps.LatLng(45.94532108482615, -66.67218071760561),
                new google.maps.LatLng(45.94536211611759, -66.67237383665469),
                new google.maps.LatLng(45.94579486143701, -66.67336358461648),
                new google.maps.LatLng(45.94591474785753, -66.67351786677182),
                new google.maps.LatLng(45.946101251485715, -66.67353932444394),
                new google.maps.LatLng(45.9466048081476, -66.67343203608334),
                new google.maps.LatLng(45.94679876949333, -66.67505209032834),
                new google.maps.LatLng(45.94683233965733, -66.67538609228728),
                new google.maps.LatLng(45.94679876949333, -66.67558994017242),
                new google.maps.LatLng(45.94556800456814, -66.67670573912261),
                new google.maps.LatLng(45.94445491953774, -66.67415613525156),
                new google.maps.LatLng(45.943431202067885, -66.67178049834752),
                new google.maps.LatLng(45.94233552121242, -66.66928703707441),
                new google.maps.LatLng(45.94168937003639, -66.66780109328016),
                new google.maps.LatLng(45.94083425671639, -66.66592984901467),
                new google.maps.LatLng(45.94039190152925, -66.66447273095469),
                new google.maps.LatLng(45.940100925631235, -66.66344276269297),
                new google.maps.LatLng(45.939470472613614, -66.66175833543161),
                new google.maps.LatLng(45.93853410608549, -66.65967157681803),
                new google.maps.LatLng(45.93808270462033, -66.65865233739237),
                new google.maps.LatLng(45.93663147997148, -66.65987006028513),
                new google.maps.LatLng(45.934986215346875, -66.66123798688272),
                new google.maps.LatLng(45.93417662277119, -66.66192999680857)
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
                data: "route_id=69", //the data
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