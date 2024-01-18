<?php
include "Fetch.php";

header("Content-Type: application/json");

class NewsAPI
{
    private const API_KEY = "YOUR_API_KEY_HERE";

    // Don't Change this
    private const BASE_URL = "https://newsapi.org/v2/";

    public function getEverything($keyword = null, $language = null, $searchIn = null) {
        try {
            if ($keyword === null) {
                return 'keyword parameters are null';
            }
            $endpoint = "everything?";
            if ($keyword !== null) {
                $endpoint .= "q=${keyword}&";
            }
            if ($language !== null) {
                $endpoint .= "language=${language}&";
            }
            if ($searchIn !== null) {
                $endpoint .= "searchIn=${searchIn}&";
            }
        } catch (Exception $e) {
            echo "Error" . $e;
        } finally {
            $fetch = new Fetch();
            return $fetch->fetchData(self::BASE_URL . $endpoint . "apiKey=" . self::API_KEY);
        }
    }
    public function getTopHeadlines($keyword = null, $country = null, $category = null) {
        try {
            $endpoint = "top-headlines?";
            if ($keyword !== null) {
                $endpoint .= "q=${keyword}&";
            }
            if ($country !== null) {
                $endpoint .= "country=${country}&";
            }
            if ($category !== null) {
                $endpoint .= "category=${category}&";
            }

        } catch (Exception $e) {
            echo "Error" . $e;
        } finally {
            $fetch = new Fetch();
            return $fetch->fetchData(self::BASE_URL . $endpoint . "apiKey=" . self::API_KEY);
        }
    }
}
?>