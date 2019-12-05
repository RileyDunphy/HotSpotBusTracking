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
                title: '11S Prospect',
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
                new google.maps.LatLng(45.978304733254184, -66.73120245780302),
                new google.maps.LatLng(45.978289821657064, -66.72783360328032),
                new google.maps.LatLng(45.97799158887086, -66.72440037574125),
                new google.maps.LatLng(45.977633707407165, -66.71751246299101),
                new google.maps.LatLng(45.97866039642837, -66.70054044316657),
                new google.maps.LatLng(45.97886915702584, -66.69946755956062),
                new google.maps.LatLng(45.97926566264995, -66.69847960979604),
                new google.maps.LatLng(45.97879595356244, -66.69807191402577),
                new google.maps.LatLng(45.97860955996307, -66.69762130291127),
                new google.maps.LatLng(45.97865429448413, -66.69481034786367),
                new google.maps.LatLng(45.9788196928972, -66.69289203599521),
                new google.maps.LatLng(45.977790792842264, -66.68499634999449),
                new google.maps.LatLng(45.97764603376181, -66.67822238647136),
                new google.maps.LatLng(45.97780950233678, -66.67739279852009),
                new google.maps.LatLng(45.97806111270031, -66.67671398558241),
                new google.maps.LatLng(45.97953028141946, -66.67437613990404),
                new google.maps.LatLng(45.98129381769332, -66.671352781878),
                new google.maps.LatLng(45.9823222658209, -66.66942214807892),
                new google.maps.LatLng(45.98291122795883, -66.66803812822724),
                new google.maps.LatLng(45.98416866055376, -66.66477821645185),
                new google.maps.LatLng(45.984493530370976, -66.66398809796772),
                new google.maps.LatLng(45.98356910709139, -66.66311369782886),
                new google.maps.LatLng(45.98215698736922, -66.66181211098325),
                new google.maps.LatLng(45.98168462858059, -66.66122120854521),
                new google.maps.LatLng(45.980532139705595, -66.65879487991333),
                new google.maps.LatLng(45.97923236994495, -66.6556540137513),
                new google.maps.LatLng(45.97785416876318, -66.6524265602136),
                new google.maps.LatLng(45.976168023654836, -66.64844711103422),
                new google.maps.LatLng(45.97519672109569, -66.6455202212453),
                new google.maps.LatLng(45.97426468624628, -66.64261270667316),
                new google.maps.LatLng(45.973041832732825, -66.63882542754413),
                new google.maps.LatLng(45.97285541976448, -66.63832117224933),
                new google.maps.LatLng(45.97146103086145, -66.63533855582477),
                new google.maps.LatLng(45.97263917993514, -66.63439441825153),
                new google.maps.LatLng(45.975799166292035, -66.63397599364521),
                new google.maps.LatLng(45.97587604081086, -66.63522053862812),
                new google.maps.LatLng(45.97674840051586, -66.63790274764301),
                new google.maps.LatLng(45.974317688846554, -66.6397910227895),
                new google.maps.LatLng(45.972214962626396, -66.64090682173969),
                new google.maps.LatLng(45.96715643929818, -66.64337541972287),
                new google.maps.LatLng(45.96600800341818, -66.64395477687009),
                new google.maps.LatLng(45.965109103933166, -66.64449788479294),
                new google.maps.LatLng(45.96397554106376, -66.645409835858),
                new google.maps.LatLng(45.96074131656561, -66.63774787409301),
                new google.maps.LatLng(45.9602898633941, -66.6367735392937),
                new google.maps.LatLng(45.96010340750797, -66.6363765723595),
                new google.maps.LatLng(45.95937249438364, -66.63535733293384),
                new google.maps.LatLng(45.95896974221532, -66.63499255250781),
                new google.maps.LatLng(45.95814185356466, -66.63439726223817),
                new google.maps.LatLng(45.95723190762548, -66.63379644741883),
                new google.maps.LatLng(45.9562846529461, -66.63323854794373),
                new google.maps.LatLng(45.95458402911238, -66.63264846196046),
                new google.maps.LatLng(45.95290573074435, -66.63255190243592),
                new google.maps.LatLng(45.95089160554599, -66.632905982811),
                new google.maps.LatLng(45.94939968789037, -66.63337805159762),
                new google.maps.LatLng(45.948181859316215, -66.63401105292513),
                new google.maps.LatLng(45.94716731008183, -66.63461186774447),
                new google.maps.LatLng(45.94671970892811, -66.63485863097384),
                new google.maps.LatLng(45.946130361896856, -66.63503029235079),
                new google.maps.LatLng(45.94587181809411, -66.63503565676882),
                new google.maps.LatLng(45.945606981658834, -66.63494982608034),
                new google.maps.LatLng(45.9453056096029, -66.63476021634517),
                new google.maps.LatLng(45.944589421970086, -66.63401290355648),
                new google.maps.LatLng(45.944102534047424, -66.63349481070634),
                new google.maps.LatLng(45.94386007046673, -66.63331242049333),
                new google.maps.LatLng(45.94341617285573, -66.6331085726082),
                new google.maps.LatLng(45.94287901469137, -66.63288088235385),
                new google.maps.LatLng(45.94229335715108, -66.632548288436),
                new google.maps.LatLng(45.93983875060639, -66.63072438630587),
                new google.maps.LatLng(45.93960372938574, -66.63053394946581),
                new google.maps.LatLng(45.939485787441896, -66.63065716839907),
                new google.maps.LatLng(45.93913511826079, -66.63054183341143),
                new google.maps.LatLng(45.93879293563003, -66.63037821866152),
                new google.maps.LatLng(45.93774366210009, -66.62962579553448),
                new google.maps.LatLng(45.93707587555668, -66.629167767931),
                new google.maps.LatLng(45.936833709748576, -66.62892100470162),
                new google.maps.LatLng(45.93625544980885, -66.62823435919381),
                new google.maps.LatLng(45.935917817829974, -66.62854013102151),
                new google.maps.LatLng(45.9357233503195, -66.62869033472634),
                new google.maps.LatLng(45.935451343249014, -66.62881737363193),
                new google.maps.LatLng(45.93506851236808, -66.6287744582877),
                new google.maps.LatLng(45.93282212931133, -66.6278994381633),
                new google.maps.LatLng(45.932288574059996, -66.6277035384515),
                new google.maps.LatLng(45.93182701673007, -66.62758909660982),
                new google.maps.LatLng(45.93169967283767, -66.6276025076549),
                new google.maps.LatLng(45.93159520375292, -66.62768297392535),
                new google.maps.LatLng(45.93132097146915, -66.62809603411364),
                new google.maps.LatLng(45.93282606547098, -66.62971497714273),
                new google.maps.LatLng(45.93402742140272, -66.6310614460682),
                new google.maps.LatLng(45.93534440592214, -66.6325893648235),
                new google.maps.LatLng(45.93623605757139, -66.63362469750325),
                new google.maps.LatLng(45.93656436084354, -66.63393046933095),
                new google.maps.LatLng(45.93688637103419, -66.63411285954396),
                new google.maps.LatLng(45.9377873470884, -66.63433687281514),
                new google.maps.LatLng(45.93863579309201, -66.63456754279042),
                new google.maps.LatLng(45.93951993079998, -66.63449780535603),
                new google.maps.LatLng(45.94031452354674, -66.63431541514302),
                new google.maps.LatLng(45.940877819488286, -66.63403110098744),
                new google.maps.LatLng(45.94206487986158, -66.63381115984822),
                new google.maps.LatLng(45.94281094241776, -66.63368777823354),
                new google.maps.LatLng(45.94326627608938, -66.63370387148763),
                new google.maps.LatLng(45.94361388466388, -66.63379943045311),
                new google.maps.LatLng(45.943997402258155, -66.63397498349116),
                new google.maps.LatLng(45.94447859698252, -66.63435049275324),
                new google.maps.LatLng(45.94537010175216, -66.63520879963801),
                new google.maps.LatLng(45.94722641974263, -66.63695282668459),
                new google.maps.LatLng(45.94771571852431, -66.6373734772535),
                new google.maps.LatLng(45.94820807074788, -66.637824088368),
                new google.maps.LatLng(45.94882723476044, -66.63851609829385),
                new google.maps.LatLng(45.94941282327584, -66.63928976711372),
                new google.maps.LatLng(45.95046743703613, -66.64072572819356),
                new google.maps.LatLng(45.951369648962505, -66.64215266338948),
                new google.maps.LatLng(45.951988777658556, -66.64311825863484),
                new google.maps.LatLng(45.95212118078922, -66.64342671267156),
                new google.maps.LatLng(45.95118609472053, -66.644226010958),
                new google.maps.LatLng(45.95057068682349, -66.64289027086858),
                new google.maps.LatLng(45.950464344187615, -66.64268891440821),
                new google.maps.LatLng(45.950427046448134, -66.64249043094111),
                new google.maps.LatLng(45.94925269439309, -66.64349050687707),
                new google.maps.LatLng(45.948730512341434, -66.6439089314834),
                new google.maps.LatLng(45.9471863166344, -66.64508373903192),
                new google.maps.LatLng(45.946988626638266, -66.64530368017114),
                new google.maps.LatLng(45.94676855581329, -66.64554507898248),
                new google.maps.LatLng(45.94615741096688, -66.64606542753137),
                new google.maps.LatLng(45.94537409230547, -66.64673061536706),
                new google.maps.LatLng(45.944751159564184, -66.64724559949792),
                new google.maps.LatLng(45.944016313738615, -66.64790005849756),
                new google.maps.LatLng(45.94329477959325, -66.64851696657098),
                new google.maps.LatLng(45.94391026827259, -66.65007264779962),
                new google.maps.LatLng(45.94436890957311, -66.65112101814555),
                new google.maps.LatLng(45.945003037031384, -66.65264987728403),
                new google.maps.LatLng(45.944107796158455, -66.6534169890623),
                new google.maps.LatLng(45.941089604850205, -66.65609146385043),
                new google.maps.LatLng(45.93691357275047, -66.65969076410568),
                new google.maps.LatLng(45.93442141952933, -66.66170778528488),
                new google.maps.LatLng(45.932451494620004, -66.66348877207076),
                new google.maps.LatLng(45.93114563461874, -66.66037740961349),
                new google.maps.LatLng(45.93058135443967, -66.66085457017778),
                new google.maps.LatLng(45.930439572061026, -66.66103159597276),
                new google.maps.LatLng(45.93022316667906, -66.66142319848893),
                new google.maps.LatLng(45.9301000391021, -66.66165923288224),
                new google.maps.LatLng(45.929906019335256, -66.66188990285752),
                new google.maps.LatLng(45.92847323696874, -66.66310226133226),
                new google.maps.LatLng(45.92886874829933, -66.6639667714544),
                new google.maps.LatLng(45.92894710398295, -66.66426181444604),
                new google.maps.LatLng(45.92902172834062, -66.664615866036),
                new google.maps.LatLng(45.92902172834062, -66.66534542688805),
                new google.maps.LatLng(45.929841845550875, -66.66526173583043),
                new google.maps.LatLng(45.9303391609904, -66.66506861678135),
                new google.maps.LatLng(45.93091621605593, -66.66472711504827),
                new google.maps.LatLng(45.93245173601187, -66.66348854238589)
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
                data: "route_id=67", //the data
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