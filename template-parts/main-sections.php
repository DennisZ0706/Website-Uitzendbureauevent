<?php if (have_rows('sections')) : ?>
    <?php while (have_rows('sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'theme_uitzendbureau_event') : ?>
            <section id="theme">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <?php if (have_rows('theme_edition')) : ?>
                                <?php while (have_rows('theme_edition')) : the_row(); ?>
                                    <?php $currentYear = date('Y'); ?>
                                    <?php $yearOfItem = get_sub_field('theme_year'); ?>
                                    <div class="<?php the_sub_field('theme_year'); ?> <?php if ($currentYear == $yearOfItem) { ?>active<?php } else { ?>hidden<?php } ?>">
                                        <?php $theme_picture = get_sub_field('theme_picture'); ?>
                                        <?php if ($theme_picture) { ?>
                                            <img src="<?php echo $theme_picture['url']; ?>" alt="<?php echo $theme_picture['alt']; ?>" />
                                        <?php } ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="offset-lg-1 col-lg-5">
                            <?php if (have_rows('theme_edition')) : ?>
                                <?php $i = 0; ?>
                                <?php while (have_rows('theme_edition')) : the_row(); ?>
                                    <?php $i++; ?>
                                    <?php $currentYear = date('Y'); ?>
                                    <?php $yearOfItem = get_sub_field('theme_year'); ?>
                                    <div class="<?php the_sub_field('theme_year'); ?> <?php if ($currentYear == $yearOfItem) { ?>active<?php } else { ?>hidden<?php } ?>">
                                        <div class="edition">Thema <span><?php the_sub_field('theme_year'); ?></div></span>
                                        <?php if (have_rows('theme_content')) : ?>
                                            <?php while (have_rows('theme_content')) : the_row(); ?>
                                                <?php the_sub_field('thema_title'); ?>
                                                <div class="theme-content-<?php echo $i; ?>">
                                                    <?php the_sub_field('thema_description'); ?>
                                                </div>
                                                <div class="read-more" themeID="theme-content-<?php echo $i; ?>">Toon meer</div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'video_uitzendbureau_event') : ?>
            <section id="video">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wrapper">
                                <ul class="tabs">
                                    <?php $total = count(get_sub_field('video_edition')); ?>
                                    <?php if (have_rows('video_edition')) : ?>
                                        <?php $countPosts = 0; ?>
                                        <?php while (have_rows('video_edition')) : the_row(); ?>
                                            <?php $countPosts++; ?>
                                            <li class="<?php if ($countPosts == $total) { ?>tab-active<?php } ?> tab-item">
                                                <div class="video-container">
                                                    <figure class="play-video" videoID="youtube-video-id-<?php echo $countPosts; ?>">
                                                        <div class="play-button">
                                                            <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M36 72C45.5478 72 54.7045 68.2072 61.4558 61.4558C68.2072 54.7045 72 45.5478 72 36C72 26.4522 68.2072 17.2955 61.4558 10.5442C54.7045 3.79285 45.5478 0 36 0C26.4522 0 17.2955 3.79285 10.5442 10.5442C3.79285 17.2955 0 26.4522 0 36C0 45.5478 3.79285 54.7045 10.5442 61.4558C17.2955 68.2072 26.4522 72 36 72ZM33.9975 23.256C33.3198 22.8038 32.5321 22.5442 31.7183 22.5046C30.9046 22.4651 30.0954 22.6472 29.3771 23.0316C28.6587 23.4159 28.0582 23.9881 27.6396 24.687C27.2209 25.3859 26.9999 26.1853 27 27V45C26.9999 45.8147 27.2209 46.6141 27.6396 47.313C28.0582 48.0119 28.6587 48.5841 29.3771 48.9684C30.0954 49.3528 30.9046 49.5349 31.7183 49.4954C32.5321 49.4558 33.3198 49.1962 33.9975 48.744L47.4975 39.744C48.1138 39.333 48.6191 38.7763 48.9686 38.1232C49.3181 37.4701 49.501 36.7408 49.501 36C49.501 35.2592 49.3181 34.5299 48.9686 33.8768C48.6191 33.2237 48.1138 32.667 47.4975 32.256L33.9975 23.256Z" fill="#E9184E" />
                                                            </svg>
                                                        </div>
                                                        <?php $video_img = get_sub_field('video_img'); ?>
                                                        <?php if ($video_img) { ?>
                                                            <img src="<?php echo $video_img['url']; ?>" alt="<?php echo $video_img['alt']; ?>" />
                                                        <?php } ?>
                                                    </figure>
                                                    <?php
                                                    $iframe = get_sub_field('video_film');
                                                    preg_match('/src="(.+?)"/', $iframe, $matches);
                                                    $src = $matches[1];
                                                    $params = array(
                                                        'controls'  => 0,
                                                        'hd'        => 1,
                                                        'autohide'  => 1,
                                                        'enablejsapi' => 1
                                                    );
                                                    $new_src = add_query_arg($params, $src);
                                                    $iframe = str_replace($src, $new_src, $iframe);
                                                    $attributes = 'class="youtube-video-id-' . $countPosts . '"frameborder="0"';
                                                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                                                    echo $iframe;
                                                    ?>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="d-flex justify-content-center align-items-center tabs-nav">
                                <?php if (have_rows('video_edition')) : ?>
                                    <?php $count = 0; ?>
                                    <?php while (have_rows('video_edition')) : the_row(); ?>
                                        <?php $count++; ?>
                                        <div class="<?php if ($count == $total) { ?>tab-active <?php } ?>d-flex align-items-center tab">
                                            <span><?php the_sub_field('video_year'); ?></span>
                                            <?php if ($count < $total) { ?>
                                                <svg width="12" height="1" viewBox="0 0 12 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <line x1="12" y1="0.5" x2="4.37114e-08" y2="0.500001" stroke="#D6D6D6" />
                                                </svg>
                                            <?php } ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'agenda_uitzendbureau_event') : ?>
            <section id='agenda'>
                <?php $agenda = get_sub_field('agenda'); ?>
                <?php if ($agenda) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="offset-lg-1 col-lg-10 position-relative">
                                <?php foreach ($agenda as $post) :  ?>
                                    <?php setup_postdata($post); ?>
                                    <?php $currentYear = date('Y'); ?>
                                    <?php $yearOfItem = get_the_title(); ?>
                                    <div class="<?php the_title(); ?> <?php if ($currentYear == $yearOfItem) { ?>active<?php } else { ?>hidden<?php } ?>">
                                        <div class="ms-auto d-flex location-nav">
                                            <?php if (have_rows('agenda_event')) : ?>
                                                <?php $count = 0; ?>
                                                <?php while (have_rows('agenda_event')) : the_row(); ?>
                                                    <?php $count++; ?>
                                                    <div class="<?php if ($count == 1) { ?>tab-active <?php } ?> location-tab">
                                                        <span><?php the_sub_field('agenda_location') ?></span>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php wp_reset_postdata(); ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="offset-lg-1 col-lg-10">
                                <?php foreach ($agenda as $post) :  ?>
                                    <?php setup_postdata($post); ?>
                                    <?php $currentYear = date('Y'); ?>
                                    <?php $yearOfItem = get_the_title(); ?>
                                    <div class="<?php the_title(); ?> <?php if ($currentYear == $yearOfItem) { ?>active<?php } else { ?>hidden<?php } ?>">
                                        <ul class="locations" class="<?php the_title() ?>">
                                            <?php if (have_rows('agenda_event')) : ?>
                                                <?php $countPosts = 0; ?>
                                                <?php while (have_rows('agenda_event')) : the_row(); ?>
                                                    <?php $countPosts++; ?>
                                                    <li class="<?php if ($countPosts == 1) { ?>tab-active <?php } ?>location <?php the_sub_field('agenda_location') ?>">
                                                        <div class="d-flex align-items-center">
                                                            <h2><strong><?php the_title() ?></strong> Agenda</h2>
                                                            <span class="date"><?php the_sub_field('agenda_date'); ?></span>
                                                        </div>
                                                        <div class="timetable">
                                                            <?php if (have_rows('agenda_activity')) : ?>
                                                                <?php while (have_rows('agenda_activity')) : the_row(); ?>
                                                                    <div class="d-flex timetable-row">
                                                                        <span class="time"><?php the_sub_field('activity_time'); ?></span>
                                                                        <span class="activity"><?php the_sub_field('activity_content'); ?></span>
                                                                        <?php $activity_image = get_sub_field('activity_image'); ?>
                                                                        <?php if ($activity_image) { ?>
                                                                            <img src="<?php echo $activity_image['sizes']['medium']; ?>" alt="<?php echo $activity_image['alt']; ?>" />
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php $agenda_link = get_sub_field('agenda_link'); ?>
                                                        <?php if ($agenda_link) { ?>
                                                            <div class="d-flex mt-4">
                                                                <div class="d-flex align-items-center agenda-link">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 0C3.73478 0 3.48043 0.105357 3.29289 0.292893C3.10536 0.48043 3 0.734784 3 1V2H2C1.46957 2 0.960859 2.21071 0.585786 2.58579C0.210714 2.96086 0 3.46957 0 4V14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H14C14.5304 16 15.0391 15.7893 15.4142 15.4142C15.7893 15.0391 16 14.5304 16 14V4C16 3.46957 15.7893 2.96086 15.4142 2.58579C15.0391 2.21071 14.5304 2 14 2H13V1C13 0.734784 12.8946 0.48043 12.7071 0.292893C12.5196 0.105357 12.2652 0 12 0C11.7348 0 11.4804 0.105357 11.2929 0.292893C11.1054 0.48043 11 0.734784 11 1V2H5V1C5 0.734784 4.89464 0.48043 4.70711 0.292893C4.51957 0.105357 4.26522 0 4 0ZM4 5C3.73478 5 3.48043 5.10536 3.29289 5.29289C3.10536 5.48043 3 5.73478 3 6C3 6.26522 3.10536 6.51957 3.29289 6.70711C3.48043 6.89464 3.73478 7 4 7H12C12.2652 7 12.5196 6.89464 12.7071 6.70711C12.8946 6.51957 13 6.26522 13 6C13 5.73478 12.8946 5.48043 12.7071 5.29289C12.5196 5.10536 12.2652 5 12 5H4Z" fill="#E9184E" />
                                                                    </svg>
                                                                    <a href="<?php echo $agenda_link['url']; ?>" target="<?php echo $agenda_link['target']; ?>"><?php echo $agenda_link['title']; ?></a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php elseif (get_row_layout() == 'tickets_uitzendbureau_event') : ?>
            <section id="tickets">
                <div class="container">
                    <div class="row">
                        <div class="offset-xxl-3 offset-xl-2 offset-lg-1 col-xxl-6 col-xl-8 col-lg-10 text-center">
                            <?php the_sub_field('tickets_titel'); ?>
                            <?php $tickets_button = get_sub_field('tickets_button'); ?>
                            <?php if ($tickets_button) { ?>
                                <div class="order-button">
                                    <a class="button" href="<?php echo $tickets_button['url']; ?>" target="<?php echo $tickets_button['target']; ?>">
                                        <span class="button-year">E<?php echo date("Y"); ?></span>
                                        <span class="button-content"><?php echo $tickets_button['title']; ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (have_rows('tickets_dates')) : ?>
                                <div class="d-none d-md-block">
                                    <div class="dates d-flex flex-wrap">
                                        <?php while (have_rows('tickets_dates')) : the_row(); ?>
                                            <div class="date-block d-flex align-items-center">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 0C3.73478 0 3.48043 0.105357 3.29289 0.292893C3.10536 0.48043 3 0.734784 3 1V2H2C1.46957 2 0.960859 2.21071 0.585786 2.58579C0.210714 2.96086 0 3.46957 0 4V14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H14C14.5304 16 15.0391 15.7893 15.4142 15.4142C15.7893 15.0391 16 14.5304 16 14V4C16 3.46957 15.7893 2.96086 15.4142 2.58579C15.0391 2.21071 14.5304 2 14 2H13V1C13 0.734784 12.8946 0.48043 12.7071 0.292893C12.5196 0.105357 12.2652 0 12 0C11.7348 0 11.4804 0.105357 11.2929 0.292893C11.1054 0.48043 11 0.734784 11 1V2H5V1C5 0.734784 4.89464 0.48043 4.70711 0.292893C4.51957 0.105357 4.26522 0 4 0ZM4 5C3.73478 5 3.48043 5.10536 3.29289 5.29289C3.10536 5.48043 3 5.73478 3 6C3 6.26522 3.10536 6.51957 3.29289 6.70711C3.48043 6.89464 3.73478 7 4 7H12C12.2652 7 12.5196 6.89464 12.7071 6.70711C12.8946 6.51957 13 6.26522 13 6C13 5.73478 12.8946 5.48043 12.7071 5.29289C12.5196 5.10536 12.2652 5 12 5H4Z" fill="#E9184E" />
                                                </svg>
                                                <div class="event-location"><?php the_sub_field('tickets_location'); ?></div>
                                                <svg width="14" height="2" viewBox="0 0 14 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <line y1="1.25" x2="14" y2="1.25" stroke="#E9184E" stroke-width="1.5" />
                                                </svg>
                                                <div class="event-date"><?php the_sub_field('tickets_date'); ?></div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'faq_uitzendbureau_event') : ?>
            <section id="faq">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-1 col-10">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <?php the_sub_field('faq_title'); ?>
                                <?php $email = get_sub_field('faq_email'); ?>
                                <?php if ($email) { ?>
                                    <div class="d-none d-sm-block email">
                                        <span>Zelf vragen?</span>
                                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <?php if (have_rows('faq_question')) : ?>
                                    <?php while (have_rows('faq_question')) : the_row(); ?>
                                        <div class="col-xl-6 pe-4">
                                            <div class="faq-item">
                                                <div class="heading d-flex justify-content-between">
                                                    <span><?php the_sub_field('question'); ?></span>
                                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.293 1.29296C0.480528 1.10549 0.734836 1.00017 1 1.00017C1.26516 1.00017 1.51947 1.10549 1.707 1.29296L5 4.58596L8.293 1.29296C8.38525 1.19745 8.49559 1.12127 8.6176 1.06886C8.7396 1.01645 8.87082 0.988862 9.0036 0.987709C9.13638 0.986555 9.26806 1.01186 9.39095 1.06214C9.51385 1.11242 9.6255 1.18667 9.71939 1.28056C9.81329 1.37446 9.88754 1.48611 9.93782 1.60901C9.9881 1.7319 10.0134 1.86358 10.0123 1.99636C10.0111 2.12914 9.98351 2.26036 9.9311 2.38236C9.87869 2.50437 9.80251 2.61471 9.707 2.70696L5.707 6.70696C5.51947 6.89443 5.26516 6.99975 5 6.99975C4.73484 6.99975 4.48053 6.89443 4.293 6.70696L0.293 2.70696C0.105529 2.51943 0.000213623 2.26512 0.000213623 1.99996C0.000213623 1.73479 0.105529 1.48049 0.293 1.29296Z" fill="#E9184E" />
                                                    </svg>
                                                </div>
                                                <div class="content">
                                                    <?php the_sub_field('answer'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <?php if ($email) { ?>
                                <div class="d-block mt-4 d-sm-none email">
                                    <span>Zelf vragen?</span>
                                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'partners_uitzendbureau_event') : ?>
            <section id="partners">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <span><?php the_sub_field('partners_title') ?></span>
                            <div class="swiper partnerSwiper">
                                <div class="swiper-wrapper">
                                    <?php if (have_rows('partners_logos')) : ?>
                                        <?php while (have_rows('partners_logos')) : the_row(); ?>
                                            <div class="logo-partner swiper-slide">
                                                <?php $logo_customer = get_sub_field('partner_logo'); ?>
                                                <?php if ($logo_customer) { ?>
                                                    <img src="<?php echo $logo_customer['url']; ?>" alt="<?php echo $logo_customer['alt']; ?>" />
                                                <?php } ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'locations_uitzendbureau_event') : ?>
            <?php $locations = get_sub_field('locations'); ?>
            <?php if ($locations) : ?>
                <section id="location">
                    <div class="container">
                        <div class="row">
                            <div class="offset-lg-1 col-lg-10">
                                <div class="row">
                                    <?php $i = 0; ?>
                                    <?php foreach ($locations as $post) :  ?>
                                        <?php if (have_rows('location')) : ?>
                                            <?php while (have_rows('location')) : the_row(); ?>
                                                <?php $i++; ?>
                                                <?php if ($i % 2 != 0) { ?>
                                                    <div class="col-lg-6 event-odd">
                                                        <?php $location_image = get_sub_field('location_image'); ?>
                                                        <?php if ($location_image) { ?>
                                                            <img src="<?php echo $location_image['url']; ?>" alt="<?php echo $location_image['alt']; ?>" />
                                                        <?php } ?>
                                                        <div class="d-flex flex-wrap content">
                                                            <h5><?php the_title() ?></h5>
                                                            <div class="adress">
                                                                <p><?php the_sub_field('location_adress'); ?></p>
                                                                <p><?php the_sub_field('location_place'); ?></p>
                                                            </div>
                                                            <div class="contact">
                                                                <a href="mailto:<?php the_sub_field('location_email'); ?>"><?php the_sub_field('location_email'); ?></a>
                                                                <a href="tel:<?php the_sub_field('phonenumber_location'); ?>"><?php the_sub_field('phonenumber_location'); ?></a>
                                                            </div>
                                                            <?php $location_route = get_sub_field('location_route'); ?>
                                                            <?php if ($location_route) { ?>
                                                                <a class="route" href="<?php echo $location_route['url']; ?>" target="<?php echo $location_route['target']; ?>"><?php echo $location_route['title']; ?></a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-lg-6 event-even">
                                                        <?php $location_image = get_sub_field('location_image'); ?>
                                                        <?php if ($location_image) { ?>
                                                            <img src="<?php echo $location_image['url']; ?>" alt="<?php echo $location_image['alt']; ?>" />
                                                        <?php } ?>
                                                        <div class="d-flex flex-wrap content">
                                                            <h5><?php the_title() ?></h5>
                                                            <div class="adress">
                                                                <p><?php the_sub_field('location_adress'); ?></p>
                                                                <p><?php the_sub_field('location_place'); ?></p>
                                                            </div>
                                                            <div class="contact">
                                                                <a href="mailto:<?php the_sub_field('location_email'); ?>"><?php the_sub_field('location_email'); ?></a>
                                                                <a href="tel:<?php the_sub_field('phonenumber_location'); ?>"><?php the_sub_field('phonenumber_location'); ?></a>
                                                            </div>
                                                            <?php $location_route = get_sub_field('location_route'); ?>
                                                            <?php if ($location_route) { ?>
                                                                <a class="route" href="<?php echo $location_route['url']; ?>" target="<?php echo $location_route['target']; ?>"><?php echo $location_route['title']; ?></a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="offset-lg-7 col-lg-5 arrow">
                                <svg width="516" height="804" viewBox="0 0 516 804" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M514.788 402.873L135.858 23.9433C104.961 -6.95333 54.9809 -7.06611 24.2234 23.6913C-6.53405 54.4489 -6.42125 104.429 24.4753 135.326L291.519 402.37L25.6779 668.21C-5.07959 698.968 -4.96681 748.948 25.9298 779.845C56.8264 810.742 106.807 810.854 137.564 780.097L514.788 402.873Z" stroke="#1E2D4F" stroke-opacity="0.1" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>