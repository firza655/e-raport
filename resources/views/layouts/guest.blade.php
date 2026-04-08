<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>e-Raport - Login</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>

  <!-- Style -->
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #a78bfa, #38bdf8);
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .login-page {
      width: 100%;
      max-width: 500px;
      padding: 2rem;
    }

    .login-card {
      background: linear-gradient(to bottom right, #f0f9ff, #e0e7ff);
      border: none;
      border-radius: 25px;
      padding: 2rem;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15), 0 0 15px rgba(99, 102, 241, 0.2);
      animation: fadeInUp 0.6s ease-in-out;
    }

    .circle-icon {
      background: linear-gradient(135deg, #0ea5e9, #6366f1);
      padding: 14px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .btn-gradient {
      background: linear-gradient(to right, #3b82f6, #9333ea);
      color: white;
      border: none;
    }

    .btn-gradient:hover {
      background: linear-gradient(to right, #2563eb, #7e22ce);
    }

    .text-gradient {
      background: linear-gradient(90deg, #0ea5e9, #9333ea);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .stylish-input {
      border-radius: 12px;
      transition: 0.3s;
    }

    .stylish-input:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  @yield('content')
</body>
</html>
