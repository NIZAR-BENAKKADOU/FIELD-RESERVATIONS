<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="border-color: #FFA500;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo class="d-block h-9 w-auto text-gray-800 dark:text-gray-200" />
        </a>
        <div class="search-bar ms-3">
            <form class="d-flex" action="{{ route('terrains.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search for the field" class="form-control me-2"
                    value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary"
                    style="background-color: #FFA500; border-color: #FFA500;">Search</button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer"
                    viewBox="0 0 16 16">
                    <path
                        d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5 5 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334" />
                </svg>
            </form>
        </div>

        <!-- Hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: #FFA500;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Navigation Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('terrains.index') ? 'active' : '' }}"
                        href="{{ route('terrains.index') }}"
                        style="{{ request()->routeIs('terrains.index') ? 'color: #FFA500;' : '' }}">
                        {{ __('Terrain') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}"
                        style="{{ request()->routeIs('dashboard') ? 'color: #FFA500;' : '' }}">
                        {{ __('Dashboard') }}
                    </a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->nom }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Responsive Navigation Menu -->
<div class="d-lg-none">
    <div class="pt-2 pb-3">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"
            style="{{ request()->routeIs('dashboard') ? 'color: #FFA500;' : '' }}">
            {{ __('Dashboard') }}
        </a>
    </div>
    <div class="pt-4 pb-1 border-top" style="border-color: #FFA500;">
        <div class="px-4">
            <div class="fw-bold">{{ Auth::user()->name }}</div>
            <div class="text-muted">{{ Auth::user()->email }}</div>
        </div>
        <div class="mt-3">
            <a class="nav-link" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>
</div>