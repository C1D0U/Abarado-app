<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My App</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/products" :active="request()->is('products*')">Products</x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/users" :active="request()->is('users*')">Users</x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>