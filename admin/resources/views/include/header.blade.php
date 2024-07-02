<div class="modal-backdrop fade"></div>
<header class="header mt-3 mb-3">
    <div class="container">
        <nav class="navbar navbar-dark bg-dark navbar-expand rounded p-3 pt-1 pb-1">
            <ul class="navbar-nav">
                <li class="nav-item {{ (request()->is('/') || request()->is('/bot/*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ (request()->is('categories')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/categories') }}">Категории запросов</a>
                </li>
                <li class="nav-item {{ (request()->is('logs*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/logs') }}">Логи</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
