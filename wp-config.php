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
define('AUTH_KEY',         'l]Y~uDS-.w#n_i 2.3h-Q{-#VDmROdf,@dOaz`M:Y@IjVD}p/IX)Aj +X4<vw-X:');
define('SECURE_AUTH_KEY',  'ImokQq; 4rrkk+t:`5z0R/`(AW5bWn3X +A}WMxJ(2Z;>.fIwg-mod*ShQ[rL@G3');
define('LOGGED_IN_KEY',    '_={j11GM/GeM]RR$mq@/}{A-+9Z${fqmMJo_}B9@+U1lztn,%E/^/%#6:tDJ-F*t');
define('NONCE_KEY',        'ly[*TKdTWE#Lr&9dz^9d|Z/]M|2mjK-7.-@bN~2C*U~uV4~l0=9_j.W%x?)-YZ9`');
define('AUTH_SALT',        '^!/eF>/}K$?^*5jjOJB,lp#`<0 UL|+OExnuK{E>$fB!NT*$.-7ogB_$WTH|9lP^');
define('SECURE_AUTH_SALT', 'Q]C;Q;QJ=O-*%?v1XOwj@/,b&OW6w~h^`JlB|%Ja<xolxk`;io p|f!w;8>Q}19>');
define('LOGGED_IN_SALT',   'TCd|`|..j|k-w@8g4yuw%Av?RCj~TbftOd{S0!u]M:PWkiY:rFUsak4x$1].uy!M');
define('NONCE_SALT',       ';lg<Gc9kT8c,]9! 1^q(Ek!QTjT1TeKwgeeL$l&hwop?6+5K@^kXi.=`o`-7%{p+');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'cklms_';

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