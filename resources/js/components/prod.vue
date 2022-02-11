<style >
 #loaderProd {
     position: absolute;
     left: 50%;
     top: 50%;
     z-index: 1;
     width: 120px;
     height: 120px;
     margin: -76px 0 0 -76px;
     border: 16px solid #f3f3f3;
     border-radius: 50%;
     border-top: 16px solid #3498db;
     -webkit-animation: spin 2s linear infinite;
     animation: spin 2s linear infinite;
 }
 
 @-webkit-keyframes spin {
     0% {
         -webkit-transform: rotate(0deg);
     }
     100% {
         -webkit-transform: rotate(360deg);
     }
 }
 
 @keyframes spin {
     0% {
         transform: rotate(0deg);
     }
     100% {
         transform: rotate(360deg);
     }
 }
 /* Add animation to "page content" */
 
 .animate-bottom {
     position: relative;
     -webkit-animation-name: animatebottom;
     -webkit-animation-duration: 1s;
     animation-name: animatebottom;
     animation-duration: 1s
 }
 
 @-webkit-keyframes animatebottom {
     from {
         bottom: -100px;
         opacity: 0
     }
     to {
         bottom: 0px;
         opacity: 1
     }
 }
 
 @keyframes animatebottom {
     from {
         bottom: -100px;
         opacity: 0
     }
     to {
         bottom: 0;
         opacity: 1
     }
 }
 
 #myDivProd {
     display: none;
     text-align: center;
 }
</style>
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
            let url = window.location.origin + "/prod/getProd/407";
            console.log(url);
            var x = this;
            axios({
                method: 'get',
                url: url,
                data:{},
                responseType: 'json'
            }).then(function (response) {
                x.prod = response.data;
                setTimeout(parent.showPage(),2000);
                document.getElementById("myDivProd").style.display = "block" ;
                document.getElementById("loaderProd").style.display = "none";
            });
           
            Echo.channel('prod')
            /*Echo.channel("'recebida" + result + "'")*/
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

        }
    }
</script>



            
