<template>

    <article class="post">

        <div class="content-post">
            <post-header :post="post" ></post-header>
            <p v-html="post.excerpt"></p>
            <footer class="container-flex space-between">
                <div class="read-more">
                    <post-link :post="post"  class="text-uppercase c-green">Leer más</post-link>

                </div>
                <div class="tags container-flex">
                        <span class="tag c-gris text-capitalize" v-for="tag in post.tags">
                            <tag-link :tag="tag"></tag-link>
                        </span>
                </div>
            </footer>
        </div>
    </article>

</template>
<script>
    export default {
        props: ['post']
    }
</script>
