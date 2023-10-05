# How to run (as localhost)

1. go to /docker
2. run `docker-compose up --build -d`
3. go to `localhost:8000` in a browser window
  - This will populate the database and necessary table
4. Access API
  - API documentation can be viewed in API.md

## Run API Requests in Python (example)

### Add service
```python
import requests
r = requests.post('http://localhost:8000/api/add_service', json={
  "Ref": "REFREF1",
  "Centre": "Centre Name",
  "Service": "Service Name"
  "Country": "Cn",
})

print(f"Status Code: {r.status_code}, Response: {r.text}")

```

### Update Service
```python
import requests
r = requests.post('http://localhost:8000/api/update_service', json={
  "Ref": "REFREF1",
  "Centre": "Centre Name",
  "Service": "Service Name"
  "Country": "Cn",
})

print(f"Status Code: {r.status_code}, Response: {r.text}")

```

###  Get Service from country code
```python
import requests
r = requests.get('http://localhost:8000/api/get_country?country_code=gb')

print(f"Status Code: {r.status_code}, Response: {r.json()}")

```
