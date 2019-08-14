<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/mig.jpg" alt="">
            <icon name="welding"></icon>
        </figure>
        <div class="info column header-text">
            <p class="title">
                MIG
            </p>  
            <icon name="estrella4"></icon>
            <p class="text">
                This system, being more versatile, saves time and resources since welding is clean and its application is fast.
            </p>
        </div>
        <figure class="image-list">
            <figure v-animate="'slide-right'">
                <img src="/img/services/mig.svg" alt="">
            </figure>
            <ul class="welding-list">
                <p class="category">More Advantages</p>
                <li class="category">
                    <icon name="star"></icon>
                    No flux is required</li>
                <li class="category">
                    <icon name="star"></icon>
                    No need for cleaning after welding</li>
                <li class="category">
                    <icon name="star"></icon>
                    High quality welding in any position</li>
                <li class="category">
                    <icon name="star"></icon>
                    No sparks or emanations</li>
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
