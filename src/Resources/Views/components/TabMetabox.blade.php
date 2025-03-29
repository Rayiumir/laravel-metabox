<div>
    <div class="MetaboxTabs">
        <ul class="MetaboxTabsNav">
            @foreach($tabs as $tabId => $tabLabel)
                <li class="{{ $activeTab == $tabId ? 'active' : '' }}">
                    <a href="#{{ $tabPrefix.$tabId }}" data-tab="{{ $tabId }}">
                        {{ $tabLabel }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="MetaboxTabsContent">
            {{ $slot }}
        </div>
    </div>

    <style>
        .MetaboxTabs {
            margin: 20px 0;
            border: 1px solid #ddd;
            background: #fff;
        }

        .MetaboxTabsNav {
            margin: 0;
            padding: 0;
            list-style: none;
            border-bottom: 1px solid #ddd;
            background: #f5f5f5;
            display: flex;
        }

        .MetaboxTabsNav li {
            margin: 0;
        }

        .MetaboxTabsNav li a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #555;
            border-right: 1px solid #ddd;
        }

        .MetaboxTabsNav li.active a {
            background: #fff;
            color: #000;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
        }

        .MetaboxTabsContent {
            padding: 15px;
        }

        .MetaboxTabPane {
            display: none;
        }

        .MetaboxTabPane.active {
            display: block;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.MetaboxTabsNav a');

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const tabId = this.getAttribute('data-tab');
                    const tabPrefix = '{{ $tabPrefix }}';

                    localStorage.setItem('lastActiveTab', tabId);

                    document.querySelectorAll('.MetaboxTabsNav li').forEach(li => {
                        li.classList.remove('active');
                    });
                    this.parentNode.classList.add('active');

                    document.querySelectorAll('.MetaboxTabPane').forEach(pane => {
                        pane.classList.remove('active');
                    });
                    document.getElementById(tabPrefix + tabId).classList.add('active');
                });
            });

            if (localStorage.getItem('lastActiveTab')) {
                const lastTab = localStorage.getItem('lastActiveTab');
                const tabLink = document.querySelector(`.MetaboxTabsNav a[data-tab="${lastTab}"]`);
                if (tabLink) tabLink.click();
            }
        });
    </script>
</div>
