<template>
    <tr>
        <td class="text-right pr-8">
            <a :href="this.post.url" class="no-underline hover:underline text-sm font-normal text-grey-darkest">{{ this.post.title }}</a>
        </td>
        <td v-for="target in this.targets">
            <input type="checkbox" :checked="submittedToTarget(target)">
        </td>
    </tr>
</template>

<script>
    export default {
        props: [
            'post',
            'targets'
        ],

        mounted() {
            console.log(this.post);
        },

        methods: {
            submittedToTarget(target) {
                return _.filter(this.post.submissions, (submission) => {
                    return submission.target_id == target.id;
                }).length > 0;
            }
        }
    }
</script>
