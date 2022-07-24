# PHP-SSH Client
A PHP sdk for connect to servers via ssh, sftp an more.

## Dependencies
- PHP >= 7.4

## Setup
If you already have a file, just add the following dependency to your project: ```composer.json```

```json
"require": {
    "edvnetwork/php-ssh": "^2.1"
}
```

## With the dependency added to , just run: ```composer.json```
```ssh
composer install
```

## Alternatively, you can run directly in your terminal:
```
composer require "edvnetwork/php-ssh:2.1"
```

## SSH connection with simple user and password authentication

```php
<?php
  use EDV\net\ssh\SSHConnection;
  use EDV\net\ssh\auth\SSHPasswordAuthentication;

  $ssh = new SSHConnection();
  $ssh->open('127.0.0.1');
  $ssh->authenticate(
    new SSHPasswordAuthentication('user', 'password'));

  $directoryIterator = $ssh->getDirectoryIterator('/temp');

  while ($directoryIterator->valid()) {
    $splFileInfo = $directoryIterator->current();

    if ($splFileInfo->isFile()) {
        $splFileObject = $directoryIterator->openFile('r');
    }

    $directoryIterator->next();
}
```

## SSH connection with user's public key

```php
<?php
  use EDV\net\ssh\SSHConnection;
  use EDV\net\ssh\auth\SSHPublicKeyAuthentication;

  $ssh = new SSHConnection();
  $ssh->open('example.com');
  $ssh->authenticate(new SSHPublicKeyAuthentication('user', '/home/user/.ssh/id_rsa.pub', '/home/user/.ssh/id_rsa', 'passphrase'));

  $directoryIterator = $ssh->getDirectoryIterator('/temp');

  while ($directoryIterator->valid()) {
    $splFileInfo = $directoryIterator->current();

    if ($splFileInfo->isFile()) {
        $splFileObject = $directoryIterator->openFile('r');
    }

    $directoryIterator->next();
}
```
