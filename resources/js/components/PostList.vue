<template>
    <tbody>
        <tr>
            <th>{{ source.name }}</th>
            <th :key="target.id" v-for="target in targets" class="pr-4 text-sm" colspan="1">
                <a
                    :href="target.url"
                    :title="target.name"
                    target="_blank"
                >{{ target.name }}</a>
            </th>
        </tr>

        <PostItem
            v-for="post in recent_posts"
            :key="post.id"
            :targets="targets"
            :post="post"
        />
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
