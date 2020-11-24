<template>
    <div class="full-section separator">
                <p class="title" v-if="grade == 5 || valoration.grade == 5">Excellent</p>
                <p class="title" v-if="grade == 4 || valoration.grade == 4">Good</p>
                <p class="title" v-if="grade == 3 || valoration.grade == 3">Regular</p>
                <p class="title" v-if="grade == 2 || valoration.grade == 2">Bad</p>
                <p class="title" v-if="grade == 1 || valoration.grade == 1">The worst</p>
                <p class="title" v-if="grade == null">Rank us</p>
            <p class="stars">
                <span @mouseover="setStars(s)" @mouseout="resetStars()" @click="addStars(s)" :class="{'active': grade >= s || valoration.grade >= s}" v-for="s in 5"><icon name="star"></icon></span>
            </p>
            <p class="text">
                For us, your opinion is the most important, tell us what do you think about our service and how we could improve it.
            </p>
            <div class="row contact-form">
            <form v-if="!sent" class="form">
                <article class="group">
                    <label :class="{'active': valoration.name != ''}">Name*</label>
                    <span class="must" v-if="alerts.name">you must fill this input</span>
                    <input type="text" class="input" v-model="valoration.name">
                </article>
                <article class="group">
                    <label :class="{'active': valoration.title != ''}">Affair*</label>
                    <span class="must" v-if="alerts.title">you must fill this input</span>
                    <input type="text" class="input" v-model="valoration.title">
                </article>
                <article class="group">
                    <label :class="{'active': valoration.email != ''}">Email*</label>
                    <span class="must" v-if="alerts.email.status">{{alerts.email.text}}</span>
                    <input type="email" class="input" v-model="valoration.email">
                </article>
                <article class="group">
                    <label :class="{'active': valoration.review != ''}">Message*</label>
                    <span class="must" v-if="alerts.review">you must fill this input</span>
                    <textarea name="name" rows="8" class="input" v-model="valoration.review"></textarea>
                </article>
                <article class="group">
                    <button type="button" class="btn cta" @click="validate()">Send</button>
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
                name: '',
                title: '',
                email: '',
                review: '',
                grade: false
            },
            alerts: {
                name: false,
                title: false,
                valoration: false,
                review: false,
                email: {
                    status: false,
                    text: 'You must fill this input'
                },
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
                this.grade = null;
            }
        },
        addStars(){
            if(!this.sent){
                this.valoration.grade ? this.valoration.grade = false : this.valoration.grade = this.grade
                if(!this.valoration.grade){
                    this.grade = 0;
                }
            }
        },
        validate(){
            this.alerts= {
                name: false,
                title: false,
                valoration: false,
                review: false,
                email: {
                    status: false,
                    text: 'You must fill this input'
                }
            }
            if(this.valoration.name && this.checkMail(this.valoration.email) && this.valoration.grade && this.valoration.title){
                this.saveValidation();
            }else{
                if(!this.valoration.name){
                    this.alerts.name = true;
                }
                if(!this.checkMail(this.valoration.email)){
                    this.alerts.email.status = true;
                }
                if(!this.valoration.grade){
                    this.alerts.valoration = true
                }
                if(!this.valoration.title){
                    this.alerts.title = true
                }
            }
        },
        saveValidation(){
            var este = this;
            axios.post('/save-valoration', this.valoration).then((response) => {
                este.sent = true;
            });
        },
        checkMail(email){
             var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(email !== null){
                if (re.test(String(email).toLowerCase())) {
                    return true;
                }else{
                    this.alerts.email.text = 'verify your email'
                    return false;
                }
            }
        }
    }
}
</script>

