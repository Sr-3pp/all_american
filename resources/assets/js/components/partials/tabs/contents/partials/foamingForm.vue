<template>
    <article class="foaming-form form">
        <h3 class="subtitle">Angles and chanels</h3>
        <div class="group material">
            <p class="subtitle">Material</p>
            <div>
                <p>
                    <span class="radio" @click="form.material = 1">
                        <icon v-if="form.material == 1" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Stainless steel
                    </span>
                    <span class="radio" @click="form.material = 2">
                        <icon v-if="form.material == 2" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Brass
                    </span>
                    <span class="radio" @click="form.material = 3">
                        <icon v-if="form.material == 3" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Aluminium
                    </span>
                    <span class="radio" @click="form.material = 4">
                        <icon v-if="form.material == 4" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Copper
                    </span>
                </p>
                <figure>
                    <img src="/img/default.jpg" alt="">
                </figure>
            </div>
        </div>
        <div class="group gauges">
            <p class="subtitle">Gauges</p>
            <p class="text">What are gauges? <span class="tooltip">?</span></p>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Gauges</th>
                            <th>Thicknes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="radio" @click="form.gauge = '30'">
                                    <icon v-if="form.gauge == '30'" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    30
                                </span>
                            </td>
                            <td>
                                0.010"
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="radio" @click="form.gauge = '28'">
                                    <icon v-if="form.gauge == '28'" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    28
                                </span>
                            </td>
                            <td>
                                0.013"
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="group shape">
            <p class="subtitle">Shape</p>
            <ul>
                <li :class="{'active': form.shape.section == 1}" @click="form.shape.section = 1">Sheet</li>
                <li :class="{'active': form.shape.section == 2}" @click="form.shape.section = 2">Channel and angles</li>
                <li :class="{'active': form.shape.section == 3}" @click="form.shape.section = 3">Frames</li>
                <li :class="{'active': form.shape.section == 4}" @click="form.shape.section = 4">Panels</li>
            </ul>
            <transition-group tag="div" class="content">
                <article :key="0" v-if="form.shape.section == 1">
                    <div class="angles">
                        <p class="subtitle">Sheet</p>
                        <ul>
                            <li :class="{'active': form.shape.value == 1}" @click="form.shape.value = 1">
                                <span>
                                    <icon name="sheet_1"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 1" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Rectangle / Square
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 2}" @click="form.shape.value = 2">
                                <span>
                                    <icon name="sheet_2"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 2" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Circle / Oval
                                </span>
                            </li>
                        </ul>
                        <p class="text"  @click="form.shape.value = 0">
                            <icon v-if="form.shape.value == 0" name="radio_on"></icon> 
                            <icon v-else name="radio_off"></icon> 
                            <span>
                                Can’t fiand the shape that you need, no problem send us your exact specificationsn we can do it.
                            </span>
                        </p>
                    </div>
                    <div class="group sizes">
                        <p class="subtitle">Sizes</p>
                        <div>
                            <article class="prevs">
                                <figure>
                                    <img :src="'/img/forming/sheet_angle_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/sheet_length_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/sheet_render_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                            </article>
                            <article v-if="form.shape.value == 1">
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Side A)</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side B)</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side C)</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>side D)</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 2">
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Radius A)</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Radius B)</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                        </div>
                        <div class="group">
                            <label>Amount of pieces</label>
                            <input type="text" class="input">
                        </div>
                    </div>
                </article>
                <article :key="1" v-if="form.shape.section == 2">
                    <div class="angles">
                        <p class="subtitle">Channels and Angles</p>
                        <ul>
                            <li :class="{'active': form.shape.value == 1}" @click="form.shape.value = 1">
                                <span>
                                    <icon name="channel_1"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 1" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 2}" @click="form.shape.value = 2">
                                <span>
                                    <icon name="channel_2"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 2" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 3}"  @click="form.shape.value = 3">
                                <span>
                                    <icon name="channel_3"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 3" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 4}" @click="form.shape.value = 4">
                                <span>
                                    <icon name="channel_4"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 4" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 5}" @click="form.shape.value = 5">
                                <span>
                                    <icon name="channel_5"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 5" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 6}" @click="form.shape.value = 6">
                                <span>
                                    <icon name="channel_6"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 6" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 7}" @click="form.shape.value = 7">
                                <span>
                                    <icon name="channel_7"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 7" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 8}"  @click="form.shape.value = 8">
                                <span>
                                    <icon name="channel_8"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 8" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Channel w/ Hands
                                </span>
                            </li>
                        </ul>
                        <p class="text"  @click="form.shape.value = 0">
                            <icon v-if="form.shape.value == 0" name="radio_on"></icon> 
                            <icon v-else name="radio_off"></icon> 
                            <span>
                                Can’t fiand the shape that you need, no problem send us your exact specificationsn we can do it.
                            </span>
                        </p>
                    </div>
                    <div class="group sizes">
                        <p class="subtitle">Sizes</p>
                        <div>
                            <article class="prevs">
                                <figure>
                                    <img :src="'/img/forming/channel_angle_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/channel_length_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/channel_render_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                            </article>
                            <article>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Side A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Angle A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Angle B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                        </div>
                        <div class="group">
                            <label>Amount of pieces</label>
                            <input type="text" class="input">
                        </div>
                    </div>
                </article>
                
            </transition-group>
        </div>
        <div class="group finish">
            <p class="subtitle">Full finish</p>
            <div>
                <span class="check" @click="addFinish(1)">
                    <icon v-if="form.finish.indexOf(1) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Machine Mill
                </span>
                <span class="check" @click="addFinish(2)">
                    <icon v-if="form.finish.indexOf(2) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Welding
                </span>
                <span class="check" @click="addFinish(3)">
                    <icon v-if="form.finish.indexOf(3) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Brush
                </span>
                <span class="check" @click="addFinish(4)">
                    <icon v-if="form.finish.indexOf(4) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Polish
                </span>
                <span class="check" @click="addFinish(5)">
                    <icon v-if="form.finish.indexOf(5) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Grained
                </span>
                <span class="check" @click="addFinish(6)">
                    <icon v-if="form.finish.indexOf(6) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Paint
                </span>
                <span class="check" @click="addFinish(7)">
                    <icon v-if="form.finish.indexOf(7) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Patina
                </span>
                <span class="check" @click="addFinish(8)">
                    <icon v-if="form.finish.indexOf(8) != -1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Powder coat
                </span>
            </div>
        </div>
        <div class="group contact">
            <p class="subtitle">Contact Information</p>
            <div>
                <div class="group" v-for="(field, index) in form.contact">
                    <span class="must" v-if="field.alert.status">{{field.alert.text}}</span>
                    <input v-if="field.type !== 'textarea'" :ref="field.ref" :required="field.required" :type="field.type" class="input" :placeholder="field.ph" v-model="field.value" @keyup.enter="nextStep(index)">
                    <textarea v-if="field.type === 'textarea'" :ref="field.ref" :placeholder="field.ph" rows="10" class="input"></textarea>
                </div>
            </div>
        </div>        
        <wizzard></wizzard>
        <button class="btn" @click="validate()">Send</button>
        <div class="content">
            <p class="subtitle">
                        Roll Bending
                        <icon name="star_panel1"></icon>
                    </p>  
                    <p class="text">
                        Roll-bending or cuving belding, is the manufacture or development of metal sheets that are worked to acquire cylindrical shapes, curves or radios depending on the needs of the project.
                        <icon name="star_panel2"></icon>
            </p>
            <figure>
                <img width="100%" src="/img/default.jpg" alt="">
            </figure>
        </div>
    </article>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return{
            form: {
                material: 1,
                gauge: '30',
                shape: {
                    section: 1,
                    value: 1
                },
                sizes: {
                    a: {
                        size: null,
                        angle: null
                    },
                    b: {
                        size: null,
                        angle: null,
                    },
                    c: {
                        size: null,
                    },
                    length: null
                },
                finish: [1],
                contact: {
                    0: {
                        value: null,
                        type: 'text',
                        name: 'Name',
                        ref: 'name',
                        alert: {
                            status: false,
                            text: 'You must fill this input'
                        },
                        ph: 'Name*',
                        visible: true,
                        required: true
                    },
                    1: {
                        value: null,
                        type: 'text',
                        name: 'Phone',
                        ref: 'phone',
                        alert: {
                            status: false,
                            text: 'You must fill this input'
                        },
                        ph: 'Phone*',
                        visible: false,
                        required: true,
                    },
                    2: {
                        value: null,
                        type: 'email',
                        name: 'E-mail',
                        ref: 'email',
                        alert: {
                            status: false,
                            text: 'Verify your email'
                        },
                        ph: 'E-mail*',
                        visible: false,
                        required: true,
                    },
                    3: {
                        value: null,
                        type: 'textarea',
                        name: 'Instructions',
                        ref: 'instructions',
                        alert: {
                            status: false,
                            text: 'Verify your email'
                        },
                        ph: 'Instruction, direction and description of your project*',
                        visible: false,
                        required: false,
                    },
                   
                }

            }
        }
    },
    methods: {
        validate(){
            console.log(this.form.shape);
            
        },
        addFinish(index){
            var pos = this.form.finish.indexOf(index);
            if(pos != -1){
                this.form.finish.splice(pos, 1);
            }else{
                this.form.finish.push(index);
            }            
        }
    }
}
</script>
