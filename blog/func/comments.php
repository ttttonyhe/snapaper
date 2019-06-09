<el-tooltip class="item" effect="dark" content="Click to reply" placement="top-end">
    <div>
        <div class="comments-list">
            <ul v-for="(com,index) in comments">
                <li @click="reply(index + 1)">
                    <div>
                        <img :src="'https://gravatar.loli.net/avatar/'+md5(com.email)+'?d=mp&s=80'">
                    </div>
                    <div class="comments-info">
                        <p class="p1">
                            <b>{{ com.name }}</b>
                            <em>{{ time(com.date) }}</em>
                        </p>
                        <div class="p2" v-html="md.render(com.content)"></div>
                    </div>
                </li>
                <div class="comments-reply" v-if="!!com.reply">
                    <li v-for="rcom in com.reply" class="comments-reply-div">
                        <div>
                            <img :src="'https://gravatar.loli.net/avatar/'+md5(rcom.email)+'?d=mp&s=80'">
                        </div>
                        <div class="comments-info">
                            <p class="p1">
                                <b>{{ rcom.name }}</b>
                                <em>{{ time(rcom.date) }}</em>
                            </p>
                            <div class="p2" v-html="md.render(rcom.content)"></div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
        <div style="margin-top: 40px;margin-bottom:30px">
            <div v-if="!!comment.comment_reply">
                <p class="comments-reply-badge">Reply to comment number {{ comment.comment_reply }}<button @click="reply('c')">Cancel X</button></p>
            </div>
            <em class="comments-md"><i class="czs-arrow-down-l"></i> MarkDown Supported</em>
            <el-input type="textarea" placeholder="Say something..." v-model="comment.comment_content" class="comments-send" row="4">
            </el-input>
            <div style="display: flex;width: 60%;">
                <el-input placeholder="Nickname" v-model="comment.comment_name"></el-input>
                <el-input placeholder="Email" v-model="comment.comment_email" style="margin-left:20px"></el-input>
            </div>
            <el-button type="primary" @click="send_comment('default')" style="float: right;
    margin-top: -40px;" :loading="comment_loading">Send</el-button>
        </div>
    </div>
</el-tooltip>