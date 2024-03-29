# Приложение Обратной Связи

Это простое веб-приложение для сбора обратной связи от пользователей. Пользователи могут отправлять свое имя, номер телефона и сообщение через форму, и обратная связь сохраняется либо в базе данных, либо в файле, в зависимости от настройки.

## Особенности

- Удобная форма отправки обратной связи.
- Проверка ввода данных пользователем (имя, номер телефона и сообщение).
- Гибкие опции хранения: данные могут храниться в базе данных или в файле.
- Чистый и организованный код, соответствующий лучшим практикам Laravel.
- Простая конфигурация для выбора типа хранения.

## Технологии и подходы

- **Domain-Driven Design (DDD):** Я использовал подход DDD для организации кода вокруг бизнес-логики и сущностей. Каждая сущность имеет четко определенное место в домене.

- **Abstract Factory:** Я применил паттерн Abstract Factory для создания семейств связанных объектов, таких как разные типы фабрик для создания сущностей.

- **Репозитории:** Для управления данными я использовал паттерн репозитория, который обеспечивает абстракцию для доступа к данным и предоставляет единый интерфейс для работы с хранилищем данных.


## Установка

Следуйте этим шагам, чтобы настроить и запустить проект локально:

1. Клонируйте репозиторий:

```bash
git clone https://github.com/Vanya9422/feedback-form.git
```
2. Перейдите в директорию проекта:

```bash
cd feedback-form 
```
3. Установите зависимости Composer:
```bash
composer install 
```
4. Скопируйте файл .env.example в .env:
```bash
cp .env.example .env
```
5. Сгенерируйте ключ приложения:
```bash
php artisan key:generate
```
6. Если вы планируете использовать базу данных, настройте подключение к базе данных в файле .env.
7. Настройте тип хранения в файле .env (например, **`FEEDBACK_STORAGE_TYPE=file`** для хранения в файле). По умолчанию сохраняет в базу
8. Выполните миграции базы данных (если используете базу данных):
```bash
php artisan migrate
```
9. Запустите сервер разработки
```bash
php artisan serve
```
## Контактная Информация

Если у вас возникнут вопросы или понадобится помощь, обращайтесь к [Вани](https://t.me/grigoryan366).
