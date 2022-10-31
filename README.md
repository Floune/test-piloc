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

- `DELETE` `/user/delete/{id}`
