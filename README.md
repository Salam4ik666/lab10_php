# Лабораторная работа №10

- [Лабораторная работа №10](#лабораторная-работа-10)
    - [Инструкции по запуску проекта](#инструкции-по-запуску-проекта)
    - [Задания](#задания)
    - [Примеры использования](#примеры-использования)
    - [Список использованных источников](#список-использованных-источников)

## Инструкции по запуску проекта
1) Склонируйте репозиторий с проектом: git clone [https://github.com/S1ngle777/Lab_9_PHP.git](https://github.com/S1ngle777/Lab_9_PHP.git).
2) Запустите веб-сервер: php -S localhost:80.
3) Откройте браузер и перейдите по адресу http://localhost для доступа к заданию.

## Задания
__Задание 1.__ Создайте базу данных “event_platform”.

__Задание 2.__ Создайте следующие таблицы в базе данных и корректно установите между
ними отношения.

2.1. Структура таблицы `users`: пользователи

1. `id` (integer) — primary key
2. `name`
3. `surname`
4. `email` — unique key

2.2. Структура таблицы `events`: мероприятия

1. `id`
2. `name`: название мероприятия
3. `price`: цена мероприятия
4. `number_seats`: количество мест
5. `date`: дата и время

2.3. Структура таблицы `event_records`: записи на мероприятие

1. `id`
2. `user_id`: id пользователя
3. `event_id`: id мероприятия

2.4. Структура таблицы `roles`: роли (user / manager)

1. `id`
2. `name`: название роли


__Задание 3.__ Внесите изменения в таблицу пользователей, добавив поле role_id,
содержащее идентификатор определенной роли.

__Задание 4.__ Создайте четыре страницы:

- Страница с текущими мероприятиями
- Страница для записи на определенное мероприятие
- Регистрация
- Авторизация

__Задание 5.__ Разработайте административную панель (доступную только пользователю с
ID 'manager'), обладающую следующим функционалом:

- Добавление и изменение мероприятия
- Просмотр зарегистрированных на мероприятие.


__Задание 6.__ Сохраняйте все необходимые данные в базе данных.

```sql
// Задание 2. Создание таблиц
CREATE TABLE users (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    surname VARCHAR(255),
    email VARCHAR(255) UNIQUE
);

CREATE TABLE events (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(10, 2),
    number_seats INT,
    date DATETIME
);

CREATE TABLE event_records (
    id INT PRIMARY KEY,
    user_id INT,
    event_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (event_id) REFERENCES events(id)
);

CREATE TABLE roles (
    id INT PRIMARY KEY,
    name VARCHAR(255)
);

// Задание 3. Добавление поля role_id в таблицу users
ALTER TABLE users ADD COLUMN role_id INT;
ALTER TABLE users ADD FOREIGN KEY (role_id) REFERENCES roles(id);

// Задание 8. Реализация системы аутентификации на основе токенов
ALTER TABLE users ADD COLUMN token VARCHAR(255);
```
__Задание 4.__ Создайте четыре страницы:
— Страница с текущими мероприятиями
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/91a3ec7b-f54a-404e-8df7-334381bfce1b)
Страница для записи на определенное мероприятие
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/64da4c37-a3b2-420d-a247-ca6d9f25310b)
Регистрация
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/af6a61a9-69bc-4c1e-8367-28f1657b62b9)
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/f2008ee4-fc10-46e5-82ef-5c011364132c)
Авторизация
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/ed510b04-e841-4d60-b4c5-7e2120472bc8)
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/fad27a81-232c-4a55-835b-b40d26ab4f2e)

— Добавление и изменение мероприятия
![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/d10e82af-e859-4192-a833-b87bb361816e)

![image](https://github.com/Salam4ik666/lab10_php/assets/159524637/28686cd2-bb62-4984-a195-0aa0c2a2b855)

