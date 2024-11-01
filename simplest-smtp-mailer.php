<?php
/**
 * @package Simplest SMTP Mailer
 * @version 1.1
 */
/*
  Plugin Name: Simplest SMTP Mailer
  Description: Implements settings to use included PHPMailer class in Wordpress in the lightest and simplest way possible.
  Author: Toad Elevating Web
  Author URI: https://toadelevating.net
  Version: 1.1
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!function_exists('simplest_smtp_mailer_settings_page')) {

    function simplest_smtp_mailer_settings_page() {
        ?>
        <div class="wrap">
            <h1>Simplest SMTP Mail</h1>
            <form method="post" action="options.php" novalidate="novalidate">
                <?php settings_fields('simplest_smtp_mailer_settings-group'); ?>
                <?php do_settings_sections('simplest_smtp_mailer_settings-group'); ?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="blogname">Main Switch</label></th>
                            <td>
                                <fieldset>
                                    <label><input name="simplest_smtp_mailer_switch" value="1" <?php
                                        if (get_option('simplest_smtp_mailer_switch') == '1') {
                                            echo 'checked="checked"';
                                        }
                                        ?> type="radio"> <span class="">on</span></label><br>
                                    <label><input name="simplest_smtp_mailer_switch" value="0" <?php
                                        if (get_option('simplest_smtp_mailer_switch') != '1') {
                                            echo 'checked="checked"';
                                        }
                                        ?> type="radio"> <span class="">off</span></label><br>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="blogname">Debug Mode</label></th>
                            <td>
                                <fieldset>
                                    <label><input name="simplest_smtp_mailer_debug" value="3" <?php
                                                  if (get_option('simplest_smtp_mailer_debug') == '3') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">on</span></label><br>
                                    <label><input name="simplest_smtp_mailer_debug" value="0" <?php
                                                  if (get_option('simplest_smtp_mailer_debug') != '3') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">off</span></label><br>
                                </fieldset>
                                <p class="description" id="simplest_smtp_mailer_debug-description">Activates PHPMailer Debug mode 3 (outputs log: data, commands and connection status.)</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="blogname">Dev/Test Mode</label></th>
                            <td>
                                <fieldset>
                                    <label><input name="simplest_smtp_mailer_dev" value="1" <?php
                                                  if (get_option('simplest_smtp_mailer_dev') == '1') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">on</span></label><br>
                                    <label><input name="simplest_smtp_mailer_dev" value="0" <?php
                                                  if (get_option('simplest_smtp_mailer_dev') != '1') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">off</span></label><br>
                                                  <input name="simplest_smtp_mailer_dev_recipient" placeholder="recipient@host.tld" id="simplest_smtp_mailer_dev_recipient" value="<?php echo esc_attr(get_option('simplest_smtp_mailer_dev_recipient')); ?>" class="regular-text" type="email">
                                <p class="description" id="simplest_smtp_mailer_dev_recipient-description">If Dev/Test is on, will divert all outgoing messages to this email address.</p>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="simplest_smtp_mailer_host">Host</label></th>
                            <td><input name="simplest_smtp_mailer_host" id="simplest_smtp_mailer_host" value="<?php echo esc_attr(get_option('simplest_smtp_mailer_host')); ?>" class="regular-text" type="text">
                                <p class="description" id="simplest_smtp_mailer_host-description">Host name or IP address. eg. smtp.host.tld, or 192.168.0.1</p></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="simplest_smtp_mailer_host">Port</label></th>
                            <td><input name="simplest_smtp_mailer_port" id="simplest_smtp_mailer_port" value="<?php echo esc_attr(get_option('simplest_smtp_mailer_port')); ?>" class="regular-text" type="number">
                                <p class="description" id="simplest_smtp_mailer_port-description">Port number. eg. 587</p></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="blogname">Security</label></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span>Choose security protocole</span></legend>
                                    <label><input name="simplest_smtp_mailer_secure" value="" <?php
                                                  if (get_option('simplest_smtp_mailer_secure') == '') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">None</span></label><br>
                                    <label><input name="simplest_smtp_mailer_secure" value="tls" <?php
                                                  if (get_option('simplest_smtp_mailer_secure') == 'tls') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">TLS</span></label><br>
                                    <label><input name="simplest_smtp_mailer_secure" value="tls-flex" <?php
                                                  if (get_option('simplest_smtp_mailer_secure') == 'tls-flex') {
                                                      echo 'checked="checked"';
                                                  }
                                                  ?> type="radio"> <span class="">TLS (no certificate validation/self-signed)</span></label><br>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="blogname">Authentification Mode</label></th>
                            <td>
                                <fieldset>
                                    <label><input name="simplest_smtp_mailer_auth" value="1" <?php
                                if (get_option('simplest_smtp_mailer_auth') == '1') {
                                    echo 'checked="checked"';
                                }
                                ?> type="radio"> <span class="">with authentification</span></label><br>
                                    <label><input name="simplest_smtp_mailer_auth" value="0" <?php
                                if (get_option('simplest_smtp_mailer_auth') != '1') {
                                    echo 'checked="checked"';
                                }
                                ?> type="radio"> <span class="">without authentification</span></label><br>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="simplest_smtp_mailer_username">Username</label></th>
                            <td><input name="simplest_smtp_mailer_username" id="simplest_smtp_mailer_username" value="<?php echo esc_attr(get_option('simplest_smtp_mailer_username')); ?>" class="regular-text" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="simplest_smtp_mailer_password">Password</label></th>
                            <td><input name="simplest_smtp_mailer_password" id="simplest_smtp_mailer_password" value="<?php echo esc_attr(get_option('simplest_smtp_mailer_password')); ?>" class="regular-text" type="password">
                            </td>
                        </tr>
                    </tbody></table>
                <p class="submit"><input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit"></p></form>
        </div>
        <?php
    }

}

if (!function_exists('simplest_smtp_mailer_settings')) {

    function simplest_smtp_mailer_settings() {
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_switch');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_debug');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_dev');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_dev_recipient');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_host');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_port');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_secure');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_auth');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_username');
        register_setting('simplest_smtp_mailer_settings-group', 'simplest_smtp_mailer_password');
    }

}

if (!function_exists('simplest_smtp_mailer_admin_menu')) {

    function simplest_smtp_mailer_admin_menu() {
        add_options_page('Simplest SMTP Mailer', 'Simplest SMTP Mailer', 'manage_options', 'simplest-smtp-mailer', 'simplest_smtp_mailer_settings_page');

        add_action('admin_init', 'simplest_smtp_mailer_settings');
    }

}
add_action('admin_menu', 'simplest_smtp_mailer_admin_menu');

if (!function_exists('simplest_smtp_mailer_phpmailer_init')) {

    function simplest_smtp_mailer_phpmailer_init($phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->SMTPDebug = (int)get_option('simplest_smtp_mailer_debug');
        $phpmailer->Host = get_option('simplest_smtp_mailer_host');
        $phpmailer->Port = get_option('simplest_smtp_mailer_port');
        
        $dev_mode = get_option('simplest_smtp_mailer_dev');
        $dev_recipient = get_option('simplest_smtp_mailer_dev_recipient');
        if (!empty($dev_mode) AND is_email($dev_recipient)) {
            $phpmailer->clearAllRecipients();
            $phpmailer->addAddress($dev_recipient);
        }

        $secure = get_option('simplest_smtp_mailer_secure');
        if (!empty($secure) AND ( stristr($secure, 'tls'))) {
            $phpmailer->SMTPSecure = 'tls';
            if (stristr($secure, 'flex')) {
                $phpmailer->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ),
                );
            }
        } else {
            $phpmailer->SMTPSecure = $secure;
        }
        $auth = get_option('simplest_smtp_mailer_auth');
        if (!empty($auth)) {
            $phpmailer->SMTPAuth = true;
            $phpmailer->Username = get_option('simplest_smtp_mailer_username');
            $phpmailer->Password = get_option('simplest_smtp_mailer_password');
        }
    }

}

if (!function_exists('simplest_smtp_mailer_init')) {

    function simplest_smtp_mailer_init() {
        if (get_option('simplest_smtp_mailer_switch') == '1') {
            add_action('phpmailer_init', 'simplest_smtp_mailer_phpmailer_init');
        }
    }

}
add_action('init', 'simplest_smtp_mailer_init');