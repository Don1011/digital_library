<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    $user_id = $_SESSION['user_id'];
?>
    <?php
        if(isset($_GET["title"]) && isset($_GET["author"]))
        {
            if(!empty($_GET["title"]))
            {
                $title = $_GET["title"];
                $author = $_GET["author"];
                $date = date("d-m-Y");

                if($author == ""){
                    $author = "UNKNOWN";
                }
                
                $sql_request = "INSERT INTO book_requests(title, author, date) VALUES('".$title."', '".$author."', '".$date."')";
                $query_request = mysqli_query($conn, $sql_request);
                header("location: home.php");
            }else
            {
                echo "<script lang = 'javascript'>alert('Providing a title is necessary, but providing an author is not necessary')</script>";
            }
        }
    ?>
    <div class="container">
        <div class="row" >
            <div class = "col-12 margin-20">
                <form id = "searchForm">
                    <div class="input-group mb-3">
                        <input id="searchQuery" type="text" class="form-control" placeholder = "Search any book by title or author's name" oninput = "searchBooks()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-times my-background" type="button" onclick = "clearSearchBar()"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- For normal display on page load -->
        <div class="row" id = "display">
            
            <!-- The main display of the page -->
            <div class = "container" id = "booksBorrowed">
                <div class = "row">
                    <div class="text-center"  style = "width: 100%">
                        <h4 style = "width: 100%">Books You Borrowed</h4>
                    </div>
                    <?php
                        $sql_borrow_details = "SELECT * FROM borrow_outs WHERE user_id = '".$user_id."'";
                        $query_borrow_details = mysqli_query($conn, $sql_borrow_details);
                        if(mysqli_num_rows($query_borrow_details)):
                            while($fetch_borrow_details = mysqli_fetch_assoc($query_borrow_details)):
                                $sql_book_details = "SELECT * FROM books WHERE id = '".$fetch_borrow_details['book_id']."'";
                                $query_book_details = mysqli_query($conn, $sql_book_details);
                                $fetch_book_details = mysqli_fetch_assoc($query_book_details);
                    ?>
                    <div class='col-md-6 margin-20'>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Book Title: <?php echo $fetch_book_details['name']?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Author Name: <?php echo $fetch_book_details['author']?></h6>
                                <hr>
                                <p class="card-text text-muted">
                                    <small>Date Borrowed:  <?php echo $fetch_borrow_details['date']?></small> 
                                </p>
                                <p class="card-text text-muted">
                                    <small>Date Due: Fourteen Days From <?php echo $fetch_borrow_details['date']?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                            endwhile;
                        else:
                    ?>
                        <!-- Text to display if there isnt any book that has been borrowed by the current user -->
                        <div class="col-md-12 text-center">
                            <p>
                                <small>You seem to not have borrowed any book from the library at the moment. Search for  a book in the input field above to confirm the availability of any book you might want to borrow. If the book isn't available, feel free to click on the link above to request that a book be added to the Library's stock.</small>
                            </p>
                        </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
        
    </div>

<?php
    include("./assets/inc/footer.php");
?>