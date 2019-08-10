<template>
    <article class="foaming-form form">
        <h3 class="subtitle">Angles and chanels</h3>
        <div class="group material">
            <p class="subtitle">Material</p>
            <div>
                <p>
                    <span v-for="(m, index) in materials" class="radio" @click="setMaterial(m)">
                        <icon v-if="form.material == m.id" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        {{m.name}}
                    </span>
                </p>
                <figure>
                    <img :src="'/storage/'+image" alt="">
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
                        <tr v-for="(g, index) in gauges">
                            <td>
                                <span class="radio" @click="form.gauge = g.gauge">
                                    <icon v-if="form.gauge == g.gauge" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    {{g.gauge}}
                                </span>
                            </td>
                            <td>
                                {{g.thick}}
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
                        <div v-if="form.shape.value > 0">
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
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                        <p class="subtitle">Chanels and Angles</p>
                        <ul>
                            <li :class="{'active': form.shape.value == 1}" @click="form.shape.value = 1">
                                <span>
                                    <icon name="channel_1"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 1" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    U Chanel
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 2}" @click="form.shape.value = 2">
                                <span>
                                    <icon name="channel_2"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 2" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    J Chanel
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 3}"  @click="form.shape.value = 3">
                                <span>
                                    <icon name="channel_3"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 3" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Corner
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 4}" @click="form.shape.value = 4">
                                <span>
                                    <icon name="channel_4"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 4" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Angle
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 5}" @click="form.shape.value = 5">
                                <span>
                                    <icon name="channel_5"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 5" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Drink Rail
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
                                    Hat Chanel
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 8}"  @click="form.shape.value = 8">
                                <span>
                                    <icon name="channel_8"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 8" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Z Chanel
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
                        <div v-if="form.shape.value > 0">
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
                            <article v-if="form.shape.value == 1">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                            <article v-if="form.shape.value == 2">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                            <article v-if="form.shape.value == 3">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                                        <label>Angle C</label>
                                        <input type="text" class="input">
                                    </div>
                                    <div class="group">
                                        <label>Side D</label>
                                        <input type="text" class="input">
                                    </div>
                                    <div class="group">
                                        <label>Length</label>
                                        <input type="text" class="input">
                                    </div>
                            </article>
                            <article v-if="form.shape.value == 4">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                                    <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 5">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                                    <label>Angle C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Angle D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side E</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Angle E</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side F</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 6">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                                <label>Angle C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Angle D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side E</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Angle size A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Angle size B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 7">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                                <label>Angle C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Angle D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side E</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 8">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
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
                <article :key="2" v-if="form.shape.section == 3">
                    <div class="angles">
                        <p class="subtitle">Sheet</p>
                        <ul>
                            <li :class="{'active': form.shape.value == 1}" @click="form.shape.value = 1">
                                <span>
                                    <icon name="frame_1"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 1" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Welded Frame
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 2}" @click="form.shape.value = 2">
                                <span>
                                    <icon name="frame_2"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 2" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Sheet Frame
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 3}" @click="form.shape.value = 3">
                                <span>
                                    <icon name="frame_3"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 3" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Sheet Ring
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 4}" @click="form.shape.value = 4">
                                <span>
                                    <icon name="frame_4"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 4 " name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Rolled Ring
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
                        <div v-if="form.shape.value > 0">
                            <article class="prevs">
                                <figure>
                                    <img :src="'/img/forming/frame_angle_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/frame_length_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/frame_render_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                            </article>
                            <article v-if="form.shape.value == 1">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Side A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 2">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Side A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Inside A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Inside B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Inside C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Side D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Inside D</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 3">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Radius A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Radius B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 4">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                    <label>Radius A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                    <label>Radius B</label>
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
                <article :key="3" v-if="form.shape.section == 4">
                    <div class="angles">
                        <p class="subtitle">Sheet</p>
                        <ul>
                            <li :class="{'active': form.shape.value == 1}" @click="form.shape.value = 1">
                                <span>
                                    <icon name="panel_1"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 1" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Welded Frame
                                </span>
                            </li>
                            <li :class="{'active': form.shape.value == 2}" @click="form.shape.value = 2">
                                <span>
                                    <icon name="panel_2"></icon>
                                </span>
                                <span class="radio">
                                    <icon v-if="form.shape.value == 2" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    Sheet Frame
                                </span>
                            </li>
                        </ul>
                        <p class="text"  @click="form.shape.value = 0">
                            <icon v-if="form.shape.value == 0" name="radio_on"></icon> 
                            <icon v-else name="radio_off"></icon> 
                            <span>
                                Can’t find the shape that you need, no problem send us your exact specificationsn we can do it.
                            </span>
                        </p>
                    </div>
                    <div class="group sizes">
                        <p class="subtitle">Sizes</p>
                        <div v-if="form.shape.value > 0">
                            <article class="prevs">
                                <figure>
                                    <img :src="'/img/forming/panel_angle_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/panel_length_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                                <figure>
                                    <img :src="'/img/forming/panel_render_'+form.shape.value+'.jpg'" alt="">
                                </figure>
                            </article>
                            <article v-if="form.shape.value == 1">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                <label>Side A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side C</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Side D</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
                            <article v-if="form.shape.value == 2">
                                <p style="display: none;" class="must">You must fill all inputs here</p>
                                <p class="text">Inch Measure</p>
                                <div class="group">
                                <label>Radius A</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Radius B</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="group">
                                <label>Length</label>
                                    <input type="text" class="input">
                                </div>
                            </article>
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
        <div v-if="!wizz" class="group contact">
            <p class="subtitle">Contact Information</p>
            <div>
                <div class="group" v-for="(field, index) in form.contact">
                    <span class="must" v-if="field.alert.status">{{field.alert.text}}</span>
                    <input v-if="field.type !== 'textarea'" :ref="field.ref" :required="field.required" :type="field.type" class="input" :placeholder="field.ph" v-model="field.value">
                    <textarea v-if="field.type === 'textarea'" :ref="field.ref" :placeholder="field.ph" rows="10" class="input" v-model="field.value"></textarea>
                </div>
            </div>
        </div>        
        <wizzard :forming="true"></wizzard>
        <button class="btn" @click="validate()">Send</button>
    </article>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('useWizzard', () => {
            this.wizz = true;
        }).$on('sendInfo', ($event) => {
            this.form.contact = $event;
            
        });
        var este = this;
        axios.get('/forming-materials').then((materials) => {
            este.materials = materials.data
            este.form.material = este.materials[0].id
            este.gauges = este.materials[0].gauges
            este.image = este.materials[0].gauges[0].archivo
        })
    },
    data(){
        return{
            wizz: false,
            sent: false,
            materials: null,
            gauges: null,
            image: null,
            form: {
                material: 1,
                gauge: '30',
                shape: {
                    section: 1,
                    value: 1
                },
                sizes: false,
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
                        ref: 'message',
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
        testMail(mail){
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(mail).toLowerCase());
        },
        setMaterial(mat){
            this.form.material = mat.id
            this.gauges = mat.gauges            
            this.image = mat.gauges[0].archivo            
        },
        addFinish(index){
            var pos = this.form.finish.indexOf(index);
            if(pos != -1){
                this.form.finish.splice(pos, 1);
            }else{
                this.form.finish.push(index);
            }            
        },
        validate(){
            var sizes = $('.sizes').find('input'),
                s= [];
                s['sizes'] = []
                s['q'] = null
            for (let i = 0; i < sizes.length-1; i++) {
                const element = sizes[i];
                if(element.value !== ''){
                    s['sizes'].push(element.value)
                    $('.sizes').find('.must:first').css('display', 'none')
                }else{
                    $('.sizes').find('.must:first').css('display', 'block')
                }
            }
               if(sizes[sizes.length-1].value !== ''){
                    s['q'] = sizes[sizes.length-1].value
                    this.form.sizes = s['sizes'];
                    this.form.sizes.qty = s['q'];
                    $('.sizes').find('.must:first').css('display', 'none')
               }else{
                   $('.sizes').find('.must:first').css('display', 'block')
               }
            
            if(!this.wizz){               
                var este = this,
                    loo = Object.keys(this.form.contact),
                    alles = true;
                for (let i = 0; i < loo.length; i++) {
                    const element = este.form.contact[i];                
                    if(element.required){
                        element.alert.status = false;
                        if(element.value != null){
                            if(element.type == 'email'){
                                if(!este.testMail(element.value)){
                                    element.alert.status = true;
                                    alles = false;
                                    break;   
                                }
                            }
                        }else{
                            element.alert.status = true;
                            alles = false;
                            break;
                        }
                    }
                }

                if(alles && this.form.sizes){
                    this.send();
                }

            }else{
                if(this.form.sizes){
                    this.send();
                }
            }            
        },
        send(){
            var este = this,
                formData = new FormData();

                formData.append('string', JSON.stringify(this.form));
                formData.append('archivo', this.form.contact.file);
                console.log(this.form.sizes);
            axios.post('/services/send-forming', formData).then((response) => {
                este.$bus.$emit('sentForming');                
            });
        }
    }
}
</script>
