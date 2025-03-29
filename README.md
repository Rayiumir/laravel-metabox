<div align="center">
    <a href="https://github.com/Rayiumir/laravel-metabox" target="_blank">
        <img src="./art/Laravel-Metabox.png" alt="Laravel Metabox Logo">
    </a>
</div>
<br>
<div align="center">
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dd/rayiumir/laravel-metabox">
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dm/rayiumir/laravel-metabox">
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/rayiumir/laravel-metabox">
    <img alt="Packagist License" src="https://img.shields.io/packagist/l/rayiumir/laravel-metabox">
    <img alt="GitHub Release" src="https://img.shields.io/github/v/release/rayiumir/laravel-metabox">
    <img alt="Packagist Dependency Version" src="https://img.shields.io/packagist/dependency-v/rayiumir/laravel-metabox/PHP">
</div>

<div align="center">
    <h4>Documentation</h4>
    <a href="./Documentation/en.md"><img alt="Static Badge" src="https://img.shields.io/badge/en-lang?style=flat-square&label=Doc"></a>
</div>

# Laravel Metabox

MetaBox is a highly useful feature for retrieving or displaying WordPress information. We decided to bring this Meta Box functionality to Laravel. With Laravel Meta Box, you can define features such as custom fields for posts without the need to create a custom field table in the database.

# Installs

Install Package:

```bash
composer require rayiumir/laravel-metabox
```

After Publish Files:

```bash
php artisan vendor:publish --provider="Rayiumir\\LaravelMetabox\\ServiceProvider\\MetaboxServiceProvider"
```

And Migration Database:

```bash
php artisan migrate
```

# How to use

Calling `HasMetaboxes` in Models `Post.php`:

```php
use Rayiumir\LaravelMetabox\Traits\HasMetaboxes;

use HasMetaboxes;
```

To delete post metabox data, place the following function in `Post.php`:

```php
protected static function boot(): void
{
    parent::boot();

    static::deleting(function ($post) {
        $post->metaboxes()->delete();
    });
}
```

# Task Laravel Metabox

- [X] Text Field
- [X] Upload Field
- [X] Select Field
- [X] Checkbox Field
- [ ] Toggle Field
- [ ] Radio ‌Button Field
- [ ] Tabs Field
- [ ] Gallery Image Field


