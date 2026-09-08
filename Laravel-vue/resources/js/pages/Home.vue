<template>
    <div class="home">


        <!-- Hero Section -->
        <section class="hero">
            <div class="container">

                <h2>Welcome to My Portifolio</h2>

                <p>
                    This is my  home page.
                </p>

            </div>
        </section>


        <!-- Articles -->
        <section class="articles">
            <div class="container">

                <h2>Latest Articles</h2>

                <Article />

            </div>
        </section>

    </div>
</template>


<script>
import Header from '../components/front-end/Header.vue';
import Article from '../components/front-end/Article.vue'
import Footer from '../components/front-end/Footer.vue';

export default {
    name: 'Home',

    components: {
        Header,
        Article,
        Footer
    }
}
</script>


<style scoped>

.home {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}


/* Container */

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}


/* Header */

.header {
    background: #222;
    color: white;
    padding: 20px 0;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h1 {
    margin: 0;
}

nav {
    display: flex;
    gap: 20px;
}

nav a {
    color: white;
    text-decoration: none;
}

nav a:hover {
    text-decoration: underline;
}


/* Hero */

.hero {
    padding: 80px 0;
    text-align: center;
    background: #f5f5f5;
}

.hero h2 {
    font-size: 40px;
    margin-bottom: 15px;
}

.hero p {
    font-size: 18px;
}


/* Articles */

.articles {
    flex: 1;
    padding: 50px 0;
}

.articles h2 {
    margin-bottom: 30px;
}


/* Footer */



</style>
