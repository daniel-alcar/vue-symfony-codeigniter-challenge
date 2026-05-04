<script setup lang="ts">
import { ref } from 'vue';

const idBuscar = ref<number | null>(null);

type Produto = {
  id: number,
  name: string,
  description: string,
  price: number,
  stock: number
}

const props = defineProps<{ produtos: Produto[] }>();
const produtoDetalhado = ref<Produto | null>(null);


function buscar() {

  if (idBuscar.value === null) return;

  produtoDetalhado.value = props.produtos.find(p => p.id === idBuscar.value) || null;


}

</script>

<template>
    <h3>Buscar produto por ID</h3>

    <input type="number" v-model="idBuscar">
    <button @click="buscar">Buscar</button>

    <ul>
        <li v-if="produtoDetalhado">
            <p>{{ produtoDetalhado.name }}</p>
            <p>{{ produtoDetalhado.description }}</p>
            <p>{{ produtoDetalhado.price }}</p>
            <p>{{ produtoDetalhado.stock }}</p>
        </li>
    </ul>

</template>