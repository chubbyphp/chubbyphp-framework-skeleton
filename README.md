# chubbyphp-framework-skeleton

[![CI](https://github.com/chubbyphp/chubbyphp-framework-skeleton/actions/workflows/ci.yml/badge.svg)](https://github.com/chubbyphp/chubbyphp-framework-skeleton/actions/workflows/ci.yml)
[![Coverage Status](https://coveralls.io/repos/github/chubbyphp/chubbyphp-framework-skeleton/badge.svg?branch=master)](https://coveralls.io/github/chubbyphp/chubbyphp-framework-skeleton?branch=master)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fchubbyphp%2Fchubbyphp-framework-skeleton%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/chubbyphp/chubbyphp-framework-skeleton/master)

[![bugs](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=bugs)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![code_smells](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=code_smells)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![coverage](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=coverage)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![duplicated_lines_density](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![ncloc](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=ncloc)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![sqale_rating](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![alert_status](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=alert_status)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![reliability_rating](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![security_rating](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=security_rating)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![sqale_index](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=sqale_index)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)
[![vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-framework-skeleton&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-framework-skeleton)

## Description

A minimal skeleton to start with a minimal php project.

## Requirements

 * php: ^8.2
 * [chubbyphp/chubbyphp-clean-directories][20]: ^1.4
 * [chubbyphp/chubbyphp-framework][21]: ^5.2
 * [chubbyphp/chubbyphp-framework-router-fastroute][22]: ^2.2
 * [chubbyphp/chubbyphp-laminas-config][23]: ^1.4
 * [monolog/monolog][24]: ^3.8.1
 * [slim/psr7][25]: ^1.7
 * [symfony/console][26]: ^7.2.1

## Environment

Add the following environment variable to your system, for example within `~/.bash_aliases`:

```sh
export USER_ID=$(id -u)
export GROUP_ID=$(id -g)
```

### Docker

```sh
docker-compose up -d
docker-compose exec php bash
```

## Setup

```sh
composer install
```

## Urls

* GET https://localhost/ping

## Copyright

2025 Dominik Zogg

[10]: https://travis-ci.org/chubbyphp/chubbyphp-framework-skeleton

[20]: https://packagist.org/packages/chubbyphp/chubbyphp-clean-directories
[21]: https://packagist.org/packages/chubbyphp/chubbyphp-framework
[22]: https://packagist.org/packages/chubbyphp/chubbyphp-framework-router-fastroute
[23]: https://packagist.org/packages/chubbyphp/chubbyphp-laminas-config
[24]: https://packagist.org/packages/monolog/monolog
[25]: https://packagist.org/packages/slim/psr7
[26]: https://packagist.org/packages/symfony/console
