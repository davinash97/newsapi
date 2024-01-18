# About this Project

This is an unofficial backend for News, utilizing [NewsApi](https://newsapi.org/) for fetching news. This project was developed as part of a Web Development vocational training [Project](https://github.com/davinash97/globalbuzz).

## Folder Structure

```
# root
├── src/
│   ├── Fetch.php
│   ├── Helper.php
│   ├── logger.php
│   └── NewsAPI.php
└── index.php
```

## Prerequisites

- You need to install [git](https://git-scm.com/) or download using the zip method.

- This is solely written in PHP, so it makes it obvious to have PHP installed.

- There are two ways of having it installed:

  1. The Easy way using [Xampp](https://www.apachefriends.org/)
  2. Using the Hard way is the [official way](https://www.php.net/)

## Steps to Deploy

> ### If you using the git method:<br>
>
> - Clone this Repository by using HTTP (or) SSH method.<br>
>   Example using HTTP method:<br> `git clone --depth=1 https://github.com/davinash97/newsapi`
>
> - An API is needed from [NewsApi](https://newsapi.org/) for every requests.
> - The API key is supposed to be placed [here](src/NewsAPI.php). (It is purposely done so)
>
> ### If you chose the **EASY** way:
>
> - Paste the newsapi directory inside xampp directory <br>(Typically it's `C:/xampp` in Windows)
> - Look for htdocs folder and paste the newsapi folder there.
> - Now start the server from xampp control panel.
> - Open [http://localhost:80](http://localhost:80)
>   - _Point to note is port address i.e., 80 (in our case) can vary_
>
> ### If you chose the **HARD** way:
>
> - Now do `cd newsapi` to change the current directory.
> - Do `php -S localhost:5500` to deploy and open the [localhost:5500](http://localhost:5500) in your preferred browser.
>
> #

## Supported Endpoints

- **Top Headlines**: Can Provide with parameters like Keyword, [Country](src/Helper) or [Category](src/Helper). Can also be used altogether to get specific result.

- **Everything**: Can provide results with parameters like Keyword, [Language](src/Helper.php), or [searchIn](src/Helper.php) category

> It is limited to these for now, might add more in future versions (it's a "_maybe_" situation)

## Updates

- Feel free to improve or add features. Contributions in anyway possible are always welcome.
