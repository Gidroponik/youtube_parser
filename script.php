<?
$url = 'https://www.youtube.com/watch?v=jofNR_WkoCE';
$page = file_get_contents($url);
preg_match_all( "#'RELATED_PLAYER_ARGS': (.+?),


          'BG_P': ?#is", $page, $youtube ); 

$kek = json_decode($youtube[1][0],true);

$kek2 = json_decode($kek['watch_next_response'],true);


$date_publish = $kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][1]['itemSectionRenderer']['contents'][0]['videoDescriptionRenderer']['dateText']['simpleText'];


$disc='';
for($i=0;$i<count($kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][1]['itemSectionRenderer']['contents'][0]['videoDescriptionRenderer']['description']['runs']);$i++)
{
	$disc.=$kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][1]['itemSectionRenderer']['contents'][0]['videoDescriptionRenderer']['description']['runs'][$i]['text'].'';
}

$views = $kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][0]['itemSectionRenderer']['contents'][0]['videoMetadataRenderer']['viewCount']['videoViewCountRenderer']['viewCount']['simpleText'];

$like = $kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][0]['itemSectionRenderer']['contents'][0]['videoMetadataRenderer']['likeButton']['likeButtonRenderer']['likeCount'];

$dislike = $kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][0]['itemSectionRenderer']['contents'][0]['videoMetadataRenderer']['likeButton']['likeButtonRenderer']['dislikeCount'];

$title = $kek2['contents']['twoColumnWatchNextResults']['results']['results']['contents'][0]['itemSectionRenderer']['contents'][0]['videoMetadataRenderer']['title']['runs'][0]['text'];

// Output Array
$arr = [
'title'=>$title,
'desciption'=>$disc,
'likes'=>$like,
'dislikes'=>$dislike,
'views'=>$views
];

exit(json_encode($arr));
?>

