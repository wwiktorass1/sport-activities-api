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

You can filter the activities using the following **query parameters**:

| Parameter     | Type    | Description                                         |
|---------------|---------|-----------------------------------------------------|
| `type`        | string  | Activity type (e.g. `joga`)                         |
| `location`    | string  | City (e.g. `Vilnius`)                               |
| `title`       | string  | Part of title (e.g. `joga` matches `Joga parke`)   |
| `price_from`  | float   | Minimum price (e.g. `10`)                           |
| `price_to`    | float   | Maximum price (e.g. `30`)                           |
| `is_active`   | bool    | 1 or 0 – to filter active/inactive activities       |

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

### ✅ Title contains 'joga'

```
http://localhost:8000?title=joga
```

### ✅ Price range

```
http://localhost:8000?price_from=10&price_to=20
```

### ❌ Invalid is_active

```
http://localhost:8000?is_active=test
```

Returns:

```json
{
  "status": "error",
  "message": "Netinkama reikšmė parametre is_active (leidžiamos: 0, 1)",
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

---

## 🛠️ Tech Stack

- PHP 8.3 (Laravel-like structure)
- Docker + Docker Compose
- JSON responses with filtering and validation

---

## 👤 Author

GitHub: [@wwiktorass1](https://github.com/wwiktorass1)

---