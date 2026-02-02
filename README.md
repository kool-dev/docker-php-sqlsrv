## Description

Minimal PHP Docker image with SQL Server drivers. It's use is intended for [kool.dev](https://github.com/kool-dev/kool), but can fit in any other PHP use-case.

This image is based on [kooldev/php](https://github.com/kool-dev/docker-php), please refer to that repo README for further documentation.

## Available Tags

### 8.1

- [8.1-nginx-sqlsrv](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.1-nginx-sqlsrv/Dockerfile)
- [8.1-nginx-sqlsrv-prod](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.1-nginx-sqlsrv-prod/Dockerfile)

### 8.2

- [8.2-nginx-sqlsrv](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.2-nginx-sqlsrv/Dockerfile)
- [8.2-nginx-sqlsrv-prod](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.2-nginx-sqlsrv-prod/Dockerfile)

### 8.3

- [8.3-nginx-sqlsrv](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.3-nginx-sqlsrv/Dockerfile)
- [8.3-nginx-sqlsrv-prod](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.3-nginx-sqlsrv-prod/Dockerfile)

### 8.4

- [8.4-nginx-sqlsrv](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.4-nginx-sqlsrv/Dockerfile)
- [8.4-nginx-sqlsrv-prod](https://github.com/kool-dev/docker-php-sqlsrv/blob/main/8.4-nginx-sqlsrv-prod/Dockerfile)

## Environment Variables

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

### NGINX

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

## Usage

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

## Contributing

### Update images with templates

The Dockerfile's are automatically managed by `fwd-template.json` configuration file and files in the `template` folder. We should always make changes directly to these files.

After any changes, we need to run `kool run template` to parse the templates and generate folder/files for each version.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
