<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    
?>

    <div class="container">
        
        <div class="row text-center" id = "allStudentsContainer">
            <h4 style = "width: 100%" class = "margin-20">Book Requests From Students</h4>
            <?php 
                $sql_all_book_requests = "SELECT * FROM book_requests ORDER BY id DESC";
                $query_all_book_requests = mysqli_query($conn, $sql_all_book_requests);
                while($fetch_all_book_requests = mysqli_fetch_assoc($query_all_book_requests)):
            ?>
                <div class="col-12 margin-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fetch_all_book_requests['title']?></h5>
                            <small class = "text-muted"><?php echo strtoupper($fetch_all_book_requests['author'])?></small>
                        </div>
                        <div class="card-footer"><small><?php echo strtoupper($fetch_all_book_requests['date'])?></small>
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