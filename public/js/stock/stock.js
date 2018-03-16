// Preventing the Google Maps libary from downloading an extra font
(function() {
    var isRobotoStyle = function (element) {

        // roboto font download
        if (element.href
            && element.href.indexOf('https://fonts.googleapis.com/css?family=Roboto') === 0) {
            return true;
        }
        // roboto style elements
        if (element.tagName.toLowerCase() === 'style'
            && element.styleSheet
            && element.styleSheet.cssText
            && element.styleSheet.cssText.replace('\r\n', '').indexOf('.gm-style') === 0) {
            element.styleSheet.cssText = '';
            return true;
        }
        // roboto style elements for other browsers
        if (element.tagName.toLowerCase() === 'style'
            && element.innerHTML
            && element.innerHTML.replace('\r\n', '').indexOf('.gm-style') === 0) {
            element.innerHTML = '';
            return true;
        }
        // when google tries to add empty style
        if (element.tagName.toLowerCase() === 'style'
            && !element.styleSheet && !element.innerHTML) {
            return true;
        }

        return false;
    }

    // we override these methods only for one particular head element
    // default methods for other elements are not affected
    var head = $('head')[0];

    var insertBefore = head.insertBefore;
    head.insertBefore = function (newElement, referenceElement) {
        if (!isRobotoStyle(newElement)) {
            insertBefore.call(head, newElement, referenceElement);
        }
    };

    var appendChild = head.appendChild;
    head.appendChild = function (textNode) {
        if (!isRobotoStyle($(textNode)[0])) {
            appendChild.call(head, textNode);
        }
    };
})();

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 21.04797711209345, lng:  105.80915451049805},
        zoom: 10
    });


    var geocoder = new google.maps.Geocoder();
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');
    var types = document.getElementById('type-selector');
    var strictBounds = document.getElementById('strict-bounds-selector');

    var clickHandler = new ClickEventHandler(map, {lat: 21.04797711209345, lng:  105.80915451049805});

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

    var autocomplete = new google.maps.places.Autocomplete(input);

    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        // infowindowContent.children['place-icon'].src = place.icon;
        // infowindowContent.children['place-name'].textContent = place.name;
        // infowindowContent.children['place-address'].textContent = address;
        infowindow.open(map, marker);
    });

}

