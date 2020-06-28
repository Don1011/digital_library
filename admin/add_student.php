<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['matric_number']) && isset($_GET['password'])){
        if(!empty($_GET['name']) && !empty($_GET['email']) && !empty($_GET['matric_number']) && !empty($_GET['password'])){
            $name = $_GET['name'];
            $email = $_GET['email'];
            $matric_number = $_GET['matric_number'];
            $password = $_GET['password'];

            $sql_add_student = "INSERT INTO users(name, email, password, matric_number) VALUES('".$name."', '".$email."', '".$password."', '".$matric_number."')";
            $query_add_student = mysqli_query($conn, $sql_add_student);
            // echo "<script lang = 'javascript'>alert('Book Successfully Added');</script>";
            header("location: add_student.php");
        }else{
            echo "<script lang = 'javascript'>alert('Complete Filling the form before submitting');</script>";
            // header("location: add_book.php");
        }
    }
?>

    <div class="container">
        <div class="row" >
            <div class = "col-12 margin-20">
                <form id = "searchForm">
                    <div class="input-group mb-3">
                        <input id="allStudentsSearchQuery" type="text" class="form-control" placeholder = "Search a student" oninput = "searchAllStudents()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-times my-background" type="button" onclick = "clearStudentsSearchBar()"></button>
                            <button type="button" class="btn my-background btn-outline-light" data-toggle="modal" data-target="#exampleModalCenter">
                            Add Student
                            </button>
                            <div class="modal fade " id="exampleModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark">Add Student</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="add_student.php" method = "GET" style = "display: inline">
                                            <div class="modal-body text-dark">
                                                <input name = "name" type="text" class = "form-control" placeholder = "Enter the Student's Name">
                                                <br>
                                                <input name = "email" type="email" class = "form-control" placeholder = "Enter the Student's Email">
                                                <br>
                                                <input name = "matric_number" type="text" class = "form-control" placeholder = "Enter Student's Matric Number">
                                                <br>
                                                <input name = "password" type="password" class = "form-control" placeholder = "Enter the Student's Password">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row text-center" id = "allStudentsContainer">
            <h4 style = "width: 100%">Students List</h4>
            <?php 
                $sql_all_books = "SELECT * FROM users ORDER BY id DESC";
                $query_all_books = mysqli_query($conn, $sql_all_books);
                while($fetch_all_books = mysqli_fetch_assoc($query_all_books)):
            ?>
                <div class="col-12 margin-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch_all_books['name']?></h5>
                            <small class = "text-muted"><?php echo $fetch_all_books['email']?></small>
                        </div>
                        <div class="card-footer"><small><?php echo strtoupper($fetch_all_books['matric_number'])?></small>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            ?>
        </div>
    </div>

<?php
    include("./assets/inc/footer.php");
?>