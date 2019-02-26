<template>
    <section class="navigation" s-mode="half">
        <nav class="content">
            <figure class="brand">
            <img src="/img/default.jpg" alt="Site Brand">
        </figure>
        <ul class="item-list" :class="{'active': active}">
            <li class="item">
                <a class="link" href="#">Muros</a>
            </li>
            <li class="item">
                <a class="link" href="#">Tienda</a>
            </li>
            <li class="item">
                <a class="link" href="#">Contacto</a>
            </li>
        </ul>
        <button @click="active ? active = false : active = true" class="show-menu"><i class="fas fa-bars"></i></button>
        </nav>
    </section>
</template>

<script>
    export default {
        mounted() {
            var este = this
            
        },
        data(){
            return {
                active: false
            }
        }
    }
</script>
