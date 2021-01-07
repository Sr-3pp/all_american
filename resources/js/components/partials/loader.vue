<template>
    <section style="display: none;">
        loader
    </section>
</template>
<script>
export default {
    mounted(){
         $(window).on('load', function(){
             console.log('all loaded');
             $('[s-sec=loader]').css('opacity', '0');
             setTimeout(() => {
                 $('[s-sec=loader]').css('display', 'none');
             }, 300);
         });
    },
    data(){
        return{
            ready: false,
        }
    },
    methods:{

    }
}
</script>
