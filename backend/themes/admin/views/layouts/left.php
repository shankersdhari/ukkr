<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    
	                  				
					
                    [
                        'label' => 'Pages Management',
                        'icon' => 'fa fa-product-hunt',
                        'url' => 'javascript:void(0);',
                        'items' => [
                            ['label' => 'All Pages', 'icon' => 'fa fa-angle-right', 'url' => ['/pages'],'active' => ($this->context->route == 'pages/index'),],
                            ['label' => 'Add Page', 'icon' => 'fa fa-angle-right', 'url' => ['/pages/create'],'active' => ($this->context->route == 'pages/create'),],

                        ],
                    ],
                    
                    [
                        'label' => 'Slider Management',
                        'icon' => 'fa fa-picture-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'All Slider', 'icon' => 'fa fa-file-image-o ', 'url' => ['/slider'],],
                            ['label' => 'Add New Slider', 'icon' => 'fa fa-plus', 'url' => ['/slider/create'],],
                        ],
                    ],
					[
                        'label' => 'Membership Management',
                        'icon' => 'fa fa-bars',
                        'url' => '#',
                        'items' => [
                            ['label' => 'All Membership', 'icon' => 'fa fa-file-image-o ', 'url' => ['/membership'],],
                            ['label' => 'Add New Membership', 'icon' => 'fa fa-plus', 'url' => ['/membership/create'],],
                        ],
                    ],
					[
                        'label' => 'Confrence Management',
                        'icon' => 'fa fa-bars',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Recent Confrences', 'icon' => 'fa fa-file-image-o ', 'url' => ['/recent-confrence'],],
                            ['label' => 'Upcomin Confrences', 'icon' => 'fa fa-file-image-o', 'url' => ['/upcoming-confrence'],],
							['label' => 'Our Journals', 'icon' => 'fa fa-file-image-o', 'url' => ['/our-journals'],],
                        ],
                    ],
					[
                        'label' => 'Gallery Management',
                        'icon' => 'fa fa-picture-o',
                        'url' => '#',
                        'items' => [ 
                            ['label' => 'All Gallery', 'icon' => 'fa fa-file-image-o ', 'url' => ['/gallery-main'],],
                            ['label' => 'Add New Gallery', 'icon' => 'fa fa-file-image-o', 'url' => ['/gallery-main/create'],],
                        ],
                    ],
                    [
                        'label' => 'Course Management',
                        'icon' => 'fa fa-picture-o',
                        'url' => ['/course-category'],
                    ],
                    [
                        'label' => 'News Management',
                        'icon' => 'fa fa-picture-o',
                        'url' => ['/latest-news'],
                    ],
                    [
                        'label' => 'Staff Management',
                        'icon' => 'fa fa-picture-o',
                        'url' => ['/staff'],
                    ],

                    /* [
                        'label' => 'Testimonial Management',
                        'icon' => 'fa fa-commenting-o',
                        'url' => 'javascript:void(0);',
                        'items' => [
                            ['label' => 'All Testimonials', 'icon' => 'fa fa-angle-right', 'url' => ['/testimonial'],'active' => ($this->context->route == 'testimonial/index'),],
                             ['label' => 'Add testimonial', 'icon' => 'fa fa-angle-right', 'url' => ['/testimonial/create'],'active' => ($this->context->route == 'testimonial/create'),],

                        ],
                    ], */
					
					/* [
                        'label' => 'Newsletter Subscriber',
                        'icon' => 'fa fa-newspaper-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'All Subscribers', 'icon' => 'fa fa-newspaper-o ', 'url' => ['/newsletter'],],
                            ['label' => 'Add New Subscriber', 'icon' => 'fa fa-plus', 'url' => ['/newsletter/create'],],
                        ],
                    ], */
                    [
                        'label' => 'User Management',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'All Users', 'icon' => 'fa fa-file-code-o', 'url' => ['/user'],'active' => ($this->context->route == 'user/index')],
                            ['label' => 'Add New User', 'icon' => 'fa fa-dashboard', 'url' => ['/user/create'],'active' => ($this->context->route == 'user/create')],
                        ],
                    ], 

                    ['label' => 'Menu Management', 'icon' => 'fa fa-bars', 'url' => ['/menu'],'active' => ($this->context->route == 'menu/index'),],
                    [   'label' => 'Website Settings',
                        'icon' => 'fa fa-cogs',
                        'url' => ['/setting-attributes/web-set'],

                    ],
                ],

            ]
        ) ?>
    </section>

</aside>