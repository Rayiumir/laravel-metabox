# Text Field

### Request

Request Validation field.

```php
'text_field' => ['required', 'string', 'max:255'],
```

### Controller

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

### Controller

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

### Request :

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
### Controller

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

# Toggle Field

### Controller

To create a `addMetabox` Toggle field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    
    $post->addMetabox('toggle_field', $request->input('toggle_field'));
        
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));

    $post->addMetabox('toggle_field', $request->input('toggle_field'));

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
        <x-ToggleMetabox
            name="toggle_field"
            label="Enable / Disable"
            on-value="1"
            off-value="0"
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
        <x-ToggleMetabox
            name="toggle_field"
            label="Enable / Disable"
            :checked="$post->getMetabox('toggle_field') === '1'"
            on-value="1"
            off-value="0"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
@if($post->getMetabox('toggle_field') === '1')
    <span class="badge active">Enable</span>
@else
    <span class="badge">Disable</span>
@endif
```

# Radio Field

### Controller

To create a `addMetabox` Radio field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    
    $post->addMetabox('radio_field', $request->input('radio_field'));
        
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));

    $post->addMetabox('radio_field', $request->input('radio_field'));

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
        <x-RadioMetabox
            name="radio_field"
            :options="[
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived'
                ]"
            orientation="horizontal"
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
        <x-RadioMetabox
            name="radio_field"
            :options="[
                'draft' => 'Draft',
                'published' => 'Published',
                'archived' => 'Archived'
            ]"
            :selected="$post->getMetabox('radio_field')"
            orientation="horizontal"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
@php
    $statusLabels = [
        'draft' => 'Draft',
        'published' => 'Published',
        'archived' => 'Archived'
    ];
    $currentStatus = $post->getMetabox('radio_field');
@endphp

@if($currentStatus)
    <span class="badge {{ $currentStatus }}">
        {{ $statusLabels[$currentStatus] ?? $currentStatus }}
    </span>
@endif
```

# Tabs Field

### Views

- create.blade.php and edit.blade.php

```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <x-TabMetabox :tabs="[
            'general' => 'General Settings',
            'advanced' => 'Advanced Options',
            'seo' => 'SEO Settings'
        ]">
        <div id="tab-general" class="MetaboxTabPane active">
            General settings content
        </div>

        <div id="tab-advanced" class="MetaboxTabPane">
            Advanced options content
        </div>

        <div id="tab-seo" class="MetaboxTabPane">
            SEO settings content
        </div>
    </x-TabMetabox>
    </div>
    <button type="submit">Save</button>
</form>
```

# Radio Field

### Request

```php
'gallery_field.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
```

### Controller

To create a `addMetabox` Radio field in store and update, do the following.

```php
public function store(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));
    
    $gallery = json_decode($post->getMetabox('gallery_field'), true) ?? [];

    if ($request->hasFile('gallery_field')) {
        foreach ($request->file('gallery_field') as $file) {
            $path = $file->store('gallery', 'public');
            $gallery[] = $path;
        }
    }

    if ($request->post_gallery_existing) {
        $existing = array_filter($request->post_gallery_existing);
        $gallery = array_merge($existing, $gallery);
    }

    $post->addMetabox('gallery_field', json_encode(array_unique($gallery)));
        
    return back();
}

public function update(Request $request, Post $post)
{
    $post->update($request->only(['title', 'content']));

    $gallery = json_decode($post->getMetabox('gallery_field'), true) ?? [];

    if ($request->hasFile('gallery_field')) {
        foreach ($request->file('gallery_field') as $file) {
            $path = $file->store('gallery', 'public');
            $gallery[] = $path;
        }
    }

    if ($request->post_gallery_existing) {
        $existing = array_filter($request->post_gallery_existing);
        $gallery = array_merge($existing, $gallery);
    }

    $post->addMetabox('gallery_field', json_encode(array_unique($gallery)));

    return back();
}
```

### Views

`limit` : Limit on the number of images displayed

- create.blade.php

```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <x-GalleryMetabox
            name="gallery_field"
            :limit="10"
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
        <x-GalleryMetabox
            name="gallery_field"
            :images="$post->getMetabox('gallery_field')"
            :limit="10"
        />
    </div>
    <button type="submit">Save</button>
</form>
```

### Display Metabox Data

To display metabox data in your views, use the `getMetabox` method:

```php
@php
    $galleryData = json_decode($row->getMetabox('gallery_field'), true) ?? [];
@endphp

@foreach($galleryData as $imagePath)
    @if(Storage::disk('public')->exists($imagePath))
        <div class="gallery-item">
            <img src="{{ asset('storage/'.$imagePath) }}" alt="Gallery Image">
        </div>
    @endif
@endforeach
```




