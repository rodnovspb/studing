<?php

add_action('wp_head', 'css_to_wp_head');
function css_to_wp_head(){
    wp_enqueue_style('style1.css', get_stylesheet_directory_uri() . '/style1.css');
    wp_enqueue_style('style2.css', get_stylesheet_directory_uri() . '/style2.css');

    $inline_style = "
    .mycolor {
        background: pink;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    ";
    wp_add_inline_style('style2.css', $inline_style);
}


add_action('wp_head', 'js_to_wp_head');
function js_to_wp_head() {
    wp_enqueue_script('script0.js', get_template_directory_uri() . '/script0.js');
    wp_enqueue_script('script.js', get_template_directory_uri() . '/script.js');
    wp_enqueue_script('script2.js', get_template_directory_uri() . '/script2.js');
    $script = "console.log(`четвертый скрипт`)";
    wp_add_inline_script('script2.js', $script, 'after');
}

function date_ru(){
    $months = [
        1=>'января',
        'февраля',
        'марта',
        'апреля',
        'мая',
        'июня',
        'июля',
        'августа',
        'сентября',
        'октября',
        'ноября',
        'декабря'
    ];
    return date('d') . " " . $months[date('n')] . " " . date('Y') . " г.";
}


add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}

add_action('widgets_init', 'my_widgets');

function my_widgets(){
    register_sidebar([
        'name'=> 'Боковая панель',
        'id' => 'homepage-sidebar',
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ]);
}




// мои перехваты на события и создание фильтров

add_action('my_hook', 'func');

function func($data){
    echo $data[0] . " " . $data[1];
}

function my_filter($str){
    return 'Здравствуйте, ' . $str;
}

add_filter('filter__my', 'my_filter');


function text($text){
    $text = strip_tags($text);
    return apply_filters('to_cut', $text);
}

add_filter('to_cut', 'cut');

function cut($str) : string {
    return mb_substr($str, 0, 30);
}

add_filter('the_content', 'add_author');
add_filter('the_content', 'add_class');

function add_author($content){
    return $content . "<div>Автор: Денис Роднов</div>";
}

function add_class($content){
    return "<div class='post'>" . $content . "</div>";
}

add_action( 'the_excerpt', 'add_recommend');

// условие добавляем, чтобы сработала функция из дочерней темы, если есть
if(!function_exists('add_recommend')){
    function add_recommend($excerpt){
        $arr = ["Рекомендую: ", "Интересная статья: ", "Популярная запись: "];
        return "<div class='recommend'>" . $arr[array_rand($arr)] . "</div>" . $excerpt;
    }
}


// задевает также заголовки меню
//add_filter('the_title', 'add_to_title');
//
//function add_to_title($title){
//    return "Страница: " . $title;
//
//}

// шорткоды

add_shortcode('site_url', 'add_site_url');

function add_site_url(){
    ob_start();
    echo 'ссылка на главную';
    $str = ob_get_clean();
    return "<a href='" . site_url() . "'>  $str </a>";
}

add_shortcode('my_name', 'add_name');

function add_name(){
    return "<span>Эта надпись выведенa из шорткода</span>";
}

add_shortcode('day_of_week', 'add_day');

