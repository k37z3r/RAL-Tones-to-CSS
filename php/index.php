<?php
/*
RAL-Tones-to-CSS © 2024 by Sven Minio is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International. To view a copy of this license, visit https://creativecommons.org/licenses/by-nc-sa/4.0/
*/
function linearize($color) {
    if ($color <= 0.04045)
        return $color / 12.92;
    else
        return pow(($color + 0.055) / 1.055, 2.4);
}
function normalize($r, $g, $b){
    $r /= 255;
    $g /= 255;
    $b /= 255;
    return array($r, $g, $b);
}
function calcHue($r, $g, $b){
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $d = $max - $min;
    $h = 0;
    if ($d != 0 && $max == $r && $g >= $b)
        $h = 60 * (($g - $b) / $d) + 0;
    elseif ($d != 0 && $max == $r && $g < $b)
        $h = 60 * ((($g - $b) / $d) + 6);
    elseif ($d != 0 && $max == $g)
        $h = 60 * ((($b - $r) / $d) + 2);
    elseif ($d != 0 && $max == $b)
        $h = 60 * ((($r - $g) / $d) + 4);
    return $h;
}
function hex2rgb($hex) {
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    return array($r, $g, $b);
}
function rgbToHsl($r, $g, $b, $dec = 0) {
    list ($r, $g, $b) = normalize($r, $g, $b);
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $l = ($max + $min) / 2;
    $d = $max - $min;
    $h = calcHue($r, $g, $b);
    if($d == 0)
        $s = 0;
    else
        $s = $d / ( 1 - abs( 2 * $l - 1 ) );
    $h = round($h, $dec);
    $s = round($s * 100, $dec);
    $l = round($l * 100, $dec);
    return array($h, $s, $l);
}
function rgbToHwb($r, $g, $b, $dec = 0) {
    list ($r, $g, $b) = normalize($r, $g, $b);
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $w = $min;
    $k = 1 - $max;
    $h = calcHue($r, $g, $b);
    $h = round($h, $dec);
    $w = round($w * 100, $dec);
    $b = round($k * 100, $dec);
    return array($h, $w, $b);
}
function rgbToCmyk($r, $g, $b, $dec = 0){
    list ($r, $g, $b) = normalize($r, $g, $b);
    $k = 1 - max($r, $g, $b);
    $c = (1 - $r - $k) / (1 - $k);
    $m = (1 - $g - $k) / (1 - $k);
    $y = (1 - $b - $k) / (1 - $k);
    $c = round($c * 100, $dec);
    $m = round($m * 100, $dec);
    $y = round($y * 100, $dec);
    $k = round($k * 100, $dec);
    return array($c, $m, $y, $k);
}
function rgbToHsv($r, $g, $b, $dec = 0){
    list ($r, $g, $b) = normalize($r, $g, $b);
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $d = $max - $min;
    $v = $max;
    $h = calcHue($r, $g, $b);
    if ($d == 0)
        $s = 0;
    else
        $s = $d / $max;
   $h = round($h, $dec);
   $s = round($s * 100, $dec);
   $v = round($v * 100, $dec);
   return array($h, $s, $v);
}
function rgbToNcol($r, $g, $b, $dec = 0){
    $hwb = rgbToHwb($r, $g, $b, 8);
    $h = $hwb[0];
    $w = $hwb[1];
    $b = $hwb[2];
    if ($h < 60) 
        $ncol = "R".round($h / 0.6, $dec);
    elseif ($h < 120)
        $ncol = "Y".round(($h - 60) / 0.6, $dec);
    elseif ($h < 180)
        $ncol = "G".round(($h - 120) / 0.6, $dec);
    elseif ($h < 240)
        $ncol = "C".round(($h - 180) / 0.6, $dec);
    elseif ($h < 300)
        $ncol = "B".round(($h - 240) / 0.6, $dec);
    elseif ($h < 360)
        $ncol = "M".round(($h - 300) / 0.6, $dec);
    $w = round($w, $dec);
    $b = round($b, $dec);
    return array($ncol, $w, $b);
}
function rgbToLab($r, $g, $b, $dec = 2) {
    $xyz = rgbToXYZ($r, $g, $b, 8);
    $X = $xyz[0];
    $Y = $xyz[1];
    $Z = $xyz[2];
    $X /= 0.95047;
    $Y /= 1.00000;
    $Z /= 1.08883;
    $x = ($X > 0.008856) ? pow($X, (1/3)) : (7.787 * $X + 16/116);
    $y = ($Y > 0.008856) ? pow($Y, (1/3)) : (7.787 * $Y + 16/116);
    $z = ($Z > 0.008856) ? pow($Z, (1/3)) : (7.787 * $Z + 16/116);
    $L = (116 * $y) - 16;
    $a = 500 * ($x - $y);
    $b = 200 * ($y - $z);
    $L = round($L, $dec);
    $a = round($a, $dec);
    $b = round($b, $dec);
    return array($L, $a, $b);
}
function rgbToXYZ($r, $g, $b, $dec = 2) {
    list ($r, $g, $b) = normalize($r, $g, $b);
    $R = linearize($r);
    $G = linearize($g);
    $B = linearize($b);
    $X = $R * 0.4124 + $G * 0.3576 + $B * 0.1805;
    $Y = $R * 0.2126 + $G * 0.7152 + $B * 0.0722;
    $Z = $R * 0.0193 + $G * 0.1192 + $B * 0.9505;
    $X = round($X, $dec);
    $Y = round($Y, $dec);
    $Z = round($Z, $dec);
    return array($X, $Y, $Z);
}
function rgbToxyY($r, $g, $b, $dec = 2){
    $xyz = rgbToXYZ($r, $g, $b, 8);
    $X = $xyz[0];
    $Y = $xyz[1];
    $Z = $xyz[2];
    $x = $X / ($X + $Y + $Z + 0.00001);
    $y = $Y / ($X + $Y + $Z + 0.00001);
    $x = round($x, $dec);
    $y = round($y, $dec);
    $Y = round($Y, $dec);
    return array($x, $y, $Y);
}
function rgbToLch($r, $g, $b, $dec = 2) {
    $xyz = rgbToXYZ($r, $g, $b, 8);
    $X = $xyz[0];
    $Y = $xyz[1];
    $Z = $xyz[2];
    $xy = rgbToxyY($r, $g, $b, 8);
    $x = $xy[0];
    $y = $xy[1];
    $L = 116 * pow($Y, 1/3) - 16;
    $C = sqrt(pow($x - (1 / 3), 2) + pow($y - (1 / 3), 2)) * sqrt(pow(25, 2) / (pow($x - (1 / 3), 2) + pow($y - (1 / 3), 2) + 3 * pow((1 / 3), 2)));
    $h = atan2($y - (1 / 3), $x - (1 / 3));
    $h = rad2deg($h);
    if ($h < 0)
        $h += 360;
    $L = round($L, $dec);
    $C = round($C, $dec);
    $h = round($h, $dec);
    return array($L, $C, $h);
}
function hexToName($hex){
    $names = array('IndianRed' => '#CD5C5C', 'LightCoral' => '#F08080', 'Salmon' => '#FA8072', 'DarkSalmon' => '#E9967A', 'LightSalmon' => '#FFA07A', 'Crimson' => '#DC143C', 'Red' => '#FF0000', 'FireBrick' => '#B22222', 'DarkRed' => '#8B0000', 'Pink' => '#FFC0CB', 'LightPink' => '#FFB6C1', 'HotPink' => '#FF69B4', 'DeepPink' => '#FF1493', 'MediumVioletRed' => '#C71585', 'PaleVioletRed' => '#DB7093', 'LightSalmon' => '#FFA07A', 'Coral' => '#FF7F50', 'Tomato' => '#FF6347', 'OrangeRed' => '#FF4500', 'DarkOrange' => '#FF8C00', 'Orange' => '#FFA500', 'Gold' => '#FFD700', 'Yellow' => '#FFFF00', 'LightYellow' => '#FFFFE0', 'LemonChiffon' => '#FFFACD', 'LightGoldenrodYellow' => '#FAFAD2', 'PapayaWhip' => '#FFEFD5', 'Moccasin' => '#FFE4B5', 'PeachPuff' => '#FFDAB9', 'PaleGoldenrod' => '#EEE8AA', 'Khaki' => '#F0E68C', 'DarkKhaki' => '#BDB76B', 'Lavender' => '#E6E6FA', 'Thistle' => '#D8BFD8', 'Plum' => '#DDA0DD', 'Violet' => '#EE82EE', 'Orchid' => '#DA70D6', 'Fuchsia' => '#FF00FF', 'Magenta' => '#FF00FF', 'MediumOrchid' => '#BA55D3', 'MediumPurple' => '#9370DB', 'RebeccaPurple' => '#663399', 'BlueViolet' => '#8A2BE2', 'DarkViolet' => '#9400D3', 'DarkOrchid' => '#9932CC', 'DarkMagenta' => '#8B008B', 'Purple' => '#800080', 'Indigo' => '#4B0082', 'SlateBlue' => '#6A5ACD', 'DarkSlateBlue' => '#483D8B', 'MediumSlateBlue' => '#7B68EE', 'GreenYellow' => '#ADFF2F', 'Chartreuse' => '#7FFF00', 'LawnGreen' => '#7CFC00', 'Lime' => '#00FF00', 'LimeGreen' => '#32CD32', 'PaleGreen' => '#98FB98', 'LightGreen' => '#90EE90', 'MediumSpringGreen' => '#00FA9A', 'SpringGreen' => '#00FF7F', 'MediumSeaGreen' => '#3CB371', 'SeaGreen' => '#2E8B57', 'ForestGreen' => '#228B22', 'Green' => '#008000', 'DarkGreen' => '#006400', 'YellowGreen' => '#9ACD32', 'OliveDrab' => '#6B8E23', 'Olive' => '#808000', 'DarkOliveGreen' => '#556B2F', 'MediumAquamarine' => '#66CDAA', 'DarkSeaGreen' => '#8FBC8B', 'LightSeaGreen' => '#20B2AA', 'DarkCyan' => '#008B8B', 'Teal' => '#008080', 'Aqua' => '#00FFFF', 'Cyan' => '#00FFFF', 'LightCyan' => '#E0FFFF', 'PaleTurquoise' => '#AFEEEE', 'Aquamarine' => '#7FFFD4', 'Turquoise' => '#40E0D0', 'MediumTurquoise' => '#48D1CC', 'DarkTurquoise' => '#00CED1', 'CadetBlue' => '#5F9EA0', 'SteelBlue' => '#4682B4', 'LightSteelBlue' => '#B0C4DE', 'PowderBlue' => '#B0E0E6', 'LightBlue' => '#ADD8E6', 'SkyBlue' => '#87CEEB', 'LightSkyBlue' => '#87CEFA', 'DeepSkyBlue' => '#00BFFF', 'DodgerBlue' => '#1E90FF', 'CornflowerBlue' => '#6495ED', 'MediumSlateBlue' => '#7B68EE', 'RoyalBlue' => '#4169E1', 'Blue' => '#0000FF', 'MediumBlue' => '#0000CD', 'DarkBlue' => '#00008B', 'Navy' => '#000080', 'MidnightBlue' => '#191970', 'Cornsilk' => '#FFF8DC', 'BlanchedAlmond' => '#FFEBCD', 'Bisque' => '#FFE4C4', 'NavajoWhite' => '#FFDEAD', 'Wheat' => '#F5DEB3', 'BurlyWood' => '#DEB887', 'Tan' => '#D2B48C', 'RosyBrown' => '#BC8F8F', 'SandyBrown' => '#F4A460', 'Goldenrod' => '#DAA520', 'DarkGoldenrod' => '#B8860B', 'Peru' => '#CD853F', 'Chocolate' => '#D2691E', 'SaddleBrown' => '#8B4513', 'Sienna' => '#A0522D', 'Brown' => '#A52A2A', 'Maroon' => '#800000', 'White' => '#FFFFFF', 'Snow' => '#FFFAFA', 'HoneyDew' => '#F0FFF0', 'MintCream' => '#F5FFFA', 'Azure' => '#F0FFFF', 'AliceBlue' => '#F0F8FF', 'GhostWhite' => '#F8F8FF', 'WhiteSmoke' => '#F5F5F5', 'SeaShell' => '#FFF5EE', 'Beige' => '#F5F5DC', 'OldLace' => '#FDF5E6', 'FloralWhite' => '#FFFAF0', 'Ivory' => '#FFFFF0', 'AntiqueWhite' => '#FAEBD7', 'Linen' => '#FAF0E6', 'LavenderBlush' => '#FFF0F5', 'MistyRose' => '#FFE4E1', 'Gainsboro' => '#DCDCDC', 'LightGray' => '#D3D3D3', 'Silver' => '#C0C0C0', 'DarkGray' => '#A9A9A9', 'Gray' => '#808080', 'DimGray' => '#696969', 'LightSlateGray' => '#778899', 'SlateGray' => '#708090', 'DarkSlateGray' => '#2F4F4F', 'Black' => '#000000');
    foreach($names as $key => $value){
        if($value == $hex)
            return $key;
    }
    return "-";
}
$ral = array('--ral1000' => '#CDBA88', '--ral1001' => '#D0B084', '--ral1002' => '#D2AA6D', '--ral1003' => '#F9A800', '--ral1004' => '#E2B007', '--ral1005' => '#CB8E00', '--ral1006' => '#E29000', '--ral1007' => '#E88C00', '--ral1011' => '#AF8A54', '--ral1012' => '#D9C022', '--ral1013' => '#E3D9C6', '--ral1014' => '#DDC49A', '--ral1015' => '#E6D2B5', '--ral1016' => '#EAF044', '--ral1017' => '#F4B752', '--ral1018' => '#F3E03B', '--ral1019' => '#A4957D', '--ral1020' => '#9A9464', '--ral1021' => '#F6B600', '--ral1022' => '#FFFF66', '--ral1023' => '#F7B500', '--ral1024' => '#B89C50', '--ral1026' => '#FFFF00', '--ral1027' => '#A38C15', '--ral1028' => '#FF9B00', '--ral1032' => '#E2A300', '--ral1033' => '#FAAB21', '--ral1034' => '#EDAB56', '--ral1035' => '#A29985', '--ral1036' => '#927549', '--ral1037' => '#EEA205', '--ral1039' => '#CEC19E', '--ral1040' => '#BBAC81', '--ral2000' => '#DA6E00', '--ral2001' => '#BA481B', '--ral2002' => '#C63927', '--ral2003' => '#FA842B', '--ral2004' => '#E75B12', '--ral2005' => '#FF4912', '--ral2006' => '#FFA500', '--ral2007' => '#FFA421', '--ral2008' => '#ED6B21', '--ral2009' => '#E15501', '--ral2010' => '#D4652F', '--ral2011' => '#E26E0E', '--ral2012' => '#DB6A50', '--ral2013' => '#954527', '--ral2017' => '#FA4402', '--ral3000' => '#A72920', '--ral3001' => '#9B2423', '--ral3002' => '#9B2321', '--ral3003' => '#861A22', '--ral3004' => '#6B1C23', '--ral3005' => '#59191F', '--ral3007' => '#3E2022', '--ral3009' => '#6D332C', '--ral3011' => '#7E292C', '--ral3012' => '#CB8D73', '--ral3013' => '#9C322E', '--ral3014' => '#D47479', '--ral3015' => '#D79FA6', '--ral3016' => '#AC4034', '--ral3017' => '#D3545F', '--ral3018' => '#D14152', '--ral3019' => '#FF2A1B', '--ral3020' => '#BB1E10', '--ral3022' => '#CC6855', '--ral3024' => '#FF2D21', '--ral3026' => '#FF0000', '--ral3027' => '#B42041', '--ral3028' => '#CC2C24', '--ral3030' => '#FF4500', '--ral3031' => '#A63437', '--ral3032' => '#711521', '--ral3033' => '#B24C43', '--ral4000' => '#60007F', '--ral4001' => '#8A5A83', '--ral4002' => '#933D50', '--ral4003' => '#C45F8C', '--ral4004' => '#691639', '--ral4005' => '#83639D', '--ral4006' => '#992572', '--ral4007' => '#4A203B', '--ral4008' => '#884D84', '--ral4009' => '#A38995', '--ral4010' => '#C63678', '--ral4011' => '#8773A1', '--ral4012' => '#6B6880', '--ral5000' => '#384E6F', '--ral5001' => '#0F4C64', '--ral5002' => '#00387B', '--ral5003' => '#2A3756', '--ral5004' => '#191E28', '--ral5005' => '#005387', '--ral5007' => '#41678D', '--ral5008' => '#313C48', '--ral5009' => '#2E5978', '--ral5010' => '#004F7C', '--ral5011' => '#1A2B3C', '--ral5012' => '#3481B8', '--ral5013' => '#193153', '--ral5014' => '#6C7C98', '--ral5015' => '#2874B2', '--ral5016' => '#0000FF', '--ral5017' => '#005A8C', '--ral5018' => '#21888F', '--ral5019' => '#1A5784', '--ral5020' => '#0B4151', '--ral5021' => '#07737A', '--ral5022' => '#222D5A', '--ral5023' => '#4D668E', '--ral5024' => '#6A93B0', '--ral5025' => '#296478', '--ral5026' => '#102C54', '--ral6000' => '#3C7460', '--ral6001' => '#366735', '--ral6002' => '#325928', '--ral6003' => '#50533C', '--ral6004' => '#024442', '--ral6005' => '#114232', '--ral6006' => '#3C392E', '--ral6007' => '#2C3222', '--ral6008' => '#37342A', '--ral6009' => '#27352A', '--ral6010' => '#4D6F39', '--ral6011' => '#6C7C59', '--ral6012' => '#303D3A', '--ral6013' => '#7D765A', '--ral6014' => '#474135', '--ral6015' => '#3D3D36', '--ral6016' => '#00694C', '--ral6017' => '#587F40', '--ral6018' => '#61993B', '--ral6019' => '#B9CEAC', '--ral6020' => '#37422F', '--ral6021' => '#8A9977', '--ral6022' => '#3A3327', '--ral6023' => '#32CD32', '--ral6024' => '#008351', '--ral6025' => '#5E6E3B', '--ral6026' => '#005F4E', '--ral6027' => '#7EBAB5', '--ral6028' => '#315442', '--ral6029' => '#006F3D', '--ral6030' => '#00FF00', '--ral6031' => '#485746', '--ral6032' => '#237F52', '--ral6033' => '#46877F', '--ral6034' => '#7AACAC', '--ral6035' => '#194D25', '--ral6036' => '#04574B', '--ral6037' => '#008B29', '--ral6038' => '#00B51A', '--ral6039' => '#B3C53F', '--ral6040' => '#827E58', '--ral7000' => '#7A888E', '--ral7001' => '#8F999F', '--ral7002' => '#817863', '--ral7003' => '#7A7669', '--ral7004' => '#9B9B9B', '--ral7005' => '#6B716F', '--ral7006' => '#756F61', '--ral7008' => '#745E3D', '--ral7009' => '#5D6058', '--ral7010' => '#585C56', '--ral7011' => '#555D61', '--ral7012' => '#575D5E', '--ral7013' => '#575044', '--ral7015' => '#51565C', '--ral7016' => '#383E42', '--ral7017' => '#696969', '--ral7018' => '#2E3236', '--ral7019' => '#2f363b', '--ral7020' => '#646464', '--ral7021' => '#2F3234', '--ral7022' => '#4B4D46', '--ral7023' => '#818479', '--ral7024' => '#474A50', '--ral7025' => '#808080', '--ral7026' => '#374244', '--ral7027' => '#7B765E', '--ral7028' => '#B2997A', '--ral7030' => '#939388', '--ral7031' => '#5B686D', '--ral7032' => '#B5B0A1', '--ral7033' => '#818979', '--ral7034' => '#91886F', '--ral7035' => '#CBD0CC', '--ral7036' => '#9A9697', '--ral7037' => '#7A7B7A', '--ral7038' => '#B4B8B0', '--ral7039' => '#6B685E', '--ral7040' => '#9DA3A6', '--ral7042' => '#8F9695', '--ral7043' => '#4E5451', '--ral7044' => '#BDBDB2', '--ral7045' => '#8D9194', '--ral7046' => '#82898E', '--ral7047' => '#CFD0CF', '--ral7048' => '#888175', '--ral7050' => '#82887A', '--ral8000' => '#89693E', '--ral8001' => '#99622D', '--ral8002' => '#794D3E', '--ral8003' => '#7E4B26', '--ral8004' => '#8F4E35', '--ral8007' => '#6F4A2F', '--ral8008' => '#6E4A23', '--ral8010' => '#9F8441', '--ral8011' => '#5A3A29', '--ral8012' => '#66332B', '--ral8014' => '#4A3526', '--ral8015' => '#633A34', '--ral8016' => '#492A1F', '--ral8017' => '#442F29', '--ral8019' => '#3F3A3A', '--ral8020' => '#CFAF7F', '--ral8022' => '#211F20', '--ral8023' => '#A65E2F', '--ral8024' => '#765038', '--ral8025' => '#755C49', '--ral8026' => '#A52A2A', '--ral8027' => '#504938', '--ral8028' => '#4E3B2B', '--ral8029' => '#773C27', '--ral8031' => '#B49D7B', '--ral9001' => '#E9E0D2', '--ral9002' => '#D7D5CB', '--ral9003' => '#F4F8F4', '--ral9004' => '#2E3032', '--ral9005' => '#0E0E10', '--ral9006' => '#A1A1A0', '--ral9007' => '#878683', '--ral9010' => '#F7F9EF', '--ral9011' => '#292C2F', '--ral9012' => '#FFFDE6', '--ral9013' => '#F1ECE1', '--ral9014' => '#FFD700', '--ral9016' => '#F7FBF5', '--ral9017' => '#2A2D2F', '--ral9018' => '#C7CAC3', '--ral9019' => '#F1F0EA', '--ral9020' => '#FDFDFD', '--ral9021' => '#01050E', '--ral9022' => '#9C9C9C', '--ral9023' => '#7E8182');
$str = '<html>
    <head>
        <style>
            body {
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                   -moz-box-pack: center;
                    -ms-flex-pack: center;
                        justify-content: center;
                -webkit-box-align: start;
                -webkit-align-items: flex-start;
                   -moz-box-align: start;
                    -ms-flex-align: start;
                        align-items: flex-start;
                -webkit-flex-wrap: nowrap;
                    -ms-flex-wrap: nowrap;
                        flex-wrap: nowrap;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -webkit-flex-direction: row;
                   -moz-box-orient: horizontal;
                   -moz-box-direction: normal;
                    -ms-flex-direction: row;
                        flex-direction: row;
            }
            body > table {
                border: 3px solid #000000;
                text-align: left;
                border-collapse: collapse;
            }
            body > table > thead {
                background: #CFCFCF;
                background: -webkit-gradient(linear, left top, left bottom, from(#dbdbdb), color-stop(66%, #d3d3d3), to(#CFCFCF));
                background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                background: -o-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
                border-bottom: 3px solid #000000;
            }
            body > table > thead > tr > th {
                border: 1px solid #000000;
                padding: 5px 4px;
                font-size: 15px;
                font-weight: bold;
                color: #000000;
                text-align: center;
            }
            body > table > tbody > tr > td {
                border: 1px solid #000000;
                padding: 5px 4px;
                font-size: 14px;
                height: 28px;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>RAL</th>
                    <th>Sample</th>
                    <th>HEX</th>
                    <th>RGB</th>
                    <th>HSL</th>
                    <th>HWB</th>
                    <th>HSV</th>
                    <th>CMYK</th>
                    <th>NCOL</th>
                    <th>XYZ</th>
                    <th>L*a*b*</th>
                    <th>xyY</th>
                    <th>LCh</th>
                    <th>HTML/CSS Colorname</th>
                </tr>
            </thead>
            <tbody>';
foreach($ral as $key => $value){
    $ralcode = $key;
    $ralcode = str_replace('--ral', 'RAL ', $ralcode);
    $rgb = hex2rgb($value);
    $hsl = rgbToHsl($rgb[0], $rgb[1], $rgb[2]);
    $hwb = rgbToHwb($rgb[0], $rgb[1], $rgb[2]);
    $hsv = rgbToHsv($rgb[0], $rgb[1], $rgb[2]);
    $cmyk = rgbToCmyk($rgb[0], $rgb[1], $rgb[2]);
    $ncol = rgbToNcol($rgb[0], $rgb[1], $rgb[2]);
    $xyz = rgbToXYZ($rgb[0], $rgb[1], $rgb[2]);
    $lab = rgbToLab($rgb[0], $rgb[1], $rgb[2]);
    $lch = rgbToLch($rgb[0], $rgb[1], $rgb[2]);
    $xyy = rgbToxyY($rgb[0], $rgb[1], $rgb[2]);
    $str .= '                <tr>
                    <td>'.$ralcode.'</td>
                    <td style="background-color: '.$value.';"></td>
                    <td>'.$value.'</td>
                    <td>'.$rgb[0].', '.$rgb[1].', '.$rgb[2].'</td>
                    <td>'.$hsl[0].'deg, '.$hsl[1].'%, '.$hsl[2].'%</td>
                    <td>'.$hwb[0].'deg, '.$hwb[1].'%, '.$hwb[2].'%</td>
                    <td>'.$hsv[0].'deg, '.$hsv[1].'%, '.$hsv[2].'%</td>
                    <td>'.$cmyk[0].', '.$cmyk[1].', '.$cmyk[2].', '.$cmyk[3].'</td>
                    <td>'.$ncol[0].', '.$ncol[1].'%, '.$ncol[2].'%</td>
                    <td>'.$xyz[0].', '.$xyz[1].', '.$xyz[2].'</td>
                    <td>'.$lab[0].', '.$lab[1].', '.$lab[2].'</td>
                    <td>'.$xyy[0].', '.$xyy[1].', '.$xyy[2].'</td>
                    <td>'.$lch[0].', '.$lch[1].', '.$lch[2].'</td>
                    <td>'.hexToName($value).'</td>
                </tr>
';
}
$str .= '           </tbody>
        </table>
    </body>
</html>';
echo $str;
?>
