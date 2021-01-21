<template>
    <section s-desk="testimonials">
        <div class="testimonials-new" v-if="newTestimonial">
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" v-model="testimonial.name">
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea v-model="testimonial.description"></textarea>
            </div>
            <label class="testimonials-img" for="testimonial-file">
                <img :src="url" alt="">
                <input id="testimonial-file" type="file" accept="image/*" @change="setPicture($event)">
            </label>
            <button class="btn" @click="saveTestimonial()">
                Save
            </button>
        </div>
        <ul v-if="testimonials.length" class="testimonials-list">
            <li class="testimonials-list-item" v-for="(t, i) in testimonials" :key="i+1">
                <div class="actions">
                    <button class="btn" @click="deleteTestimonial(t, i)">
                        Delete
                    </button>
                    <button class="btn" @click="editTestimonial(t, i)">
                        <span v-if="edit !== 'testimonial_'+i">Edit</span>
                        <span v-if="edit == 'testimonial_'+i">Cancel</span>
                    </button>
                </div>
                <article class="testimonial" v-if="edit !== 'testimonial_'+i">
                    <figure class="testimonial-img">
                        <img :src="'/storage/'+t.archivo" alt="">
                    </figure>
                    <p class="title">
                        {{t.name}}
                    </p>
                    <p class="text">
                        {{t.description}}
                    </p>
                </article>
                <article v-if="edit == 'testimonial_'+i">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" v-model="t.name">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea v-model="t.description"></textarea>
                    </div>
                    <label class="testimonials-img" for="testimonial-file-update">
                        <img :src="url" alt="">
                        <input id="testimonial-file-update" type="file" accept="image/*" @change="setNewPicture($event)">
                    </label>
                    <button class="btn" @click="updateTestimonial(t, i)">
                        Save
                    </button>
                </article>
            </li>
        </ul>
        <p v-else>
            No testimonials yet.
        </p>
    </section>    
</template>

<script>
export default {
    data(){
        return {
            testimonials: [],
            newTestimonial: false,
            url: '/img/default_slide.jpg',
            testimonial: {
                name: '',
                description: '',
                archivo: false
            },
            edit: false,
            nfile: false
        }
    },
    mounted(){
        this.$bus.$on('new', ($event) => {
            if($event.section == 8){
                this.newTestimonial ? this.newTestimonial = false : this.newTestimonial = true
            }
        });

        var este = this;
        axios.get('/get-testimonials').then((testimonials) => {
            este.testimonials = testimonials.data
            console.log(este.testimonials);
        });
    },
    methods: {
        setPicture($event){
            this.testimonial.archivo = $event.target.files[0]

            this.url = URL.createObjectURL(this.testimonial.archivo);
        },
        setNewPicture($event){
            this.nfile = $event.target.files[0]
            this.url = URL.createObjectURL(this.nfile);
        },
        editTestimonial(t, i){
            this.edit ? this.edit = false : this.edit = 'testimonial_' + i
            this.url = '/storage/'+t.archivo
        },
        saveTestimonial(){
            if (this.testimonial.name == '') {
                return false
            }else if (this.testimonial.description == ''){
                return false
            }   
            const formData = new FormData()

            const keys = Object.keys(this.testimonial)

            keys.forEach(k => {
                let $it = this.testimonial[k]
                formData.append(k, $it)
            })
            const este = this;

            axios.post('/save-testimonial', formData).then((testimonial) => {
                este.testimonials.unshift(testimonial.data)
                este.newTestimonial = false
                este.testimonial.name = ''
                este.testimonial.description = ''
                este.testimonial.archivo = false
            })
        },
        deleteTestimonial(t, i){
            if (confirm('Delete Testimonial?')) {
                const este = this;

                axios.post('/delete-testimonial', {id: t.id}).then((response) => {
                    this.testimonials.splice(i, 1)
                })
            }
        },
        updateTestimonial(t, i){
            const este = this;
            const formData = new FormData();
            
            formData.append('id', t.id)
            formData.append('name', t.name)
            formData.append('description', t.description)

            if (this.nfile) {
                    formData.append('archivo', this.nfile)
            }

            axios.post('/update-testimonial', formData).then((response) => {
                este.edit = false
            })
        }
    }
}
</script>

<style lang="scss">
    .testimonials{
        $self: &;
        &-new{
            #{$self}-img{
                cursor: pointer;
                img{
                    width: 100%;
                }
                input{
                    display: none;
                }
            }
        }

        &-list{
            &-item{
                position: relative;
                list-style: none;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                margin-bottom: 20px;
                .actions{
                    margin-left: auto;
                    position: relative;
                    z-index: 2;
                }
                .testimonial-img{
                    position: absolute;
                    z-index: 0;
                    top: 0;
                    left: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    opacity: .4;
                    width: 100%;
                    height: 100%;
                    img{
                        width: 100%;
                    }
                }
            }
        }
    }
</style>