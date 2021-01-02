<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EV Stations</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    BeeEV
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">BeeEV</a>
                   
                </div>
            </div>
        </div>
    </body>
</html>

@section('scripts')
<script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'></script>
<script defer>
	function initialize() {
		var mapOptions = {
			zoom: 12,
			minZoom: 6,
			maxZoom: 17,
			zoomControl:true,
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT
			},

        center: new google.maps.LatLng(28.7041, 77.1025),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			panControl:false,
			mapTypeControl:false,
			scaleControl:false,
			overviewMapControl:false,
			rotateControl:false
	  	}
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var image = new google.maps.MarkerImage("assets/images/pin.png", null, null, null, new google.maps.Size(40,52));
        var places = @json($mapShops);

        for(place in places)
        {
            place = places[place];
            if(place.latitude && place.longitude)
            {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(place.latitude, place.longitude),
                    icon:image,
                    map: map,
                    title: place.name
                });
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function (marker, place) {
                    return function () {
                        infowindow.setContent(generateContent(place))
                        infowindow.open(map, marker);
                    }
                })(marker, place));
            }
        }
	}
	google.maps.event.addDomListener(window, 'load', initialize);

    function generateContent(place)
    {
        var content = `
            <div class="gd-bubble" style="">
                <div class="gd-bubble-inside">
                    <div class="geodir-bubble_desc">
                    <div class="geodir-bubble_image">
                        <div class="geodir-post-slider">
                            <div class="geodir-image-container geodir-image-sizes-medium_large ">
                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                                    <ul class="geodir-post-image geodir-images clearfix">
                                        <li>
                                            <div class="geodir-post-title">
                                                <h4 class="geodir-entry-title">
                                                    <a href="{{ route('admin.profile', '') }}/`+place.id+`" title="View: `+place.name+`">`+place.name+`</a>
                                                </h4>
                                            </div>
                                            <a href="{{ route('admin.profile', '') }}/`+place.id+`"><img src="`+place.thumbnail+`" alt="`+place.name+`" class="align size-medium_large" width="1400" height="930"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="geodir-bubble-meta-side">
                    <div class="geodir-output-location">
                    <div class="geodir-output-location geodir-output-location-mapbubble">
                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
                            <i class="fas fa-minus" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Place Title: </span></span>`+place.name+`</div>
                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_icon geodir-i-address"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">`+place.address+`</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>`;

    return content;

    }
</script>
