```vue
<template>
    <div class="home">

        <!-- Hero Section -->
        <section class="hero">
            <div class="container hero-content">

                <div class="hero-text">

                    <p class="intro">
                        Hello, I'm
                    </p>

                    <h1>
                        Midhun Chacko
                    </h1>

                    <h2>
                        Senior Laravel Developer
                        <span>|</span>
                        Python & Django Developer
                    </h2>

                    <p class="hero-description">
                        Senior software developer with 5+ years of experience
                        building scalable, secure and high-performance web
                        applications using Laravel, PHP, Vue.js, Python and Django.
                    </p>

                    <div class="hero-buttons">
                        <router-link to="/contact" class="btn primary">
                            Contact Me
                        </router-link>

                        <a
                            href="https://github.com/ThomasVattapparayail"
                            target="_blank"
                            class="btn secondary"
                        >
                            GitHub
                        </a>
                    </div>

                </div>

            </div>
        </section>


        <!-- About Summary -->
        <section class="about-section">
            <div class="container">

                <div class="section-title">
                    <p>ABOUT ME</p>
                    <h2>Building Reliable & Scalable Web Applications</h2>
                </div>

                <div class="about-content">

                    <div class="about-text">

                        <p>
                            I am a Senior Laravel Developer with over 5 years of
                            professional experience designing and developing
                            production-ready web applications.
                        </p>

                        <p>
                            My primary expertise is in PHP, Laravel, MySQL,
                            PostgreSQL, Vue.js and RESTful APIs. I also have
                            hands-on experience with Python and Django, including
                            building and deploying complete full-stack applications.
                        </p>

                        <p>
                            I specialize in system migration, payment gateway
                            integration, database optimization, API development,
                            security and application performance tuning.
                        </p>

                    </div>

                    <div class="experience-card">

                        <h3>5+</h3>

                        <p>
                            Years of Development Experience
                        </p>

                    </div>

                </div>

            </div>
        </section>


        <!-- Key Achievements -->
        <section class="achievements">
            <div class="container">

                <div class="section-title">
                    <p>ACHIEVEMENTS</p>
                    <h2>Results That Make a Difference</h2>
                </div>

                <div class="achievement-grid">

                    <div class="achievement-card">
                        <h3>30%</h3>
                        <h4>Speed Optimization</h4>
                        <p>
                            Improved application performance through efficient
                            code and database query optimization.
                        </p>
                    </div>

                    <div class="achievement-card">
                        <h3>50%</h3>
                        <h4>System Migration</h4>
                        <p>
                            Improved performance, scalability and security through
                            successful C# to Laravel migration.
                        </p>
                    </div>

                    <div class="achievement-card">
                        <h3>20%</h3>
                        <h4>Revenue Efficiency</h4>
                        <p>
                            Improved revenue efficiency through secure payment
                            gateway integrations.
                        </p>
                    </div>

                    <div class="achievement-card">
                        <h3>40%</h3>
                        <h4>API Optimization</h4>
                        <p>
                            Reduced transaction processing time through efficient
                            third-party API integrations.
                        </p>
                    </div>

                </div>

            </div>
        </section>


        <!-- Skills -->
        <section class="skills-section">
            <div class="container">

                <div class="section-title">
                    <p>TECHNOLOGIES</p>
                    <h2>My Technical Skills</h2>
                </div>

                <div class="skills-grid">

                    <div class="skill-card">
                        <h3>Backend</h3>

                        <div class="skill-list">
                            <span>PHP</span>
                            <span>Laravel</span>
                            <span>Python</span>
                            <span>Django</span>
                            <span>REST APIs</span>
                        </div>
                    </div>

                    <div class="skill-card">
                        <h3>Frontend</h3>

                        <div class="skill-list">
                            <span>JavaScript</span>
                            <span>Vue.js</span>
                            <span>HTML5</span>
                            <span>CSS3</span>
                            <span>Bootstrap</span>
                        </div>
                    </div>

                    <div class="skill-card">
                        <h3>Database</h3>

                        <div class="skill-list">
                            <span>MySQL</span>
                            <span>PostgreSQL</span>
                            <span>SQLite</span>
                            <span>Django ORM</span>
                            <span>Eloquent ORM</span>
                        </div>
                    </div>

                    <div class="skill-card">
                        <h3>Tools & DevOps</h3>

                        <div class="skill-list">
                            <span>Git</span>
                            <span>Docker</span>
                            <span>CI/CD</span>
                            <span>PHPUnit</span>
                            <span>PythonAnywhere</span>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- Featured Projects -->
        <section class="projects-section">
            <div class="container">

                <div class="section-title">
                    <p>PORTFOLIO</p>
                    <h2>Featured Projects</h2>
                </div>

                <div class="projects-grid">

                    <!-- Project 1 -->
                    <div class="project-card">

                        <div class="project-content">

                            <span class="project-number">
                                01
                            </span>

                            <h3>
                                7Sprinkles
                            </h3>

                            <h4>
                                Restaurant Ordering & Management System
                            </h4>

                            <p>
                                Full-stack restaurant ordering and management
                                platform with menu management, order processing,
                                customer management, reporting and secure online
                                payments.
                            </p>

                            <div class="technologies">
                                <span>Laravel</span>
                                <span>PHP</span>
                                <span>MySQL</span>
                                <span>JavaScript</span>
                                <span>REST API</span>
                            </div>

                            <a
                                href="https://7sprinkles.com/"
                                target="_blank"
                                class="project-link"
                            >
                                View Project →
                            </a>

                        </div>

                    </div>


                    <!-- Project 2 -->
                    <div class="project-card">

                        <div class="project-content">

                            <span class="project-number">
                                02
                            </span>

                            <h3>
                                TCED Portal
                            </h3>

                            <h4>
                                Electricity Department Portal
                            </h4>

                            <p>
                                Production web application for electricity
                                consumer services, account management, online
                                payments and backend API services.
                            </p>

                            <div class="technologies">
                                <span>Laravel</span>
                                <span>PHP</span>
                                <span>MySQL</span>
                                <span>Bootstrap</span>
                                <span>REST API</span>
                            </div>

                            <a
                                href="https://tcedonline.in/"
                                target="_blank"
                                class="project-link"
                            >
                                View Project →
                            </a>

                        </div>

                    </div>


                    <!-- Project 3 -->
                    <div class="project-card">

                        <div class="project-content">

                            <span class="project-number">
                                03
                            </span>

                            <h3>
                                CIO Bulletin Asia
                            </h3>

                            <h4>
                                Business & Technology Media Platform
                            </h4>

                            <p>
                                High-traffic business and technology platform
                                with Laravel backend modules, REST APIs,
                                authentication and content management.
                            </p>

                            <div class="technologies">
                                <span>Laravel</span>
                                <span>PHP</span>
                                <span>MySQL</span>
                                <span>JavaScript</span>
                            </div>

                            <a
                                href="https://ciobulletin.com/asia"
                                target="_blank"
                                class="project-link"
                            >
                                View Project →
                            </a>

                        </div>

                    </div>


                    <!-- Project 4 -->
                    <div class="project-card">

                        <div class="project-content">

                            <span class="project-number">
                                04
                            </span>

                            <h3>
                                City Hospital
                            </h3>

                            <h4>
                                Hospital Booking & Management Website
                            </h4>

                            <p>
                                Django-based hospital website with doctor
                                listings, departments, contact functionality
                                and online appointment booking.
                            </p>

                            <div class="technologies">
                                <span>Python</span>
                                <span>Django</span>
                                <span>Bootstrap</span>
                                <span>SQLite</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>


        <!-- Education -->
        <section class="education-section">
            <div class="container">

                <div class="section-title">
                    <p>EDUCATION</p>
                    <h2>Academic Background</h2>
                </div>

                <div class="education-card">

                    <h3>
                        Bachelor of Science in Computer Science
                    </h3>

                    <p>
                        Calicut University, Calicut, Kerala
                    </p>

                    <span>
                        2015
                    </span>

                </div>

            </div>
        </section>


        <!-- Contact CTA -->
        <section class="contact-section">
            <div class="container">

                <h2>
                    Let's Build Something Great Together
                </h2>

                <p>
                    Looking for a developer to build, modernize or optimize
                    your web application?
                </p>

                <div class="contact-buttons">

                    <router-link
                        to="/contact"
                        class="btn primary"
                    >
                        Get In Touch
                    </router-link>

                    <a
                        href="mailto:midhunchacko020@gmail.com"
                        class="btn secondary"
                    >
                        Email Me
                    </a>

                </div>

                <div class="social-links">

                    <a
                        href="https://linkedin.com/in/midhun-chacko-264b4b32b"
                        target="_blank"
                    >
                        LinkedIn
                    </a>

                    <a
                        href="https://github.com/ThomasVattapparayail"
                        target="_blank"
                    >
                        GitHub
                    </a>

                </div>

            </div>
        </section>

    </div>
</template>


<script>
export default {
    name: 'Home'
}
</script>


<style scoped>

* {
    box-sizing: border-box;
}

.home {
    width: 100%;
    color: #222;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}


/* =========================
   HERO
========================= */

.hero {
    padding: 110px 0;
    background: #f5f7fa;
}

.hero-content {
    display: flex;
    align-items: center;
    min-height: 450px;
}

.hero-text {
    max-width: 850px;
}

.intro {
    font-size: 18px;
    margin-bottom: 10px;
}

.hero h1 {
    font-size: 64px;
    margin: 0 0 10px;
    font-weight: 700;
}

.hero h2 {
    font-size: 28px;
    margin-bottom: 25px;
    font-weight: 500;
}

.hero h2 span {
    margin: 0 8px;
}

.hero-description {
    max-width: 750px;
    font-size: 18px;
    line-height: 1.8;
    color: #555;
}

.hero-buttons {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}


/* =========================
   BUTTONS
========================= */

.btn {
    display: inline-block;
    padding: 13px 25px;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.3s;
}

.btn.primary {
    background: #222;
    color: white;
}

.btn.primary:hover {
    background: #444;
}

.btn.secondary {
    border: 1px solid #222;
    color: #222;
}

.btn.secondary:hover {
    background: #222;
    color: white;
}


/* =========================
   SECTION TITLE
========================= */

.section-title {
    margin-bottom: 45px;
}

.section-title p {
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 2px;
    margin-bottom: 8px;
}

.section-title h2 {
    font-size: 36px;
    margin: 0;
}


/* =========================
   ABOUT
========================= */

.about-section {
    padding: 90px 0;
}

.about-content {
    display: flex;
    justify-content: space-between;
    gap: 50px;
    align-items: center;
}

.about-text {
    max-width: 800px;
}

.about-text p {
    line-height: 1.8;
    color: #555;
    margin-bottom: 20px;
}

.experience-card {
    min-width: 220px;
    padding: 35px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 10px;
}

.experience-card h3 {
    font-size: 55px;
    margin: 0;
}

.experience-card p {
    margin: 5px 0 0;
}


/* =========================
   ACHIEVEMENTS
========================= */

.achievements {
    padding: 90px 0;
    background: #f5f7fa;
}

.achievement-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.achievement-card {
    padding: 30px;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.achievement-card h3 {
    font-size: 42px;
    margin: 0 0 10px;
}

.achievement-card h4 {
    margin-bottom: 12px;
}

.achievement-card p {
    line-height: 1.6;
    color: #666;
}


/* =========================
   SKILLS
========================= */

.skills-section {
    padding: 90px 0;
}

.skills-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.skill-card {
    border: 1px solid #ddd;
    padding: 30px;
    border-radius: 8px;
}

.skill-card h3 {
    margin-bottom: 20px;
}

.skill-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.skill-list span {
    padding: 7px 12px;
    background: #f1f1f1;
    border-radius: 4px;
    font-size: 14px;
}


/* =========================
   PROJECTS
========================= */

.projects-section {
    padding: 90px 0;
    background: #f5f7fa;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.project-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.project-content {
    padding: 30px;
}

.project-number {
    font-size: 13px;
    font-weight: bold;
    color: #888;
}

.project-card h3 {
    font-size: 28px;
    margin: 12px 0 5px;
}

.project-card h4 {
    font-weight: 500;
    color: #555;
    margin-bottom: 18px;
}

.project-card p {
    line-height: 1.7;
    color: #666;
}

.technologies {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 20px 0;
}

.technologies span {
    padding: 6px 10px;
    background: #f1f1f1;
    border-radius: 4px;
    font-size: 13px;
}

.project-link {
    color: #222;
    font-weight: bold;
    text-decoration: none;
}

.project-link:hover {
    text-decoration: underline;
}


/* =========================
   EDUCATION
========================= */

.education-section {
    padding: 90px 0;
}

.education-card {
    border-left: 4px solid #222;
    padding: 10px 25px;
}

.education-card h3 {
    margin-bottom: 8px;
}

.education-card p {
    color: #666;
}

.education-card span {
    font-size: 14px;
    color: #888;
}


/* =========================
   CONTACT
========================= */

.contact-section {
    padding: 100px 0;
    text-align: center;
    background: #222;
    color: white;
}

.contact-section h2 {
    font-size: 40px;
    margin-bottom: 15px;
}

.contact-section p {
    color: #ccc;
    font-size: 17px;
}

.contact-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 30px;
}

.contact-section .btn.primary {
    background: white;
    color: #222;
}

.contact-section .btn.secondary {
    border-color: white;
    color: white;
}

.contact-section .btn.secondary:hover {
    background: white;
    color: #222;
}

.social-links {
    margin-top: 35px;
    display: flex;
    justify-content: center;
    gap: 25px;
}

.social-links a {
    color: white;
    text-decoration: none;
}

.social-links a:hover {
    text-decoration: underline;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .hero h1 {
        font-size: 48px;
    }

    .achievement-grid,
    .skills-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .about-content {
        flex-direction: column;
        align-items: flex-start;
    }

}


@media (max-width: 600px) {

    .hero {
        padding: 70px 0;
    }

    .hero h1 {
        font-size: 38px;
    }

    .hero h2 {
        font-size: 21px;
        line-height: 1.5;
    }

    .hero-description {
        font-size: 16px;
    }

    .hero-buttons {
        flex-direction: column;
        width: fit-content;
    }

    .achievement-grid,
    .skills-grid,
    .projects-grid {
        grid-template-columns: 1fr;
    }

    .section-title h2 {
        font-size: 28px;
    }

    .contact-section h2 {
        font-size: 30px;
    }

}

</style>
```
