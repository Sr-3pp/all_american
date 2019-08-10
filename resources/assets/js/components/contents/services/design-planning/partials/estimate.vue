<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/estimate.jpg" alt="">
            <icon name="estimate"></icon>
        </figure>
        <p class="title">
            Estimate
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            Planificacremos the costs of your project taking into account, allocation of efforts, cost of resources, work time etc.
            <icon name="star_panel2"></icon>
        </p>
        <div class="info column">
            <ul class="estimate-list">
                <li>
                    <icon name="check"></icon>
                    <icon name="ok"></icon>
                    Design and Planning
                </li>
                <li>
                    <icon name="check"></icon>
                    <icon name="ok"></icon>
                    Preparation
                </li>
                <li>
                    <icon name="check"></icon>
                    <icon name="ok"></icon>
                    Welding
                </li>
                <li>
                    <icon name="check"></icon>
                    <icon name="ok"></icon>
                    Polish
                </li>
                <li>
                    <icon name="check"></icon>
                    <icon name="ok"></icon>
                    Paint
                </li>
                <li>
                    <icon name="check"></icon>
                    <icon name="ok"></icon>
                    Reparation
                </li>
            </ul>
            <wizzard v-animate="'slide-left'"></wizzard>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>
