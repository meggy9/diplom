var lat = [],
	lon = [],
	name_array = [];

	buffer = [],
	

buffer = document.getElementsByClassName('hidden');


for (var i = 0; i <= buffer.length-1; i++) {
	lat[i] = buffer[i].getAttribute('data-lat');	
	lon[i] = buffer[i].getAttribute('data-lon');
	name_array[i] = buffer[i].getAttribute('data-name');
}





