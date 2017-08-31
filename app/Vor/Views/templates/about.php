<!DOCTYPE html>
<html>
<?php require_once('base/header.php');?>
<body>
    <div class="container-fluid full-layout">
        <div class="row full-layout">
           <?php require_once('base/left-column.php'); ?>
            <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-12 col-xs-12 right-column right-column__layout">
                <div class="about text-justify">
                    <h2 class="about__title">About me !</h2>
                    <p class="about__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio maxime, eaque debitis quisquam rem. Alias natus sint voluptates qui rerum amet! Voluptate, voluptates, dicta? Odit repellendus laborum incidunt est explicabo.</p>
                    <p class="about__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident laborum culpa id accusamus minima excepturi, reprehenderit labore corporis, rem fugiat voluptas quam recusandae. Impedit iusto doloremque mollitia quibusdam quam ex! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis laboriosam quas aut, numquam, ratione laudantium maiores eaque omnis expedita voluptates debitis sapiente, eos facilis voluptate accusantium animi nulla nihil error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eum obcaecati excepturi temporibus ad, tempora deleniti, minus ipsum nobis aliquam culpa earum sint corrupti possimus rem perspiciatis fugit minima expedita.</p>
                    <img class="about__avatar img-responsive" src="https://avatars1.githubusercontent.com/u/8754546?v=3&s=460" alt="avatar">
                    <h4>Experience with languages</h4>
                    <ul class="about__list">
                        <li class="about__list__element">PHP</li>
                        <li class="about__list__element">Python</li>
                        <li class="about__list__element">Java</li>
                        <li class="about__list__element">PL/SQL</li>
                        <li class="about__list__element">Go</li>
                        <li class="about__list__element">Bash</li>
                        <li class="about__list__element">Powershell</li>
                        <li class="about__list__element">Assembly</li>
                        <li class="about__list__element">Javascript</li>
                        <li class="about__list__element">C</li>
                    </ul>
                    <h4>Markup languages</h4>
                    <ul class="about__list">
                        <li class="about__list__element">Markdown</li>
                        <li class="about__list__element">Html</li>
                        <li class="about__list__element">Css</li>
                        <li class="about__list__element">Latex</li>
                        <li class="about__list__element">Sass</li>
                        <li class="about__list__element">Jade</li>
                    </ul>
                    <h4>Experience with databses</h4>
                    <ul class="about__list">
                        <li class="about__list__element">OracleDB</li>
                        <li class="about__list__element">MySQL</li>
                        <li class="about__list__element">SQLLite</li>
                        <li class="about__list__element">MongoDB</li>
                    </ul>
                    <h4>Other</h4>
                    <ul class="about__list">
                        <li class="about__list__element">Docker</li>
                        <li class="about__list__element">Juju</li>
                        <li class="about__list__element">GruntJS</li>
                        <li class="about__list__element">NodeJs</li>
                        <li class="about__list__element">Bootstrap</li>
                        <li class="about__list__element">Linux</li>
                        <li class="about__list__element">Windows</li>
                        <li class="about__list__element">RaspberryPI</li>
                        <li class="about__list__element">Arduino</li>
                        <li class="about__list__element">Apache</li>
                        <li class="about__list__element">XAMPP</li>
                    </ul>
                    <h4>General</h4>
                    <p class="about__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio maxime, eaque debitis quisquam rem. Alias natus sint voluptates qui rerum amet! Voluptate, voluptates, dicta? Odit repellendus laborum incidunt est explicabo.</p>
                    <p class="about__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident laborum culpa id accusamus minima excepturi, reprehenderit labore corporis, rem fugiat voluptas quam recusandae. Impedit iusto doloremque mollitia quibusdam quam ex! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis laboriosam quas aut, numquam, ratione laudantium maiores eaque omnis expedita voluptates debitis sapiente, eos facilis voluptate accusantium animi nulla nihil error. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab eum obcaecati excepturi temporibus ad, tempora deleniti, minus ipsum nobis aliquam culpa earum sint corrupti possimus rem perspiciatis fugit minima expedita.</p>
                    <blockquote cite="uds">
                        acilis voluptate accusantium animi nulla nihil error. Lorem ipsum dolor sit amet, consectetur adip
                    </blockquote>
                    <p class="about__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt rem quae maxime eius praesentium aspernatur eum quos natus, architecto earum assumenda explicabo dignissimos voluptatum dolore aut, commodi quidem ex placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat soluta doloribus voluptatibus eligendi, facilis quaerat ex magni. Nobis quia amet, voluptatibus, est minus quas! Culpa dolore pariatur, ea unde!</p>
                    <h4>PGP PUBLIC KEY</h4>
                        <pre class="about__gpg" width="50"><code>
                            <?php require_once('base/pgp.php'); ?>
                    </code></pre>
                </div>
            </div>
        </div>
    </div>
<?php require_once('base/footer.php'); ?>
</body>
</html>