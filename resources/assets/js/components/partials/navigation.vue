<template>
    <nav class="full-section" s-sec="navigation">
        <figure class="brand">
            <img :src="logo" alt="Site Brand">
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
            window.onscroll = function() {myFunction()};

            // Get the navbar
            var navbar = $("nav")[0];

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("on-top")
                    este.logo = '/img/svg/logo.svg'
                } else {
                    navbar.classList.remove("on-top");
                    este.logo = '/img/svg/logo_bn.svg';
                }
            }
            
        },
        data(){
            return {
                active: false,
                logo: '/img/svg/logo_bn.svg'
            }
        }
    }
</script>
