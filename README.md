Описание проекта
================================

Telegram бот с возможность создавать команды и клавиатуры.

Подраздел: Production 
-------------------------

http://DOMAIN.ru - webhook бота Telegram
http://backend.DOMAIN.ru - административная часть сайта

Раздел: Подготовка и настройка VDS
================================

Требования к серверу и ПО:
--------------------------------

2. Версия языка PHP: 7.2
3. СУБД: MySQL 3.4
4. Веб-сервер: Apache
5. Пакет: git
6. Пакет: composer
7. SSL/HTTPS

Раздел: Установка и обновление проекта
================================

Подраздел: Установка проекта с нуля и первичные настройки Production 
--------------------------------

1. Скачать репозитарий: `git pull origin master`
2. Обновить зависимости: `composer global require "fxp/composer-asset-plugin:*"` и `composer install`
3. Перевести в Production: `php init`, `1`, `yes`
4. Выполнить миграции: `php yii migrate`
5. Создание символьных ссылок:

```
ln -s frontend/web public_html
cd frontend/web/
ln -s ../../backend/web backend
```

Наличие ошибки: An internal server error occurred.
------------------------------------------

Изменить код в файле frontend/web/index.php код:
defined('YII_DEBUG') or define('YII_DEBUG', true);

И исправить все ошибки, которые будут появляться.

Раздел: Разработчик 
================================

Антон, telegram @fedorov_anton, fedorovau2012@gmail.com