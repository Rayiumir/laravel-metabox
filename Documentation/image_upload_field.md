# Image Upload Field

## Controller:

To create a `uploadImageMetabox` field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    if ($request->hasFile('img_field')) {
       $post->uploadImageMetabox('img_field', $request->file('img_field'));
    }
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    if ($request->hasFile('img_field')) {
        $post->uploadImageMetabox('img_field', $request->file('img_field'));
    }
    return back();
}
```

## Views

### create.blade.php

```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <x-ImageUploadMetabox name="img_field" />
    </div>
    <button type="submit">Save</button>
</form>
```

### edit.blade.php

```html
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        <x-ImageUploadMetabox name="img_field" :value="$post->getMetabox('img_field') ?? null" />
    </div>
    <button type="submit">Save</button>
</form>
```
## The Public Disk

To create the symbolic link, Enter the following command.

```bash
php artisan storage:link
```

## Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
@if ($post->getMetabox('img_field'))
    <img src="{{ asset('storage/' . $post->getMetabox('img_field')) }}" alt="Image Preview" style="max-width: 100%;">
@else
    <p>No image available.</p>
@endif
```

