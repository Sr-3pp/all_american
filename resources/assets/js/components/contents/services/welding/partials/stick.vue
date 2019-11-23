<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/stick.jpg" alt="">
            <icon name="welding"></icon>
        </figure>
        <div class="info column header-text">
            <p class="title">
                STICK
            </p>  
            <icon name="estrella4"></icon>
            <p class="text">
                Generating an idea and bringing it to reality is what we do, create and define concepts.
            </p>
        </div>
        <figure class="image-list">
            <figure v-animate="'slide-right'">
                <img src="/img/services/stick.svg" alt="">
            </figure>
            <ul class="welding-list">
                <p class="category">More Advantages</p>
                <li class="category">
                    <icon name="star"></icon>
                    It can be welded in any position</li>
                <li class="category">
                    <icon name="star"></icon>
                    Good finish and appearance</li>
                <li class="category">
                    <icon name="star"></icon>
                    Semi-automatic processes</li>
                <li class="category">
                    <icon name="star"></icon>
                    High productivity</li>
            </ul>
        </figure>
    </div>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>
