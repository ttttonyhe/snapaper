$.extend({
    getUrlVars: function () {
        var vars = [],
            hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    getUrlVar: function (name) {
        return $.getUrlVars()[name];
    }
});
//获取 view 值 id
var view_id = decodeURIComponent($.getUrlVar('view'));

let cookie = {
    "set": function setCookie(name, value) {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    },
    "get": function getCookie(name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    },
    "del": function delCookie(name) {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval = cookie.get(name);
        if (cval != null)
            document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
    }
}

function time(time) {
    var newDate = new Date();
    newDate.setTime(time * 1000);
    return newDate.toLocaleString();
}

var md = window.markdownit({
    html: true,
    xhtmlOut: false,
    breaks: true,
    linkify: true
});
$(document).ready(function () {
    $('#view').css('opacity', '1');

    new Vue({
        el: '#view',
        data() {
            return {
                loading: 0,
                post: [],
                nav_items: [],
                title: null,
                author: null,
                cate: null,
                date: null,
                img: null,
                tags: '',
                content: ' ',
                comments: null,
                comment_loading : false,
                comment: {
                    comment_content: null,
                    comment_name: cookie.get('oblog_comment_name'),
                    comment_email: cookie.get('oblog_comment_email'),
                    comment_reply: null
                }
            }
        },
        mounted() {
            axios.get('api/get_header.php')
                .then(e => {
                    this.nav_items = e.data;
                })
            axios.get('api/get_posts.php?view=' + view_id)
                .then(e => {
                    this.post = e.data;
                    this.title = this.post.info.Title;
                    this.img = this.post.info.Img;
                    this.date = this.post.info.Date;
                    this.cate = this.post.info.Cate;
                    this.tags = this.post.info.Tags;
                    this.author = this.post.info.Author;
                    this.content = md.render(this.post.content);
                    this.loading = 1;

                    axios.get('comments/' + view_id + '.json?nocache=' + (new Date()).getTime())
                        .then(e => {
                            this.comments = e.data;
                        })

                })
        },
        methods: {
            send_comment: function (key) {
                if (!this.comment.comment_name || !this.comment.comment_email || !this.comment.comment_content) {
                    this.$message({
                        showClose: true,
                        message: '信息不全',
                        type: 'error'
                    });
                } else {
                    this.comment_loading = true;
                    if (!this.comment.comment_reply) {
                        var params = new URLSearchParams();
                        params.append('name', this.comment.comment_name);
                        params.append('email', this.comment.comment_email);
                        params.append('content', this.comment.comment_content);
                        params.append('pid', view_id);
                        params.append('ver', 'comment_ver');
                        axios.post('api/save_comments.php', params)
                            .then(response => {
                                this.comment.comment_content = null;
                                this.$message({
                                    showClose: true,
                                    message: '提交成功',
                                    type: 'success'
                                });
                                axios.get('comments/' + view_id + '.json?nocache=' + (new Date()).getTime())
                                    .then(e => {
                                        this.comments = e.data;
                                    })
                                cookie.set('oblog_comment_name', this.comment.comment_name);
                                cookie.set('oblog_comment_email', this.comment.comment_email);
                                this.comment_loading = false;
                            });
                    } else {
                        this.comment_loading = true;
                        var params = new URLSearchParams();
                        params.append('name', this.comment.comment_name);
                        params.append('email', this.comment.comment_email);
                        params.append('content', this.comment.comment_content);
                        params.append('pid', view_id);
                        params.append('ver', 'comment_ver');
                        params.append('reply', this.comment.comment_reply - 1);
                        axios.post('api/save_comments.php', params)
                            .then(response => {
                                this.comment.comment_content = null;
                                this.$message({
                                    showClose: true,
                                    message: '提交成功',
                                    type: 'success'
                                });
                                axios.get('comments/' + view_id + '.json?nocache=' + (new Date()).getTime())
                                    .then(e => {
                                        this.comments = e.data;
                                        this.comment_loading = false;
                                    })
                            })
                    }
                }
            },
            reply: function (key) {
                if (key !== 'c') {
                    this.comment.comment_reply = key;
                } else {
                    this.comment.comment_reply = null;
                }
            }
        }
    })
})