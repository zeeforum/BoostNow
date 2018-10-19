<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <div class="page-title text-center">
        <h1 class="page"><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="page-content">
        <p>Lorem ipsum dolor sit amet, <strong>consectetur</strong> adipiscing <a href="#">elit</a>. Phasellus pretium rhoncus urna id fermentum. Ut imperdiet urna ac est ultrices vulputate. Cras vel vehicula orci, a tincidunt velit. Praesent tristique mollis tempor. Vivamus hendrerit arcu ligula, vel volutpat metus volutpat vel. Proin eleifend ex magna, ac pellentesque neque accumsan vel. Praesent a elementum tortor.</p>
        <p>Etiam ornare mauris mollis, ullamcorper nunc ac, malesuada mauris. Donec in bibendum urna. Vestibulum pharetra tellus velit, fringilla lacinia erat viverra vel. Morbi in vulputate lectus. In libero sapien, viverra a mauris ut, pellentesque vestibulum eros. Nulla dapibus faucibus enim, a egestas ante tincidunt quis. Fusce suscipit ex sed metus ultricies condimentum. Aenean hendrerit accumsan ante, vel pulvinar odio elementum quis. Nullam neque eros, bibendum a luctus quis, dapibus quis diam. Ut rhoncus nibh a lectus laoreet, non bibendum est elementum.</p>
        <p>Vestibulum varius tortor ut <b>libero ultricies</b> fermentum. Vivamus eu luctus lacus. Aliquam tincidunt iaculis lorem et auctor. Duis varius tempor dolor. Quisque consectetur vulputate lorem vel hendrerit. Integer non hendrerit magna, vel sagittis massa. Quisque hendrerit tellus id augue aliquam, ut tristique turpis commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum interdum purus elit, a scelerisque dolor sollicitudin bibendum. Donec non arcu scelerisque, eleifend sapien vitae, dictum neque. Suspendisse pharetra ipsum non nibh egestas bibendum.</p>
        <p>Nunc finibus diam nec lorem <i>laoreet blandit</i>. Duis eget enim vitae turpis mattis tincidunt sit amet eget nunc. Morbi et elit lorem. Vivamus congue accumsan turpis nec fermentum. Donec lobortis orci quis mollis dignissim. Maecenas pretium aliquam nibh, quis congue nisi feugiat et. Vestibulum at arcu ornare, lobortis tellus id, aliquet mi. Nunc porttitor, lectus id tincidunt volutpat, dui dolor convallis tellus, quis condimentum orci enim sit amet nunc. Nulla eget ligula vulputate, malesuada augue eu, tincidunt dui. Integer vitae est ac mauris tincidunt mattis. Nam eu diam a turpis congue placerat. Sed pretium varius suscipit.</p>
        <blockquote>This is the test <u>contribution</u> of the data.</blockquote>
        <p>Nam non orci luctus mi gravida fermentum. Donec sit amet pretium nisl. Duis egestas lectus et mi sagittis lobortis id in purus. Vivamus varius faucibus elementum. Aliquam eget metus et tellus mattis hendrerit ut a magna. Etiam pharetra libero non nisl faucibus, vel pharetra diam imperdiet. Vestibulum rhoncus turpis nec faucibus pulvinar.</p>
        <center>Center Content</center>
        <h1>Heading 1</h1>
        <ol>
            <li>List Item 1</li>
            <li>List Item 2</li>
            <li>List Item 3</li>
            <li><a href="#">List Item 4</a></li>
        </ol>
        <h2>Heading 2</h2>
        <img height="300px" src="<?= Yii::$app->params['base_url']; ?>img/product1.jpg" />
        <h3>Heading 3</h3>
        <iframe width="100%" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=tree%20solutions%20sargodha+(Tree%20Solutions)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Create Google Map</a></iframe>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>
        <ul>
            <li>List Item 1</li>
            <li>List Item 2</li>
            <li>List Item 3</li>
            <li><a href="#">List Item 4</a></li>
        </ul>
    </div>

    <code><?= __FILE__ ?></code>
</div>
