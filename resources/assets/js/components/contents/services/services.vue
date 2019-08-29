<template>
    <section s-sec="services" class="main" :class="{'active': active}">
        <design-planning :materials="materials" :mills="mills" v-if="!active || active == 1" :active="active == 1 ? true : false"></design-planning>
        <preparation :mills="mills" v-if="!active || active == 2" :active="active == 2 ? true : false"></preparation>
        <welding  v-if="!active || active == 3" :active="active == 3 ? true : false"></welding>
        <finishes :finishes="finishes" v-if="!active || active == 4" :active="active == 4 ? true : false"></finishes>
        <painting :paints="paints"  v-if="!active || active == 5" :active="active == 5 ? true : false"></painting>
        <delivery  v-if="!active || active == 6" :active="active == 6 ? true : false"></delivery>
        <article class="text" v-if="!active">
            <p class="title">
                SERVICES OVERVIEW
            </p>
            <p class="text">
                We offer a wide array of <b>metal fabrication</b> services to meet your needs. From customized ornamental pieces, to home or deck metal trim and railings, <b>no job is too big or too small</b>. We work with a large inventory of different materials and can customize them with ease. Whether you're looking for cast iron friezes and valances or decorative sheet metal, we'll meet your needs and exceed your expectations
            </p>
        </article>
    </section>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.active = $event.section
        });
        if(this.sec == 'design-and-planning'){
            this.active = 1
        }else if(this.sec == 'preparation'){
            this.active = 2
        }else if(this.sec == 'welding'){
            this.active = 3
        }else if(this.sec == 'finishes'){
            this.active = 4
        }else if(this.sec == 'painting'){
            this.active = 5
        }else if(this.sec == 'delivery'){
            this.active = 6
        }
        var este = this;
        $('.overlay').click(function(){
            var self = $(this);
            self.attr('s-active', false);
            este.$bus.$emit('modal');
        });
        
    },
    props: ['materials', 'finishes', 'mills', 'sec', 'paints'],
    data(){
        return{
            active: false
        }
    },
    methods: {

    }
}
</script>

