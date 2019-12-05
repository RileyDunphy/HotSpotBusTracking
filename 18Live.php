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
                title: '18 Silverwood',
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
            var shapes =[];
            var path = [
                new google.maps.LatLng(45.96576635056045, -66.76961393351269),
                new google.maps.LatLng(45.96556499808119, -66.76849813456249),
                new google.maps.LatLng(45.965417663526644, -66.76667472557165),
                new google.maps.LatLng(45.96532954553217, -66.76404253865383),
                new google.maps.LatLng(45.964940994126856, -66.76406667853496),
                new google.maps.LatLng(45.96469489288621, -66.76403985644481),
                new google.maps.LatLng(45.96446929912183, -66.76394329692027),
                new google.maps.LatLng(45.96418777173066, -66.7638225975146),
                new google.maps.LatLng(45.963859134065764, -66.76379837433853),
                new google.maps.LatLng(45.96331658064756, -66.76383860747376),
                new google.maps.LatLng(45.962992164725094, -66.76386006514588),
                new google.maps.LatLng(45.96273147128579, -66.76375277678528),
                new google.maps.LatLng(45.962498411601, -66.76360793749848),
                new google.maps.LatLng(45.962323612862036, -66.76358916203537),
                new google.maps.LatLng(45.962045803560436, -66.76369108597794),
                new google.maps.LatLng(45.96183884404774, -66.76378764550248),
                new google.maps.LatLng(45.96154454383683, -66.76380642096558),
                new google.maps.LatLng(45.960671944647025, -66.76376887003937),
                new google.maps.LatLng(45.960589904700186, -66.76454402844467),
                new google.maps.LatLng(45.960539561945396, -66.76544540341678),
                new google.maps.LatLng(45.96051718737304, -66.7659362476665),
                new google.maps.LatLng(45.96039412706351, -66.76662825759234),
                new google.maps.LatLng(45.96130775011626, -66.76721297915759),
                new google.maps.LatLng(45.96183788420626, -66.7675563019115),
                new google.maps.LatLng(45.962186545287764, -66.7677011411983),
                new google.maps.LatLng(45.962934980037076, -66.76782184060397),
                new google.maps.LatLng(45.96311445473644, -66.76785939153018),
                new google.maps.LatLng(45.96321886443544, -66.76795058663669),
                new google.maps.LatLng(45.96328853653318, -66.76810629662236),
                new google.maps.LatLng(45.96353837291432, -66.76921404894551),
                new google.maps.LatLng(45.963599899611395, -66.76934815939626),
                new google.maps.LatLng(45.96374159719937, -66.76940716799459),
                new google.maps.LatLng(45.96468446285636, -66.76945544775685),
                new google.maps.LatLng(45.965756372745794, -66.76962650097948),
                new google.maps.LatLng(45.96576642210932, -66.76961403340101),
                new google.maps.LatLng(45.965565008396496, -66.76849751081522),
                new google.maps.LatLng(45.96541754459957, -66.76667444654214),
                new google.maps.LatLng(45.96532947339744, -66.76404282373818),
                new google.maps.LatLng(45.96531442567657, -66.76373831174709),
                new google.maps.LatLng(45.96530030621727, -66.76336608132493),
                new google.maps.LatLng(45.96528929988072, -66.76305284324337),
                new google.maps.LatLng(45.965224334182395, -66.76150028297485),
                new google.maps.LatLng(45.9651768175522, -66.76049946603138),
                new google.maps.LatLng(45.96507236212388, -66.759093449298),
                new google.maps.LatLng(45.96496083364187, -66.75741335434469),
                new google.maps.LatLng(45.96488090075978, -66.75602483530662),
                new google.maps.LatLng(45.96470439288549, -66.7531251427435),
                new google.maps.LatLng(45.96459681099829, -66.75122173544366),
                new google.maps.LatLng(45.9645029726218, -66.74969133516703),
                new google.maps.LatLng(45.96453280323679, -66.74844453818264),
                new google.maps.LatLng(45.96473229506159, -66.7470870509772),
                new google.maps.LatLng(45.96516623164762, -66.74529600916219),
                new google.maps.LatLng(45.96561114075378, -66.74323093056046),
                new google.maps.LatLng(45.96622214994548, -66.74057471240076),
                new google.maps.LatLng(45.96677528750198, -66.73822430128433),
                new google.maps.LatLng(45.96692070563323, -66.73720909141929),
                new google.maps.LatLng(45.967095952617505, -66.73460782197765),
                new google.maps.LatLng(45.96727729397973, -66.73233408287496),
                new google.maps.LatLng(45.96746921653163, -66.73033825140783),
                new google.maps.LatLng(45.96758023928734, -66.7289664468675),
                new google.maps.LatLng(45.967595153768315, -66.72731420611433),
                new google.maps.LatLng(45.96753549510388, -66.72617158507398),
                new google.maps.LatLng(45.96740499311871, -66.72463736151747),
                new google.maps.LatLng(45.96730245562897, -66.72283223485044),
                new google.maps.LatLng(45.96730059130921, -66.72062647841528),
                new google.maps.LatLng(45.96730069329943, -66.71940847500247),
                new google.maps.LatLng(45.967211205877696, -66.71825780733508),
                new google.maps.LatLng(45.96700346195282, -66.71656265123767),
                new google.maps.LatLng(45.96666601723412, -66.71481921537799),
                new google.maps.LatLng(45.966504417555335, -66.71416217891004),
                new google.maps.LatLng(45.96647458800204, -66.71272382105803),
                new google.maps.LatLng(45.96657339833585, -66.71157686016181),
                new google.maps.LatLng(45.96669789108057, -66.71044419929194),
                new google.maps.LatLng(45.96666519800287, -66.70898153707651),
                new google.maps.LatLng(45.966557418099626, -66.70703961774973),
                new google.maps.LatLng(45.9664521657538, -66.70534031858944),
                new google.maps.LatLng(45.966379456120904, -66.70500772467159),
                new google.maps.LatLng(45.96601404216174, -66.70417087545894),
                new google.maps.LatLng(45.96554608505127, -66.70330988636516),
                new google.maps.LatLng(45.965339138614304, -66.70276271572612),
                new google.maps.LatLng(45.96525814154646, -66.70235233774685),
                new google.maps.LatLng(45.96536068282035, -66.70077347981106),
                new google.maps.LatLng(45.96553599226433, -66.6992385873998),
                new google.maps.LatLng(45.96575412419806, -66.6973637232984),
                new google.maps.LatLng(45.96582435373528, -66.69646850209057),
                new google.maps.LatLng(45.96586156182052, -66.6941408158782),
                new google.maps.LatLng(45.965847883288724, -66.69348720421618),
                new google.maps.LatLng(45.96562633221342, -66.69161427655217),
                new google.maps.LatLng(45.965562943388676, -66.68960408685552),
                new google.maps.LatLng(45.96551002916522, -66.68724605671258),
                new google.maps.LatLng(45.965438667257665, -66.6857692656393),
                new google.maps.LatLng(45.96523667944707, -66.68401424335013),
                new google.maps.LatLng(45.96507724228065, -66.68322161643601),
                new google.maps.LatLng(45.964558938153964, -66.68133402604906),
                new google.maps.LatLng(45.96404808689552, -66.67923653859941),
                new google.maps.LatLng(45.96356167087755, -66.67720457494033),
                new google.maps.LatLng(45.963432352676776, -66.67680653475634),
                new google.maps.LatLng(45.96328878984312, -66.67650612734667),
                new google.maps.LatLng(45.96243078038418, -66.67504659868331),
                new google.maps.LatLng(45.962026185949185, -66.67430899120421),
                new google.maps.LatLng(45.96181839959497, -66.673760352319),
                new google.maps.LatLng(45.96175126384998, -66.67311302363441),
                new google.maps.LatLng(45.961729857261275, -66.67204628789602),
                new google.maps.LatLng(45.961774605417546, -66.67129440630777),
                new google.maps.LatLng(45.96192376567743, -66.67039318407876),
                new google.maps.LatLng(45.96240981873604, -66.66922272604444),
                new google.maps.LatLng(45.96290095669895, -66.66812214859988),
                new google.maps.LatLng(45.9631470659089, -66.66750524052645),
                new google.maps.LatLng(45.9633614783446, -66.66675348930079),
                new google.maps.LatLng(45.96375993816523, -66.66481899789818),
                new google.maps.LatLng(45.96399040892355, -66.66364187600783),
                new google.maps.LatLng(45.96446610836805, -66.66126534714567),
                new google.maps.LatLng(45.96493034580252, -66.65898010506498),
                new google.maps.LatLng(45.965027294494526, -66.6583583195067),
                new google.maps.LatLng(45.96495055141912, -66.65724507707671),
                new google.maps.LatLng(45.964652246795886, -66.65487070980959),
                new google.maps.LatLng(45.96440956313135, -66.6525520105987),
                new google.maps.LatLng(45.963945773416675, -66.6513637920051),
                new google.maps.LatLng(45.96305235390233, -66.64925745821904),
                new google.maps.LatLng(45.96395650630887, -66.6484563810443),
                new google.maps.LatLng(45.963801758209414, -66.64799235888472),
                new google.maps.LatLng(45.96329665061994, -66.64683306324463),
                new google.maps.LatLng(45.962844268954285, -66.64578726563536),
                new google.maps.LatLng(45.96241357476546, -66.64477339062773),
                new google.maps.LatLng(45.96206677960863, -66.6439740923413),
                new google.maps.LatLng(45.961445898986355, -66.6425516123428),
                new google.maps.LatLng(45.96084179224313, -66.64108444401165),
                new google.maps.LatLng(45.96025794996172, -66.63970083677077),
                new google.maps.LatLng(45.95921858720933, -66.637279592705),
                new google.maps.LatLng(45.958654939472765, -66.63590898389839),
                new google.maps.LatLng(45.95830625616692, -66.63502385492347),
                new google.maps.LatLng(45.95786247424066, -66.6342236366674),
                new google.maps.LatLng(45.95860731987076, -66.63470839415606),
                new google.maps.LatLng(45.95914619021793, -66.63514022980746),
                new google.maps.LatLng(45.95959338377004, -66.63566594277438),
                new google.maps.LatLng(45.96003155814049, -66.6362640753847),
                new google.maps.LatLng(45.96038209514192, -66.6369292632204),
                new google.maps.LatLng(45.96106638172787, -66.63850371991214),
                new google.maps.LatLng(45.96369966831483, -66.6447463433409),
                new google.maps.LatLng(45.964636419550175, -66.6469233670839),
                new google.maps.LatLng(45.96479424603195, -66.64778447109586),
                new google.maps.LatLng(45.96395648936379, -66.64845636274072),
                new google.maps.LatLng(45.964209242887016, -66.65095056402066),
                new google.maps.LatLng(45.96440960007868, -66.65255201503771)
            ];
            var polyline = new google.maps.Polyline({
                path: path,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            polyline.setMap(map);
            shapes.push(polyline);
            var path = [
                new google.maps.LatLng(45.95786299778701, -66.63422379149506),
                new google.maps.LatLng(45.957502816834165, -66.63396369506899),
                new google.maps.LatLng(45.956751904490034, -66.63349363040157),
                new google.maps.LatLng(45.95601902998083, -66.63313245963565),
                new google.maps.LatLng(45.95511042996069, -66.63280523013583),
                new google.maps.LatLng(45.954661035595116, -66.6326673301391),
                new google.maps.LatLng(45.95393626706185, -66.63257781167363),
                new google.maps.LatLng(45.95309338482692, -66.63255098958348),
                new google.maps.LatLng(45.95242018870133, -66.63261536259984),
                new google.maps.LatLng(45.95163131494059, -66.63273874421452),
                new google.maps.LatLng(45.95077161376844, -66.63291308780049),
                new google.maps.LatLng(45.94993987282815, -66.63320008416508),
                new google.maps.LatLng(45.94914876349862, -66.63348439832066),
                new google.maps.LatLng(45.94785148042349, -66.63419788862711),
                new google.maps.LatLng(45.94690965881629, -66.634762472781),
                new google.maps.LatLng(45.94642272915943, -66.63496900287515),
                new google.maps.LatLng(45.945911710686, -66.63503337589151),
                new google.maps.LatLng(45.94558482020516, -66.634942180785),
                new google.maps.LatLng(45.945279319887184, -66.63472760406381),
                new google.maps.LatLng(45.94460912889162, -66.63403439800328),
                new google.maps.LatLng(45.94410671426123, -66.63349250200116),
                new google.maps.LatLng(45.943703851143944, -66.63322159889066),
                new google.maps.LatLng(45.94308035867289, -66.6329775178703),
                new google.maps.LatLng(45.942446379873594, -66.63265199470726),
                new google.maps.LatLng(45.941877504342834, -66.63227380323616),
                new google.maps.LatLng(45.941348335627275, -66.6318807081471),
                new google.maps.LatLng(45.939849915663785, -66.63073571689898),
                new google.maps.LatLng(45.93945565950517, -66.63037781786613),
                new google.maps.LatLng(45.93850889344745, -66.62922950861355),
                new google.maps.LatLng(45.937787215404356, -66.62855706975802),
                new google.maps.LatLng(45.93714823944311, -66.62792580065735),
                new google.maps.LatLng(45.936591558483364, -66.62733223642618),
                new google.maps.LatLng(45.93606928942696, -66.6268382384693),
                new google.maps.LatLng(45.935361848764295, -66.62617378510572),
                new google.maps.LatLng(45.93462249206908, -66.62549093239329),
                new google.maps.LatLng(45.9340857847069, -66.62509302335036),
                new google.maps.LatLng(45.93333298339823, -66.62463297453388),
                new google.maps.LatLng(45.932381989420655, -66.62407142657713),
                new google.maps.LatLng(45.931829033863615, -66.6237072948868),
                new google.maps.LatLng(45.931279925294206, -66.62317568948129),
                new google.maps.LatLng(45.93069428981091, -66.6223302001747),
                new google.maps.LatLng(45.93009525873251, -66.62131729983741),
                new google.maps.LatLng(45.929375777090264, -66.61977133280072),
                new google.maps.LatLng(45.92881999045651, -66.61833390344094),
                new google.maps.LatLng(45.92821331957328, -66.61666136275892),
                new google.maps.LatLng(45.927623190061716, -66.61506004020617),
                new google.maps.LatLng(45.92697623028066, -66.61331620887853),
                new google.maps.LatLng(45.92651784817227, -66.61210736099383),
                new google.maps.LatLng(45.92626038209231, -66.61093791786334),
                new google.maps.LatLng(45.926243303169116, -66.60943062250084),
                new google.maps.LatLng(45.92628994567789, -66.60820423111744),
                new google.maps.LatLng(45.92626382587779, -66.60762487397022),
                new google.maps.LatLng(45.92618173499746, -66.6071340297205),
                new google.maps.LatLng(45.92581023897161, -66.6059010805937),
                new google.maps.LatLng(45.92552851518543, -66.60497035406553),
                new google.maps.LatLng(45.92528597038235, -66.60440440796339),
                new google.maps.LatLng(45.925037444492226, -66.60397256363831),
                new google.maps.LatLng(45.924625971469375, -66.60340789837772),
                new google.maps.LatLng(45.92412985388078, -66.60280668768172),
                new google.maps.LatLng(45.92367845229371, -66.60229303347415),
                new google.maps.LatLng(45.923337142548775, -66.60189048187709),
                new google.maps.LatLng(45.922806765834046, -66.60126113361963),
                new google.maps.LatLng(45.92219353315044, -66.60038644554896),
                new google.maps.LatLng(45.92162695506585, -66.59948893028758),
                new google.maps.LatLng(45.920779109841135, -66.59809849151009),
                new google.maps.LatLng(45.920051103334075, -66.59687163707218),
                new google.maps.LatLng(45.919399084673344, -66.59578496177897),
                new google.maps.LatLng(45.91860196581921, -66.59442938488621),
                new google.maps.LatLng(45.91801565449272, -66.59354122043828),
                new google.maps.LatLng(45.917183928706294, -66.59254433649124),
                new google.maps.LatLng(45.91631880074845, -66.59156309609222),
                new google.maps.LatLng(45.91543090587438, -66.59048650645013),
                new google.maps.LatLng(45.91447574580906, -66.58941177253877),
                new google.maps.LatLng(45.9136663871229, -66.58851093354565),
                new google.maps.LatLng(45.913559988885254, -66.58841251708935),
                new google.maps.LatLng(45.91284224350966, -66.58786421112143),
                new google.maps.LatLng(45.91158677174422, -66.58695496951111),
                new google.maps.LatLng(45.91044832189319, -66.5861349413862),
                new google.maps.LatLng(45.909393493924604, -66.58539517971326),
                new google.maps.LatLng(45.90896051811514, -66.58504649254132),
                new google.maps.LatLng(45.90857979521617, -66.58565267177869),
                new google.maps.LatLng(45.908094556363814, -66.58631785961438),
                new google.maps.LatLng(45.907443119773795, -66.58703132721234),
                new google.maps.LatLng(45.906793631972306, -66.5876348242407),
                new google.maps.LatLng(45.9062374553437, -66.58812566849042),
                new google.maps.LatLng(45.905905239799836, -66.58840193601895),
                new google.maps.LatLng(45.90261922473272, -66.59130098539998),
                new google.maps.LatLng(45.902619634397205, -66.59129977226257),
                new google.maps.LatLng(45.90294964611714, -66.59207197606747),
                new google.maps.LatLng(45.904393975992015, -66.59081727081616),
                new google.maps.LatLng(45.90448543127354, -66.59076362663586),
                new google.maps.LatLng(45.90461234855751, -66.59074216896374),
                new google.maps.LatLng(45.90470566990471, -66.5908065419801),
                new google.maps.LatLng(45.90480841127305, -66.5910289060983),
                new google.maps.LatLng(45.90512996538834, -66.59202757257515),
                new google.maps.LatLng(45.90530354135025, -66.59250768798881),
                new google.maps.LatLng(45.90489527092635, -66.59281177823993),
                new google.maps.LatLng(45.9047086287125, -66.59297807519886),
                new google.maps.LatLng(45.90447059050505, -66.59333480899784),
                new google.maps.LatLng(45.90414791680874, -66.59377855636853),
                new google.maps.LatLng(45.90396873788335, -66.59401995517987),
                new google.maps.LatLng(45.90391887780736, -66.59416211225766),
                new google.maps.LatLng(45.90392261071088, -66.59431768038053),
                new google.maps.LatLng(45.90439108811147, -66.59544957258481),
                new google.maps.LatLng(45.90456279995349, -66.59584117510099),
                new google.maps.LatLng(45.905290702951085, -66.59518403389234),
                new google.maps.LatLng(45.905781869716776, -66.59478230512997),
                new google.maps.LatLng(45.90592558149861, -66.59465087688824),
                new google.maps.LatLng(45.90610102135132, -66.59440679586788),
                new google.maps.LatLng(45.90623415391466, -66.59408203077868),
                new google.maps.LatLng(45.90636106720068, -66.59343561840609),
                new google.maps.LatLng(45.906499111849335, -66.59229297532801),
                new google.maps.LatLng(45.90670439199216, -66.59105918740096),
                new google.maps.LatLng(45.907060963998035, -66.59111790353819),
                new google.maps.LatLng(45.907334650500644, -66.59109242255255),
                new google.maps.LatLng(45.907804415836466, -66.59092804004376),
                new google.maps.LatLng(45.90822446443645, -66.59078051854794),
                new google.maps.LatLng(45.90860239033112, -66.59064506699269),
                new google.maps.LatLng(45.90891847144532, -66.5904841344518),
                new google.maps.LatLng(45.909131683595035, -66.59032768218293),
                new google.maps.LatLng(45.90948622698532, -66.58994955973282),
                new google.maps.LatLng(45.90990175232709, -66.58944711272),
                new google.maps.LatLng(45.910140631899104, -66.58920303169964),
                new google.maps.LatLng(45.91052787589615, -66.58887848440884),
                new google.maps.LatLng(45.9109011205651, -66.58856734816311),
                new google.maps.LatLng(45.91107747779799, -66.58848822299717),
                new google.maps.LatLng(45.91125756688084, -66.58850565735577),
                new google.maps.LatLng(45.911402197586476, -66.58855796043156),
                new google.maps.LatLng(45.911819917325666, -66.5888543445277),
                new google.maps.LatLng(45.91226686711513, -66.58917620960949),
                new google.maps.LatLng(45.91243259227579, -66.58926861509133),
                new google.maps.LatLng(45.912596383843464, -66.58930482491303),
                new google.maps.LatLng(45.912728531571666, -66.58926404680108),
                new google.maps.LatLng(45.912992395429534, -66.58905483449792),
                new google.maps.LatLng(45.913366307180034, -66.58873210201847),
                new google.maps.LatLng(45.91352959368043, -66.58848265658008),
                new google.maps.LatLng(45.91356671729846, -66.58841865338985)
            ];
            var polyline = new google.maps.Polyline({
                path: path,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            polyline.setMap(map);
            shapes.push(polyline);
            var path = [
                new google.maps.LatLng(45.9089606648619, -66.58504670367802),
                new google.maps.LatLng(45.90877405137561, -66.58479752173827),
                new google.maps.LatLng(45.908548092468166, -66.58446632372488),
                new google.maps.LatLng(45.90837960958712, -66.58419188141522),
                new google.maps.LatLng(45.908252519185886, -66.5840019206185),
                new google.maps.LatLng(45.90802766890602, -66.58359507746758),
                new google.maps.LatLng(45.907567709381034, -66.58280625853575),
                new google.maps.LatLng(45.90693821771428, -66.5818173241745),
                new google.maps.LatLng(45.906524422593854, -66.58114898648932),
                new google.maps.LatLng(45.906188925512396, -66.58060729963563),
                new google.maps.LatLng(45.90581083382299, -66.57999709708474),
                new google.maps.LatLng(45.90554411255068, -66.57959481597874),
                new google.maps.LatLng(45.90526241625627, -66.57918895440423),
                new google.maps.LatLng(45.90495072546948, -66.57885682942009),
                new google.maps.LatLng(45.90434773098705, -66.5782343579312),
                new google.maps.LatLng(45.904011771236775, -66.57788567075926)
            ];
            var polyline = new google.maps.Polyline({
                path: path,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            polyline.setMap(map);
            shapes.push(polyline);
            shapes.setMap(map);
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
                data: "route_id=76", //the data
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