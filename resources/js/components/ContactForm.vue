<template>

    <transition name="rotateDownLeft" mode="out-in">
     <div class="form-contact">
        <form>
            <div class="input-container container-flex space-between">
                <input v-model="form.name" type="text" placeholder="Nombre" class="input-name" required>
                <input v-model="form.email" type="text" placeholder="Email" class="input-email" required>
            </div>
            <div class="input-container">
                <input v-model="form.subject" type="text" placeholder="Asunto" class="input-subject" required>
            </div>
            <div class="input-container">
                <textarea v-model="form.message" cols="30" rows="10" placeholder="Ingrese su mensaje" required></textarea>
            </div>
            <div class="send-message">
                <button @click="EnviarEmail"  class="text-uppercase c-green" :disable="working">
                    <span v-if="working">Enviando</span>
                    <span v-else>Enviar mensaje</span>
                </button>
                <loader v-show="showloader"></loader>
            </div>
        </form>
         <div v-show="errorContacto" class="alert alert-danger row div-error">
             <div class="text-center text-error">
                 <div v-for="error in errorMostrarMsjContacto" :key="error" v-text="error">

                 </div>
             </div>
         </div>
    </div>
    </transition>

</template>
<script>
    export default {
        mounted(){

        },
        data(){
            return{
                sent:false,
                working:false,
                form:{
                    name:'',
                    email:'',
                    subject:'',
                    message:'',
                    errorContacto:0,
                    errorMostrarMsjContacto:[],
                    showLoader:false,
                }
            }
        },
        methods:{
            EnviarEmail(){

                if (this.validarFormulario()){
                    return;
                }
                this.working = true;
                var data = new FormData();
                data.append('name', this.name);
                data.append('email',this.email);
                data.append('subject', this.subject);
                data.append('message', this.message);
                this.showLoader = true;
                axios.post('/api/messages',data ).then((response) => {
                        this.showLoader = false;
                        this.sent = true;
                        this.working = false;
                        this.ResetForm()
                    })
                    .catch((error)=>{
                        console.log(error);
                    });
            }
        }
    }
</script>
