/*
 * @Author: mikey.zhaopeng 
 * @Date: 2019-10-29 22:40:43 
 * @Last Modified by:   mikey.zhaopeng 
 * @Last Modified time: 2019-10-29 22:40:43 
 */

var qp_url = function (name) {
    if (!!name && name.toString().indexOf('qp') > -1 && name.toString().indexOf('2_2') <= -1) {
        return true;
    } else {
        return false;
    }
}
var ms_url = function (name) {
    if (!!name && name.toString().indexOf('ms') > -1 && name.toString().indexOf('2_2') <= -1 && name.toString().indexOf('+') <= -1) {
        return true;
    } else {
        return false;
    }
}

function download_list() { //列表下载
    var urls = $('#download_items').val(); //获取列表数据
    if (urls == '') { //为空则提示
        swal("Oops", "Can not download empty list", "error");
    } else {
        swal("Download Started", "Do not leave this page, the download of these files will start automatically after 3 seconds", {
            button: false,
        });
        $('#count_list_notice')[0].style.display = 'none';
        toTop();
        $('#dl')[0].innerHTML = '<button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;">Processing...</button><button class="uk-button uk-button-default" style="border-radius: 5px;margin-left: 0.5%;" onclick="location.reload();">Refresh</button>'; //修改按钮
        $('#notice')[0].style.display = 'unset'; //显示提示
        var url = urls.split(','); //半角逗号分隔字符串为数组
        var idname = ''; //初始化idname
        var num = 0; //初始化指针值

        var click = function () {
            if (num == (url.length)) { //指针到达列表总数
                window.clearInterval(interval); //清除interval
            } else {
                if (dmode == 1) {
                    idname = '#' + url[num]; //补全idname
                    downloadFile($(idname).attr('href'));
                } else if (dmode == 2) {
                    idname = '#' + url[num]; //补全idname
                    downloadFile($(idname).attr('href'));
                    if (qp_url($(idname).text())) {
                        downloadFile($(idname).attr('href').replace('qp', 'ms'));
                    } else if (ms_url($(idname).text())) {
                        downloadFile($(idname).attr('href').replace('ms', 'qp'));
                    }
                }
                num += 1; //累加指针
            }
        }

        window.interval = setInterval(click, 3000); //设置interval
    }
}

function remove_items(id) { //删除列表指定id 值
    var current = $('#download_items').val(); //获取当前列表值
    var current = current.split(','); //分隔列表字符串为数组
    current = $.grep(current, function (value) {
        return value != id;
    }); //获取删除值位置并删除

    var now_count = current.length;
    if (now_count == 0) {
        $('#count_list_notice')[0].style.display = 'none';
    } else {
        $('#list_count')[0].innerHTML = now_count;
    }

    var now = current.join(","); //数组转换回字符串
    $('#download_items').val(now); //存入列表值
    var change = '#btn' + id; //补全提示已修改的按钮id
    $(change).attr('onclick', 'add_items(' + id + ')'); //修改按钮onclick
    $(change)[0].innerHTML = 'Add to List'; //修改按钮文本
    $(change)[0].className = 'papers-list-td-btn1'; //修改按钮css
    console.log($('#download_items').val()); //方便debug

}

function add_items(id) { //增加列表值
    var current = $('#download_items').val(); //获取当前列表值
    if (current == '') { //若当前列表值为空
        var now = id;
        var change = '#btn' + id;
        $('#download_items').val(now); //直接赋值给列表，不增加连接符
        $(change).attr('onclick', 'remove_items(' + id + ')');
        $(change)[0].innerHTML = 'Remove';
        $(change)[0].className = 'papers-list-td-btn1-change';

        $('#count_list_notice')[0].style.display = 'unset';
        $('#list_count')[0].innerHTML = '1';
    } else {
        var now = current + ',' + id //否则增加连接符
        var change = '#btn' + id;
        $('#download_items').val(now);
        $(change).attr('onclick', 'remove_items(' + id + ')');
        $(change)[0].innerHTML = 'Remove';
        $(change)[0].className = 'papers-list-td-btn1-change';

        now = current.split(","); //分隔成数组获取个数
        var now_count = now.length + 1;
        $('#list_count')[0].innerHTML = now_count;
    }
    console.log($('#download_items').val());
}


/* UX 功能 */
function toTop() {
    /*
    var gotoTop= function(){
      var currentPosition = document.documentElement.scrollTop || document.body.scrollTop;
      currentPosition -= 50;
      if (currentPosition > 0) {
        window.scrollTo(0, currentPosition);
      }
      else {
        window.scrollTo(0, 0);
        clearInterval(timer);
        timer = null;
      }
    }
    var timer=setInterval(gotoTop,0.3);
    */
    $('#top')[0].scrollIntoView();
}

function toBottom() {
    $('#bottom')[0].scrollIntoView();
}

/* 随浏览器变化而改变 */

function getScrollTop() {
    return scrollTop = document.body.scrollTop + document.documentElement.scrollTop;
}

window.onscroll = function () {
    if (getScrollTop() <= 400) {
        $('#to_top')[0].style.display = 'none';
        $('#to_bottom')[0].style.display = 'none';
        $('#sticky')[0].style.display = 'none';
    } else {
        $('#to_top')[0].style.display = 'unset';
        $('#to_bottom')[0].style.display = 'unset';
        $('#sticky')[0].style.display = 'unset';
        $('#update')[0].style.display = 'none';
    }
}
/* 结束随浏览器变化而改变 */

function dismiss() {
    $('#update')[0].style.display = 'none';
}


/* 结束 UX 功能 */