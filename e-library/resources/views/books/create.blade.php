@extends('layout.app')
@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <!-- Add Book Form -->
        <div class="content-card">
            <div class="content-card-header">
                <h3 class="content-card-title">Book Information</h3>
            </div>
            <div class="content-card-body">
                <form action="{{ route('books.store') }}" method="POST" id="add-book-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="book_name">Book Title *</label>
                            <input type="text" id="book_name" name="book_name" required value="{{ old('book_name') }}">
                            @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author *</label>
                            <input type="text" id="author" name="author" required value="{{ old('author') }}">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="publication_year">Year Published *</label>
                            <input type="number" id="publication_year" name="publication_year" min="1000" max="{{ date('Y') }}" required value="{{ old('publication_year') }}">
                            @error('publication_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="page_count">Number of Pages *</label>
                            <input type="number" id="page_count" name="page_count" min="1" required value="{{ old('page_count', 1) }}">
                            @error('page_count')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('books.index') }}" class="btn btn-outline">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection