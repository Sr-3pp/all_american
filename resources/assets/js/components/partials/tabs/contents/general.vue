<template>
    <div>
        <article class="card" :key="s.id" v-if="!content && section !== null" v-for="(s, index) in services" @click="showService(s, index)">
            <figure class="img">
                <img :src="s.list[0].img" alt="">
            </figure>
            <p class="text">
                <icon :name="s.icon"></icon>
                {{s.name}}
            </p>
        </article>
        <div class="sub" :key="98" v-if="content">
            <article v-if="!detail" class="headline">
                <icon :name="content.icon"></icon>
                <h1 class="subtitle">{{content.name}}</h1>
                <icon name="star_bar"></icon>
            </article>
            <p v-if="!detail" class="text">
                {{content.description}}
            </p>
            <article v-if="!detail" class="card" v-for="(s, index) in content.list" @click="showContent(s)">
                <figure class="img">
                    <img :src="s.img" alt="">
                </figure>
                <div class="card-content">
                    <p class="category">{{s.name}}</p>
                    <div>
                        <p>
                        {{s.description}}
                        </p>
                        <icon :name="s.icon"></icon>
                    </div>
                </div>
            </article>
            <div v-if="!detail && section == 0">
                <article>

                </article>
                <article>

                </article>
            </div>
            <div class="detail" v-if="detail">
                <article>
                    <div class="header">
                        <figure>
                            <img :src="detail.img" alt="">
                        </figure>
                        <p>
                            <icon :name="detail.icon"></icon>
                        </p>
                    </div>
                    <p class="subtitle">
                        {{detail.name}}
                        <icon name="star_panel1"></icon>
                    </p>  
                    <p class="text">
                        {{detail.description}}
                    </p>
                </article>
                <article class="extra">
                    <div>
                        <p class="subtitle">Fabrication</p>
                        <p class="text">
                            We offer fully customized guard rails
                            and decorative railings to match any
                            aesthetic. From hammered end caps to
                            forged steel caps, pickets and tubing,
                            we can create a railing that will last for
                            years and look amazing. Don't settle
                            on prefabricated pieces that barely fit
                            your home, call the professionals at All
                            American Finishing. We'll customize to
                            your exact specifications.
                        </p>
                    </div>
                    <div>
                        <p class="subtitle"> Process</p>
                        <drop-list :list="list.design" name="design"></drop-list>
                    </div>
                </article>
            </div>
        </div>
        <div :key="99" v-else class="cont">
            <div>
                <h1 class="title">SERVICES OVERVIEW</h1>
                <p class="text">
                    We offer a wide array of metal fabrication services to meet your needs. From customized ornamental pieces, to home or deck metal trim and railings, no job is too big or too small. We work with a large inventory of different materials and can customize them with ease. Whether you're looking for cast iron friezes and valances or decorative sheet metal, we'll meet your needs and exceed your expectations
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
     mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.index
            this.content = this.services[this.section]
        })
    },
    data(){
        return {
            section: false,
            content: false,
            detail: false,
            list: {
                design: {
                    0:{
                        name: 'Additional Services',
                        content: 'El contenido chilo'
                    },
                    1:{
                        name: 'Additional Services',
                        content: 'El contenido chilo'
                    },
                    2:{
                        name: 'Additional Services',
                        content: 'El contenido chilo'
                    }
                }
            }
        }
    },
    props: ['services', 'name'],
    methods: {
        showService(service, index){
            this.content = service
            this.section = index
            this.$bus.$emit('setTab', {index: index});
        },
        showContent(service){
            this.detail = service
        }
    }
}
</script>
