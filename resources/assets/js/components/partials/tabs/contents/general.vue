<template>
    <div>
        <article class="card" :key="s.id" v-if="!content && section !== null" v-for="(s, index) in services" @click="showService(s, index)">
            <figure class="img">
                <img :src="s.sections[0].img" alt="">
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
            <article v-if="!detail" class="card" v-for="(s, i) in content.sections" @click="showContent(s)">
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
            
            <div v-if="!detail">
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
                        <ul class="list">
                            <li>
                                <icon name="ok"></icon>
                                Decorative Places
                            </li>
                            <li>
                                <icon name="ok"></icon>
                                Custom Fabrication
                            </li>
                            <li>
                                <icon name="ok"></icon>
                                Rails
                            </li>
                            <li>
                                <icon name="ok"></icon>
                                Trims
                            </li>
                            <li>
                                <icon name="ok"></icon>
                                Gates
                            </li>
                            <li>
                                <icon name="ok"></icon>
                                Doors
                            </li>
                            <li>
                                <icon name="ok"></icon>
                                Fence
                            </li>
                        </ul>
                    </div>
                    <div>
                        <p class="subtitle"> Process</p>
                        <drop-list :list="list.design" name="general"></drop-list>
                    </div>
                </article>
            </div>

            <div class="detail" v-if="detail">
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
                        {{detail.content}}
                        <icon name="star_panel2"></icon>
                    </p>
                    <ul class="list" v-if="detail.lists" v-for="(l, i) in detail.lists">
                        <li v-for="(item, index) in l">
                            <p class="subtitle">
                                <icon name="material"></icon>
                                {{item.name}}
                            </p>
                            <p class="text">
                                {{item.content}}
                            </p>
                            <figure>
                                <img :src="item.img" alt="">
                            </figure>
                        </li>
                    </ul>
                    <wizzard v-if="detail.name.toLowerCase() == 'estimate'"></wizzard>
                    <article v-if="detail.subsections" v-for="(sub, index) in detail.subsections">
                        <p class="title">
                            {{sub.name}}
                        </p>
                        <p class="text">
                            {{sub.content}}
                        </p>
                        <div class="tables" v-if="sub.table" v-for="(t, ind) in sub.table">
                            <p class="category">    
                                {{t.material}}
                            </p>
                            <table class="gauges">
                                <thead>
                                    <tr>
                                        <th>Gauge</th>
                                        <th>Thikness</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(g) in  t.gauges">
                                        <td>{{g.gauge}}</td>
                                        <td>{{g.thick}}"</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="s-text">
                                .125" is plate
                            </p>
                        </div>
                        <div class="lists" v-if="sub.lists" v-for="(l, ind) in sub.lists">
                            <p class="title">{{l.name}}</p>
                            <p class="text">{{l.content}}</p>
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
            this.detail = false
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
            this.detail = false
            this.content = service
            this.section = index
            this.$bus.$emit('setTab', {index: index});
        },
        showContent(service){
            console.log(service);
            
            this.detail = service
        }
    }
}
</script>
