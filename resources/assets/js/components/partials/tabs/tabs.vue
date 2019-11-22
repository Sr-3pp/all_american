<template>
    <article class="tabs full-section">
        <ul>
            <ol v-for="(s, index) in services" :class="{'active': section === index}" @click="setTab(index)">
                <icon :name="s.icon"></icon>
                <p>
                    {{s.name}}
                </p>
            </ol>
        </ul>
    </article>
</template>
<script>
export default {
    mounted(){
        if(this.name === 'home'){
            this.section = 0
        }
        
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.index
        })
    },
    props: [
        'services', 'name'
    ],
    data(){
        return {
            section: false
        }
    },
    methods: {
        setTab(index){
            this.section = index
            if(this.name == 'home'){
                if(this.section == 0){
                    this.$bus.$emit('setImg', {img: '/img/services/concept.jpg'});
                }else if(this.section == 1){
                    this.$bus.$emit('setImg', {img: '/img/services/preparation_card.jpg'});
                }else if(this.section == 2){
                    this.$bus.$emit('setImg', {img: '/img/services/welding_card.jpg'});
                }else if(this.section == 3){
                    this.$bus.$emit('setImg', {img: '/img/services/polish_cards.jpg'});
                }else if(this.section == 4){
                    this.$bus.$emit('setImg', {img: '/img/services/painting_card.jpg'});
                }else if(this.section == 5){
                    this.$bus.$emit('setImg', {img: '/img/services/delivery_card.jpg'});
                }
            }
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("[s-sec=services]").offset().top / 2)
            }, 500);
        }
    }
}
</script>