<template>
    <transition-group tag="div" class="form wizzard" name="fade">
        <ul v-if="file && !form.readyToSave" :key="0">
            <li class="truncate">{{file.name}}</li>
            <li class="truncate" v-for="(field, index) in form" v-if="field.value">
                {{field.value}}
            </li>
        </ul>
        <div :key="1" v-if="step === 0 && !done.status" class="start">
            <article>
                <icon name="file"></icon>
                <p class="category">
                    SHARE WITH US YOUR PROJECT TO MAKE AN ESTIMATE
                </p>
            </article>
            <input id="wizzardFile" type="file" class="hidden" @change="setFile($event)">
            <button type="button" class="btn" @click="prevFile()">Upload</button>
        </div>
        <div :key="index+2" v-if="step !== 0 && field.visible && !done.status" class="group" v-for="(field, index) in form">
            <label>{{field.name}}:</label>
            <span class="must" v-if="field.alert.status">{{field.alert.text}}</span>
            <input autofocus :ref="field.ref" :required="field.required" :type="field.type" class="input" :placeholder="field.ph" v-model="field.value" @keyup.enter="nextStep(index)">
            <button class="btn" type="button" @click="nextStep(index)">Next</button>
        </div>
        <div v-if="form.readyToSave && !done.status" :key="98" class="preview">
            <ul>
                <ol v-if="file" @click="backTo('file')">
                    <icon name="file"></icon>
                    <span class="truncate">{{file.name}}</span>
                </ol>
                <ol v-for="(field, index) in form" v-if="field.name" @click="backTo(index)">
                    <span class="category">{{field.name}}:</span>
                    {{field.value}}
                </ol>
            </ul>
        </div>
        <button v-if="form.readyToSave && !done.status" :key="99" type="button" class="btn" @click="create()">If all is OK, Send it</button>
        <div :key="100" class="thanks" v-if="done.status">
            <article v-if="!done.error.status">
                thanks!
            </article>
            <article v-else>
                {{done.error.message}}
            </article>
        </div>
    </transition-group>                      
</template>
<script>
export default{
    mounted(){

    },
    data(){
        return {
            step: 0,
            done: {
                status: false,
                error: {
                    status: false,
                    message: null
                }
            },
            file: null,
            form: {
                0: {
                    value: null,
                    type: 'text',
                    name: 'Name',
                    ref: 'name',
                    alert: {
                        status: false,
                        text: 'You must fill this input'
                    },
                    ph: 'Jhon Tittor',
                    visible: true,
                    required: true
                },
                1: {
                    value: null,
                    type: 'email',
                    name: 'E-mail',
                    ref: 'email',
                    alert: {
                        status: false,
                        text: 'Verify your email'
                    },
                    ph: 'tittor@mail.com',
                    visible: false,
                    required: true,
                },
                readyToSave: false
            }
        }
    },
    methods: {
            testMail(mail){
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(mail).toLowerCase());
            },
            nextStep(index){
                var field = this.form[index],
                    next = this.form[parseInt(index)+1];
                     
                    
                if(field.required){
                    if (field.value) {
                        if(field.type === 'email'){
                            if(this.testMail(field.value)){
                                this.step += 1
                                field.visible = false
                                if (next !== undefined) {
                                    next.visible = true
                                }else{
                                    this.form.readyToSave = true;
                                }
                            }else{
                                field.alert.status = true
                            }
                        }else{
                            this.step += 1
                            field.visible = false
                            if (next !== undefined) {
                                    next.visible = true
                                }else{
                                    this.form,readyToSave = true;
                                    console.log(this.form);
                                    
                                }
                        }
                    }else{
                        field.alert.status = true
                    }
                }else{
                    this.step += 1
                    field.visible = false
                    if (next !== undefined) {
                        next.visible = true
                    }else{
                        this.form.readyToSave = true;
                    }
                }                
            },
            create(){
                this.done.status = true;
                /* var este = this,
                    formData = new formData;
                axios.post('/url', formData).then(response => {
                    este.done = true
                }) */
            },
            prevFile(){
                $('#wizzardFile').click()
            },
            setFile(e){
                this.file = e.target.files[0]
                if(this.file){
                    this.step = 1
                    this.form[0].visible = true
                }
            },
            backTo(magic){
                if (isNaN(magic)) {
                    this.done.status = false
                    this.form.readyToSave = false
                    this.step = 0;
                }else{
                var field = this.form[magic];
                    field.visible = true;
                    this.done.status = false
                    this.form.readyToSave = false
                    this.step = parseInt(magic)+1
                }
            }
    }
}
</script>