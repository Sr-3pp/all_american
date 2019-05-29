<template>
    <div s-desk="skills">
        <ul>
            <li>
                <select>
                    <option v-for="val in 10" :value="val+1">{{val+1}}</option>
                </select>
                <p>
                    Name
                </p>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        
    },
    props: [
       
    ],
    data(){
        return {
           
        }
    },
    methods: {
       
    }
}
</script>