<!DOCTYPE html>
<html>
<?php require_once('base/header.php');?>
<body>
    <div class="container-fluid full-layout">
        <div class="row full-layout">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left-column left-column--layout">
                <aside class="text-center left-column__container">
                    <h2 class="left-column__title">Hœnir's Blog</h2>
                    <ul class="meta-list">
                        <li class="meta-list__item">
                            <a class="meta-list__link"href="https://github.com/hoenirvili/" title="github">
                                <i class="fa fa-github fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="meta-list__item">
                            <a class="meta-list__link" href="https://www.reddit.com/user/Saethgokk/" title="reddit">
                                <i class="fa fa-reddit fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="meta-list__item">
                            <a class="meta-list__link" href="https://raw.githubusercontent.com/hoenirvili/Pubkey/master/README.md" title="gpg-public-key">
                                <i class="fa fa-key fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                    <nav class="menu">
                        <a href="index.php" class="menu__item">Home</a>
                        <a href="about.php" class="menu__item">About</a>
                        <a href="archive.php" class="menu__item">Archive</a>
                    </nav>
                </aside>
            </div>
            <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-12 col-xs-12 right-column right-column__layout">
                <div class="art">
                    <article class="page-preview">
                        <header>
                            <a href="article.html" title="Intro To React.js Library" class="page-preview__link--header">
                                <img class="page-preview__image" src="assets/images/header/node.png" alt="reactjs-image">
                            </a>
                        </header>
                        <div class="page-preview__inner">
                            <div class="page-preview__meta">
                                <span class="page-preview__meta__item">
                                    <i class="fa fa-calendar"></i>
                                    <a href="#" rel="bookmark">
                                        <time class="entry-date published" datetime="2017-06-13T07:21:21+00:00">June 13, 2017</time>
                                        <time class="updated" datetime="2017-06-14T04:21:40+00:00">June 14, 2017</time>
                                    </a>
                                </span>
                                <span class="page-preview__meta__item">
                                    <i class="fa fa-user"></i>
                                    <span>
                                        <a class="url fn n" href="about.html">Hoenirvili</a>
                                    </span>
                                </span>
                                <span class="page-preview__meta__item">
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#comments-section">
                                        <span data-dsqidentifier="2864 blog/?p=2864">Comments</span>
                                    </a>
                                </span>
                                <div class="page-preview__hashtags">
                                    <a href="#" title="react" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>react
                                        </span>
                                    </a>
                                    <a href="#" title="javascript" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>javascript
                                        </span>
                                    </a>
                                    <a href="#" title="framework" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>framework
                                        </span>
                                    </a>
                                    <a href="#" title="front-end" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>front-end
                                        </span>
                                    </a>
                                     <a href="#" title="facebook" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>facebook
                                        </span>
                                    </a>
                                     <a href="#" title="php" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>php
                                        </span>
                                    </a>
                                     <a href="#" title="xhp" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>xhp
                                        </span>
                                    </a>
                                     <a href="#" title="ui-design" class="page-preview__hashtags__link">
                                        <span class="label label-info page-preview__hashtags__span">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>ui-design
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="page-preview__headline">
                                <a href="article.html">
                                    <h1>Intro To React.js Library</h1>
                                </a>
                            </div>
                            <div class="page-preview__content text-justify">
                                    <p>Pete Hunt wanted to use React at Instagram, so he helped to extract React from Facebook-specific code. This prepared React to be open sourced. Later, Facebook put a team of engineers behind React and also received great contributions from the open source community. Significant contributors include Sebastian Markbåge and Ben Alpert, among many others</p>
                                    <p>React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                    React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook.</p>
                                    <h1>What is react ?</h1>
                                    <blockquote>
                                        Update: I did mention that lock free data structures are really hard to write, it looks like there might be some issues that haven’t been addressed in the implementation of this LF Queue that we’re referencing. The rest of the analysis is still valid and hopefully useful to you, just know there’s actually more that needs to be done, don’t try to use that code for a mission critical application out of the box.
                                    </blockquote>
                                    <p>
                                        React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                        React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used on products made by Facebook and Instagram. Built to simplify the process of building complex UIs.
                                        The story of React started within the confines of Facebook. React was created by Jordan Walke, a software engineer at Facebook. Jordan deserves all the credit for creating React. He was influenced by XHP, a PHP-based component system that is still in use at Facebook, but also by functional programming ideas.
                                        <h3>Why React ?</h3>
                                        Pete Hunt wanted to use React at Instagram, so he helped to extract React from Facebook-specific code. This prepared React to be open sourced.
                                        Later, Facebook put a team of engineers behind React and also received great contributions from the open source community. Significant contributors include Sebastian Markbåge and Ben Alpert, among many others. Source
                                    </p>
                                    <p>
                                        <pre>
                                        <code>
