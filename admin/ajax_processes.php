<?php
    include("assets/inc/conn.php");
    if(isset($_GET['recordBorrowOutSearchBook']))
    // Code to search for book when doing the "record borrow out"
    {
        if(!empty($_GET['recordBorrowOutSearchBook']))
        {
            $query = $_GET['recordBorrowOutSearchBook'];
            $sql_search = "SELECT * FROM books WHERE isbn LIKE '%".$query."%'";
            $query_search = mysqli_query($conn, $sql_search);
            while($fetch_search = mysqli_fetch_assoc($query_search))
            {
            ?>
            <button class="col-12 margin-5 invisible_button" onclick = "bookSelected(<?php echo $fetch_search['id']?>)">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fetch_search['name']?></h5>
                        <small class = "text-muted"><?php echo $fetch_search['author']?></small>
                    </div>
                    <div class="card-footer"><small><?php echo strtoupper($fetch_search['name'])?></small>
                    </div>
                </div>
            </button>
            <?php
            }
        }
    }else if(isset($_GET['recordBorrowOutSearchStudent']))
    {
    // Code to search for students when doing the "record borrow out"

        if(!empty($_GET['recordBorrowOutSearchStudent']))
        {
            $query = $_GET['recordBorrowOutSearchStudent'];
            $sql_search = "SELECT * FROM users WHERE matric_number LIKE '%".$query."%'";
            $query_search = mysqli_query($conn, $sql_search);
            while($fetch_search = mysqli_fetch_assoc($query_search))
            {
            ?>
            <button class="col-12 margin-5 invisible_button" onclick = "studentSelected(<?php echo $fetch_search['id']?>)">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fetch_search['name']?></h5>
                        <small class = "text-muted"><?php echo $fetch_search['email']?></small>
                    </div>
                    <div class="card-footer"><small><?php echo strtoupper($fetch_search['matric_number'])?></small>
                    </div>
                </div>
            </button>
            <?php
            }
        }
    }else if(isset($_GET["book_id"]) && isset($_GET["student_id"]))
    {
    // Code to insert borrow out data into the database, which includes the bookid, student id, and date

        if(!empty($_GET["book_id"]) && !empty($_GET["student_id"]))
        {
            $book_id = $_GET["book_id"];
            $student_id = $_GET["student_id"];
            $date = date("d-m-Y");

            $sql_update_book_status = "UPDATE books SET status = 'unavailable' WHERE id = '".$book_id."'";
            $query_update_book_status = mysqli_query($conn, $sql_update_book_status);

            $sql_matric_number = "SELECT * FROM users WHERE id = '".$student_id."'";
            $query_matric_number = mysqli_query($conn, $sql_matric_number);
            $fetch_matric_number = mysqli_fetch_assoc($query_matric_number);
            $matric_number = $fetch_matric_number["matric_number"];

            $sql_insert = "INSERT INTO borrow_outs(book_id, user_id, matric_number, date) VALUES('".$book_id."', '".$student_id."', '".$matric_number."', '".$date."')";
            $query_insert = mysqli_query($conn, $sql_insert);
        }
    }else if(isset($_GET['recordReturnSearchStudent']))
    {
    // Code to search for students when doing the "record record return"

        if(!empty($_GET['recordReturnSearchStudent']))
        {
            $query = $_GET['recordReturnSearchStudent'];
            
            $sql_search_student = "SELECT * FROM borrow_outs WHERE matric_number LIKE '%".$query."%'";
            $query_search_student = mysqli_query($conn, $sql_search_student);
            
            while($fetch_search_student = mysqli_fetch_assoc($query_search_student))
            {

                $sql_student_data = "SELECT * FROM users WHERE id = '".$fetch_search_student["user_id"]."'";
                $query_student_data = mysqli_query($conn, $sql_student_data);
                $fetch_student_data = mysqli_fetch_assoc($query_student_data);

                $sql_book_data = "SELECT * FROM books WHERE id = '".$fetch_search_student["book_id"]."'";
                $query_book_data = mysqli_query($conn, $sql_book_data);
                $fetch_book_data = mysqli_fetch_assoc($query_book_data);
            ?>
            
            <div class="col-12 invisible_button margin-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fetch_student_data["name"]?></h5>
                        <small class = "text-muted"><?php echo $fetch_student_data["matric_number"]?></small>
                        <p class="card-text"><?php echo $fetch_book_data["name"]?> By <?php echo $fetch_book_data["author"]?></p>
                        <button onclick = "removeFromBorrowedOutTable(<?php echo $fetch_search_student['id']?>)" class="btn btn-info">Returned</button>
                    </div>
                    <div class="card-footer">
                        <small>Date Due: Fourteen days from <?php echo $fetch_search_student["date"]?></small>
                    </div>
                </div>
            </div>
            <?php
            }
        }
    }else if(isset($_GET['return_id']))
    {
    // Code to "record return" of a borrowed book by deleting a specified row from the 'borrow_outs' table

        if(!empty($_GET['return_id']))
        {
            $id = $_GET['return_id'];

            $sql_borrow_out = "SELECT * FROM borrow_outs WHERE id = '".$id."'";
            $query_borrow_out = mysqli_query($conn, $sql_borrow_out);
            $fetch_borrow_out = mysqli_fetch_assoc($query_borrow_out);
            
            $sql_book_data = "UPDATE books SET status = 'available' WHERE id = '".$fetch_borrow_out["book_id"]."'";
            $query_book_data = mysqli_query($conn, $sql_book_data);

            $sql_delete = "DELETE FROM borrow_outs WHERE id = '".$id."'";
            $query_delete = mysqli_query($conn, $sql_delete);
        }
    }else if(isset($_GET['allBooksSearchQuery']))
    {
        if(!empty($_GET['allBooksSearchQuery']))
        {
            $query = $_GET['allBooksSearchQuery'];

            $sql_search = "SELECT * FROM books WHERE name LIKE '%".$query."%' OR author LIKE '%".$query."%' OR isbn LIKE '%".$query."%' ORDER BY id DESC";
            $query_search = mysqli_query($conn, $sql_search);
            while($fetch_search = mysqli_fetch_assoc($query_search))
            {
                ?>
                <div class="col-12 margin-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch_search['name']?></h5>
                            <small class = "text-muted"><?php echo strtoupper($fetch_search['author'])?></small>
                        </div>
                        <div class="card-footer"><small><?php echo strtoupper($fetch_search['status'])?></small>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }else if(isset($_GET['allStudentsSearchQuery']))
    {
        if(!empty($_GET['allStudentsSearchQuery']))
        {
            $query = $_GET['allStudentsSearchQuery'];

            $sql_search = "SELECT * FROM users WHERE name LIKE '%".$query."%' OR email LIKE '%".$query."%' OR matric_number LIKE '%".$query."%' ORDER BY id DESC";
            $query_search = mysqli_query($conn, $sql_search);
            while($fetch_search = mysqli_fetch_assoc($query_search))
            {
                ?>
                <div class="col-12 margin-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch_search['name']?></h5>
                            <small class = "text-muted"><?php echo $fetch_search['email']?></small>
                        </div>
                        <div class="card-footer"><small><?php echo $fetch_search['matric_number']?></small>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
?>