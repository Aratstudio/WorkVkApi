
<?php
// // VK API-Урок загрузка фото в альбом группы через PHP и CURL
// // Только STANDALONE TOKEN
$token = 'a24f5e868dd6e843f246477c702789fdc5507f46712c2ecc2f3a463bcc3f8200be34cacf43def11292984';


$group_id = '182436277';
$album_id = '262083116';
$v = '5.90'; //версия vk api
$image_path = dirname(__FILE__).'/111.jpg'; 
$post_data = array("file1" => '@'.$image_path);

// получаем урл для загрузки
 $url = file_get_contents("https://api.vk.com/method/photos.getUploadServer?album_id=".$album_id."&group_id=".$group_id."&v=".$v."&access_token=".$token);
 echo($url);
 $url = json_decode($url)->response->upload_url;
print_r($url);

echo($url);

// отправка post картинки
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$result = json_decode(curl_exec($ch),true);
print_r($result);

// сохраняем
$safe = file_get_contents("https://api.vk.com/method/photos.save?server=".$result['server']."&photos_list=".$result['photos_list']."&album_id=".$result['aid']."&hash=".$result['hash']."&gid=".$group_id."&access_token=".$token);
$safe = json_decode($safe,true);
print_r($safe);
// итог
/*делаем этот файл как обработчик, загружаем картинку на сервер после этого передаем название картинки файлу и загружаем в альбом группы далее после успешной загрузки можно будет сразу же делать например wall.post урок есть несколько видео назад напрямую после загрузки уже есть готовый id изображения для wall.post :) спасибо за просмотр надеюсь, что помог ставь лайк делись и подписывайся! будет еще много годноты*/
?>




<!-- friend a24f5e868dd6e843f246477c702789fdc5507f46712c2ecc2f3a463bcc3f8200be34cacf43def11292984 -->