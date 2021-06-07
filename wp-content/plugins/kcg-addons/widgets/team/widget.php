<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Team extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-team';
    }

    public function get_title(){
        return esc_html__( 'Team Member', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-user-circle-o';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'team', 'team member', 'member', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_about_clients_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_team_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Select',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_team_content_section',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_team_member_content',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'the people</span> who make the <span class="area">magic</span> happen', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_team_member_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Meet Our Team', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_team_member_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' =>[
                    '_kcg_team_member_btn!' => '',
                ]
            ]
        );
        $this->end_controls_section();

         $this->start_controls_section(
            '_kcg_team_query_section',
            [
                'label' => __( 'Query', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_team_order_by',
            [
                'label' => __('Order By', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'modified' => __('Modified', 'kcg'),
                    'date' => __('Date', 'kcg'),
                    'rand' => __('Rand', 'kcg'),
                    'ID' => __('ID', 'kcg'),
                    'title' => __('Title', 'kcg'),
                    'author' => __('Author', 'kcg'),
                    'name' => __('Name', 'kcg'),
                    'parent' => __('Parent', 'kcg'),
                    'menu_order' => __('Menu Order', 'kcg'),
                ],
                'separator' => 'before',
            ]
        );
         $this->add_control(
            '_kcg_team_order',
            [
                'label' => __('Order', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ase',
                'options' => [
                    'ase' => __('Ascending Order', 'kcg'),
                    'desc' => __('Descending Order', 'kcg'),
                ],
            ]
        );
         $this->add_control(
            '_kcg_team_per_page', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 5,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $args = array(
            'post_type'   => 'kcg_team',
            'post_status' => 'publish',
            'orderby'             => !empty($settings['_kcg_team_order_by']) ? $settings['_kcg_team_order_by'] : 'date',
            'order'               => !empty($settings['_kcg_team_order']) ? $settings['_kcg_team_order'] : 'asc',
            'posts_per_page'      => !empty($settings['_kcg_team_per_page']) ? $settings['_kcg_team_per_page'] : 5,
        );
        $team_query = new \WP_Query( $args );
        $this->__open_wrap();
        ?>
        <div class="scrolldown">
            <span><?php echo esc_html__('ALL TEAM', 'kcg'); ?></span>
        </div>

        <div class="webdoor w-team">
            <div class="submenu">
                <?php 
                    $i = 1;
                        $about_menu_id = kcg_options('about_menu_id', '');
                        foreach ($about_menu_id as $menu_item):
                            $active_class =  ($i == 3) ? 'active' : '';
                    ?>
                        <a href="<?php echo esc_url($menu_item['url']); ?>" class="item <?php echo esc_attr($active_class); ?>"><span><?php echo esc_html($menu_item['title']); ?></span></a>
                <?php $i++; endforeach; ?>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-5">
                        <?php if (!empty($settings['_kcg_team_member_content'])): ?>
                            <h1 class="title t-medium t-people" >Meet <span class="name"><?php echo $this->parse_text_editor($settings['_kcg_team_member_content']); ?></h1>
                        <?php endif; ?>
                        <?php if (isset($settings['_kcg_team_member_btn']) && !empty($settings['_kcg_team_member_btn'])): ?>
                            <a <?php echo kcg__link($settings['_kcg_team_member_link']); ?> class="button b-black">
                                <div class="wrapper">
                                    <span class="text"><?php echo $this->parse_text_editor($settings['_kcg_team_member_btn']); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                        
                    </div>
                    <div class="col col-5">
                        <div class="people-scramble">
                            <div class="wrapper">
                            
                                <div class="images">
                                    <?php $i = 0; if ( $team_query->have_posts() ): 
                                        while ( $team_query->have_posts() ) : $team_query->the_post();
                                        ?>
                                            <figure data-target="<?php echo esc_attr($i) ?>" style="background-image:url(<?php echo esc_url(the_post_thumbnail_url()); ?>);"></figure>
                                    <?php $i++; endwhile; wp_reset_postdata(); endif;?>
                                </div>
                                
                                <div class="hint">
                                    <?php $j = 0; if ( $team_query->have_posts() ): 
                                        while ( $team_query->have_posts() ) : $team_query->the_post();
                                            $current_name = get_the_title();
                                            $role = get_post_meta( get_the_ID(), '_kcg_designation_role', true );
                                        ?>
                                            <div class="item" data-target="<?php echo esc_attr($j) ?>" data-name="<?php echo esc_html($current_name); ?>" data-area="<?php echo esc_html($role); ?>" data-link="<?php echo esc_url(the_permalink()); ?>"></div>
                                    <?php $j++; endwhile; wp_reset_postdata(); endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
