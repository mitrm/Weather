**Техническое задание:**

Вот тестовое задание, его необходимо выполнить с использованием ООП,
постараться применить паттерны проектирования.
Результаты прошу предоставить в zip архиве или в виде ссылки на
публичный git репозиторий (например github).

Также необходимо указать потраченное время (в часах) на выполнение в
ответном письме.

Задача:

Необходимо реализовать функционал, который будет получать информацию о
погоде из любого публичного API.
Он должен уметь сохранять полученные данные в файле формата json и xml в
зависимости от переданного в него параметра типа файла.

Для JSON первыми по порядку должны быть поля:
Дата
Температура
Направление ветра
т.д.

Для XML:
Дата
Скорость ветра
Температура
т.д.​
-------------

**Пример использвоатения**

`docker-compose up -d`

`docker-compose exec php bash`

`composer install`

`php command.php --logger=json --city=Moscow`

`php command.php --logger=xml --city=Moscow`

В директории logs появятся файлы

Для api погоды и логера сделал простейшую реализацию, так как основная цель показать применение патернов.
Применен паттерн Фабрика - "Фабричный метод"
