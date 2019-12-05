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
                title: '15S Hanwell',
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
                new google.maps.LatLng(45.935999426013446, -66.60817776344061),
                new google.maps.LatLng(45.93444741397415, -66.60619292876959),
                new google.maps.LatLng(45.93272373431305, -66.60400424621344),
                new google.maps.LatLng(45.93220885856863, -66.60333905837774),
                new google.maps.LatLng(45.93263792202093, -66.60288308284521),
                new google.maps.LatLng(45.93303864483665, -66.60224578142407),
                new google.maps.LatLng(45.93393033355939, -66.60336158037427),
                new google.maps.LatLng(45.934351921980515, -66.60389802217725),
                new google.maps.LatLng(45.9351652427993, -66.60492882951019),
                new google.maps.LatLng(45.93562412955722, -66.6055081866574),
                new google.maps.LatLng(45.9357539583217, -66.60570130570648),
                new google.maps.LatLng(45.93581738124756, -66.60584614499328),
                new google.maps.LatLng(45.935914380876255, -66.6062645695996),
                new google.maps.LatLng(45.93579872745338, -66.60632357819793),
                new google.maps.LatLng(45.93563830456421, -66.60647378190276),
                new google.maps.LatLng(45.93552638134348, -66.60660789235351),
                new google.maps.LatLng(45.935208260701394, -66.60716601041872),
                new google.maps.LatLng(45.93599933207591, -66.60817790776491),
                new google.maps.LatLng(45.936881180350426, -66.6093401490993),
                new google.maps.LatLng(45.93729155436263, -66.6098819553203),
                new google.maps.LatLng(45.937706786189764, -66.61034329527087),
                new google.maps.LatLng(45.938874461428625, -66.61128206842608),
                new google.maps.LatLng(45.9395049212231, -66.61174340837664),
                new google.maps.LatLng(45.940724784613074, -66.61264999502367),
                new google.maps.LatLng(45.94159517604379, -66.61327763193316),
                new google.maps.LatLng(45.942124885979936, -66.61373897188372),
                new google.maps.LatLng(45.942607962107964, -66.61421640508837),
                new google.maps.LatLng(45.94287654315382, -66.61458654993243),
                new google.maps.LatLng(45.94298774845917, -66.61489953282353),
                new google.maps.LatLng(45.94300639983496, -66.6153635549831),
                new google.maps.LatLng(45.94295417596693, -66.61568005564686),
                new google.maps.LatLng(45.94288330063877, -66.6162910315075),
                new google.maps.LatLng(45.94293179429415, -66.61678187575723),
                new google.maps.LatLng(45.94309406121712, -66.61708176993136),
                new google.maps.LatLng(45.94347454731192, -66.61727708749254),
                new google.maps.LatLng(45.94387554698756, -66.61721807889421),
                new google.maps.LatLng(45.944295194704885, -66.61692303590257),
                new google.maps.LatLng(45.94457868825385, -66.61680770091493),
                new google.maps.LatLng(45.944826423112104, -66.61686670951326),
                new google.maps.LatLng(45.94502911635696, -66.61700194546785),
                new google.maps.LatLng(45.94539653377479, -66.61745523879136),
                new google.maps.LatLng(45.94567966973913, -66.61791657874193),
                new google.maps.LatLng(45.945928900714634, -66.61828404137697),
                new google.maps.LatLng(45.94621914750856, -66.61777232741474),
                new google.maps.LatLng(45.94636834964202, -66.61733820781421),
                new google.maps.LatLng(45.94639445997409, -66.61709144458484),
                new google.maps.LatLng(45.94624525791095, -66.6161473070116),
                new google.maps.LatLng(45.94605129462847, -66.61521389827442),
                new google.maps.LatLng(45.94572304752739, -66.61368503913593),
                new google.maps.LatLng(45.945659635931605, -66.61306555913268),
                new google.maps.LatLng(45.945678286408494, -66.61252375291167),
                new google.maps.LatLng(45.94596177288459, -66.61158497975646),
                new google.maps.LatLng(45.94636834964205, -66.61063011334716),
                new google.maps.LatLng(45.94688682393334, -66.60935338185607),
                new google.maps.LatLng(45.94732485761342, -66.60828808500389),
                new google.maps.LatLng(45.9484191770872, -66.60564238287975),
                new google.maps.LatLng(45.94895255169629, -66.60431200720836),
                new google.maps.LatLng(45.949556780221684, -66.60286899003131),
                new google.maps.LatLng(45.94989992386595, -66.60215015801532),
                new google.maps.LatLng(45.950301288867294, -66.60145346269047),
                new google.maps.LatLng(45.95073551320568, -66.60089443336165),
                new google.maps.LatLng(45.95101941835243, -66.60056317872102),
                new google.maps.LatLng(45.95206746407392, -66.5996244055658),
                new google.maps.LatLng(45.95314159713102, -66.59855688637788),
                new google.maps.LatLng(45.9531900818127, -66.60046125477845),
                new google.maps.LatLng(45.95324229603783, -66.60229588574464),
                new google.maps.LatLng(45.95330942854068, -66.60451139039094),
                new google.maps.LatLng(45.953361642653334, -66.60639966553742),
                new google.maps.LatLng(45.953425045438316, -66.60823429650361),
                new google.maps.LatLng(45.95351886950132, -66.61073947972352),
                new google.maps.LatLng(45.95358227210643, -66.61246682232911),
                new google.maps.LatLng(45.95363448596205, -66.61389912194306),
                new google.maps.LatLng(45.953690429324226, -66.6158142191797),
                new google.maps.LatLng(45.95379485678245, -66.61846424168641),
                new google.maps.LatLng(45.95382469316296, -66.61979998177583),
                new google.maps.LatLng(45.953865718159946, -66.62115717953736),
                new google.maps.LatLng(45.95389676379879, -66.62196169602947),
                new google.maps.LatLng(45.953848279735396, -66.62273417222576),
                new google.maps.LatLng(45.953848279735396, -66.62318478334026),
                new google.maps.LatLng(45.95451213476409, -66.6230828593977),
                new google.maps.LatLng(45.95484316747151, -66.62305603730755),
                new google.maps.LatLng(45.95527951468161, -66.62305603730755),
                new google.maps.LatLng(45.95573956865133, -66.6230828593977),
                new google.maps.LatLng(45.95617217941486, -66.62315259683209),
                new google.maps.LatLng(45.956572375677474, -66.62324379193859),
                new google.maps.LatLng(45.95703108526098, -66.62338326680737),
                new google.maps.LatLng(45.95765121252122, -66.62360320794659),
                new google.maps.LatLng(45.95809405536207, -66.62374455792701),
                new google.maps.LatLng(45.95882200024799, -66.62400204999244),
                new google.maps.LatLng(45.959791586427116, -66.6243561015824),
                new google.maps.LatLng(45.960793857374185, -66.62472088200843),
                new google.maps.LatLng(45.96155268512883, -66.62499173574031),
                new google.maps.LatLng(45.96237679384586, -66.62537797383845),
                new google.maps.LatLng(45.963606063105864, -66.62614953112285),
                new google.maps.LatLng(45.964791836878106, -66.62692216790333),
                new google.maps.LatLng(45.96583589340103, -66.62760881341114),
                new google.maps.LatLng(45.96635418558041, -66.62795750058308),
                new google.maps.LatLng(45.96717449422635, -66.62883726513996),
                new google.maps.LatLng(45.967593274291026, -66.62931285998218),
                new google.maps.LatLng(45.96847695015055, -66.63060568472736),
                new google.maps.LatLng(45.96922240054704, -66.63176675811792),
                new google.maps.LatLng(45.969964369108055, -66.63296302333856),
                new google.maps.LatLng(45.97047889423381, -66.63372477069879),
                new google.maps.LatLng(45.971351338958115, -66.63291711078483),
                new google.maps.LatLng(45.97245119627061, -66.63191932903129),
                new google.maps.LatLng(45.973170752116864, -66.63115758167106),
                new google.maps.LatLng(45.973584478024684, -66.63069639665207),
                new google.maps.LatLng(45.97386036536307, -66.63027260762772),
                new google.maps.LatLng(45.97418098946202, -66.6295323179396),
                new google.maps.LatLng(45.974419592237915, -66.62880275708756),
                new google.maps.LatLng(45.974695475416006, -66.62756357652268),
                new google.maps.LatLng(45.97493780410083, -66.62624929410538),
                new google.maps.LatLng(45.97505337586938, -66.62556128713231),
                new google.maps.LatLng(45.975243509544406, -66.62490453115043),
                new google.maps.LatLng(45.97576544176733, -66.62359561315117),
                new google.maps.LatLng(45.97655951492811, -66.62171270242271),
                new google.maps.LatLng(45.976981955244774, -66.62069882741508),
                new google.maps.LatLng(45.9777200919172, -66.61890405044323),
                new google.maps.LatLng(45.97858155771115, -66.616840743627),
                new google.maps.LatLng(45.9789581721075, -66.61601426428376),
                new google.maps.LatLng(45.979416696348274, -66.61531688993989),
                new google.maps.LatLng(45.97981184427387, -66.61482336348115),
                new google.maps.LatLng(45.98076615216292, -66.61397578543244),
                new google.maps.LatLng(45.98096372166293, -66.61380948847352),
                new google.maps.LatLng(45.981664528543305, -66.61318185156404),
                new google.maps.LatLng(45.98232432265851, -66.61249520605622),
                new google.maps.LatLng(45.98260016645493, -66.61219479864656),
                new google.maps.LatLng(45.9828573709188, -66.61261858767091),
                new google.maps.LatLng(45.98308906564994, -66.61316039389192),
                new google.maps.LatLng(45.98326798904084, -66.61377432188533),
                new google.maps.LatLng(45.983362700067744, -66.6142274249761),
                new google.maps.LatLng(45.98344875421052, -66.6150134559615),
                new google.maps.LatLng(45.983463664418295, -66.61586639842824),
                new google.maps.LatLng(45.983497212371134, -66.61696073970631),
                new google.maps.LatLng(45.98355685312599, -66.61779222450093),
                new google.maps.LatLng(45.98368252178846, -66.61857542953328),
                new google.maps.LatLng(45.98385398821153, -66.61927816829518),
                new google.maps.LatLng(45.98404036415602, -66.61994335613088),
                new google.maps.LatLng(45.98475604195209, -66.62167069873647),
                new google.maps.LatLng(45.98513544848888, -66.62264821498445),
                new google.maps.LatLng(45.98531436526603, -66.62325975863985),
                new google.maps.LatLng(45.985500736294014, -66.62441847293428),
                new google.maps.LatLng(45.985578026369154, -66.62535330775734),
                new google.maps.LatLng(45.985712212933436, -66.6261043262815),
                new google.maps.LatLng(45.98594368971673, -66.62682038274932),
                new google.maps.LatLng(45.98673761691335, -66.62614983049559),
                new google.maps.LatLng(45.98674704112816, -66.62613979403716),
                new google.maps.LatLng(45.98696602135407, -66.62648579900008),
                new google.maps.LatLng(45.98776155268966, -66.62775616534418),
                new google.maps.LatLng(45.987983164627344, -66.62808573449121),
                new google.maps.LatLng(45.98809218649862, -66.62824934924112),
                new google.maps.LatLng(45.98819748092257, -66.62847867811189),
                new google.maps.LatLng(45.98830621667388, -66.62879208537527),
                new google.maps.LatLng(45.987513961492446, -66.62947908867358),
                new google.maps.LatLng(45.9878952157036, -66.63016697786918),
                new google.maps.LatLng(45.98809648700261, -66.63098236940971),
                new google.maps.LatLng(45.988200849610266, -66.63248440645805),
                new google.maps.LatLng(45.98589737201399, -66.63274189852348),
                new google.maps.LatLng(45.98446603667978, -66.63290283106437),
                new google.maps.LatLng(45.98366296323917, -66.63299425071705),
                new google.maps.LatLng(45.98300691265948, -66.63306935256946),
                new google.maps.LatLng(45.982455227745376, -66.63314445442188),
                new google.maps.LatLng(45.9807749306503, -66.63332889023883),
                new google.maps.LatLng(45.97908562069953, -66.63356380707393),
                new google.maps.LatLng(45.97808869200047, -66.63368795966124),
                new google.maps.LatLng(45.97684678043185, -66.63386063562376),
                new google.maps.LatLng(45.97582758625498, -66.63404138085008),
                new google.maps.LatLng(45.97588723527172, -66.63522155281663),
                new google.maps.LatLng(45.976781962812744, -66.63789303299546),
                new google.maps.LatLng(45.97563372650686, -66.63881571289659),
                new google.maps.LatLng(45.97431397095464, -66.63980276581407),
                new google.maps.LatLng(45.97386417764716, -66.64003517064782),
                new google.maps.LatLng(45.97311853308099, -66.6404643240902),
                new google.maps.LatLng(45.97257463844054, -66.64074265191334),
                new google.maps.LatLng(45.971366661075, -66.6413112802245),
                new google.maps.LatLng(45.96853233184527, -66.64270460008606),
                new google.maps.LatLng(45.96701851715777, -66.64344488977417),
                new google.maps.LatLng(45.96617402313261, -66.64387404321656),
                new google.maps.LatLng(45.96549193284061, -66.64427349898341),
                new google.maps.LatLng(45.96497930585115, -66.64460469420533),
                new google.maps.LatLng(45.96399489500962, -66.64536644156556),
                new google.maps.LatLng(45.96210060069037, -66.6409247034369),
                new google.maps.LatLng(45.961630746011544, -66.64132703478913),
                new google.maps.LatLng(45.96111613869613, -66.64175082381348),
                new google.maps.LatLng(45.96156548810212, -66.64284784730057),
                new google.maps.LatLng(45.96206144628599, -66.64397437508683),
                new google.maps.LatLng(45.961150982361346, -66.64475489791016),
                new google.maps.LatLng(45.960684966625756, -66.64517756670506),
                new google.maps.LatLng(45.960218829058, -66.64557989805729),
                new google.maps.LatLng(45.959724718954504, -66.64599295824559),
                new google.maps.LatLng(45.959269760849594, -66.64637651413472),
                new google.maps.LatLng(45.9586972808493, -66.64686612062928),
                new google.maps.LatLng(45.95833927470389, -66.64720513904354),
                new google.maps.LatLng(45.9579999125764, -66.64749481761714),
                new google.maps.LatLng(45.957411405150516, -66.64800918808066),
                new google.maps.LatLng(45.95712051858329, -66.64826131572806),
                new google.maps.LatLng(45.95675131420282, -66.64856440534675),
                new google.maps.LatLng(45.95652195872775, -66.64875752439582),
                new google.maps.LatLng(45.95608562130065, -66.64912230482184),
                new google.maps.LatLng(45.9554932792323, -66.64965851834569),
                new google.maps.LatLng(45.95517814114081, -66.64991064599309),
                new google.maps.LatLng(45.95481638277905, -66.65020568898473),
                new google.maps.LatLng(45.95451242934017, -66.65046586325917),
                new google.maps.LatLng(45.95425882274116, -66.65069385102544),
                new google.maps.LatLng(45.953885869752, -66.65101571610722),
                new google.maps.LatLng(45.95359654467728, -66.65127196947213),
                new google.maps.LatLng(45.95333174514896, -66.65148922840234),
                new google.maps.LatLng(45.952784359749494, -66.6519580491065),
                new google.maps.LatLng(45.95247293589104, -66.652228952217),
                new google.maps.LatLng(45.952189482714175, -66.65245962219228),
                new google.maps.LatLng(45.951850082924246, -66.65275734739294),
                new google.maps.LatLng(45.95164867986847, -66.65292364435186),
                new google.maps.LatLng(45.95129249304293, -66.65322673397054),
                new google.maps.LatLng(45.9508654388053, -66.65359419660558),
                new google.maps.LatLng(45.950570788111605, -66.65383559541692),
                new google.maps.LatLng(45.95010829525624, -66.65422988014211),
                new google.maps.LatLng(45.949773526433184, -66.6545155620999),
                new google.maps.LatLng(45.94939820966344, -66.6548360931074),
                new google.maps.LatLng(45.94907376610938, -66.65511496537914),
                new google.maps.LatLng(45.948583286524986, -66.65553338998546),
                new google.maps.LatLng(45.948072287969076, -66.65595986121883),
                new google.maps.LatLng(45.94758092513, -66.65639831883533),
                new google.maps.LatLng(45.947168762274785, -66.65675773484332),
                new google.maps.LatLng(45.946778266034244, -66.65711070076622),
                new google.maps.LatLng(45.9461814595042, -66.65763641373314),
                new google.maps.LatLng(45.94560891956465, -66.65828546896097),
                new google.maps.LatLng(45.945515667000784, -66.65851613893625),
                new google.maps.LatLng(45.94538138303323, -66.6590284408581),
                new google.maps.LatLng(45.94519860711029, -66.65964534893152),
                new google.maps.LatLng(45.944439521063515, -66.66115006818887),
                new google.maps.LatLng(45.94389864260017, -66.66216126098749),
                new google.maps.LatLng(45.943612222840116, -66.6625045837414),
                new google.maps.LatLng(45.94318279996502, -66.66143578658267),
                new google.maps.LatLng(45.94265095808152, -66.66018418172649),
                new google.maps.LatLng(45.942128548914134, -66.65888062814525),
                new google.maps.LatLng(45.941704147218935, -66.65788386555516),
                new google.maps.LatLng(45.941209872030626, -66.6567038559154),
                new google.maps.LatLng(45.94099705999283, -66.65616911640564),
                new google.maps.LatLng(45.940327447403476, -66.65669214716354),
                new google.maps.LatLng(45.93945927568306, -66.65745389452377),
                new google.maps.LatLng(45.938539644544534, -66.65825812386117),
                new google.maps.LatLng(45.93808264721602, -66.65862826870523),
                new google.maps.LatLng(45.93857695028266, -66.6597762541636),
                new google.maps.LatLng(45.93921114398995, -66.66124610470376),
                new google.maps.LatLng(45.93953756439408, -66.66196761892877),
                new google.maps.LatLng(45.93993113158319, -66.66294930742822),
                new google.maps.LatLng(45.940109017454844, -66.66345453181981),
                new google.maps.LatLng(45.94042669433284, -66.66459884361154),
                new google.maps.LatLng(45.9407251293778, -66.66556175664789),
                new google.maps.LatLng(45.941045945259525, -66.66634764388925),
                new google.maps.LatLng(45.941592447109144, -66.66759218887216),
                new google.maps.LatLng(45.94208671888677, -66.66872139886743),
                new google.maps.LatLng(45.942642536225804, -66.6700115414036),
                new google.maps.LatLng(45.94320021312337, -66.67124535755045),
                new google.maps.LatLng(45.94360913068112, -66.67220667995952),
                new google.maps.LatLng(45.94412576567948, -66.67337075867198),
                new google.maps.LatLng(45.94469450526727, -66.67470503782789),
                new google.maps.LatLng(45.94536033499744, -66.6762204859213),
                new google.maps.LatLng(45.945936634946015, -66.67759645914595),
                new google.maps.LatLng(45.94664534511512, -66.6792996618704),
                new google.maps.LatLng(45.94732420635955, -66.68094653820555),
                new google.maps.LatLng(45.94791540567048, -66.68234933352034),
                new google.maps.LatLng(45.94930987789748, -66.68544533756756),
                new google.maps.LatLng(45.95033786161382, -66.68753532726481),
                new google.maps.LatLng(45.95080781205327, -66.68855456669047),
                new google.maps.LatLng(45.94901004360034, -66.69100074131205),
                new google.maps.LatLng(45.94678699617096, -66.69383315403178),
                new google.maps.LatLng(45.9458147109856, -66.69237761957925),
                new google.maps.LatLng(45.9450893663076, -66.69142765245999),
                new google.maps.LatLng(45.944850637193476, -66.69091266832913),
                new google.maps.LatLng(45.9446417483753, -66.68988270006741),
                new google.maps.LatLng(45.94405237925222, -66.6900597258624),
                new google.maps.LatLng(45.94357864130088, -66.69028503141965),
                new google.maps.LatLng(45.94329514263797, -66.69042987070645),
                new google.maps.LatLng(45.94300791225101, -66.69069272718991),
                new google.maps.LatLng(45.94229653440322, -66.69140097521222),
                new google.maps.LatLng(45.94271663507735, -66.69227371714925),
                new google.maps.LatLng(45.94385604714244, -66.69456864660827),
                new google.maps.LatLng(45.944457966466835, -66.69530661901325),
                new google.maps.LatLng(45.94465284565622, -66.69554801782459),
                new google.maps.LatLng(45.94514635241826, -66.69624807437748),
                new google.maps.LatLng(45.94437047983613, -66.69726463159412),
                new google.maps.LatLng(45.94357515060245, -66.6983102963573),
                new google.maps.LatLng(45.94271384341357, -66.69953070145908),
                new google.maps.LatLng(45.94185890448371, -66.70075769818322),
                new google.maps.LatLng(45.94074934395717, -66.70229125961072),
                new google.maps.LatLng(45.93995662268179, -66.70331318124539),
                new google.maps.LatLng(45.93941264733609, -66.7040541687278),
                new google.maps.LatLng(45.93915710637879, -66.70437603380958),
                new google.maps.LatLng(45.938854932340234, -66.70459865715782),
                new google.maps.LatLng(45.938309920587706, -66.7048797883869),
                new google.maps.LatLng(45.93748491261767, -66.70523115776786),
                new google.maps.LatLng(45.936839507099386, -66.70568176888236),
                new google.maps.LatLng(45.936283631585695, -66.70614310883292),
                new google.maps.LatLng(45.935876980868635, -66.70654544018515),
                new google.maps.LatLng(45.93561519008272, -66.70693586554472),
                new google.maps.LatLng(45.93512272601648, -66.70794437613432),
                new google.maps.LatLng(45.93464929468979, -66.70920551779346),
                new google.maps.LatLng(45.93375388663008, -66.71140492918568),
                new google.maps.LatLng(45.9328957736733, -66.71291769507008),
                new google.maps.LatLng(45.93271557246688, -66.71269659941476),
                new google.maps.LatLng(45.93258981301301, -66.71257021188387),
                new google.maps.LatLng(45.932370500918026, -66.71240144197577),
                new google.maps.LatLng(45.93206900362541, -66.71219862028454),
                new google.maps.LatLng(45.93183628122034, -66.71208060308788),
                new google.maps.LatLng(45.93152660519465, -66.71196795030926),
                new google.maps.LatLng(45.93122775496759, -66.7119350424444),
                new google.maps.LatLng(45.93112328499394, -66.7119350424444),
                new google.maps.LatLng(45.930966579664435, -66.71195113569848),
                new google.maps.LatLng(45.93068966126754, -66.712045013014),
                new google.maps.LatLng(45.93047885353768, -66.7121335259115),
                new google.maps.LatLng(45.930111337260726, -66.71229982287042)
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
                data: "route_id=71", //the data
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