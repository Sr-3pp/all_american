<template>
    <article class="tabs full-section">
        <ul>
            <ol v-for="(s, index) in services" :class="{'active': section === index}" @click="setTab(s, index)">
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
        setTab(s, i){
            this.section = i
            if(this.name == 'home'){  	
                if(this.section == 0){
                    this.$bus.$emit('setImg', {img: '/img/services/service_1.jpg', list: s.list});
                }else if(this.section == 1){
                    this.$bus.$emit('setImg', {img: '/img/services/service_2.jpg', list: s.list});
                }else if(this.section == 2){
                    this.$bus.$emit('setImg', {img: '/img/services/service_3.jpg', list: s.list});
                }else if(this.section == 3){
                    this.$bus.$emit('setImg', {img: '/img/services/service_4.jpg', list: s.list});
                }else if(this.section == 4){
                    this.$bus.$emit('setImg', {img: '/img/services/service_5.jpg', list: s.list});
                }else if(this.section == 5){
                    this.$bus.$emit('setImg', {img: '/img/services/service_6.jpg', list: s.list});
                }
            }
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("[s-sec=services]").offset().top / 2)
            }, 500);
        }
    }
}
</script>
