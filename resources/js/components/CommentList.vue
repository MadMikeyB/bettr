<template>
    <div>
        <div v-if="comments.length > 0">
            <div v-for="comment in comments" class="comment">
                <div class="comment__info">
                    <div class="comment__author">
                        <i class="fas fa-user"></i> <a :href="route('profiles.show', comment.user.slug)">{{comment.user.name}}</a>
                    </div>
                    <div class="comment__date">
                        <i class="fas fa-clock"></i> {{ moment(comment.created_at, 'YYYY-MM-DD HH:mm:ss').fromNow() }}
                    </div>
                    
                </div>
                <div class="comment__body">
                    <div class="comment__comment" v-html="comment.comment"></div>
                </div>
            </div>
        </div>
        <div v-else>
            <p>No one has left a comment yet.</p>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['goal'],
        components: {},
        mounted() {
            this.fetchComments()

            this.$root.$on('commentCreated', () => {
                this.fetchComments()
            })
        },
        created() {

        },
        data() {
            return {
                comments: []
            }
        },
        methods: {

            fetchComments() {
                axios.get(route('api.comments.index'), {
                    params: {
                        model_id: this.goal.id,
                        model_type: 'App\\Models\\Goal'
                    }
                })
                .then(({data}) => {
                    this.comments = data
                })
            }
        }
    }
</script>
