<div>
    <div class="CheckboxMetabox">
        <label>
            <input
                type="checkbox"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
            >
            {{ $label }}
        </label>
    </div>

    <style>
        .CheckboxMetabox {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 4px;
        }
        .CheckboxMetabox label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
    </style>
</div>
