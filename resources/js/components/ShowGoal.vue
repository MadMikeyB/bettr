<template>
    <section class="single-goal">
        <div class="single-goal__flex-container">
            
            <div class="icon-box">
                <div class="icon-box__icon icon-box__icon--alt icon-box__icon--large">
                    <i :class="`fas ${goal.icon}`"></i>  
                </div>
            </div>

            <div data-grid-columns="2">
                <div class="box">
                    <div class="box__content">
                        <h2 class="box__title">Goal Information</h2>
                        <p><i class="fas fa-user"></i> Goal created by {{goal.user.name}}</p>
                        <p><i class="fas fa-goal"></i> Goal created {{goal.created_at}}</p>
                        <p><i class="fas fa-clock"></i> Days until next target {{goal.created_at}}</p>
                        <div v-html="goal.description"></div>
                    </div>
                </div>

                <div class="box" style="margin-top: initial;">
                    <div class="box__content">
                        <h2 class="box__title">Targets</h2>


                    </div>
                </div>

            </div>

            <div class="box" style="margin-top: 4rem;">
                <h2 class="box__title">Comments</h2>
                <div class="box__content">
                    <comment-list :goal="this.goal"></comment-list>

                    <comment-create :user="this.user" :goal="this.goal"></comment-create>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['goal', 'user'],
        components: {},
        mounted() {

        },
        created() {

        },
        data() {
            return {
                editing: false,
            }
        },
        methods: {

        }
    }
</script>

<style>

</style>
