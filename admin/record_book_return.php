<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>

    <div class="container" id = "recordReturnContainer">
        <div class="row justify-content-md-center text-center">
            <div class="row">
                <form action="index.php" method = "POST" class = "login-form bg-light">
                    <div>
                        <h1>Record Book Return</h1>
                    </div>
                    <div class="input-group mb-3">
                        <input id="matnoSearchQuery" type="text" class="form-control" placeholder = "Enter the Student's Matric Number" oninput = "recordBookReturnSearchStudent()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-times my-background" type="button" onclick = "clearMatNoSearchBar()"></button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="row margin-20 text-center" id = "recordBookReturnSearchResult">
        </div>
    </div>


    <!-- Container of the confirmation that the Borrow out has been recorded -->
    <div class="container display_none" id = "returnConfirmation">
        <div class="row text-center padding_top">
            <div class="col-12"><h1 class = "text-success"><span class="fa fa-check"></span></h1></div>
            <div class="col-12"><p class = "text-success">Book Return Successfully Recorded</p></div>
            <div class="col-12"><p class = "text-success"><a href="record_borrow_out.php" class = "btn btn-dark">Back To Home</a></p></div>
        </div>
    </div>

<?php
    include("./assets/inc/footer.php");
?>