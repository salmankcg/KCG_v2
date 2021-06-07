<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Team_Members extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-team_members';
    }

    public function get_title(){
        return esc_html__( 'Teams Members Grid', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-user-circle-o';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'teams', 'teams member', 'member', 'kcg'];
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
            '_kcg_design_teams_section',
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
            '_kcg_teams_query_section',
            [
                'label' => __( 'Query', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_teams_order_by',
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
            '_kcg_teams_order',
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
            '_kcg_teams_per_page', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 12,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $teams_args = array(
            'post_type'   => 'kcg_team',
            'post_status' => 'publish',
            'orderby'             => !empty($settings['_kcg_teams_order_by']) ? $settings['_kcg_teams_order_by'] : 'date',
            'order'               => !empty($settings['_kcg_teams_order']) ? $settings['_kcg_teams_order'] : 'asc',
            'posts_per_page'      => !empty($settings['_kcg_teams_per_page']) ? $settings['_kcg_teams_per_page'] : 12,
        );
        $teams_query = new \WP_Query( $teams_args );
        $this->__open_wrap();
        ?>
        <div class="about-content ac-nobottom">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-10">
                        <div class="people">
                            <?php $j = 0; if ( $teams_query->have_posts() ): 
                                while ( $teams_query->have_posts() ) : $teams_query->the_post();
                                $current_name = get_the_title();
                                $role = get_post_meta( get_the_ID(), '_kcg_designation_role', true );
                            ?>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="item">
                                    <div class="i-wrapper">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail('team_grid'); ?>
                                        <?php endif; ?>
                                    <div class="infos">
                                        <span class="name"><?php echo esc_html($current_name); ?></span>
                                        <span class="occupation"><?php echo esc_html($role); ?></span>
                                    </div>
                                    </div>
                                </a>
                            <?php $j++; endwhile; wp_reset_postdata(); endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
}
