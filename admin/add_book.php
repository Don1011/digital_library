<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    if(isset($_GET['title']) && isset($_GET['author']) && isset($_GET['isbn'])){
        if(!empty($_GET['title']) && !empty($_GET['author']) && !empty($_GET['isbn'])){
            $title = $_GET['title'];
            $author = $_GET['author'];
            $isbn = $_GET['isbn'];

            $sql_add_book = "INSERT INTO books(name, author, status, isbn) VALUES('".$title."', '".$author."', 'available', '".$isbn."')";
            $query_add_book = mysqli_query($conn, $sql_add_book);
            // echo "<script lang = 'javascript'>alert('Book Successfully Added');</script>";
            header("location: add_book.php");
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
                        <input id="allBooksSearchQuery" type="text" class="form-control" placeholder = "Search a book or author" oninput = "searchAllBooks()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-times my-background" type="button" onclick = "clearBooksSearchBar()"></button>
                            <button type="button" class="btn my-background btn-outline-light" data-toggle="modal" data-target="#exampleModalCenter">
                            Add Book
                            </button>
                            <div class="modal fade " id="exampleModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark">Add Book</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="add_book.php" method = "GET" style = "display: inline">
                                            <div class="modal-body text-dark">
                                                <input name = "title" type="text" class = "form-control" placeholder = "Enter the Book Title">
                                                <br>
                                                <input name = "author" type="text" class = "form-control" placeholder = "Enter the Author's Name">
                                                <br>
                                                <input name = "isbn" type="text" class = "form-control" placeholder = "Enter the Book's ISBN Number">
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
        <div class="row text-center" id = "allBooksContainer">
            <h4 style = "width: 100%">Books List</h4>
            <?php 
                $sql_all_books = "SELECT * FROM books ORDER BY id DESC";
                $query_all_books = mysqli_query($conn, $sql_all_books);
                while($fetch_all_books = mysqli_fetch_assoc($query_all_books)):
            ?>
            <div class="col-12 margin-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fetch_all_books['name']?></h5>
                        <small class = "text-muted"><?php echo strtoupper($fetch_all_books['author'])?></small>
                    </div>
                    <div class="card-footer"><small><?php echo strtoupper($fetch_all_books['status'])?></small>
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