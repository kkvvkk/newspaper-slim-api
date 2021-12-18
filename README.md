# Newspaper-Slim-Api
## Инструменты
Роутинг - slim/slim  
DI контейнер - league/container  
Миграции - robmorgan/phinx  
## Endpoints  
/authors - получить список авторов  
/author/{id} - получить данные автора по id  
/news/byId/{id} - получить новость по id   
/news/byRubric/{rubricId} - получить список новостей определенной рубрики по её id  
/news/byAuthor/{authorId} - получить список новостей автора по его id  
/rubric/byId/{id} - получить данные рубрики по id  
/rubric/head/byId/{id} - получить данные главной рубрики у рубрики по id  