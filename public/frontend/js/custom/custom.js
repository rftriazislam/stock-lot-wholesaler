$(document).ready(function() {
    var x = screen.width;
    if (x < 576) {
        $('.ddd1').hide();
        $('.ddd2').show();
    } else {
        $('.ddd2').hide();
        $('.ddd1').show();
    }
});