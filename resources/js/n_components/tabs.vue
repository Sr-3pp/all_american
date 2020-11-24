<template>
    <section class="tabs">
        <ul class="tabs-buttons">
            <slot name="items" :active="activeItem" :actived="activeI">
                <li  v-for="(item, i) in items" :key="i+1">
                    {{item}}
                </li>
            </slot>
        </ul>

        <slot name="contents" :active="activeC">
            <div class="tabs-content" v-for="(content, i) in contents" :key="i+1">
                {{content}}
            </div>
        </slot>
    </section>
</template>
<style lang="scss" scoped>
    .tabs{
        $self: &;
        width: 100%;
        &.no-buttons{
            #{$self}-buttons{
                display: none;
            }
        }
        &-buttons{
            list-style: none;
            display: flex;
            margin-bottom: unit(20);
            padding: 0;
            border-bottom: {
                style: solid;
                color: #eee;
                width: 1px;
            }
            li{
                padding: unit(10);
            }
        }
        >*:not(#{$self}-buttons){
            width: 100%;
            padding: {
                right: unit(10);
                left: unit(10);
            }
        }
    }
</style>
<script>
export default {
    mounted() {
        this.$bus.$on('setTabContent', ($event) => {
            this.activeI = this.activeC = 'item_'+$event.index
        })
    },
    props: {
        items: {
            type: Array,
            default: () => []
        },
        contents: {
            type: Array,
            default: () => []
        }
    },
    data(){
        return {
            activeI: 'item_0',
            activeC: 'item_0'
        }
    },
    methods: {
        activeItem(i){
            this.activeI = 'item_'+i 
            this.activeC = this.activeI; 
        }
    }
}
</script>
