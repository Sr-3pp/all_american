<template>
    <button @click="setLike()" class="btn like" :class="{'liked': liked}">
        <icon name="like"></icon>
    </button>
</template>

<script>
export default {
    props: [
        'nid'
    ],
    data () {
        return {
            liked: false
        }
    },
    methods: {
        setLike(){
            const este = this;
            axios.get('/like-new/'+this.nid).then((response) => {
                    este.liked = true
            });
        }
    }
}
</script>
