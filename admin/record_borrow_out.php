<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>
    
    <!-- Contianer For Selecting the Book -->
    <div class="container" id = "selectBookContainer">
        <div class="row" >
            <div class = "col-12 text-center margin-20">
                <h3>Record Borrow Out</h3>
            </div>
            <div class = "col-12 margin-20">
                <form id = "searchForm">
                    <h5 class = "text-center">Enter the book's ISBN number</h5>
                    <div class="input-group mb-3">
                        <input id="bookSearchQuery" type="text" class="form-control" placeholder = "Enter the ISBN of the book to be borrowed" oninput = "recordBorrowOutSearchBook()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-times my-background" type="button" onclick = "clearSearchBar()"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row text-center" id = "recordBorrowOutShowBooksSearchResult"></div>
    </div>

    <!-- Container For Selecting the student -->
    <div class="container display_none" id = "selectStudentContainer">
        <div class="row" >
            <div class = "col-12 text-center">
                <h3>Record Borrow Out</h3>
            </div>
            <div class = "col-12 margin-20">
                <form id = "searchForm">
                    <h5 class = "text-center">Enter the student's matriculation number</h5>
                    <div class="input-group mb-3">
                        <input id="studentSearchQuery" type="text" class="form-control" placeholder = "Enter the student's matric number" oninput = "recordBorrowOutSearchStudent()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-times my-background" type="button" onclick = "clearSearchBar()"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row text-center" id = "recordBorrowOutShowStudentsSearchResult"></div>
    </div>

    <!-- Form that holds all the data for the recording of the borrowed book -->
    <form class = "display_none" id = "recordBorrowOutForm">
        <input type="hidden" id = "bookId">
        <input type="hidden" id = "studentId">
    </form>

    <!-- Container of the confirmation that the Borrow out has been recorded -->
    <div class="container display_none" id = "confirmation">
        <div class="row text-center padding_top">
            <div class="col-12"><h1 class = "text-success"><span class="fa fa-check"></span></h1></div>
            <div class="col-12"><p class = "text-success">Borrow Out Successfully Recorded</p></div>
        </div>
    </div>
<?php
    include("./assets/inc/footer.php");
?>