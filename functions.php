<?php

// 字符自增
function str_inc($str = 'a', $key = -1)
{
	// 初始化
    static $alpha;
    if (empty($alpha)) {
        $alpha['string'] = 'abcdefghijklmnopqrstuvwxyz';
        $alpha['length'] = strlen($alpha['string']);
    }
    
    // 待自增的下标扶正
    if ($key < 0) {
        $key = strlen($str) + $key;
    }
    
    // 获取所替换的字符下标
    $next = strpos($alpha['string'], $str[$key]);
    $next++;
    $next %= $alpha['length'];
    
    // 替换字符
    $str[$key] = $alpha['string'][$next];
    if ($str[$key] == $alpha['string'][0]) {
        $dec = $key - 1;
        if ($dec >= 0) {
            return str_inc($str, $dec);
        } else {
            return $alpha['string'][0] . $str;
        }
    }
    return $str;
}
