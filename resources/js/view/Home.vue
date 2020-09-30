<template>
    <div id="home">
        <paginator url="/api/posts" component-name="posts-list" ></paginator>


    </div>
</template>

<style lang="scss">
    .pagination{
        a.active,a:hover{
            background-color: #1abc9c;
            color: #ffffff;
        }
    }
</style>
