<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cakelmswebsite');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ' )LDODwh!pv}9K-_1v$T|RseHV`L/+/!nxt$0`H~*g-qwFyKB#F ^I>ZT-f]tCGh');
define('SECURE_AUTH_KEY',  'C,VR<KL}ZK,g=!$?y3_jk-=E!@-W,..4jVusezlj$O&j!j/qE]^x(6QSL<+amJ|C');
define('LOGGED_IN_KEY',    'WPyW[Ny@1JLVtoG(-b)Ymy%emj$Y<7J|}t3`{?Q>|:)!PgjHe^kvJCz|l#jcOTyh');
define('NONCE_KEY',        'exV[U/A1F=}PY]{14]C,PyX|lVP0Wk/A4E|+B;+ga.dN^jZC0pe4M4|AphyXHhxg');
define('AUTH_SALT',        '{&+~8*m[{ioG3RN~u|GH;UHvIaa}~-!8fdC4Vv5+_<*/!!k=$}}a=Q]IEyoU*j7i');
define('SECURE_AUTH_SALT', '_[e5l9&q`i+#|ZU-KVyD4b9.T|BdXHm~uQezJ?GX5Q_4S*JW{Q-| ,8M3fw5xSO2');
define('LOGGED_IN_SALT',   'T:6*KUZrKKcF]d(-KwR%FVT3?lNL)1;k.[LLbz>uV$-K KPBzqvbb?.-e+e+5xf9');
define('NONCE_SALT',       'sUpF$e25nX5sx-lm,,jX>ZCIG=K}iNEJEo S;2kG`fpt|x>]cZ5fQdWV|j^URcxK');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'cakelms_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');