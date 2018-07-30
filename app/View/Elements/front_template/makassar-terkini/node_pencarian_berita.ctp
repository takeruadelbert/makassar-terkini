<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/pencarian-berita.png", true) ?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan" style="width: 544px;">
                        </div>
                    </div>
                </div>
                <div class="s-berita-lebih-banyak-container">
                    <?php
                    foreach ($searchResult as $result) {
                        $result_title = seoUrl($result['News']['title_ind']);
                        if($result['News']['news_type_id'] == 1) {
                    ?>
                    <a href="<?= Router::url("/berita/{$result['News']['id']}/$result_title", true) ?>" class="news-module-hor">
                    <?php
                        } else if($result['News']['news_type_id'] == 2) {
                    ?>
                    <a href="<?= Router::url("/foto/{$result['News']['id']}/$result_title", true) ?>" class="news-module-hor">
                    <?php
                        } else {
                    ?>
                    <a href="<?= Router::url("/video/{$result['News']['id']}/$result_title", true) ?>" class="news-module-hor">
                    <?php
                        }
                    ?>
                        <div class="news-module-hor-img">
                            <img src="<?= str_replace('\\', '/', Router::url("{$result['News']['thumbnail_path']}", true)) ?>">
                        </div>

                        <div class="news-module-hor-content font-sourceSansPro">
                            <div class="news-module-hor-title">
                                <?= $result['News']['title_ind'] ?>
                            </div>

                            <div class="news-module-hor-etc">
                                
                                <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                    <?= $result['NewsCategory']['name'] ?>
                                </div>

                                <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                    -
                                </div>

                                <div class="news-module-hor-info pull-left" style="margin-top:3px;">
                                    <?= $this->Html->getTimeago(strtotime($result["News"]['news_date'])) ?>
                                </div>
                                <?php 
                                    if ($result['News']['is_sponsor'] == 1) {
                                ?>
                                <div class="news-module-hor-tag pull-left" style="margin-top:3px;">
                                    SPONSOR
                                </div>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="news-module-hor-desc">
                                <?php
                                $title = strip_tags(html_entity_decode($result['News']['sinopsys_ind']));
                                $length = 200;
                                if(strlen($title) > $length) {
                                    echo substr($title, 0, $length) . "...";
                                } else {
                                    echo $title;
                                }
                                ?>
                            </div>

                            
                        </div>
                    </a>
                    <?php
                    }
                    ?>                    
                </div>
            </div>
        </div>
    </div>
</div>