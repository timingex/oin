<?php
$content = file_get_contents("https://www.toutiao.com/c/user/followed/?user_id=5939329092&cursor=0&count=20&_signature=SZBDKxAbFKOM9RumktRrQEmQQz");
$json    = json_decode($content, true);
$mobiles = [];
if($json){
    foreach ($json["data"] as $key => $value) {
        if(isMobile($value["name"])){
            $mobiles[] = $value["name"];
        }
    }
}
var_dump($mobiles);

/**
 * 验证手机号
 *
 * @param [type] $mobile
 * @return boolean
 */
function isMobile($mobile)
{
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^(13[0-9]|14[5|7|8]|14[0|1|4|5|6|7|8|9]|15[0|1|2|3|5|6|7|8|9]|16[2|5|6|7]|17[0-9]|18[0-9]|19[1|8|9])\d{8}$#', $mobile) ? true : false;
}
