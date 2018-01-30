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
define('WPLANG', 'ru_RU');
// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'armed');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', '192.168.1.26');

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
define('AUTH_KEY',         'TKx@bDG$NKog5yR=i?yFlw;^GT yA{fD=onBGnRIIX>O**Jz&km5^7KUM)/ziw9p');
define('SECURE_AUTH_KEY',  'K4;/pGV?lgE:W(%(fRLRY*`s9350cu;d<-*0>d0{>jl]c4$nKIKQY]ZPW|P`Ys7>');
define('LOGGED_IN_KEY',    'I]vm>^thi1e9ax5Q**oH1:=0[7H)tr`q!L]RvwO]I_+f3g#UP/?YKV(FLR?,1t&[');
define('NONCE_KEY',        'A0U<P,Qw)cM@&J+Ky)jEwWSY|?Q5i[sSK!o9AY4cA^]r!adS6W3PF, o5>%2f@PY');
define('AUTH_SALT',        'VXZ mj.^D3$E%E!];),G/oPZb)}xsX<ni$;]Qlcy|1~B}H1 +4[=BuL*WCptjQv)');
define('SECURE_AUTH_SALT', 'R#IW^KO#fc,/z2<RgFHM>hU-Vu>O Gy/uHo!P&F>S19^BeC~tRCV>I7]w8q|i}U8');
define('LOGGED_IN_SALT',   '()6s:{l/bPRXMj<,n{?fM!OT6~64H_sZ|+vTxw-lgxBEJ1mY.r/EllWMyC~%XxK;');
define('NONCE_SALT',       '.>ANABG<f)R:hw1nKYRr!)r,1r,Tf>`w5yk9m4OepX {zbT-CzjD[TI(XF6w,%kQ');

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
