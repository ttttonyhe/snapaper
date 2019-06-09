<?php require 'func/header.php' ?>
<link rel="stylesheet" href="md.css">
<script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.min.js"></script>
<div class="reading-bar"></div>
    <div class="uk-container" v-loading="!loading">
                <el-card shadow="never" style="
                padding: 30px 40px;
                margin:6vh auto;
                width:60%;
            " class="wap-content">
                    <h1 v-html="title" class="post-h1"></h1>
                    <p class="post-p">
                        <em>{{ author }}</em>
                        <em>{{ date }}</em>
                        <em>{{ 'Archived in: ' + cate }}</em>
                    </p>
                    <div v-html="content" class="post-content markdown-body" id="content"></div>

                    <?php require 'func/comments.php'; ?>

                </el-card>

    </div>

    </div>
<?php require 'func/footer.php'; ?>
<script src="js/posts.js" type="text/javascript"></script>
</body>

</html>