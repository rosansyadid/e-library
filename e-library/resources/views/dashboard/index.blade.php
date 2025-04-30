@extends('layout.app')

@section('content')
<!-- Main Content -->
<main class="main-content">
    <!-- Stats Cards -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-card-menu">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            </div>
            <div class="stat-value">1,245</div>
            <div class="stat-label">Total Books</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                <span>12% from last month</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="stat-card-menu">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            </div>
            <div class="stat-value">37</div>
            <div class="stat-label">Books Out</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                <span>5% from last month</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-card-menu">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            </div>
            <div class="stat-value">528</div>
            <div class="stat-label">Members</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                <span>8% from last month</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="stat-card-menu">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Overdue</div>
            <div class="stat-change negative">
                <i class="fas fa-arrow-down"></i>
                <span>3% from last month</span>
            </div>
        </div>
    </div>

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
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Add New Book
                </button>
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
                Showing <span>1-10</span> of <span>1,245</span> entries
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
                    <tr>
                        <td>
                            <div class="checkbox-wrapper">
                                <div class="custom-checkbox"></div>
                            </div>
                        </td>
                        <td class="book-title">To Kill a Mockingbird</td>
                        <td>Harper Lee</td>
                        <td class="description">A novel about racial inequality through the eyes of a young girl in Alabama.</td>
                        <td class="year">1960</td>
                        <td class="pages">281</td>
                        <td class="actions">
                            <button class="action-btn view-btn"><i class="fas fa-eye"></i></button>
                            <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            <div class="pagination-info">
                Showing 1 to 1 of 1 entries
            </div>
            <div class="pagination">
                <button class="pagination-btn" disabled><i class="fas fa-chevron-left"></i></button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</main>
@endsection