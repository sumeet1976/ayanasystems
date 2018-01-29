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
    console.log('SetVisitorEntry');
    /*visiter_data.push.apply(visiter_data, [lat,long, message]);*/
    visiter_data.append('latitude', lat);
    visiter_data.append('longitude', long);
    visiter_data.append('message', message);
    /*console.log(JSON.stringify(visiter_data));*/
    /*console.log(visiter_data);*/

    /*$.getJSON("http://jsonip.com?callback=?", function (response) {
          console.log(response);
    });*/
    $.get("http://ipinfo.io", function(response) {
      /*console.log(response);*/

      $.ajax({
        url: url,
        type:'POST',
        data: visiter_data,
        cache : false,
        processData: false,
        contentType: false,
        }).done(function (res){
            /*console.log(res);*/
        });

    }, "jsonp");
}