<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/estimate.jpg" alt="">
            <icon name="estimate"></icon>
        </figure>
        <div class="info column header-text">
            <p class="title">
                Estimate
            </p>  
            <icon name="estrella4"></icon>
            <p class="text">
                Planificacremos the costs of your project taking into account, allocation of efforts, cost of resources, work time etc.
            </p>
        </div>
        <div class="info column header-text">
            <ul class="estimate-list">
                <li>
                    
                    <icon name="ok"></icon>
                    Design and Planning
                </li>
                <li>
                    
                    <icon name="ok"></icon>
                    Fabrication
                </li>
                <li>
                    
                    <icon name="ok"></icon>
                    Welding
                </li>
                <li>
                    
                    <icon name="ok"></icon>
                    Finish
                </li>
                <li>
                    
                    <icon name="ok"></icon>
                    Paint
                </li>
                <li>
                    
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
