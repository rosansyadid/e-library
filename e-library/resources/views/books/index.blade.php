@extends('layout.app')

@section('content')
<!-- Main Content -->
<main class="main-content">
    <!-- Books Table -->
    <div class="content-card">
        <div class="content-card-header">
            <h3 class="content-card-title">Books Inventory</h3>
            <div class="content-card-actions">
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-download"></i>
                    Export
                </button>
                @if(Auth::user()->isAdmin())
                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Add New Book
                </a>
                @endif
            </div>
        </div>

        <div class="table-controls">
            <div class="filter-container">
                <label for="category-filter">Category:</label>
                <select id="category-filter">
                    <option value="all">All Categories</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="science">Science</option>
                    <option value="history">History</option>
                </select>
            </div>
            <div class="entries-info">
                Showing <span>{{ $books->count() }}</span> of <span>{{ $books->total() }}</span> entries
            </div>
        </div>

        <div class="table-container">
            <table class="books-table">
                <thead>
                    <tr>
                        <th>
                            <div class="checkbox-wrapper">
                                <div class="custom-checkbox" id="select-all"></div>
                            </div>
                        </th>
                        <th>Book Name <i class="fas fa-sort"></i></th>
                        <th>Author <i class="fas fa-sort"></i></th>
                        <th>Description</th>
                        <th>Year Published <i class="fas fa-sort"></i></th>
                        <th>Pages <i class="fas fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>
                            <div class="checkbox-wrapper">
                                <div class="custom-checkbox"></div>
                            </div>
                        </td>
                        <td class="book-title">{{ $book->book_name }}</td>
                        <td>{{ $book->author }}</td>
                        <td class="description">{{ Str::limit($book->description, 50) }}</td>
                        <td class="year">{{ $book->publication_year }}</td>
                        <td class="pages">{{ $book->page_count }}</td>
                        <td class="actions">
                            <a href="{{ route('books.show', $book) }}" class="action-btn view-btn"><i class="fas fa-eye"></i></a>
                            @if(Auth::user()->isAdmin())
                            <a href="{{ route('books.edit', $book) }}" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No books found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            <div class="pagination-info">
                Showing {{ $books->firstItem() ?? 0 }} to {{ $books->lastItem() ?? 0 }} of {{ $books->total() }} entries
            </div>
            <div class="pagination">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</main>
@endsection