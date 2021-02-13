let index=require('./components/Index').default;
let listPage=require('./components/ListPage').default;
let detailPage=require('./components/DetailPage').default;

export const  routes=[
    {path:'/',components:{"view":index},name:'index'},
    {path:'/category/:categoryId',components: {"view":listPage},name:'listpage'},
    {path:'/product/:productId',components: {"view":detailPage},name:'detailpage'},
]
