<template>
    <article class="new">
        <slot />
    </article>
</template>

<style lang="scss">
    @import '../../../sass/_variables.scss';
    #app {
        .new{
            &.slick-slide:not(:last-child){
                margin-right: 1.5rem;
            }
            &.slick-slide:first-child{
                margin-left: 1.5rem;
            }
            margin{
                right: 2rem;
                bottom: 2rem;
            }
            *{
                color: $dark;
                text-decoration: none;
            }
            display: flex;
            flex-direction: column;
            background-color: #FFF;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 1vw 1vw 3vw rgba(#000, .8);
            min-height: 400px;
            max-height: 60vh;
            max-width: 500px;
            position: relative;
            cursor: pointer;
            flex: {
                grow: 0;
                shrink: 1;
                basis: 100%;
            }
            margin-top: 0;
            margin-bottom: 20px;
            transition: all .2s ease;
            /* &:nth-child(odd){
                margin-right: 1%;
            }
            &:nth-child(even){
                margin-left: 1%;
            } */

            @media #{$small-desktop} {
                flex: {
                    basis: 48%;
                }
                &:hover{
                    background-color: $Ablue;
                    margin-top: -.5%;
                    *:not(label):not(input):not(textarea):not(.btn):not(.first){
                        color: #FFF;
                        &:after{
                            background-color: #FFF;
                        }
                    }
                    >.social{
                        .btn{
                            svg{
                                color: #FFF;
                            }
                        }
                    }
                }
            }
            &:last-child{
                margin-right: 0;
            }
            a{
                max-height: 50%;
            }
             .cover{
                    height: 300px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    overflow: hidden;
                    position: relative;
                    align-items: center;
                    flex-shrink: 0;
                    color: $dark;
                    background-color: #FFF;
                        .buttons{
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            width: 100%;
                            padding: 2% 0;
                            display: flex;
                            justify-content: space-between;
                            background-color: rgba(#000, .8);
                            >*{
                                flex: {
                                    grow: 1;
                                    shrink: 1;
                                    basis: 48%;
                                }
                            }
                            >.btn{
                                border-radius: 0;
                                &:first-child{
                                    margin-right: 1%;
                                }
                                &:last-child{
                                    margin-left: 1%;
                                }
                            }
                        }
                    img{
                        width: 100%;
                        height: auto;
                    }
                }
                .s-text{
                    padding: 5%;
                    position: relative;
                    &::after{
                        content: '';
                        width: 100%;
                        height: 1px;
                        background-color: #000;
                        position: absolute;
                        bottom: 0;
                        left: 0;
                    }
                }
                .content{
                    padding: 5%;
                    margin-bottom: 15%;
                    max-height: 500px;
                    overflow: auto;
                    &::-webkit-scrollbar{
                        display: none;
                    }
                    [data-f-id]{
                        display: none;
                    }
                }
            >.social{
                display: flex;
                justify-content: flex-end;
                position: absolute;
                left: 0;
                bottom: 0;
                padding: 5%;
                width: 100%;
                .btn{
                    width: 8%;
                    background-color: transparent;
                    border: none;
                    padding: 0;
                    margin-right: 5%;
                    color: currentColor;
                    &.like{
                        svg{
                            fill: transparent;
                            stroke: $dark;
                            stroke-width: 2px;
                        }
                        &.liked{
                            svg{
                                stroke: transparent;
                                fill: $Ared;
                            }
                        }
                    }
                    &:last-child{
                        margin-right: 0;
                    }
                    svg{
                        path{
                            stroke: currentColor;
                        }
                    }
                }
            }
        }
    }
</style>