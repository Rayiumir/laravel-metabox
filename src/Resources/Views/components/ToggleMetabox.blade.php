<div>
    <div class="ToggleMetabox">
        <label class="ToggleSwitch">
            <input
                type="checkbox"
                name="{{ $name }}"
                value="{{ $onValue }}"
                {{ $checked ? 'checked' : '' }}
                class="ToggleInput"
            >
            <span class="ToggleSlider"></span>
        </label>
        <span class="ToggleLabel">{{ $label }}</span>
        <input type="hidden" name="{{ $name }}" value="{{ $offValue }}" disabled>
    </div>
    <style>
        .ToggleMetabox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 15px 0;
        }

        .ToggleSwitch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .ToggleInput {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .ToggleSlider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .ToggleSlider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        .ToggleInput:checked + .ToggleSlider {
            background-color: #2196F3;
        }

        .ToggleInput:checked + .ToggleSlider:before {
            transform: translateX(26px);
        }

        .ToggleLabel {
            font-weight: 500;
            color: #333;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.ToggleInput').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const hiddenInput = this.closest('.ToggleMetabox')
                        .querySelector('input[type="hidden"]');
                    hiddenInput.disabled = this.checked;
                });
            });
        });
    </script>
</div>
