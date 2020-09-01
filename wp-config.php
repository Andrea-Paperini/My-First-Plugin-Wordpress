<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Chiavi Segrete
 * * Prefisso Tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'Infoplugin');

/** Nome utente del database MySQL */
define('DB_USER', 'root');

/** Password del database MySQL */
define('DB_PASSWORD', 'root');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         'p8d6n00lG_qO!h4Oew7<|-}1R?|di_OO9D}G/drYV:b HN0/ND0<&R`rF2QIMH)P');
 define('SECURE_AUTH_KEY',  'Jcy+eray{w,6B10^}YV@dThd/bqXTYlxl/F/0h8UFD^6WhrrD- x5OHwqrd9J.2c');
 define('LOGGED_IN_KEY',    '|f]ByDO@,ct>c*gN:+0f#%kuE9++ri$q$p86@ufi<ubqi##h6Qt+FNoMqyXb@UfP');
 define('NONCE_KEY',        'gQ]0A{q{1u,h)L?YG:;eb^|Yls$0a-^)r) P#>#}xKjszAURE.h#|FOjqj>-t*Iz');
 define('AUTH_SALT',        'oey-)@fX0K_#tOq?FC-+k4,Rb#dH-Wq7kU8S6-|+nQ<tj9SBarH[@3hkQPLt-VNH');
 define('SECURE_AUTH_SALT', '!(W_]B}ZnMv=*SYWf,,Gj/Ciz~,WuB`Pe,_(kba+3Vts,KOe}tqIE0XJji|%`}|i');
 define('LOGGED_IN_SALT',   '7VR4PM9ly)?XVw{(AEBz`5T%{Od|+=7#kX;V{U[]e*WAIHl0Zw`tR5E%^*h1vWG:');
 define('NONCE_SALT',       '5yI+)gNU;`4OJLm$`Da9YGk.-|PsePk-A|hO-`0[rCBn3lDP-|5>xHx(}[iU3MHz');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'C4z9_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
define('WP_MEMORY_LIMIT', '3000M');
/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
