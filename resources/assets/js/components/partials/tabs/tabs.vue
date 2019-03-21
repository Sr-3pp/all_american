<template>
    <article class="tabs">
        <ul>
            <ol :class="{'active': section === 1}" @click="setTab(1)">
                <icon name="planning"></icon>
                <p>
                    Design and Planning
                </p>
            </ol>
            <ol :class="{'active': section === 2}" @click="setTab(2)">
                <icon name="preparation"></icon>
                <p>
                    Preparation
                </p>
            </ol>
            <ol :class="{'active': section === 3}" @click="setTab(3)">
                <icon name="welding"></icon>
                <p>
                    Welding
                </p>
            </ol>
            <ol :class="{'active': section === 4}" @click="setTab(4)">
                <icon name="polish"></icon>
                <p>
                    Finishes
                </p>
            </ol>
            <ol :class="{'active': section === 5}" @click="setTab(5)">
                <icon name="painting"></icon>
                <p>
                    Painting
                </p>
            </ol>
            <ol :class="{'active': section === 6}" @click="setTab(6)">
                <icon name="delivery"></icon>
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