<?php require 'func/header.php'; ?>

<el-collapse-transition>
    <div class="uk-container" style="margin:7vh auto" v-show="loaded">
        <el-row :gutter="20">


            <el-col :span="18">
                <div>
                    <el-card shadow="hover" class="first-stream-card">
                        <h3>{{ site_info.posts_count }} articles in total</h3>
                        <el-dropdown @command="handleDisplay_content">
                            <el-button>
                                Type<i class="el-icon-arrow-down el-icon--right"></i>
                            </el-button>
                            <el-dropdown-menu slot="dropdown">
                                <el-dropdown-item command="1">Posts</el-dropdown-item>
                                <el-dropdown-item command="2">Pages</el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                    </el-card>

                    	<el-card shadow="hover" class="stream-card-archive" v-for="(post,index) in posts">

            <div class="archive-post-div">
                <div v-if="post.info.Img !== ':'" :style="'background-image: url('+post.info.Img+')'" class="archive-img">
                </div>
                <div :style="post.info.Img !== ':' ? 'width:65%' : 'width:100%'" class="wap-img">
                    <p class="stream-info">
                        <em>{{ post.info.Author ? post.info.Author : 'Whoever'}}</em>
                        <em>{{ post.info.Date ? post.info.Date : 'Whenever'}}</em>
                        <em>{{ post.info.Cate ? post.info.Cate : 'Wherever' }}</em>
                    </p>
                    <template v-if="!post.info.Type">
                    <a :href="'posts.php?view=' + post.filename">
                        <h1 v-html="post.info.Title"></h1>
                        <div v-html="md.render(post.content.replace(/\n*/g,'') + '...')" class="stream-content"></div>
                    </a>
                    </template>
                        <template v-else>
                            <a :href="'pages.php?view=' + post.filename">
                                <h1 v-html="post.info.Title"></h1>
                                <div v-html="md.render(post.content.replace(/\n*/g,'') + '...')" class="stream-content"></div>
                            </a>
                        </template>
                </div>
            </div>


                    </el-card>
                </div>
            </el-col>


            <?php require 'func/sidebar.php'; ?>



        </el-row>

        <?php require 'func/footer.php'; ?>
    </div>
    <el-collapse-transition>

        <script>
            //首页排除文章选项
            <?php if (!!$site->index_exclude) { ?>
                var index_get_option = '&exclude_type=cate&exclude_value=<?php echo $site->index_exclude ?>';
            <?php } else { ?>
                var index_get_option = '';
            <?php } ?>
        </script>

        <script src="js/index.js" type="text/javascript"></script>
        </body>

        </html>