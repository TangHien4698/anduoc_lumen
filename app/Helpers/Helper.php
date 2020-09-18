<?php
if (!function_exists('formatMoney')) {
function formatMoney($number, $fractional=false)
{
//Xử lý hàm env()
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
}
function getUrlImageMain($images_json, $maxWidth = 200, $catID = 0,$random = false) {
    $array = json_decode(html_entity_decode($images_json), 1);
            if(!is_array($array)) $array = json_decode($array,true);
            $array = arrayVal($array);
            if($random) shuffle($array);
            foreach ($array as $row) {
                if (isset($row['type'])) {
                    if ($row['type'] == 'photo') {
                        if (isset($row["filename"])) return getUrlPicture($row["filename"], $maxWidth);
                        if (isset($row["name"])) return getUrlPicture($row["name"], $maxWidth);
                    }
        } else {
            if (isset($row["filename"])) return getUrlPicture($row["filename"], $maxWidth);
            if (isset($row["name"])) return getUrlPicture($row["name"], $maxWidth);
        }
    }
    if ($catID > 0) {
        return "/" . config("app.con_static_version") . "/assets/images/noimage_$catID.png";
    }
    return "/" . config("app.con_static_version") . "/assets/images/noimage.png";
}
function getUrlPicture($filename, $width = 0, $source = false)
{
    $timefile = preg_replace("/[^0-9]/", "", $filename);
    if ($width > 0) {
        //return getUrlPictureTest($filename, $width, $source);
        return "/upload/thumb/" . $width . date("/Y/m/", $timefile) . $filename;
    }
    return "/upload/full/" . $filename;
}
function arrayVal($array)
{
    if (!is_array($array)) return array();
    if (isset($array[0]) && empty($array[0]) && count($array) == 1) return array();
    return $array;
}
