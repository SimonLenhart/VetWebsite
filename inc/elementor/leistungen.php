<?php

namespace Elementor;


class Leistungen extends Widget_Base
{

    public function get_name()
    {
        return 'leistungen';
    }

    public function get_title()
    {
        return 'Leistungen';
    }

    public function get_icon()
    {
        return 'eicon-info-box';
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
            'width',
            [
                'label' => esc_html__('Breite der Boxen', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 300,
                        'max' => 600,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' =>  400,
                ],
                'selectors' => [
                    '{{WRAPPER}} .leistungsItem' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $leistungenRepeater = new \Elementor\Repeater();

        $leistungenRepeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Bezeichnung', 'plugin-name'),
                'placeholder' => esc_html__('Gib die Bezeichnung ein', 'plugin-name'),
            ]
        );

        $leistungenRepeater->add_control(
            'hasPic',
            [
                'label' => esc_html__('Box hat ein Bild', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => "yes",
                'default' => "yes",
            ]
        );

        $leistungenRepeater->add_control(
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => esc_html__('Foto', 'plugin-name'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => ['hasPic' => "yes"],
            ]
        );

        $leistungenRepeater->add_control(
            'content',
            [
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label' => esc_html__('Stichpunkte', 'plugin-name'),
                'placeholder' => esc_html__('Gib Stichpunkte über die Leistung ein', 'plugin-name'),
            ]
        );

        $this->add_control(
            'leistungenList',
            [
                'label' => esc_html__('Leistungen', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $leistungenRepeater->get_controls(),
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <div class="leistungenWrapper">
            <?php foreach ($settings['leistungenList'] as $item) { ?>
                <div class="leistungsItem">
                    <div class="leistungsTitle">
                        <h5> <?= $item["title"] ?></h5>
                    </div>
                    <?php if ($item["hasPic"] === "yes") { ?>
                        <div class="leistungsImage">
                            <img src='<?= $item["image"]["url"] ?>'>
                        </div>
                    <?php } ?>
                    <div class="leistungsContent">
                        <?= $item["content"] ?>
                    </div>
                </div>
            <?php  } ?>

        </div>
<?php
    }
} ?>