<template>
    <section s-sec="forming-form">
        <article v-for="(form, index) in forms">
            <ul>
                <ol v-for="(t, ind) in form.object">
                    <p  v-if="ind != 'contact' && ind != 'sizes' && ind != 'finish' && ind != 'shape'"><b>{{ind}}: </b> {{t}}</p>
                    <ul v-if="ind == 'shape'">
                        <p class="category">Shape</p>
                        <li  v-if="t.section == 1">
                                <p>Sheet </p>

                                <span v-if="t.value == 1">Rectangle / Square</span>
                                <span v-if="t.value == 2">Circle / Oval</span>
                                
                        </li>
                        <li v-if="t.section == 2">
                                <p>Chanels and Angles </p>

                                <span v-if="t.value == 1">U Chanel</span>
                                <span v-if="t.value == 2">J Chanel</span>
                                <span v-if="t.value == 3">Corner</span>
                                <span v-if="t.value == 4">Angle</span>
                                <span v-if="t.value == 5">Drink Rail</span>
                                <span v-if="t.value == 6">Channel w/Hands</span>
                                <span v-if="t.value == 7">Hat Channel</span>
                                <span v-if="t.value == 8">Z channel</span>
                        </li>
                        <li v-if="t.section == 3">
                                <p>Frames </p>

                                <span v-if="t.value == 1">Welded / Frame</span>
                                <span v-if="t.value == 2">Sheet Frame</span>
                                <span v-if="t.value == 3">Sheet Ring</span>
                                <span v-if="t.value == 3">Rolled Ring</span>
                        </li>
                        <li v-if="t.section == 4">
                                <p>Panels </p>

                                <span v-if="t.value == 1">Panel</span>
                                <span v-if="t.value == 2">Circle Panel</span>
                        </li>
                    </ul>
                    <ul v-if="ind == 'sizes'">
                        <p class="category">Sizes</p>
                        <li class="row">
                            <p v-for="(c, i) in t"><b>{{String.fromCharCode(97 + i)}}:</b> {{c}}, </p>
                        </li>
                    </ul>
                    <ul v-if="ind == 'finish'">
                        <p class="category">Finishes</p>
                        <li v-for="(c, i) in t">
                            <p v-if="c == 1">Machine Mill</p>
                            <p v-if="c == 2">Welding</p>
                            <p v-if="c == 3">Brush</p>
                            <p v-if="c == 4">Finish</p>
                            <p v-if="c == 5">Grained</p>
                            <p v-if="c == 6">Paint</p>
                            <p v-if="c == 7">Patina</p>
                            <p v-if="c == 8">Powder Coat</p>
                        </li>
                    </ul>
                    <ul v-if="ind == 'contact'">
                        <p class="category">Conatct Information</p>
                        <li v-for="(c, i) in t">
                            <p><b>{{c.name}}: </b> {{c.value}}</p>
                        </li>
                    </ul>
                </ol>
            </ul>
            <hr>
        </article>
    </section>
</template>
<script>
export default {
    mounted(){
        var este = this;
        axios.get('/panel/get-forms').then((forms) => {
            este.forms = forms.data            
        });
    },
    data(){
        return {
            forms: false
        }
    },
    methods: {

    }
}
</script>