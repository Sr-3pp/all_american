<template>
    <section class="gallery" :s-active="active">
        <div class="frame">
            <button class="btn close-btn" @click="$bus.$emit('close-gallery')"><icon name="+"></icon></button>
             <button class="btn prev-btn" @click="$bus.$emit('prevPic')"><icon name="chevron"></icon></button>
             <figure>
                 <img :src="'/storage/'+picture" alt="">
             </figure>
             <button class="btn next-btn" @click="$bus.$emit('nextPic')"><icon name="chevron"></icon></button>
             <div class="social-btns">
                 <button class="btn like-btn"><icon name="like"></icon></button>
                 <social-sharing class="btn" url="https://allamericanfinishing.com/projects"
                                            title="Projects - All American Finishing"
                                            description="Take a look to All American Finishing Projects"
                                            quote="All amerian finishing projects"
                                            hashtags="allamericanfinishing, building, finishes, polish, angles"
                                            inline-template>
                        <div>
                            <network network="facebook">
                                <icon name="share"></icon>
                            </network>
                        </div>
                </social-sharing>
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
