<?php get_header(); ?>
<?php the_post(); ?>

<article id="blog">
	<section id="main">
		<div id="lower" class="container">
			<h1 class="page-title1 text-center"><span>スタッフブログ<br><small>STAFF BLOG</small></span></h1>
			<div id="content" class="columns">
                <div id="leftcontent">
                    <?php 
                        if(have_posts()): while(have_posts()): the_post(); 
                            
                            if ( has_post_thumbnail() ) {
                                $image = get_post_thumbnail_id();
                                $src = wp_get_attachment_image( $image, "medium_large", "", array("class"=>"pure-img center-block") );
                            }else{
                                $src = "";
                            }

                    ?>
                        <div class="wrap1">
                            <h2><?php the_title(); ?></h2>
                            <?php 
                                echo $src; 
                                the_content();
                            ?>
                        </div>
                    <?php endwhile;else: ?>
                        <div class="wrap1">
                            <p>現在投稿の準備中です。</p>
                        </div>
                    <?php endif; ?>
                </div>         
                <aside id="sidebar">
                    <dl class="list1">
                        <dt>最近の投稿</dt>
                        <dd>
                            <ul>
                                <?php 
                                    $args = [
                                        'post_type'         => 'blog',
                                        'posts_per_page'    => 3
                                    ];
                                    $the_query = new WP_Query($args);
                                    if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
                                        if ( has_post_thumbnail() ) {
                                            $image = get_post_thumbnail_id();
                                            $src = "<div class=\"column1\">".wp_get_attachment_image( $image, "medium_large", "", array("class"=>"pure-img center-block") )."</div>";
                                        }else{
                                            $src = "";
                                        }
                                        $title = get_the_title();
                                        $link = get_the_permalink();
                                        $date = get_the_time('Y.m.d');

                                        echo "<li class=\"columns\"><a href=\"{$link}\">{$src}<div class=\"column2\"><span>{$time}</span>{$title}</div></a></li>";

                                    endwhile;endif;wp_reset_postdata();
                                ?>
                            </ul>
                        </dd>
                    </dl>
                    <!-- /.list1 -->
                    <dl class="list2">
                        <dt></dt>
                        <dd>    </dd>
                    </dl>
                    <!-- /.list2 -->
                </aside>
            </div>
		</div>
		<!-- /.container -->
	</section>
	<!-- /#main -->
</article>
<!-- /#<?php echo $post->post_name; ?> -->


<?php get_footer(); ?>

