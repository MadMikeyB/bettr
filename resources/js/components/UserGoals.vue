<template>
    <div class="box">
        <h2 class="box__title">Goals</h2>
        <div class="box__content">
            <div v-if="goals.length > 0">
                <div data-grid-columns="3">
                    <div class="card" v-for="goal in goals">
                        <div class="card__image">
                            <div class="card__icon">
                                <i class="fas" :class="goal.icon"></i>
                            </div>
                        </div>
                        <div class="card__body">
                            <p><strong class="card__title">{{goal.title}}</strong></p>
                            <p>{{goal.excerpt}}</p>
                            <p class="card__button">
                                <a :href="route('goals.show', goal.slug)" class="button button--small">
                                    Check it out
                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p>{{this.user.name}} hasn't created any goals yet.</p>
            </div>
        </div>
    </div>    
</template>

<script>
    export default {
        props: ['user'],
        components: {},
        mounted() {
            this.fetchGoals()
        },
        created() {

        },
        data() {
            return {
                goals: []
            }
        },
        methods: {
            fetchGoals() {
                axios.get(`/api/profiles/goals/${this.user.slug}`)
                    .then(({data}) => {
                        this.goals = data
                    })
            }
        }
    }
</script>
