<?php
/**
 * Created by PhpStorm.
 * User: Gnetwebs-H
 * Date: 10/23/2018
 * Time: 2:41 AM
 */
use frontend\widgets\Alert;
?>
<div class="inner-header" style="background-image: url('<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/staff-header.jpg')">
    <div class="container">
        <h2>Courses</h2>
        <p>We have around 32 staff members who are responsible for keeping the University</p>
    </div>
</div>
<div class="courses">
    <div class="container">
        <?= Alert::widget() ?>
        <h3>Courses</h3>
        <ul>
            <li>Various streams are vaailable in Arts wing with honours courses as well.</li>
            <li>Various combinations are available for arts students.</li>
            <li>Honours courses are available in English, Sanskrit, Music, Economics and philosophy</li>
            <li>Students are also encouraged to study computer as a paper.</li>
        </ul>
        <?php if($courses_category) {
            foreach ($courses_category as $category) { ?>
                <table class="table table-bordered">
                    <caption><?= $category->name ?></caption>
                    <thead>
                    <tr>
                        <th>COURSE NAME</th>
                        <th>QUAL</th>
                        <th>COMBINATIONS</th>
                        <th>CONTACT PERSON</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($category->courses) {
                        foreach ($category->courses as $courses) { ?>
                            <tr>
                                <td><?= $courses->name ?></td>
                                <td><?= $courses->qualification ?></td>
                                <td><?= $courses->combination ?></td>
                                <td><?= $courses->contact_person ?></td>
                            </tr>
                        <?php }
                    }?>
                    </tbody>
                </table>
            <?php }
        }?>
    </div>
</div>