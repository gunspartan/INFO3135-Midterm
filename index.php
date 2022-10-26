<?php

    // date
    // $today = new Date();
    
    
    $lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
    session_set_cookie_params($lifetime, '/');
    session_start();
    // File in
    // https://www.php.net/manual/en/function.fgetcsv.php
    $movies = [];
    if (($handle = fopen("moviesForRent.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $movie = ['movieId' => $data[0], 'movieName' => $data[1], 'movieGenre' => $data[2]];
            $movies[] = $movie;
        }
        fclose($handle);
    }
    $message = '';
    
    // accounts
    if (empty($_SESSION['accounts'])) {
        $_SESSION['accounts'] = [];
    }
    if (empty($_SESSION['loggedIn'])) {
        $_SESSION['loggedIn'] = false;
    }
    if (empty($_SESSION['movies_to_rent'])) {
        $_SESSION['movies_to_rent'] = [];
    }
    
    // reset session
    // $_SESSION['accounts'] = [];
    // $_SESSION['loggedIn'] = false;
    // $_SESSION['movies_to_rent'] = [];
    
    // labels
    $fname_label = 'First Name:';
    $lname_label = 'Last Name:';
    $username_label = 'Username:';
    $password_label = 'Password:';
    $confirm_password_label = 'Confirm Password:';
    
    // handle action
    $action = $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'welcome_view';
        }
    }
    
    switch($action) {
        case 'rent':
            $_SESSION['movies_to_rent'] = $_POST['movies_to_rent'];
            if (empty($_SESSION['movies_to_rent'])) {
                $message = 'Please choose at least 1 movie.';
                include('rental_view.php');
            } else {
                include('checkout_view.php');
            }
            break;
            
        case 'register':
            $fname = filter_input(INPUT_POST, 'fname');
            $lname = filter_input(INPUT_POST, 'lname');
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            $confirm_password = filter_input(INPUT_POST, 'confirm_password');
            if (empty($fname)) {
                $fname_label .= " Cannot be empty";
            }
            if (empty($lname)) {
                $lname_label .= " Cannot be empty";
            }
            if (empty($username)) {
                $username_label .= " Cannot be empty";
            }
            if (empty($password)) {
                $password_label .= " Cannot be empty";
            }
            if (empty($confirm_password)) {
                $confirm_password_label .= " Cannot be empty";
            // Check if password is same
            } else if ($password != $confirm_password) {
                $confirm_password_label .= " Passwords must match.";
            } else {
                // Check if username exists
                $username_taken = false;
                foreach($_SESSION['accounts'] as $account) {
                    if ($account[2] == $username) {
                        $username_taken = true;
                        $username_label .= ' Username taken';
                        break;
                    }
                }
                
                if (!$username_taken) {
                    
                $new_account = [$fname, $lname, $username, $password];
                $_SESSION['accounts'][] = $new_account;
                $message = "Account created";
                }
                
            }
            include('register_view.php');
            
            break;
            
        case 'login':
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            foreach($_SESSION['accounts'] as $account) {
                if ($account[2] == $username && $account[3] == $password) {
                    $message = "Logged in successfully";
                    $_SESSION['loggedIn'] = true;
                }
            }
            if (!$_SESSION['loggedIn']) {
                $message = 'Wrong log in information';
            }
            include('login_view.php');
            break;
        case 'login_view':
            include('login_view.php');
            break;
        case 'register_view':
            include('register_view.php');
            break;
        case 'rental_view':
            if ($_SESSION['loggedIn']) {
                include('rental_view.php');
            } else {
                header('Location: .?action=login_view');
            }
            break;
        default:
            include('welcome_view.php');
            break;
    }
?>