# InstructPHP Test API

## GET Get Services From Country Code

```api
server/api/get_country?country_code=[country code]
```
 
Get all services with a country code

| Status | Response |
| --- | --- |
| 200 | application/json <br> ``` [ { "Ref":"REFER1", "Centre":"Centre Name", "Service":"Service Name", "Country":"cn"}] ```|
