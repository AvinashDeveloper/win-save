<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    //  Function for getting discount amount
    //  required param : amount(int) and discount(int)
    function getDiscount($amount,$discount){

        // $discountAmount = ($amount * $discount) / 100;

        $totalDiscount = $amount - $discount;

        return $totalDiscount;
    }

    //  Function for getting vat amount
    //  required param : amount(int) and vat(int)
    function getVatPercent($amount,$vat){

        $vatAmount = ($amount * $vat) / 100;

        $totalVat = $amount + $vatAmount;

        return $totalVat;
    }

?>