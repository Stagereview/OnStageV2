/**
 * Calculates and displays the address details based on a free-form text
 *
 *
 * A full list of available request parameters can be found in the Geocoder API documentation.
 * see: http://developer.here.com/rest-apis/documentation/geocoder/topics/resource-geocode.html
 *
 * @param   {H.service.Platform} platform    A stub class to access HERE services
 */

function geocode(platform) {
    var geocoder = platform.getGeocodingService(),
        geocodingParameters = {
            // searchText: '200 S Mathilda Sunnyvale CA',
            searchText: document
                .getElementById('mapContainer')
                .getAttribute('value'),
            jsonattributes: 1
        };

    geocoder.geocode(geocodingParameters, onSuccess, onError);
}
/**
 * This function will be called once the Geocoder REST API provides a response
 * @param  {Object} result          A JSONP object representing the  location(s) found.
 *
 * see: http://developer.here.com/rest-apis/documentation/geocoder/topics/resource-type-response-geocode.html
 */
function onSuccess(result) {
    let locations = result.response.view[0].result;

    /*
     * The styling of the geocoding response on the map is entirely under the developer's control.
     * A representitive styling can be found the full JS + HTML code of this example
     * in the functions below:
     */
    addLocationsToMap(locations);
}

/**
 * This function will be called if a communication error occurs during the JSON-P request
 * @param  {Object} error  The error message received.
 */
function onError(error) {
    alert("Can't reach the remote server");
}

/**
 * Boilerplate map initialization code starts below:
 */

// Step 1: Initializing the communication with the platform

let platform = new H.service.Platform({
    apikey: 'IbwPXY9b0orrOR2WdJJ22nEAaAINeT-Z-AFpP5v3L0U'
});

let defaultLayers = platform.createDefaultLayers();

// Step 2: Initialize the map

let map = new H.Map(
    document.getElementById('mapContainer'),
    defaultLayers.vector.normal.map,
    {
        center: { lat: 0, lng: 0 },
        zoom: 15,
        pixelRatio: window.devicePixelRatio || 1
    }
);

// Add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

// Step 3: Make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)

let behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components

let ui = H.ui.UI.createDefault(map, defaultLayers);

// Hold a reference to any infobubble opened

let bubble;

/**
 * Opens/Closes a infobubble
 * @param  {H.geo.Point} position     The location on the map.
 * @param  {String} text              The contents of the infobubble.
 */
function openBubble(position, text) {
    if (!bubble) {
        bubble = new H.ui.InfoBubble(position, { content: text });
        ui.addBubble(bubble);
    } else {
        bubble.setPosition(position);
        bubble.setContent(text);
        bubble.open();
    }
}

/**
 * Creates a series of H.map.Markers for each location found, and adds it to the map.
 * @param {Object[]} locations An array of locations as received from the
 *                             H.service.GeocodingService
 */
function addLocationsToMap(locations) {
    let group = new H.map.Group(),
        position,
        i;

    // Add a marker for each location found
    for (i = 0; i < locations.length; i += 1) {
        position = {
            lat: locations[i].location.displayPosition.latitude,
            lng: locations[i].location.displayPosition.longitude
        };
        marker = new H.map.Marker(position);
        marker.label = locations[i].location.address.label;
        group.addObject(marker);
    }

    group.addEventListener(
        'tap',
        function(evt) {
            map.setCenter(evt.target.getGeometry());
            openBubble(evt.target.getGeometry(), evt.target.label);
        },
        false
    );

    // Add the locations group to the map
    map.addObject(group);
    map.setCenter(group.getBoundingBox().getCenter());
}

// Now use the map as required...
geocode(platform);
