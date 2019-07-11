<template>
    <section class="section">
        <article>
            <p class="title">{{activeSection}}</p>
            <button v-if="!addBtn" class="btn" @click="setNew()">Add <icon name="+"></icon></button>
            <button v-else class="btn" @click="setNew()">Cancel <icon name="-"></icon></button>
        </article>
        <ul class="panel-tabs" v-if="active == 1">
            <li :class="{'active': section == 0}" @click="setSec(0)">Slides</li>
            <li :class="{'active': section == 1}" @click="setSec(1)">Projects</li>
            <li :class="{'active': section == 2}" @click="setSec(2)">Materials</li>
            <li :class="{'active': section == 3}" @click="setSec(3)">Finishes</li>
            <li :class="{'active': section == 4}" @click="setSec(4)">Mills</li>
            <li :class="{'active': section == 5}" @click="setSec(5)">FAQS</li>
            <li :class="{'active': section == 6}" @click="setSec(6)">Skills</li>
            <li :class="{'active': section == 7}" @click="setSec(7)">Painting</li>
        </ul>
        <transition-group name="fade" tag="div">
            <inbox :key="0" v-if="active == 0"></inbox>
            <sitio :key="1" v-if="active == 1"></sitio>
            <categories :key="2" v-if="active == 2"></categories>
            <votes :key="3" v-if="active == 3"></votes>
            <news :key="4" v-if="active == 4"></news>
        </transition-group>
    </section>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('setPanel', ($event) => {
            this.addBtn = false;
            this.active = $event.section;
            if(this.active == 0){
               this.activeSection = 'Inbox'
           }else if(this.active == 1){
               this.activeSection = 'Site'
           }else if(this.active == 2){
               this.activeSection = 'Categories'
           }else if(this.active == 3){
               this.activeSection = 'Votes'
           }else if(this.active == 4){
               this.activeSection = 'News'
           }
        });
    },
    props: [
       
    ],
    data(){
        return {
           active: 1,
           section: 0,
           addBtn: false,
           activeSection: 'Site'
        }
    },
    methods: {
       setSec(index){
           this.section = index;
           this.addBtn = false;
           this.$bus.$emit('setSec', {section: index});
       },
       setNew(){
           this.addBtn ? this.addBtn = false : this.addBtn = true
           this.$bus.$emit('new', {section: this.section});
       }
    }
}
</script>