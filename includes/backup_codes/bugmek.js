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
