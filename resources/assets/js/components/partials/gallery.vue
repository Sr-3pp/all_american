<template>
    <section class="gallery" :s-active="active">
        <div class="frame">
            <button class="btn close-btn" @click="$bus.$emit('close-gallery')"><icon name="+"></icon></button>
             <button class="btn prev-btn"><icon name="chevron"></icon></button>
             <figure>
                 <img :src="'/storage/'+picture" alt="">
             </figure>
             <button class="btn next-btn"><icon name="chevron"></icon></button>
             <div class="social-btns">
                 <button class="btn like-btn"><icon name="like"></icon></button>
                 <button class="btn share-btn"><icon name="share"></icon></button>
             </div>
        </div>
    </section>
</template>
<script>
export default {
    mounted(){

    },
    props: ['active', 'picture'],
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>
