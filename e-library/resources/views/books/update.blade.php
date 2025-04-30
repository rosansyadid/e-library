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
                <form id="add-book-form">
                    <div class="cover-upload">
                        <div class="cover-preview">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="cover-actions">
                            <p>Upload a cover image for the book. Recommended size: 400x600 pixels.</p>
                            <label class="upload-btn">
                                <i class="fas fa-upload"></i>
                                Choose File
                                <input type="file" id="cover-upload" accept="image/*">
                            </label>
                            <div class="help-text" id="file-name">No file chosen</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="book-title">Book Title *</label>
                            <input type="text" id="book-title" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author *</label>
                            <input type="text" id="author" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea id="description" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select id="category" required>
                                <option value="">Select a category</option>
                                <option value="fiction">Fiction</option>
                                <option value="non-fiction">Non-Fiction</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                                <option value="biography">Biography</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="mystery">Mystery</option>
                                <option value="romance">Romance</option>
                                <option value="science-fiction">Science Fiction</option>
                                <option value="self-help">Self-Help</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" id="publisher">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="year-published">Year Published *</label>
                            <input type="number" id="year-published" min="1000" max="2099" required>
                        </div>
                        <div class="form-group">
                            <label for="pages">Number of Pages *</label>
                            <input type="number" id="pages" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn">
                            <div class="help-text">International Standard Book Number (optional)</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="language">Language</label>
                            <select id="language">
                                <option value="english">English</option>
                                <option value="spanish">Spanish</option>
                                <option value="french">French</option>
                                <option value="german">German</option>
                                <option value="chinese">Chinese</option>
                                <option value="japanese">Japanese</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="copies">Number of Copies *</label>
                            <input type="number" id="copies" min="1" value="1" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-outline" onclick="location.href='admin-dashboard.html'">
                            Cancel
                        </button>
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
