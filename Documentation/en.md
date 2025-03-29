# Text Field

### Request

Request Validation field.

```php
'text_field' => ['required', 'string', 'max:255'],
```

### Controller:

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

### Views

- create.blade.php

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

- edit.blade.php

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

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
Text Field: {{ $post->getMetabox('text_field') }}
```

# File Upload Field

### Request

Request Validation field.

```php
'img_field' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
```

### Controller:

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

### Views

- create.blade.php

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

- edit.blade.php

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
### The Public Disk

To create the symbolic link, Enter the following command.

```bash
php artisan storage:link
```

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
@if ($post->getMetabox('img_field'))
    <img src="{{ asset('storage/' . $post->getMetabox('img_field')) }}" alt="Image Preview" style="max-width: 100%;">
@else
    <p>No image available.</p>
@endif
```

# Select Field

### Request

Request Validation field.

```php
'select_field' => 'nullable|string',
```
### Controller:

To create a `addMetabox` Select field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    
    if ($request->has('select_field')) {
       $post->addMetabox('select_field', $request->input('select_field'));
    }
        
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    if ($request->has('select_field')) {
        $post->addMetabox('select_field', $request->input('select_field'));
    }
    return back();
}
```

### Views

- create.blade.php

```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <x-select-metabox
            name="select_field"
            :options="[
                'news' => 'News',
                'tutorial' => 'Tutorial',
                'event' => 'Event',
            ]"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

- edit.blade.php

```html
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        <x-select-metabox
            name="select_field"
            :options="[
                'news' => 'News',
                'tutorial' => 'Tutorial',
                'event' => 'Event',
            ]"
            :selected="$post->getMetabox('category') ?? null"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
{{ $post->getMetabox('select_field') ?? 'No category selected' }}
```

# Checkbox Field

### Request

Request Validation field.

```php
'checkbox_field' => 'nullable|boolean',
```
### Controller:

To create a `addMetabox` Checkbox field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    
    $post->addMetabox('checkbox_field', $request->has('checkbox_field') ? '1' : '0');
        
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));

    $post->addMetabox('checkbox_field', $request->has('checkbox_field') ? '1' : '0');

    return back();
}
```

### Views

- create.blade.php

```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <x-CheckboxMetabox
            name="checkbox_field"
            label="Enable / Disable"
            value="1"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

- edit.blade.php

```html
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        <x-CheckboxMetabox
            name="checkbox_field"
            label="Enable / Disable"
            :checked="$post->getMetabox('checkbox_field') === '1'"
            value="1"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
@if($post->getMetabox('checkbox_field') === '1')
    <span class="badge">Enable</span>
@else
    <span class="badge">Disable</span>
@endif
```

