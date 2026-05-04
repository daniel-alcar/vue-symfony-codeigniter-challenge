<script setup lang="ts">
import Form from "./components/ProductForm.vue"
import List from "./components/ProductList.vue"
import Details from "./components/ProductDetails.vue"
import { productService } from "./services/productService"
import { onMounted } from "vue"
import { ref } from 'vue'


const products = ref([])
const loading = ref(false)
const error = ref("")

async function carregar() {
  try {
    loading.value = true
    const response = await productService.getAll()
    products.value = response.data.payload
  } catch (e) {
    error.value = 'Não foi possível buscar produtos'
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  carregar()
})


async function cadastrar(products: any){
    await productService.create(products)

    carregar()
}



</script>

<template>
<p v-if="loading">Carregando página...</p>

<div v-else>
    <Details
    :produtos="products"
    />
    <Form @cadastrar="cadastrar"/>
    <List :produtos="products"/>

</div>
</template>