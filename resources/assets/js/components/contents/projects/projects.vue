<template>
<section s-sec="projects" class="main">
    <article v-for="(project, index) in projects">
        <figure>
            <img src="/img/default.jpg" alt="">
        </figure>
        <p>
            {{project.name}}
        </p>
    </article>
</section>
</template>
<script>
export default {
    mounted(){

    },
    props: ['projects'],
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>
