<template>
    <section class="about">
        <div class="container">
            <h1>About Me</h1>

            <p>
                Welcome to My Portfolio.
            </p>

            <p>
                This  Portfolio is built using Laravel and Vue.js.
                We create modern and user-friendly web applications.
            </p>

            <div class="about-cards">

                <div class="card">
                    <h2>Our Mission</h2>
                    <p>
                        Our mission is to build simple, reliable and
                        high-quality web applications.
                    </p>
                </div>

                <div class="card">
                    <h2>Our Vision</h2>
                    <p>
                        Our vision is to create modern digital experiences
                        using the latest technologies.
                    </p>
                </div>

                <div class="card">
                    <h2>Our Values</h2>
                    <p>
                        We believe in quality, innovation and customer
                        satisfaction.
                    </p>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'About'
}
</script>

<style scoped>
.about {
    padding: 50px 0;
}

.container {
    width: 80%;
    max-width: 1100px;
    margin: auto;
}

.about h1 {
    text-align: center;
    font-size: 36px;
    margin-bottom: 20px;
}

.about > .container > p {
    text-align: center;
    line-height: 1.7;
}

.about-cards {
    display: flex;
    gap: 25px;
    margin-top: 40px;
}

.card {
    flex: 1;
    padding: 25px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.card h2 {
    font-size: 20px;
}

.card p {
    line-height: 1.6;
}

@media (max-width: 768px) {
    .about-cards {
        flex-direction: column;
    }
}
</style>