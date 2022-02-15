<template>
    <div>
        <div id="loaderProd"></div>
        <div style="display:none;" id="myDivProd" class="animate-bottom">
        <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Example Component Prod  {{prod.titulo}}</div>

                                <div  v-if="prod.plataforma_tipo_curso_id == 1" >
                                    <div  v-if="prod.chat_moderado == 1" >
                                        moderado
                                        <moderatedChat></moderatedChat>
                                    </div>                        
                                    <div  v-if="prod.chat_moderado == 0" >
                                    chat
                                    <chat></chat>
                                    </div>
                                </div>
                                <div  v-if="prod.plataforma_tipo_curso_id == 2" >
                                    box
                                    <boxQuestion></boxQuestion>
                                </div>
                                
                                <div class="card-body">
                                    I'm an example component Prod.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>        
</template>
<script>
    import chat from "./chat.vue";
    import moderatedChat from "./moderatedChat.vue";
    import boxQuestion from "./boxQuestion.vue";
    export default {
        props: ['user','user_id','user_email','user_name','prod_id'],
        components: {
            chat:chat
            , moderatedChat:moderatedChat
            , boxQuestion:boxQuestion
        },    
        data(){
            return{
                prod: ""                
            }
        },
        mounted() {           
            console.log('Component mounted.');
            console.log(window.location.origin);
            //this.user.id = this.user_id;
            //this.user.name = this.user_name;
            //this.user.email = this.user_email;            
            let url = window.location.origin + "/prod/getProd/"+ this.prod_id;
            console.log(url);
            var x = this;
            axios({
                method: 'get',
                url: url,
                data:{},
                responseType: 'json'
            }).then(function (response) {
                x.prod = response.data;
                document.getElementById("myDivProd").style.display = "block" ;
                document.getElementById("loaderProd").style.display = "none";
            });
            console.log("prod_"+ this.prod_id);
            Echo.join("prod_"+ this.prod_id)
            .here(users => { this.users = users })
            .joining(user => this.users.push(user))
            .leaving(user => _.remove(this.users, user))
            .listen('Prod', e => {
                console.log(e)
            })
            
            
            
            /*
            Echo.join('Prod')
            .here((users) => {
                //
                console.log(user.name);
            })
            .joining((user) => {
                console.log(user.name);
            })
            .leaving((user) => {
                console.log(user.name);
            }); 

            
           /*
            Echo.channel('prod')
            /*Echo.channel("'recebida" + result + "'")
            .listen('Prod',(e) => {
                document.getElementById("myDivProd").style.display = "none" ;
                document.getElementById("loaderProd").style.display = "block";
                
                console.log('Acessou');
                console.log(e);
                x.prod = e.prod;
                
                setTimeout(() => {  
                    document.getElementById("myDivProd").style.display = "block" ;
                    document.getElementById("loaderProd").style.display = "none";
                }, 2000);
                                              
            });
            */      
        }
    }
</script>



            
