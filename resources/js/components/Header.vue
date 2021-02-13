<template>
    <div>
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">

                <div class="col-12 text-center">
                    <router-link :to="{name:'index'}" class="blog-header-logo text-dark" href="#">Mini E-Commerce</router-link>
                </div>

            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav ">

                <router-link v-for="category in categoryList" :key="category.id" :to="{ name: 'listpage', params: { categoryId: category.id }}" class="p-2 text-muted">{{ category.name }}</router-link>

            </nav>
        </div>
    </div>

</template>

<script>
export default {
    name: "Header",
    data(){
        return{
            categoryList:[],
        }
    },
    methods:{
        async getCategories(){
            await axios.get("/api/get-categories")
            .then(res => {
                this.categoryList=res.data.data;
            })

        }
    },

    created() {
        this.getCategories();
    },

}
</script>

<style scoped>
 a{
     width: 90px !important;
 }


</style>
