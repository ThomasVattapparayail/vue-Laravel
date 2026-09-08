<template>
    <section class="about">
        <div class="container">

            <h1>{{ about.title }}</h1>

            <p>
                {{ about.description }}
            </p>

            <!-- Programming Languages -->
            <div class="skills">
                <h2>Programming Languages</h2>

                <div class="skill-list">
                    <span
                        v-for="language in about.programming_languages"
                        :key="language"
                        class="skill"
                    >
                        {{ language }}
                    </span>
                </div>
            </div>

            <!-- Frameworks -->
            <div class="skills">
                <h2>Frameworks & Technologies</h2>

                <div class="skill-list">
                    <span
                        v-for="framework in about.frameworks"
                        :key="framework"
                        class="skill"
                    >
                        {{ framework }}
                    </span>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {

    name: 'About',

    data() {
        return {
            about: {
                title: '',
                description: '',
                programming_languages: [],
                frameworks: []
            }
        }
    },

    mounted() {
        this.getAbout()
    },

    methods: {

        async getAbout() {

            try {

                const response = await axios.get('/api/about')

                this.about = response.data

            } catch (error) {

                console.error('Error loading about:', error)

            }
        }

    }

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

.about p {
    text-align: center;
    line-height: 1.7;
}

.skills {
    margin-top: 40px;
}

.skills h2 {
    margin-bottom: 20px;
}

.skill-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.skill {
    padding: 10px 15px;
    background: #222;
    color: white;
    border-radius: 5px;
}

</style>