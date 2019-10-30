<template>
    <table>
        <PostList
            v-for="source in sources"
            :key="source.id"
            :source="source"
            :targets="targets"
        />
    </table>
</template>

<script>
import PostList from './PostList.vue';

export default {
    components: {
        PostList,
    },

    props: {
        sources: {},
        targets: {},
    },
}
</script>
