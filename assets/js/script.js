var login = document.getElementById("login");

function loginValidation()
{
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

function clearSearchBar()
{
    document.getElementById("searchQuery").value = "";
    
}

function searchBooks()
{
    var query = document.getElementById("searchQuery").value;

    var searchDB = new XMLHttpRequest();
    searchDB.open("GET", `ajax_processes.php?allBooksSearchQuery=${query}`, true);
    searchDB.onload = function()
    {
        document.getElementById("display").innerHTML = this.responseText;
    }
    searchDB.send();

}