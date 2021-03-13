$( document ).ready(function() {

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});


function checkHour() {
    
}

function removeCheckHourValidation() {
    $('#check-hour-span').text("");
}


function placeOrder() {

    var selector = $('#hour').val()
    var flag = 0;
    if (selector =="0") {
        var flag = 1
        alert("Please select an hour");
        return false;
    }
    if (flag == 0) {
        var deliveryType = $('#delivery_type').val();
        var hour = $('#hour').val();
        var fromPlaceOrder = $('#from_place_order').val();

        const data = {
            "delivery_type": deliveryType,
            "hour": hour,
            "from_place_order": fromPlaceOrder
        }

        $.post('/add-order-items', data, function (response) {
            $('#order-success').replaceWith(response);
        });
    }
}