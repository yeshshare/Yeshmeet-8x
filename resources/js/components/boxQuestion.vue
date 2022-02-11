<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm a Box question.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                iten: ""
            }
        },
        mounted() {
            console.log('Component mounted.');
            /* 
            Echo.channel('chat')

            /*Echo.channel("'recebida" + result + "'")x
                .listen('Chat',(e) => {
               //this.msgs.push(e);
               //this.$nextTick(() => this.scrollToEnd());
                console.log('Acessou');
                console.log(e);
               //alert(e);
            });
            */
        }
    }
</script>
