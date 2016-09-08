<template>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>标题</th><th>创建时间</th><th>操作</th></tr>
        </thead>
        <tbody>
            <tr v-for="post in posts">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.created_at }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/post/{{ post.id }}" target="_blank" type="button" class="btn btn-success">查看</a>
                        <button v-link="{ name: 'editpost', params: {id: post.id}}" type="button" class="btn btn-info">编辑</button>
                        <button type="button" class="btn btn-danger" @click="deletePost(post)">删除</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        ready () {
            this.fetchPosts()
        },
        data () {
            return {
                posts: []
            }
        },
        methods: {
            fetchPosts () {
                this.$http({ url: '/api/post', method: 'GET' })
                    .then(function (response) {
                        this.$set('posts', response.data)
                })
            }
        }
    }

</script>