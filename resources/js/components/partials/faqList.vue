<template>
    <ul class="faq-list">
        <li @click="active ? active = false : active = 'faq_'+index" v-for="(f, index) in faqs" :class="{'active': active == 'faq_'+index}">
            <article>
                <p class="text question">
                    {{f.question}}
                </p>
                <p class="text answer">
                    {{f.answer}}
                </p>
            </article>
            <icon name="boton-v"></icon>
        </li>
    </ul>
</template>
<script>
export default {
    mounted(){
        console.log(this.faqs);
        
    },
    props: [
        'faqs'
    ],
    data(){
        return{
            active: false
        }
    },
    methods: {

    }
}
</script>