# Routes

---
### 1. GET|HEAD /api/guests?page={number}

#### Пример запроса:
GET ```/api/guests?page=2```
```
Accept: application/json
```
#### Пример ответа:
```
{
    "data": [
        {
            "id": 119,
            "name": "Litzy",
            "surname": "Volkman",
            "phone": "+13237126499",
            "email": "apfeffer@example.org",
            "country": "US",
            "created_at": "2024-12-01T14:27:17.000000Z",
            "updated_at": "2024-12-01T14:27:17.000000Z"
        },
        ...
    ],
    "meta": {
        "current_page": 2,
        "from": 11,
        "last_page": 3,
        "path": "http://localhost:8878/api/guests",
        "per_page": 10,
        "to": 20,
        "total": 26
    }
}
```
### 2. POST /api/guests

#### Пример запроса:
POST ```/api/guests```
```
Accept: application/json

{
    "name": "test",
    "surname": "surtest",
    "phone": "+79543899089"
}
```
#### Пример ответа:
```
{
    "data": {
        "name": "test",
        "surname": "surtest",
        "phone": "+79543899090",
        "country": "RU",
        "updated_at": "2024-12-01T16:00:40.000000Z",
        "created_at": "2024-12-01T16:00:40.000000Z",
        "id": 138
    }
}
```

### 3. GET|HEAD /api/guests/{id}

#### Пример запроса:
GET ```/api/guests/129```
```
Accept: application/json
```
#### Пример ответа:
```
{
    "data": {
        "id": 129,
        "name": "test",
        "surname": "surtest",
        "phone": "+79543335566",
        "email": null,
        "country": "RU",
        "created_at": "2024-12-01T14:36:51.000000Z",
        "updated_at": "2024-12-01T14:36:51.000000Z"
    }
}
```

### 4. PUT|PATCH /api/guests/{guest}

#### Пример запроса:
PUT|PATCH ```/api/guests/129```
```
Accept: application/json

{
    "name": "test6",
    "email": "test@mail.ru"
}
```
#### Пример ответа:
```
{
    "data": {
        "id": 128,
        "name": "test6",
        "surname": "Buckridge",
        "phone": "+16267777962",
        "email": "test@mail.ru",
        "country": "US",
        "created_at": "2024-12-01T14:27:17.000000Z",
        "updated_at": "2024-12-01T16:14:25.000000Z"
    }
}
```

### 5. DELETE /api/guests/{guest}

#### Пример запроса:
DELETE ```/api/guests/128```
```
Accept: application/json
```

#### Пример ответа:
```
{
    "data": {
        "message": "Deleted successfully"
    }
}
```

# Project

---

## Установка

1. ```docker compose up -d --build```
2. ```docker exec -it guest_app bash```
3. ```composer install```

## Миграции

1. ```php artisan migrate```
2. ```php artisan key:generate```
3. ```php artisan app:get-jwt``` // Создаст пользователя и вернёт токен
4. ```php artisan db:seed GuestSeeder```  // Наполнит таблицу (20 записей)

## Ошибки

- Если возникнут ошибки с правами на запись в директорию ```/storage```, то выполнить команду из под ```guest_app```:
  ```chown -R www-data:www-data guest_app```