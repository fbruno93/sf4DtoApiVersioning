# Symfony dto

Project test for testing DTO and API versioning.

## Start up 

``sh
$ docker-compose build
$ docker-compose up -d
$ docker-compose run php composer install
``

## Test

``sh 
curl http://localhost:8080/api/v2/artist/get?artist_id=5 | jq .
{
  "artistId": 5,
  "biography": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut dignissim augue, vel lobortis eros ..."
}
``

``sh
curl http://localhost:8080/api/v3/artist/5 | jq
{
  "artistId": 5,
  "name": "Bruno",
  "biography": {
    "content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut dignissim augue, vel lobortis eros. Fusce mollis placerat arcu. ...",
    "lng": "la"
  }
}
``