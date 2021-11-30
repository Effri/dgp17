window.onload = (function ($) {
    var map;
    var place = {
        lat: 47.250271,
        lng: 39.691906
    };

    function initMap() {
        if (window.innerWidth > 767) {
            var center = {
                lat: place.lat + 0.0001,
                lng: place.lng + 0.00255
            };
        } else {
            center = place;
        }

        map = new google.maps.Map(document.getElementById('map'), {
            center: center,
            zoom: 17,
            scrollwheel: false,
            //draggable: false
        });

        var image = 'img/map-marker.png';
        var beachMarker = new google.maps.Marker({
            position: place,
            map: map,
            icon: image
        });

        var contentString = "<div class='clearfix map'>" +
            "<div class='map-logo'><img src='img/logo-map.png' alt=''></div>" +
            "<div class='map-text'><p>�. ������-��-���� ��. ������ 144 ���� 3 ���� 12</p>" +
            "<p class='map-tel'>�������: <a href='tel:+79995002023'>+7 (999) 500 - 20 - 23</a></p>" +
            "</div>" +
            "</div>";

        if (window.innerWidth > 767) {
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                pixelOffset: new google.maps.Size(250, 75)
            });

            infowindow.open(map, beachMarker);

            beachMarker.addListener('click', function () {
                infowindow.open(map, beachMarker);
                infoWindow();
            });

            function infoWindow() {
                $('.gm-style .gm-style-iw').siblings('div').css('display', 'none');
            }

            $(window).on('load resize', infoWindow);

            infoWindow();
        }

        // var styles = [
        //     {"stylers": [{"saturation": -100}, {"gamma": 0.8}, {"lightness": 4}, {"visibility": "on"}]},
        //     {
        //     "featureType": "landscape.natural",
        //     "stylers": [{"visibility": "on"}, {"color": "#5dff00"}, {"gamma": 4.97}, {"lightness": -5}, {"saturation": 100}]
        // }];
        // map.setOptions({styles: styles});


    }

    google.maps.event.addDomListener(window, 'resize', initMap);

    initMap();
})(jQuery);