<script setup lang="ts">

type Produtos = {
    id: number,
    name: string,
    description: string,
    price: number,
    stock: number
}

defineProps<{produtos: Produtos[]}>();

</script>
<template>

    <div>

    <h3>Lista de produtos:</h3>

    <p v-if="produtos.length === 0">Nenhum produto cadastrado...</p>
    <ul v-else>
        <li v-for="produto in produtos":key="produto.id">
            <p><strong>Nome:</strong> {{ produto.name }}</p>
            <p><strong>Descrição:</strong> {{ produto.description }}</p>
            <p><strong>Preço:</strong> {{ produto.price }}</p>
            <p><strong>Stock:</strong> {{ produto.stock }}</p>
            <button>Detalhes</button>
        </li>
    </ul>
    </div>

    <p></p>

</template>