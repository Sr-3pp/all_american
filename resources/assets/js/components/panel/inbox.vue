<template>
    <div class="content">
        <table class="inbox">
            <thead>
                <tr>
                    <th>Sts</th>
                    <th>Nombre</th>
                    <th>Contenido</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(m, i) in inbox">
                    <td>{{m.status}}</td>
                    <td>{{m.name}}<br><strong>{{m.email}}</strong></td>
                    <td>{{m.message}}</td>
                    <td>
                        <button class="btn">Rep</button>
                        <button class="btn">Del</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default{
    mounted(){
        var este = this;
        axios.get('/panel/get-inbox').then((inbox) => {
            este.inbox = inbox.data
            console.log(este.inbox);
            
        });
    },
    props: [
       
    ],
    data(){
        return {
           inbox: false
        }
    },
    methods: {
       
    }
}
</script>