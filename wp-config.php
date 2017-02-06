<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wptest');

/** Имя пользователя MySQL */
define('DB_USER', 'wptest');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'q');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$8TuF3|ljK<6jnFR2DnJM-5)baXCEfcu5PgqR_O{D7hc_X ItCr6l5i5C?;t75f.');
define('SECURE_AUTH_KEY',  '`VV?a0hF~&Y~7]QmRN!anQ=L2Vrvexc/72FQ!F:H^p }[=fg&U^%~1LxMQ{aXfS8');
define('LOGGED_IN_KEY',    '](B>x@*9>Ev_x!3k*hcQ~aL{>4N!k!jUbzu$XKG=v{Tovoz/!sYK}os`7iqh&CS7');
define('NONCE_KEY',        'G`GYY0Zzf`I*=r i@x )o@<(.?(Xxxm:>qWsME2+@2d B@9S9a90}T.ZTR[6V9Ia');
define('AUTH_SALT',        'vDd.,r0buGaD:dp0TjyN66!K>Tb{1R=FWIh|~PC,fvR<KD-)J8KO`W%xQ1IAC/ol');
define('SECURE_AUTH_SALT', '}L5!aYK!s/U?k-m:^T]Q3GV/Syz`c_QQVZ9_#NBN!LK`u2&qt~MS*Fd*QZBm=ixT');
define('LOGGED_IN_SALT',   ' ?Z2!,Q/V?bg|ak)1Gg8VF4uSZY7S?WD R ;sG!Hbk,pe1vMB;],SUK4IH_@F1-M');
define('NONCE_SALT',       'Ux5i{F>+oa=g]+SB~|Xov.-){7byz apxwII$6vEPEQh[qB7l){M,.Y<^/wZC}|T');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
