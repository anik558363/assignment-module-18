<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 12px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
        }

        .row {
            display: flex;
            gap: 12px
        }

        .col {
            flex: 1
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px
        }

        .btn {
            display: inline-block;
            padding: 6px 10px;
            border: 1px solid #333;
            text-decoration: none
        }

        .btn-danger {
            border-color: #c00;
            color: #c00
        }

        .msg {
            padding: 10px;
            background: #e9ffe9;
            border: 1px solid #8f8;
            margin-bottom: 10px
        }

        img {
            max-width: 140px
        }

           /* ===== Table Standard UI ===== */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
        background: #fff;
    }

    thead {
        background: #f3f4f6;
    }

    th {
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        color: #111827;
    }

    th, td {
        padding: 12px;
        border: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    /* ===== Buttons ===== */
    .btn {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        border: 1px solid #2563eb;
        color: #2563eb;
        background: transparent;
        cursor: pointer;
        text-decoration: none;
    }

    .btn:hover {
        background: #2563eb;
        color: #fff;
    }

    .btn-danger {
        border-color: #dc2626;
        color: #dc2626;
        background: transparent;
    }

    .btn-danger:hover {
        background: #dc2626;
        color: #fff;
    }

    /* ===== Image ===== */
    table img {
        width: 90px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    /* ===== Pagination ===== */
    .pagination {
        display: flex;
        list-style: none;
        gap: 6px;
        justify-content: center;
        margin-top: 20px;
        padding: 0;
    }

    .pagination li a,
    .pagination li span {
        padding: 6px 10px;
        border: 1px solid #d1d5db;
        color: #111827;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .pagination li.active span {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
    }

    .pagination li a:hover {
        background: #2563eb;
        color: #fff;
    }

    
    </style>
</head>

<body>
    @if (session('success'))
        <div class="msg">{{ session('success') }}</div>
    @endif
    @yield('content')
</body>

</html>
