<?php

$token = 'a24f5e868dd6e843f246477c702789fdc5507f46712c2ecc2f3a463bcc3f8200be34cacf43def11292984';


$group_id = '182436277';
$album_id = '262083116';



$v = '5.90'; //версия vk api
 $image_path = dirname(__FILE__).'/test_name.jpg'; 
// //$post_data = array("file1" => '@'.$image_path);
// $post_data = array('file1' => new CURLFile($image_path["file"]["111.jpg"]));

// $img = '6N_oFJFmULg.jpg'; 

// $post['file'] = new CURLFile($full_path.''.$img);

// print_r($post);

// $file='https://pp.userapi.com/c846322/v846322983/152517/8So8SULXBlk.jpg';
// copy($file,'wall1.jpg');
// $lala = "wall1.jpg";
// echo($lala);
// $cfile = curl_file_create($lala,'image/jpeg','test_name.jpg');

// $postparam = array("file1"=>$cfile);

// print_r($postparam);



// $cfile = curl_file_create('test_name.jpg','image/png','testpic');

// $imgdata = array('myimage' => $cfile);

// print_r($imgdata);



// получаем урл для загрузки
 $url = file_get_contents("https://api.vk.com/method/photos.getUploadServer?album_id=".$album_id."&group_id=".$group_id."&v=".$v."&access_token=".$token);
//  echo($url);
 $url = json_decode($url)->response->upload_url;
 //print_r($url);



// copy($file,'./tempimg.jpg');
// $lala = "./tempimg.jpg";
// $cfile = curl_file_create($lala,'image/jpeg','test_name.jpg');
// $postparam = array("file1"=>$cfile);

//$json = json_decode(curl_exec($ch));

// curl_close($ch);
// unlink('./6N_oFJFmULg.jpg');

// print_r($postparam);

// echo($url);



//orig

// $ch = curl_init($server);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS,$postparam);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data; charset=UTF-8'));
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,10); 
// curl_setopt($ch, CURLOPT_TIMEOUT, 10);
// $json = json_decode(curl_exec($ch));
// curl_close($ch);
// unlink('./tempimg.jpg');





print_r($url);

// отправка post картинки

$postparam = Array('file1'=>new \CURLFile($image_path));


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postparam);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data; charset=UTF-8'));

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,10); 
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$result = json_decode(curl_exec($ch),true);
print_r($result);
curl_close($ch);
//  unlink('wall1.jpg');


// сохраняем
$safe = file_get_contents("https://api.vk.com/method/photos.save?server=".$result['server']."&photos_list=".$result['photos_list']."&album_id=".$result['aid']."&hash=".$result['hash']."&gid=".$group_id."&v=".$v."&access_token=".$token);
$safe = json_decode($safe,true);
 print_r($safe);
// итог
/*делаем этот файл как обработчик, загружаем картинку на сервер после этого передаем название картинки файлу и загружаем в альбом группы далее после успешной загрузки можно будет сразу же делать например wall.post урок есть несколько видео назад напрямую после загрузки уже есть готовый id изображения для wall.post :) спасибо за просмотр надеюсь, что помог ставь лайк делись и подписывайся! будет еще много годноты*/
?>





