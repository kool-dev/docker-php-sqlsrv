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

## Rebuilds and validation

CI rebuilds on `docker-php-updated` repository dispatches, using
`docker build --pull` to refresh the parent image. The upstream PHP repository's
scheduled parent rebuilds propagate here after successful publication; this
repository has no separate rebuild cron. Dispatch delivery requires the upstream
PHP repository's dispatch credentials and recipient configuration. If delivery
fails, recover with this workflow's manual `workflow_dispatch` on `main`.
Only builds on this repository's `main` branch publish images; PRs do not.

To validate a local build:

```sh
python3 tests/check-generated.py
docker build --pull -t sqlsrv-test 8.4-nginx-sqlsrv
bash tests/test-image.sh sqlsrv-test 8.4-nginx-sqlsrv/Dockerfile
```

The smoke test checks PHP against the freshly pulled parent, both SQLSRV
extensions, PDO registration, and native ODBC 17 loading through failed
loopback connections. It does not test authentication, queries, TLS, or a live
SQL Server. SQLSRV/PDO_SQLSRV are pinned to 5.12.0 for PHP 8.1/8.2 and 5.13.3
for newer variants because 5.13 requires PHP 8.3 or later.

These images remain **amd64-only**: the template downloads Microsoft's x64
ODBC 17 APKs with `--allow-untrusted` and no independent checksum/signature
verification. Driver modernization and ARM support require separate vendor
compatibility and provenance validation. PHP 8.1 is retained for compatibility,
but is upstream EOL; successful builds do not restore security support.
After merging, maintainers must publish and verify every supported tag's
runtime version and digest before considering stale published images fixed.
