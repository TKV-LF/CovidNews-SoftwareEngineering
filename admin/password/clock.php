<!DOCTYPE html>
<html>
    <head>
        <title>Đồng hồ đếm ngược bằng JS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            span{border: solid 1px #ACACAC; padding: 2px;}
        </style>
        <script language="javascript">

            var m = 1; // Phút
            var s = 1; // Giây
            
            var timeout = null; // Timeout
            
            function start()
            {
 
    /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
    // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
    //  - giảm số phút xuống 1 đơn vị
    //  - thiết lập số giây lại 59
    if (s === -1){
        m -= 1;
        s = 59;
    }
 
     // Nếu số phút = -1 tức là đã hết giờ, lúc này:
    //  - Dừng chương trình
    if (m === -1){
        clearTimeout(timeout);
        alert('Hết giờ');
        return false;
    }
    /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
    document.getElementById('m').innerText = m.toString();
    document.getElementById('s').innerText = s.toString();
 
    /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
    timeout = setTimeout(function(){
        s--;
        start();
    }, 1000);
            }
            function stop(){
                clearTimeout(timeout);
            }
        </script>
    </head>
    <body>
        <div>
            <input type="button" value="Start" onclick="start()"/>
            <!-- <input type="button" value="Stop" onclick="stop()"/>  <br/> <br/> -->
        </div>
        
        <div>
            <span id="m">Phút</span> :
            <span id="s">Giây</span>
        </div>
    </body>
</html>