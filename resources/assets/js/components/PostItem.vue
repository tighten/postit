<template>
    <tr>
        <td class="text-right pr-4">
            <a :href="post.guid"
                class="no-underline hover:underline font-normal text-grey-darkest"
            >
                {{ this.post.title }}
            </a>
        </td>

        <td class="text-xs text-grey-darker uppercase pr-4">
            {{ this.post.published_at }}
        </td>

        <td v-for="target in targets">
            <PostItemSubmission
                :submission="getSubmissionForTarget(target)"
                :post_id="post.id"
                :target_id="target.id"
            />
        </td>
    </tr>
</template>

<script>
import PostItemSubmission from './PostItemSubmission.vue';

export default {
    components: {
        PostItemSubmission,
    },

    props: {
        post: {},
        targets: {},
    },

    methods: {
        getSubmissionForTarget(target) {
            return this.post.submissions.find((submission) => submission.target_id == target.id )
        },
    },
}
</script>
