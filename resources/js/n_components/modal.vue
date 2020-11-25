<template>
    <section class="c-modal" :class="{'active': open, 'active-done': done}">
        <div class="c-modal-container">
            <div class="c-modal-header">
                <button @click="closeModal(false)" class="btn c-modal-close-button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
                        <path fill="#E04F5F" d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1          C393,504.1,504.1,393,504.1,256z"/>
                        <path fill="#FFFFFF" d="M285,256l72.5-84.2c7.9-9.2,6.9-23-2.3-31c-9.2-7.9-23-6.9-30.9,2.3L256,222.4l-68.2-79.2    c-7.9-9.2-21.8-10.2-31-2.3c-9.2,7.9-10.2,21.8-2.3,31L227,256l-72.5,84.2c-7.9,9.2-6.9,23,2.3,31c4.1,3.6,9.2,5.3,14.3,5.3    c6.2,0,12.3-2.6,16.6-7.6l68.2-79.2l68.2,79.2c4.3,5,10.5,7.6,16.6,7.6c5.1,0,10.2-1.7,14.3-5.3c9.2-7.9,10.2-21.8,2.3-31L285,256    z"/>
                    </svg>
                </button>
                <slot name="header" />
            </div>
            <slot name="body" />
            <slot name="footer" />
        </div>
        <div @click="closeModal(false)" class="c-modal-overlay"></div>
    </section>
</template>
<script>

export default {
    props: [
        'name'
    ],
    data() {
        return {
            open: false,
            done: false
        }
    },
    mounted () {
        this.$bus.$on('toggleModal', ($event) => {
            if (this.name != $event.modal)  return 

            if ($event.sw) {
                this.openModal($event.sw);
            }else{
                this.closeModal();
            }
        })
    },
    methods: {
        openModal(sw) {
            const este = this;
            this.open = sw
            setTimeout(() => {
                este.done = este.open
            }, 250);
        },
        closeModal(sw){
            const este = this;
            this.done = sw
            setTimeout(() => {
                este.open = este.done
            }, 250);
        }
    }
}
</script>

<style lang="scss">
    @import '../../sass/_variables.scss';
    .c-modal{
        $self: &;
        position: fixed;
        z-index: 4;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100%;
        cursor: default;
        opacity: 0;
        visibility: hidden;
        display: none;
        align-items: center;
        justify-content: center;
        &.active{
            display: flex;
            #{$self}-overlay{
                opacity: 1;
                visibility: visible;
            }
            &-done{
                opacity: 1;
                visibility: visible;
            }
        }

        &-container{
            width: 80%;
            height: 80%;
            border-radius: 3rem;
            max-width: 1100px;
            z-index: 3;
            background-color: #FFF;
            display: flex;
            flex-direction: column;
        }
        &-close-button{
            position: absolute;
            z-index: 4;
            right: 2rem;
            top: 2rem;
            background-color: transparent;
            svg{
                width: 2rem;
            }
        }
        &-header, &-body, &-header{
            display: flex;
            position: relative;
        }
        &-header{
            .cover{
                width: 100%;
                max-height: 20rem;
                flex-direction: column;
            }
        }
        &-body{
            >*{
                width: 100%;
                border: none;
            }
        }

        &-overlay{
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-color: rgba($dark, .5);
            opacity: 0;
            visibility: hidden;
        }
    }
</style>