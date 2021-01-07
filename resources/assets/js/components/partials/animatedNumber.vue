<template>
    <span>{{displayNumber}}</span>
</template>
<script>
export default {
    mounted(){
        var este = this;
        $(window).on('scroll', function($e){
            var who = $('.animated-numbers'),
                stop = $(document).scrollTop(),
                position = who.offset(),
                h1 = $(window).innerHeight() - who.innerHeight(),
                visible = position.top - h1;
                if(visible <= stop){
                    este.number = este.target
                }else if(visible + who.innerHeight() >= stop){
                    este.number = 0;
                }
            
            
        })
    },
    props: [
        'target'
    ],
    data(){
        return{
            displayNumber: 0,
            number: 0,
            interval: false
        }
    },
    methods: {

    },
    watch: {
        number: function(){
            clearInterval(this.interval);
        
            if(this.number == this.displayNumber){
                return;
            }
        
            this.interval = window.setInterval(function(){
            
                if(this.displayNumber != this.number){
            
                    var change = (this.number - this.displayNumber) / 10;
                
                change = change >= 0 ? Math.ceil(change) : Math.floor(change);
            
                this.displayNumber = this.displayNumber + change;
            
            }
            
            }.bind(this), 20);
        }
    }
}
</script>
