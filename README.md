<div align="center">
    <a href="https://github.com/Rayiumir/laravel-metabox" target="_blank">
        <img src="./art/Laravel-Metabox.png" alt="Laravel Metabox Logo">
    </a>
</div>

# Laravel Metabox

Meta Box is a highly useful feature for retrieving or displaying WordPress information. We decided to bring this Meta Box functionality to Laravel. With Laravel Meta Box, you can define features such as custom fields for posts without the need to create a custom field table in the database.

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

# Controller:

To create a addMetabox field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));

    $post->addMetabox('metabox_field', $request->input('metabox_field'));

    return back();
}

public function update(Request $request, Post $post)
{

    $post->update($request->only(['title', 'content']));

    $post->addMetabox('metabox_field', $request->input('metabox_field'));

    return back();
}
```

## Views

### create.blade.php

```php
<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>


    <div>
        <label for="metabox_field">Metabox Field</label>
        <input type="text" name="metabox_field" id="metabox_field">
    </div>

    <button type="submit">Save</button>
</form>
```

### edit.blade.php

```php
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>


    <div>
        <label for="metabox_field">Metabox Field</label>
        <input type="text" name="metabox_field" id="metabox_field" value="{{ $post->getMetabox('metabox_field') }}">
    </div>

    <button type="submit">Save</button>
</form>
```

# Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
Metabox Field: {{ $post->getMetabox('metabox_field') }}
```