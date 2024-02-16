import express from "express";
import newsApi from "./src/newsApi.mjs";
import { processenv } from "processenv2";
import fs from "fs";

import {
  categoryJson,
  countryJson,
  sortByJson,
  searchInJson,
  languageJson,
} from "./src/helper.mjs";

const HomePath = processenv();

try {
  if (HomePath.API_KEY === "Your_API_Key" || HomePath.API_KEY === undefined) {
    console.log("You need to have .env file with API_KEY from newsapi");
    process.exit(1);
  }
} catch (error) {
  console.error(error);
}

const news = new newsApi(HomePath.API_KEY);

const app = express();
const port = 3000;

app.get("/", (req, res) => {
  res.json({
    status: "ok",
    result: "Welcome to Unofficial NewsAPI library",
  });
});

let responseResult = {
  status: "ok",
};
app.get("/help", (req, res) => {
  let q = req.query.q;
  try {
    if (q === "getCategory") {
      responseResult.title = categoryJson.title;
      responseResult.result = categoryJson.result;
    } else if (q === "getCountry") {
      responseResult.title = countryJson.title;
      responseResult.result = countryJson.result;
    } else if (q === "getSort") {
      responseResult.title = sortByJson.title;
      responseResult.result = sortByJson.result;
    } else if (q === "getSearch") {
      responseResult.title = searchInJson.title;
      responseResult.result = searchInJson.result;
    } else if (q === "getlanguage") {
      responseResult.title = languageJson.title;
      responseResult.result = languageJson.result;
    } else {
      responseResult.title = "Boohoo! Wrong Terittory!";
    }
  } catch (error) {
    console.log(error);
  } finally {
    console.log(responseResult);
    res.json(responseResult);
  }
});

app.get("/sources", (req, res) => {
  const jsonFile = JSON.parse(fs.readFileSync("./sources.json"));
  res.json({
    status: "ok",
    result: jsonFile,
  });
});

app.get("/getEverything", async (req, res) => {
  const query = req.query.q;
  if (!query) {
    res.send("You need to provide something with q parameter");
    return;
  }
  const searchIn = req.query.searchIn;
  const language = req.query.language;
  const sortBy = req.query.sortBy;
  const pageSize = req.query.pageSize;
  res.json(
    (responseResult.result = await news.getEverything(
      query,
      searchIn,
      language,
      sortBy,
      pageSize
    ))
  );
});

app.get("/getTopHeadlines", async (req, res) => {
  const query = req.query.q;
  const country = req.query.searchIn;
  const category = req.query.language;
  const sortBy = req.query.sortBy;
  const pageSize = req.query.pageSize;
  const page = req.query.page;
  res.json(
    (responseResult.result = await news.getTopHeadlines(
      query,
      country,
      category,
      sortBy,
      pageSize,
      page
    ))
  );
});

app.listen(port, () => {
  console.log(`App started on http://localhost:${port}`);
});
