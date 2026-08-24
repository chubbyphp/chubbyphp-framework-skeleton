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
 * [chubbyphp/chubbyphp-clean-directories][20]: ^1.5.2
 * [chubbyphp/chubbyphp-framework][21]: ^6.0.3
 * [chubbyphp/chubbyphp-framework-router-fastroute][22]: ^2.3.4
 * [chubbyphp/chubbyphp-laminas-config][23]: ^1.5.2
 * [monolog/monolog][24]: ^3.10
 * [slim/psr7][25]: ^1.8
 * [symfony/console][26]: ^7.4.14|^8.1.1

## Environment

Add the following environment variable to your system, for example within `~/.bashrc` or  `~/.zshrc`:

```sh
export USER_ID=$(id -u)
export GROUP_ID=$(id -g)
```

### Mount points

#### bash

```sh
touch ~/.bash_docker
touch ~/.bash_history
```

#### zsh

```sh
touch ~/.zsh_docker
touch ~/.zsh_history
```

#### git

```sh
touch ~/.gitconfig
touch ~/.gitignore
```

#### ssh

```sh
mkdir -p ~/.ssh
touch github.pub
```

#### npm

```sh
touch ~/.npmrc
```

#### Coding agents

##### Claude

```sh
if [ ! -f ~/.claude.json ]; then
    cat > ~/.claude.json <<'EOF'
{}
EOF
fi

mkdir -p ~/.claude

if [ ! -f ~/.claude/.credentials.json ]; then
    cat > ~/.claude/.credentials.json <<'EOF'
{}
EOF
fi

if [ ! -f ~/.claude/settings.json ]; then
    cat > ~/.claude/settings.json <<'EOF'
{
    "fileCheckpointingEnabled": false,
    "permissions": {
        "defaultMode": "bypassPermissions"
    },
    "skipDangerousModePermissionPrompt": true,
    "spinnerTipsEnabled": false,
    "switchModelsOnFlag": false,
    "theme": "auto"
}
EOF
fi

chmod 600 \
    ~/.claude/.credentials.json \
    ~/.claude/settings.json
```

##### Codex

```sh
mkdir -p ~/.codex

if [ ! -f ~/.codex/auth.json ]; then
    cat > ~/.codex/auth.json <<'EOF'
{}
EOF
fi

if [ ! -f ~/.codex/config.toml ]; then
    cat > ~/.codex/config.toml <<'EOF'
approval_policy = "never"
sandbox_mode = "danger-full-access"

[notice]
hide_full_access_warning = true
EOF
fi

chmod 600 \
    ~/.codex/auth.json
    ~/.codex/config.toml
```

##### Opencode

```sh
mkdir -p ~/.config/opencode ~/.local/share/opencode

if [ ! -f ~/.config/opencode/opencode.jsonc ]; then
    cat > ~/.config/opencode/opencode.jsonc <<'EOF'
{
    "$schema": "https://opencode.ai/config.json",
    "permission": {
        "*": "allow"
    }
}
EOF
fi

if [ ! -f ~/.config/opencode/tui.json ]; then
    cat > ~/.config/opencode/tui.json <<'EOF'
{
    "$schema": "https://opencode.ai/tui.json",
    "theme": "system",
    "tips": false
}
EOF
fi

if [ ! -f ~/.local/share/opencode/auth.json ]; then
    printf '{}\n' > ~/.local/share/opencode/auth.json
fi

chmod 600 \
    ~/.config/opencode/opencode.jsonc \
    ~/.config/opencode/tui.json \
    ~/.local/share/opencode/auth.json
```

##### PI

```sh
mkdir -p ~/.pi/agent
[ ! -f ~/.pi/agent/auth.json ] && echo '{}' > ~/.pi/agent/auth.json
```

###### llama.cpp

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

2026 Dominik Zogg

[10]: https://travis-ci.org/chubbyphp/chubbyphp-framework-skeleton

[20]: https://packagist.org/packages/chubbyphp/chubbyphp-clean-directories
[21]: https://packagist.org/packages/chubbyphp/chubbyphp-framework
[22]: https://packagist.org/packages/chubbyphp/chubbyphp-framework-router-fastroute
[23]: https://packagist.org/packages/chubbyphp/chubbyphp-laminas-config
[24]: https://packagist.org/packages/monolog/monolog
[25]: https://packagist.org/packages/slim/psr7
[26]: https://packagist.org/packages/symfony/console
