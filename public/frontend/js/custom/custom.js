$(document).ready(function () {
    var x = screen.width;
    if (x < 576) {
        $(".ddd1").hide();
        $(".ddd2").show();
        setTimeout(() => {
            $(".opacity2").css("opacity", "1");
        }, 2000);
    } else {
        $(".ddd2").hide();
        $(".ddd1").show();
        setTimeout(() => {
            $(".opacity2").css("opacity", "1");
        }, 3000);
    }
});
