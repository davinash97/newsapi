export default class newsApi {
  constructor(API_KEY) {
    this.API_KEY = API_KEY;
  }
  URI = `https://newsapi.org/v2`;
  async getEverything(
    query = null,
    searchIn = null,
    language = null,
    sortBy = null,
    pageSize = null
  ) {
    let endpoint = `${this.URI}/everything?`;
    if (query == null) return "You need to add some query for news!";
    endpoint += `q=${query}`;
    if (searchIn != null) endpoint += `&searchIn=${searchIn}`;
    if (language != null) endpoint += `&language=${language}`;
    if (sortBy != null) endpoint += `&sortBy=${sortBy}`;
    if (pageSize != null) endpoint += `&pageSize=${pageSize}`;
    endpoint += `&apiKey=${this.API_KEY}`;
    return await fetchIt(endpoint);
  }
  async getTopHeadlines(
    query = null,
    country = null,
    category = null,
    sources = null,
    pageSize = null,
    page = null
  ) {
    let endpoint = `${this.URI}/top-headlines?`;
    endpoint += country != null ? `&country=${country}` : "country=in";
    if (query != null) endpoint += `q=${query}`;
    if (category != null) endpoint += `&category=${category}`;
    if (sources != null) endpoint += `&sources=${sources}`;
    if (page != null) endpoint += `&page=${page}`;
    if (pageSize != null) endpoint += `&pageSize=${pageSize}`;
    endpoint += `&apiKey=${this.API_KEY}`;
    return await fetchIt(endpoint);
  }
}

async function fetchIt(link) {
  const response = await fetch(link);
  const data = await response.json();
  return data;
}
