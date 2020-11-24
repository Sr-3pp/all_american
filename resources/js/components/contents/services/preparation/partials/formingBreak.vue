<template>
    <div s-sec="forming" class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/forming_break.jpg" alt="">
            <icon name="break"></icon>
        </figure>
        <div class="info column header-text">
            <p class="title">
                Forming Break
            </p>  
                <icon name="estrella4"></icon>
            <p class="text">
                Material cutting service, adjusted to the specific measures that you need. We offer shearing services...
            </p>
        </div>
        <figure class="info">
                <img class="gif" src="/img/break.gif" alt="">
            </figure>
        <figure class="info">
                <img class="gif" src="/img/break-2.gif" alt="">
            </figure>
        <div class="partial-metal">
            <p class="title">We sell partial metal</p>
            <article class="info">
                <p class="text">
                    We sell <strong>custom made metal pieces</strong> of different metal materials, metal sheets adapted to your specific needs.
                </p>
                <ul>
                    <li>
                        <icon name="ok"></icon>
                        <p class="text">
                            Sheets
                        </p>
                    </li>
                    <li>
                        <icon name="ok"></icon>
                        <p class="text">
                            Round Tube
                        </p>
                    </li>
                    <li>
                        <icon name="ok"></icon>
                        <p class="text">
                            Square Tubes
                        </p>
                    </li>
                    <li>
                        <icon name="ok"></icon>
                        <p class="text">
                            Pipes
                        </p>
                    </li>
                    <li>
                        <icon name="ok"></icon>
                        <p class="text">
                            Round Bar
                        </p>
                    </li>
                    <li>
                        <icon name="ok"></icon>
                        <p class="text">
                            Flat Bar
                        </p>
                    </li>
                </ul>
            </article>
            <img src="/img/partial_metal.jpg" alt="">
        </div>
        <forming-form v-if="!sent"></forming-form>
        <div v-else>
            <p class="title">Thank you</p>
            <p class="category">
                We'll, contact yo by email with a response.
            </p>
        </div>
        <div class="info column header-text">
                <p class="title">
                      Roll Bending
                </p>  
                <icon name="estrella4"></icon>
                    <p class="text">
                        Roll-bending or cuving belding, is the manufacture or development of metal sheets that are worked to acquire cylindrical shapes, curves or radios depending on the needs of the project.
                    </p>
            </div>
            <figure class="info">
                <img class="gif" src="/img/rolling.gif" alt="">
            </figure>
        <figure class="image">
                <img src="/img/rolling_machine.jpg" alt="">
                <p class="category">
                    Rolling Machine
                </p>
        </figure>
    </div>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('sentForming', () => {
            this.sent = true;
        })
    },
    data(){
        return {
            sent: false
        }
    },
    methods: {

    }
}
</script>
