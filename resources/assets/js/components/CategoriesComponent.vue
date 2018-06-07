<template>
    <aside class="menu">
        <p class="menu-label">
            <b>Categories</b>
        </p>

        <ul class="menu-list">
            <category-item v-for="(category, index)  in categories"  :key="category.id" :category="category"></category-item>
        </ul>
    </aside>
</template>

<script>
    export default{
        created(){
            // получаем дерево категорий
            this.getCategoriesList();
        },

        data(){
            return {
                // список категорий
                categories : []
            }
        },

        methods:{
            getCategoriesList(){
                // отпарвляем запрос
                this.$http.get('/categories').then(response => {
                    // получаем список
                    this.categories = response.body;
                }, response => {
                    // error callback
                });
            }
        }
    }
</script>
