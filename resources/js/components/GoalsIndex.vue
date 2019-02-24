<template>
    <div class="box">
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
        </div>
    </div>    
</template>

<script>
    export default {
        props: [],
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
                axios.get(`/api/goals`, {
                    params: {
                        orderBy: 'latest'
                    }
                })
                    .then(({data}) => {
                        this.goals = data
                    })
            }
        }
    }
</script>
