# Nova Publishable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creode/nova-publishable.svg?style=flat-square)](https://packagist.org/packages/creode/nova-publishable)
[![Total Downloads](https://img.shields.io/packagist/dt/creode/nova-publishable.svg?style=flat-square)](https://packagist.org/packages/creode/nova-publishable)

This package provides an integration between the [Laravel Publishable](https://github.com/jaymeh/laravel-publishable) package and Nova.

## Installation

```bash
composer require creode/nova-publishable
```

## Usage
To use the field, you must first add the `Publishable` trait to your model.

```php
use PawelMysior\Publishable\Publishable;

class Post extends Model
{
    use Publishable;
}
```

Then, you can add the field to your Nova resource.

```php
use Creode\LaravelPublishable\Published;

class Post extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            // ...

            Published::make('Published', 'published_at'),
        ];
    }
}
```

### Publish/Unpublish Actions
This package also provides actions to publish and unpublish resources. To use these, you must add the `Publishable` trait to your model as above.

Then you can add the following actions to your Nova resource.

```php
use Creode\NovaPublishable\Actions\PublishAction;
use Creode\NovaPublishable\Actions\UnpublishAction;

class Post extends Resource
{
    // ...

    public function actions(Request $request)
    {
        return [
            // ...

            new PublishAction,
            new UnpublishAction,
        ];
    }
}
```

## Roadmap
- [ ] Add tests with Dusk
- [ ] Improve the field by allowing the user to schedule resources by specify a publishable date via a secondary field

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Creode](https://github.com/creode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

