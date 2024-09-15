<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
   
    <style>
       header {
    background-color: #007bff; /* Bootstrap primary color */
    color: white;
    padding: 20px 0;
    text-align: center;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

header h1 {
    margin: 0;
    font-size: 2rem;
}

header p {
    font-size: 1.2rem;
}
aside {
    background-color: #f8f9fa; /* Light background */
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    height: 100vh; /* Full height */
    position: sticky;
    top: 0; /* Stick to the top */
}

aside a {
    text-decoration: none;
    color: #343a40; /* Darker text */
    font-weight: bold;
    padding: 10px 0;
    display: block;
}

aside a:hover {
    background-color: #007bff;
    color: white;
    padding-left: 10px;
    border-radius: 5px;
    transition: 0.3s ease;
}

    </style>
    <!-- Bootstra   p JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
