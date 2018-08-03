<?php
/**
 * Determine if SSL is used.
 *
 * @since 2.6.0
 *
 * @return bool True if SSL, false if not used.
 */
function is_ssl() {
        if ( isset($_SERVER['HTTPS']) ) {
                if ( 'on' == strtolower($_SERVER['HTTPS']) )
                        return true;
                if ( '1' == $_SERVER['HTTPS'] )
                        return true;
        } elseif ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
                return true;
        }
        return false;
}



// Some tests...
header("Content-Type:text/plain");

echo 'is_ssl(): '; var_dump(is_ssl());

echo '$_SERVER[\'HTTPS\']: '; var_dump($_SERVER['HTTPS']);

echo '$_SERVER[\'SERVER_PORT\']: '; var_dump($_SERVER['SERVER_PORT']);

?>