=== ZGM Plugin Boilerplate ===

A boilerplate for wordpress plugins.

== Setup ==

This plugin uses namespaces following format:
CompanyName\PluginName\Folder 

It starts with namespace ZGM\Plugin autoloading the app folder;

If using multiple instances of this plugin: Before composer install -> do a find and replace in all folders for Plugin.  Replace with your plugin name.

== Commands ==

To Bootstrap:

1. composer install
2. npm install
3. npm run watch


All Commands:

composer install
composer dump-autoload
npm install
npm run dev
npm run watch
npm run production
