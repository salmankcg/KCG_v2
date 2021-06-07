<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Clients extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-clients';
    }

    public function get_title(){
        return esc_html__( 'Clients', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-slider';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'clients', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_clients_preset',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_clients',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'style_1' => 'Style One',
                    'style_2' => 'Style Two',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_client_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_client_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Our Clients', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'condition' => [
                    '_kcg_design_clients' => ['default', 'style_2']
                ],
                'placeholder' => __( 'Enter title', 'kcg' ),
                'description' => __( 'Enter title (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_client_txt',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Partnering to reach the <strong>next level.</strong>', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'condition' => [
                    '_kcg_design_clients' => ['default', 'style_1', 'style_2']
                ],
                'placeholder' => __( 'Enter text here', 'kcg' ),
                'description' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_clients_logo_section',
            [
                'label' => __( 'Client Logos', 'kcg' ),
            ]
        );
         
         $repeater = new Repeater();
      
         $repeater->add_control(
            '_kcg_clients_logo', [
                'label' => __('Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose client image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
         $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
          $this->add_control(
            '_kcg_client_logos',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_clients_logo' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <?php if( $settings['_kcg_design_clients'] == 'style_1' ) : ?>
            <div class="home-content hc-clients">
			<div class="infos" id="slide-5">
				<div class="container-fluid">
					<div class="row justify-content-between">
						<div class="col col-5">
                        <?php if (isset($settings['_kcg_client_txt']) && !empty($settings['_kcg_client_txt'])): ?>
                            <h2 class="title"><?php echo $this->parse_text_editor($settings['_kcg_client_txt']); ?></h2>
                        <?php endif; ?>
							
						</div>
						<div class="col col-6">
							<div class="clients c-home">
								<div class="wrapper">
                                <?php 
                             if ( empty( $settings['_kcg_client_logos'] ) ) {
                                    return;
                                }
                                $count = 1;
                                foreach ( $settings['_kcg_client_logos'] as $item ) : 
                                    
                                    if ($count%24 == 1)
                                    {  
                                        echo '<div class="line">';
                                    }
                                    if ($count%12 == 1)
                                    {  
                                        echo "<div class='logos'>";
                                    }
                                    ?>
                                    <?php if(isset($item['_kcg_clients_logo']['url']) && !empty($item['_kcg_clients_logo']['url'])) : 
                                        $image = wp_get_attachment_image_url( $item['_kcg_clients_logo']['id'], $settings['thumbnail_size'] );
                                        ?>
                                        <img class="image" src="<?php echo esc_url( $image ); ?>" alt="<?php echo get_post_meta($item['_kcg_clients_logo']['id'], '_wp_attachment_image_alt', true); ?>" />
                                    <?php endif; ?>
                                <?php 

                                    if ($count%12 == 0)
                                    {
                                        echo "</div>";
                                    }
                                        if ($count%24 == 0)
                                    {
                                        echo "</div>";
                                    }
                                $count++; endforeach; 
                                if ($count%12 != 1) echo "</div>";
                                if ($count%24 != 1) echo "</div>";
                                ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php elseif( $settings['_kcg_design_clients'] == 'style_2' ): ?>
            <div class="services-content sc-clients">
                <?php if (isset($settings['_kcg_client_title']) && !empty($settings['_kcg_client_title'])): ?>
                    <div class="caption c-center"><span><?php echo $this->parse_text_editor($settings['_kcg_client_title']); ?></span></div>
                <?php endif; ?>
                <?php if (isset($settings['_kcg_client_txt']) && !empty($settings['_kcg_client_txt'])): ?>
                    <h2 class="title t-small t-center"><?php echo $this->parse_text_editor($settings['_kcg_client_txt']); ?></strong></h2>
                <?php endif; ?>
                <div class="clients">
                <div class="wrapper">
                    <?php 
                         if ( empty( $settings['_kcg_client_logos'] ) ) {
                                return;
                            }
                        $default_count = 1;
                         foreach ( $settings['_kcg_client_logos'] as $item ) : 
                            if ($default_count%24 == 1)
                            {  
                                echo '<div class="line">';
                            }
                            if ($default_count%12 == 1)
                            {  
                                echo "<div class='logos'>";
                            }
                            ?>
                            <?php if(isset($item['_kcg_clients_logo']['url']) && !empty($item['_kcg_clients_logo']['url'])) : 
                                $image = wp_get_attachment_image_url( $item['_kcg_clients_logo']['id'], $settings['thumbnail_size'] );
                            ?>
                                <img class="image" src="<?php echo esc_url( $image ); ?>" alt="<?php echo get_post_meta($item['_kcg_clients_logo']['id'], '_wp_attachment_image_alt', true); ?>" />
                            <?php endif ?>
                        <?php 
                            if ($default_count%12 == 0)
                            {
                                echo "</div>";
                            }
                            if ($default_count%24 == 0)
                            {
                                echo "</div>";
                            }
                        $default_count++; endforeach;
                        if ($default_count%12 != 1) echo "</div>";
                        if ($default_count%24 != 1) echo "</div>";
                     ?>
                </div>
                </div>
            </div>
        <?php else: ?>
            <div class="about-content">
                <?php if (isset($settings['_kcg_client_title']) && !empty($settings['_kcg_client_title'])): ?>
                    <div class="caption c-center"><span><?php echo $this->parse_text_editor($settings['_kcg_client_title']); ?></span></div>
                <?php endif; ?>
                <?php if (isset($settings['_kcg_client_txt']) && !empty($settings['_kcg_client_txt'])): ?>
                    <h2 class="title t-small t-center"><?php echo $this->parse_text_editor($settings['_kcg_client_txt']); ?></strong></h2>
                <?php endif; ?>
                <div class="clients">
                <div class="wrapper">
                    <?php 
                         if ( empty( $settings['_kcg_client_logos'] ) ) {
                                return;
                            }
                        $default_count = 1;
                         foreach ( $settings['_kcg_client_logos'] as $item ) : 
                            if ($default_count%24 == 1)
                            {  
                                echo '<div class="line">';
                            }
                            if ($default_count%12 == 1)
                            {  
                                echo "<div class='logos'>";
                            }
                            ?>
                            <?php if(isset($item['_kcg_clients_logo']['url']) && !empty($item['_kcg_clients_logo']['url'])) : 
                                $image = wp_get_attachment_image_url( $item['_kcg_clients_logo']['id'], $settings['thumbnail_size'] );
                            ?>
                                <img class="image" src="<?php echo esc_url( $image ); ?>" alt="<?php echo get_post_meta($item['_kcg_clients_logo']['id'], '_wp_attachment_image_alt', true); ?>" />
                            <?php endif ?>
                        <?php 
                            if ($default_count%12 == 0)
                            {
                                echo "</div>";
                            }
                            if ($default_count%24 == 0)
                            {
                                echo "</div>";
                            }
                        $default_count++; endforeach;
                        if ($default_count%12 != 1) echo "</div>";
                        if ($default_count%24 != 1) echo "</div>";
                     ?>
                </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $this->__close_wrap();
    }
    
}
