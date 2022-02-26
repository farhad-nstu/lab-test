<?php
function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
} 

function getMyPermission($id)
{
    switch ($id) {
        case 2:
            return 'admin';
            break;
        case 3:
            return 'client';
            break;
        case 4:
            return 'logistic';
            break;
        case 5:
            return 'accountant';
            break;
        case 6:
            return 'cs';
            break;
    }
}

function getValue($field, $data, $default=null){
    return (!empty($data) && !empty($data->$field)) ? $data->$field : old($field,$default);
}

function get_title($field) {
    $title = substr($field, 0, 15);
    if(strlen($title) < 15) {
        return $title;
    } else {
        return $title."...";
    }
}

function get_usd_to_bdt($amount) {
    return $amount * 90; // USD rate 90
}

function get_time_ago($time)
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

