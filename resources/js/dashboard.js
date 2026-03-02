export function dashboard(targets, sources) {
    return {
        targets,
        sources,

        recentPosts(source) {
            const cutoff = new Date();
            cutoff.setDate(cutoff.getDate() - 140);

            return source.posts.filter(
                (post) => new Date(post.published_at) > cutoff
            );
        },

        formatDate(dateString) {
            const date = new Date(dateString);
            const month = String(date.getMonth() + 1).padStart(2, "0");
            const day = String(date.getDate()).padStart(2, "0");
            const year = date.getFullYear();

            return `${month}/${day}/${year}`;
        },

        hasSubmission(post, target) {
            return post.submissions.some(
                (submission) => submission.target_id == target.id
            );
        },

        toggleSubmission(event, postId, targetId) {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            const url = "/api/submissions";
            const payload = { target_id: targetId, post_id: postId };

            if (event.target.checked) {
                fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    body: JSON.stringify(payload),
                });
            } else {
                const params = new URLSearchParams(payload).toString();
                fetch(`${url}?${params}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "X-Requested-With": "XMLHttpRequest",
                    },
                });
            }
        },
    };
}
