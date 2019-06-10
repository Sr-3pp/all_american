<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/shear.jpg" alt="shear services">
            <icon name="preparation"></icon>
        </figure>
        <p class="title">
            Shear
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            Material cutting service, adjusted to the
            specific measures that you need. We offer
            shearing services, since it is a fast and efficient way to cut metal sheets, you can get
            custom size cuts either for specific cut only
            or future work of material forming, welding,
            polishing or painting.
            <icon name="star_panel2"></icon>
        </p>
        <p class="title">
                WHAT IS SHEET METAL<br>THICKNESS “GAUGES”?
            </p>
            <p class="text full">
                When we working with sheet metal it is very common that you heard the term
                "caliber" to design the thickness of a metal sheet, but what exactly is <b>METAL
                THICKNESS SHEET "GAUGES"?</b> It is possible that you are not familiar with
                this industry, do not understand how this unit of measure for the metal works,
                so we can take into account that a smaller number will be thicker metal sheet,
                therefore a 7 gauge steel is thicker than a steel caliber 10.
            </p>
            <div class="title">
                HOW TO WORK WITH<br>THE “GAUGES” SISTEM?
            </div>
            <div class="text full">
                The caliber unit is used to specify the thickness of a metal sheet, this is not
                specified in metric or inch measurements. but you can use a conversion table
                to know the real value in inches of sheet metal, it is important to know that
                caliber 18 stainless steel measuring 0.048 "inches is not the same as an 18
                gauge brass measuring 0.040" this variables are correct.
            </div>
        <div class="blue-table" v-for="(m, index) in materials">
            <p class="subtitle">{{m.name}}</p>
            <table>
                <thead>
                    <tr>
                        <th>Gauge</th>
                        <th>Thickness</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(g, i) in m.gauges">
                        <td>{{g.gauge}}</td>
                        <td>
                            {{g.thick}}
                            <p class="line-progress">
                                <span></span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="s-text">
                3/16” Inch is Plate
            </p>
        </div>
        <figure class="image">
            <img src="/img/shear_machine.jpg" alt="">
            <p class="category">Shear Machine</p>
        </figure>
        <p class="title">
            MORE CUT SYSTEM SERVICE
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text empty">
            <icon name="star_panel2"></icon>
        </p>
        <div class="info">
            <article>
                <p class="title">
                    Plasma
                </p>
                <div class="text full">
                    Plasma cutting is a process that uses a nozzle, with a hole for the circulation
                    of the ionized gas at high temperatures, in such a way that a beam is obtained
                    that can be used to cut sections of metals such as carbon steel, steel stainless
                    steel, aluminum and other conductive metals of electricity. Through the use of
                    this technique, the plasma arc and the gas eliminate the molten material.
                </div>
            </article>
            <article>
                <p class="title">
                    WATERJET
                </p>
                <div class="text full">
                    This mechanical process, through which it is possible to make precision cuts,
                    impact a jet of water at high speed, this is a cold cutting process, so that your
                    material will not be affected or deformed in its execution by the application of hot. <br><br>
                    With this revolutionary system, it is possible to locate any type of material and
                    the benefits of the advantages in its application. It is also a quick system compared to other cutting methods.
                </div>
            </article>
            <article>
                <p class="title">
                    OXY-FUEL CUTTING
                </p>
                <div class="text full">
                    This system uses a combustible gas that produces a flame that heats the material to cut it, it is an ideal system to cut thick material.
                </div>
            </article>
            <article>
                <p class="title">
                    LASER
                </p>
                <div class="text full">
                    Is a technique used to cut pieces of sheet metal characterized in that its
                    energy source is a laser that concentrates light on the work surface. This is a
                    thermal process that uses the melting or evaporation of the metal sheet, to be
                    a robotic process you get an exact cutting precision.
                </div>
            </article>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        var este = this;
        axios.get('/get-shear-gauges').then((materials) => {
            este.materials = materials.data
        });
    },
    data(){
        return {
            materials: null
        }
    },
    methods: {

    }
}
</script>
