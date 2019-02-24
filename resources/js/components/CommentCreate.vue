<template>
    <div>
        <div v-if="this.user !== 0">
            <div class="form__group">
                <label for="comment" class="form__label">Comment <span class="form__required">*</span></label>
                <div class="quill-wrapper">
                    <quill :config="editorConfig" v-model="data.comment" name="comment" id="comment" v-validate="'required'" output="html"></quill>
                </div>

                <div v-if="errors.first('comment')">
                    <div class="form__errors">
                        <p v-text="errors.first('comment')"></p>
                    </div>
                </div>
            </div>

            <div class="form__submit">
                <a href="#" @click.prevent="handleFormSubmit" class="button">Add Comment</a>
            </div>
        </div>
        <div v-else style="max-width:200px;text-align: center;margin: 0 auto;">
            <a :href="route('register')" class="button">Get Involved Today!</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user', 'goal'],
        components: {},
        mounted() {

        },
        created() {

        },
        data() {
            return {
                data: {
                    user_id: this.user,
                    comment: '',
                    commentable_id: this.goal.id,
                    commentable_type: 'App\\Models\\Goal',
                },
                editorConfig: {
                    theme: 'snow',
                    placeholder: 'What do you think?',
                    scrollingContainer: '.ql-editor',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            ['bold', 'italic', 'underline', 'strike', 'code'],
                            [{ 'align': [] }],
                            ['image', 'video', 'blockquote', 'code-block', 'link'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'indent': '-1'}, { 'indent': '+1' }],
                            [{ 'color': [] }, { 'background': [] }],
                            ['clean']
                        ],
                    },
                },
            }
        },
        methods: {
            handleFormSubmit() {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(`${window.Bettr.homeUrl}/api/comments`, this.data)
                            .then(({data}) => {
                                this.$root.$emit('commentCreated', data)
                                this.data.comment = ''
                                let element = document.getElementsByClassName('ql-editor');
                                element[0].innerHTML = '';
                            })
                            .catch(error => {
                                alert(error)
                            })
                    } else {
                        this.hasErrors = true
                    }
                });
            }
        }
    }
</script>

