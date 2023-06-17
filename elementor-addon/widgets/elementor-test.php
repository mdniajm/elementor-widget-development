<?php 

class Elementor_Test_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'test-widget';
	}

	public function get_title() {
		return esc_html__( 'Test Widget', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-favorite';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'elementor-addon' ];
	}

	public function get_keywords() {
		return [ 'test', 'heading' ];
	}

    protected function register_controls(){

        $this->start_controls_section(
            'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
			
            );

        $this->add_control(
			'title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementor-addon' ),
			]
            );
		
		$this->add_control(
			'size',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'Size', 'elementor-addon' ),
				'placeholder' => '0',
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 50,
				'selectors' => [
					'{{WRAPPER}} h3' => 'font-size: {{VALUE}}px',
				],
			]
		);

		

		



		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'elementor-addon' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-addon' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-addon' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-addon' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} h3' => 'text-align: {{VALUE}}',
				],
			]
		);

				$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => esc_html__( 'Typography', 'elementor-addon' ),
				'selector' => '{{WRAPPER}} h3',
			]
		);
		$this->end_controls_section();


    }

	

    protected function render(){
        $settings = $this->get_settings_for_display();
		?>
        <h3><?php echo $settings['title'];?> </h3>
		<?php
    }
		protected function content_template() {
		?>
		<h3>{{{ settings.title }}}</h3>
		<?php
	}

    


}