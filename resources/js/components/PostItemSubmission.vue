<template>
    <input type="checkbox"
        v-model="has_submission"
        style="transform: scale(1.25)"
    />
</template>

<script>
export default {
    props: {
        submission: {},
        post_id: {},
        target_id: {},
    },

    data() {
        return {
            has_submission: Boolean(this.submission),
            url: '/api/submissions',
        }
    },

    computed: {
        payload() {
            return {
                target_id: this.target_id,
                post_id: this.post_id
            }
        },
    },

    watch: {
        has_submission(val) {
            if (val) {
                axios.post(this.url, this.payload);
            } else {
                axios.delete(this.url, { params: this.payload });
            }
        },
    },
}
</script>
