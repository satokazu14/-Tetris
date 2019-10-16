$(function(){
    var fl = 0;
    var key = 0;

    setmino();

    $('html').keyup(function(e){
        switch(e.which){
            case 39: // →
            key = 39;
            conmino();
            break;

            case 37: // ←
            key = 37;
            conmino();
            break;

            case 38: // ↑
            key = 38;
            conmino();
            break;

            case 40: // ↓
            key = 40;
            conmino();
            break;
        }
    });

    function setmino(){
        $.ajax({
            url:"set_mino.php",
            method:"post",
            dataType:"json",
            success:function(data){
                fl = JSON.parse(data.fl);
            }
        });
    };

    function conmino(){
        $.ajax({
            url:"controll.php",
            method:"post",
            data:{'key':key},
            success:function(data){
            }
        });
    };

    function downmino(){
        $.ajax({
            url:"down_mino.php",
            method:"post",
            dataType:"json",
            success:function(data){
                $('#main').html(data.main);
                fl = JSON.parse(data.fl);
            }
        });
    };

    function deletemino(){
        $.ajax({
            url:"delete_mino.php",
            method:"post",
            dataType:"json",
            success:function(data){
                $('#main').html(data.main);
            }
        });
    };

    function mino(){
        downmino();
        if(fl == 1){
            deletemino();
            setmino();
        }
        else if(fl == 2){
            alert('GAME OVER');
        }
    }

    setInterval(function(){
        mino();
    },300);
});