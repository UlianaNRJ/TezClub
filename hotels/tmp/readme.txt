1. актульаня BD  в папке /tmp/, исходники БД в /app/sql - заливать в БД основного сайта
2. /public_html - document_dir для сайта
3. /app/config.php  - Конфигурация для БД и основнх либ 
4. /app/lib - cвои библитеки и классы
5. /app/vendor - сторонние библиотеки - Шаблонизатор Twig & реализации AR & ORM
6. /app/Slim - Slim framework for php5
7. /app/routes - роуты для работы
    /app/routes/main.php - основной роут для морды
    /app/routes/admin... - всё что касается админки
8. /app/Views - адаптер для рендеринга в twig


Досутуп к админке
http://site.local/admin
логин: admin
пароль: password


для работы совсместной авторизации, сайт должен быть на поддомене tezclub.com.ua
SQL заты в БД основного сайта