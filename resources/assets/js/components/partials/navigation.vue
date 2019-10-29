<template>
    <nav class="full-section" s-sec="navigation">
        <a href="/" class="brand">
            <img :src="logo" alt="Site Brand">
        </a>
        <button @click="active ? active = false : active = true" class="toggle-btn btn"><icon name="burger"></icon></button>
        <ul class="item-list" :class="{'active': active}">
            <li class="close-menu item" @click="active ? active = false : active = true">
                <a type="button" href="#" class="link"><icon name="chevron"></icon></a>
            <li class="item" :class="{'active': section == 'home'}">
                <a class="link" href="/">Home</a>
            </li>
            <li class="item" :class="{'active': section == 'services'}">
                <a class="link" href="/services">Services</a>
                <ul class="sub-nav">
                   <li>
                       <a href="/services/design-and-planning">Design and planning</a>
                    </li> 
                   <li>
                       <a href="/services/preparation">Preparation</a>
                    </li> 
                   <li>
                       <a href="/services/welding">Welding</a>
                    </li> 
                   <li>
                       <a href="/services/finishes">Finishes</a>
                    </li> 
                   <li>
                       <a href="/services/painting">Painting</a>
                    </li> 
                   <li>
                       <a href="/services/delivery">Delivery</a>
                    </li> 
                </ul>
            </li>
            <li class="item" :class="{'active': section == 'projects'}">
                <a class="link" href="/projects">Projects</a>
            </li>
            <li class="item" :class="{'active': section == 'about'}">
                <a class="link" href="/about-us">About us</a>
                <ul class="sub-nav">
                   <li>
                       <a href="/about-us">Who we are?</a>
                    </li> 
                   <li>
                       <a href="/about-us/join-us">Join our team</a>
                    </li> 
                   <li>
                       <a href="/last-news">Last news</a>
                    </li> 
                </ul>
            </li>
            <li class="item" :class="{'active': section == 'contact'}">
                <a class="link" href="/contact-us">Contact Us</a>
            </li>
        </ul>
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
            'name', 'section'
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
                navbar = $("nav:first"),
                headerh = $("header:first");
               
                
                 if (navbar.offset().top > headerh.innerHeight()) {
                    navbar.addClass("on-top")
                    este.logo = '/img/svg/logo.svg'
                } else {                    
                    navbar.removeClass("on-top");
                    if(this.name === 'home'){
                        este.logo = '/img/svg/logo_bn.svg';
                    }
                }
            }
        }
    }
</script>
