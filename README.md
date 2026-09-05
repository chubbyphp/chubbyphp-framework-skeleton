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

 * php: ^8.3
 * [chubbyphp/chubbyphp-clean-directories][20]: ^1.5.3
 * [chubbyphp/chubbyphp-framework][21]: ^6.1.2
 * [chubbyphp/chubbyphp-framework-router-fastroute][22]: ^2.3.5
 * [chubbyphp/chubbyphp-laminas-config][23]: ^1.5.3
 * [monolog/monolog][24]: ^3.11.0
 * [slim/psr7][25]: ^1.8
 * [symfony/console][26]: ^7.4.18|^8.1.6

## Environment

Add the following environment variable to your system, for example within `~/.bashrc` or  `~/.zshrc`:

```sh
export USER_ID=$(id -u)
export GROUP_ID=$(id -g)
```

### Mount points

Creates every file which gets mounted into the php container (shell rc/history, git, ssh, npm and the coding
agent auth/settings files) without overwriting existing ones. Adjust the seeded settings files afterwards to your
liking, they stay on the host and get mounted.

```sh
./setup-mount-points.sh
```

### Coding agents

The following coding agents (harnesses) are preinstalled within the php container, their auth and settings files
get mounted from the host (see `docker-compose.yml`):

 * [Claude Code](https://www.npmjs.com/package/@anthropic-ai/claude-code): `~/.claude.json`, `~/.claude/.credentials.json`, `~/.claude/settings.json`
 * [Codex](https://www.npmjs.com/package/@openai/codex): `~/.codex/auth.json`, `~/.codex/config.toml`
 * [Opencode](https://www.npmjs.com/package/opencode-ai): `~/.config/opencode/opencode.jsonc`, `~/.config/opencode/tui.json`, `~/.local/share/opencode/auth.json`
 * [PI](https://www.npmjs.com/package/@earendil-works/pi-coding-agent) incl. [pi-llama](https://github.com/huggingface/pi-llama): `~/.pi/agent/auth.json`

#### llama.cpp

PI can run against a local model via [pi-llama](https://github.com/huggingface/pi-llama), start a
[llama.cpp](https://llama.app/) server on the host, for example:

```sh
llama-server \
    -hf lmstudio-community/Qwen3.6-35B-A3B-GGUF:Q4_K_M \
    -c 32768 \
    -ngl 999 \
    --flash-attn on \
    --host 0.0.0.0 \
    --port 9931
```

### Docker

```sh
docker compose up -d
docker compose exec php bash
```

## Setup

```sh
composer install
```

## Urls

* GET https://localhost/ping

## Copyright

2026 Dominik Zogg

[10]: https://travis-ci.org/chubbyphp/chubbyphp-framework-skeleton

[20]: https://packagist.org/packages/chubbyphp/chubbyphp-clean-directories
[21]: https://packagist.org/packages/chubbyphp/chubbyphp-framework
[22]: https://packagist.org/packages/chubbyphp/chubbyphp-framework-router-fastroute
[23]: https://packagist.org/packages/chubbyphp/chubbyphp-laminas-config
[24]: https://packagist.org/packages/monolog/monolog
[25]: https://packagist.org/packages/slim/psr7
[26]: https://packagist.org/packages/symfony/console
