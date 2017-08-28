<?php
ini_set("user_agent","Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X)");

class FindVideo {

public $json_kp = "";
public $nameFilm = "";
public $idKinoPoisk = "";
public $str_json = "";

function kinopoisk($nameFilm){
    $json_kp = json_decode(file_get_contents('http://kparser.pp.ua/json/search/'.$nameFilm));
    return $json_kp;
}

function hdgo($idKinoPoisk){
    $json_hdgo = json_decode(file_get_contents('http://hdgo.cc/api/video.json?token=5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi&kinopoisk_id='.$idKinoPoisk));

    if (isset($json_hdgo->error)) {
        echo "Video Not Found";
    } else {
        $json_hdgo = $this->parser($json_hdgo[0]->iframe_url);
    }
    return $json_hdgo;
}

function parser($url){
    $options  = array('http' => array('user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X)'));
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    preg_match('/iframe src="http:\/\/.*\/"/', $response , $iframe );
    $iframe = substr(substr($iframe[0], 12),0,-1);

    $text = file_get_contents($iframe);
    preg_match('/media: \[\{url:.*/', $text , $title );
    preg_match_all("/url\s*:\s*'([^']+)'/", $title[0], $text);
    return $text;
    //var_dump($text);

//--------------------------------------------------
    // :http-user-agent=Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X)
    //цикл: пока не прошли весь массив ссылок, либо пока не скачали макс. количество файлов (не действет в случае 0)
    /*for($i=0; ($i<sizeof($links)&&($cnt<$maxPages||$maxPages==0)); $i++){
	        //если в ссылке есть нужное нам расширение
	        if (strpos($links[$i], $types)!==false){
		    //то открываем файл, "курлим" в него содержимое файла на сервере, закрываем, увеличиваем счётчик
		    //$fp = fopen($links[$i], 'w');
		    //curl_get($host.$links[$i], $url, $fp);
		    //fclose($fp);
		    //$cnt++;
	    } else {
		    //иначе это ещё одна ссылка, перейдём по ней, найдём все ссылки и занесём их в массив
		    $page = curl_get($links[$i], $url);
		    preg_match_all('#href="([A-z0-9.-]+)"#', $page, $matches);
		    $links = array_merge($links, $matches[1]);
	    }
    }*/
    //curl_close($ch);
//-------------------------------------------------
}

}