<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condo100</title>

    {{-- Primeiro: Links CSS (Bootstrap, ícones, fontes, e seu estilo personalizado) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* AQUI ESTÁ TODO O SEU CSS PERSONALIZADO */
        :root {
            --dark-bg: #1e293b;
            --dark-card: #2d3748;
            --primary-color: #22c55e;
            --primary-light: #4ade80;
            --text-color-light: #e2e8f0;
            --text-color-muted: #94a3b8;
            --shadow-strong: rgba(0, 0, 0, 0.3);
            --shadow-light: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            min-height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            background-color: var(--dark-card);
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 2px 0 15px var(--shadow-strong);
            position: fixed;
            top: 0;
            bottom: 0;
        }

        .sidebar-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2.5rem;
            letter-spacing: -0.5px;
        }
        .sidebar-logo.clickable {
            cursor: pointer;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: var(--text-color-muted);
            border-radius: 0.75rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }
        .sidebar-nav .nav-link i {
            font-size: 1.35rem;
            margin-right: 1.2rem;
            transition: all 0.3s ease;
        }
        .sidebar-nav .nav-link:hover, .sidebar-nav .nav-link.active {
            background-color: rgba(34, 197, 94, 0.15);
            color: var(--primary-light);
            transform: translateX(5px);
            font-weight: 500;
        }
        .sidebar-nav .nav-link.active {
            border-left: 4px solid var(--primary-color);
            background-color: rgba(34, 197, 94, 0.25);
        }
        .sidebar-nav .nav-link:hover i, .sidebar-nav .nav-link.active i {
            color: var(--primary-color);
        }
        
        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
        }
        .user-dropdown-toggle {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 0.75rem;
            transition: background-color 0.2s ease;
            color: var(--text-color-light) !important;
        }
        .user-dropdown-toggle:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .user-dropdown-toggle img, .user-dropdown-toggle .user-avatar-placeholder {
            border: 2px solid var(--primary-color);
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
        }
        .dropdown-menu-dark {
            background-color: var(--dark-card);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .dropdown-item {
            color: var(--text-color-light);
        }
        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .dropdown-item i {
            color: var(--text-color-muted);
        }

        /* Main Content Styling */
        .content {
            flex-grow: 1;
            padding: 2rem;
            background-color: var(--dark-bg);
            border-radius: 1rem;
            overflow-y: auto;
            margin-left: 280px;
            transition: margin-left 0.3s ease-in-out;
        }

        /* Estilos do sidebar recolhido */
        .sidebar.collapsed {
            width: 80px;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        .sidebar.collapsed .sidebar-nav .nav-link {
            justify-content: center;
            padding: 0.75rem 0;
            border-left: none !important;
        }
        .sidebar.collapsed .sidebar-nav .nav-link i {
            margin-right: 0;
        }
        .sidebar.collapsed .sidebar-logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .sidebar.collapsed .sidebar-footer .user-dropdown-toggle {
            justify-content: center;
        }
        .sidebar.collapsed .sidebar-footer .user-dropdown-toggle strong {
            display: none;
        }
        .sidebar.collapsed .user-dropdown-toggle img,
        .sidebar.collapsed .user-dropdown-toggle .user-avatar-placeholder {
            margin-right: 0 !important;
        }
        .sidebar.collapsed + .content {
            margin-left: 80px;
        }
        
        /* Mobile Layout */
        @media (max-width: 767.98px) {
            .sidebar {
                display: none;
            }
            .content {
                margin-left: 0 !important;
                width: 100%;
            }
            .mobile-navbar {
                display: block;
                background-color: var(--dark-card);
                padding: 1rem;
                box-shadow: 0 2px 10px var(--shadow-strong);
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000;
            }
            .offcanvas-body {
                background-color: var(--dark-card);
            }
        }

        @media (min-width: 768px) {
            .mobile-navbar {
                display: none;
            }
        }
    </style>
</head>
<body>

    {{-- Botão para abrir o menu mobile. Ele só aparece em telas pequenas. --}}
    <nav class="mobile-navbar d-md-none">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <i class="bi bi-list fs-4"></i>
        </button>
    </nav>

@extends('layouts.sidebar_app')





    {{-- Seu Script Customizado, depois do Bootstrap --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logo = document.querySelector('.sidebar-logo.clickable');
            const sidebar = document.querySelector('.sidebar');

            if (logo && sidebar) {
                logo.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                });
            }
        });
    </script>
