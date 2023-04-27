<!DOCTYPE html>
<html>
<!--
Andrew Bruckbauer
4/26/2023
CIS 411
Secure Portal Final
-->
<body>
  <h1>News</h1>
  <ul>
      <li><a class="navigation-button" href="Dashboard.php">Dashboard </a></li>
      <li>
        <form method="POST" action="logout.php">
          <button class="navigation-button logout-button" type="submit">Logout</button>
        </form>
      </li>
    </ul>
    <link rel="stylesheet" href="styles.css">
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
