<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryPro - Admin Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #2ec4b6;
            --dark: #1e293b;
            --dark-light: #334155;
            --light: #f8fafc;
            --light-gray: #f1f5f9;
            --gray: #94a3b8;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s ease;
            --radius: 8px;
            --radius-sm: 4px;
            --radius-lg: 12px;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Dashboard Layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: white;
            box-shadow: var(--shadow);
            position: fixed;
            height: 100%;
            overflow-y: auto;
            z-index: 100;
            transition: var(--transition);
            border-right: 1px solid var(--border);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-header .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-header .logo-icon {
            width: 32px;
            height: 32px;
            background-color: var(--primary);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .sidebar-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-section {
            margin-bottom: 1.5rem;
        }

        .nav-section-title {
            padding: 0 1.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--gray);
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .sidebar-nav ul {
            list-style: none;
        }

        .sidebar-nav li {
            margin-bottom: 0.25rem;
        }

        .sidebar-nav a {
            color: var(--dark-light);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            transition: var(--transition);
            position: relative;
            font-weight: 500;
        }

        .sidebar-nav a:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .sidebar-nav li.active a {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            font-weight: 600;
        }

        .sidebar-nav li.active a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--primary);
        }

        .sidebar-nav i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        .sidebar-nav .badge {
            margin-left: auto;
            background-color: var(--light-gray);
            color: var(--dark-light);
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
            margin-top: 22rem;
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-user img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-info h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-info p {
            font-size: 0.75rem;
            color: var(--gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-actions {
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
        }

        .user-actions:hover {
            color: var(--primary);
        }

        /* Toggle Button for Mobile */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1.25rem;
            left: 1.25rem;
            z-index: 101;
            background-color: white;
            color: var(--dark);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0.5rem;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .sidebar-toggle:hover {
            background-color: var(--light-gray);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 1.5rem;
            transition: var(--transition);
        }

        /* Top Bar Styles */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .breadcrumb a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .separator {
            color: var(--gray);
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-container {
            position: relative;
        }

        .search-container input {
            width: 250px;
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background-color: white;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-container input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .search-container i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            pointer-events: none;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--dark-light);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .notification-btn:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            width: 18px;
            height: 18px;
            background-color: var(--danger);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius);
            transition: var(--transition);
        }

        .user-dropdown:hover {
            background-color: var(--light-gray);
        }

        .user-dropdown img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-dropdown .user-name {
            font-weight: 500;
            color: var(--dark);
        }

        .user-dropdown i {
            color: var(--gray);
            font-size: 0.8rem;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--border);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-card:nth-child(1) .stat-card-icon {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .stat-card:nth-child(2) .stat-card-icon {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .stat-card:nth-child(3) .stat-card-icon {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .stat-card:nth-child(4) .stat-card-icon {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .stat-card-menu {
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
            padding: 0.25rem;
        }

        .stat-card-menu:hover {
            color: var(--dark);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.75rem;
            font-size: 0.85rem;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Content Card */
        .content-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--border);
        }

        .content-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .content-card-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Table Controls */
        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background-color: var(--light-gray);
            border-bottom: 1px solid var(--border);
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .filter-container label {
            font-weight: 500;
            color: var(--dark-light);
        }

        .filter-container select {
            padding: 0.5rem 2rem 0.5rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            background-color: white;
            font-size: 0.9rem;
            color: var(--dark);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1rem;
        }

        .filter-container select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .entries-info {
            color: var(--dark-light);
            font-size: 0.9rem;
        }

        .entries-info span {
            font-weight: 600;
            color: var(--dark);
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }

        .books-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .books-table th,
        .books-table td {
            padding: 1rem 1.5rem;
        }

        .books-table th {
            background-color: white;
            font-weight: 600;
            color: var(--dark);
            position: sticky;
            top: 0;
            border-bottom: 2px solid var(--border);
            white-space: nowrap;
        }

        .books-table th i {
            margin-left: 0.5rem;
            font-size: 0.8rem;
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
        }

        .books-table th i:hover {
            color: var(--primary);
        }

        .books-table tbody tr {
            border-bottom: 1px solid var(--border);
            transition: var(--transition);
        }

        .books-table tbody tr:hover {
            background-color: var(--light-gray);
        }

        .books-table tbody tr:last-child {
            border-bottom: none;
        }

        .books-table .book-title {
            font-weight: 500;
            color: var(--dark);
        }

        .books-table .description {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--dark-light);
        }

        .books-table .year,
        .books-table .pages {
            color: var(--dark-light);
            font-weight: 500;
        }

        .books-table .actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .edit-btn {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--info);
        }

        .edit-btn:hover {
            background-color: var(--info);
            color: white;
        }

        .delete-btn {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .delete-btn:hover {
            background-color: var(--danger);
            color: white;
        }

        .view-btn {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .view-btn:hover {
            background-color: var(--success);
            color: white;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border);
            border-radius: 4px;
            position: relative;
            cursor: pointer;
            transition: var(--transition);
        }

        .custom-checkbox.checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .custom-checkbox.checked::after {
            content: "";
            position: absolute;
            top: 2px;
            left: 6px;
            width: 4px;
            height: 8px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* Pagination */
        .pagination-container {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pagination-info {
            color: var(--dark-light);
            font-size: 0.9rem;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .pagination-btn {
            min-width: 36px;
            height: 36px;
            border: 1px solid var(--border);
            background-color: white;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-light);
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .pagination-btn:hover:not(.active):not([disabled]) {
            background-color: var(--light-gray);
            color: var(--primary);
            border-color: var(--primary);
        }

        .pagination-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
            font-weight: 600;
        }

        .pagination-btn[disabled] {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--dark-light);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
            color: var(--dark);
        }

        .btn-sm {
            padding: 0.4rem 0.75rem;
            font-size: 0.85rem;
        }

        .btn-icon {
            padding: 0.5rem;
            border-radius: var(--radius-sm);
        }

        .btn-icon i {
            font-size: 1rem;
        }

        /* Show */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 1.5rem;
            transition: var(--transition);
        }

        /* Top Bar Styles */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .breadcrumb a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .separator {
            color: var(--gray);
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--dark-light);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .notification-btn:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            width: 18px;
            height: 18px;
            background-color: var(--danger);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius);
            transition: var(--transition);
        }

        .user-dropdown:hover {
            background-color: var(--light-gray);
        }

        .user-dropdown img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-dropdown .user-name {
            font-weight: 500;
            color: var(--dark);
        }

        .user-dropdown i {
            color: var(--gray);
            font-size: 0.8rem;
        }

        /* Content Card */
        .content-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--border);
        }

        .content-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .content-card-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .content-card-body {
            padding: 1.5rem;
        }

        /* Book Details Styles */
        .book-details {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
        }

        .book-cover {
            width: 100%;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        .book-cover img {
            width: 100%;
            height: auto;
            display: block;
        }

        .book-info h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .book-info .author {
            font-size: 1.1rem;
            color: var(--dark-light);
            margin-bottom: 1.5rem;
        }

        .book-meta {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .meta-item {
            display: flex;
            flex-direction: column;
        }

        .meta-label {
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 0.25rem;
        }

        .meta-value {
            font-weight: 500;
            color: var(--dark);
        }

        .book-description {
            margin-bottom: 1.5rem;
        }

        .book-description h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.75rem;
        }

        .book-description p {
            color: var(--dark-light);
            line-height: 1.7;
        }

        .book-status {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background-color: var(--light-gray);
            border-radius: var(--radius);
            margin-bottom: 1.5rem;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .status-indicator.available {
            background-color: var(--success);
        }

        .status-indicator.borrowed {
            background-color: var(--warning);
        }

        .status-indicator.unavailable {
            background-color: var(--danger);
        }

        .status-text {
            font-weight: 500;
        }

        .status-text.available {
            color: var(--success);
        }

        .status-text.borrowed {
            color: var(--warning);
        }

        .status-text.unavailable {
            color: var(--danger);
        }

        .copies-info {
            margin-left: auto;
            color: var(--dark-light);
        }

        /* Loan History */
        .loan-history {
            margin-top: 2rem;
        }

        .loan-history h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-table th, .history-table td {
            padding: 0.75rem 1rem;
            text-align: left;
        }

        .history-table th {
            background-color: var(--light-gray);
            font-weight: 600;
            color: var(--dark);
        }

        .history-table tr {
            border-bottom: 1px solid var(--border);
        }

        .history-table tr:last-child {
            border-bottom: none;
        }

        .history-table .member-name {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .history-table .member-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        .history-table .status {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .history-table .status.returned {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .history-table .status.borrowed {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--info);
        }

        .history-table .status.overdue {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--dark-light);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
            color: var(--dark);
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
            .main-content {
                margin-left: 240px;
            }
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .top-bar-actions {
                width: 100%;
                justify-content: space-between;
            }
            .book-details {
                grid-template-columns: 1fr;
            }
            .book-cover {
                max-width: 250px;
                margin: 0 auto;
            }
            .content-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .content-card-actions {
                width: 100%;
                justify-content: space-between;
            }
        }


        /* Responsive Styles */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }

            .main-content {
                margin-left: 240px;
            }

            .search-container input {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .top-bar-actions {
                width: 100%;
                justify-content: space-between;
            }

            .search-container {
                width: 100%;
            }

            .search-container input {
                width: 100%;
            }

            .stats-container {
                grid-template-columns: repeat(auto-fit, minmax(100%, 1fr));
            }

            .table-controls {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .filter-container {
                width: 100%;
            }

            .filter-container select {
                flex: 1;
            }

            .pagination-container {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .pagination {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 1rem;
            }

            .books-table .description {
                max-width: 150px;
            }

            .content-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .content-card-actions {
                width: 100%;
                justify-content: space-between;
            }
        }
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #2ec4b6;
            --dark: #1e293b;
            --dark-light: #334155;
            --light: #f8fafc;
            --light-gray: #f1f5f9;
            --gray: #94a3b8;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s ease;
            --radius: 8px;
            --radius-sm: 4px;
            --radius-lg: 12px;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Dashboard Layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            position: sticky;
            top: 0;
            z-index: 50;
            background-color: white;
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Top Bar Styles */
        .breadcrumb-container {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .breadcrumb a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .separator {
            color: var(--gray);
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-container {
            position: relative;
        }

        .search-container input {
            width: 250px;
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background-color: white;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-container input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .search-container i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            pointer-events: none;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--dark-light);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .notification-btn:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            width: 18px;
            height: 18px;
            background-color: var(--danger);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius);
            transition: var(--transition);
        }

        .user-dropdown:hover {
            background-color: var(--light-gray);
        }

        .user-dropdown img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-dropdown .user-name {
            font-weight: 500;
            color: var(--dark);
        }

        .user-dropdown i {
            color: var(--gray);
            font-size: 0.8rem;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--border);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-card:nth-child(1) .stat-card-icon {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .stat-card:nth-child(2) .stat-card-icon {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .stat-card:nth-child(3) .stat-card-icon {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .stat-card:nth-child(4) .stat-card-icon {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .stat-card-menu {
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
            padding: 0.25rem;
        }

        .stat-card-menu:hover {
            color: var(--dark);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.75rem;
            font-size: 0.85rem;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: white;
            box-shadow: var(--shadow);
            position: fixed;
            height: 100%;
            overflow-y: auto;
            z-index: 100;
            transition: var(--transition);
            border-right: 1px solid var(--border);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-header .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-header .logo-icon {
            width: 32px;
            height: 32px;
            background-color: var(--primary);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .sidebar-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-section {
            margin-bottom: 1.5rem;
        }

        .nav-section-title {
            padding: 0 1.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--gray);
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .sidebar-nav ul {
            list-style: none;
        }

        .sidebar-nav li {
            margin-bottom: 0.25rem;
        }

        .sidebar-nav a {
            color: var(--dark-light);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0;
            transition: var(--transition);
            position: relative;
            font-weight: 500;
        }

        .sidebar-nav a:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .sidebar-nav li.active a {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            font-weight: 600;
        }

        .sidebar-nav li.active a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--primary);
        }

        .sidebar-nav i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        .sidebar-nav .badge {
            margin-left: auto;
            background-color: var(--light-gray);
            color: var(--dark-light);
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
            margin-top: auto;
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-user img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-info h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-info p {
            font-size: 0.75rem;
            color: var(--gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-actions {
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
        }

        .user-actions:hover {
            color: var(--primary);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 1.5rem;
            transition: var(--transition);
        }

        /* Top Bar Styles */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .breadcrumb a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .separator {
            color: var(--gray);
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--dark-light);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .notification-btn:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            width: 18px;
            height: 18px;
            background-color: var(--danger);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: var(--radius);
            transition: var(--transition);
        }

        .user-dropdown:hover {
            background-color: var(--light-gray);
        }

        .user-dropdown img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-dropdown .user-name {
            font-weight: 500;
            color: var(--dark);
        }

        .user-dropdown i {
            color: var(--gray);
            font-size: 0.8rem;
        }

        /* Content Card */
        .content-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--border);
        }

        .content-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .content-card-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .content-card-body {
            padding: 1.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-size: 0.95rem;
            transition: var(--transition);
            color: var(--dark);
            background-color: white;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus,
        .form-group input[type="date"]:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
            padding-right: 2.5rem;
        }

        .form-group .help-text {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        /* Cover Upload */
        .cover-upload {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .cover-preview {
            width: 150px;
            height: 200px;
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--border);
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            font-size: 3rem;
        }

        .cover-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-actions {
            flex: 1;
        }

        .cover-actions p {
            margin-bottom: 1rem;
            color: var(--dark-light);
        }

        .upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            background-color: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: var(--dark-light);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .upload-btn:hover {
            background-color: var(--gray);
            color: white;
        }

        .upload-btn input[type="file"] {
            display: none;
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--dark-light);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
            color: var(--dark);
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
            .main-content {
                margin-left: 240px;
            }
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .top-bar-actions {
                width: 100%;
                justify-content: space-between;
            }
            .form-row {
                grid-template-columns: 1fr;
            }
            .cover-upload {
                flex-direction: column;
                align-items: center;
            }
            .cover-actions {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 1rem;
            }
            .content-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .content-card-actions {
                width: 100%;
                justify-content: space-between;
            }
            .form-actions {
                flex-direction: column;
            }
            .form-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div>
        {{-- Header --}}
        @include('layout.header')
    
        <div class="flex min-h-screen">
            {{-- Sidebar --}}
            @include('layout.sidebar')
    
            {{-- Main Content Area --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = sidebarToggle.contains(event.target);

                if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                }
            });

            // Custom checkbox functionality
            const checkboxes = document.querySelectorAll('.custom-checkbox');
            const selectAll = document.getElementById('select-all');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    this.classList.toggle('checked');

                    // Update select all checkbox state
                    if (this === selectAll) {
                        const isChecked = this.classList.contains('checked');
                        checkboxes.forEach(cb => {
                            if (cb !== selectAll) {
                                if (isChecked) {
                                    cb.classList.add('checked');
                                } else {
                                    cb.classList.remove('checked');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
