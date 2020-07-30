<img src="http://114.198.129.180/uploads/-/system/group/avatar/89/photo_2020-07-26_16-13-47.jpg" data-canonical-src="http://114.198.129.180/uploads/-/system/group/avatar/89/photo_2020-07-26_16-13-47.jpg" width="200" height="200" />

# Laravel Mocker
Mock entries for easy management. Create database entries that will not show in production
# Installation
```
	composer require htech/mock-entry
```
# Usage
1. If you want to save data for testing just turn on debug mode in `.env`
 ```
    APP_DEBUG = TRUE
```
2. Add `MockEntry` trait to your models.
```
<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Htech\MockEntry\Traits\MockEntry;

class User extends Authenticatable
{
    use HasApiTokens,MockEntry;
```
3.  Add `for_testing` column with data type of tinyInteger in the table you want to use mock entries.
 ```
Schema::table([table_name], function (Blueprint $table) {
    $table->tinyInteger('for_testing')->default(1);
});
```

4. If you want to delete all mock entries in your database access this route.
`{{root}}/remove-test-data`

### Troubleshooting
- If you have problems in installing with lower versions of PHP. Try adding params `ignore-platform-reqs` in composer require
```
	composer require htech/mock-entry --ignore-platform-reqs 
```
- If configuration doesn't allow you to allow connections to the server especially in your localhost. try this command before installing the package. (Not Recommended)
```
composer config -g secure-http false
```
### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The GNU General Public License v3.0 (GNU GPLv3). Please see [License File](LICENSE.md) for more information.
