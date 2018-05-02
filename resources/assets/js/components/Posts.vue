<template>
    <table>
        <tbody v-for="source in sources" source="source" targets="targets">
            <tr>
                <td><h2>{{ source.name }}</h2></td>
                <th v-for="target in targets">
                    <a :href="target.url" target="_blank">{{ target.name }}</a>
                </th>
            </tr>
            <Row v-for="post in limitPosts(source)" :targets="targets" :post="post" :key="post.id" />
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
                return _.slice(source.posts, 0, 10);
            }
        },

        mounted() {
        }
    }
</script>
