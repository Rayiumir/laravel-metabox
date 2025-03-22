# Text Field

## Controller:

To create a `addMetabox` field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    $post->addMetabox('text_field', $request->input('text_field'));
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    $post->addMetabox('text_field', $request->input('text_field'));
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
        <label for="text_field">Metabox Field</label>
        <input type="text" name="text_field" id="text_field">
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
        <label for="text_field">Metabox Field</label>
        <input type="text" name="text_field" id="text_field" value="{{ $post->getMetabox('text_field') }}">
    </div>
    <button type="submit">Save</button>
</form>
```

## Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
Text Field: {{ $post->getMetabox('text_field') }}
```
