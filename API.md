# Instruct PHP Developer Code Challenge (v1.0) API

## GET | Get Services From Country Code

```
[server]:8000/api/get_country?country_code=[country code]
```
 
Get all services with a country code

### Outputs

| Status | Response |
| --- | --- |
| 200 | application/json <br> List of JSON objects <br> |

JSON Response
``` json
[
 {
  "Ref":"REFER1",
  "Centre":"Centre Name",
  "Service":"Service Name",
  "Country":"cn"
 }
]
 ```

## POST | Add Service

Add service to database

```
[server]:8000/api/add_service
```

### Request Headers

Content-Type: application/json

```json
{
 "Ref":"REFREF1",
 "Centre":"Centre Name",
 "Service":"Service Name",
 "Country":"cn"
}
```


### Outputs

| Status | Responses |
| --- | --- |
| 200 | |
| 400 | String output <br> `"cannot add duplicate service"` <br> `"missing parameters from POST request"` <br> `PDOException `|
| 500 | "cannot connect to server" |

## POST | Edit Service

Edit service in database

```
[server]:8000/api/update_service
```

### Request Headers

Content-Type: application/json

```json
{
 "Ref":"REFREF1",
 "Centre":"Centre Name",
 "Service":"Service Name",
 "Country":"cn"
}
```


### Outputs

| Status | Responses |
| --- | --- |
| 200 | |
| 400 |  "missing parameters from POST request" |
| 500 | PDOException |
