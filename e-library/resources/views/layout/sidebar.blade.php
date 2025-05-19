<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-book"></i>
            </div>
            <h2>LibraryPro</h2>
        </div>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-title">Main</div>
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}">
                        <i class="fas fa-book"></i>
                        Books
                        <span class="badge">1,245</span>
                    </a>
                </li>
                <li>
                    @if (Auth::user()->isAdmin())
                    <a href="{{ route('books.index') }}">
                        <i class="fas fa-plus"></i>
                        Add New
                        <span class="badge">➕</span>
                    </a>
                </li>
                    @endif
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        Settings
                        <span class="badge">⚙️</span>
                    </a>
                </li>
        </div>
    </nav>
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <img src="https://media.tenor.com/blwK0rdIId8AAAAj/cat-oiiaoiia-cat.gif" alt="User Avatar">
            <div class="user-info">
                <h4>John Doe</h4>
                @if (Auth::user()->isAdmin())
                <p>Administrator</p>
                @endif
                <p>Reader</p>
            </div>
            <div class="user-actions">
                <i class="fas fa-ellipsis-v"></i>
            </div>
        </div>
    </div>
</aside>