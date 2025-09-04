<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condo100</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background: #2e7d32;
            color: #fff;
            padding: 1.5rem 1rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 12px rgba(0,0,0,0.1);
        }
        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
        }
        .sidebar .nav-link {
            color: #e0e0e0;
            border-radius: .5rem;
            margin-bottom: .5rem;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: #1b5e20;
            color: #fff;
        }
        .content {
            margin-left: 260px;
            padding: 2rem;
        }
        .user-info {
            margin-top: auto;
        }
        .dropdown-menu {
            border-radius: .5rem;
        }
    </style>
</head>
<body>

@extends('layouts.sidebar_app')