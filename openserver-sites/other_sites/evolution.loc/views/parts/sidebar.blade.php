<aside id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="/" class="logo"><img src="template/images/logo.jpg" alt="" /></a>
        <header>
            <div class="site-name">О всяком</div>
            <p>Посты про интересное</p>
        </header>
    </section>



    <!-- Posts List -->
    <section>
        <h2>Популярное</h2>
        <ul class="posts">
            @foreach($posts_sidebar as $post)
                <li>
                    <article>
                        <header>
                            <h3><a href="{{ urlProcessor::makeUrl($post['id'] ) }}">{{ $post['pagetitle'] }}</a></h3>
                            <time class="published">{{ date('d.m.Y',$post['createdon']) }}</time>
                        </header>
                        <a href="{{ urlProcessor::makeUrl($post['id']) }}" class="image"><img src="{{ $post['post_photo'] }}" alt="" /></a>
                    </article>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>От автора</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </section>

    <footer id="footer">
    <ul class="icons">
        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
        <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
    </ul>
    <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a></p>
</footer>

</aside>
