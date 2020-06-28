//The login validation code for the login page
function loginValidation()
{
    //To get the login form
    var login = document.getElementById("login");
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if(email != "" && password != "")
    {
        login.submit();
    }else
    {
        alert("Please Complete the form before submitting");
    }
}

//The code that clears all the search bars once the 'x' button is clicked
function clearSearchBar()
{
    document.getElementById("bookSearchQuery").value = "";
    document.getElementById("studentSearchQuery").value = "";
}
function clearMatNoSearchBar()
{
    document.getElementById("matnoSearchQuery").value = "";
}
function clearBooksSearchBar()
{
    document.getElementById("allBooksSearchQuery").value = "";
}
function clearStudentsSearchBar()
{
    document.getElementById("allStudentsSearchQuery").value = "";
}

//Ajax code to search the database for books with the inputted isbn number
function recordBorrowOutSearchBook(){
    //Get the value of the input field
    var input = document.getElementById("bookSearchQuery").value;

    //Create the xhr Object
    var searchIsbn = new XMLHttpRequest();
    searchIsbn.open("GET", `ajax_processes.php?recordBorrowOutSearchBook=${input}`, true);
    searchIsbn.onload = function()
    {
        //Code To Display The Output on the webpage
        var display = document.getElementById("recordBorrowOutShowBooksSearchResult");
        display.innerHTML = this.responseText;
    }
    searchIsbn.send();
}

//Ajax code to search the database for students with the inputted matriculation number
function recordBorrowOutSearchStudent(){
    //Get the value of the input field
    var input = document.getElementById("studentSearchQuery").value;

    //Create the xhr Object
    var searchIsbn = new XMLHttpRequest();
    searchIsbn.open("GET", `ajax_processes.php?recordBorrowOutSearchStudent=${input}`, true);
    searchIsbn.onload = function()
    {
        //Code To Display The Output on the webpage
        var display = document.getElementById("recordBorrowOutShowStudentsSearchResult");
        display.innerHTML = this.responseText;
    }
    searchIsbn.send();
}

//When a book has been Selected
function bookSelected(id){
    //To get the container housing the books and students search and select elements and the make the student search and select elements invisible
    var selectBookContainer = document.getElementById("selectBookContainer");
    var selectStudentContainer = document.getElementById("selectStudentContainer");

    selectBookContainer.className = "container display_none";
    selectStudentContainer.className = "container";

    document.getElementById("bookId").value = id;
}

// When a student has been selected
function studentSelected(id) 
{
    //Submit the data to the database 
    var bookId = document.getElementById("bookId").value;
    var studentId = id;
    var submitData = new XMLHttpRequest();
    submitData.open("GET", `ajax_processes.php?book_id=${bookId}&student_id=${studentId}`, true);
    submitData.onload = function()
    {
        //Make the container disappear
        var selectStudentContainer = document.getElementById("selectStudentContainer");
        selectStudentContainer.className = "container display_none";

        //Make the confirmation appear
        document.getElementById("confirmation").className = "container";
    }
    submitData.send();
}

//Function that fires up 'oninput' in the 'search student' input field in the record book return page
function recordBookReturnSearchStudent(){
    var input = document.getElementById("matnoSearchQuery").value;

    //Create the xhr Object
    var searchMatno = new XMLHttpRequest();
    searchMatno.open("GET", `ajax_processes.php?recordReturnSearchStudent=${input}`, true);
    searchMatno.onload = function()
    {
        //Code To Display The Output on the webpage
        var display = document.getElementById("recordBookReturnSearchResult");
        display.innerHTML = this.responseText;
    }
    searchMatno.send();
}

// Function to delete a row from the 'borrow_outs' table
function removeFromBorrowedOutTable(id)
{
    var recordReturn = new XMLHttpRequest();
    recordReturn.open("GET", `ajax_processes.php?return_id=${id}`, true);
    recordReturn.onload = function()
    {
        document.getElementById("recordReturnContainer").className = "container display_none";
        document.getElementById("returnConfirmation").className = "container";
    }
    recordReturn.send();
}

//Function that fires up once a user inputs into the input field for searching the books on the books page
function searchAllBooks(){
    var query = document.getElementById("allBooksSearchQuery").value;

    var searchDB = new XMLHttpRequest();
    searchDB.open("GET", `ajax_processes.php?allBooksSearchQuery=${query}`, true);
    searchDB.onload = function()
    {
        document.getElementById("allBooksContainer").innerHTML = this.responseText;
    }
    searchDB.send();


}

//Function that fires up once a user inputs into the input field for searching the students on the students page
function searchAllStudents(){
    var query = document.getElementById("allStudentsSearchQuery").value;

    var searchDB = new XMLHttpRequest();
    searchDB.open("GET", `ajax_processes.php?allStudentsSearchQuery=${query}`, true);
    searchDB.onload = function()
    {
        document.getElementById("allStudentsContainer").innerHTML = this.responseText;
    }
    searchDB.send();

}