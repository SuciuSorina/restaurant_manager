<?php

function displayStatus($delivery_method) {

    if($delivery_method == 'meet_half') {
        return "Meet at the Half Way";
    }

    if($delivery_method == 'delivery') {
        return "Delivery";
    }

    if($delivery_method == 'pick_up') {
        return "Pick Up";
    }

}



?>
