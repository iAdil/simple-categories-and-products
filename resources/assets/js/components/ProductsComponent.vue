<template>
	<div v-if="loading" class=" has-text-centered">
		<img src="/images/ajax.gif" alt="Loading...">
	</div>
	<div v-else>
		<div class="products">
			<div class="columns is-multiline" v-if="products.length > 0">
				<product-item  v-for="(product, index)  in products" :product="product" ></product-item>
			</div>
			<div v-else>
				<div class="notification is-danger">
					There no products in category.
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import ProductItem from './ProductItem.vue';

    export default{
        components: {
            ProductItem
		},

        mounted() {
            // берем все товары без фильтрации по категории
            this.getProductsList();

            // ставим обработчик события из компонента категорий
            this.$root.$on('loadProductsByCategory', (category) => {
                this.getProductsList(category)
            })
        },

        data(){
            return {
                // показываем прелоадер
                loading: true,
                // товары
                products : []
            }
        },

        methods:{
            // возвращает список товаров
            getProductsList(category = ''){
                // показываем прелоадер
                this.loading = true

                // отправляем запрос
                this.$http.get('/products/' + category).then(response => {
                    // получаем товары
                    this.products = response.body;

                    // останавливаем прелоадер
                    this.loading = false
                }, response => {
                    // останавливаем прелоадер
                    this.loading = false
                });
            },
        }
    }
</script>
