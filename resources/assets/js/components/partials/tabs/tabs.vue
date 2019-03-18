<template>
    <article class="tabs">
        <ul>
            <ol :class="{'active': section === 1}" @click="setTab(1)">
                <p>
                    Design and Planning
                </p>
            </ol>
            <ol :class="{'active': section === 2}" @click="setTab(2)">
                <p>
                    Preparation
                </p>
            </ol>
            <ol :class="{'active': section === 3}" @click="setTab(3)">
                <p>
                    Welding
                </p>
            </ol>
            <ol :class="{'active': section === 4}" @click="setTab(4)">
                <p>
                    Polish
                </p>
            </ol>
            <ol :class="{'active': section === 5}" @click="setTab(5)">
                <p>
                    Paintin
                </p>
            </ol>
            <ol :class="{'active': section === 6}" @click="setTab(6)">
                <p>
                    Delivery
                </p>
            </ol>
        </ul>
    </article>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return {
            section: 1
        }
    },
    methods: {
        setTab(index){
            this.section = index
            this.$bus.$emit('setTab', {index: index});
        }
    }
}
</script>