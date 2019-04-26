<template>
    <nav class="full-section" s-sec="navigation">
        <figure class="brand">
            <img :src="logo" alt="Site Brand">
        </figure>
        <ul class="item-list" :class="{'active': active}">
            <li class="item">
                <a class="link" href="/">Home</a>
            </li>
            <li class="item">
                <a class="link" href="/services">Services</a>
            </li>
            <li class="item">
                <a class="link" href="/projects">Projects</a>
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
            var este = this;
            window.onscroll = function() {este.sticky()};
            
            if(this.name === 'general'){
                this.logo = '/img/svg/logo.svg'
            }
            
        },
        props: [
            'name'
        ],
        data(){
            return {
                active: false,
                logo: '/img/svg/logo_bn.svg'
            }
        },
        methods: {
            sticky(){
                var este = this,
                navbar = $("nav")[0],
                sticky = navbar.offsetTop;

                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("on-top")
                    este.logo = '/img/svg/logo.svg'
                } else {
                    navbar.classList.remove("on-top");
                    if(this.name === 'home'){
                        este.logo = '/img/svg/logo_bn.svg';
                    }
                }
            }
        }
    }
</script>