function add_day(){
    $days = array('Воскресенье', 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота'  );
    return $days[date('w')];
}

//Обработка форм

add_action( 'admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action( 'admin_post_contact_form', 'prefix_send_email_to_admin' );
add_action( 'admin_post_nopriv_phone_form', 'phone_received' );
add_action( 'admin_post_phone_form', 'phone_received' );

function prefix_send_email_to_admin (){
    echo 'Сработала функция prefix_send_email_to_admin для обработки формы';
}

function phone_received (){
    echo 'Мы скоро с вами свяжемся';
    echo '<div><a href="' . home_url() . '">На главную</a></div>';
}



//-------------------------------------------------------------------

// Виджет скопированный

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class wpb_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'wpb_widget',

// Widget name will appear in UI
            __('WPBeginner Widget', 'wpb_widget_domain'),

// Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
        echo __( 'Hello, World!', 'wpb_widget_domain' );
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
// Widget admin form
        ?>


        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />


        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

//-------------------------------------------------------------------

//    Мой виджет оказывает количество всех комментариев на сайте

//Регистрируем нижесделанный виджет
function my_widget_register() {
    register_widget( 'my_widget' );
}
add_action( 'widgets_init', 'my_widget_register' );

//Код виджета
    class my_widget extends WP_Widget {

        function __construct() {
            parent::__construct('my_widget', __('Количество комментариев', 'my_widget_domain'), array( 'description' => __( 'Мой виджет для WordPress', 'my_widget_domain' ), ));
        }

        public function widget( $args, $instance ) {
          	$count_of_comments = wp_count_comments()->total_comments;

            $title = apply_filters( 'widget_title', $instance['title'] );
            echo $args['before_widget'];
//if title is present
            if ( ! empty( $title ) )
                echo $args['before_title'] . $title . $args['after_title'];
//output
            echo __( 'На сайте комментариев: ', 'my_widget_domain' );
            echo $count_of_comments;
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) )
                $title = $instance[ 'title' ];
            else
                $title = __( 'Количество комментариев', 'my_widget_domain' );
            ?>
            <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
            <?php
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    }

//-------------------------------------------------------------------
//    Мой виджет оказывает количество постов на сайте

//Регистрируем нижесделанный виджет
function count_posts_widget_register() {
    register_widget( 'count_posts_widget' );
}
add_action( 'widgets_init', 'count_posts_widget_register' );

//Код виджета
class count_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct('count_posts_widget', __('Количество постов', 'count_posts_widget_domain'), array( 'description' => __( 'Количество постов', 'count_posts_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
        $count_of_posts = wp_count_posts()->publish ;

        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'На сайте постов: ', 'count_posts_widget_domain' );
        echo $count_of_posts;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Количество постов', 'count_posts_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}


//-------------------------------------------------------------------
//    Мой виджет оказывает количество пользователей

//Регистрируем нижесделанный виджет
function count_users_widget_register() {
    register_widget( 'count_users_widget' );
}
add_action( 'widgets_init', 'count_users_widget_register' );

//Код виджета
class count_users_widget extends WP_Widget {

    function __construct() {
        parent::__construct('count_users_widget', __('Количество пользователей', 'count_users_widget_domain'), array( 'description' => __( 'Количество пользователей', 'count_users_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
        $count_of_users = count_users()['total_users'] ;

        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'На сайте пользователей: ', 'count_users_widget_domain' );
        echo $count_of_users;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Количество пользователей', 'count_users_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

//-------------------------------------------------------------------
//    Мой виджет показывает ссылку на пост с наибольшим количеством комментариев

//Регистрируем нижесделанный виджет
function most_comments_post_widget_register() {
    register_widget( 'most_comments_post_widget' );
}
add_action( 'widgets_init', 'most_comments_post_widget_register' );

//Код виджета
class most_comments_post_widget extends WP_Widget {

    function __construct() {
        parent::__construct('most_comments_post_widget', __('Больше всего комментариев: ', 'most_comments_post_widget_domain'), array( 'description' => __( 'Больше всего комментариев', 'most_comments_post_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
        global $wpdb;
        $query = "SELECT * FROM wp_posts ORDER BY comment_count DESC LIMIT 1";
        $result = $wpdb->get_results($query);
        $link = '<a href="' . $result[0]->guid . '">' . $result[0]->post_title . '</a>';

        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'Больше всего комментариев: ', 'most_comments_post_widget_domain' );
        echo $link;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Больше всего комментариев', 'most_comments_post_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

//-------------------------------------------------------------------
//    Мой виджет показывает ссылку на пользователя с наибольшим количеством комментариев

//Регистрируем нижесделанный виджет
function most_comments_user_widget_register() {
    register_widget( 'most_comments_user_widget' );
}
add_action( 'widgets_init', 'most_comments_user_widget_register' );

//Код виджета
class most_comments_user_widget extends WP_Widget {

    function __construct() {
        parent::__construct('most_comments_user_widget', __('Больше всего комментариев у пользователя: ', 'most_comments_user_widget_domain'), array( 'description' => __( 'Больше всего комментариев у пользователя', 'most_comments_user_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
        global $wpdb;
        require_once 'show.php';
        $query = "SELECT *, COUNT(comment_id) as count FROM wp_comments GROUP BY comment_author ORDER BY count DESC LIMIT 1";
        $result = $wpdb->get_results($query);
        $user = $result[0]->comment_author;
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'Больше всего комментариев : ', 'most_comments_user_widget_domain' );
        echo $user;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Больше всего комментариев у пользователя ', 'most_comments_user_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}


//-------------------------------------------------------------------
//    Мой виджет показывает ссылки на популярные посты

//Регистрируем нижесделанный виджет
function most_comments_posts_widget_register() {
    register_widget( 'most_comments_posts_widget' );
}
add_action( 'widgets_init', 'most_comments_posts_widget_register' );

//Код виджета
class most_comments_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct('most_comments_posts_widget', __('Больше всего комментариев у постов: ', 'most_comments_posts_widget_domain'), array( 'description' => __( 'Больше всего комментариев у постов', 'most_comments_posts_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
        global $wpdb;
        require_once 'show.php';
        $query = "SELECT * FROM wp_posts  WHERE comment_count != 0 ORDER BY comment_count DESC LIMIT 5";
        $result = $wpdb->get_results($query);
		$str = "<ul>";
		foreach ($result as $item){
            $str .= '<li><a href="' . $item->guid . '">' . $item->post_title . '</a></li>';
		}
        $str .= "</ul>";


        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'Больше всего комментариев у постов : ', 'most_comments_posts_widget_domain' );
        echo $str;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Больше всего комментариев у постов ', 'most_comments_posts_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}


//-------------------------------------------------------------------
//    Мой виджет показывает форму для обратной связи

//Регистрируем нижесделанный виджет
function phone_form_widget_register() {
    register_widget( 'phone_form_widget' );
}
add_action( 'widgets_init', 'phone_form_widget_register' );

//Код виджета
class phone_form_widget extends WP_Widget {

    function __construct() {
        parent::__construct('phone_form_widget', __('Оставьте телефон: ', 'phone_form_widget_domain'), array( 'description' => __( 'Оставьте телефон', 'phone_form_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
		$str = "<form action='" . esc_url(admin_url('admin-post.php')) . "'><input type='tel'><input type='hidden' name='action' value='phone_form'><input type='submit'></form>";


        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'Оставьте телефон : ', 'phone_form_widget_domain' );
        echo $str;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Оставьте телефон ', 'phone_form_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

//-------------------------------------------------------------------
//    Мой виджет показывает форму для обратной связи

//Регистрируем нижесделанный виджет
function show_address_widget_register() {
    register_widget( 'show_address_widget' );
}
add_action( 'widgets_init', 'show_address_widget_register' );

//Код виджета
class show_address_widget extends WP_Widget {

    function __construct() {
        parent::__construct('show_address_widget', __('Наш адрес: ', 'show_address_widget_domain'), array( 'description' => __( 'Наш адрес', 'show_address_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
      	if(!empty(ADDRESS)){
            $str = ADDRESS;
		} else {
            $str = 'Нет адреса';
		}


        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo __( 'Наш адрес : ', 'show_address_widget_domain' );
        echo $str;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Наш адрес ', 'show_address_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}


//-------------------------------------------------------------------
//    Мой виджет показывает логотип по дням недели

//Регистрируем нижесделанный виджет
function show_logo_widget_register() {
    register_widget( 'show_logo_widget' );
}
add_action( 'widgets_init', 'show_logo_widget_register' );

//Код виджета
class show_logo_widget extends WP_Widget {

    function __construct() {
        parent::__construct('show_logo_widget', __('Наш лого: ', 'show_logo_widget_domain'), array( 'description' => __( 'Наш лого', 'show_logo_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
      	$weed_day = date('w');
      	switch ($weed_day){
			case 0: $id = 148; break;
			case 1: $id = 147; break;
			case 2: $id = 146; break;
			case 3: $id = 145; break;
			case 4: $id = 144; break;
			case 5: $id = 143; break;
			case 6: $id = 142; break;
			default: $id = 148; break;
		}

        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo "<div style='text-align: center'>" . wp_get_attachment_image($id)  . "</div>";

    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Наш лого ', 'show_logo_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}



//-------------------------------------------------------------------
//    Мой виджет показывает случайные цитаты

//Регистрируем нижесделанный виджет
function random_quotes_widget_register() {
    register_widget( 'random_quotes_widget' );
}
add_action( 'widgets_init', 'random_quotes_widget_register' );

//Код виджета
class random_quotes_widget extends WP_Widget {

    function __construct() {
        parent::__construct('random_quotes_widget', __('Случайная цитата: ', 'random_quotes_widget_domain'), array( 'description' => __( 'Случайная цитата', 'random_quotes_widget_domain' ), ));
    }

    public function widget( $args, $instance ) {
       require_once 'quotes.php';
       $count = count($quotes);
       $random_num = random_int(0, $count);
       $str = $quotes[$random_num];


        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
//if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
//output
        echo $str;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Случайная цитата ', 'random_quotes_widget_domain' );
        ?>
	  <p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}