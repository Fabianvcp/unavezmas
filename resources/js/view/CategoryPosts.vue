<template>
    <div>
        <paginator :url="`/api/categorias/${this.category}`" component-name="posts-list" ></paginator>

    </div>
</template>
<script>
    export default{
        props:['category']
    }
</script>
