<template>
  <transition-group tag="div" name="fade" class="row contact-form">
      <form :key="0" v-if="!sent" class="form">
                <article class="group">
                    <label>Name</label>
                    <span class="must" v-if="alerts.name">you must fill this input</span>
                    <input type="text" class="input" placeholder="Name*" v-model="name">
                </article>
                <article class="group">
                    <label>Afair</label>
                    <span class="must" v-if="alerts.afair">you must fill this input</span>
                    <input type="text" class="input" placeholder="Afair" v-model="afair">
                </article>
                <article class="group">
                    <label>Email</label>
                    <span class="must" v-if="alerts.email.status">{{alerts.email.text}}</span>
                    <input type="email" class="input" placeholder="Email*" v-model="email">
                </article>
                <article class="group">
                    <label>Message</label>
                    <span class="must" v-if="alerts.content">you must fill this input <small>(min 80 char)</small></span>
                    <textarea name="name" rows="8" class="input" placeholder="Message*" v-model="content"></textarea>
                </article>
                <article class="group">
                    <p class="legal">By sending this message, you are accepting the <a href="documents/terms_of_use.pdf" target="_blank" class="link">Privacy policy</a>.</p>
                </article>
                <article class="group">
                    <button type="button" class="btn cta" @click="validate()">Send</button>
                </article>
      </form>
      <article :key="1" class="section" v-else>
          <h2>Thanks for writting us</h2>
      </article>
  </transition-group>
</template>

<script>
export default {
  mounted(){

  },
  data(){
    return {
      name: null,
      email: null,
      afair: null,
      content: null,
      sent: false,
      alerts: {
        name: false,
        email: {
            status: false,
            text: 'You must fill this input'
        },
        afair: false,
        content: false
      }
    }
  },
  methods: {
    validate(){
        this.alerts.name = false
        this.alerts.email.status = false
        this.alerts.email.text = 'You must fill this input'
         this.alerts.afair = false
        this.alerts.content = false
        if (this.name && this.afair &&  this.email && this.content.length > 80) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if (re.test(String(this.email).toLowerCase())) {
            this.create()
          }else{
            this.alerts.email.status = true
            this.alerts.email.text = 'Introduce a correct email'
          }
        }else{
          if (!this.name) {
            this.alerts.name = true
          }else if(!this.afair){
            this.alerts.afair = true
            }else if (!this.email) {
            this.alerts.email.status = true
          }else if(this.content.length < 80 && !this.content){
            this.alerts.content = true
          }
        }
      
    },
    create(){
      var este = this,
          formData= new FormData();
          formData.append('name', this.name);
          formData.append('email', this.email);
          formData.append('afair', this.afair);
          formData.append('message', this.content);

          axios.post('/send-contact', formData).then(function(response){
            este.sent = true
          });
    }
  }
}
</script>
