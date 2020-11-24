# Update and upgrade the dependencies

```
sudo apt-get update && sudo apt-get upgrade
```

# Add the repository to apt-get

```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
```

# Install PHP 7.3

```
sudo apt-get install unzip
sudo apt-get install php7.3
sudo apt-get install php7.3-xml
php --ini
php -v
```

# Install Symfony

## Installation

[Documentation setup](https://symfony.com/doc/current/setup.html)

```
wget https://get.symfony.com/cli/installer -O - | bash 
mv /home/elliot/.symfony/bin/symfony /usr/local/bin/symfony
```

## Create project

```
symfony new portfolio
```

# Install Composer

[Composer installation](https://getcomposer.org/download/)

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=bin --filename=composer
php -r "unlink('composer-setup.php');"
```

# Install Yarn

```
curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
sudo apt-get update && sudo apt-get install yarn

```

# Install Webpack Encore (Managing CSS and JavaScript)

[Documentation](https://symfony.com/doc/current/frontend/encore/installation.html)

```
composer require symfony/webpack-encore-bundle
yarn add @symfony/webpack-encore --dev
```

# Install Bootstrap

[Documentation](https://symfony.com/doc/current/frontend/encore/bootstrap.html)

```
yarn add bootstrap --dev
yarn add jquery popper.js --dev
```

# Generate SSH Keys

```
ssh-keygen
cat ~/.ssh/id_rsa.pub
```