//         Ham xac dinh lat va long
function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('pac-input').value;
    geocoder.geocode({'address': address}, function (results, status) {
        if (status === 'OK') {
            document.getElementById('maplat').value = results[0].geometry.location.lat();
            document.getElementById('maplong').value = results[0].geometry.location.lng() ;
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

/**
 * @constructor
 */
var ClickEventHandler = function(map, origin) {
    this.origin = origin;
    this.map = map;
    this.directionsService = new google.maps.DirectionsService;
    this.directionsDisplay = new google.maps.DirectionsRenderer;
    this.directionsDisplay.setMap(map);
    this.placesService = new google.maps.places.PlacesService(map);
    this.infowindow = new google.maps.InfoWindow;
    this.infowindowContent = document.getElementById('infowindow-content');
    this.infowindow.setContent(this.infowindowContent);

    // Listen for clicks on the map.
    this.map.addListener('click', this.handleClick.bind(this));
};

ClickEventHandler.prototype.handleClick = function(event) {
    alert('You clicked on: ' + event.latLng);
    document.getElementById('maplat').value = event.latLng.lat();
    document.getElementById('maplong').value = event.latLng.lng() ;
    // If the event has a placeId, use it.
    if (event.placeId) {
        console.log('You clicked on place:' + event.placeId);

        // Calling e.stop() on the event prevents the default info window from
        // showing.
        // If you call stop here when there is no placeId you will prevent some
        // other map click event handlers from receiving the event.
        event.stop();
        this.calculateAndDisplayRoute(event.placeId);
        this.getPlaceInformation(event.placeId);
    }
}










//       Prevent Enter key
$('#form-input').on('keypress', function(e) {
    return e.which !== 13;
});

$(document).ready(function() {
    $('#province').change(function () {
        var data = $('#province option:selected').val();
        var type = "province";
        $('.buttonsubmit').attr('disabled', true);

        function ajax1() {
            return $.ajax({
                beforeSend: function () {
                    $('#district-wait').waitMe({
                        effect : 'bouncePulse',
                        text : '',
                        bg : 'rgba(255,255,255,0.7)',
                        color : '#000'
                    });

                },
                url: '/stock/place-ajax',
                data: {
                    data: data,
                    type: type
                },
                type: 'GET',
                success: function (data) {
                    $('#district-wait').waitMe('hide');
                    $('#district').empty();
                    $.each(data, function (index, val) {
                        $('#district').append('<option value="' + val.id + '">' + val.name + '</option>');

                    })
                }
            });
        }


        //Lấy dữ liệu mẫu của các xã phường thuộc quận đầu tiên ứng với tỉnh trên
        function ajax2() {
            return $.ajax({
                beforeSend: function () {
                    $('#ward-wait').waitMe({
                        effect : 'bouncePulse',
                        text : '',
                        bg : 'rgba(255,255,255,0.7)',
                        color : '#000'
                    })
                },
                url: '/stock/place-ajax',
                data: {
                    data: data,
                    type: "district_first"
                },
                type: 'GET',
                success: function (data) {
                    $('#ward-wait').waitMe('hide');
                    $('#ward').empty();
                    $.each(data, function (index, val) {
                        $('#ward').append('<option value="' + val.id + '" >' + val.name + '</option>')
                    })
                }
            });
        }

        $.when(ajax1(),ajax2()).done(function(){
            $('.buttonsubmit').attr('disabled',false)
        });




    });

    $('#district').change(function () {

        var data = $('#district option:selected').val();
        var type = "district";
        $('.buttonsubmit').attr('disabled',true);
        function ajax1(){
            return $.ajax({
                beforeSend: function () {
                    $('#ward-wait').waitMe({
                        effect : 'bouncePulse',
                        text : '',
                        bg : 'rgba(255,255,255,0.7)',
                        color : '#000'
                    })
                },
                url: '/stock/place-ajax',
                data: {
                    data: data,
                    type: type
                },
                type: 'GET',
                success: function (data) {
                    $('#ward-wait').waitMe('hide');
                    $('#ward').empty();
                    $.each(data, function (index, val) {
                        $('#ward').append('<option value="' + val.id + '">' + val.name + '</option>')
                    })

                }
            });
        }
        $.when(ajax1()).done(function(){
            $('.buttonsubmit').attr('disabled',false)
        });


    })



});
function changeCategory() {

    var data = $('#category option:selected').val();
    var type = "category";
    $('.buttonsubmit').attr('disabled',true);

    $.ajax({
        beforeSend: function () {
            $('#product-wait').waitMe({
                effect : 'bounce',
                text : '',
                bg : 'rgba(255,255,255,0.7)',
                color : '#000'
            });
        },
        url: '/stock/place-ajax',
        data: {
            data: data,
            type: type
        },
        type: 'GET',
        success: function (data) {
            $('.buttonsubmit').attr('disabled',false)
            $('#product-wait').waitMe('hide');
            $('#product').empty();
            $.each(data, function (index, val) {
                $('#product').append('<option value="' + val.id + '">' + val.name + '</option>')
            })

        }
    });




}


$('#add_product').click(function() {
    var quantity = parseInt($('#quantity').val());

    if(quantity > 0) {
        var product_now = $('#product option:selected').text();
        $.each($('.product'), function(index,val) {
            if($(this).text() === product_now){
                console.log(parseInt($(this).parent().find('.quantity').text()),parseInt(quantity));
                quantity = parseInt($(this).parent().find('.quantity').text()) + parseInt(quantity);
                $(this).closest('.tr_clone').remove();
            }
        });

        var html = '<tr class="tr_clone">'+
            '<td class="product">'+'<input style="display:none"  value="'+$('#product option:selected').val()+'" name="product[]">'+ $('#product option:selected').text()+'</td>'+
            '<td class="quantity">'+'<input class="edit-quantity" style="display:none"  value="'+quantity+'" name="quantity[]">'+ quantity+'</td>'+
            '<td><button type="button"  class="btn btn-warning edit_product" style="margin-right: 5px" onclick="return editRow(this)"><i class="fa fa-pencil"></i></button>' +
            '<button type="button" class="btn btn-danger" onclick="return deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></button>' +
            '</td></tr>'

        ;
        $('#body_products').prepend(html);
    }
    else {
        alert('quantity must > 0')
    }

});



function deleteRow(_this){
    if(confirm('Do you want to delete this record?')){
        $(_this).closest('.tr_clone').remove();
    }
    else return false;
};


function editRow(_this)
{
    console.log($(_this).closest('.tr_clone').find('.edit-quantity'));
    var input = $(_this).closest('.tr_clone').find('.edit-quantity');

    var quantity = $(input).val();
    console.log(input,quantity);
    var html = '<td class="quantity">'+'<div class="input-group input-group-sm" style="width: 50%; margin: auto"><input class="confirm-edit form-control"  id="confirm" type="number" min="1" step="1" value="'+quantity+'" name="quantity[]">'+
        '<span class="input-group-btn"><button class="btn btn-success" type="button" onclick="return confirmEdit(this)">Confirm</button></td>';
    $(input).parent().replaceWith(html)
}

function confirmEdit(_this)
{
    var quantity = $(_this).closest('td').find('.confirm-edit').val();
    quantity = parseInt(quantity);
    var html = '<td class="quantity">'+'<input class="edit-quantity" style="display:none" value="'+quantity+'" name="quantity[]">'+ quantity+'</td>';

    $(_this).closest('td').replaceWith(html)
}

function beforeSubmit (){
    $('#province_name').val($('#province option:selected').text()) ;
    $('#district_name').val($('#district option:selected').text()) ;
    $('#ward_name').val($('#ward option:selected').text()) ;

    return true;
}
