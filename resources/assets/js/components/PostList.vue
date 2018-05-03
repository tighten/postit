<template>
    <tbody>
        <tr>
            <td class="text-right font-bold pr-4 pt-4">{{ source.name }}</td>

            <td></td>

            <th v-for="target in targets" class="pr-4 text-sm">
                <a :href="target.url" target="_blank">{{ target.name }}</a>
            </th>
        </tr>

        <PostItem v-for="post in recent_posts" :targets="targets" :post="post" :key="post.id" />
    </tbody>
</template>

<script>
import PostItem from './PostItem.vue';

export default {
    components: {
        PostItem,
    },

    props: {
        source: {},
        targets: {},
    },

    computed: {
        recent_posts() {
            // @todo: It'd be nice if this instead just showed those published in the last two weeks
            //
            //      KD: check out https://github.com/xx45/dayjs for this; 2KB and you can do
            //      isAfter(dayjs().subtract(14, 'day');)

            return this.source.posts.slice(0, 5);
        }
    },
}
</script>
