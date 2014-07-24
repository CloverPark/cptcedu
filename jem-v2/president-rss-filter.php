
<?php
$curl = curl_init();
curl_setopt_array($curl, Array(
	CURLOPT_URL            => 'http://feeds.feedburner.com/cptc/president',
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
	echo "<div class=\"blog-section\"><h3 class=\"blog-header\">";
	echo $item->title;
	echo "</h3></div>";
	echo "<div class=\"grid blog-row\"><div class=\"col8\">";
	echo "<a href=\"";
	echo $item->link;
	echo "\">";
	echo "<img src=\"";
	echo $item->thumbnail->img['src'];
	echo "\" / >";
	echo "</a>";
	echo "</div>";
	echo "<div class=\"span8\"><p>";
	echo $item->teaser;
	echo "</p>";
	echo "<p><a href=\"";
	echo $item->link;
	echo "\">";
	echo "Read More</a></p></div></div>";
	
	
	}

?>