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
    var total = $('#total').val()

    if (selector =="0") {
        var flag = 1
        alert("Please select an hour");
        return false;
    }

    if (flag == 0) {
        var deliveryType = $('#delivery_type').val();
        var hour = $('#hour').val();
        var status = $('#status').val();

        const data = {
            "delivery_type": deliveryType,
            "hour": hour,
            "status": status,
            'total': total
        }

        $.post('/update-status', data, function (response) {
            if (response == 'fail') {
                window.location.replace("http://127.0.0.1:8000/order-items");
                alert("Hour passed");
            } else {
                $('#order-success').replaceWith(response);
            }

        });
    }
}

function updateStatus(orderId) {
    var orderStatus= $('#status_order_'+orderId).val()
    var data={
        "status": orderStatus,
        "order_id": orderId
    }
    $.post('/update-status', data, function (response) {
        // window.location.replace(response);
        // window.location.replace("http://127.0.0.1:8000/orders");
        $('#new-list').replaceWith(response);
        var displaySuccess = `<div class="col-md-12  text-center alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Order Updated! </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>`
        $('#display-success').append(displaySuccess)
    });
}

function useCoupon() {
    $("#apply-coupon").show();
    $("#use-coupon-button").attr("disabled", true);
}

function applyCoupon() {
    var code = $("#coupon_code").val();
    var total = $("#total").val();

    $.get('/check-code/'+code + '/'+ total ,function (response) {
        if (response == 'fail') {

        //     window.location.replace("http://127.0.0.1:8000/order-items");
            alert("Coupon was not applied!");
        } else {
            var diff = total - response.discount
            $("#discount").show().text(" -" + response.discount + " €  = " + diff + " €");
            $("#total").val(diff);
            
        //     $('#order-success').replaceWith(response);
        }

    });
}