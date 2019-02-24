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

                        <div data-grid-columns="2">
                            <div>
                                <p><i class="fas fa-user"></i> <a :href="route('profiles.show', goal.user.slug)">{{goal.user.name}}</a></p>
                            </div>
                            <div>
                                <p><i class="fas fa-clock"></i> {{moment(goal.created_at).format('Do MMM Y [@] h:mm a')}}</p>
                                <p v-if="goal.closest_target_date"><i class="fas fa-bullseye"></i> {{moment(goal.closest_target_date).format('Do MMM Y [@] h:mm a')}}</p> 
                            </div>
                        </div>

                        <blockquote v-html="goal.description"></blockquote>
                    </div>
                </div>

                <div class="box" style="margin-top: initial;">
                    <div class="box__content">
                        <h2 class="box__title">Targets</h2>
                        <div v-for="target in targets">
                            <div v-if="target.completed_at">
                                <p class="target target--completed">
                                    <a @click="toggleTarget(target)">
                                        <i class="fas fa-check-circle"></i> {{target.title}}
                                    </a>
                                </p>
                            </div>
                            <div v-else>
                                <p class="target">
                                    <a @click="toggleTarget(target)">
                                        <i class="far fa-check-circle"></i> {{target.title}}
                                        <span class="target__complete-by" v-if="target.complete_by">
                                           due {{moment(target.complete_by ,'YYYY-MM-DD HH:mm:ss').fromNow()}}
                                        </span>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="form__group">
                            <div class="target-input">
                                <input type="text" class="form__input" v-model="target.title" @keyup.enter="enterTarget" placeholder="Enter a target...">
                                <div class="form__addon">
                                    <v-date-picker mode='single' :available-dates='{ start: new Date(), end: null }' popoverDirection="left" v-model='target.complete_by'>
                                        <i class="far fa-calendar-alt"></i>
                                    </v-date-picker>
                                </div>
                            </div>
                        </div>
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
    import moment from 'moment'

    export default {
        props: ['goal', 'user'],
        components: {},
        mounted() {
            this.fetchTargets()
        },
        created() {

        },
        data() {
            return {
                showCalendar: false,
                calendarLang: {
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
                    placeholder: {
                        date: 'Select Date',
                        dateRange: 'Select Date Range'
                    }
                },
                targets: [],
                target: {
                    user_id: this.user,
                    goal_id: this.goal.id,
                    title: ''
                }
            }
        },
        methods: {
            fetchTargets() {
                axios.get(route('api.targets.index'), {
                    params: {
                        goal_id: this.goal.id
                    }
                })
                .then(({data}) => {
                    this.targets = data
                    this.target.title = ''
                })
            },
            enterTarget() {
                axios.post(route('api.targets.store'), this.target)
                    .then(({data}) => {
                        this.fetchTargets()
                    })
                    .catch(error => {
                        alert(error)
                    })
            },
            toggleTarget(target) {
                if (target.completed_at) {
                    target.completed_at = null
                } else {
                    target.completed_at = moment().format('YYYY-MM-DD HH:mm:ss')
                }

                axios.patch(route('api.targets.update', target), target)
                    .catch(error => {
                        alert(error)
                    })
            },
            selectDate() {

            }
        }
    }
</script>

<style>

</style>
