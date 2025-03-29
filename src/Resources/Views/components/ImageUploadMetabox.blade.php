<div>
    <div class="imageUploadMetabox">
        <label for="{{ $name }}">Upload Image</label>
        <input type="file" name="{{ $name }}" id="{{ $name }}" accept="image/*">

        @if ($value)
            <div class="imagePreview">
                <img src="{{ asset('storage/' . $value) }}" alt="Image Preview" style="max-width: 100%; height: auto;">
                <button type="button" class="removeImage">X</button>
            </div>
        @endif
    </div>

    <style>
        .imageUploadMetabox {
            margin-bottom: 20px;
        }

        .imagePreview {
            margin-top: 10px;
            position: relative;
            display: inline-block;
        }

        .removeImage {
            position: absolute;
            top: 0;
            right: 0;
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
        }

        .removeImage:hover {
            background-color: #cc0000;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('imgField');
            const imagePreview = document.querySelector('.imagePreview');
            const removeButton = document.querySelector('.removeImage');

            if (fileInput && imagePreview) {
                fileInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.querySelector('img').src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            if (removeButton) {
                removeButton.addEventListener('click', function () {
                    fileInput.value = '';
                    imagePreview.style.display = 'none';
                });
            }
        });
    </script>
</div>
