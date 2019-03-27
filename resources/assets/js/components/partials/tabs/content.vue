<template>
    <transition-group s-sec="services" tag="section" class="tab-content full-section">
        <article :key="1" v-if="section === 1">
            <drop-list :list="list"></drop-list>
        </article>
        <article :key="2" v-if="section === 2">
            <ul class="service-list drop-list">
                <li>
                    <icon name="like"></icon>
                        Concept
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Planning
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Material
                    <icon name="like"></icon>
                </li>
            </ul>
        </article>
        <article :key="3" v-if="section === 3">
            <ul class="service-list drop-list">
                <li>
                    <icon name="like"></icon>
                        Concept
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Planning
                    <icon name="like"></icon>
                </li>
            </ul>
        </article>
        <article :key="4" v-if="section === 4">
            <ul class="service-list drop-list">
                <li>
                    <icon name="like"></icon>
                        Concept
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Planning
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Material
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Horientation
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Original Designs
                    <icon name="like"></icon>
                </li>
            </ul>
        </article>
        <article :key="5" v-if="section === 5">
            <ul class="service-list drop-list">
                <li>
                    <icon name="like"></icon>
                        Concept
                    <icon name="like"></icon>
                </li>
            </ul>
        </article>
        <article :key="6" v-if="section === 6">
            <ul class="service-list drop-list">
                <li>
                    <icon name="like"></icon>
                        Concept
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Planning
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Material
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Horientation
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Original Designs
                    <icon name="like"></icon>
                </li>
                <li>
                    <icon name="like"></icon>
                        Estimate
                    <icon name="like"></icon>
                </li>
            </ul>
        </article>
        <img :key="7" src="/img/default.jpg" width="20%" alt="">
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.index
        });
    },
    props: [
        'list'
    ],
    data(){
        return {
            section: 1
        }
    },
    methods: {

    }
}
</script>