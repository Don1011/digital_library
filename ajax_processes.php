<?php
    include("./assets/inc/conn.php");
    if(isset($_GET['allBooksSearchQuery']))
    {
        if(!empty($_GET['allBooksSearchQuery']))
        {
            $query = $_GET['allBooksSearchQuery'];

            $sql_search = "SELECT * FROM books WHERE name LIKE '%".$query."%' OR author LIKE '%".$query."%' OR isbn LIKE '%".$query."%' ORDER BY id DESC";
            $query_search = mysqli_query($conn, $sql_search);
            if(mysqli_num_rows($query_search)){
                while($fetch_search = mysqli_fetch_assoc($query_search))
                {
                    ?>
                    <div class="col-12 margin-5 text-center">
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
            }else{
                ?>
                    <!-- Text to be displayed if the user tries searching something that doesnt exist in the database -->
                    <div class="col-md-12 text-center">
                        <p>
                            <small class = "text-danger">
                                The book you are trying to search is not available in the library at the moment. 
                                <span type="button" class="btn my-background btn-outline-light" data-toggle="modal" data-target="#exampleModalCenter">
                                    Click here
                                </span>
                                to request the book be added to the Library's stock.                        
                                <!-- Modal  -->
                                <div class="modal fade " id="exampleModalCenter">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark">Request Book</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <form action="home.php" method = "GET" style = "display: inline">
                                                <div class="modal-body text-dark">
                                                    <input name = "title" type="text" class = "form-control" placeholder = "Enter the title of the book">
                                                    <br>
                                                    <input name = "author" type="text" class = "form-control" placeholder = "Enter the name of the author">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Make Request</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </small>
                        </p>
                    </div>
                    
                <?php
            }
        }
    }
?>