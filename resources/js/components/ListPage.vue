<template>
    <div>
        <div class="col-md-12 row mb-4 mt-4">

            <div v-for="product in productList" class="col-md-3 mt-3">
                <div class="card" style="width: 15rem;">
                    <router-link :to="{ name: 'detailpage', params: { productId: product.id }}" ><img class="card-img-top" :src="product.image" >
                    </router-link>
                    <div class="card-body">
                        <router-link :to="{ name: 'detailpage', params: { productId: product.id }}" class="card-title">{{product.name}}</router-link>
                        <p class="card-text">{{strFormat(product.description,50)}}</p>
                    </div>
                    <div class="card-footer">
                        <p>Price:<s> {{product.price}}</s></p>
                        <p>discounted price:{{numberFormat(product.price-product.discount_amount)}}</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="m-auto" >
                <ul class="pagination pagination-lg">
                    <li v-for="i in pageCount" class="page-item " :class="{'disabled' : i==currentPage}" @click="getData(currentCategory,i)">
                        <a class="page-link" href="#" tabindex="-1">{{i}}</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListPage",
    data(){
        return{
            productList:[],
            currentPage:1,
            pageCount:'',
            currentCategory:'',

        }
    },
    created() {
        this.currentCategory=this.$route.params.categoryId
        this.getData(this.currentCategory,this.currentPage);

    },
    watch: {
        '$route.params.categoryId': function (categoryId) {
            this.currentPage=1;
            this.currentCategory=categoryId;
            this.getData(this.currentCategory,this.currentPage);
        }

    },
    methods:{
        async getData(categoryId,page){
            console.log(categoryId,page)
            await axios("/api/get-categoriesproduct/"+categoryId+"/"+page)
                .then(res => {
                    this.productList=res.data.data
                    this.currentPage=res.data.meta.pagination.page;
                    this.pageCount=res.data.meta.pagination.pages;
            }).catch(e => {

            })
        },
        numberFormat(data){
            return data.toFixed(2);
        },
        strFormat(data,num){
            return data.slice(data,num)+"...";
        }
    }
}
</script>

<style scoped>
    .card-body{
        min-height: 150px !important;
    }
</style>
