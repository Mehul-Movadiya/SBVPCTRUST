<?php
include_once('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SBVPCT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="stylesheet.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .navbar-nav .nav-item {
            position: relative;
        }
        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-item:hover > .nav-link {
            color: #0d6efd !important;
        }
        .navbar-nav .dropdown-menu {
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            display: none;
        }
        .navbar-nav .dropdown:hover > .dropdown-menu {
            display: block;
        }
        .navbar-nav .dropdown-item {
            padding: 0.5rem 1.5rem;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }
        .navbar-nav .dropdown-item:hover,
        .navbar-nav .dropdown-item:focus {
            background-color: #f8f9fa;
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="img/logo.png" alt="Logo" height="80">
                <span class="text-primary d-inline-block align-middle ml-2">
                    <div style="font-family: 'rasabold';">
                        સર્વ બાવનગોળ વાટલિયા<br>પ્રજાપતિ ચેરીટેબલ ટ્રસ્ટ
                        <h6 class="small">Trust Reg. No.:A/5300/AHMEDABAD</h6>
                    </div>
                </span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/index.php') ? 'active' : ''; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/about.php') ? 'active' : ''; ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="committee.php" class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/committee.php') ? 'active' : ''; ?>">Committee</a>
                    </li>
                    <li class="nav-item">
                        <a href="events.php" class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'event') !== false) ? 'active' : ''; ?>">Functions</a>
                    </li>
                    <?php if(isset($_COOKIE['member_id'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo (strpos($_SERVER['PHP_SELF'], 'my') !== false || strpos($_SERVER['PHP_SELF'], 'relative') !== false) ? 'active' : ''; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                My Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="myprofile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="myrelatives.php">Relatives</a></li>
                                <li><a class="dropdown-item" href="addrelative.php">Add Relative</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="Login.php" class="nav-link">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <a href="memberlist.php" class="btn btn-primary ms-3">Members</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Additional JavaScript to ensure dropdown functionality -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })
    });
    </script>
</body>
</html>