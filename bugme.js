$(document).ready(function(){

    var logout = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Logout</h3>";
    var login = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Login</h3>";
    var status = null;

    // -------- ON STARTUP, CHECK IF USER IS LOGGED IN - authenticated() function.
    // -------- IF NOT LOGGED IN, ALWAYS LOAD LOGIN PAGE.
    // -------- IF LOGGED IN, CONTINUE.
    authenticated();

    // -------- SUPPORTING FUNCTIONS --------

    function loadPage(page){
        $.get(page,function(data){
            $("#content").html(data);
        })
    }

    function authenticated(){
        if(log()=="False"){
            loadPage("./includes/login.php");
        }
    }

    function hideForm(set){
        $("#id01").css({
            "display":set
        })
        $("input[type='email']").val("");
        $("input[type='password']").val("");
    }

    function log(){
        $.get("./includes/dbconnect.php?auth=login",function(data){
            if(data=="True"){
                $("#auth").html(logout);
            }
            else{
                $("#auth").html(login);
            }
            status = data;
        })
    }

    //function uses dbconnect.php to logout the user, 
    //and set the auth button to login
    //after successfully logging out.
    function logout_(){
        $.get("./includes/dbconnect.php?auth=logout",function(){})
        authenticated();
    }

    // -------- LOADING EVENT HANDLERS --------

    $("#login-btn").click(function(e){
        e.preventDefault();
        var eml = $("input[type='email']").val();
        var pwd = $("input[type='password']").val();
        // console.log("email: "+eml);
        // console.log("password: "+pwd);
        $.post("./includes/login_action_page.php",{
            email:eml,
            psw:pwd
        },
        function(result){
            $("#content").html(result);
        })
        hideForm("none");
        log();
    })

    // 
    // -------- MENU BUTTON FUNCTIONS --------
    // 


    $("#home").click(function(){
        loadPage('home.php');
    })

    $("#add_user").click(function(){
        loadPage("adduser.php");
    })

    $("#new_issue").click(function(){
        loadPage("newissue.php");
    })

    $("#auth").click(function(){
        if($(this).html()==logout){
            logout_();
        }
        else{
            loadPage("login.php");
        }
    })

})