<div class="side-blog-author">
    <el-card shadow="hover">
    	<div>
    		<h4>Snapaper Blog</h4>
    		<p>Real news from snapaper</p>
    	</div>
    </el-card>
    <?php
    //联系方式选项
    for ($i = 0; $i < count($site->con); ++$i) { ?>
        <el-card shadow="hover" style="margin-top: 10px;">
            <p class="<?php echo $site->con[$i][0] ?>">
                <i class="<?php echo $site->con[$i][1] ?>"></i>
                <?php echo $site->con[$i][2] ?>
            </p>
        </el-card>
    <?php } ?>
</div>