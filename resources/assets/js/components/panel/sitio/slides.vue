<template>
    <div s-desk="slides">
        <ul>
            <ol>
                <figure>
                    <img src="/img/default.jpg" alt="">
                    <p class="caption">
                        <span class="title">
                            Si que si
                        </span>
                        <span class="text">
                            Vola volar
                        </span>
                    </p>
                </figure>
                <article>
                    <button class="btn">Delete</button>
                    <button class="btn">Edit</button>
                    <button class="btn">Caption</button>
                </article>
            </ol>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        axios.get('7panel/get-slides').then((slides) => {
            console.log(slides);
            
        });
    },
    props: [
       
    ],
    data(){
        return {
           
        }
    },
    methods: {
       
    }
}
</script>