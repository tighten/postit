<template>
    <tr>
        <td class="text-right pr-8">
            <a :href="this.post.url" class="no-underline hover:underline text-sm font-normal text-grey-darkest">{{ this.post.title }}</a>
        </td>
        <td v-for="target in this.targets">
            <input type="checkbox" :checked="submittedToTarget(target)" @click="toggleSubmission(target, submittedToTarget(target))">
        </td>
    </tr>
</template>

<script>
    import axios from 'axios';

    export default {
        props: [
            'post',
            'targets'
        ],

        data() {
            return {
                submissions: []
            };
        },

        mounted() {
            // console.log(this.post.submissions);
            this.submissions = _.map(this.post.submissions, (submission) => {
                return submission.target_id;
            });
        },

        methods: {
            // @todo can this be a computed prop instead?
            submittedToTarget(target) {
                // @todo there's gotta be a cleaner way
                return _.filter(this.submissions, (submission_target_id) => {
                    return submission_target_id == target.id;
                }).length > 0;
            },
            toggleSubmission(target, is_submitted) {
                const data = {
                    'target_id': target.id,
                    'post_id': this.post.id
                };

                // @todo cleaner way to make this not a conditional?
                // @todo There seems to be the need for a Vue-reactive way to modify this array?
                if (is_submitted) {
                    _.remove(this.submissions, target.id);
                    axios.delete('/api/submissions', { params: data });
                } else {
                    this.submissions.push(target.id);
                    axios.post('/api/submissions', data);
                }
            }
        }
    }
</script>
