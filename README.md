# Dave's Tech Test

## Running the app

To start the app run `make currencyFair-run` (Requires docker)

To run tests `make run-tests`

## Tools used

Backend: Laravel, PHP 7.4, Docker, Postgres

Frontend: React, TypeScript, SCSS (FE code is in /frontend dir)

## Approach

While this API consists of just two endpoints, I approached the task as if I were building 
the foundations of a large API.

 - Instead of traditional controllers I went with single action controllers. I find as an API grows over time
 this keeps the code base clean and you don't end up with monster controller. They are also easier to test.
 - DB access is via repositories which return DomainObjects, making it easy to swap in elasticSearch or another data 
 store seamlessly.
 - Service classes all have just one public 'execute' method. Again, easy to test and adheres to the SRP.
 - All validation is done in custom requests so no validation login in controllers or services. Each entity has it's own 
 validator which is easily reusable.
 - Everything is Dockerised so setup 'should' be simple
 
## What I'd change with more time / What I didn't do
  - Currently the FE it polling the API, this should be using websockets
  - It would have been nice to use a time-series DB like TimeseriesDb or InfluxDB
  - The FE has no tests
  - Adding visualisations
    
## cURL requests
 
### Create a transaction

```
curl -X POST \
  http://127.0.0.1:2591/api/transactions \
  -H 'accept: application/json' \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
  -d '{"userId": "134256", "currencyFrom": "USD", "currencyTo": "GBP", "amountSell": 2222.45, "amountBuy": 200.10, "rate": 0.7471, "timePlaced" : "24-JAN-18 10:27:44", "originatingCountry" : "FR"} '
```
 
### Get all transactions

```
curl -X GET \
  http://127.0.0.1:2591/api/transactions \
  -H 'accept: application/json' \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
```

Any questions let me know :-)

Cheers!