/* **********************************************
    Begin prism-core.js
********************************************** */

var _self = (typeof window !== 'undefined')
    ? window   // if in browser
    : (
        (typeof WorkerGlobalScope !== 'undefined' && self instanceof WorkerGlobalScope)
        ? self // if in worker
        : {}   // if in node js
    );
                                        </code>
                                        </pre>
                                    </p>
                                    <h3>Why React ?</h3>
                                    <p>
                                        React is probably one of the best choices for building UI. Good design, support and community.
                                        React was built to solve one problem: building large applications with data that changes over time. To simplify the process of building complex UIs.
                                    </p>
                                    <h3>How was the idea to develop React conceived ?</h3>
                                    <img class="page-preview__content--wrap page-preview__content--left-wrap img-responsive" src="assets/images/header/cost.gif" alt="cost">
                                    <p>
                                        <b>Short: Conceived at Facebook.</b> Heavily used on products made by Facebook and Instagram. Built to simplify the process of building complex UIs.
                                        The story of React started within the confines of <a href="https://facebook.com">Facebook</a>. React was created by Jordan Walke, a software engineer at Facebook. Jordan deserves all the credit for creating React. He was influenced by <b>XHP</b>, <b>a PHP</b>-based component system that is still in use at Facebook, but also by functional programming ideas.
                                        Pete Hunt wanted to use React at Instagram, so he helped to extract React from Facebook-specific code. This prepared React to be open sourced.
                                        Later, Facebook put a team of engineers behind React and also received great contributions from the open source community. Significant contributors include Sebastian Markbåge and Ben Alpert, among many others. Source
                                    </p>
                                    <p>
                                        <b>Short: Conceived at Facebook.</b> Heavily used on products made by Facebook and Instagram. Built to simplify the process of building complex UIs.
                                        The story of React started within the confines of <a href="https://facebook.com">Facebook</a>. React was created by Jordan Walke, a software engineer at Facebook. Jordan deserves all the credit for creating React. He was influenced by <b>XHP</b>, <b>a PHP</b>-based component system that is still in use at Facebook, but also by functional programming ideas.
                                        Pete Hunt wanted to use React at Instagram, so he helped to extract React from Facebook-specific code. This prepared React to be open sourced.
                                        Later, Facebook put a team of engineers behind React and also received great contributions from the open source community. Significant contributors include Sebastian Markbåge and Ben Alpert, among many others. Source
                                    </p>
                                    <p>
                                        <b>Short: Conceived at Facebook.</b> Heavily used on products made by Facebook and Instagram. Built to simplify the process of building complex UIs.
                                        The story of React started within the confines of <a href="https://facebook.com">Facebook</a>. React was created by Jordan Walke, a software engineer at Facebook. Jordan deserves all the credit for creating React. He was influenced by <b>XHP</b>, <b>a PHP</b>-based component system that is still in use at Facebook, but also by functional programming ideas.
                                        Pete Hunt wanted to use React at Instagram, so he helped to extract React from Facebook-specific code. This prepared React to be open sourced.
                                        Later, Facebook put a team of engineers behind React and also received great contributions from the open source community. Significant contributors include Sebastian Markbåge and Ben Alpert, among many others. Source
                                    </p>
                                </div>
                            </div>
                            <footer class="clearfix page-preview__footer">
                            </footer>
                    </article>
                    <form class="post-form" id="comment-form">

                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" autocomplete="username" maxlength="60" title="username">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label for="email" class="sr-only" >Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" autocomplete="email" maxlength="60" title="email">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="comment-form" class="sr-only">Comment</label>
                            <textarea placeholder="Comment" spellcheck="on" wrap="soft" class="form-control" name="comment" rows="10" cols="2" autocomplete="on" form="comment-form" maxlength="2500" title="shitpost"></textarea>
                            <div class="post-form__upload">
                                <input type='file' id='image' class="post-form__upload__input">
                                <i class="fa fa-image fa-2x post-form__upload--icon"></i>
                            </div>
                            <button type="submit" class="btn btn-primary post-form__button" title="pushthefuckingbutton">Post</button>
                        </div>

                    </form>
                    <div class="comments" id="comments-section">
                        <div class="comments__element">
                            <div class="page-preview__meta">
                                <span class="page-preview__meta__item"><i class="fa fa-2x fa-user" aria-hidden="true"></i></span>
                                <span class="page-preview__meta__item"><b>username</b></span>
                                <span class="page-preview__meta__item"><b>example@example.com</b></span>
                                <hr>
                                <span class="page-preview__meta__item--timestamp">
                                      <time class="entry-date published" datetime="2017-06-13T07:21:21+00:00">June 13, 2017</time>
                                </span>
                            </div>
                            <div class="comments__content text-justify">
                                <p> React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used o</p>
                                <p>
                                    <pre>
                                        <code>
    /* **********************************************
        Begin prism-core.js
    ********************************************** */

    var _self = (typeof window !== 'undefined')
        ? window   // if in browser
        : (
            (typeof WorkerGlobalScope !== 'undefined' && self instanceof WorkerGlobalScope)
            ? self // if in worker
            : {}   // if in node js
        );
                                        </code>
                                    </pre>
                                </p>
                                <p> React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used o
                                React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used o</p>
                                <p> React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used o</p>
                            </div>
                        </div>

                        <div class="comments__element">
                            <div class="page-preview__meta">
                                <span class="page-preview__meta__item"><i class="fa fa-2x fa-user" aria-hidden="true"></i></span>
                                <span class="page-preview__meta__item"><b>username</b></span>
                                <span class="page-preview__meta__item"><b>example@example.com</b></span>
                                <hr>
                                <span class="page-preview__meta__item--timestamp">
                                      <time class="entry-date published" datetime="2017-06-13T07:21:21+00:00">June 13, 2017</time>
                                </span>
                            </div>
                            <div class="comments__content text-justify">
                                <p> React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used o</p>
                            </div>
                        </div>

                        <div class="comments__element">
                            <div class="page-preview__meta">
                                <span class="page-preview__meta__item"><i class="fa fa-2x fa-user" aria-hidden="true"></i></span>
                                <span class="page-preview__meta__item"><b>username</b></span>
                                <span class="page-preview__meta__item"><b>example@example.com</b></span>
                                <hr>
                                <span class="page-preview__meta__item--timestamp">
                                        <time class="entry-date published" datetime="2017-06-13T07:21:21+00:00">June 13, 2017</time>
                                </span>
                            </div>
                            <div class="comments__content text-justify">
                                <p> React is Javascript library for building user interfaces (UIs). React is the V (View) in MVC.
                                React is declarative, efficient, and extremely flexible. What’s more, it works with the libraries and frameworks that you already know like jQuery’s UI plugin.Short: Conceived at Facebook. Heavily used o</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('base/footer.php'); ?>
</body>
</html>