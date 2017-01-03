<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/2
 * Time: 下午4:55
 */

//保存base64字符串为图片
//匹配出图片的格式
$base64_image_content=$_POST['img'];
//$base64_image_content=str_replace('\/', '/',$base64_image_content);
file_put_contents('1.png', str_replace('data:image/png;base64,', '', $base64_image_content));
print $base64_image_content;