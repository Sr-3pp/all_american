<template>
    <nav class="full-section" s-sec="navigation">
        <figure class="brand">
            <img src="/img/svg/logo_bn.svg" alt="Site Brand">
        </figure>
        <ul class="item-list" :class="{'active': active}">
            <li class="item">
                <a class="link" href="#">Home</a>
            </li>
            <li class="item">
                <a class="link" href="#">Services</a>
            </li>
            <li class="item">
                <a class="link" href="#">Projects</a>
            </li>
            <li class="item">
                <a class="link" href="#">About us</a>
            </li>
            <li class="item">
                <a class="link" href="#">Contact Us</a>
            </li>
        </ul>
        <button @click="active ? active = false : active = true" class="show-menu"><i class="fas fa-bars"></i></button>
    </nav>
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
