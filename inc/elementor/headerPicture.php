<?php

namespace Elementor;


class HeaderPicture extends Widget_Base
{

    public function get_name()
    {
        return 'header_picture';
    }

    public function get_title()
    {
        return 'Header Picture';
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return ['basic'];
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Content', 'elementor'),
            ]
        );

        $this->add_control(
            'hasTitle',
            [
                'label' => esc_html__('Bild hat Titel', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => "yes",
                'default' => "yes",
            ]
        );

        $this->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label' => esc_html__('Titel', 'plugin-name'),
                'placeholder' => esc_html__('Gib den Titel ein', 'plugin-name'),
                'condition' => ['hasTitle' => "yes"],
            ]
        );
        $this->add_control(
            'subTitle',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label' => esc_html__('Untertitel', 'plugin-name'),
                'placeholder' => esc_html__('Gib den Untertitel ein', 'plugin-name'),
                'condition' => ['hasTitle' => "yes"],
            ]
        );

        $this->add_control(
            'backgroundImage',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => esc_html__('Hintergrundbild', 'plugin-name'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <div class="headerPicture" style="background-image: url('<?= $settings["backgroundImage"]["url"] ?>')">
        </div>
        <h2><?= $settings["title"] ?></h2>
        <h4><?= $settings["subTitle"] ?></h4>

<?php
    }
} ?>