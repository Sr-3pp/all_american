<template>
    <form>
        <fieldset>
            <div class="form-group">
                <label>
                    Name
                </label>
                <input type="text" placeholder="Eg: John Titor" class="input" v-model="name" />
            </div>
            <div class="form-group">
                <label>
                    Email
                </label>
                <input type="email" placeholder="Eg: john.titor@mail.com" class="input" v-model="email" />
            </div>
            <div class="form-group">
                <label>
                    Message
                </label>
                <textarea type="email" placeholder="Write your message here" class="input" v-model="message"></textarea>
            </div>
        </fieldset>
        <button @click="validate" class="btn">
            Send
        </button>
    </form>
</template>

<script>
export default {
    props: [
        'nid'
    ],
    data () {
        return {
            name: null,
            email: null,
            message: null,
            errors: []
        }
    },
    methods: {
        validate($e) {
            $e.preventDefault();
            this.errors = [];

            if (!this.name) {
                this.errors.push("You must fill this field.");
            }
            if (!this.email) {
                this.errors.push('You must fill this field.');
            } else if (!this.validEmail(this.email)) {
                this.errors.push('Please enter a valid email.');
            }

            if (!this.message) {
                this.errors.push("You must place a message.");
            }

            if (!this.errors.length) {
                this.setComment();
            }else{
                console.log(this.errors);
            }
        },
        validEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        setComment(){
            const este = this;
            const data = {}

            data.article_id = this.nid;
            data.comment = JSON.stringify(
                {
                    name: this.name,
                    email: this.email,
                    message: this.message
                }
            );

            axios.post('/set-comment', data).then(function(response){
                    console.log(response.data);
            });
        }
    }
}
</script>