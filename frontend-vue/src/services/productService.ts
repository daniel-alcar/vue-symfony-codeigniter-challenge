import axios from "axios";

const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL
})

export const productService = {
    async getAll(){

        return await api.get('/api/products')

    },

    async create(products: any){

        return await api.post('/api/products', products)
    },

    async get(id: number){
        return await api.get('/api/products/${id}')
    }

}