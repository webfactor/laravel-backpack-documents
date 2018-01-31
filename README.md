# LaravelBackpackDocuments

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Ready to use Documents Backpack CRUD with API route for eg. privacy statement, imprint, sbt or gtc.

## Install

Via Composer

``` bash
$ composer require webfactor/laravel-backpack-documents
```

Publish the vendor files

``` bash
$ php artisan vendor:publish --provider="Webfactor\LaravelBackpackDocuments\LaravelBackpackDocumentsServiceProvider"
```

Run the migration

``` bash
$ php artisan migrate
```

\[optional but recommended\] add a menu item to your `sidebar.blade.php`

``` html
<li><a href="{{ url(config('webfactor.documents.backend.route_prefix').'/'.config('webfactor.documents.backend.route') }}"><i class="fa fa-file-o"></i> <span>trans('webfactor::entity_name_plural')</span></a></li>
```

## Usage

### Backend
Go to the defined route (default: wfcms/document) and edit your documents like in Backpack CRUD

### Api
Send a GET-request to the api route (default: api/v1/documents) with headers
* Content-Type: application-json
* Accept: application-json
and get your documents array as JSON.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email oliver.ziegler@webfactor.de instead of using the issue tracker.

## Credits

- [Oliver Ziegler][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/webfactor/laravel-backpack-documents.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/webfactor/laravel-backpack-documents/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/webfactor/laravel-backpack-documents.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/webfactor/laravel-backpack-documents.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/webfactor/laravel-backpack-documents.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/webfactor/laravel-backpack-documents
[link-travis]: https://travis-ci.org/webfactor/laravel-backpack-documents
[link-scrutinizer]: https://scrutinizer-ci.com/g/webfactor/laravel-backpack-documents/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/webfactor/laravel-backpack-documents
[link-downloads]: https://packagist.org/packages/webfactor/laravel-backpack-documents
[link-author]: https://github.com/OliverZiegler
[link-contributors]: ../../contributors
