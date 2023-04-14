<!DOCTYPE html>
<html>
<head>
    <title>News | My Portal</title>
</head>
<body>
    <h1>Latest FDA Food Safety Recalls</h1>
    <?php
    class xml {
        public $xml;
        public $res;
    
        function readurl($url,$xpath){
            $xml = simplexml_load_file($url) or die("Failed to load");
            $res = $xml->xpath($xpath);
            return $res; 
        }
    }

    $url = "https://www.fda.gov/about-fda/contact-fda/stay-informed/rss-feeds/food-safety-recalls/rss.xml";
    $xpath = "/rss/channel/item";

    $arr = (new xml())->readurl($url, $xpath);
    foreach ($arr as $node) {
        ?>
        <br>
        <a href="<?= $node->link ?>"<strong><?= $node->title ?></strong></a>
        <br> 
        <?= $node->description ?>
        <br> <br> 
        <small><?= $node->pubDate ?></small>
        <br><hr>
        <?php
    }
    ?>
</body>
</html>
