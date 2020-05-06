# Yark UUID
A simple trait to provide UUID support on Eloquent models.

### Installation

```composer require yarkhq/laravel-uuid-model```

### Usage

To use this in a model, add the HasUuid trait

```php
<?php

namespace App;
use YarkHQ\LaravelUuidModel\HasUuid;

class Book extends Eloquent
{
    use HasUuid;
}
```

In the default configuration, a UUID will be persisted when creating a model in the UUID column. To change the column, override the $uuidColumn property.

```php
<?php

namespace App;
use YarkHQ\LaravelUuidModel\HasUuid;

class Book extends Eloquent
{
    use HasUuid;
    protected $uuidColumn = 'uuid_key';
}
```

Route keys will also be set automatically so you can create a route and use UUIDs. If you want to change this then override the $routeKeyName property in your model.

```php
<?php

namespace App;
use YarkHQ\LaravelUuidModel\HasUuid;

class Book extends Eloquent
{
    use HasUuid;
    protected $routeKeyName = 'slug';
}
```

### Creating Migrations

This package also includes a small helper to add a uuid column to an existing model. This is entirely optional and we would suggest including a UUID column within your migrations when you create a table.

```php
$table->uuid('uuid');
```

To run the command, use uuid:migration with the table name.

```php artisan uuid:migration books```

This will place a migration in your migrations directory which will add a uuid column. You will still need to migrate the database yourself.

### License

Licensed under the MIT license
