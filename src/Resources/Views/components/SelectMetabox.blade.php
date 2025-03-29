<div>
    <div class="SelectMetabox">
        <label for="{{ $name }}">{{ ucfirst(str_replace('_', ' ', $name)) }}</label>
        <select name="{{ $name }}" id="{{ $name }}">
            @foreach ($options as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <style>
        .SelectMetabox {
            margin-bottom: 20px;
        }

        .SelectMetabox label {
            display: block;
            margin-bottom: 5px;
        }

        .SelectMetabox select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</div>
