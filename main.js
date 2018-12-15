<script>
    function download_all(){
        var idname = '';
        var num = 0;
        var count = <?php echo count($user_data);?>
        
        var click = function(){
            if(num == (count - 1) ){
                window.clearInterval(interval);
            }else{
                idname = '#' + num;
                $(idname)[0].click();
                num += 1;
            }
        }
        
        window.interval = setInterval(click,3000);
    }
    
    function download_list(){
        var urls = $('#download_items').val();
        if(urls == ''){
            alert('下载列表为空');
        }else{
        var url = urls.split(',');
        var idname = '';
        var num = 0;
        
        var click = function(){
            if(num == (url.length)){
                window.clearInterval(interval);
            }else{
                idname = '#' + url[num];
                $(idname)[0].click();
                num += 1;
            }
        }
        
        window.interval = setInterval(click,3000);
    }
}
    
    function remove_items(id){
        var current = $('#download_items').val();
        var current = current.split(',');
        current.splice($.inArray(id,current),1);
        var now = current.join(",");
        $('#download_items').val(now);
        var change = '#btn'+id;
        $(change)[0].innerHTML = '<button onclick="add_items('+ id +')">添加到下载列表</button>';
        console.log($('#download_items').val());
}
    
    function add_items(id){
        var current = $('#download_items').val();
        if(current == ''){
            var now = id;
            var change = '#btn'+id;
            $('#download_items').val(now);
            $(change)[0].innerHTML = '<button onclick="remove_items('+ id +')">从下载列表移除</button>';
        }else{
            var now = current + ',' + id
            var change = '#btn'+id;
            $('#download_items').val(now);
            $(change)[0].innerHTML = '<button onclick="remove_items('+ id +')">从下载列表移除</button>';
        }
        console.log($('#download_items').val());
}

    function delete_list(){
        $('#download_items').val('');
        console.log($('#download_items').val());
}

</script>