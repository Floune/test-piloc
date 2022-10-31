# Test technique

## Installation

- `php artisan migrate --seed`
- `php artisan passport:install`
- `php artisan passport:client --personal`
- Remplir les lignes PASSPORT_PERSONAL_ACCESS_CLIENT_ID et PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET du .env


## Api

credentials admin: `admin@admin.com`, `qslndmdqkhbsd`

### Routes disponibles

- `POST` `/register` {

    - "firstname",
    - "lastname",
    - "password",
    - "password_confirmation"
    - "email"
  
}
- `POST` `/login` {

    - "email"
    - "password"
  
}

- `POST` `/user/update` {

    - "firstname"
    - "lastname"
    - "email"
    - id
  
}

- `GET` `/user/load/{id}` 
- `GET` `/user/index`
- `DELETE` `/user/delete/{id}`

- `POST` `/property/create` {

    - "title"
    - "street"
    - "city"
    - "zip"
    - "price"
    - "surface"
    - "status"
  
}
- `POST` `/property/update` {
    - id
    - "title"
    - "street"
    - "city"
    - "zip"
    - "price"
    - "surface"
    - "status"
  
}
- `POST` `/property/search` {
    - "city" optional
    - "zip" optional
    - "street" optional
  
}
