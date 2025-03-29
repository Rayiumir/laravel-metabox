<div>
    <div class="GalleryMetabox">
        <input type="file"
               name="{{ $name }}[]"
               id="{{ $name }}_upload"
               multiple
               accept="image/*"
               style="display: none;"
               @if($limit > 0) data-limit="{{ $limit }}" @endif>

        <div class="GalleryActions">
            <button type="button" class="AddGalleryImages">
                Add Images
            </button>
            @if($limit > 0)
                <span class="GalleryCounter">(Max {{ $limit }} images)</span>
            @endif
        </div>

        <div class="GalleryPreview">
            @foreach($images as $index => $image)
                <div class="GalleryItem" data-index="{{ $index }}">
                    <img src="{{ asset('storage/'.$image) }}" alt="Gallery Image">
                    <button type="button" class="RemoveImage" title="Remove image">
                        ×
                    </button>
                    <input type="hidden" name="{{ $name }}_existing[]" value="{{ $image }}">
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .GalleryMetabox {
            margin: 20px 0;
        }

        .GalleryActions {
            margin-bottom: 15px;
        }

        .GalleryPreview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .GalleryItem {
            position: relative;
            width: 100px;
            height: 100px;
            border: 1px solid #ddd;
        }

        .GalleryItem img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .RemoveImage {
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

        .GalleryCounter {
            margin-left: 10px;
            color: #666;
            font-size: 0.9em;
        }
        .AddGalleryImages {
            color: #fff;
            background-color: #0d6efd;
            border: 0;
            padding: 3px 10px;
            border-radius: 8px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Use event delegation for dynamic elements
            document.addEventListener('click', function(e) {
                // Remove image button
                if (e.target.classList.contains('RemoveImage')) {
                    e.preventDefault();
                    e.target.closest('.GalleryItem').remove();
                }

                // Add images button
                if (e.target.classList.contains('AddGalleryImages')) {
                    document.getElementById('{{ $name }}_upload').click();
                }
            });

            // File input change handler
            const fileInput = document.getElementById('{{ $name }}_upload');
            if (fileInput) {
                fileInput.addEventListener('change', function(e) {
                    const files = e.target.files;
                    const galleryPreview = document.querySelector('.GalleryPreview');
                    const maxImages = this.dataset.limit || 0;

                    if (maxImages > 0 &&
                        galleryPreview.querySelectorAll('.GalleryItem').length + files.length > maxImages) {
                        alert(`Maximum ${maxImages} images allowed`);
                        return;
                    }

                    Array.from(files).forEach(file => {
                        if (!file.type.startsWith('image/')) return;

                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const div = document.createElement('div');
                            div.className = 'GalleryItem';
                            div.innerHTML = `
                                <img src="${event.target.result}">
                                <button class="RemoveImage">×</button>
                            `;
                            galleryPreview.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            }
        });
    </script>
</div>
