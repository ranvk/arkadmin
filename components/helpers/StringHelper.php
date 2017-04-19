<?php


namespace app\components\helpers;

/**
 * StringHelper
 *
 */
class StringHelper extends \yii\helpers\StringHelper{

    /**
     * 字符串截取，支持中文和其他编码
     * @param string $str 需要转换的字符串
     * @param string $start 开始位置
     * @param string $length 截取长度
     * @param string $charset 编码格式
     * @param string $suffix 截断显示字符
     * @return string
     */
    public static function substr($str, $start=0, $length, $charset="utf-8", $suffix=false) {
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
            if(false === $slice) {
                $slice = '';
            }
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }
        return $suffix ? $slice.'...' : $slice;
    }

    /**
     * @param $time
     * @return string 时间转换
     */
    public static function formatDuration($time)
    {
        static $hourTotalSeconds = 3600;
        static $dayTotalSeconds = 86400;  //3600*24
        static $minuteTotalSeconds = 60;

        $day = floor($time / $dayTotalSeconds);
        $hourSeconds = $time % ($dayTotalSeconds);
        $hour = floor($hourSeconds / $hourTotalSeconds);
        $minuteSeconds = $hourSeconds % $hourTotalSeconds;
        $minute = floor($minuteSeconds / $minuteTotalSeconds);
        $second = $minuteSeconds % $minuteTotalSeconds;

        $timeString = '';

        if ($day > 0) {
            $timeString = $timeString.$day.'天';
        }
        if ($hour > 0) {
            $timeString = $timeString.$hour.'时';
        }
        if ($minute > 0) {
            $timeString = $timeString.$minute.'分';
        }
        if ($second > 0) {
            $timeString = $timeString.$second.'秒';
        }

        return $timeString;
    }
}
