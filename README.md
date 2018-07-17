# Services

Server Services Status Checker

### Installing

Installing with git will pull latest development version

```sh
git clone https://github.com/Maslosoft/Services.git
```

Or by composer to install stable version

```sh
composer create-project maslosoft/services
```

### Configuring

Edit file `services.json`. This file contans simple JSON structure containing
service names as keys and whether to check as values.

For example to check `mysql` and `amavis` this file should have following content:

```json
{
    "amavis": true,
    "mysql": true
}
```

#### Quick Start

Navigate to folder containing this project and start PHP server:

```sh
php -S localhost:8080
```

Now navigate to http://localhost:8080 You should no see list of running
services according to `services.json` config. The output format is also JSON
similar to configuration file. The values indicate whether the service is running.


