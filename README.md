my-symfony3-sample
===

Symfony3 sample project for my learning.

## 準備

symfony のコマンド群をインストール

Github に repository をあらかじめ作成

作業用のマシンに Github　のアカウントを登録

```sh
git config --global user.name "xxxxx"
git config --global user.email "xxxxxxxxxx@xxxxx.xxxxx"
git config --global color.ui auto
```

※SSHの鍵登録っているんかしら・・・

## プロジェクトひな形作成

※{my-symfony3-sample}という名前でプロジェクトを作成する場合


```sh
su -
cd /var/www
git clone https://github.com/nakigao/my-symfony3-sample.git
cp my-symfony3-sample.git/.git atodetukau
rm -rf my-symfony3-sample
symfony new my-symfony3-sample
cp atodetukau my-symfony3-sample.git/.git

cd /var/www/my-symfony3-sample
git add --all
git commit -m "first commit"
git push -u origin master
```

## Install

※プロジェクトひな形がある場合は、ここから

```sh
su -
cd /var/www
git clone https://github.com/nakigao/my-symfony3-sample.git
```

プロジェクトの初期化

```sh
su -
cd /var/www/my-symfony3-sample
curl -sS https://getcomposer.org/installer | php
php composer.phar install
chmod 777 /var/www/my-symfony3-sample/var/cache/
chmod 777 /var/www/my-symfony3-sample/var/logs/
chmod 777 /var/www/my-symfony3-sample/var/sessions/
```

Apacheの設定

```sh
mkdir /var/log/apache2
vi /etc/httpd/conf/httpd.conf

※以下を追加

<VirtualHost *:80>
#    ServerName domain.tld
#    ServerAlias www.domain.tld

    DocumentRoot /var/www/my-symfony3-sample/web
    <Directory /var/www/my-symfony3-sample/web>
        AllowOverride All
        Order Allow,Deny
        Allow from All
    </Directory>

    # uncomment the following lines if you install assets as symlinks
    # or run into problems when compiling LESS/Sass/CoffeeScript assets
    # <Directory /var/www/my-symfony3-sample>
    #     Options FollowSymlinks
    # </Directory>

    ErrorLog /var/log/apache2/my-symfony3-sample_error.log
    CustomLog /var/log/apache2/my-symfony3-sample_access.log combined
</VirtualHost>
```

Apache再起動


```sh
service httpd restart
```

## Check

ブラウザからアクセスしてみて

```
Welcome to
Symfony 3.3.6
```

みたいな画面が表示されてればOK
