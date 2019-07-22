<template>
    <article class="subscribe form">
        <h2 class="category">Subscribe to our newsletter</h2>
        <div v-if="!done && !error.status" class="form-group">
            <span v-if="alert" class="must">{{error.message}}</span>
            <input class="input" type="email" v-model="email" placeholder="Your Email">
            <button class="btn" @click="subscribe()">Subscribe</button>
        </div>
        <div class="success" v-if="done && !error.status">
            Thanks
        </div>
        <div class="error" v-if="!done && error.status">
            {{error.message}}
        </div>
    </article>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return {
            email: null,
            done: false,
            re: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            error: {
                status: false,
                message: null
            },
            alert: false
        }
    },
    methods: {
        subscribe(){
            var este = this;
            this.alert = false;
            if(this.re.test(this.email)){
                axios.post('/subscribe', {email: this.email}).then(response => {
                    if(response.data == 1){
                        este.done = true
                    }else{
                         este.error.status = true;
                        este.error.message = 'You are already registered';
                    }
                }).catch(e => {
                    este.error.status = true;
                    este.error.message = e.message;
                });
            }else{
                this.error.message = 'Verify your email';
                this.alert = true;
            }
        }
    }
}
</script>

