<template>
    <table>
        <tbody v-for="source in sources" source="source" targets="targets">
            <tr>
                <td><h2>{{ source.name }}</h2></td>
                <td></td>
                <th v-for="target in targets" class="pr-4">
                    <a :href="target.url" target="_blank">{{ target.name }}</a>
                </th>
            </tr>
            <Post v-for="post in limitPosts(source)" :targets="targets" :post="post" :key="post.id" />
        </tbody>
    </table>
</template>

<script>
    export default {
        props: [
            'sources',
            'targets'
        ],

        methods: {
            limitPosts(source) {
                // @todo: It'd be nice if this instead just showed those published in the last two weeks

                // return _.filter(source.posts, (post) => {
                //     return post.published_at < two weeks ago;
                // });

                return _.slice(source.posts, 0, 10);
            }
        },

        mounted() {
        }
    }
</script>
