<?php
header("Content-Type: application/json");

class HelperAPI {
    public const categoryJSON = array(
        "status" => "ok",
        "title" => "available categories",
        "result" => array(
            "Business" => "business",
            "Entertainment" => "entertainment",
            "General" => "general",
            "Health" => "health",
            "Science" => "science",
            "Sports" => "sports",
            "Technology" => "technology",
        )
    );

    public const countryJSON = array(
        "status" => "ok",
        "title" => "available countries",
        "result" => array(
            "Argentina" => "ar",
            "Austria" => "at",
            "Australia" => "au",
            "Belgium" => "be",
            "Bulgaria" => "bg",
            "Brazil" => "br",
            "Canada" => "ca",
            "Switzerland" => "ch",
            "China" => "cn",
            "Colombia" => "co",
            "Cuba" => "cu",
            "Czech Republic" => "cz",
            "Germany" => "de",
            "Egypt" => "eg",
            "France" => "fr",
            "Greece" => "gr",
            "Hong Kong" => "hk",
            "Hungary" => "hu",
            "Indonesia" => "id",
            "Ireland" => "ie",
            "Israel" => "il",
            "India" => "in",
            "Italy" => "it",
            "Japan" => "jp",
            "South Korea" => "kr",
            "Lithuania" => "lt",
            "Latvia" => "lv",
            "Morocco" => "ma",
            "Mexico" => "mx",
            "Malaysia" => "my",
            "Nigeria" => "ng",
            "Netherlands" => "nl",
            "Norway" => "no",
            "New Zealand" => "nz",
            "Philippines" => "ph",
            "Poland" => "pl",
            "Portugal" => "pt",
            "Romania" => "ro",
            "Serbia" => "rs",
            "Russia" => "ru",
            "Saudi Arabia" => "sa",
            "Sweden" => "se",
            "Singapore" => "sg",
            "Slovenia" => "si",
            "Slovakia" => "sk",
            "South Africa" => "za",
            "Thailand" => "th",
            "Turkey" => "tr",
            "Taiwan" => "tw",
            "Ukraine" => "ua",
            "United Arab Emirates" => "ae",
            "United Kingdom" => "gb",
            "United States" => "us",
            "Venezuela" => "ve",
        )
    );

    public const sortByJSON = array(
        "status" => "ok",
        "title" => "available sort options",
        "result" => array(
            "Relevancy" => "relevancy",
            "Popularity" => "popularity",
            "PublishedAt" => "publishedAt",
        )
    );

    public const searchInJSON = array(
        "status" => "ok",
        "title" => "available search modes",
        "result" => array(
            "Title" => "title",
            "Description" => "description",
            "Content" => "content",
        )
    );

    public const languageJSON = array(
        "status" => "ok",
        "title" => "available languages",
        "result" => array(
            "Arabic" => "ar",
            "Germany" => "de",
            "English" => "en",
            "Spanish" => "es",
            "French" => "fr",
            "Hebrew" => "he",
            "Italian" => "it",
            "Dutch" => "nl",
            "Norwegian" => "no",
            "Portuguese" => "pt",
            "Russian" => "ru",
            "Swedish" => "sv",
            "Chinese" => "zh",
        )
    );

    public function getSearch() {
        return json_encode(self::searchInJSON);
    }

    public function getLanguage() {
        return json_encode(self::languageJSON);
    }

    public function getCategory() {
        return json_encode(self::categoryJSON);
    }

    public function getSort() {
        return json_encode(self::sortByJSON);
    }

    public function getCountries() {
        return json_encode(self::countryJSON);
    }
}

?>