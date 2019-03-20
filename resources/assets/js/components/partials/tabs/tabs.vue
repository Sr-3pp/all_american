<template>
    <article class="tabs">
        <ul>
            <ol :class="{'active': section === 1}" @click="setTab(1)">
<<<<<<< HEAD
                <icon name="planning"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
                <p>
                    Design and Planning
                </p>
            </ol>
            <ol :class="{'active': section === 2}" @click="setTab(2)">
<<<<<<< HEAD
                <icon name="preparation"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
                <p>
                    Preparation
                </p>
            </ol>
            <ol :class="{'active': section === 3}" @click="setTab(3)">
<<<<<<< HEAD
                <icon name="welding"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
                <p>
                    Welding
                </p>
            </ol>
            <ol :class="{'active': section === 4}" @click="setTab(4)">
<<<<<<< HEAD
                <icon name="polish"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
                <p>
                    Polish
                </p>
            </ol>
            <ol :class="{'active': section === 5}" @click="setTab(5)">
<<<<<<< HEAD
                <icon name="painting"></icon>
                <p>
                    Painting
                </p>
            </ol>
            <ol :class="{'active': section === 6}" @click="setTab(6)">
                <icon name="delivery"></icon>
=======
                <p>
                    Paintin
                </p>
            </ol>
            <ol :class="{'active': section === 6}" @click="setTab(6)">
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
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