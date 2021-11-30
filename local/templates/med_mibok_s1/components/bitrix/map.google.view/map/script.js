if (!window.BX_GMapAddPlacemark)
{
	window.BX_GMapAddPlacemark = function(arPlacemark, map_id)
	{
		var map = GLOBAL_arMapObjects[map_id];
        
        if($('.l-header').length > 0)
            var colorMarker = $('.l-header').css('background-color');
        else
            var colorMarker = '#000';
        
        // var styles = [{"stylers":[{"saturation":-100},{"gamma":0.8},{"lightness":4},{"visibility":"on"}]},{"featureType":"landscape.natural","stylers":[{"visibility":"on"},{"color":"#e9e9ea"}/*,{"gamma":4.97},{"lightness":-5},{"saturation":100}*/]}];
        // map.setOptions({styles: styles});
		
		if (null == map)
			return false;

		if(!arPlacemark.LAT || !arPlacemark.LON)
			return false;

        //var image = '/include/img/map-marker.png';
        var icon = {
            path: "M13,5.5C13,2.463,10.762,0,8,0S3,2.463,3,5.5C3,5.669,3.007,5.835,3.021,6H3c0,3.021,5,10,5,10s5-6.994,5-10h-0.021C12.993,5.835,13,5.669,13,5.5z M8,7C6.896,7,6,6.104,6,5s0.896-2,2-2s2,0.896,2,2S9.104,7,8,7z",
            fillColor: colorMarker,
            fillOpacity: 1,
            anchor: new google.maps.Point(0,0),
            strokeWeight: 0,
            size: new google.maps.Size(20, 32),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(5, 5),
            scale: 2
        }
        
        
		var obPlacemark = new google.maps.Marker({
			'position': new google.maps.LatLng(arPlacemark.LAT, arPlacemark.LON),
			'map': map,
             /*icon: {
                anchor: new google.maps.Point(0, 0),
                url: 'data:image/svg+xml;utf-8, \
                  <svg width="32" height="32" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"> \
                    <path fill="#2a91cc" stroke-width="1.5" d="M13,5.5C13,2.463,10.762,0,8,0S3,2.463,3,5.5C3,5.669,3.007,5.835,3.021,6H3c0,3.021,5,10,5,10s5-6.994,5-10h-0.021C12.993,5.835,13,5.669,13,5.5z M8,7C6.896,7,6,6.104,6,5s0.896-2,2-2s2,0.896,2,2S9.104,7,8,7z" ></path> \
                  </svg>'
              }*/
            //icon:image
            icon:icon
		});
		
		if (BX.type.isNotEmptyString(arPlacemark.TEXT))
		{
			obPlacemark.infowin = new google.maps.InfoWindow({
				content: arPlacemark.TEXT.replace(/\n/g, '<br />')
			});
			
			google.maps.event.addListener(obPlacemark, 'click', function() {
				if (null != window['__bx_google_infowin_opened_' + map_id])
					window['__bx_google_infowin_opened_' + map_id].close();

				this.infowin.open(this.map, this);
				window['__bx_google_infowin_opened_' + map_id] = this.infowin;
			});
		}
		
		return obPlacemark;
	}
}

if (null == window.BXWaitForMap_view)
{
	function BXWaitForMap_view(map_id)
	{
		if (null == window.GLOBAL_arMapObjects)
			return;
	
		if (window.GLOBAL_arMapObjects[map_id])
			window['BX_SetPlacemarks_' + map_id]();
		else
			setTimeout('BXWaitForMap_view(\'' + map_id + '\')', 300);
	}
}