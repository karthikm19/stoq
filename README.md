# Stoq App

## Overview

Aim of this project to create a simple Laravel app to get the current stock price using an external API (Alpha Vantage stock quote API).

- Allows user to login using Facebook JS API
- After login, user is shown an input and a 'Get Price' button.
- User can enter a stock symbol (i.e.AMZN) into the input and when the button is clicked, an AJAX call is made to an API on the Laravel app which in turn calls Alpha Vantage stock quote API
- Stores the stock quote symbol, high, low and price in a database table and returns all the information to the front end for the user to see. Every quote retrieved is stored in the database.
- App allows the user to re-create the database table (using Laravel database migrations)
