        $('#view').css('opacity', '1');

        var search = new FlexSearch({
            encode: "extra",
            tokenize: "reverse"
        });

        var index = new Vue({
            el: '#view',
            data() {
                return {
                    loading: true,
                    posts: null,
                    searched: [],
                    key: null,
                    count: 0
                }
            },
            mounted() {
                axios.get('func/api.php?key=search')
                    .then(e => {
                    this.posts = e.data;
                    this.count = e.data.count;
                    this.loading = false;
                    for (var i = 0; i < this.count; i++) {
                        search.add(i, this.posts[i].title);
                    }
                })
            },
            methods: {
                s: function () {
                    this.searched = search.search(this.key);
                }
            }
        });