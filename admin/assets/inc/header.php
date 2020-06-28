<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <nav class = "navbar navbar-expand-md navbar-dark my-background fixed_header">
        <a href="record_borrow_out.php" class = "navbar-brand">Digital Library</a>
        <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarCollapse">
            <div class = "navbar-nav">
                <a href="record_borrow_out.php" class = "nav-item nav-link">Record Borrow Out</a> &nbsp;&nbsp;&nbsp;
                <a href="record_book_return.php" class = "nav-item nav-link">Record Book Return</a> &nbsp;&nbsp;&nbsp;
                <a href="add_book.php" class = "nav-item nav-link">Books</a> &nbsp;&nbsp;&nbsp;
                <a href="add_student.php" class = "nav-item nav-link">Students</a> &nbsp;&nbsp;&nbsp;
                <a href="book_requests.php" class = "nav-item nav-link">View Book Requests</a> &nbsp;&nbsp;&nbsp;
                <a href="logout.php" class = "nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>
    <div class = "main_body">