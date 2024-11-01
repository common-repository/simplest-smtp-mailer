=== Simplest SMTP Mailer ===
Contributors: toadelevatingweb
Donate link: https://toadelevating.net/donate/
Tags: email, mailer, phpmailer, smtp
Requires at least: 4.0
Tested up to: 4.9.2
Stable tag: 1.1
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Implements settings to use included PHPMailer class in Wordpress in the lightest and simplest way possible.

== Description ==

= About the Plugin =

You need WordPress to send emails in your development environment on Windows?
You simply can't use sendmail, or would rather use your own SMTP...?

Simplest SMTP Mailer is indeed the most simple answer.

It hooks onto the phpmailer_init action to set PHPMailer to use SMTP method with custom settings.
Simple and straight forward, useful for any environment.

= Development/Testing mode =

Allows you to set an email address to divert all outgoing emails. No risk to send test emails to actual users or recipients!

== Installation ==

1. Upload `simplest-smtp-mailer` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Visit the settings page within your Settings menu in your Dashboard

== Frequently Asked Questions ==

== Screenshots ==

1. Settings page

== Changelog ==

= 1.1 =
Added Dev/test mode
Fix PHPMailer debug value issue in settings form.
= 1.0 =
First version: SMTP with host, port, debug, security (TLS, self-signed certificate), authentification, username, password.
 
== Upgrade Notice ==

== Arbitrary section ==

== A brief Markdown Example ==
