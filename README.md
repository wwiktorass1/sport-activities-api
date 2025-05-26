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

### `GET /api/sport-activities`

Returns a list of all sport activities.

You can filter the activities using the following **query parameters**:

| Parameter     | Type    | Description                         |
|---------------|---------|-------------------------------------|
| `type`        | string  | Activity type (e.g. `joga`)         |
| `location`    | string  | City (e.g. `Vilnius`)               |
| `price_from`  | float   | Minimum price                       |
| `price_to`    | float   | Maximum price                       |
| `is_active`   | bool    | Only active (`1`) or inactive (`0`) |

---

## 🔍 Example Requests

### ✅ All activities

```
http://localhost:8000
```

### ✅ Filtered by type

```
http://localhost:8000?type=joga
```

### ✅ Filtered by location and active

```
http://localhost:8000?location=Vilnius&is_active=1
```

### ✅ Price range

```
http://localhost:8000?price_from=10&price_to=20
```

---

## 🌀 cURL Examples

```bash
curl "http://localhost:8000?type=joga&location=Vilnius"
```

```bash
curl "http://localhost:8000?price_from=10&price_to=25"
```

---

## 🛠️ Tech Stack

- PHP 8.3 (Laravel-like structure)
- Docker + Docker Compose
- JSON responses with filtering

---

## 👤 Author

GitHub: [@wwiktorass1](https://github.com/wwiktorass1)

---