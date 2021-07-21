<template>
    <div class="container">
        <div class="row justify-content-center">

                <fieldset>
                    <legend>Busca  </legend>
                    <form action="/sms" method="post" >
                    <div class="card-content">
                        <div class="input-field col s6">
                            <input id="ds_nome" type="text" class="validate">
                            <label for="ds_nome">Nome</label>
                        </div>
                        <div class="input-field col s3">
                            <input v-model="nr_atendimento" id="nr_atendimento" type="text"  name="nr_atendimento" class="validate">
                            <label for="nr_atendimento">Atendimento</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="nr_telefone" type="text" name="nr_telefone" class="validate">
                            <label for="nr_telefone">Fone</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="message" type="text" name="message" class="validate">
                            <label for="message">Mensagen</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar </button>
                    </div>
                    </form>
                </fieldset>
        </div>
    </div>
</template>

<script>
export default {

    mounted() {
        console.log('Component mounted.')
    }

}
</script>
