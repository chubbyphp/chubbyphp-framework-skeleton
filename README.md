# chubbyphp-framework-skeleton

[![CI](https://github.com/chubbyphp/chubbyphp-framework-skeleton/workflows/CI/badge.svg?branch=master)](https://github.com/chubbyphp/chubbyphp-framework-skeleton/actions?query=workflow%3ACI)
[![Coverage Status](https://coveralls.io/repos/github/chubbyphp/chubbyphp-framework-skeleton/badge.svg?branch=master)](https://coveralls.io/github/chubbyphp/chubbyphp-framework-skeleton?branch=master)
[![Infection MSI](https://badge.stryker-mutator.io/github.com/chubbyphp/chubbyphp-framework-skeleton/master)](https://dashboard.stryker-mutator.io/reports/github.com/chubbyphp/chubbyphp-framework-skeleton/master)

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

 * php: ^8.0
 * [chubbyphp/chubbyphp-clean-directories][20]: ^1.2
 * [chubbyphp/chubbyphp-framework][21]: ^5.0.1
 * [chubbyphp/chubbyphp-framework-router-fastroute][22]: ^2.0
 * [chubbyphp/chubbyphp-laminas-config][23]: ^1.3
 * [monolog/monolog][24]: ^2.3.5
 * [psr/container][25]: ^1.1.2|^2.0.2
 * [psr/http-factory][26]: ^1.0.1
 * [psr/http-message][27]: ^1.0.1
 * [psr/http-server-handler][28]: ^1.0.1
 * [psr/http-server-middleware][29]: ^1.0.1
 * [psr/log][30]: ^1.1.4|^2.0|^3.0
 * [slim/psr7][31]: ^1.5
 * [symfony/console][32]: ^4.4.38|^5.4.5|^6.0

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-framework-skeleton][10].

```bash
composer create-project chubbyphp/chubbyphp-framework-skeleton myproject "dev-master"
```

## Server

### Builtin

```bash
APP_ENV=dev php -S localhost:10080 -t public public/index.php
```

## Copyright

2023 Dominik Zogg

[10]: https://travis-ci.org/chubbyphp/chubbyphp-framework-skeleton

[20]: https://packagist.org/packages/chubbyphp/chubbyphp-clean-directories
[21]: https://packagist.org/packages/chubbyphp/chubbyphp-framework
[22]: https://packagist.org/packages/chubbyphp/chubbyphp-framework-router-fastroute
[23]: https://packagist.org/packages/chubbyphp/chubbyphp-laminas-config
[24]: https://packagist.org/packages/monolog/monolog
[25]: https://packagist.org/packages/psr/container
[26]: https://packagist.org/packages/psr/http-factory
[27]: https://packagist.org/packages/psr/http-message
[28]: https://packagist.org/packages/psr/http-server-handler
[29]: https://packagist.org/packages/psr/http-server-middleware
[30]: https://packagist.org/packages/psr/log
[31]: https://packagist.org/packages/slim/psr7
[32]: https://packagist.org/packages/symfony/console
