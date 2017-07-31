#!/usr/bin/env bash

sudo add-apt-repository ppa:chris-lea/libsodium -y
sudo apt-get update -y
sudo apt-get install libsodium-dev build-essential -y
git clone -b stable https://github.com/jedisct1/libsodium.git
cd libsodium
./configure
make
make check
sudo make install
pecl channel-update pecl.php.net
pecl install libsodium
echo "extension = sodium.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
cd ../
