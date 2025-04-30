@extends('layout.app')

@section('content')

<!-- Main Content -->
<main class="main-content">
    <!-- Book Details -->
    <div class="content-card">
        <div class="content-card-header">
            <h3 class="content-card-title">Book Information</h3>
            <div class="content-card-actions">
                <button class="btn btn-outline" onclick="location.href='admin-dashboard.html'">
                    <i class="fas fa-arrow-left"></i>
                    Back to List
                </button>
                <button class="btn btn-outline" onclick="location.href='book-update.html'">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
                <button class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                    Delete
                </button>
            </div>
        </div>
        <div class="content-card-body">
            <div class="book-details">
                <div class="book-cover">
                    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1637050582i/59636063.jpg" alt="To Kill a Mockingbird">
                </div>
                <div class="book-info">
                    <h2>To Kill a Mockingbird</h2>
                    <div class="author">by Harper Lee</div>

                    <div class="book-status">
                        <div class="status-indicator available"></div>
                        <div class="status-text available">Available</div>
                        <div class="copies-info">5 of 5 copies available</div>
                    </div>

                    <div class="book-meta">
                        <div class="meta-item">
                            <div class="meta-label">Category</div>
                            <div class="meta-value">Fiction</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Year Published</div>
                            <div class="meta-value">1960</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Pages</div>
                            <div class="meta-value">281</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Publisher</div>
                            <div class="meta-value">J. B. Lippincott & Co.</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">ISBN</div>
                            <div class="meta-value">978-0446310789</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Language</div>
                            <div class="meta-value">English</div>
                        </div>
                    </div>

                    <div class="book-description">
                        <h3>Description</h3>
                        <p>
                            The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. "To Kill A Mockingbird" became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.
                        </p>
                        <p>
                            Compassionate, dramatic, and deeply moving, "To Kill A Mockingbird" takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Loan History -->
            <div class="loan-history">
                <h3>Loan History</h3>
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Borrowed Date</th>
                            <th>Due Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="member-name">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Member Avatar" class="member-avatar">
                                <span>Sarah Johnson</span>
                            </td>
                            <td>Jan 15, 2023</td>
                            <td>Jan 29, 2023</td>
                            <td>Jan 27, 2023</td>
                            <td><span class="status returned">Returned</span></td>
                        </tr>
                        <tr>
                            <td class="member-name">
                                <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Member Avatar" class="member-avatar">
                                <span>Michael Chen</span>
                            </td>
                            <td>Dec 10, 2022</td>
                            <td>Dec 24, 2022</td>
                            <td>Dec 23, 2022</td>
                            <td><span class="status returned">Returned</span></td>
                        </tr>
                        <tr>
                            <td class="member-name">
                                <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Member Avatar" class="member-avatar">
                                <span>Emily Rodriguez</span>
                            </td>
                            <td>Nov 5, 2022</td>
                            <td>Nov 19, 2022</td>
                            <td>Nov 18, 2022</td>
                            <td><span class="status returned">Returned</span></td>
                        </tr>
                        <tr>
                            <td class="member-name">
                                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Member Avatar" class="member-avatar">
                                <span>David Wilson</span>
                            </td>
                            <td>Oct 12, 2022</td>
                            <td>Oct 26, 2022</td>
                            <td>Oct 30, 2022</td>
                            <td><span class="status overdue">Overdue</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection