$(document).ready(function(){

    var logout = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Logout</h3>";
    var login = "<i class=\"material-icons small-icon\">power_settings_new</i><h3>Login</h3>";

    // -------- IF NOT LOGGED IN, ALWAYS LOAD LOGIN PAGE.
    // -------- IF LOGGED IN, CONTINUE.
    loadPage("includes/login.php");

    // -------- LOGIN FUNCTIONS AND EVENTS -------- //

    $("#content").on("DOMSubtreeModified",()=>{

        // view issues/home js below

        function  updateStatus(issueid, operation) {
            do {
                let queryRequest = new Request('updatestatus.php?issueid='
                        + encodeURIComponent(issueid.trim())
                        + "&oper=" + encodeURIComponent(operation.trim()));
        
                fetch(queryRequest)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("HTTP error! status: " + response.status);
                            }
                            return response.text();
                        })
                        .then(responseText => {
                            $("#content").html(responseText);
                        })
                        .catch((error) => {
                            $("#content").html("<h4 class=\"queryerror\">" + 'Error:' + error.message + "</h4>");
                        });
            } while (false);
        }
        
        function loadDetail(issueid) {
            do {
                let queryRequest = new Request('view_issues.php?issueid=' + encodeURIComponent(issueid.trim()));
        
                fetch(queryRequest)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("HTTP error! status: " + response.status);
                            }
                            return response.text();
                        })
                        .then(responseText => {
                            $("#content").html(responseText);
                        })
                        .catch((error) => {
                            $("#content").html("<h4 class=\"queryerror\">" + 'Error:' + error.message + "</h4>");
                        });
            } while (false);
        }
        
        function loadView(viewmode, select) {
            do {
                let queryRequest = new Request('home.php?viewmode=' + encodeURIComponent(viewmode.trim()));
        
                fetch(queryRequest)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("HTTP error! status: " + response.status);
                            }
                            return response.text();
                        })
                        .then(responseText => {
                            $("#content").html(responseText);
                            $("div.filtermenu a h4.btnmenu.selected").removeClass("selected");
                            $("#" + select).addClass("selected");
                        })
                        .catch((error) => {
                            $("#content").html("<h4 class=\"queryerror\">" + 'Error:' + error.message + "</h4>");
                        });
            } while (false);
        }
        
        $(document).on("click", "button.btn-closed", function (event) {
            event.stopPropagation();
            event.preventDefault();
        
            var issueid = $(this).attr("data-issueid");
            if (issueid) {
                updateStatus(issueid, "closed");
            }
        }).on("click", "button.btn-progress", function (event) {
            event.stopPropagation();
            event.preventDefault();
        
            var issueid = $(this).attr("data-issueid");
            if (issueid) {
                updateStatus(issueid, "progress");
            }
        }).on("click", "a.querydetail", function (event) {
            event.stopPropagation();
            event.preventDefault();
        
            var issueid = $(this).attr("data-issueid");
            if (issueid) {
                loadDetail(issueid);
            }
        }).on("click", "div.filtermenu a", function (event) {
            event.stopPropagation();
            event.preventDefault();
        
            var viewmode = $(this).attr("data-viewmode");
            if (viewmode) {
                loadView(viewmode, $(this).children("h4").attr("id"));
            }
        }).on("click", "#home", function (event) {
            event.stopPropagation();
            event.preventDefault();
        
            loadView("all", "allmenu");
        });
        // view issues/home js above


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