document.getElementById('action-alert').display = 'block'
var x = 3;
    var time = setInterval(function () {
        
        x = x - 1;

        if (x < 0) {
            clearInterval(time);
            document.getElementById('action-alert').style.display = "none";
        }
    }, 1000);
