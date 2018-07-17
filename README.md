# Services

Server Services Status Checker

### Installing

Installing with git will pull latest development version

```
git clone https://github.com/Maslosoft/Services.git
```

Or by composer to install stable version

```
composer create-project maslosoft/services
```

### Configuring

Edit file services.json. This file contans simple JSON structure containing
service names as keys and whether to check as values.

For example to check `mysql` and `amavis` this file should have following content:

```
{
    "amavis": true,
    "mysql": true
}
```

#### Quick Start

Naviga to folder containing this project and start PHP server:

```
php -S localhost:8080
```

Now navigate to http://localhost:8080 You should no see list of running
services according to `services.json` config. The output format is also JSON
similar to configuration file. The values indicate whether the service is running.


