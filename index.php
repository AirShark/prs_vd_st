<?php
include "/inc/func.php";

$searchName = "Сплит 2016";

$films = new FindVideo();
$films = $films->kinopoisk($searchName);
//var_dump($films);
/*echo "ID " . $films->result[0]->id."</br>";
echo "Title " . $films->result[0]->title."</br>";
echo "Year " . $films->result[0]->year."</br>";
echo "</hr>";*/

$hdGo = new FindVideo();
//$hdGo = $hdGo->hdgo($films->result[0]->id);
$hdGo = $hdGo->hdgo(930534);
//var_dump($hdGo);

/*<video id="video_1" class="video-js vjs-default-skin" controls data-setup='{}' >
  <source src="https://vjs.zencdn.net/v/oceans.mp4?sd" type='video/mp4' label='SD' res='480' />
  <source src="https://vjs.zencdn.net/v/oceans.mp4?hd" type='video/mp4' label='HD' res='1080'/>
  <source src="https://vjs.zencdn.net/v/oceans.mp4?phone" type='video/mp4' label='phone' res='144'/>
  <source src="https://vjs.zencdn.net/v/oceans.mp4?4k" type='video/mp4' label='4k' res='2160'/>
</video>*/
echo '<link href="/lib/videojs-resolution-switcher.css" media="all" rel="stylesheet" />';
echo '<link href="/lib/video-js.min.css" media="all" rel="stylesheet" />';
echo '<script src="/lib/video.min.js"></script>';
echo "<script src='/lib/videojs-resolution-switcher.js'></script>";
echo '<video id="video_1" class="video-js vjs-default-skin" controls data-setup=\'{}\' >';
echo "<source src='".$hdGo[1][0]."?360p' type='video/mp4' label='360p' res='360' />";
echo "<source src='".$hdGo[1][1]."?480p' type='video/mp4' label='480p' res='480' />";
echo "<source src='".$hdGo[1][2]."?720p' type='video/mp4' label='720p' res='720' />";
echo "<source src='".$hdGo[1][3]."?1080p' type='video/mp4' label='1080p' res='1080' />";
echo "</video>";

/*if (isset($hdGo->error)) {
    echo "Video Not Found";
} else {
    $pars = new FindVideo();
    $pars = $pars->parser($hdGo[0]->iframe_url);
}*/

//$pars = $pars->parser("http://hdgo.cc/video/5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi/14/");
//$pars = $pars->parser("http://1.a8r7oi4dwers.ru/video/5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi/14/");

// DEBUG
//var_dump($pars);
//var_dump($hdGo);

/* NOT DELETE !!!
VLC - :http-user-agent=Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X)
/1/ - 640x290
/2/ - 864x386
/3/ - 1280x546
/4/ - 1920x834

1 - 360p
2 - 480p
3 - 720p
4 - 1080p

user-agent:
Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3
okhttp/3.8.1

----------------------------------------

http://hdgo.cc/api/video.json?token=5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi&kinopoisk_id=817506

[{"title":"Флэш","kinopoisk_id":817506,"world_art_id":null,"type":"serial","quality":"хорошее HD","seasons_count":3,"episodes_count":23,"iframe_url":"http://hdgo.cc/video/serials/5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi/3304/","translator":"LostFilm","trailer":"http://hdgo.cc/video/trailer/5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi/3304/","id_hdgo":3304,"added_at":"2017-05-25 19:39:16"},{"title":"Флэш","kinopoisk_id":817506,"world_art_id":null,"type":"serial","quality":"хорошее HD","seasons_count":3,"episodes_count":23,"iframe_url":"http://hdgo.cc/video/serials/5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi/7968/","translator":"Sunshine Studio (Любительский)","trailer":"http://hdgo.cc/video/trailer/5x8MSjV0D06K1lw6sIDqPVgf99EjUSfi/7968/","id_hdgo":7968,"added_at":"2017-05-24 10:31:42"}]

-----------------------------------------

http://getmovie.cc/037313259a17be837be3bd04a51bf678
http://getmovie.cc/api/kinopoisk.json?id=714888&token=037313259a17be837be3bd04a51bf678

-----------------------------------------

http://api2.zona.mobi/solr/movie/mobi_select/?fl=id%2Cyear%2Crating%2Crating_kinopoisk_count%2Cbackdrop_id%2Ccountry%2Crating_imdb_count%2Cname_original%2Cname_rus%2Cname_eng%2Cname_id%2Cmobi_link_id%2Cruntime%2Cserial%2Cserial_ended%2Cserial_end_year&sort=score+desc%2Cpopularity+desc%2Cseeds+desc&wt=json&rows=60&q=%28%28id%3A @905032@ %29+AND+%28adult%3AF%29%29

http://api2.zona.mobi/solr/movie/mobi_select/?fl=id%2Cyear%2Crating%2Crating_kinopoisk_count%2Cbackdrop_id%2Ccountry%2Crating_imdb_count%2Cname_original%2Cname_rus%2Cname_eng%2Cname_id%2Cmobi_link_id%2Cruntime%2Cserial%2Cserial_ended%2Cserial_end_year&sort=score+desc%2Cpopularity+desc%2Cseeds+desc&wt=json&rows=60&q=%28%28%D0%A1%D0%B4%D0%B5%D0%BB%D0%B0%D0%BD%D0%BD%D1%8B%D0%B9+%D0%B2+%D0%91%D0%B5%D0%B7%D0%B4%D0%BD%D0%B5+%2F+Made+in+Abyss%29+AND+%28adult%3AF%29+AND+%28serial%3Atrue%29+AND+%28year%3A2017%29%29

-----------------------------------------

http://seasonvar.ru/autocomplete.php?query=Made+in+Abyss
http://seasonvar.ru/serial-16240-Sdelano_v_Bezdne.html

POST
http://seasonvar.ru/player.php
type=html5&id=16240&serial_id=10032&secure=989010ce87115283a91cc5d55df107fb

*/