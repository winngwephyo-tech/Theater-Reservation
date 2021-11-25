function toggleNavProfileDropdown() {
    console.log("inside js");
    if ($(".profile-dropdown-content").css("display") == "none") {
        console.log("inside close");
        $(".profile-dropdown-content").css("display", "block");
    } else {
        $(".profile-dropdown-content").css("display", "none");
    }
}

//Close NavProfileDropdown when click outside of the element
$(document).on("click", function (event) {
    var $trigger = $(".nav-dropdown");
    if ($trigger != event.target && !$trigger.has(event.target).length) {
        $(".profile-dropdown-content").css("display", "none");
    }
});
