<template>
    <section class="section">
        <h2>Section</h2>
        <div class="row">
            <h2 class="col-12">Small Columns</h2>
            <div class="col-1">
                <h3>si que si 1</h3>
            </div>
            <div class="col-2">
                <h3>si que si 2</h3>
            </div>
        </div>
        <div class="row">
            <h2 class="col-lg-12">Large Columns</h2>
            <div class="col-lg-2">
                <h3>si que si 2</h3>
            </div>
            <div class="col-lg-8">
                <h3>si que si 8</h3>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
