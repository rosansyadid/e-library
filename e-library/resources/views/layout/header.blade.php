<!-- Header -->
<header class="header">
    <div class="header-left">
        <button class="sidebar-toggle" id="sidebar-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="header-title">
            <h1>Book Management</h1>
        </div>
    </div>
    <div class="header-actions">
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search books...">
        </div>
        <button class="notification-btn">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </button>
        <div class="user-dropdown">
            <div class="user-dropdown">
                <img src="https://media.tenor.com/blwK0rdIId8AAAAj/cat-meme.gif" /> {{-- Assuming this is a placeholder avatar --}}
            
                {{-- Logout Link/Button --}}
                <a href="{{ route('logout') }}"
                   class="user-name" {{-- Keep your styling class --}}
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Log Out
                </a>
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>
</header>