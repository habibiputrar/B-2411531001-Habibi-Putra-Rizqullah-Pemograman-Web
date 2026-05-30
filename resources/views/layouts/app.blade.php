<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: #4CAF50;
            padding: 12px 20px;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 180px;
            background: #f0f0f0;
            border-right: 1px solid #ddd;
            padding: 10px 0;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #d0e8ff;
            color: #007bff;
        }

        .content {
            flex: 1;
            padding: 24px;
            background: #fce8e8;
        }

        .content h2 {
            margin-bottom: 16px;
            font-size: 18px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
            font-size: 14px;
        }

        table th {
            background: #f5f5f5;
        }

        .btn {
            padding: 6px 12px;
            font-size: 13px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-warning {
            background: #ffc107;
            color: #333;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .mt-3 {
            margin-top: 12px;
        }
    </style>
</head>

<body>
    <div class="navbar">My App</div>
    <div class="wrapper">
        <div class="sidebar">
            <a href="/products" class="{{ request()->is('products*') ? 'active' : '' }}">Product</a>
            <a href="/costumers" class="{{ request()->is('costumers*') ? 'active' : '' }}">Costumer</a>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>