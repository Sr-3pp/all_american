<template>
    <div class="full-section separator">
            <p class="title">Good</p>
            <p class="stars">
                <span @mouseover="setStars(s)" @mouseout="resetStars()" @click="addStars(s)" :class="{'active': grade >= s || valoration.grade >= s}" v-for="s in 5"><icon name="star"></icon></span>
            </p>
            <p class="text">
                For us, your opinion is the most important, tell us what do you think about our service and how we could improve it.
            </p>
            <div class="row contact-form">
            <form :key="0" v-if="!sent" class="form">
                <article class="group">
                    <label>Name</label>
                    <span class="must" v-if="alerts.name">you must fill this input</span>
                    <input type="text" class="input" placeholder="Name*" v-model="valoration.name">
                </article>
                <article class="group">
                    <label>Afair</label>
                    <span class="must" v-if="alerts.afair">you must fill this input</span>
                    <input type="text" class="input" placeholder="Afair" v-model="valoration.afair">
                </article>
                <article class="group">
                    <label>Email</label>
                    <span class="must" v-if="alerts.email.status">{{alerts.email.text}}</span>
                    <input type="email" class="input" placeholder="Email*" v-model="valoration.email">
                </article>
                <article class="group">
                    <label>Message</label>
                    <span class="must" v-if="alerts.content">you must fill this input</span>
                    <textarea name="name" rows="8" class="input" placeholder="Message*" v-model="valoration.content"></textarea>
                </article>
                <article class="group">
                    <button type="button" class="btn" @click="validate()">Send</button>
                </article>
            </form>
            <article class="section" v-else>
                <h2>Thanks for writting us</h2>
            </article>
        </div>
        </div>
</template>
<script>
export default {
    mounted() {

    },
    data(){
        return {
            grade: null,
            sent: false,
            valoration: {
                name: null,
                afair: null,
                email: null,
                content: null,
                grade: false
            },
            alerts: {
                name: false,
                afair: false,
                email: false,
                content: false
            }
        }
    },
    methods: {
        setStars(index){
            if(!this.valoration.grade){
                this.grade = index
            }
        },
        resetStars(index){
            if(!this.valoration.grade){
                this.grade = 0;
            }
        },
        addStars(){
            this.valoration.grade = this.grade
        },
        validate(){

        },
        saveValidation(){

        }
    }
}
</script>

