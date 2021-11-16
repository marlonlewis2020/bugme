$(document).ready(function(){
    loadPage("includes/login.php");

    console.log("Hello World! 1");

    //This function returns the content of a php script into the index.php content area.
    function loadPage(page){
        $.get(page,function(data){
            $("#content").html(data);
            console.log("page loaded");
        })
    }

    console.log("Hello World! 2");
    
    $('#login-btn').click(function(e){
        e.preventDefault();
        console.log("Hello World!");
    })

    console.log("Hello World! 3");

})