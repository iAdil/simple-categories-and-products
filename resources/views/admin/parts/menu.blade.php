<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a
                    href="{{ route('admin.categories.index') }}"
                    class="{{ Request::is('*admin/categories*') ? 'is-active' : '' }}"
            >Categories</a>
        </li>
        <li>
            <a
                    href="{{ route('admin.products.index') }}"
                    class="{{ Request::is('*admin/products*') ? 'is-active' : '' }}"
            >Products</a>
        </li>
        <li>
            <a href="/">Site</a>
        </li>
    </ul>
</aside>