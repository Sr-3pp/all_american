<template>
    <div s-sec="forming" class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/forming_break.jpg" alt="">
            <icon name="break"></icon>
        </figure>
        <p class="title">
            Forming Break
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            Material cutting service, adjusted to the specific measures that you need. We offer shearing services...
            <icon name="star_panel2"></icon>
        </p>
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
            <p class="title">
                        Roll Bending
                        <icon name="star_panel1"></icon>
            </p>  
            <p class="text">
                        Roll-bending or cuving belding, is the manufacture or development of metal sheets that are worked to acquire cylindrical shapes, curves or radios depending on the needs of the project.
                        <icon name="star_panel2"></icon>
            </p>
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
