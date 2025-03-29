<div>
    <div class="RadioMetabox RadioOrientation-{{ $orientation ?? 'vertical' }}">
        @foreach($options as $value => $label)
            <label class="RadioOption">
                <input
                    type="radio"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $selected == $value ? 'checked' : '' }}
                    class="RadioInput"
                >
                <span class="RadioLabel">{{ $label }}</span>
            </label>
        @endforeach
    </div>

    <style>
        .RadioMetabox {
            margin: 15px 0;
            font-family: Arial, sans-serif;
        }

        .RadioOption {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            cursor: pointer;
        }

        .RadioInput {
            margin-right: 10px;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .RadioLabel {
            font-size: 14px;
            color: #333;
        }

        /* Horizontal layout */
        .RadioOrientation-horizontal .RadioOption {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 0;
        }
    </style>
</div>
