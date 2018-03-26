### Requirements

* PHP 7.1+
* Composer

### Installion

1. Install packages
```
composer install
```

### Run

1a. Start as server
```
php -S localhost:8000 input.php
```

1b. Configure web-server to entry point `input.php`

2. Send JSON message (Content-Type: application/json)

Example:
```json
{
    "job": {
        "text": "Привет, мне на <a href=\"test@test.ru\">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!",
        "methods": [
            "stripTags", "removeSpaces", "replaceSpacesToEol", "htmlspecialchars", "removeSymbols", "toNumber"
        ]
    }
}

```

### Tests

1. Run

```
./vendor/bin/phpunit
```