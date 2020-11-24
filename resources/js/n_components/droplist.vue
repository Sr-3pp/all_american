<template>
    <ul class="droplist">
        <slot name="items" :active="showContent" :actived="open">
            <li v-for="(item, i) in items" :key="i+1">
                    {{item}}
            </li>
        </slot>
    </ul>
</template>

<style lang="scss">
    .droplist{
        $self: &;
        display: flex;
        flex-direction: column;
        list-style: none;
        padding: 0;
        &-item{
            width: 100%;
            color: #595a5c;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-bottom-color: currentColor;
            padding: .5rem 0!important;
            &.active{
                #{$self}-content{
                    max-height: 100vh;
                    opacity: 1;
                }
                .description{
                    button{
                        transform: rotate(90deg);
                        svg{
                                background-color: transparent!important;
                                fill: #8b181a!important;
                                padding: 0!important;
                        }
                    }
                }
            }
            .description{
                display: flex;
                align-items: center;
                >svg{
                    width: 1rem;
                    height: 1rem;
                    fill: #595a5c;
                }
                button{
                    margin-left: auto;
                    color: #FFF;
                    background-color: transparent;
                    padding: 0!important;
                    svg{
                        fill: currentColor;
                        width: 1.5rem;
                        height: 1.5rem;
                        padding: 5px;
                        background: #595a5c;
                        color: #fff;
                        border-radius: 5px;
                        -webkit-transform: rotate(-90deg);
                        transform: rotate(-90deg);
                    }
                }
            }
        }

        &-content{
            width: 100%;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all .35s ease;
        }
    }
</style>

<script>
export default {
    mounted() {
        this.$bus.$on('setTabContent', () => {
            this.open= 0;
        })
    },
    props: {
        items: {
            type: Array,
            default: () => []
        }
    },
    data(){
        return {
            open: 0
        }
    },
    methods: {
        showContent(i, item){
            this.open = i 
            console.log(item);

            this.$bus.$emit('setServiceImg', {img: item})
        }
    }
}
</script>