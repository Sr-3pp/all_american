<template>
    <div>
        <article>
            <figure>
                <img src="/img/default.jpg" alt="">
            </figure>
            <p>
                <icon name="planning"></icon>
                Preparation
            </p>
        </article>
        <article v-if="active">
            <div class="headline">
                <icon :name="planning"></icon>
                <h1 class="subtitle">Preparation</h1>
                <icon name="star_bar"></icon>
            </div>
        </article>
    </div>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return {
            active: false
        }
    },
    methods: {

    }
}
</script>
