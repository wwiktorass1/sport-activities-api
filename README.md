# 🏃‍♂️ Sport Activities API

This is a lightweight Laravel-like API for managing and filtering sport activities using Docker.

---

## 🚀 Getting Started

1. Clone the repository

```bash
git clone https://github.com/wwiktorass1/sport-activities-api.git
cd sport-activities-api
```

2. Start the containers

```bash
docker-compose up -d
```

3. Open in browser

```text
http://localhost:8000
```

---

## 📚 API Endpoint

### `GET /`

Returns a list of all sport activities.

---

## 🔎 Available Filters

You can filter the activities using the following **query parameters**:

| Parameter     | Type    | Description                                                   |
|---------------|---------|---------------------------------------------------------------|
| `type`        | string  | Activity type (e.g. `joga`, `tenisas`)                        |
| `location`    | string  | City (e.g. `Vilnius`, `Kaunas`, `Šiauliai`, etc.)             |
| `title`       | string  | Search in activity title (e.g. `title=tenisas`)               |
| `price_from`  | float   | Minimum price                                                 |
| `price_to`    | float   | Maximum price                                                 |
| `is_active`   | bool    | Filter active (`1`) or inactive (`0`) activities              |

---

## ✅ Example Requests

### All activities

```
http://localhost:8000
```

### Filter by title (contains "tenisas")

```
http://localhost:8000?title=tenisas
```

### Filter by price range

```
http://localhost:8000?price_from=10&price_to=20
```

### Invalid price range (from > to)

```
http://localhost:8000?price_from=50&price_to=30
```

Response:

```json
{
  "status": "error",
  "message": "Parametras price_from negali būti didesnis už price_to",
  "data": []
}
```

---

## 🌀 cURL Examples

```bash
curl "http://localhost:8000?type=joga&location=Vilnius"
```

```bash
curl "http://localhost:8000?price_from=10&price_to=25"
```

```bash
curl "http://localhost:8000?title=treniruotė"
```

---

## 🗺️ Sample Data

Activities include:
- Joga parke (Vilnius)
- Pilates namuose (Kaunas)
- Futbolo treniruotė (Klaipėda)
- Krepšinio stovykla (Panevėžys)
- Teniso pamoka (Šiauliai)

Each activity includes `latitude` and `longitude` for map display.

---


## 🧪 Testing

This project includes basic automated API tests.

### Run tests inside Docker container:

```bash
docker exec -it $(docker ps -qf "name=laravel") php tests/test.php
```

All tests should output:

```
🧪 Running Sport Activities API tests...
✅ All activities test passed
✅ is_active=1 filter test passed
✅ Invalid price range test passed
✅ Title filter test passed
🎉 All tests completed successfully.
```
## 🛠️ Tech Stack

- PHP 8.3 (Laravel-like structure)
- Docker + Docker Compose
- JSON API with filtering and validation

---

## 👤 Author

GitHub: [@wwiktorass1](https://github.com/wwiktorass1)

---