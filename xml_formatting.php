<?php
ini_set('pcre.backtrack_limit', 10000000);
ini_set('pcre.recursion_limit', 10000000);
date_default_timezone_set('Europe/Paris');
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
	setlocale(LC_ALL, '');
}
$xmlTmp = '';
foreach($_FILES as $file) {
	$xmlTmp=file_get_contents($file['tmp_name']);
}
$pattern = '~<session\s*type="start"\s*time="(?P<start>\d+)"\s*ms="\d*"\s*medium="GOOGLE"\s*to="(?P<to>.*?)"\s*from="(?P<fril>.*?)"/>(?P<messages>.*?)<session type="stop"\s*time="(?P<end>\d*)"~ums';
preg_match_all($pattern,$xmlTmp,$sessions,PREG_SET_ORDER);

$format_date_session = '%A %d %B %Y %H:%I';
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    $format_date_session = preg_replace('#(?<!%)((?:%%)*)%e#', '\1%#d', $format_date_session);
}



foreach($sessions as $session) {
	$xmlOut.='<h5 style="color:#F00">'.utf8_encode(strftime($format_date_session,$session['start']))."</h5>";
	$pattern = '~<message\s*type="(?:[_\w]*)"\s*time="(?P<time>\d+)"(?:.*?)from_display="(?P<from>.*?)"\s*text="(?P<text>.*?)"~ums';
	preg_match_all($pattern,$session['messages'],$messages,PREG_SET_ORDER);
	foreach($messages as $message) {
		$xmlOut.='<p><strong>'.date('H:i',$message['time']).' - '.urldecode($message['from']).'</strong> - '.urldecode($message['text']).'</p>';
	}
	$xmlOut.='<br />';
}
