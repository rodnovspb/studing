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

define( 'ADDRESS', 'Бармалеева, 7; телефон: 89507261797' );

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'H7.XgbPB{+BwMUe:)(Bjh7::}dV%C$G%c]0&|3^r_pPE(al$nnKq(^P-ozAXO!H{' );
define( 'SECURE_AUTH_KEY',  'yv? E=&azs=vIGG8z<c1N_-lO?Yvnyne4RpIxud Bi6|,q5mD?r;B=NA,6p+J<DK' );
define( 'LOGGED_IN_KEY',    'F$deV/ L!B{:OXG0 6%N_40=^<$cQ/UM07S%fT:)Y_Iq#=MT0D5P@Ms^PI:`I@F[' );
define( 'NONCE_KEY',        'Eof$vRjZ^=`,i``OJj%@g$9Fvx5b#f3c=~(%~Y/w[NM&;! vpW=(YSSp!ECw]W(r' );
define( 'AUTH_SALT',        'SKPi.chkV4M&|?=W=hU9xs&iX&/-E*ph=Ni&ny?r=.X~S^w2b1!xWBODNfnxdrN-' );
define( 'SECURE_AUTH_SALT', 'Cz)Okd5QmQ!`)YY+)mT^m(3l8ds!=KeE,&EA(),jj^iIZBcl;zr=@j^$ ).sNjs@' );
define( 'LOGGED_IN_SALT',   'A_MlEHobX#x1qE%>Th]0ff+[zyhO_GpbaFYw{`E]kh%(m?1`t_vh>aK}TeBkf@%i' );
define( 'NONCE_SALT',       ',K?3[I1C11kQO-U{[5Rd~<)M#y*xY0oFEnOoiiF6Up|p6ot0aP>TC/lj8t/{,CND' );

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
