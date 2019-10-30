<template>
    <tbody>
        <tr>
            <th class="">{{ source.name }}</th>
            <th :key="target.id" v-for="target in targets" class="pr-4 text-sm" colspan="2">
                <a
                :href="target.url"
                target="_blank"
                :title="target.name"
                >{{ target.name }}</a>
            </th>
        </tr>

        <PostItem v-for="post in recent_posts" :targets="targets" :post="post" :key="post.id" />
    </tbody>
</template>

<script>
import PostItem from "./PostItem.vue";

export default {
    components: {
        PostItem
    },

    props: {
        source: {},
        targets: {}
    },

    computed: {
        recent_posts() {
            return this.source.posts.filter(
                post =>
                    moment(post.published_at) > moment().subtract(140, "days")
            );
        }
    }
};
</script>
