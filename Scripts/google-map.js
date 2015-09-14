/**
 * Created by lashevskiy on 10.09.2015.
 */
/**
 * Called on the intial page load.
 */
var myCenter = new google.maps.LatLng(60.007357,30.37289);
var styleArray = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];
function initialize() {
    var mapOptions = {
        zoom: 12,
        center: myCenter,
        styles: styleArray,
        scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var marker = new google.maps.Marker({
        position:myCenter
    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
        content:"BooksStore. Санкт-Петербург, ул.Политехническая, д.29"
    });

    infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);