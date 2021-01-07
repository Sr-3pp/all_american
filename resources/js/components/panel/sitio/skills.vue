<template>
    <div s-desk="skills">
        <ul>
            <li v-if="newSkill">
                <select v-model="nskill.percent">
                    <option v-for="val in 10" :value="val+1">{{val+1}}0</option>
                </select>
                <p>
                    <label>Name</label>
                    <input type="text" class="input" v-model="nskill.name">
                </p>
                <button class="btn" @click="saveSkill()">Save</button>
            </li>
            <li v-for="(s, index) in skills">
                <div v-if="skillEdit != 'editSkill_' + index">
                    <p class="subtitle">{{s.name}}</p>
                    <p class="text">{{s.percent}}</p>
                    <button class="btn" @click="editSkill(s, index)">Edit</button>
                    <button class="btn" @click="deleteSkill(s.id, index)">Delete</button>
                </div>
                <div v-if="skillEdit == 'editSkill_' + index">
                        <div v-for="(fin, i) in skill">
                            <article v-if="i == 'name'" class="form-group">
                                <label>{{i}}</label>
                                <input type="text" class="input" v-model="skill[i]">
                            </article>
                            <article v-if="i == 'percent'" class="form-group">
                                <label>{{i}}</label>
                                <select v-model="skill[i]" class="input">
                                    <option v-for="val in 10" :value="val+1">{{val+1}}0</option>
                                </select>
                            </article>
                        </div>
                        <button @click="editSkill()" class="btn">Cancel</button>
                        <button @click="updateSkill()" class="btn">Save</button>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('new', ($event) => {
            if($event.section == 6){
                this.newSkill ? this.newSkill = false : this.newSkill = true
            }
        });

        var este = this;
        axios.get('/get-skills').then((skills) => {
            este.skills = skills.data
        });
    },
    props: [
       
    ],
    data(){
        return {
            skill: false,
            skillEdit: false,
           newSkill: false,
           skills: [],
           nskill: {
               name: null,
               percent: null
           }
        }
    },
    methods: {
        saveSkill(){
           var este = this;
           axios.post('/panel/save-skill', this.nskill).then((skill) => {
               este.skills.push(skill.data)
               este.newSkill = false
               este.nskill= {
                    name: null,
                    percent: null
                }
           });
       },
       deleteSkill(id, index){
           if (confirm('delete question?')) {
               var este = this;
               axios.get('/panel/delete-skill/'+id).then((response) => {
                   este.skills.splice(index, 1)
               });
           }
       },
       editSkill(f, index, i){
          this.skill ? this.skill = false : this.skill = f;
          this.skillEdit ? this.skillEdit = false : this.skillEdit = 'editSkill_'+index;
        },
        updateSkill(){
            var este = this;
                    axios.post('/panel/update-skill/'+ this.skill.id, this.skill).then((r) => {
                        este.skill = false;
                        este.skillEdit = false;
                    }).catch((e) => {
                        console.log(e);
                    });
        },
    }
}
</script>