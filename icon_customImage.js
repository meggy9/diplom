ymaps.ready(function () {
    var center1 = '51.73689';
    var center2 = '36.190906';
    center1 = parseFloat(center1);
    center2 = parseFloat(center2);
    var myMap = new ymaps.Map('map', {
            center: [center1, center2],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }
    );


    var myCollection = new ymaps.GeoObjectCollection();
    for( var i = 0; i <= lat.length-1; i++) {
        myCollection.add(new ymaps.Placemark([lat[i], lon[i]],{
            balloonContent: name_array[i]
        }));
    }

    myMap.geoObjects
        .add(myCollection);
});