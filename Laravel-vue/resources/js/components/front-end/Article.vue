<template>
    <div class="article-list">

        <!-- Article 1 -->
        <article class="article-card">

            <h3>Getting Started with Vue.js</h3>

            <p>
                Vue.js is a progressive JavaScript framework
                for building user interfaces and single-page applications.
            </p>

            <button @click="readArticle">
                Read Article
            </button>

        </article>


        <!-- Article 2 -->
        <article class="article-card">

            <h3>Learning Laravel and Vue</h3>

            <p>
                Laravel can be combined with Vue.js to create
                modern and interactive web applications.
            </p>

            <button @click="readArticle">
                Read Article
            </button>

        </article>


        <!-- Article 3 -->
        <article class="article-card">

            <h3>Understanding Vue Components</h3>

            <p>
                Components allow you to divide a Vue application
                into smaller and reusable pieces.
            </p>

            <button @click="readArticle">
                Read Article
            </button>

        </article>

    </div>
</template>


<script>
export default {
    name: 'Article',

    methods: {
        readArticle() {
            alert('Article clicked!')
        }
    }
}
</script>


<style scoped>

.article-list {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}


/* Article Card */

.article-card {
    padding: 25px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.article-card h3 {
    margin-top: 0;
    margin-bottom: 15px;
}

.article-card p {
    line-height: 1.6;
    color: #555;
}


/* Button */

.article-card button {
    padding: 10px 18px;
    border: none;
    border-radius: 5px;
    background: #222;
    color: white;
    cursor: pointer;
}

.article-card button:hover {
    background: #444;
}


/* Mobile */

@media (max-width: 768px) {

    .article-list {
        grid-template-columns: 1fr;
    }

    .header-content {
        flex-direction: column;
        gap: 15px;
    }

    .hero h2 {
        font-size: 30px;
    }

}

</style>