<?php
include "src/NewsAPI.php";
include "src/Logger.php";
include "src/Helper.php";

// For CORS policy

header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

// Creating Object
$newsAPI = new NewsAPI();
$helper = new HelperAPI();


// To Limit with specific domain names
$allowedDomains = array('localhost:5500', 'http://127.0.0.1:5500/');
$httpHost = $_SERVER['HTTP_HOST'];

if (in_array($httpHost, $allowedDomains)) {
ErrorLogger::logError("Access granted for $httpHost" . PHP_EOL);
try {
    if (isset($_GET['topHeadlines'])) {
        $keyword = (isset($_GET['topHeadlines'])) ? $_GET['topHeadlines'] : null;
        $country = (isset($_GET['country'])) ? $_GET['country'] : "in";
        $category = (isset($_GET['category'])) ? $_GET['category'] : null;
        $result = $newsAPI->getTopHeadlines($keyword, $country, $category);
    } elseif (isset($_GET['everything'])) {
        $keyword = (isset($_GET['everything'])) ? $_GET['everything'] : "India";
        $language = (isset($_GET['language'])) ? $_GET['language'] : null;
        $searchIn = (isset($_GET['searchIn'])) ? $_GET['searchIn'] : null;
        $result = $newsAPI->getEverything($keyword, $language, $searchIn);
    } elseif (isset($_GET['getSearchOptions'])) {
        $result = $helper->getSearch();
    } elseif (isset($_GET['getLanguageOptions'])) {
        $result = $helper->getLanguage();
    } elseif (isset($_GET['getCategoryOptions'])) {
        $result = $helper->getCategory();
    } elseif (isset($_GET['getSortOptions'])) {
        $result = $helper->getSort();
    } elseif (isset($_GET['getCountriesOptions'])) {
        $result = $helper->getCountries();
    } elseif ($_REQUEST !== 'GET' || $_REQUEST !== 'POST') {
        $result = "Nothing to display";
    }
} catch (Exception $e) {
    ErrorLogger::logError("Error in get method, index.php" . $e);
}
} else {
    $result = "Access denied for $httpHost";
}

echo $result;
?>