<?php

namespace Elementor;


class TeamMitglieder extends Widget_Base
{

    public function get_name()
    {
        return 'team_mitglieder';
    }

    public function get_title()
    {
        return 'Team Mitglieder';
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
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label' => esc_html__('Titel', 'plugin-name'),
                'placeholder' => esc_html__('Gib den Titel ein', 'plugin-name'),
                'default' => 'Unser Team'
            ]
        );

        $teamRepeater = new \Elementor\Repeater();

        $teamRepeater->add_control(
            'name',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Name', 'plugin-name'),
                'placeholder' => esc_html__('Gib den Name ein', 'plugin-name'),
            ]
        );

        $teamRepeater->add_control(
            'position',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label' => esc_html__('Position', 'plugin-name'),
                'placeholder' => esc_html__('Gib die Position ein', 'plugin-name'),
            ]
        );

        $teamRepeater->add_control(
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => esc_html__('Foto', 'plugin-name'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $teamRepeater->add_control(
            'content',
            [
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label' => esc_html__('Lebenslauf', 'plugin-name'),
                'placeholder' => esc_html__('Gib hier den Lebenslauf ein', 'plugin-name'),
            ]
        );

        $this->add_control(
            'teamMemberList',
            [
                'label' => esc_html__('Team Mitglieder', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $teamRepeater->get_controls(),
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <div class="teamMemberWrapper">
            <?php foreach ($settings['teamMemberList'] as $item) { ?>
                <div class="memberItem">
                    <div class="memberImage">
                        <img src='<?= $item["image"]["url"] ?>'>
                    </div>
                    <div class="memberContent">
                        <h4><?= $item["name"] ?></h4>
                        <p><?= $item["position"] ?></p>
                        <div class="showOnHover"><?= $item["content"] ?></div>
                    </div>
                </div>
            <?php  } ?>
        </div>
<?php
    }
} ?>