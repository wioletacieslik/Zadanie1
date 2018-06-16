<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crawler</title>
    <link rel="stylesheet" href="crawler.css">
</head>
<body>
<p class="center">Crawler</p>
<form action="">
    <input class="center-block" type="text" name="url"><br>
    <input class="center-block" type="submit" value="Crawl!">
</form>
</body>
</html>
<?php
if (isset($_GET['url'])) {
    $path=$_GET['url'];
    if (!filter_var($path, FILTER_VALIDATE_URL)) {
        echo("$path is not a valid URL");
    }
    else {
        $html = file_get_contents($path);
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $hrefs = $xpath->evaluate("/html/body//a");
        for ($i = 0; $i < $hrefs->length; $i++) {
            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
            if (!strpos($url, '#') !== false && !endsWith($url, 'jpg') !== false &&
                !endsWith($url, 'jpeg') !== false && !endsWith($url, 'bmp') !== false
                && !endsWith($url, 'gif') !== false && !endsWith($url, 'png') !== false) {
                echo '<button class="frame">'.$url.'</button>';
            }
        }
    }
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 ||
        (substr($haystack, -$length) === $needle);
}
?>
