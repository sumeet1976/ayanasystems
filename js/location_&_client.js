$(document).ready(function(){
    /*console.log('inside geolocation ready');*/
    getLocation();
});


var visiter_lat = visiter_long = null;
var entry_message = "Access Granted";
var visiter_data = new FormData();
var url = "http://localhost/islam/api/SetVisitorEntry";
var x = document.getElementById("demo");

function getLocation() {
    console.log('inside geolocation');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        entry_message = "Geolocation is not supported by this browser.";
        SetVisitorEntry(visiter_lat, visiter_long, entry_message);
    }
}

function showPosition(position) {
    visiter_lat  = position.coords.latitude;
    visiter_long = position.coords.longitude
    SetVisitorEntry(visiter_lat, visiter_long, entry_message);
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            entry_message = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            entry_message = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            entry_message = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            entry_message = "An unknown error occurred."
            break;
    }
    SetVisitorEntry(visiter_lat, visiter_long, entry_message);
}

function SetVisitorEntry(lat, long, message){
}