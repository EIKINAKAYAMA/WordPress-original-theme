<?php

    /**
     * WP-SCSS：ページをロードするたびにscssファイルを強制的にコンパイル.
     */
    define( 'WP_SCSS_ALWAYS_RECOMPILE', true );

    // activate "menu" function in an admin page
    function register_my_menus() {
        register_nav_menus( array(
            'main-menu' =>'Main Menu',
            'SNS-menu' => 'SNS Menu',
        ));
    }
    add_action( 'after_setup_theme', 'register_my_menus');


    // create my own widget
    class My_Widget extends WP_Widget{
        function __construct() {
            parent::__construct(
                'my_widget', // Base ID
                'SNS icon', // Name
                array( 'description' => 'SNS icon', ) // Args
            );
        }
    
        /**
         * Widget front
         *
         * @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
         * @param array $instance  Widgetの設定項目
         */
        public function widget( $args, $instance ) {
            $email = $instance['email'];
            echo $args['before_widget'];
    
            echo "<p>Email: ${email}</p>";
    
            echo $args['after_widget'];
        }
    
        /** Widget admin
         *
         * @param array $instance 設定項目
         * @return string|void
         */
        public function form( $instance ){
            $email = $instance['email'];
            $email_name = $this->get_field_name('email');
            $email_id = $this->get_field_id('email');
            ?>
            <p>
                <label for="<?php echo $email_id; ?>">Email:</label>
                <input class="widefat" id="<?php echo $email_id; ?>" name="<?php echo $email_name; ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
            </p>
            <?php
        }
    
        /** 新しい設定データが適切なデータかどうかをチェックする。
         * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
         *
         * @param array $new_instance  form()から入力された新しい設定データ
         * @param array $old_instance  前回の設定データ
         * @return array               保存（更新）する設定データ。falseを返すと更新しない。
         */
        function update($new_instance, $old_instance) {
            if(!filter_var($new_instance['email'],FILTER_VALIDATE_EMAIL)){
                return false;
            }
            return $new_instance;
        }
    }



    // activate "widgets" function in an admin page
    function my_theme_widgets_init() {

        register_widget( 'My_Widget' ); //register own widget created above

        register_sidebar( array(
          'name' => 'SNS menu sidebar',
          'id' => 'sidebar-1',
        ) );

        register_sidebar( array(
          'name' => 'sub sidebar',
          'id' => 'sidebar-2',
        ) );
    }
    add_action( 'widgets_init', 'my_theme_widgets_init' );

?>
