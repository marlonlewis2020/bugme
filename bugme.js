$(document).ready(function(){

    var logout = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Logout</h3>";
    var login = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Login</h3>";

    // -------- IF NOT LOGGED IN, ALWAYS LOAD LOGIN PAGE.
    // -------- IF LOGGED IN, CONTINUE.
    loadPage("includes/login.php");

    // -------- LOGIN FUNCTIONS AND EVENTS -------- //

    $("#content").on("DOMSubtreeModified",()=>{

        // Kathy's js code below

        
        // view issues/home js code above


        $("#login-form").submit((e)=>{
            e.preventDefault(); // action="includes/login_action_page.php" method="POST"
            var eml = $("input[type='email']").val();
            var pwd = $("input[type='password']").val();
            console.log("email: "+eml);
            $.post("includes/login_action_page.php",{
                email:eml,
                psw:pwd
            },
            (result)=>{
                log();
                $("#content").html(result);
            })
            $("#id01").css({
                "display":"none"
            })
        })

        $("#createissue").click(()=>{
            loadPage("createIssue.php");
        })

        $("#issue_new").submit((e)=>{
            e.preventDefault();
            var ttl = $("#title").val();
            var desc = $("#description").val();
            var pri = $("#priority").val();
            var asgn = $("#assigned_to").val();
            var typ = $("#type").val();
            var cre = $("#created_by").val();
            $("#issue_new input[type=text], #issue_new textarea[type=text]").val("");
            $.post("submit_issues.php",{
                title: ttl,
                description: desc,
                priority: pri,
                assigned_to: asgn,
                type: typ,
                created_by: cre,
            },
            (result)=>{
                
                log();
                if("Successfully Submitted!".localeCompare(result)){
                    Swal.fire(
                        "SUCCESS!",
                        result,
                        "success"
                    )
                    loadPage("home.php");
                }
                else{
                    Swal.fire(
                        "Oops!!",
                        result,
                        "warning"
                    )
                }
            })
        })

        $("#user-form").submit((e)=>{
            e.preventDefault();
            var eml = $("input[type='email']").val();
            var pwd = $("input[type='password']").val();
            var fname = $("#firstname").val();
            var lname = $("#lastname").val();
            $("#user-form input[type=text], #user-form input[type=email], #user-form input[type=password]").val("");
            $.post("includes/add_user_action_page.php",{
                email:eml,
                password:pwd,
                firstname:fname,
                lastname:lname
            },
            (result)=>{
                log();
                var n_user = result;
                if (n_user.slice(0,8)==="New User"){
                    Swal.fire(
                        "SUCCESS!",
                        n_user,
                        "success"
                    )
                }
                else {
                    Swal.fire(
                        "Oops!",
                        n_user,
                        "warning"
                    )
                }
            })
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
        $.get("includes/dbconnect.php?auth=logout")
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

    $("#createissue").click(()=>{
        loadPage("createIssue.php");
    })

    $("#home").click(function(){
        console.log("home btn clicked");
        // loadPage("adduser.php");
        loadPage("home.php");
    })

    $("#add_user").click(function(){
        console.log("add user btn clicked");
        loadPage("add_user.php");
    })

    $("#new_issue").click(function(){
        console.log("new issue btn clicked");
        loadPage("createissue.php");
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