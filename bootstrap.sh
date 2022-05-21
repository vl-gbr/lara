#!/usr/bin/env bash
# apt update
## OLD
#apt install -y php
#apt install -y mysql-server
#apt install -y php-xdebug
#cp /var/www/html/env/xdebug.ini /etc/php/7.4/cli/conf.d/xdebug.ini
##
##
# apt-get install -y software-properties-common
# add-apt-repository ppa:ondrej/php
# apt-get update
##
# apt install -y php8.0-common
# apt install -y php8.0-cli
##
# apt install -y php8.0-{curl,intl,mysql,readline,xml,mbstring}
# apt install -y mysql-server
##
# apt install -y php8.0-pcov # PCOV code coverage tool
sudo php81
sudo apt install -y php8.1-xdebug # Xdebug debugger
if [ ! -f /etc/php/8.1/cli/conf.d/20-xdebug.ini ]; then
	sudo cp /home/vagrant/lara/xdebug.ini /etc/php/8.1/cli/conf.d/20-xdebug.ini
fi
#
# apt install libapache2-mod-php8.1
#
sudo systemctl restart apache2