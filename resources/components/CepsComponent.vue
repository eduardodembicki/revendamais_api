<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">

                <div class="input-container">
                    <input type="text" placeholder="Pesquisar por CEP ou Logradouro" v-model="searchString" />
                </div>
                
                <transition-group tag="ul" name="list-animation">
                    
                    <li class="photo photo-animated" v-for="cep in filteredCeps" v-bind:key="cep.cep">
                        <span class="author">{{ cep.cep }}</span>
                        <span class="author">{{ cep.logradouro }}</span>
                    </li>
                    
                </transition-group>

                </div>
            </div>
        </div>
    </div>
</div>
</template>
<style scoped>
* {
	margin: 0;
	padding: 0;
}

input:focus,
select:focus,
textarea:focus,
button:focus {
    outline: none;
}

html {
    overflow-y:scroll;
}

body {
	display: grid;
    grid-template-rows: 150px 1fr;
    background-color: #f5f5f5;
	font-family: 'Roboto Slab', serif;
	margin-bottom: 10px;
}

header {
	display: grid;
	color: white;
	background: #6D25BC;
}

header h1 {
	place-self: center;
	font-size: 42px;
}

#app-instasearch {
	place-self: center;	
	margin-top: 30px;
	width: 600px;
}

.input-container {
	border-radius: 5px;
	background: #677482;
	padding: 10px;
}

.input-container input {
	border: none;
	background: transparent;
	color: white;
	padding: 6px 15px;
	font-size: 18px;
    width: 100%;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #a6b0ba;
  opacity: 1; /* Firefox */
}

.photo {
	list-style: none;
	display: grid;
	grid-template-columns: 200px auto;
	margin-top: 20px;
	align-items: center;
	background-color: #e9edf0;
	padding: 30px 50px;
	border-radius: 5px;
	border: 1px solid #e3e3e3;
}

.author {
	font-size: 25px;
	margin-left: 20px;
	color: #75818e;
}

.photo img {
	border-radius: 5px;
	width: 200px;
}

.photo-animated {
	transition: all 0.5s;
}

.list-animation-enter, .list-animation-leave-to {
	opacity: 0;
	transform: translateY(30px);
}

.list-animation-leave-active {
	position: absolute;
}
</style>
<script>
    export default {

        data() {
            return {
                searchString: "",
		        dadosRetorno: null
            }
        },        
        methods: {
            async load() {
                const requestOptions = {
                    method: 'GET',                
                };      
                const response = await fetch('/api/cep', requestOptions);
                const objCeps = await response.json();
                this.dadosRetorno = objCeps
                console.log(this.dadosRetorno)
            }
        },
        computed: {
            filteredCeps: function () {
			
                var cepRetorno = this.dadosRetorno;
                var search = this.searchString;

                if(!search){
                    return cepRetorno;
                }
                                            
                search = search.trim().toLowerCase();
    
                cepRetorno = cepRetorno.filter(function(item){
                    if(item.cep.toLowerCase().indexOf(search) !== -1){
                        return item;
                    }
                    if(item.logradouro.toLowerCase().indexOf(search) !== -1){
                        return item;
                    }
                })

                return cepRetorno;
            }
        },
        mounted(){
            this.load();
        }
    }
</script> 