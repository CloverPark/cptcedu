
<?php
$curl = curl_init();
curl_setopt_array($curl, Array(
	CURLOPT_URL            => 'http://feeds.feedburner.com/cptc/homepage',
	CURLOPT_USERAGENT      => 'spider',
	CURLOPT_TIMEOUT        => 120,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_ENCODING       => 'UTF-8'
));
 

$data = curl_exec($curl);
 
curl_close($curl);
 
$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);

foreach ($xml->channel->item as $item) {
	echo "<li>";
	echo "<a href=\"";
	echo $item->link;
	echo "\" class=\"cover\">";
	echo "<h6 class=\"home-stories-title\">";
	echo $item->title;
	echo "</h6>";
	echo "<img src=\"";
	echo $item->description->img['src'];
	echo "\" / >";
	echo "</a>";
	echo "</li>";
	}

?>