// db.js
const mysql = require('mysql2');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'ya_uslugi'
});

connection.connect((err) => {
    if (err) {
        console.error('Ошибка подключения к базе данных: ' + err.stack);
        return;
    }
    console.log('Успешно подключено к базе данных под ID ' + connection.threadId);
});

module.exports = connection; // Экспортируем объект соединения
