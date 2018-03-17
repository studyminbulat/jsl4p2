# heroku
стартер для деплоинга PHP-приложения

Чтобы приложение, использующее PHP, заработало на Heroku, оно должно иметь отношение к менеджеру зависимостей Composer. Даже если у нас просто один файл index.php, в котором нет никаких зависимостей, всё равно должен быть как минимум базовый файл `composer.json`, который позволяет сервису распознать, что это именно приложение PHP - см. в этом каталоге (указано, что годятся версии начиная с той, которая сейчас на компьютере у автора этого репозитория).

```

mkdir $(date +%Y%m%d_%H%M%S) && cd $_ && git clone -b php https://github.com/GossJS/heroku.git . && rm -rf .git

composer update
git init
heroku create
git add .
git commit -m 'first'
git push heroku master
heroku open

```

или можно забрать просто содержимое этой папки вместо первого шага

```
mkdir $(date +%Y%m%d_%H%M%S) && cd $_ && svn checkout https://github.com/GossJS/heroku/branches/php .

```

после выполнения `composer update` появляется файл composer.lock который тоже коммитится вместе со всеми.

Далее https://limitless-peak-87873.herokuapp.com/?print или что-то в этом роде.
