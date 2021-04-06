<template>
    <tr>
        <td class="text-right pb-4 pr-4">
            <a
                :href="post.guid"
                :title="this.post.title"
                class="no-underline hover:underline font-normal text-grey-darkest"
            >
                {{ post.title }}
            </a>
            <p class="text-xs text-grey-darker uppercase">
                {{ published }}
            </p>
        </td>

        <td v-for="target in targets" :key="target.id" class="align-top">
            <PostItemSubmission
                :submission="getSubmissionForTarget(target)"
                :post_id="post.id"
                :target_id="target.id"
            />
        </td>
    </tr>
</template>

<script>
import PostItemSubmission from "./PostItemSubmission.vue";

export default {
    components: {
        PostItemSubmission
    },

    props: {
        post: {},
        targets: {}
    },

    computed: {
        published() {
            return moment(this.post.published_at).format("MM/DD/YYYY");
        }
    },

    methods: {
        getSubmissionForTarget(target) {
            return this.post.submissions.find(
                submission => submission.target_id == target.id
            );
        }
    }
};
</script>
