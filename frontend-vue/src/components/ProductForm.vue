<script setup lang="ts">
import { ref } from 'vue';


const emit = defineEmits(['cadastrar'])

const name = ref("");
const description = ref("");
const price = ref<number>(0)
const stock = ref<number>(0)

function cadastrar(){

    emit('cadastrar', {
        name: name.value, 
        description: description.value, 
        price: price.value, 
        stock: stock.value
        }
    )

    name.value = "";
    description.value = "";
    price.value = 0;
    stock.value = 0;
    
}

</script>

<template>

<div>
  <h3>Formulário de Cadastro de Produtos</h3>

  <div>
    <label>Produto</label>
    <input type="text" v-model="name"/>
  </div>

  <div>
    <label>Descrição</label>
    <input type="text" v-model="description"/>
  </div>

  <div>
    <label>Preço</label>
    <input type="number" v-model.number="price" />
  </div>

  <div>
    <label>Quantidade em estoque</label>
    <input type="number" v-model.number="stock"/>
  </div>

  <button @click="cadastrar">
    Cadastrar
  </button>
</div>


</template>