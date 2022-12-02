# Thanks for cumming on the Billing System for Pterodactyl
# Addon by CumArchon69420 for Pterodactyl 1.7.0

Before proceeding with installation make sure you have checked the following things:

* Make sure you're running the v1.10.4 of Pterodactyl
* Pterodactyl must be completely stock with no addons installed, to remove any addons you can run the pterodactyl update script.
* Dont be a cancer and upload them however you want i dont give a fuck
* Make sure yarn is installed

Automatic Installation:

1. Request a unique license key "cum69420"
2. If this is your first time, drag and drop all folders in the this folder to /var/www/pterodactyl
3. Open terminal, head to "/var/www/pterodactyl/" login as root user if you aren't already with command "sudo su" and execute the following command: "php artisan billing:install stable"
4. Navigate to Admin Area -> Application API -> Create a new Application API select Read and Write for all options; Paste API in Admin Area -> Billing -> In the top field called "API settings"
5. You're all set, and ready to go!

# Stripe
1. Open Command Line and run the following command: composer require stripe/stripe-php

# Additional Configuration:
For registration emails to work, make sure you have a SMTP server setup in your pterodactyl settings.

# DEBUGGING STEPS:

Is the panel still default after step 5? 
|--> Make sure the files have been replaced correctly by your FTP Program
|--> Clear Laravel cache with following commands: php artisan view:clear && php artisan config:clear


Need help? Join our discord: https://discord.gg/pornhub
