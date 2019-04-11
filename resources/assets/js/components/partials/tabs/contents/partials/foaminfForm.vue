<template>
    <article class="foaming-form form">
        <h3 class="subtitle">Angles and chanels</h3>
        <div class="group material">
            <p class="subtitle">Material</p>
            <div>
                <p>
                    <span class="radio">
                        <icon name="radio_off"></icon>
                        Stainless steel
                    </span>
                    <span class="radio">
                        <icon name="radio_off"></icon>
                        Brass
                    </span>
                    <span class="radio">
                        <icon name="radio_off"></icon>
                        Aluminium
                    </span>
                    <span class="radio">
                        <icon name="radio_off"></icon>
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
                                <icon name="radio_off"></icon> 30
                            </td>
                            <td>
                                0.010"
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="group shape">
            <ul>
                <li>Sheet</li>
                <li>Sheet</li>
                <li class="active">Channel and angles</li>
                <li>Frames</li>
                <li>Panels</li>
            </ul>
            <transition-group tag="div" class="content">
                <div :key="0" class="angles">
                    <p class="subtitle">Channels and Angles</p>
                    <ul>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li class="active">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                        <li>
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                                <icon name="radio_off"></icon> Channel w/ Hands
                            </span>
                        </li>
                    </ul>
                    <p class="text">
                            <input class="hidden" type="radio" name="channel" v-model="form.shape.value">
                            <icon name="radio_off"></icon>
                        <span>
                            Can’t fiand the shape that you need, no problem send us your exact specificationsn we can do it.
                        </span>
                    </p>
                </div>
            </transition-group>
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
                material: 'stainless',
                gauge: '30',
                shape: {
                    section: 1,
                    value: 0
                },

            }
        }
    },
    methods: {

    }
}
</script>
