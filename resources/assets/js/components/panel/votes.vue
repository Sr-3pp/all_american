<template>
    <div s-desk="votes" class="content">
        <div class="title">
            <strong>Average: </strong> {{average}}
        </div>
        <ul>
            <li v-for="(v, ind) in votes">
                <article class="starts-container">
                    <span v-for="s in v.grade">
                        <icon name="star"></icon>
                    </span>
                </article>
                <article>
                    <p>{{v.name}}</p>
                    <p>{{v.email}}</p>
                </article>
                <article>
                    {{v.review}}
                </article>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        var este = this,
            sum = 0;
        axios.get('/panel/get-votes').then((response) => {
            este.votes = response.data

            for (let i = 0; i < este.votes.length; i++) {
                const element = este.votes[i];
                sum += element.grade
            }

            este.average = sum / este.votes.length
            
        });
    },
    props: [
       
    ],
    data(){
        return {
           votes : false,
           average: 0
        }
    },
    methods: {
       
    }
}
</script>