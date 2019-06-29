<template>
   <div s-desk="faqs">
        <article v-if="newFaq">
                <article>
                    <p>
                        <label>Question</label>
                        <input type="text" class="input" v-model="nfaq.question">
                    </p>
                    <p>
                        <label>Answer</label>
                        <input type="text" class="input" v-model="nfaq.answer">
                    </p>
                    
                    <button class="btn" @click="saveFaq()">Save</button>
                </article>
        </article>
        <ul>
            <li v-for="(f, index) in faqs">
                <div v-if="faqEdit != 'editFaq_' + index">
                    <p class="title">{{f.question}}</p>
                    <p class="text">{{f.answer}}</p>
                    <button class="btn" @click="editFaq(f, index)">Edit</button>
                    <button class="btn" @click="deleteFaq(f.id, index)">Delete</button>
                </div>
                <div v-if="faqEdit == 'editFaq_' + index">
                        <div v-for="(fin, i) in faq">
                            <article v-if="i == 'question' || i == 'answer'" class="form-group">
                                <label>{{i}}</label>
                                <input type="text" class="input" v-model="faq[i]">
                            </article>
                        </div>
                        <button @click="editFaq()" class="btn">Cancel</button>
                        <button @click="updateFaq()" class="btn">Save</button>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('new', ($event) => {
            if($event.section == 5){
                this.newFaq ? this.newFaq = false : this.newFaq = true
            }
        });

        var este = this;
        axios.get('/get-faqs').then((faqs) => {
            este.faqs = faqs.data
        });
    },
    props: [
       
    ],
    data(){
        return {
            faq: false,
            faqEdit: false,
            faqs: [],
           newFaq: false,
           nfaq: {
               question: null,
               answer: null
           }
        }
    },
    methods: {
       saveFaq(){
           var este = this;
           axios.post('/panel/save-faq', this.nfaq).then((faq) => {
               este.faqs.push(faq.data)
               este.newFaq = false
               este.nfaq= {
                    question: null,
                    answer: null
                }
           });
       },
       deleteFaq(id, index){
           if (confirm('delete question?')) {
               var este = this;
               axios.get('/panel/delete-faq/'+id).then((response) => {
                   este.faqs.splice(index, 1)
               });
           }
       },
       editFaq(f, index, i){
          this.faq ? this.faq = false : this.faq = f;
          this.faqEdit ? this.faqEdit = false : this.faqEdit = 'editFaq_'+index;
      },
      updateFaq(){
          var este = this;
                axios.post('/panel/update-faq/'+ this.faq.id, this.faq).then((r) => {
                    este.faq = false;
                    este.faqEdit = false;
                }).catch((e) => {
                    console.log(e);
                });
      },
    }
}
</script>