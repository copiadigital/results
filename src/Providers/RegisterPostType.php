<?php

namespace Results\Providers;
use Copia\CustomPostTypes as CPT;

class RegisterPostType implements Provider
{
    public function __construct()
    {
        add_action('init', [$this, 'cpt_register']);
    }

    public function register()
    {
        //
    }

    public function cpt_register() {
        $types = [];

        array_push($types, CPT::createPostType('results', 'Results', 'Results')
            ->setPublic(true)
            ->setPubliclyQueryable(false)
            ->setMenuPosition(28)
            ->setMenuIcon('dashicons-list-view')
            ->setSupports(['title', 'revisions'])
            ->setTaxonomies(['result_years'])
            ->setRewrite([
                'slug' => 'results',
                'with_front' => false
            ]),
        );

        array_push($types, CPT::createTaxonomy('result_years', 'results', 'Result Year'));

        $types = apply_filters('results_tax_before_insert', $types);

        CPT::register($types, false);
    }
}
