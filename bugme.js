$(document).ready(function(){

    var logout = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Logout</h3>";
    var login = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Login</h3>";

    // -------- IF NOT LOGGED IN, ALWAYS LOAD LOGIN PAGE.
    // -------- IF LOGGED IN, CONTINUE.
    loadPage("includes/login.php");

    // -------- LOGIN FUNCTIONS AND EVENTS -------- //

    $("#content").on("DOMSubtreeModified",function(){
        $("#login-form").submit(function(e){
            e.preventDefault(); // action="includes/login_action_page.php" method="POST"
            var eml = $("input[type='email']").val();
            var pwd = $("input[type='password']").val();
            console.log("email: "+eml);
            $.post("includes/login_action_page.php",{
                email:eml,
                psw:pwd
            },
            function(result){
                log();
                $("#content").html(result);
            })
            $("#id01").css({
                "display":"none"
            })
        })

        $("#user-form").submit(function(e){
            e.preventDefault();
            var eml = $("input[type='email']").val();
            var pwd = $("input[type='password']").val();
            var fname = $("#firstname").val();
            var lname = $("#lastname").val();
            $.post("includes/add_user_action_page.php",{
                email:eml,
                password:pwd,
                firstname:fname,
                lastname:lname
            },
            function(result){
                log();
                $("#error").html(result);
            })
            $(this).reload();
        })
    })  
    

    // -------- SUPPORTING FUNCTIONS --------

    function loadPage(page){
        $.get(page,function(data){
            $("#content").html(data);
        })
        log();
    }

    //function uses dbconnect.php to logout the user, 
    //and set the auth button to login
    //after successfully logging out.
    function logout_(){
        $.get("includes/dbconnect.php?auth=logout",function(){})
        loadPage("includes/login.php");
    }

    function log(){
        $.get("./includes/dbconnect.php?auth=login",function(data){
            if(data=="True"){
                $("#auth").html(logout);
            }
            else{
                $("#auth").html(login);
            }
        })
    }

    // 
    // -------- MENU BUTTON FUNCTIONS --------
    // 


    $("#home").click(function(){
        console.log("home btn clicked");
        // loadPage("adduser.php");
    })

    $("#add_user").click(function(){
        console.log("add user btn clicked");
        loadPage("add_user.php");
    })

    $("#new_issue").click(function(){
        console.log("new issue btn clicked");
        // loadPage("newissue.php");
    })

    $("#auth").click(function(){
        if($(this).html()==logout){
            logout_();
        }
        else{
            loadPage("includes/login.php");
        }
    })

})