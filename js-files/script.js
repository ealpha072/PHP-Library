$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(".changepassword").click(function(e) {
    e.preventDefault();
    $(".updateprofile").hide(1000);
    $(".passwordchange").show(1000);
})

$(".details").click(function(e) {
    e.preventDefault();
    $(".passwordchange").hide(1000);
    $(".updateprofile").show(1000);
})

/*$(".search-book").click(function(e) {
    e.preventDefault();
    $('.').hide();
}) */