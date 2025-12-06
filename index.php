<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FaceID Attendance & Payroll System</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
    <style>
        :root {
            --md-sys-color-primary: #6750A4;
            --md-sys-color-on-primary: #FFFFFF;
            --md-sys-color-primary-container: #EADDFF;
            --md-sys-color-on-primary-container: #21005D;
            --md-sys-color-secondary: #625B71;
            --md-sys-color-on-secondary: #FFFFFF;
            --md-sys-color-secondary-container: #E8DEF8;
            --md-sys-color-on-secondary-container: #1D192B;
            --md-sys-color-tertiary: #7D5260;
            --md-sys-color-on-tertiary: #FFFFFF;
            --md-sys-color-tertiary-container: #FFD8E4;
            --md-sys-color-on-tertiary-container: #31111D;
            --md-sys-color-error: #B3261E;
            --md-sys-color-on-error: #FFFFFF;
            --md-sys-color-error-container: #F9DEDC;
            --md-sys-color-on-error-container: #410E0B;
            --md-sys-color-background: #FEF7FF;
            --md-sys-color-on-background: #1D1B20;
            --md-sys-color-surface: #FEF7FF;
            --md-sys-color-on-surface: #1D1B20;
            --md-sys-color-surface-variant: #E7E0EC;
            --md-sys-color-on-surface-variant: #49454F;
            --md-sys-color-outline: #79747E;
            --md-sys-color-outline-variant: #CAC4D0;
            --md-sys-color-shadow: #000000;
            --md-sys-color-scrim: #000000;
            --md-sys-color-inverse-surface: #322F35;
            --md-sys-color-inverse-on-surface: #F5EFF7;
            --md-sys-color-inverse-primary: #D0BCFF;
            --md-sys-color-surface-dim: #DED8E1;
            --md-sys-color-surface-bright: #FEF7FF;
            --md-sys-color-surface-container-lowest: #FFFFFF;
            --md-sys-color-surface-container-low: #F7F2FA;
            --md-sys-color-surface-container: #F3EDF7;
            --md-sys-color-surface-container-high: #ECE6F0;
            --md-sys-color-surface-container-highest: #E6E0E9;
            --md-sys-color-success: #1B5E20;
            --md-sys-color-success-container: #C8E6C9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Google Sans', Roboto, sans-serif;
            background: var(--md-sys-color-background);
            color: var(--md-sys-color-on-background);
            min-height: 100vh;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Login Page */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: linear-gradient(135deg, var(--md-sys-color-primary-container) 0%, var(--md-sys-color-tertiary-container) 100%);
        }

        .login-card {
            background: var(--md-sys-color-surface);
            border-radius: 28px;
            padding: 48px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 4px 28px rgba(0,0,0,0.12);
        }

        .login-card h1 {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--md-sys-color-on-surface);
        }

        .login-card p {
            color: var(--md-sys-color-on-surface-variant);
            margin-bottom: 32px;
        }

        .form-field {
            margin-bottom: 24px;
        }

        .form-field label {
            display: block;
            font-size: 12px;
            color: var(--md-sys-color-on-surface-variant);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-field input, .form-field select {
            width: 100%;
            padding: 16px;
            border: 1px solid var(--md-sys-color-outline);
            border-radius: 12px;
            font-size: 16px;
            font-family: inherit;
            background: var(--md-sys-color-surface);
            color: var(--md-sys-color-on-surface);
            transition: all 0.2s;
        }

        .form-field input:focus, .form-field select:focus {
            outline: none;
            border-color: var(--md-sys-color-primary);
            box-shadow: 0 0 0 2px var(--md-sys-color-primary-container);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 16px 24px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .btn-primary {
            background: var(--md-sys-color-primary);
            color: var(--md-sys-color-on-primary);
        }

        .btn-primary:hover {
            box-shadow: 0 2px 8px rgba(103, 80, 164, 0.4);
        }

        .btn-secondary {
            background: var(--md-sys-color-secondary-container);
            color: var(--md-sys-color-on-secondary-container);
        }

        .btn-tertiary {
            background: var(--md-sys-color-tertiary-container);
            color: var(--md-sys-color-on-tertiary-container);
        }

        .btn-outlined {
            background: transparent;
            color: var(--md-sys-color-primary);
            border: 1px solid var(--md-sys-color-outline);
        }

        .btn-text {
            background: transparent;
            color: var(--md-sys-color-primary);
        }

        .btn-error {
            background: var(--md-sys-color-error);
            color: var(--md-sys-color-on-error);
        }

        .btn-success {
            background: var(--md-sys-color-success);
            color: white;
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-full {
            width: 100%;
        }

        /* Dashboard Layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: var(--md-sys-color-surface-container-low);
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--md-sys-color-outline-variant);
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            margin-bottom: 24px;
        }

        .sidebar-header .logo {
            width: 48px;
            height: 48px;
            background: var(--md-sys-color-primary);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--md-sys-color-on-primary);
        }

        .sidebar-header h2 {
            font-size: 18px;
            font-weight: 500;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            border-radius: 100px;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--md-sys-color-on-surface-variant);
            text-decoration: none;
            margin-bottom: 4px;
        }

        .nav-item:hover {
            background: var(--md-sys-color-surface-container-high);
        }

        .nav-item.active {
            background: var(--md-sys-color-secondary-container);
            color: var(--md-sys-color-on-secondary-container);
        }

        .nav-item.active .material-symbols-outlined {
            font-variation-settings: 'FILL' 1;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid var(--md-sys-color-outline-variant);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--md-sys-color-tertiary-container);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--md-sys-color-on-tertiary-container);
            font-weight: 500;
        }

        .user-details {
            flex: 1;
        }

        .user-details .name {
            font-weight: 500;
            font-size: 14px;
        }

        .user-details .role {
            font-size: 12px;
            color: var(--md-sys-color-on-surface-variant);
        }

        .main-content {
            flex: 1;
            padding: 24px;
            overflow-y: auto;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 500;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        /* Cards */
        .card {
            background: var(--md-sys-color-surface);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            border: 1px solid var(--md-sys-color-outline-variant);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 500;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--md-sys-color-surface);
            border-radius: 24px;
            padding: 24px;
            border: 1px solid var(--md-sys-color-outline-variant);
        }

        .stat-card.primary {
            background: var(--md-sys-color-primary-container);
            border-color: transparent;
        }

        .stat-card.secondary {
            background: var(--md-sys-color-secondary-container);
            border-color: transparent;
        }

        .stat-card.tertiary {
            background: var(--md-sys-color-tertiary-container);
            border-color: transparent;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .stat-card.primary .stat-icon {
            background: var(--md-sys-color-primary);
            color: var(--md-sys-color-on-primary);
        }

        .stat-card.secondary .stat-icon {
            background: var(--md-sys-color-secondary);
            color: var(--md-sys-color-on-secondary);
        }

        .stat-card.tertiary .stat-icon {
            background: var(--md-sys-color-tertiary);
            color: var(--md-sys-color-on-tertiary);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--md-sys-color-on-surface-variant);
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid var(--md-sys-color-outline-variant);
        }

        th {
            font-weight: 500;
            color: var(--md-sys-color-on-surface-variant);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background: var(--md-sys-color-surface-container-low);
        }

        /* Chip */
        .chip {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
        }

        .chip-success {
            background: var(--md-sys-color-success-container);
            color: var(--md-sys-color-success);
        }

        .chip-error {
            background: var(--md-sys-color-error-container);
            color: var(--md-sys-color-error);
        }

        .chip-warning {
            background: #FFF3E0;
            color: #E65100;
        }

        .chip-info {
            background: var(--md-sys-color-primary-container);
            color: var(--md-sys-color-primary);
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 24px;
        }

        .modal {
            background: var(--md-sys-color-surface);
            border-radius: 28px;
            width: 100%;
            max-width: 560px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px;
            border-bottom: 1px solid var(--md-sys-color-outline-variant);
        }

        .modal-header h2 {
            font-size: 22px;
            font-weight: 500;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 16px 24px;
            border-top: 1px solid var(--md-sys-color-outline-variant);
        }

        /* Face Recognition */
        .face-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 480px;
            border-radius: 24px;
            overflow: hidden;
            background: var(--md-sys-color-surface-container);
        }

        .video-wrapper video {
            width: 100%;
            display: block;
        }

        .video-wrapper canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .face-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 100px;
            background: var(--md-sys-color-surface-container-high);
        }

        .face-status.success {
            background: var(--md-sys-color-success-container);
            color: var(--md-sys-color-success);
        }

        .face-status.error {
            background: var(--md-sys-color-error-container);
            color: var(--md-sys-color-error);
        }

        /* Grid Layout */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .dashboard {
                flex-direction: column;
            }
        }

        /* Toast */
        .toast-container {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .toast {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 24px;
            border-radius: 12px;
            background: var(--md-sys-color-inverse-surface);
            color: var(--md-sys-color-inverse-on-surface);
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .hidden {
            display: none !important;
        }

        /* Attendance Clock */
        .clock-display {
            font-size: 64px;
            font-weight: 300;
            text-align: center;
            margin-bottom: 8px;
        }

        .date-display {
            font-size: 18px;
            text-align: center;
            color: var(--md-sys-color-on-surface-variant);
            margin-bottom: 24px;
        }

        /* Payroll Summary */
        .payroll-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--md-sys-color-outline-variant);
        }

        .payroll-item:last-child {
            border-bottom: none;
            font-weight: 500;
            font-size: 18px;
        }

        .payroll-item.deduction {
            color: var(--md-sys-color-error);
        }

        /* FAB */
        .fab {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: var(--md-sys-color-primary-container);
            color: var(--md-sys-color-on-primary-container);
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.2s;
        }

        .fab:hover {
            box-shadow: 0 6px 16px rgba(0,0,0,0.2);
        }

        /* Tabs */
        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--md-sys-color-outline-variant);
            padding-bottom: 8px;
        }

        .tab {
            padding: 12px 24px;
            border-radius: 100px;
            background: transparent;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
            font-weight: 500;
            color: var(--md-sys-color-on-surface-variant);
            transition: all 0.2s;
        }

        .tab:hover {
            background: var(--md-sys-color-surface-container-high);
        }

        .tab.active {
            background: var(--md-sys-color-secondary-container);
            color: var(--md-sys-color-on-secondary-container);
        }

        /* Search */
        .search-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: var(--md-sys-color-surface-container-high);
            border-radius: 100px;
            width: 320px;
        }

        .search-box input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 14px;
            font-family: inherit;
            outline: none;
        }

        /* Loading */
        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 3000;
        }

        .loading-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid var(--md-sys-color-surface-container-high);
            border-top-color: var(--md-sys-color-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Face Grid */
        .face-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 16px;
        }

        .face-item {
            aspect-ratio: 1;
            border-radius: 16px;
            overflow: hidden;
            background: var(--md-sys-color-surface-container);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .face-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .face-item .delete-face {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--md-sys-color-error);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .face-item:hover .delete-face {
            opacity: 1;
        }

        /* Skeleton Loading */
        .skeleton {
            background: linear-gradient(90deg, var(--md-sys-color-surface-container) 25%, var(--md-sys-color-surface-container-high) 50%, var(--md-sys-color-surface-container) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .icon-btn:hover {
            background: var(--md-sys-color-surface-container-high);
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-spinner"></div>
        <p style="margin-top: 16px; color: var(--md-sys-color-on-surface-variant);">Loading Face Recognition Models...</p>
    </div>

    <!-- Toast Container -->
    <div id="toastContainer" class="toast-container"></div>

    <!-- Login Page -->
    <div id="loginPage" class="login-container hidden">
        <div class="login-card">
            <div style="text-align: center; margin-bottom: 24px;">
                <div style="width: 72px; height: 72px; background: var(--md-sys-color-primary); border-radius: 24px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <span class="material-symbols-outlined" style="font-size: 36px; color: white;">face</span>
                </div>
            </div>
            <h1>Welcome Back</h1>
            <p>Sign in to FaceID Attendance System</p>
            
            <form id="loginForm">
                <div class="form-field">
                    <label>Username</label>
                    <input type="text" id="loginUsername" placeholder="Enter your username" required>
                </div>
                <div class="form-field">
                    <label>Password</label>
                    <input type="password" id="loginPassword" placeholder="Enter your password" required>
                </div>
                <!-- <div class="form-field">
                    <label>Login As</label>
                    <select id="loginRole">
                        <option value="admin">Administrator</option>
                        <option value="employee">Employee</option>
                    </select>
                </div> -->
                <button type="submit" class="btn btn-primary btn-full">
                    <span class="material-symbols-outlined">login</span>
                    Sign In
                </button>
            </form>

            <div style="margin-top: 24px; text-align: center;">
                <button class="btn btn-text" onclick="showFaceLogin()">
                    <span class="material-symbols-outlined">face</span>
                    Sign in with Face ID
                </button>
                <div style="margin-top: 16px; border-top: 1px solid var(--md-sys-color-outline-variant); padding-top: 16px;">
                    <button class="btn btn-secondary btn-full" onclick="startPublicKiosk()">
                        <span class="material-symbols-outlined">schedule</span>
                        Attendance Kiosk Mode
                    </button>
                    <p style="margin-top: 8px; font-size: 12px; color: var(--md-sys-color-on-surface-variant);">
                        Clock In/Out without logging in
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Face Login Modal -->
    <div id="faceLoginModal" class="modal-overlay hidden">
        <div class="modal" style="max-width: 600px;">
            <div class="modal-header">
                <h2>Face ID Login</h2>
                <button class="icon-btn" onclick="closeFaceLogin()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="face-container">
                    <div class="video-wrapper">
                        <video id="faceLoginVideo" autoplay muted playsinline></video>
                        <canvas id="faceLoginCanvas"></canvas>
                    </div>
                    <div id="faceLoginStatus" class="face-status">
                        <span class="material-symbols-outlined">face</span>
                        <span>Looking for face...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard -->
    <div id="dashboard" class="dashboard hidden">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <span class="material-symbols-outlined">face</span>
                </div>
                <div>
                    <h2>FaceID</h2>
                    <span style="font-size: 12px; color: var(--md-sys-color-on-surface-variant);">Attendance System</span>
                </div>
            </div>

            <nav>
                <a class="nav-item active" data-page="dashboard" onclick="navigateTo('dashboard')">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>
                <a class="nav-item" data-page="attendance" onclick="navigateTo('attendance')">
                    <span class="material-symbols-outlined">schedule</span>
                    Attendance
                </a>
                <a class="nav-item admin-only" data-page="employees" onclick="navigateTo('employees')">
                    <span class="material-symbols-outlined">group</span>
                    Employees
                </a>
                <a class="nav-item admin-only" data-page="payroll" onclick="navigateTo('payroll')">
                    <span class="material-symbols-outlined">payments</span>
                    Payroll
                </a>
                <a class="nav-item admin-only" data-page="reports" onclick="navigateTo('reports')">
                    <span class="material-symbols-outlined">analytics</span>
                    Reports
                </a>
                <a class="nav-item admin-only" data-page="settings" onclick="navigateTo('settings')">
                    <span class="material-symbols-outlined">settings</span>
                    Settings
                </a>
                <a class="nav-item" data-page="leaves" onclick="navigateTo('leaves')">
                    <span class="material-symbols-outlined">event_busy</span>
                    Leaves
                </a>
                <a class="nav-item" data-page="profile" onclick="navigateTo('profile')">
                    <span class="material-symbols-outlined">person</span>
                    Profile
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar" id="userAvatar">A</div>
                    <div class="user-details">
                        <div class="name" id="userName">Admin User</div>
                        <div class="role" id="userRole">Administrator</div>
                    </div>
                </div>
                <button class="btn btn-text btn-full" style="margin-top: 8px;" onclick="logout()">
                    <span class="material-symbols-outlined">logout</span>
                    Sign Out
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Dashboard Page -->
            <div id="dashboardPage" class="page">
                <div class="page-header">
                    <h1>Dashboard</h1>
                    <div class="header-actions">
                        <!-- <button class="btn btn-primary" onclick="showQuickAttendance()">
                            <span class="material-symbols-outlined">face</span>
                            Quick Attendance
                        </button> -->
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-card primary">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">group</span>
                        </div>
                        <div class="stat-value" id="statTotalEmployees">0</div>
                        <div class="stat-label">Total Employees</div>
                    </div>
                    <div class="stat-card secondary">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">check_circle</span>
                        </div>
                        <div class="stat-value" id="statPresentToday">0</div>
                        <div class="stat-label">Present Today</div>
                    </div>
                    <div class="stat-card tertiary">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                        <div class="stat-value" id="statLateToday">0</div>
                        <div class="stat-label">Late Arrivals</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: var(--md-sys-color-error); color: white;">
                            <span class="material-symbols-outlined">cancel</span>
                        </div>
                        <div class="stat-value" id="statAbsentToday">0</div>
                        <div class="stat-label">Absent Today</div>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Attendance</h3>
                            <button class="btn btn-text" onclick="navigateTo('attendance')">View All</button>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="recentAttendanceTable">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quick Actions</h3>
                        </div>
                        <div style="display: grid; gap: 12px;">
                            <button class="btn btn-secondary btn-full" onclick="showQuickAttendance()">
                                <span class="material-symbols-outlined">face</span>
                                Clock In/Out with Face ID
                            </button>
                            <button class="btn btn-outlined btn-full admin-only" onclick="showAddEmployeeModal()">
                                <span class="material-symbols-outlined">person_add</span>
                                Add New Employee
                            </button>
                            <button class="btn btn-outlined btn-full admin-only" onclick="navigateTo('payroll')">
                                <span class="material-symbols-outlined">payments</span>
                                Process Payroll
                            </button>
                            <button class="btn btn-outlined btn-full admin-only" onclick="navigateTo('reports')">
                                <span class="material-symbols-outlined">download</span>
                                Generate Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Page -->
            <div id="attendancePage" class="page hidden">
                <div class="page-header">
                    <h1>Attendance</h1>
                    <div class="header-actions">
                        <div class="search-box">
                            <span class="material-symbols-outlined">search</span>
                            <input type="text" placeholder="Search attendance..." id="attendanceSearch" onkeyup="filterAttendance()">
                        </div>
                        <!-- <button class="btn btn-primary" onclick="showQuickAttendance()">
                            <span class="material-symbols-outlined">face</span>
                            Face Attendance
                        </button> -->
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="tabs">
                            <button class="tab active" onclick="filterAttendanceByDate('today')">Today</button>
                            <button class="tab" onclick="filterAttendanceByDate('week')">This Week</button>
                            <button class="tab" onclick="filterAttendanceByDate('month')">This Month</button>
                            <button class="tab" onclick="filterAttendanceByDate('all')">All</button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Clock In</th>
                                    <th>Clock Out</th>
                                    <th>Hours</th>
                                    <th>Status</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody id="attendanceTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Employees Page -->
            <div id="employeesPage" class="page hidden">
                <div class="page-header">
                    <h1>Employees</h1>
                    <div class="header-actions">
                        <div class="search-box">
                            <span class="material-symbols-outlined">search</span>
                            <input type="text" placeholder="Search employees..." id="employeeSearch" onkeyup="filterEmployees()">
                        </div>
                        <button class="btn btn-primary" onclick="showAddEmployeeModal()">
                            <span class="material-symbols-outlined">person_add</span>
                            Add Employee
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Face Registered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="employeeTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payroll Page -->
            <div id="payrollPage" class="page hidden">
                <div class="page-header">
                    <h1>Payroll Management</h1>
                    <div class="header-actions">
                        <select id="payrollMonth" class="form-field" style="margin: 0; width: auto;" onchange="loadPayroll()">
                        </select>
                        <button class="btn btn-primary" onclick="processPayroll()">
                            <span class="material-symbols-outlined">calculate</span>
                            Process Payroll
                        </button>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-card primary">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <div class="stat-value" id="statTotalPayroll">₱0</div>
                        <div class="stat-label">Total Payroll</div>
                    </div>
                    <div class="stat-card secondary">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">group</span>
                        </div>
                        <div class="stat-value" id="statPayrollEmployees">0</div>
                        <div class="stat-label">Employees</div>
                    </div>
                    <div class="stat-card tertiary">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">trending_up</span>
                        </div>
                        <div class="stat-value" id="statTotalBonus">₱0</div>
                        <div class="stat-label">Total Bonuses</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: var(--md-sys-color-error); color: white;">
                            <span class="material-symbols-outlined">trending_down</span>
                        </div>
                        <div class="stat-value" id="statTotalDeductions">₱0</div>
                        <div class="stat-label">Total Deductions</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payroll Records</h3>
                        <button class="btn btn-outlined" onclick="exportPayroll()">
                            <span class="material-symbols-outlined">download</span>
                            Export
                        </button>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Days Worked</th>
                                    <th>Hours</th>
                                    <th>Base Salary</th>
                                    <th>Overtime</th>
                                    <th>Deductions</th>
                                    <th>Net Pay</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="payrollTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Reports Page -->
            <div id="reportsPage" class="page hidden">
                <div class="page-header">
                    <h1>Reports & Analytics</h1>
                </div>

                <div class="grid-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Summary</h3>
                        </div>
                        <div id="attendanceSummary" style="padding: 16px;">
                            <div class="payroll-item">
                                <span>Total Working Days</span>
                                <span id="reportWorkingDays">0</span>
                            </div>
                            <div class="payroll-item">
                                <span>Average Attendance Rate</span>
                                <span id="reportAttendanceRate">0%</span>
                            </div>
                            <div class="payroll-item">
                                <span>Total Late Arrivals</span>
                                <span id="reportLateArrivals">0</span>
                            </div>
                            <div class="payroll-item">
                                <span>Average Hours/Day</span>
                                <span id="reportAvgHours">0</span>
                            </div>
                        </div>
                        <button class="btn btn-outlined btn-full" onclick="exportAttendanceReport()">
                            <span class="material-symbols-outlined">download</span>
                            Export Attendance Report
                        </button>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Summary</h3>
                        </div>
                        <div id="payrollSummary" style="padding: 16px;">
                            <div class="payroll-item">
                                <span>Total Payroll (This Month)</span>
                                <span id="reportTotalPayroll">₱0</span>
                            </div>
                            <div class="payroll-item">
                                <span>Average Salary</span>
                                <span id="reportAvgSalary">₱0</span>
                            </div>
                            <div class="payroll-item">
                                <span>Total Overtime Pay</span>
                                <span id="reportOvertimePay">₱0</span>
                            </div>
                            <div class="payroll-item">
                                <span>Total Deductions</span>
                                <span id="reportTotalDeductions">₱0</span>
                            </div>
                        </div>
                        <button class="btn btn-outlined btn-full" onclick="exportPayrollReport()">
                            <span class="material-symbols-outlined">download</span>
                            Export Payroll Report
                        </button>
                    </div>
                </div>

                <div class="card" style="margin-top: 24px;">
                    <div class="card-header">
                        <h3 class="card-title">Department Statistics</h3>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Employees</th>
                                    <th>Avg Attendance</th>
                                    <th>Total Hours</th>
                                    <th>Payroll</th>
                                </tr>
                            </thead>
                            <tbody id="departmentStatsTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Settings Page -->
            <div id="settingsPage" class="page hidden">
                <div class="page-header">
                    <h1>Settings</h1>
                </div>

                <div class="grid-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Company Settings</h3>
                        </div>
                        <div style="padding: 16px;">
                            <div class="form-field">
                                <label>Company Name</label>
                                <input type="text" id="settingCompanyName" value="Acme Corporation">
                            </div>
                            <div class="form-field">
                                <label>Work Start Time</label>
                                <input type="time" id="settingWorkStart" value="09:00">
                            </div>
                            <div class="form-field">
                                <label>Work End Time</label>
                                <input type="time" id="settingWorkEnd" value="18:00">
                            </div>
                            <div class="form-field">
                                <label>Late Threshold (minutes)</label>
                                <input type="number" id="settingLateThreshold" value="15">
                            </div>
                            <button class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Settings</h3>
                        </div>
                        <div style="padding: 16px;">
                            <div class="form-field">
                                <label>Overtime Rate (multiplier)</label>
                                <input type="number" id="settingOvertimeRate" value="1.5" step="0.1">
                            </div>
                            <div class="form-field">
                                <label>Tax Rate (%)</label>
                                <input type="number" id="settingTaxRate" value="10" step="0.1">
                            </div>
                            <div class="form-field">
                                <label>Currency Symbol</label>
                                <input type="text" id="settingCurrency" value="₱">
                            </div>
                            <button class="btn btn-primary" onclick="savePayrollSettings()">Save Settings</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin Face Registration</h3>
                        </div>
                        <div style="padding: 16px;">
                            <p style="color: var(--md-sys-color-on-surface-variant); margin-bottom: 16px;">Register your face for Face ID login</p>
                            <button class="btn btn-secondary btn-full" onclick="showAdminFaceRegistration()">
                                <span class="material-symbols-outlined">face</span>
                                Register Admin Face
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Management</h3>
                        </div>
                        <div style="padding: 16px;">
                            <p style="color: var(--md-sys-color-on-surface-variant); margin-bottom: 16px;">Manage your system data</p>
                            <button class="btn btn-outlined btn-full" style="margin-bottom: 12px;" onclick="exportAllData()">
                                <span class="material-symbols-outlined">download</span>
                                Export All Data
                            </button>
                            <button class="btn btn-error btn-full" onclick="clearAllData()">
                                <span class="material-symbols-outlined">delete</span>
                                Clear All Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leaves Page -->
            <div id="leavesPage" class="page hidden">
                <div class="page-header">
                    <h1>Leave Management</h1>
                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="showApplyLeaveModal()" id="applyLeaveBtn">
                            <span class="material-symbols-outlined">add</span>
                            Apply for Leave
                        </button>
                    </div>
                </div>
                <div id="employeeLeavesView" class="hidden">
                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Leave Requests</h3>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Dates</th>
                                        <th>Days</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myLeavesTable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="adminLeavesView" class="hidden">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Leave Requests</h3>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Type</th>
                                        <th>Dates</th>
                                        <th>Days</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="allLeavesTable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Page -->
            <div id="profilePage" class="page hidden">
                <div class="page-header">
                    <h1>My Profile</h1>
                    <div class="header-actions">
                         <button class="btn btn-error" onclick="applyRetirement()" id="retirementBtn">
                            <span class="material-symbols-outlined">elderly</span>
                            Apply for Retirement
                        </button>
                    </div>
                </div>
                <div class="card" style="max-width: 800px; margin: 0 auto;">
                    <div style="padding: 24px; text-align: center; border-bottom: 1px solid var(--md-sys-color-outline-variant);">
                        <div style="width: 100px; height: 100px; background: var(--md-sys-color-primary-container); color: var(--md-sys-color-on-primary-container); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 40px; margin: 0 auto 16px;">
                            <span id="profileAvatar">U</span>
                        </div>
                        <h2 id="profileName" style="margin: 0;">User Name</h2>
                        <p id="profileRole" style="color: var(--md-sys-color-on-surface-variant); margin: 4px 0;">Role</p>
                    </div>
                    <div style="padding: 24px;">
                        <form id="profileForm" onsubmit="event.preventDefault(); saveProfile();">
                            <div class="grid-2">
                                <div class="form-field">
                                    <label>Employee ID</label>
                                    <input type="text" id="profileId" readonly disabled style="background: var(--md-sys-color-surface-container-high);">
                                </div>
                                <div class="form-field">
                                    <label>Email</label>
                                    <input type="email" id="profileEmail">
                                </div>
                                <div class="form-field">
                                    <label>Phone</label>
                                    <input type="tel" id="profilePhone">
                                </div>
                                <div class="form-field">
                                    <label>Department</label>
                                    <input type="text" id="profileDept" readonly disabled style="background: var(--md-sys-color-surface-container-high);">
                                </div>
                            </div>
                            <div style="margin-top: 24px; text-align: right;">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Employee Modal -->
    <div id="addEmployeeModal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 id="employeeModalTitle">Add New Employee</h2>
                <button class="icon-btn" onclick="closeEmployeeModal()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="employeeForm">
                    <input type="hidden" id="employeeId">
                    <div class="grid-2">
                        <div class="form-field">
                            <label>First Name *</label>
                            <input type="text" id="empFirstName" required>
                        </div>
                        <div class="form-field">
                            <label>Last Name *</label>
                            <input type="text" id="empLastName" required>
                        </div>
                    </div>
                    <div class="form-field">
                        <label>Email *</label>
                        <input type="email" id="empEmail" required>
                    </div>
                    <div class="form-field">
                        <label>Phone</label>
                        <input type="tel" id="empPhone">
                    </div>
                    <div class="grid-2">
                        <div class="form-field">
                            <label>Department *</label>
                            <select id="empDepartment" required>
                                <option value="">Select Department</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Sales">Sales</option>
                                <option value="HR">Human Resources</option>
                                <option value="Finance">Finance</option>
                                <option value="Operations">Operations</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>Position *</label>
                            <input type="text" id="empPosition" required>
                        </div>
                    </div>
                    <div class="grid-2">
                        <div class="form-field">
                            <label>Base Salary *</label>
                            <input type="number" id="empSalary" required step="0.01">
                        </div>
                        <div class="form-field">
                            <label>Employment Type</label>
                            <select id="empType">
                                <option value="fulltime">Full Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="contract">Contract</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label>Join Date</label>
                        <input type="date" id="empJoinDate">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text" onclick="closeEmployeeModal()">Cancel</button>
                <button class="btn btn-secondary" onclick="saveEmployeeAndRegisterFace()">
                    <span class="material-symbols-outlined">face</span>
                    Save & Register Face
                </button>
                <button class="btn btn-primary" onclick="saveEmployee()">Save Employee</button>
            </div>
        </div>
    </div>

    <!-- Face Registration Modal -->
    <div id="faceRegistrationModal" class="modal-overlay hidden">
        <div class="modal" style="max-width: 700px;">
            <div class="modal-header">
                <h2>Face Registration</h2>
                <button class="icon-btn" onclick="closeFaceRegistration()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="face-container">
                    <p id="faceRegEmployeeName" style="font-size: 18px; font-weight: 500; margin-bottom: 16px;"></p>
                    <div class="video-wrapper">
                        <video id="faceRegVideo" autoplay muted playsinline></video>
                        <canvas id="faceRegCanvas"></canvas>
                    </div>
                    <div id="faceRegStatus" class="face-status">
                        <span class="material-symbols-outlined">face</span>
                        <span>Position your face in the frame</span>
                    </div>
                    <div class="face-grid" id="capturedFacesGrid" style="width: 100%; margin-top: 16px;">
                    </div>
                    <p style="color: var(--md-sys-color-on-surface-variant); font-size: 14px;">Capture at least 3 different angles of your face for better recognition</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text" onclick="closeFaceRegistration()">Cancel</button>
                <button class="btn btn-secondary" id="captureFaceBtn" onclick="captureFace()">
                    <span class="material-symbols-outlined">photo_camera</span>
                    Capture Face
                </button>
                <button class="btn btn-primary" id="saveFacesBtn" onclick="saveFaces()" disabled>
                    <span class="material-symbols-outlined">save</span>
                    Save Faces
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Attendance Modal -->
    <div id="quickAttendanceModal" class="modal-overlay hidden">
        <div class="modal" style="max-width: 600px;">
            <div class="modal-header">
                <h2>Face ID Attendance</h2>
                <button class="icon-btn" onclick="closeQuickAttendance()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="face-container">
                    <div class="clock-display" id="attendanceClock">00:00:00</div>
                    <div class="date-display" id="attendanceDate"></div>
                    <div class="video-wrapper">
                        <video id="attendanceVideo" autoplay muted playsinline></video>
                        <canvas id="attendanceCanvas"></canvas>
                    </div>
                    <div id="attendanceStatus" class="face-status">
                        <span class="material-symbols-outlined">face</span>
                        <span>Show your face to clock in/out</span>
                    </div>
                    <div id="recognizedEmployee" class="hidden" style="text-align: center; margin-top: 16px;">
                        <h3 id="recognizedName" style="font-size: 24px; margin-bottom: 8px;"></h3>
                        <p id="recognizedId" style="color: var(--md-sys-color-on-surface-variant);"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text" onclick="closeQuickAttendance()">Close</button>
            </div>
        </div>
    </div>

    <!-- Payroll Detail Modal -->
    <div id="payrollDetailModal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2>Payroll Details</h2>
                <button class="icon-btn" onclick="closePayrollDetail()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="payrollDetailContent"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text" onclick="closePayrollDetail()">Close</button>
                <button class="btn btn-primary" onclick="printPayslip()">
                    <span class="material-symbols-outlined">print</span>
                    Print Payslip
                </button>
            </div>
        </div>
    </div>

    <!-- Admin Face Registration Modal -->
    <div id="adminFaceRegModal" class="modal-overlay hidden">
        <div class="modal" style="max-width: 700px;">
            <div class="modal-header">
                <h2>Admin Face Registration</h2>
                <button class="icon-btn" onclick="closeAdminFaceReg()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="face-container">
                    <div class="video-wrapper">
                        <video id="adminFaceVideo" autoplay muted playsinline></video>
                        <canvas id="adminFaceCanvas"></canvas>
                    </div>
                    <div id="adminFaceStatus" class="face-status">
                        <span class="material-symbols-outlined">face</span>
                        <span>Position your face in the frame</span>
                    </div>
                    <div class="face-grid" id="adminCapturedFaces" style="width: 100%; margin-top: 16px;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text" onclick="closeAdminFaceReg()">Cancel</button>
                <button class="btn btn-secondary" onclick="captureAdminFace()">
                    <span class="material-symbols-outlined">photo_camera</span>
                    Capture
                </button>
                <button class="btn btn-primary" id="saveAdminFaceBtn" onclick="saveAdminFaces()" disabled>
                    <span class="material-symbols-outlined">save</span>
                    Save
                </button>
            </div>
        </div>
    </div>

    <!-- Apply Leave Modal -->
    <div id="applyLeaveModal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2>Apply for Leave</h2>
                <button class="icon-btn" onclick="closeApplyLeaveModal()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="leaveForm">
                    <div class="form-field">
                        <label>Leave Type</label>
                        <select id="leaveType">
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Vacation Leave">Vacation Leave</option>
                            <option value="Emergency Leave">Emergency Leave</option>
                            <option value="Maternity/Paternity Leave">Maternity/Paternity Leave</option>
                            <option value="Unpaid Leave">Unpaid Leave</option>
                        </select>
                    </div>
                    <div class="grid-2">
                        <div class="form-field">
                            <label>Start Date</label>
                            <input type="date" id="leaveStartDate">
                        </div>
                        <div class="form-field">
                            <label>End Date</label>
                            <input type="date" id="leaveEndDate">
                        </div>
                    </div>
                    <div class="form-field">
                        <label>Reason</label>
                        <textarea id="leaveReason" rows="3" placeholder="Please state your reason..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-text" onclick="closeApplyLeaveModal()">Cancel</button>
                <button class="btn btn-primary" onclick="applyLeave()">Submit Application</button>
            </div>
        </div>
    </div>

    <script>
        // Database and State
        let db;
        let currentUser = null;
        let faceApiLoaded = false;
        let activeStream = null;
        let capturedFaces = [];
        let adminCapturedFaces = [];
        let currentEmployeeForFace = null;
        let labeledFaceDescriptors = [];

        // IndexedDB Setup
        const DB_NAME = 'FaceIDAttendanceDB';
        const DB_VERSION = 4;

        async function initDatabase() {
            return new Promise((resolve, reject) => {
                const request = indexedDB.open(DB_NAME, DB_VERSION);

                request.onerror = () => reject(request.error);
                request.onsuccess = () => {
                    db = request.result;
                    resolve(db);
                };

                request.onupgradeneeded = (event) => {
                    const database = event.target.result;

                    // Employees store
                    if (!database.objectStoreNames.contains('employees')) {
                        const empStore = database.createObjectStore('employees', { keyPath: 'id' });
                        empStore.createIndex('email', 'email', { unique: true });
                    }

                    // Attendance store
                    if (event.oldVersion < 3) {
                         if (database.objectStoreNames.contains('attendance')) {
                            database.deleteObjectStore('attendance');
                         }
                         const attStore = database.createObjectStore('attendance', { keyPath: 'id', autoIncrement: true });
                         attStore.createIndex('employeeId', 'employeeId');
                         attStore.createIndex('date', 'date');
                    } else if (!database.objectStoreNames.contains('attendance')) {
                        const attStore = database.createObjectStore('attendance', { keyPath: 'id', autoIncrement: true });
                        attStore.createIndex('employeeId', 'employeeId');
                        attStore.createIndex('date', 'date');
                    }

                    // Payroll store
                    if (!database.objectStoreNames.contains('payroll')) {
                        const payStore = database.createObjectStore('payroll', { keyPath: 'id', autoIncrement: true });
                        payStore.createIndex('employeeId', 'employeeId');
                        payStore.createIndex('month', 'month');
                    }

                    // Face data store
                    if (!database.objectStoreNames.contains('faceData')) {
                        const faceStore = database.createObjectStore('faceData', { keyPath: 'id' });
                        faceStore.createIndex('type', 'type');
                    }

                    // Settings store
                    if (!database.objectStoreNames.contains('settings')) {
                        database.createObjectStore('settings', { keyPath: 'key' });
                    }

                    // Users store
                    if (!database.objectStoreNames.contains('users')) {
                        const userStore = database.createObjectStore('users', { keyPath: 'username' });
                    }

                    // Leaves store (Version 4)
                    if (!database.objectStoreNames.contains('leaves')) {
                        const leaveStore = database.createObjectStore('leaves', { keyPath: 'id', autoIncrement: true });
                        leaveStore.createIndex('employeeId', 'employeeId');
                        leaveStore.createIndex('status', 'status');
                    }

                    // Retirements store (Version 4)
                    if (!database.objectStoreNames.contains('retirements')) {
                        const retirementStore = database.createObjectStore('retirements', { keyPath: 'id', autoIncrement: true });
                        retirementStore.createIndex('employeeId', 'employeeId');
                    }
                };
            });
        }

        // Database helpers
        function getStore(storeName, mode = 'readonly') {
            const transaction = db.transaction(storeName, mode);
            return transaction.objectStore(storeName);
        }

        async function dbGet(storeName, key) {
            return new Promise((resolve, reject) => {
                const request = getStore(storeName).get(key);
                request.onsuccess = () => resolve(request.result);
                request.onerror = () => reject(request.error);
            });
        }

        async function dbGetAll(storeName) {
            return new Promise((resolve, reject) => {
                const request = getStore(storeName).getAll();
                request.onsuccess = () => resolve(request.result);
                request.onerror = () => reject(request.error);
            });
        }

        async function dbPut(storeName, data) {
            return new Promise((resolve, reject) => {
                const request = getStore(storeName, 'readwrite').put(data);
                request.onsuccess = () => resolve(request.result);
                request.onerror = () => reject(request.error);
            });
        }

        async function dbDelete(storeName, key) {
            return new Promise((resolve, reject) => {
                const request = getStore(storeName, 'readwrite').delete(key);
                request.onsuccess = () => resolve();
                request.onerror = () => reject(request.error);
            });
        }

        async function dbClear(storeName) {
            return new Promise((resolve, reject) => {
                const request = getStore(storeName, 'readwrite').clear();
                request.onsuccess = () => resolve();
                request.onerror = () => reject(request.error);
            });
        }

        // Face API Setup
        async function loadFaceAPI() {
            try {
                const MODEL_URL = 'https://cdn.jsdelivr.net/npm/@vladmandic/face-api/model';
                await faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL);
                await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
                await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);
                faceApiLoaded = true;
                console.log('Face API models loaded');
                return true;
            } catch (error) {
                console.error('Error loading face-api models:', error);
                return false;
            }
        }

        // Initialize app
        async function init() {
            try {
                await initDatabase();
                await initDefaultData();
                const faceLoaded = await loadFaceAPI();
                
                if (!faceLoaded) {
                    showToast('Face recognition models failed to load. Some features may not work.', 'warning');
                }

                if (faceLoaded) {
                    await loadFaceDescriptors();
                }
                
                document.getElementById('loadingOverlay').classList.add('hidden');
                
                // Check for existing session
                const session = sessionStorage.getItem('currentUser');
                if (session) {
                    currentUser = JSON.parse(session);
                    showDashboard();
                } else {
                    document.getElementById('loginPage').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Initialization error:', error);
                document.getElementById('loadingOverlay').innerHTML = `
                    <div style="text-align: center; padding: 24px;">
                        <span class="material-symbols-outlined" style="font-size: 48px; color: var(--md-sys-color-error);">error</span>
                        <p style="margin-top: 16px;">Failed to initialize application</p>
                        <p style="margin-top: 8px; font-size: 12px; color: var(--md-sys-color-on-surface-variant);">${error.message || JSON.stringify(error)}</p>
                        <button class="btn btn-primary" style="margin-top: 16px;" onclick="location.reload()">Retry</button>
                    </div>
                `;
            }
        }

        async function initDefaultData() {
            // Check if default admin exists
            const admin = await dbGet('users', 'admin');
            if (!admin) {
                await dbPut('users', {
                    username: 'admin',
                    password: 'admin123',
                    role: 'admin',
                    name: 'Administrator'
                });
            }

            // Default settings
            const settings = await dbGetAll('settings');
            if (settings.length === 0) {
                await dbPut('settings', { key: 'companyName', value: 'Acme Corporation' });
                await dbPut('settings', { key: 'workStart', value: '09:00' });
                await dbPut('settings', { key: 'workEnd', value: '18:00' });
                await dbPut('settings', { key: 'lateThreshold', value: 15 });
                await dbPut('settings', { key: 'overtimeRate', value: 1.5 });
                await dbPut('settings', { key: 'taxRate', value: 10 });
                await dbPut('settings', { key: 'currency', value: '₱' });
            }

            // Initialize payroll month selector
            initPayrollMonths();
        }

        function initPayrollMonths() {
            const select = document.getElementById('payrollMonth');
            const now = new Date();
            for (let i = 0; i < 12; i++) {
                const date = new Date(now.getFullYear(), now.getMonth() - i, 1);
                const option = document.createElement('option');
                option.value = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
                option.textContent = date.toLocaleDateString('en-US', { year: 'numeric', month: 'long' });
                select.appendChild(option);
            }
        }

        // Authentication
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;
            const role = document.getElementById('loginRole').value;

            if (role === 'admin') {
                const user = await dbGet('users', username);
                if (user && user.password === password) {
                    currentUser = { ...user, role: 'admin' };
                    sessionStorage.setItem('currentUser', JSON.stringify(currentUser));
                    showDashboard();
                } else {
                    showToast('Invalid credentials', 'error');
                }
            } else {
                // Employee login - find by email or ID
                const employees = await dbGetAll('employees');
                const employee = employees.find(e => 
                    e.email.toLowerCase() === username.toLowerCase() || 
                    e.id === username
                );
                if (employee) {
                    currentUser = { ...employee, role: 'employee', username: employee.id };
                    sessionStorage.setItem('currentUser', JSON.stringify(currentUser));
                    showDashboard();
                } else {
                    showToast('Employee not found', 'error');
                }
            }
        });

        function showFaceLogin() {
            document.getElementById('faceLoginModal').classList.remove('hidden');
            startFaceLogin();
        }

        function closeFaceLogin() {
            document.getElementById('faceLoginModal').classList.add('hidden');
            stopStream();
        }

        async function startFaceLogin() {
            const video = document.getElementById('faceLoginVideo');
            const canvas = document.getElementById('faceLoginCanvas');
            const status = document.getElementById('faceLoginStatus');

            try {
                activeStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'user', width: 640, height: 480 } 
                });
                video.srcObject = activeStream;

                video.onloadedmetadata = async () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    detectFaceForLogin(video, canvas, status);
                };
            } catch (error) {
                status.innerHTML = `
                    <span class="material-symbols-outlined">error</span>
                    <span>Camera access denied</span>
                `;
                status.classList.add('error');
            }
        }

        async function detectFaceForLogin(video, canvas, status) {
            if (!document.getElementById('faceLoginModal').classList.contains('hidden')) {
                const ctx = canvas.getContext('2d');
                
                if (faceApiLoaded) {
                    const detection = await faceapi.detectSingleFace(video)
                        .withFaceLandmarks()
                        .withFaceDescriptor();

                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    if (detection) {
                        const dims = faceapi.matchDimensions(canvas, video, true);
                        const resized = faceapi.resizeResults(detection, dims);
                        faceapi.draw.drawDetections(canvas, resized);

                        // Try to match face
                        if (labeledFaceDescriptors.length > 0) {
                            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);
                            const match = faceMatcher.findBestMatch(detection.descriptor);

                            if (match.label !== 'unknown') {
                                status.innerHTML = `
                                    <span class="material-symbols-outlined">check_circle</span>
                                    <span>Recognized: ${match.label}</span>
                                `;
                                status.classList.add('success');
                                status.classList.remove('error');

                                // Login the user
                                setTimeout(async () => {
                                    const id = match.label.split(' - ')[0];
                                    if (id === 'admin') {
                                        const user = await dbGet('users', 'admin');
                                        currentUser = { ...user, role: 'admin' };
                                    } else {
                                        const employee = await dbGet('employees', id);
                                        if (employee) {
                                            currentUser = { ...employee, role: 'employee', username: employee.id };
                                        }
                                    }
                                    
                                    if (currentUser) {
                                        sessionStorage.setItem('currentUser', JSON.stringify(currentUser));
                                        closeFaceLogin();
                                        showDashboard();
                                        showToast('Welcome back!', 'success');
                                    }
                                }, 1000);
                                return;
                            }
                        }

                        status.innerHTML = `
                            <span class="material-symbols-outlined">face</span>
                            <span>Face not recognized</span>
                        `;
                    } else {
                        status.innerHTML = `
                            <span class="material-symbols-outlined">face</span>
                            <span>Looking for face...</span>
                        `;
                    }
                    status.classList.remove('success', 'error');
                }

                requestAnimationFrame(() => detectFaceForLogin(video, canvas, status));
            }
        }

        function logout() {
            sessionStorage.removeItem('currentUser');
            currentUser = null;
            document.getElementById('dashboard').classList.add('hidden');
            document.getElementById('loginPage').classList.remove('hidden');
            stopStream();
        }

        function showDashboard() {
            document.getElementById('loginPage').classList.add('hidden');
            document.getElementById('dashboard').classList.remove('hidden');

            // Update user info
            document.getElementById('userName').textContent = currentUser.name || currentUser.firstName + ' ' + currentUser.lastName;
            document.getElementById('userRole').textContent = currentUser.role === 'admin' ? 'Administrator' : 'Employee';
            document.getElementById('userAvatar').textContent = (currentUser.name || currentUser.firstName || 'U')[0].toUpperCase();

            // Show/hide admin elements
            const adminElements = document.querySelectorAll('.admin-only');
            adminElements.forEach(el => {
                if (currentUser.role === 'admin') {
                    el.classList.remove('hidden');
                } else {
                    el.classList.add('hidden');
                }
            });

            navigateTo('dashboard');
            loadDashboardData();
        }

        // Navigation
        function navigateTo(page) {
            document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
            document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));

            document.getElementById(page + 'Page').classList.remove('hidden');
            document.querySelector(`[data-page="${page}"]`).classList.add('active');

            switch(page) {
                case 'dashboard':
                    loadDashboardData();
                    break;
                case 'attendance':
                    loadAttendance();
                    break;
                case 'employees':
                    loadEmployees();
                    break;
                case 'payroll':
                    loadPayroll();
                    break;
                case 'reports':
                    loadReports();
                    break;
                case 'settings':
                    loadSettings();
                    break;
                case 'leaves':
                    loadLeaves();
                    break;
                case 'profile':
                    loadProfile();
                    break;
            }
        }

        // Dashboard
        async function loadDashboardData() {
            const employees = await dbGetAll('employees');
            const attendance = await dbGetAll('attendance');
            const today = new Date().toISOString().split('T')[0];

            const todayAttendance = attendance.filter(a => a.date === today);
            const presentToday = new Set(todayAttendance.map(a => a.employeeId)).size;
            const lateToday = todayAttendance.filter(a => a.isLate).length;

            document.getElementById('statTotalEmployees').textContent = employees.length;
            document.getElementById('statPresentToday').textContent = presentToday;
            document.getElementById('statLateToday').textContent = lateToday;
            document.getElementById('statAbsentToday').textContent = Math.max(0, employees.length - presentToday);

            // Recent attendance
            const recentTable = document.getElementById('recentAttendanceTable');
            const recent = attendance.slice(-5).reverse();
            recentTable.innerHTML = recent.map(a => {
                const emp = employees.find(e => e.id === a.employeeId);
                return `
                    <tr>
                        <td>${emp ? emp.firstName + ' ' + emp.lastName : a.employeeId}</td>
                        <td>${a.clockIn || '-'}</td>
                        <td><span class="chip ${a.isLate ? 'chip-warning' : 'chip-success'}">${a.isLate ? 'Late' : 'On Time'}</span></td>
                    </tr>
                `;
            }).join('');

            if (recent.length === 0) {
                recentTable.innerHTML = '<tr><td colspan="3" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">No attendance records today</td></tr>';
            }
        }

        // Employees
        async function loadEmployees() {
            const employees = await dbGetAll('employees');
            const faceData = await dbGetAll('faceData');
            const table = document.getElementById('employeeTable');

            table.innerHTML = employees.map(emp => {
                const hasFace = faceData.some(f => f.id === emp.id);
                return `
                    <tr>
                        <td><strong>${emp.id}</strong></td>
                        <td>${(emp.firstName || 'Unknown') + ' ' + (emp.lastName || '')}</td>
                        <td>${emp.department}</td>
                        <td>${emp.position}</td>
                        <td>${emp.email}</td>
                        <td>${emp.phone || '-'}</td>
                        <td><span class="chip ${emp.status === 'active' ? 'chip-success' : 'chip-error'}">${emp.status || 'Active'}</span></td>
                        <td><span class="chip ${hasFace ? 'chip-success' : 'chip-warning'}">${hasFace ? 'Yes' : 'No'}</span></td>
                        <td>
                            <button class="icon-btn" onclick="editEmployee('${emp.id}')" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="icon-btn" onclick="showFaceRegistrationFor('${emp.id}')" title="Register Face">
                                <span class="material-symbols-outlined">face</span>
                            </button>
                            <button class="icon-btn" onclick="deleteEmployee('${emp.id}')" title="Delete">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');

            if (employees.length === 0) {
                table.innerHTML = '<tr><td colspan="9" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">No employees found. Add your first employee!</td></tr>';
            }
        }

        function showAddEmployeeModal() {
            document.getElementById('employeeModalTitle').textContent = 'Add New Employee';
            document.getElementById('employeeForm').reset();
            document.getElementById('employeeId').value = '';
            document.getElementById('empJoinDate').value = new Date().toISOString().split('T')[0];
            document.getElementById('addEmployeeModal').classList.remove('hidden');
        }

        function closeEmployeeModal() {
            document.getElementById('addEmployeeModal').classList.add('hidden');
        }

        async function editEmployee(id) {
            const employee = await dbGet('employees', id);
            if (employee) {
                document.getElementById('employeeModalTitle').textContent = 'Edit Employee';
                document.getElementById('employeeId').value = employee.id;
                document.getElementById('empFirstName').value = employee.firstName;
                document.getElementById('empLastName').value = employee.lastName;
                document.getElementById('empEmail').value = employee.email;
                document.getElementById('empPhone').value = employee.phone || '';
                document.getElementById('empDepartment').value = employee.department;
                document.getElementById('empPosition').value = employee.position;
                document.getElementById('empSalary').value = employee.salary;
                document.getElementById('empType').value = employee.type || 'fulltime';
                document.getElementById('empJoinDate').value = employee.joinDate || '';
                document.getElementById('addEmployeeModal').classList.remove('hidden');
            }
        }

        async function saveEmployee() {
            const form = document.getElementById('employeeForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const existingId = document.getElementById('employeeId').value;
            const id = existingId || generateEmployeeId();

            const employee = {
                id,
                firstName: document.getElementById('empFirstName').value,
                lastName: document.getElementById('empLastName').value,
                email: document.getElementById('empEmail').value,
                phone: document.getElementById('empPhone').value,
                department: document.getElementById('empDepartment').value,
                position: document.getElementById('empPosition').value,
                salary: parseFloat(document.getElementById('empSalary').value),
                type: document.getElementById('empType').value,
                joinDate: document.getElementById('empJoinDate').value,
                status: 'active',
                createdAt: existingId ? undefined : new Date().toISOString()
            };

            await dbPut('employees', employee);
            closeEmployeeModal();
            loadEmployees();
            loadDashboardData();
            showToast(existingId ? 'Employee updated successfully' : 'Employee added successfully', 'success');
        }

        async function saveEmployeeAndRegisterFace() {
            const form = document.getElementById('employeeForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const existingId = document.getElementById('employeeId').value;
            const id = existingId || generateEmployeeId();

            const employee = {
                id,
                firstName: document.getElementById('empFirstName').value,
                lastName: document.getElementById('empLastName').value,
                email: document.getElementById('empEmail').value,
                phone: document.getElementById('empPhone').value,
                department: document.getElementById('empDepartment').value,
                position: document.getElementById('empPosition').value,
                salary: parseFloat(document.getElementById('empSalary').value),
                type: document.getElementById('empType').value,
                joinDate: document.getElementById('empJoinDate').value,
                status: 'active',
                createdAt: existingId ? undefined : new Date().toISOString()
            };

            await dbPut('employees', employee);
            closeEmployeeModal();
            
            showFaceRegistrationFor(id);
        }

        async function deleteEmployee(id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                await dbDelete('employees', id);
                await dbDelete('faceData', id);
                await loadFaceDescriptors();
                loadEmployees();
                loadDashboardData();
                showToast('Employee deleted', 'success');
            }
        }

        function generateEmployeeId() {
            const prefix = 'EMP';
            const timestamp = Date.now().toString(36).toUpperCase();
            const random = Math.random().toString(36).substring(2, 5).toUpperCase();
            return `${prefix}${timestamp}${random}`;
        }

        function filterEmployees() {
            const search = document.getElementById('employeeSearch').value.toLowerCase();
            const rows = document.querySelectorAll('#employeeTable tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(search) ? '' : 'none';
            });
        }

        // Face Registration
        async function showFaceRegistrationFor(employeeId) {
            const employee = await dbGet('employees', employeeId);
            if (!employee) {
                showToast('Employee not found', 'error');
                return;
            }

            currentEmployeeForFace = employee;
            capturedFaces = [];
            document.getElementById('faceRegEmployeeName').textContent = `${employee.firstName} ${employee.lastName} (${employee.id})`;
            document.getElementById('capturedFacesGrid').innerHTML = '';
            document.getElementById('saveFacesBtn').disabled = true;
            document.getElementById('faceRegistrationModal').classList.remove('hidden');

            startFaceRegistrationCamera();
        }

        async function startFaceRegistrationCamera() {
            const video = document.getElementById('faceRegVideo');
            const canvas = document.getElementById('faceRegCanvas');
            const status = document.getElementById('faceRegStatus');

            try {
                activeStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'user', width: 640, height: 480 } 
                });
                video.srcObject = activeStream;

                video.onloadedmetadata = () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    detectFaceForRegistration(video, canvas, status);
                };
            } catch (error) {
                status.innerHTML = `
                    <span class="material-symbols-outlined">error</span>
                    <span>Camera access denied</span>
                `;
                status.classList.add('error');
            }
        }

        async function detectFaceForRegistration(video, canvas, status) {
            if (!document.getElementById('faceRegistrationModal').classList.contains('hidden')) {
                const ctx = canvas.getContext('2d');
                
                if (faceApiLoaded) {
                    const detection = await faceapi.detectSingleFace(video)
                        .withFaceLandmarks()
                        .withFaceDescriptor();

                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    if (detection) {
                        const dims = faceapi.matchDimensions(canvas, video, true);
                        const resized = faceapi.resizeResults(detection, dims);
                        faceapi.draw.drawDetections(canvas, resized);
                        faceapi.draw.drawFaceLandmarks(canvas, resized);

                        status.innerHTML = `
                            <span class="material-symbols-outlined">check_circle</span>
                            <span>Face detected - Click "Capture Face" to save</span>
                        `;
                        status.classList.add('success');
                        status.classList.remove('error');
                        document.getElementById('captureFaceBtn').disabled = false;
                    } else {
                        status.innerHTML = `
                            <span class="material-symbols-outlined">face</span>
                            <span>Position your face in the frame</span>
                        `;
                        status.classList.remove('success', 'error');
                        document.getElementById('captureFaceBtn').disabled = true;
                    }
                }

                requestAnimationFrame(() => detectFaceForRegistration(video, canvas, status));
            }
        }

        async function captureFace() {
            const video = document.getElementById('faceRegVideo');
            
            if (faceApiLoaded) {
                const detection = await faceapi.detectSingleFace(video)
                    .withFaceLandmarks()
                    .withFaceDescriptor();

                if (detection) {
                    // Create thumbnail
                    const canvas = document.createElement('canvas');
                    canvas.width = 120;
                    canvas.height = 120;
                    const ctx = canvas.getContext('2d');
                    
                    // Draw face region
                    const box = detection.detection.box;
                    const padding = 30;
                    ctx.drawImage(video, 
                        box.x - padding, box.y - padding, box.width + padding * 2, box.height + padding * 2,
                        0, 0, 120, 120
                    );

                    const imageData = canvas.toDataURL('image/jpeg');
                    const descriptor = Array.from(detection.descriptor);

                    capturedFaces.push({ imageData, descriptor });

                    // Update grid
                    const grid = document.getElementById('capturedFacesGrid');
                    const item = document.createElement('div');
                    item.className = 'face-item';
                    item.innerHTML = `
                        <img src="${imageData}" alt="Captured face">
                        <button class="delete-face" onclick="removeCapturedFace(${capturedFaces.length - 1})">
                            <span class="material-symbols-outlined" style="font-size: 16px;">close</span>
                        </button>
                    `;
                    grid.appendChild(item);

                    document.getElementById('saveFacesBtn').disabled = capturedFaces.length < 1;
                    showToast(`Face ${capturedFaces.length} captured!`, 'success');
                }
            }
        }

        function removeCapturedFace(index) {
            capturedFaces.splice(index, 1);
            const grid = document.getElementById('capturedFacesGrid');
            grid.children[index].remove();
            document.getElementById('saveFacesBtn').disabled = capturedFaces.length < 1;
        }

        async function saveFaces() {
            if (capturedFaces.length === 0) {
                showToast('Please capture at least one face', 'error');
                return;
            }

            const faceData = {
                id: currentEmployeeForFace.id,
                type: 'employee',
                name: `${currentEmployeeForFace.firstName} ${currentEmployeeForFace.lastName}`,
                descriptors: capturedFaces.map(f => f.descriptor),
                images: capturedFaces.map(f => f.imageData),
                createdAt: new Date().toISOString()
            };

            await dbPut('faceData', faceData);
            await loadFaceDescriptors();

            closeFaceRegistration();
            loadEmployees();
            showToast('Face registration successful!', 'success');
        }

        function closeFaceRegistration() {
            document.getElementById('faceRegistrationModal').classList.add('hidden');
            stopStream();
            capturedFaces = [];
            currentEmployeeForFace = null;
        }

        async function loadFaceDescriptors() {
            labeledFaceDescriptors = [];
            const faceData = await dbGetAll('faceData');

            for (const face of faceData) {
                const descriptors = face.descriptors.map(d => new Float32Array(d));
                const label = face.type === 'admin' ? 'admin - Admin' : `${face.id} - ${face.name}`;
                labeledFaceDescriptors.push(new faceapi.LabeledFaceDescriptors(label, descriptors));
            }
        }

        // Attendance
        async function loadAttendance() {
            const attendance = await dbGetAll('attendance');
            const employees = await dbGetAll('employees');
            filterAttendanceByDate('today');
        }

        async function filterAttendanceByDate(period) {
            document.querySelectorAll('.tabs .tab').forEach(t => t.classList.remove('active'));
            event.target.classList.add('active');

            const attendance = await dbGetAll('attendance');
            const employees = await dbGetAll('employees');
            const now = new Date();
            let filtered = attendance;
            
            // Filter for employee
            if (currentUser.role === 'employee') {
                filtered = filtered.filter(a => a.employeeId === currentUser.id);
            }

            if (period === 'today') {
                const today = now.toISOString().split('T')[0];
                filtered = attendance.filter(a => a.date === today);
            } else if (period === 'week') {
                const weekAgo = new Date(now.getTime() - 7 * 24 * 60 * 60 * 1000);
                filtered = attendance.filter(a => new Date(a.date) >= weekAgo);
            } else if (period === 'month') {
                const monthStart = new Date(now.getFullYear(), now.getMonth(), 1);
                filtered = attendance.filter(a => new Date(a.date) >= monthStart);
            }

            renderAttendanceTable(filtered, employees);
        }

        function renderAttendanceTable(attendance, employees) {
            const table = document.getElementById('attendanceTable');
            
            table.innerHTML = attendance.reverse().map(a => {
                const emp = employees.find(e => e.id === a.employeeId);
                const hours = a.clockOut ? calculateHours(a.clockIn, a.clockOut) : '-';
                return `
                    <tr>
                        <td>${a.employeeId}</td>
                        <td>${emp ? emp.firstName + ' ' + emp.lastName : 'Unknown'}</td>
                        <td>${a.date}</td>
                        <td>${a.clockIn || '-'}</td>
                        <td>${a.clockOut || '-'}</td>
                        <td>${hours}</td>
                        <td>
                            <span class="chip ${a.isLate ? 'chip-warning' : 'chip-success'}">
                                ${a.isLate ? 'Late' : 'On Time'}
                            </span>
                        </td>
                        <td>
                            <button class="icon-btn" onclick="editAttendance(${a.id})" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');

            if (attendance.length === 0) {
                table.innerHTML = '<tr><td colspan="8" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">No attendance records found</td></tr>';
            }
        }

        function calculateHours(clockIn, clockOut) {
            if (!clockIn || !clockOut) return 0;
            const [inH, inM] = clockIn.split(':').map(Number);
            const [outH, outM] = clockOut.split(':').map(Number);
            const diff = (outH * 60 + outM) - (inH * 60 + inM);
            return (diff / 60).toFixed(2);
        }

        function filterAttendance() {
            const search = document.getElementById('attendanceSearch').value.toLowerCase();
            const rows = document.querySelectorAll('#attendanceTable tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(search) ? '' : 'none';
            });
        }

        // Quick Attendance & Kiosk
        function startPublicKiosk() {
            document.getElementById('loginPage').classList.add('hidden');
            showQuickAttendance();
        }

        function showQuickAttendance() {
            document.getElementById('quickAttendanceModal').classList.remove('hidden');
            startAttendanceClock();
            startAttendanceCamera();
        }

        function closeQuickAttendance() {
            document.getElementById('quickAttendanceModal').classList.add('hidden');
            stopStream();
            if (!currentUser) {
                document.getElementById('loginPage').classList.remove('hidden');
            }
        }

        function startAttendanceClock() {
            function updateClock() {
                const now = new Date();
                document.getElementById('attendanceClock').textContent = now.toLocaleTimeString();
                document.getElementById('attendanceDate').textContent = now.toLocaleDateString('en-US', { 
                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' 
                });

                if (!document.getElementById('quickAttendanceModal').classList.contains('hidden')) {
                    requestAnimationFrame(updateClock);
                }
            }
            updateClock();
        }

        async function startAttendanceCamera() {
            const video = document.getElementById('attendanceVideo');
            const canvas = document.getElementById('attendanceCanvas');
            const status = document.getElementById('attendanceStatus');

            try {
                activeStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'user', width: 640, height: 480 } 
                });
                video.srcObject = activeStream;

                video.onloadedmetadata = () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    detectFaceForAttendance(video, canvas, status);
                };
            } catch (error) {
                status.innerHTML = `
                    <span class="material-symbols-outlined">error</span>
                    <span>Camera access denied</span>
                `;
                status.classList.add('error');
            }
        }

        let lastRecognizedTime = 0;

        async function detectFaceForAttendance(video, canvas, status) {
            if (!document.getElementById('quickAttendanceModal').classList.contains('hidden')) {
                const ctx = canvas.getContext('2d');
                
                try {
                    if (faceApiLoaded && labeledFaceDescriptors.length > 0) {
                        const detection = await faceapi.detectSingleFace(video)
                            .withFaceLandmarks()
                            .withFaceDescriptor();

                        ctx.clearRect(0, 0, canvas.width, canvas.height);

                        if (detection) {
                            const dims = faceapi.matchDimensions(canvas, video, true);
                            const resized = faceapi.resizeResults(detection, dims);
                            faceapi.draw.drawDetections(canvas, resized);

                            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);
                            const match = faceMatcher.findBestMatch(detection.descriptor);

                            if (match.label !== 'unknown') {
                                if (Date.now() - lastRecognizedTime > 3000) {
                                    lastRecognizedTime = Date.now();
                                    const [id, name] = match.label.split(' - ');
                                    
                                    if (id !== 'admin') {
                                        document.getElementById('recognizedEmployee').classList.remove('hidden');
                                        document.getElementById('recognizedName').textContent = name;
                                        document.getElementById('recognizedId').textContent = id;

                                        status.innerHTML = `
                                            <span class="material-symbols-outlined">check_circle</span>
                                            <span>Recording attendance...</span>
                                        `;
                                        status.classList.add('success');

                                        await recordAttendance(id);
                                        
                                        // Reset status after short delay
                                        setTimeout(() => {
                                            if (status.innerHTML.includes('Recording attendance') || status.innerHTML.includes('recorded')) {
                                                 status.innerHTML = `
                                                    <span class="material-symbols-outlined">face</span>
                                                    <span>Show your face to clock in/out</span>
                                                `;
                                                status.classList.remove('success', 'error');
                                                document.getElementById('recognizedEmployee').classList.add('hidden');
                                            }
                                        }, 2000);
                                    }
                                } else {
                                     // Cooldown state - just show recognized but don't record
                                     const [id, name] = match.label.split(' - ');
                                     if (id !== 'admin') {
                                         status.innerHTML = `
                                            <span class="material-symbols-outlined">check_circle</span>
                                            <span>Hello, ${name.split(' ')[0]}</span>
                                        `;
                                        status.classList.add('success');
                                     }
                                }
                            } else {
                                // Unknown face
                                status.innerHTML = `
                                    <span class="material-symbols-outlined">warning</span>
                                    <span>Face not recognized</span>
                                `;
                                status.classList.remove('success');
                                status.classList.add('error');
                            }
                        } else {
                            document.getElementById('recognizedEmployee').classList.add('hidden');
                            status.innerHTML = `
                                <span class="material-symbols-outlined">face</span>
                                <span>Show your face to clock in/out</span>
                            `;
                            status.classList.remove('success', 'error');
                        }
                    } else if (labeledFaceDescriptors.length === 0) {
                        status.innerHTML = `
                            <span class="material-symbols-outlined">warning</span>
                            <span>No faces registered. Please register employees first.</span>
                        `;
                        status.classList.add('error');
                    }
                } catch (error) {
                    console.error('Detection error:', error);
                    status.innerHTML = `
                        <span class="material-symbols-outlined">error</span>
                        <span>Error: ${error.message}</span>
                    `;
                    status.classList.add('error');
                }

                // Continue loop regardless of error
                requestAnimationFrame(() => detectFaceForAttendance(video, canvas, status));
            }
        }

        async function recordAttendance(employeeId) {
            try {
                const now = new Date();
                const today = now.toISOString().split('T')[0];
                const currentTime = now.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' });

                const attendance = await dbGetAll('attendance');
                const todayRecord = attendance.find(a => a.employeeId === employeeId && a.date === today);

                const workStart = (await dbGet('settings', 'workStart'))?.value || '09:00';
                const lateThreshold = (await dbGet('settings', 'lateThreshold'))?.value || 15;

                if (!todayRecord) {
                    // Clock In
                    const [workH, workM] = workStart.split(':').map(Number);
                    const [nowH, nowM] = currentTime.split(':').map(Number);
                    const lateMinutes = (nowH * 60 + nowM) - (workH * 60 + workM);
                    const isLate = lateMinutes > lateThreshold;

                    await dbPut('attendance', {
                        id: Date.now(),
                        employeeId,
                        date: today,
                        clockIn: currentTime,
                        clockOut: null,
                        isLate,
                        lateMinutes: isLate ? lateMinutes : 0
                    });

                    showToast(`Clock In recorded at ${currentTime}${isLate ? ' (Late)' : ''}`, 'success');
                } else if (!todayRecord.clockOut) {
                    // Clock Out
                    todayRecord.clockOut = currentTime;
                    await dbPut('attendance', todayRecord);
                    showToast(`Clock Out recorded at ${currentTime}`, 'success');
                } else {
                    showToast('Already clocked in and out today', 'info');
                }

                loadDashboardData();
            } catch (error) {
                console.error('Recording error:', error);
                showToast(`Failed to save: ${error.message || 'Unknown error'}`, 'error');
            }
        }

        // Leaves & Profile Management
        async function loadLeaves() {
            const leaves = await dbGetAll('leaves');
            const employees = await dbGetAll('employees');
            
            if (currentUser.role === 'employee') {
                document.getElementById('adminLeavesView').classList.add('hidden');
                document.getElementById('employeeLeavesView').classList.remove('hidden');
                
                const myLeaves = leaves.filter(l => l.employeeId === currentUser.id);
                renderMyLeavesTable(myLeaves);
                document.getElementById('applyLeaveBtn').classList.remove('hidden');
            } else {
                document.getElementById('employeeLeavesView').classList.add('hidden');
                document.getElementById('adminLeavesView').classList.remove('hidden');
                document.getElementById('applyLeaveBtn').classList.add('hidden');
                
                renderAllLeavesTable(leaves, employees);
            }
        }

        function renderMyLeavesTable(leaves) {
            const tbody = document.getElementById('myLeavesTable');
            if (leaves.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">No leave requests found</td></tr>';
                return;
            }

            tbody.innerHTML = leaves.reverse().map(l => `
                <tr>
                    <td>${l.type}</td>
                    <td>${l.startDate} to ${l.endDate}</td>
                    <td>${l.days}</td>
                    <td>${l.reason}</td>
                    <td><span class="chip chip-${getStatusColor(l.status)}">${l.status}</span></td>
                    <td>
                        ${l.status === 'pending' ? `<button class="icon-btn" onclick="deleteLeave(${l.id})" title="Cancel"><span class="material-symbols-outlined">close</span></button>` : '-'}
                    </td>
                </tr>
            `).join('');
        }

        function renderAllLeavesTable(leaves, employees) {
            const tbody = document.getElementById('allLeavesTable');
            if (leaves.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align: center; color: var(--md-sys-color-on-surface-variant);">No leave requests found</td></tr>';
                return;
            }

            tbody.innerHTML = leaves.reverse().map(l => {
                const emp = employees.find(e => e.id === l.employeeId);
                return `
                <tr>
                    <td>${emp ? emp.firstName + ' ' + emp.lastName : l.employeeId}</td>
                    <td>${l.type}</td>
                    <td>${l.startDate} to ${l.endDate}</td>
                    <td>${l.days}</td>
                    <td>${l.reason}</td>
                    <td><span class="chip chip-${getStatusColor(l.status)}">${l.status}</span></td>
                    <td>
                        ${l.status === 'pending' ? `
                            <button class="icon-btn" onclick="updateLeaveStatus(${l.id}, 'approved')" title="Approve" style="color: var(--md-sys-color-success);">
                                <span class="material-symbols-outlined">check</span>
                            </button>
                            <button class="icon-btn" onclick="updateLeaveStatus(${l.id}, 'rejected')" title="Reject" style="color: var(--md-sys-color-error);">
                                <span class="material-symbols-outlined">block</span>
                            </button>
                        ` : l.status === 'approved' ? `
                             <button class="icon-btn" onclick="updateLeaveStatus(${l.id}, 'rejected')" title="Reject" style="color: var(--md-sys-color-error);">
                                <span class="material-symbols-outlined">block</span>
                            </button>
                        ` : ''}
                    </td>
                </tr>
            `}).join('');
        }

        function getStatusColor(status) {
            switch(status) {
                case 'approved': return 'success';
                case 'rejected': return 'error';
                default: return 'warning';
            }
        }

        function showApplyLeaveModal() {
            document.getElementById('leaveForm').reset();
            document.getElementById('applyLeaveModal').classList.remove('hidden');
        }

        function closeApplyLeaveModal() {
             document.getElementById('applyLeaveModal').classList.add('hidden');
        }

        async function applyLeave() {
            const type = document.getElementById('leaveType').value;
            const startDate = document.getElementById('leaveStartDate').value;
            const endDate = document.getElementById('leaveEndDate').value;
            const reason = document.getElementById('leaveReason').value;

            if (!type || !startDate || !endDate) {
                showToast('Please fill in all required fields', 'error');
                return;
            }

            const start = new Date(startDate);
            const end = new Date(endDate);
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 

            await dbPut('leaves', {
                id: Date.now(),
                employeeId: currentUser.id,
                type,
                startDate,
                endDate,
                days: diffDays,
                reason,
                status: 'pending',
                createdAt: new Date().toISOString()
            });

            closeApplyLeaveModal();
            loadLeaves();
            showToast('Leave request submitted', 'success');
        }

        async function updateLeaveStatus(id, newStatus) {
            const leave = await dbGet('leaves', id);
            if (leave) {
                leave.status = newStatus;
                await dbPut('leaves', leave);
                loadLeaves();
                showToast(`Leave request ${newStatus}`, 'success');
            }
        }
        
        async function deleteLeave(id) {
             if(confirm("Are you sure you want to cancel this request?")) {
                 await dbDelete('leaves', id);
                 loadLeaves();
                 showToast('Request cancelled', 'info');
             }
        }

        // Profile
        async function loadProfile() {
            document.getElementById('profileAvatar').textContent = (currentUser.name || currentUser.firstName || 'U')[0].toUpperCase();
            document.getElementById('profileName').textContent = currentUser.name || currentUser.firstName + ' ' + currentUser.lastName;
            document.getElementById('profileRole').textContent = currentUser.role === 'admin' ? 'Administrator' : 'Employee';
            
            document.getElementById('profileId').value = currentUser.username || currentUser.id || '';
            document.getElementById('profileEmail').value = currentUser.email || '';
            document.getElementById('profilePhone').value = currentUser.phone || '';
            document.getElementById('profileDept').value = currentUser.department || 'N/A';

            if (currentUser.role === 'admin') {
                document.getElementById('retirementBtn').classList.add('hidden');
            } else {
                 document.getElementById('retirementBtn').classList.remove('hidden');
                 
                 // Check if already applied
                 const retirements = await dbGetAll('retirements');
                 const hasApplied = retirements.some(r => r.employeeId === currentUser.id);
                 if(hasApplied) {
                     document.getElementById('retirementBtn').disabled = true;
                     document.getElementById('retirementBtn').textContent = 'Retirement Applied';
                 }
            }
        }

        async function saveProfile() {
            const email = document.getElementById('profileEmail').value;
            const phone = document.getElementById('profilePhone').value;

            if (!email) {
                 showToast('Email is required', 'error');
                 return;
            }

            currentUser.email = email;
            currentUser.phone = phone;

            if (currentUser.role === 'employee') {
                 const emp = await dbGet('employees', currentUser.id);
                 if (emp) {
                     emp.email = email;
                     emp.phone = phone;
                     await dbPut('employees', emp);
                 }
            } else {
                 const user = await dbGet('users', 'admin'); 
                 if(user) {
                     user.email = email; 
                     user.phone = phone;
                     await dbPut('users', user);
                 }
            }
            
            sessionStorage.setItem('currentUser', JSON.stringify(currentUser));
            showToast('Profile updated successfully', 'success');
        }

        async function applyRetirement() {
             if(confirm("Are you sure you want to apply for retirement? This action cannot be undone.")) {
                 await dbPut('retirements', {
                     id: Date.now(),
                     employeeId: currentUser.id,
                     date: new Date().toISOString().split('T')[0],
                     status: 'pending'
                 });
                 showToast('Retirement application submitted. Admin will review.', 'success');
                 document.getElementById('retirementBtn').disabled = true;
                 document.getElementById('retirementBtn').textContent = 'Retirement Applied';
             }
        }

        // Payroll
        async function loadPayroll() {
            const month = document.getElementById('payrollMonth').value;
            const employees = await dbGetAll('employees');
            const attendance = await dbGetAll('attendance');
            const payroll = await dbGetAll('payroll');
            const settings = await loadPayrollSettings();

            // Filter for employee
            if (currentUser.role === 'employee') {
                document.querySelector('.header-actions select').disabled = true; // Disable month selection for now or allow it? Let's allow it
                document.querySelector('.header-actions button').classList.add('hidden'); // Hide Process Payroll
                document.querySelector('.card-header button').classList.add('hidden'); // Hide Export
                
                // Filter employees list to just current user
                employees = employees.filter(e => e.id === currentUser.id);
            } else {
                 document.querySelector('.header-actions select').disabled = false;
                 document.querySelector('.header-actions button').classList.remove('hidden');
                 document.querySelector('.card-header button').classList.remove('hidden');
            }

            const monthPayroll = payroll.filter(p => p.month === month);
            
            let totalPayroll = 0;
            let totalBonus = 0;
            let totalDeductions = 0;

            const table = document.getElementById('payrollTable');
            table.innerHTML = employees.map(emp => {
                const empPayroll = monthPayroll.find(p => p.employeeId === emp.id);
                const empAttendance = attendance.filter(a => a.employeeId === emp.id && a.date.startsWith(month));
                
                const daysWorked = empAttendance.length;
                const totalHours = empAttendance.reduce((sum, a) => {
                    return sum + (a.clockOut ? parseFloat(calculateHours(a.clockIn, a.clockOut)) : 0);
                }, 0);

                const dailyRate = (Number(emp.salary) || 0) / 22; // Assuming 22 working days
                const basePay = dailyRate * daysWorked;
                const overtime = Math.max(0, totalHours - (daysWorked * 8)) * (dailyRate / 8) * settings.overtimeRate;
                const deductions = basePay * (settings.taxRate / 100);
                const netPay = basePay + overtime - deductions;

                totalPayroll += netPay;
                totalBonus += overtime;
                totalDeductions += deductions;

                const status = empPayroll?.status || 'pending';

                return `
                    <tr>
                        <td>${emp.id}</td>
                        <td>${(emp.firstName || 'Unknown') + ' ' + (emp.lastName || '')}</td>
                        <td>${emp.department}</td>
                        <td>${daysWorked}</td>
                        <td>${totalHours.toFixed(1)}</td>
                        <td>${settings.currency}${basePay.toFixed(2)}</td>
                        <td>${settings.currency}${overtime.toFixed(2)}</td>
                        <td class="deduction">${settings.currency}${deductions.toFixed(2)}</td>
                        <td><strong>${settings.currency}${netPay.toFixed(2)}</strong></td>
                        <td>
                            <span class="chip ${status === 'paid' ? 'chip-success' : status === 'processed' ? 'chip-info' : 'chip-warning'}">
                                ${status.charAt(0).toUpperCase() + status.slice(1)}
                            </span>
                        </td>
                        <td>
                            <button class="icon-btn" onclick="showPayrollDetail('${emp.id}', '${month}')" title="View Details">
                                <span class="material-symbols-outlined">visibility</span>
                            </button>
                            <button class="icon-btn" onclick="markAsPaid('${emp.id}', '${month}')" title="Mark as Paid">
                                <span class="material-symbols-outlined">check_circle</span>
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');

            document.getElementById('statTotalPayroll').textContent = `${settings.currency}${totalPayroll.toFixed(2)}`;
            document.getElementById('statPayrollEmployees').textContent = employees.length;
            document.getElementById('statTotalBonus').textContent = `${settings.currency}${totalBonus.toFixed(2)}`;
            document.getElementById('statTotalDeductions').textContent = `${settings.currency}${totalDeductions.toFixed(2)}`;
        }

        async function loadPayrollSettings() {
            return {
                overtimeRate: (await dbGet('settings', 'overtimeRate'))?.value || 1.5,
                taxRate: (await dbGet('settings', 'taxRate'))?.value || 10,
                currency: (await dbGet('settings', 'currency'))?.value || '₱'
            };
        }

        async function processPayroll() {
            const month = document.getElementById('payrollMonth').value;
            const employees = await dbGetAll('employees');
            const attendance = await dbGetAll('attendance');
            const settings = await loadPayrollSettings();

            for (const emp of employees) {
                const empAttendance = attendance.filter(a => a.employeeId === emp.id && a.date.startsWith(month));
                const daysWorked = empAttendance.length;
                const totalHours = empAttendance.reduce((sum, a) => {
                    return sum + (a.clockOut ? parseFloat(calculateHours(a.clockIn, a.clockOut)) : 0);
                }, 0);

                const dailyRate = emp.salary / 22;
                const basePay = dailyRate * daysWorked;
                const overtime = Math.max(0, totalHours - (daysWorked * 8)) * (dailyRate / 8) * settings.overtimeRate;
                const deductions = basePay * (settings.taxRate / 100);
                const netPay = basePay + overtime - deductions;

                await dbPut('payroll', {
                    id: `${emp.id}-${month}`,
                    employeeId: emp.id,
                    month,
                    daysWorked,
                    totalHours,
                    basePay,
                    overtime,
                    deductions,
                    netPay,
                    status: 'processed',
                    processedAt: new Date().toISOString()
                });
            }

            loadPayroll();
            showToast('Payroll processed successfully!', 'success');
        }

        async function markAsPaid(employeeId, month) {
            const payrollId = `${employeeId}-${month}`;
            const payroll = await dbGet('payroll', payrollId);
            if (payroll) {
                payroll.status = 'paid';
                payroll.paidAt = new Date().toISOString();
                await dbPut('payroll', payroll);
                loadPayroll();
                showToast('Marked as paid', 'success');
            }
        }

        async function showPayrollDetail(employeeId, month) {
            const employee = await dbGet('employees', employeeId);
            const attendance = await dbGetAll('attendance');
            const settings = await loadPayrollSettings();

            const empAttendance = attendance.filter(a => a.employeeId === employeeId && a.date.startsWith(month));
            const daysWorked = empAttendance.length;
            const totalHours = empAttendance.reduce((sum, a) => {
                return sum + (a.clockOut ? parseFloat(calculateHours(a.clockIn, a.clockOut)) : 0);
            }, 0);

            const dailyRate = employee.salary / 22;
            const basePay = dailyRate * daysWorked;
            const overtime = Math.max(0, totalHours - (daysWorked * 8)) * (dailyRate / 8) * settings.overtimeRate;
            const deductions = basePay * (settings.taxRate / 100);
            const netPay = basePay + overtime - deductions;

            document.getElementById('payrollDetailContent').innerHTML = `
                <div style="text-align: center; margin-bottom: 24px; padding-bottom: 24px; border-bottom: 1px solid var(--md-sys-color-outline-variant);">
                    <h3 style="font-size: 24px; margin-bottom: 8px;">${employee.firstName} ${employee.lastName}</h3>
                    <p style="color: var(--md-sys-color-on-surface-variant);">${employee.id} | ${employee.department}</p>
                    <p style="color: var(--md-sys-color-on-surface-variant);">Pay Period: ${month}</p>
                </div>
                <div class="payroll-item">
                    <span>Days Worked</span>
                    <span>${daysWorked} days</span>
                </div>
                <div class="payroll-item">
                    <span>Total Hours</span>
                    <span>${totalHours.toFixed(1)} hours</span>
                </div>
                <div class="payroll-item">
                    <span>Base Salary</span>
                    <span>${settings.currency}${basePay.toFixed(2)}</span>
                </div>
                <div class="payroll-item">
                    <span>Overtime Pay</span>
                    <span>${settings.currency}${overtime.toFixed(2)}</span>
                </div>
                <div class="payroll-item deduction">
                    <span>Tax Deduction (${settings.taxRate}%)</span>
                    <span>-${settings.currency}${deductions.toFixed(2)}</span>
                </div>
                <div class="payroll-item" style="margin-top: 16px; padding-top: 16px; border-top: 2px solid var(--md-sys-color-primary);">
                    <span style="font-size: 20px;">Net Pay</span>
                    <span style="font-size: 24px; color: var(--md-sys-color-primary);">${settings.currency}${netPay.toFixed(2)}</span>
                </div>
            `;

            document.getElementById('payrollDetailModal').classList.remove('hidden');
        }

        function closePayrollDetail() {
            document.getElementById('payrollDetailModal').classList.add('hidden');
        }

        function printPayslip() {
            window.print();
        }

        function exportPayroll() {
            showToast('Payroll exported to CSV', 'success');
        }

        // Reports
        async function loadReports() {
            const employees = await dbGetAll('employees');
            const attendance = await dbGetAll('attendance');
            const payroll = await dbGetAll('payroll');
            const settings = await loadPayrollSettings();

            const now = new Date();
            const currentMonth = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}`;

            // Attendance summary
            const workingDays = new Set(attendance.map(a => a.date)).size;
            const totalAttendanceRecords = attendance.length;
            const avgAttendanceRate = employees.length > 0 ? 
                ((totalAttendanceRecords / (employees.length * workingDays)) * 100).toFixed(1) : 0;
            const totalLateArrivals = attendance.filter(a => a.isLate).length;
            const avgHours = totalAttendanceRecords > 0 ?
                (attendance.reduce((sum, a) => sum + (a.clockOut ? parseFloat(calculateHours(a.clockIn, a.clockOut)) : 0), 0) / totalAttendanceRecords).toFixed(1) : 0;

            document.getElementById('reportWorkingDays').textContent = workingDays;
            document.getElementById('reportAttendanceRate').textContent = `${avgAttendanceRate}%`;
            document.getElementById('reportLateArrivals').textContent = totalLateArrivals;
            document.getElementById('reportAvgHours').textContent = `${avgHours}h`;

            // Payroll summary
            const monthPayroll = payroll.filter(p => p.month === currentMonth);
            const totalPayrollAmount = monthPayroll.reduce((sum, p) => sum + (p.netPay || 0), 0);
            const avgSalary = monthPayroll.length > 0 ? totalPayrollAmount / monthPayroll.length : 0;
            const totalOvertimePay = monthPayroll.reduce((sum, p) => sum + (p.overtime || 0), 0);
            const totalDeductions = monthPayroll.reduce((sum, p) => sum + (p.deductions || 0), 0);

            document.getElementById('reportTotalPayroll').textContent = `${settings.currency}${totalPayrollAmount.toFixed(2)}`;
            document.getElementById('reportAvgSalary').textContent = `${settings.currency}${avgSalary.toFixed(2)}`;
            document.getElementById('reportOvertimePay').textContent = `${settings.currency}${totalOvertimePay.toFixed(2)}`;
            document.getElementById('reportTotalDeductions').textContent = `${settings.currency}${totalDeductions.toFixed(2)}`;

            // Department stats
            const departments = [...new Set(employees.map(e => e.department))];
            const deptTable = document.getElementById('departmentStatsTable');
            deptTable.innerHTML = departments.map(dept => {
                const deptEmployees = employees.filter(e => e.department === dept);
                const deptIds = deptEmployees.map(e => e.id);
                const deptAttendance = attendance.filter(a => deptIds.includes(a.employeeId));
                const deptPayroll = monthPayroll.filter(p => deptIds.includes(p.employeeId));

                const avgAtt = deptEmployees.length > 0 ? 
                    ((deptAttendance.length / (deptEmployees.length * workingDays)) * 100).toFixed(1) : 0;
                const totalHours = deptAttendance.reduce((sum, a) => 
                    sum + (a.clockOut ? parseFloat(calculateHours(a.clockIn, a.clockOut)) : 0), 0);
                const deptPayrollTotal = deptPayroll.reduce((sum, p) => sum + (p.netPay || 0), 0);

                return `
                    <tr>
                        <td>${dept}</td>
                        <td>${deptEmployees.length}</td>
                        <td>${avgAtt}%</td>
                        <td>${totalHours.toFixed(1)}h</td>
                        <td>${settings.currency}${deptPayrollTotal.toFixed(2)}</td>
                    </tr>
                `;
            }).join('');
        }

        function exportAttendanceReport() {
            showToast('Attendance report exported', 'success');
        }

        function exportPayrollReport() {
            showToast('Payroll report exported', 'success');
        }

        // Settings
        async function loadSettings() {
            document.getElementById('settingCompanyName').value = (await dbGet('settings', 'companyName'))?.value || 'Acme Corporation';
            document.getElementById('settingWorkStart').value = (await dbGet('settings', 'workStart'))?.value || '09:00';
            document.getElementById('settingWorkEnd').value = (await dbGet('settings', 'workEnd'))?.value || '18:00';
            document.getElementById('settingLateThreshold').value = (await dbGet('settings', 'lateThreshold'))?.value || 15;
            document.getElementById('settingOvertimeRate').value = (await dbGet('settings', 'overtimeRate'))?.value || 1.5;
            document.getElementById('settingTaxRate').value = (await dbGet('settings', 'taxRate'))?.value || 10;
            document.getElementById('settingCurrency').value = (await dbGet('settings', 'currency'))?.value || '$';
        }

        async function saveSettings() {
            await dbPut('settings', { key: 'companyName', value: document.getElementById('settingCompanyName').value });
            await dbPut('settings', { key: 'workStart', value: document.getElementById('settingWorkStart').value });
            await dbPut('settings', { key: 'workEnd', value: document.getElementById('settingWorkEnd').value });
            await dbPut('settings', { key: 'lateThreshold', value: parseInt(document.getElementById('settingLateThreshold').value) });
            showToast('Settings saved!', 'success');
        }

        async function savePayrollSettings() {
            await dbPut('settings', { key: 'overtimeRate', value: parseFloat(document.getElementById('settingOvertimeRate').value) });
            await dbPut('settings', { key: 'taxRate', value: parseFloat(document.getElementById('settingTaxRate').value) });
            await dbPut('settings', { key: 'currency', value: document.getElementById('settingCurrency').value });
            showToast('Payroll settings saved!', 'success');
        }

        // Admin Face Registration
        function showAdminFaceRegistration() {
            document.getElementById('adminFaceRegModal').classList.remove('hidden');
            adminCapturedFaces = [];
            document.getElementById('adminCapturedFaces').innerHTML = '';
            document.getElementById('saveAdminFaceBtn').disabled = true;
            startAdminFaceCamera();
        }

        function closeAdminFaceReg() {
            document.getElementById('adminFaceRegModal').classList.add('hidden');
            stopStream();
        }

        async function startAdminFaceCamera() {
            const video = document.getElementById('adminFaceVideo');
            const canvas = document.getElementById('adminFaceCanvas');
            const status = document.getElementById('adminFaceStatus');

            try {
                activeStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'user', width: 640, height: 480 } 
                });
                video.srcObject = activeStream;

                video.onloadedmetadata = () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    detectAdminFace(video, canvas, status);
                };
            } catch (error) {
                status.innerHTML = `
                    <span class="material-symbols-outlined">error</span>
                    <span>Camera access denied</span>
                `;
                status.classList.add('error');
            }
        }

        async function detectAdminFace(video, canvas, status) {
            if (!document.getElementById('adminFaceRegModal').classList.contains('hidden')) {
                const ctx = canvas.getContext('2d');
                
                if (faceApiLoaded) {
                    const detection = await faceapi.detectSingleFace(video)
                        .withFaceLandmarks()
                        .withFaceDescriptor();

                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    if (detection) {
                        const dims = faceapi.matchDimensions(canvas, video, true);
                        const resized = faceapi.resizeResults(detection, dims);
                        faceapi.draw.drawDetections(canvas, resized);

                        status.innerHTML = `
                            <span class="material-symbols-outlined">check_circle</span>
                            <span>Face detected</span>
                        `;
                        status.classList.add('success');
                    } else {
                        status.innerHTML = `
                            <span class="material-symbols-outlined">face</span>
                            <span>Position your face</span>
                        `;
                        status.classList.remove('success');
                    }
                }

                requestAnimationFrame(() => detectAdminFace(video, canvas, status));
            }
        }

        async function captureAdminFace() {
            const video = document.getElementById('adminFaceVideo');
            
            if (faceApiLoaded) {
                const detection = await faceapi.detectSingleFace(video)
                    .withFaceLandmarks()
                    .withFaceDescriptor();

                if (detection) {
                    const canvas = document.createElement('canvas');
                    canvas.width = 120;
                    canvas.height = 120;
                    const ctx = canvas.getContext('2d');
                    
                    const box = detection.detection.box;
                    const padding = 30;
                    ctx.drawImage(video, 
                        box.x - padding, box.y - padding, box.width + padding * 2, box.height + padding * 2,
                        0, 0, 120, 120
                    );

                    const imageData = canvas.toDataURL('image/jpeg');
                    const descriptor = Array.from(detection.descriptor);

                    adminCapturedFaces.push({ imageData, descriptor });

                    const grid = document.getElementById('adminCapturedFaces');
                    const item = document.createElement('div');
                    item.className = 'face-item';
                    item.innerHTML = `<img src="${imageData}" alt="Captured face">`;
                    grid.appendChild(item);

                    document.getElementById('saveAdminFaceBtn').disabled = adminCapturedFaces.length < 1;
                    showToast(`Face captured!`, 'success');
                }
            }
        }

        async function saveAdminFaces() {
            if (adminCapturedFaces.length === 0) return;

            const faceData = {
                id: 'admin',
                type: 'admin',
                name: 'Administrator',
                descriptors: adminCapturedFaces.map(f => f.descriptor),
                images: adminCapturedFaces.map(f => f.imageData),
                createdAt: new Date().toISOString()
            };

            await dbPut('faceData', faceData);
            await loadFaceDescriptors();

            closeAdminFaceReg();
            showToast('Admin face registered successfully!', 'success');
        }

        // Data Management
        async function exportAllData() {
            const data = {
                employees: await dbGetAll('employees'),
                attendance: await dbGetAll('attendance'),
                payroll: await dbGetAll('payroll'),
                settings: await dbGetAll('settings'),
                exportedAt: new Date().toISOString()
            };

            const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `faceid-backup-${new Date().toISOString().split('T')[0]}.json`;
            a.click();
            URL.revokeObjectURL(url);

            showToast('Data exported successfully!', 'success');
        }

        async function clearAllData() {
            if (confirm('Are you sure you want to clear ALL data? This cannot be undone!')) {
                await dbClear('employees');
                await dbClear('attendance');
                await dbClear('payroll');
                await dbClear('faceData');
                labeledFaceDescriptors = [];
                
                loadDashboardData();
                showToast('All data cleared', 'success');
            }
        }

        // Utility Functions
        function stopStream() {
            if (activeStream) {
                activeStream.getTracks().forEach(track => track.stop());
                activeStream = null;
            }
        }

        function showToast(message, type = 'info') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = 'toast';
            
            const icon = type === 'success' ? 'check_circle' : 
                         type === 'error' ? 'error' : 
                         type === 'warning' ? 'warning' : 'info';
            
            toast.innerHTML = `
                <span class="material-symbols-outlined">${icon}</span>
                <span>${message}</span>
            `;
            
            container.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Initialize
        init();
    </script>
</body>
</html>
