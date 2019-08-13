<template>
    <section s-sec="forming-form">
        <article v-for="(form, index) in forms">
            <p class="title">Form</p>
            <ul>
                <ol v-for="(t, ind) in form.object">
                    <p  v-if="ind != 'contact' && ind != 'sizes' && ind != 'finish' && ind != 'shape'"><b>{{ind}}: </b> {{t}}</p>
                    <ul v-if="ind == 'shape'">
                        <p class="category">Shape</p>
                        <li v-for="c in t">
                            <p>{{c}}</p>
                        </li>
                    </ul>
                    <ul v-if="ind == 'sizes'">
                        <p class="category">Sizes</p>
                        <li v-for="c in t">
                            <p>{{c}}</p>
                        </li>
                    </ul>
                    <ul v-if="ind == 'finish'">
                        <p class="category">Finishes</p>
                        <li v-for="(c, i) in t">
                            <p>{{c}}</p>
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