<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'travel' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=;poJW&>XU:FV9G4g6m5Sx0q]]f|2OA8koI3[xEYY;2x+m@0c[ItY]e_2ZH4ao]$');
define('SECURE_AUTH_KEY',  '++z32yi6O=ZO:Lqvt~7np/SHXa83!;Xp%9<=|>Z At%`)lT*Bi7JY8#rU5^o842,');
define('LOGGED_IN_KEY',    '{_A|J_O|5tN(aJ+v&NAoPSHTS_Uu)gS>IY@II!D.LS$uyiR75KTRZ[mFvVWy_ RW');
define('NONCE_KEY',        'LZ~I=R}bCD/l6bE1 [5b2vKTzB,wm?B*#mk`DLpkrg(F:-5RF3%X%NRufn^4C=|+');
define('AUTH_SALT',        '?KE|rjAS +irJB/-XSyg#0XIwM*+C+VQ1*8hkx]fh+:9S4E,|35c^!~2l*6*CO} ');
define('SECURE_AUTH_SALT', '$Gu;^HfG[m*bkds84,3tZ-x1-}rfEG:8 km:wm?-Q&!o/:@QEW5Nm{O~xis[}zDK');
define('LOGGED_IN_SALT',   'U~?ef)+I+lVU)G_;EYDBm*wwjKZIyX!fZGqdV<fNdb=9HAU-OE@3|WBpo *`T[-7');
define('NONCE_SALT',       '}]QhL/VXL[CE`@s`kP=JCIXxInX],]f>uADK3D%18vbe&Cb[+e<%x_F-YBqb5|F$');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
