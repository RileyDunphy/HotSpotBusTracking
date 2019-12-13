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
                new google.maps.LatLng(45.946286426274696, -66.6188242578965),
                new google.maps.LatLng(45.94668927062445, -66.61928559784707),
                new google.maps.LatLng(45.94763644784277, -66.62074347374732),
                new google.maps.LatLng(45.94829983553594, -66.62163805966634),
                new google.maps.LatLng(45.948728774486234, -66.62203502660054),
                new google.maps.LatLng(45.95005690975032, -66.62295234208364),
                new google.maps.LatLng(45.95081776854106, -66.62342824527599),
                new google.maps.LatLng(45.95272845457805, -66.62332095691539),
                new google.maps.LatLng(45.9539144611529, -66.62317611762859),
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
                new google.maps.LatLng(45.96399060962138, -66.64536794682829),
new google.maps.LatLng(45.96404700863591, -66.6455453078994),
new google.maps.LatLng(45.96464701829876, -66.64695219930496),
new google.maps.LatLng(45.96476054618445, -66.64780137276114),
new google.maps.LatLng(45.963955117252866, -66.64844510292471),
new google.maps.LatLng(45.963815335219, -66.64806952091055),
new google.maps.LatLng(45.96329701928599, -66.64684911580878),
new google.maps.LatLng(45.962662458930765, -66.64537211492973),
new google.maps.LatLng(45.96220026383117, -66.6442928165468),
new google.maps.LatLng(45.96205110431569, -66.64398168030107),
new google.maps.LatLng(45.96302335311196, -66.64313901322976),
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
                new google.maps.LatLng(45.94362319574013, -66.66252180202571),
                new google.maps.LatLng(45.94448070018893, -66.66453607687941),
                new google.maps.LatLng(45.94535355434489, -66.66668720850936),
                new google.maps.LatLng(45.94554378143806, -66.66717715051408),
                new google.maps.LatLng(45.94250789494334, -66.6696756181409),
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
                new google.maps.LatLng(45.946115567749644, -66.69493049911148),
                new google.maps.LatLng(45.94514635241826, -66.69624807437748),
                new google.maps.LatLng(45.94437047983613, -66.69726463159412),
                new google.maps.LatLng(45.94357515060245, -66.6983102963573),
                new google.maps.LatLng(45.94271384341357, -66.69953070145908),
                new google.maps.LatLng(45.94185890448371, -66.70075769818322),
                new google.maps.LatLng(45.94074934395717, -66.70229125961072),
                new google.maps.LatLng(45.93995662268179, -66.70331318124539),
                new google.maps.LatLng(45.93941264733609, -66.7040541687278),
                new google.maps.LatLng(45.93915710637879, -66.70437603380958),
                new google.maps.LatLng(45.93832616089329, -66.70486300836274),
                new google.maps.LatLng(45.938482845427835, -66.705630120141),
                new google.maps.LatLng(45.93762177151364, -66.70604854474732),
                new google.maps.LatLng(45.9372673598834, -66.7062255705423),
                new google.maps.LatLng(45.93684478586909, -66.70652597795197),
                new google.maps.LatLng(45.936596664820975, -66.70674867240149),
                new google.maps.LatLng(45.93632073375376, -66.70703814701142),
                new google.maps.LatLng(45.93589169879402, -66.70770869926514),
                new google.maps.LatLng(45.935598833893515, -66.70833365396561),
                new google.maps.LatLng(45.93524254393552, -66.70969621614518),
                new google.maps.LatLng(45.934976030162375, -66.71082194359303),
                new google.maps.LatLng(45.93469808376212, -66.71066905767918),
                new google.maps.LatLng(45.93420561155159, -66.71034182817937),
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