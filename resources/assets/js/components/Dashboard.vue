<template>
    <table>
        <PostList v-for="source in sources" :source="source" :targets="targets" :key="source.id"/>
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
