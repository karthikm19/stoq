# Stoq App

## Overview

Aim of this project to create a simple Laravel app to get the current stock price using an external API (Alpha Vantage stock quote API).

- Allows user to login using Facebook JS API
- After login, user is shown an input and a 'Get Price' button.
- User can enter a stock symbol (i.e.AMZN) into the input and when the button is clicked, an AJAX call is made to an API on the Laravel app which in turn calls Alpha Vantage stock quote API
- Stores the stock quote symbol, high, low and price in a database table and returns all the information to the front end for the user to see. Every quote retrieved is stored in the database.
- App allows the user to re-create the database table (using Laravel database migrations)

## Installation

I have used Docker to build this application, so please follow the below steps to install the application in your machine.

- Install Docker and Docker Machine in your machine. [Docker](https://docs.docker.com/engine/install/) & [Docker Compose](https://docs.docker.com/compose/install/)
- Install Composer [Composer](https://getcomposer.org/download/)
- Clone the Stoq repository in your machine
- CD into the cloned directory
- RUN composer update
- Create a file called ".env" and copy the below code
```
APP_NAME='Stoq App'
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=stoqapp_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DOMAIN=127.0.0.1

FB_APP_ID=
FB_SECRET=
FB_CALLBACK_URL=https://127.0.0.1:8443/facebook/callback/

API_URL=https://www.alphavantage.co/query?function=%s&symbol=%s&apikey=%s
API_FUNCTION=GLOBAL_QUOTE
API_KEY=0O18XUJW9P8QVGQJ
```
- Create Facebook APP ID and Secret and update the above .env file. [Facebook Developer](https://developers.facebook.com/docs/facebook-login/web/)
- Generate APP Key using 
```
php artisan key:generate
```
- RUN 
```
npm install && npm run dev
```
- RUN docker-compose up -d
- This builds the container and setup the application to run. Might take a while
- Once completed successfully, run "docker ps", you should see two container running
- Now go to browser and open "https://127.0.0.1:8443"

## Screenshots

Please find some of the screenshots how the app will look and work!

### Login Screen
![Stoq App - Login](https://github.com/karthikm19/stoq/blob/master/screenshots/login.png)

### Home Screen
![Stoq App - Home](https://github.com/karthikm19/stoq/blob/master/screenshots/Screenshot%202021-10-19%20at%2020.32.13.png)


### Home Screen - Search Result
![Stoq App - Home](https://github.com/karthikm19/stoq/blob/master/screenshots/Screenshot%202021-10-19%20at%2020.33.13.png)

### Home Screen - Search Error/No Result
![Stoq App - Home](https://github.com/karthikm19/stoq/blob/master/screenshots/Screenshot%202021-10-19%20at%2020.33.58.png)


### Database
Responses stored in the database
![Database](https://github.com/karthikm19/stoq/blob/master/screenshots/Screenshot%202021-10-19%20at%2021.07.24.png)
