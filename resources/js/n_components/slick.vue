<template>
    <slick class="triplider carousel" ref="slick"  :options="slickOptions">
        <slot></slot>
    </slick>
</template>
<style lang="scss">
    #app{
        .triplider{
            display: flex;
            position: relative;
            .slick-arrow{
                    background-color: rgba(30, 67, 128, 0.5);
                    border: none;
                    align-self: center;
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    z-index: 1;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 5px;
                    svg{
                        fill: #FFF;
                        margin: .8rem;
                        width: 2rem;
                        height: 2rem;
                    }
                    &[aria-disabled=true]{
                        opacity: .5;
                        background-color: rgba(39, 41, 42, 0.5);
                        svg{
                            fill:#62626280
                        }
                    }
                    &.slick-prev{
                        left: 1rem;
                    }
                    &.slick-next{
                        right: 1rem;
                        svg{
                            transform: rotate(180deg);
                            transform-origin: 50% 50%;
                        }
                    }
            }
            .slick-list{
                width: 100%;
                .slick-track{
                    .slick-slide{
                        height: 90vh;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        position: relative;
                        overflow: hidden;
                        img{
                            width: auto;
                            height: 100%;
                            @media (min-width: 768px){
                                width: 100%;
                                height: auto;
                            }
                        }
                        &[aria-hidden=false]{
                            .content{
                                opacity: 1;
                            }
                        }
                        .content{
                            position: absolute;
                            width: 90%;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                            z-index: 1;
                            color: #FFF;
                            top: 50%;
                            left: 50%;
                            opacity: 0;
                            transition: opacity .35s ease;
                            transition-delay: .8s;
                            transform: translateX(-50%);
                            >*{
                                margin-bottom: 5%;
                            }
                            .title{
                                border-bottom: {
                                    style: solid;
                                    width: 1px;
                                    color: #FFF;
                                }
                            }
                            @media (min-width: 1024px){
                                width: 40%;
                                left: 0;
                                transform: translate(20%, -50%);
                                &[s-mode=right]{
                                    left: inherit;
                                    width: 40%;
                                    right: 0;
                                    transform: translate(-20%, -50%);
                                }
                                &[s-mode=center]{
                                    left: 50%;
                                    width: 60%;
                                    transform: translate(-50%, -50%);
                                }
                            }
                            .btn.cta{
                                background-color: transparent;
                                color: #FFF;
                                text-align: center;
                                font-size: 1.5rem;
                                font-weight: 300;
                                padding: 1rem;
                                width: 80%;
                                max-width: 300px;
                                border: {
                                    style: solid;
                                    color: #FFF;
                                    width: 1px;
                                }
                                @media (min-width: 768px){
                                    width: 30%;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>
<script>
import '../../../node_modules/slick-carousel/slick/slick.css';
import Slick from 'vue-slick';
export default {
    components: {Slick},
    data(){
        return{
            slickOptions: {
                autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 0,
                arrows: true,
                dots: false,
                infinite: false,
                prevArrow: '<button class="slick-prev"><svg viewBox="0 0 50 50" class="svg-icon icon-chevron"><path data-v-2283cbac="" d="M36.18,50c-0.67,0-1.35-0.26-1.86-0.77L11.95,26.86c-1.03-1.03-1.03-2.7,0-3.73L34.32,0.77 c1.03-1.03,2.7-1.03,3.73,0c1.03,1.03,1.03,2.7,0,3.73L17.54,25l20.5,20.5c1.03,1.03,1.03,2.7,0,3.73C37.53,49.74,36.86,50,36.18,50 z" stroke="transparent"></path></svg></button>',
                nextArrow: '<button class="slick-next"><svg viewBox="0 0 50 50" class="svg-icon icon-chevron"><path data-v-2283cbac="" d="M36.18,50c-0.67,0-1.35-0.26-1.86-0.77L11.95,26.86c-1.03-1.03-1.03-2.7,0-3.73L34.32,0.77 c1.03-1.03,2.7-1.03,3.73,0c1.03,1.03,1.03,2.7,0,3.73L17.54,25l20.5,20.5c1.03,1.03,1.03,2.7,0,3.73C37.53,49.74,36.86,50,36.18,50 z" stroke="transparent"></path></svg></button>'
            }
        }
    }
}
</script>